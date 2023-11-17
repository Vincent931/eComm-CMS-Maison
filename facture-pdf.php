<?php session_start();
require 'texte1.php';
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();

$old_session_id=session_id();
$_SESSION['destroyed']=time();

if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require('facturePDF.php');
// #1 initialise les informations de base
//
// adresse de l'entreprise qui émet la facture
$adresse = "";
// adresse du client
require 'boutique0.php';

$acheteurV=htmlspecialchars(urldecode($_GET['mail']));

$req3= $bdd->prepare('SELECT * FROM compte WHERE mail=?');
    $req3->execute(array($acheteurV));
    $donnees4=$req3->fetch();
$adresseClient1 = htmlspecialchars($donnees4['nom']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['prenom']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['societe']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['adresse1']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['adresse2']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['code_postal']);
$adresseClient1.=' ';
$adresseClient1.=htmlspecialchars($donnees4['ville']);
$adresseClient1.=' ';
if(isset($donnees4['stateOrProvince'])AND !empty($donnees4['stateOrProvince'])){$adresseClient1.=htmlspecialchars($donnees4['stateOrProvince']);$adresseClient1.=' ';}
$adresseClient1.=htmlspecialchars($donnees4['pays_string']);
$adresseClient= $adresseClient1;
require 'texte1.php';
$req30=$bdd1->query('SELECT * FROM societe');
$ste=$req30->fetch();
$adresseVendeur=$ste['nom'];
$adresseVendeur.=' - ';
$adresseVendeur.=$ste['adresse1'];
$adresseVendeur.=' ';
if(isset($ste['adresse2']) AND !empty($ste['adresse2'])){ $adresseVendeur.=$ste['adresse2'];$adresseVendeur.=' ';}
$adresseVendeur.=$ste['CP'];
$adresseVendeur.=' ';
$adresseVendeur.=$ste['ville'];
$adresseVendeur.=' ';
$adresseVendeur.=$ste['pays'];
$adresseVendeur.=' - ';
$adresseVendeur.=$ste['mail'];
$adresseVendeur.=' - RCS:';
$adresseVendeur.=$ste['RCS'];
$adresseVendeur.=' ';
$adresseVendeur.=$ste['ville_RCS'];

// initialise l'objet facturePDF
$pdf = new facturePDFA();
$pdf->facturePDF($adresse,$adresseClient,$adresseVendeur);
// défini le logo
$pdf->setLogo('publicimgs/logo.png');
$pdf->setTitre('titreF.png');
// entete des produits
$pdf->productHeaderAddRow('Produit', 70, 'L');
$pdf->productHeaderAddRow('Référence', 30, 'C');
$pdf->productHeaderAddRow('Prix TTC', 25, 'C');
$pdf->productHeaderAddRow('QTE', 15, 'C');
$pdf->productHeaderAddRow('Prix TTC', 25, 'R');
$pdf->productHeaderAddRow('Date',24,'R');
// entete des totaux
$pdf->totalHeaderAddRow(40, 'L');
$pdf->totalHeaderAddRow(30, 'R');
// element personnalisé
$pdf->elementAdd('', 'traitEnteteProduit', 'content');
$pdf->elementAdd('', 'traitBas', 'footer');
// #2 Créer une facture
//
// numéro de facture, date, texte avant le numéro de page
//$pdf->initFacture("Facture n° ".mt_rand(1, 99999)."-".mt_rand(1, 99999), "Paris le 21/03/2014", "Page ");
// produit
$pdf->productAdd(array('Produit', 'Référence', 'prix U.TTC', 'Qté', 'Sous-total', 'Date'));

