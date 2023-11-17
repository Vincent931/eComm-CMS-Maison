<?php session_start();

$ref2="";
$ref=$_GET['ref'];
$mail1= $_GET['mail'];

if(isset($_GET['paytotal']) AND $_GET['paytotal']=="total"){
	$total=$_GET['paytotal'];
} else {$total="";}

if(isset($_GET['paytotal']) AND $_GET['paytotal']=="totalvel"){
	$totalvel="totalvel";
}

require 'texte1.php';

require 'boutique0.php';


$req21=$bdd1->query('SELECT vente_validation FROM mail_vente_valid');
$mails=$req21->fetch();
$mail_vente=$mails['vente_validation'];

$req22=$bdd1->query('SELECT * FROM societe');
$ste=$req22->fetch();
$nom_ste=$ste['nom'];

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];

$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$reference=$_GET['ref'];

$int='bandeau-mail';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];

//mail vente

$i=0;
$j=0;
$key="";
for($k=0;$k<=12;$k++){
		$key.=rand(0,9);
	}
//update des 1/quantites et 2/declaration des commandes payés
$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
$req3->execute(array($reference));
while($donnees=$req3->fetch())
{
$ref2=$donnees['ref2'];
$titre=$donnees['titre'];
$mot=substr($donnees['telechar'],0,14);
$vente=substr($donnees['telechar'],14,255);
	
$deux=2;
	if($mot=='telechargement'){

	$req30=$bdd->prepare('INSERT INTO telechargement(cle, facteur, file) VALUES(:cle, :facteur, :file)');
	$req30->execute(array('cle'=>$key, 'facteur'=>$deux, 'file'=>$vente));
	}
	//recuperation quantite
	$req=$bdd->prepare('SELECT quantite FROM commande WHERE reference=? AND titre=? ');
	$req->execute(array($reference, $titre));
	$quantite=$req->fetch();
	$quantite_achanger=$quantite['quantite'];
	
	//quantite produit
	$req6=$bdd->prepare('SELECT * FROM produits WHERE titre=:titre');
	$req6->execute(array('titre'=>$titre));
	$donnees6=$req6->fetch();
	$quant_prod=$donnees6['quantite'];
	//quantite nouvelle
	$quant_rect=$quant_prod-$quantite_achanger;
	if(isset($totalvel) AND $totalvel=="totalvel"){
		//update produits
	$req1=$bdd->prepare('UPDATE produits SET quantite=:quantite WHERE titre=:titre');
	$req1->execute(array('quantite'=>$quant_rect, 'titre'=>$titre));
	}

	if(substr($ref2,0,13)=="clickpaytotal"){
	//update produits
	$req1=$bdd->prepare('UPDATE produits SET quantite=:quantite WHERE titre=:titre');
	$req1->execute(array('quantite'=>$quant_rect, 'titre'=>$titre));
	}
	//etat commande oui
	$oui='oui';
}
//update click
if(isset($ref2) AND substr($ref2,0,5)=="click"){
			$ref2="clickpaytotal";
	} else {
		$ref2=$donnees['ref2'];
	}

	if($total=="total"){
		$ref2="clickpaytotalpaye";
	}
	if(isset($totalvel) AND $totalvel=="totalvel"){
		$ref2="totalvel";
	}

	$req2=$bdd->prepare('UPDATE commande SET ref2=:ref2, etat=:etat WHERE reference=:reference ');
	$req2->execute(array('ref2'=>$ref2, 'etat'=>$oui,'reference'=>$reference));
//fin d'update click

$ajout="";
$k=0;
	$req31=$bdd->prepare('SELECT * FROM telechargement WHERE cle=?');
	$req31->execute(array($key));
	while($donnees31=$req31->fetch()){
		$k++;
	$ajout.='<table align="center">
					<tbody>
					<tr>
						<td>Cliquez pour <a style="color:blue" href="'.$url_ste.'/download/telechargement.php?file='.$donnees31['file'].'&cle='.$donnees31['cle'].'">'.'Telecharger'.'</a>'.' Le telechargement Numero'.$k.' (2 essais).</td>
					</tr>
					</tbody>
			</table>';
}

require 'mail-achat-admin.php';
$_SESSION['message']="Courriel envoyé de confirmation envoyé, Facture Vendeur, Facture Client & Bon de Livraison disponible !!!";

header("Location:stock-factures.php");