if(isset($_GET['ref']) AND isset($_GET['mail']) AND !empty($_GET['ref']) AND !empty($_GET['mail'])){

    $ref=htmlspecialchars(urldecode($_GET['ref']));
    $acheteur=htmlspecialchars(urldecode($_GET['mail']));

    $TVA_interm=0.000000;
    $TVA_tot=0.000000;
    $TVA_interm2=0.000000;
    $TVA_interm3=0.000000;
    $TVA_interm4=0.000000;
    $TVA_tot1=0.0000000;

    $req= $bdd->prepare('SELECT devise, livr_inter, titre, quantite, prix, TVA, sous_total, total, livraison, grand_total, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE reference=? AND acheteur=?');
    $req->execute(array($ref, $acheteur));  
while($donnees=$req->fetch()){

$titre=htmlspecialchars($donnees['titre']);
$prix=number_format(htmlspecialchars($donnees['prix']),2,',',' ');
$sous_total=number_format(htmlspecialchars($donnees['sous_total']),2,',',' ');

if($donnees['devise']!='USD'){$pdf->productAdd(array(htmlspecialchars($donnees['titre']), $ref, $prix.' Eur', htmlspecialchars($donnees['quantite']), $sous_total.' Eur', htmlspecialchars($donnees['date_com'])));}
else{$pdf->productAdd(array(htmlspecialchars($donnees['titre']), $ref, $prix.' USD', htmlspecialchars($donnees['quantite']), $sous_total.' USD', htmlspecialchars($donnees['date_com'])));}

$TVA=number_format(htmlspecialchars($donnees['TVA']),3,'.',' ');
$sous_total=number_format(htmlspecialchars($donnees['sous_total']),2,'.','');

//calcul sous total HT
$TVA_interm=1+$TVA;
$TVA_interm2=$sous_total/$TVA_interm;

//Calcul TVA
$TVA_tot1=$sous_total-$TVA_interm2;
//Ajouté ttes les TVA
$TVA_tot+=$TVA_tot1;
//
}

} else { header("Location: mon-compte.php");}
// ligne des totaux
$req1= $bdd->prepare('SELECT * FROM commande WHERE reference=? AND acheteur=? ');
$req1->execute(array($ref, $acheteur));

$donnees2=$req1->fetch();

$total_ht=$donnees2['total']-$TVA_tot;
$livraison=number_format($donnees2['livraison'],2,',',' ');
$red=$donnees2['total']-($donnees2['grand_total']-$donnees2['livraison']);
$reduction=number_format($red,2,',',' ');
// ligne des totaux
if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Total HT', number_format($total_ht,2,',',' ').' USD'));} else{$pdf->totalAdd(array('Total HT', number_format($total_ht,2,',',' ').' EUR'));}

if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('dont TVA', number_format($TVA_tot,2,',',' ').' USD'));} else{$pdf->totalAdd(array('dont TVA', number_format($TVA_tot,2,',',' ').' EUR'));}

if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Sous total TTC', number_format($donnees2['total'],2,',',' ').' USD'));} else{$pdf->totalAdd(array('Sous total TTC', number_format($donnees2['total'],2,',',' ').' EUR'));}

if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Livraison',$livraison.' USD'));}else{ $pdf->totalAdd(array('Livraison',$livraison.' EUR'));}

if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Remise', $reduction.' USD'));}else{$pdf->totalAdd(array('Remise', $reduction.' EUR'));}

if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Total TTC',number_format($donnees2['grand_total'],2,',',' ').' USD'));} else{$pdf->totalAdd(array('Total TTC',number_format($donnees2['grand_total'],2,',',' ').' EUR'));}
if(substr($donnees2['ref2'],0,5)=="click"){
    if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Click & Collect',number_format("5",2,',',' ').' USD'));} else{$pdf->totalAdd(array('Click & Collect',number_format("5",2,',',' ').' EUR'));}
    if(substr($donnees2['ref2'],0,17)=="clickpaytotalpaye" AND (substr($donnees2['ref2'],0,17)=="clickpaytotalpaye")){
        if($donnees2['devise']=='USD'){ $pdf->totalAdd(array('Payé en TOTALITE',number_format($donnees2['grand_total'],2,',',' ').' USD'));} else{$pdf->totalAdd(array('Payé en TOTALITE',number_format($donnees2['grand_total'],2,',',' ').' EUR'));}
    }
}
$req->closeCursor();
// #3 Importe le gabarit
//
require('gabarit1.php');
// construit le PDF
$pdf->buildPDF();
// télécharge le fichier
$nomdupdf=$ste['nom'];
$nomdupdf.='_';
$nomdupdf.=$ref;
$nomdupdf.='.pdf';
//$pdf->Output('Facture.pdf', $_GET['download'] ? 'D':'I');
$pdf->Output($nomdupdf, 'I');