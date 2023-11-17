<?php session_start();


require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require 'boutique0.php';
$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
$req3->execute(array($_SESSION['reference']));
$donnees3=$req3->fetch();

//****************************************
//MONETICO PAIEMENT
// SECTION INCLUDE :  Cette section ne doit pas être modifié.
require_once("MoneticoPaiement_Config.php");
// PHP implementation of RFC2104 hmac sha1 ---
require_once("MoneticoPaiement_Ept.inc.php");
// FIN SECTION INCLUDE
// SECTION PAIEMENT : Cette section doit être modifiée
// Ci-après, vous trouverez un exemple des valeurs requises pour effectuer un paiement en utilisant la solution Monetico Paiement.
// L'ordre des variables et le format des valeurs doivent correspondre aux spécifications techniques.
// SECTION PAIEMENT - Section générale
// Reference: unique, alphaNum (A-Z a-z 0-9), 12 characters max
$sReference = $donnees3['reference'];
// Amount : format  "xxxxx.yy" (no spaces)
$sMontant = $donnees3['grand_total'];
// Currency : ISO 4217 compliant
$sDevise  = "EUR";
// Contextual information related to the order : JSON, UTF-8, hexadecimally encoded
// cart details, shipping and delivery addresses, technical context
// Créer un tableau de données
/*$rawContexteCommand='{
"billing":{
"firstName":"Jérémy",
"lastName":"Grimm",
"addressLine1":"3 rue de l\'église",
"city":"Ostheim",
"postalCode":"68150",
"country":"FR"
},
"shipping":{
"firstName":"Jérémy",
"lastName":"Grimm",
"addressLine1":"3 rue de l\'église",
"city":"Ostheim",
"postalCode":"68150",
"country":"FR",
"email":"jerem68@hotmail.com"
},
"client":{
"email":"jerem68@hotmail.com"
}
}';*/
//if livraison internationale ou non
$rawContexteCommand1 = new stdClass();
$rawContexteCommand1->billing=new stdClass();
$rawContexteCommand1->shipping=new stdClass();
$rawContexteCommand1->client=new stdClass();
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();
if (isset($donnees['prenom']) AND !empty($donnees['prenom'])){$rawContexteCommand1->billing->firstName=$donnees['prenom'];}
if (isset($donnees['nom'])){$rawContexteCommand1->billing->lastName=$donnees['nom'];}
if (isset($donnees['adresse1'])){$rawContexteCommand1->billing->addressLine1=$donnees['adresse1'];}
if (!empty($donnees['ville'])){$rawContexteCommand1->billing->city=$donnees['ville'];}
if (!empty($donnees['code_postal'])){$rawContexteCommand1->billing->postalCode=$donnees['code_postal'];}
//
if (!empty($donnees['stateOrProvince'])){$rawContexteCommand1->billing->stateOrProvince=$donnees['stateOrProvince'];}//stateOrProvince=='maine et loire'

if (!empty($donnees['pays'])){$rawContexteCommand1->billing->country=$donnees['pays'];}
if (!empty($donnees['prenom_livr'])){$rawContexteCommand1->shipping->firstName=$donnees['prenom_livr'];}
if (!empty($donnees['nom_livr'])){$rawContexteCommand1->shipping->lastName=$donnees['nom_livr'];}
if (!empty($donnees['adresse1_livr'])){$rawContexteCommand1->shipping->addressLine1=$donnees['adresse1_livr'];}
if (!empty($donnees['ville_livr'])){$rawContexteCommand1->shipping->city=$donnees['ville_livr'];}
if (!empty($donnees['code_postal_livr'])){$rawContexteCommand1->shipping->postalCode=$donnees['code_postal_livr'];}
//
if (!empty($donnees['stateOrProvince_livr'])){$rawContexteCommand1->shipping->stateOrProvince=$donnees['stateOrProvince_livr'];}//stateOrProvince=='maine el loire'

if (!empty($donnees['pays_livr'])){$rawContexteCommand1->shipping->country=$donnees['pays_livr'];}
if (!empty($donnees3['acheteur'])){$rawContexteCommand1->shipping->email=$donnees3['acheteur'];}
if (!empty($donnees3['acheteur'])){$rawContexteCommand1->client->email=$donnees3['acheteur'];}

$rawContexteCommand=json_encode($rawContexteCommand1);

$utf8ContexteCommande = utf8_encode( $rawContexteCommand );
$sContexteCommande = base64_encode( $utf8ContexteCommande );
// free texte : a bigger reference, session context for the return on the merchant website
$sTexteLibre = "Texte Libre";
// transaction date : format d/m/y:h:m:s
$sDate = date("d/m/Y:H:i:s");
// Language of the company code
$sLangue = "FR";
// customer email
$sEmail = $donnees3['acheteur'];
// SECTION PAIEMENT FRACTIONNE - Section spécifique au paiement fractionné
// between 2 and 4
// entre 2 et 4
//$sNbrEch = "4";
$sNbrEch = "";
// date echeance 1 - format dd/mm/yyyy
//$sDateEcheance1 = date("d/m/Y");
$sDateEcheance1 = "";
// montant �ch�ance 1 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance1 = "0.26" . $sDevise;
$sMontantEcheance1 = "";
// date echeance 2 - format dd/mm/yyyy
$sDateEcheance2 = "";
// montant �ch�ance 2 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance2 = "0.25" . $sDevise;
$sMontantEcheance2 = "";
// date echeance 3 - format dd/mm/yyyy
$sDateEcheance3 = "";
// montant �ch�ance 3 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance3 = "0.25" . $sDevise;
$sMontantEcheance3 = "";
// date echeance 4 - format dd/mm/yyyy
$sDateEcheance4 = "";
// montant �ch�ance 4 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance4 = "0.25" . $sDevise;
$sMontantEcheance4 = "";
// FIN SECTION PAIEMENT
// SECTION CODE : Cette section ne doit pas être modifiée
$oEpt = new MoneticoPaiement_Ept($sLangue);
$oHmac = new MoneticoPaiement_Hmac($oEpt);
// Control String for support
$CtlHmac = sprintf(MONETICOPAIEMENT_CTLHMAC, MONETICOPAIEMENT_VERSION, $oEpt->sVersion, $oEpt->sNumero, $oHmac->computeHmac(sprintf(MONETICOPAIEMENT_CTLHMACSTR, $oEpt->sVersion, $oEpt->sNumero)));
// Data to certify
$urlKOKO=$oEpt->sUrlKO.$donnees3['reference'];
$urlOKOK=$oEpt->sUrlOK.$donnees3['reference'];

$phase1go_fields = implode(
  '*',
  [
    "TPE={$oEpt->sNumero}",
    "contexte_commande=$sContexteCommande",
    "date=$sDate",
    "dateech1=$sDateEcheance1",
    "dateech2=$sDateEcheance2",
    "dateech3=$sDateEcheance3",
    "dateech4=$sDateEcheance4",
    "lgue=$sLangue",
    "mail=$sEmail",
    "montant=$sMontant{$sDevise}",
    "montantech1=$sMontantEcheance1",
    "montantech2=$sMontantEcheance2",
    "montantech3=$sMontantEcheance3",
    "montantech4=$sMontantEcheance4",
    "nbrech=$sNbrEch",
    "reference=$sReference",
    "societe={$oEpt->sCodeSociete}",
    "texte-libre=$sTexteLibre",
    "url_retour_err=$urlKOKO",
    "url_retour_ok=$urlOKOK",
    "version={$oEpt->sVersion}"
  ]
);
//"url_retour_err=$oEpt->sUrlKO",
//"url_retour_ok=$oEpt->sUrlOK",
// MAC computation
$sMAC = $oHmac->computeHmac($phase1go_fields);
// FIN SECTION CODE
///

$non='non';
$req2=$bdd->prepare('UPDATE commande SET mac=:mac WHERE reference=:reference AND etat=:etat');
$req2->execute(array('mac'=>$sMAC, 'reference'=>$_SESSION['reference'], 'etat'=>$non));
?>

<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div id="recap">
      <section>
        <article>

<div id="paiement_cb">
    <img class="paiement_image" src="../publicimgs/bouton_paiement.png"/>
    <h3 id="paiem_h3" style="text-decoration:underline">Validation de commande</h3>
</div>
<div id="bloc_div">
<?php 

$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=? AND etat=? AND acheteur=?');
$req1->execute(array($_SESSION['reference'], $non, htmlspecialchars($_SESSION['mail'])));
while($donnees2=$req1->fetch()){
?>
  <img class="image_recap" src="../publicimgs/<?php echo htmlspecialchars($donnees2['cle_image']); ?>">        
  <p><?php echo $donnees2['titre']; ?></p>
  <p><span style="text-decoration:underline">Prix TTC :</span> <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' '); ?> € --- Nbre : <?php echo htmlspecialchars($donnees2['quantite']); ?></p>
  <p><span style="text-decoration:underline">Sous-Total :</span> <?php echo number_format(htmlspecialchars($donnees2['sous_total']),2,',',' '); ?> €</p>  
  <?php 
  $_SESSION['livraison']=htmlspecialchars($donnees2['livraison']);
  $_SESSION['grand_total']=htmlspecialchars($donnees2['grand_total']);
}
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();
?>
<br>
<p><span style="text-decoration:underline">Grand Total :</span> <?php echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' '); ?> €</p>
<p><span style="text-decoration:underline">Dont Livraison :</span> <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' '); ?> €</p>
  <div id="adr_fact">
    <p class="rr1" style="text-decoration:underline">Adresse de Facturation : </p>
      <p><?php if(isset($donnees3['acheteur'])){echo htmlspecialchars($donnees3['acheteur']);} ?></p>
      <p><?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);}if(isset($donnees['nom'])){echo ' '.htmlspecialchars($donnees['nom']);}?></p>
      <p><?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']);}?></p>
      <p><?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']);}?></p>
      <p><?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']);}if(isset($donnees['ville'])){echo ' --- '.htmlspecialchars($donnees['ville']);}?></p>
      <?php if(isset($donnees['stateOrProvince'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince']).'</p>';}?>
      <p><?php if(isset($donnees['pays_string'])){echo htmlspecialchars($donnees['pays_string']);}?></p>
  </div>
  <div id="adr_livr">
    <p class="rr2" style="text-decoration:underline">Adresse de Livraison : </p>   
      <p><?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);}if(isset($donnees['nom_livr'])){echo ' '.htmlspecialchars($donnees['nom_livr']);}?></p>
      <p><?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);}?></p>
      <p><?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);}?></p>
      <p><?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);}if(isset($donnees['ville_livr'])){echo ' --- '.htmlspecialchars($donnees['ville_livr']);}?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';}?>
      <p><?php if(isset($donnees['pays_livr_string'])){echo htmlspecialchars($donnees['pays_livr_string']);}?></p>
  </div>
</div><br>
<a id="lien_paiement_b1" href="index.php">Changer Facturation</a><a id="lien_paiement_b2" href="adresse-livraison.php">Changer Livraison</a><a id="lien_paiement_b3" href="index.php">Changer Email</a>
<!--  SECTION FORMULAIRE : cette section doit être copiée dans votre propre page afin d'afficher le bouton de paiement. Aucune modification n'est requise.-->
<form action="<?php echo $oEpt->sUrlPaiement;?>" method="post" id="PaymentRequest">
  <input type="hidden" name="version"             id="version"           value="<?php echo $oEpt->sVersion;?>" />
  <input type="hidden" name="TPE"                 id="TPE"               value="<?php echo $oEpt->sNumero;?>" />
  <input type="hidden" name="date"                id="date"              value="<?php echo $sDate;?>" />
  <input type="hidden" name="contexte_commande"   id="contexte_commande" value="<?php echo $sContexteCommande;?>" />
  <input type="hidden" name="montant"             id="montant"           value="<?php echo $sMontant . $sDevise;?>" />
  <input type="hidden" name="reference"           id="reference"         value="<?php echo $sReference;?>" />
  <input type="hidden" name="MAC"                 id="MAC"               value="<?php echo $sMAC;?>" />
  <input type="hidden" name="url_retour_ok"       id="url_retour_ok"     value="<?php echo $oEpt->sUrlOK.$_SESSION['reference'];?>" />
  <input type="hidden" name="url_retour_err"      id="url_retour_err"    value="<?php echo $oEpt->sUrlKO.$_SESSION['reference'];?>" />
  <input type="hidden" name="lgue"                id="lgue"              value="<?php echo $oEpt->sLangue;?>" />
  <input type="hidden" name="societe"             id="societe"           value="<?php echo $oEpt->sCodeSociete;?>" />
  <input type="hidden" name="texte-libre"         id="texte-libre"       value="<?php echo HtmlEncode($sTexteLibre);?>" />
  <input type="hidden" name="mail"                id="mail"              value="<?php echo $sEmail;?>" />
  <!--      SECTION PAIEMENT FRACTIONNE - Section spécifique au paiement fractionné-->
  <input type="hidden" name="nbrech"              id="nbrech"         value="<?php echo $sNbrEch;?>" />
  <input type="hidden" name="dateech1"            id="dateech1"       value="<?php echo $sDateEcheance1;?>" />
  <input type="hidden" name="montantech1"         id="montantech1"    value="<?php echo $sMontantEcheance1;?>" />
  <input type="hidden" name="dateech2"            id="dateech2"       value="<?php echo $sDateEcheance2;?>" />
  <input type="hidden" name="montantech2"         id="montantech2"    value="<?php echo $sMontantEcheance2;?>" />
  <input type="hidden" name="dateech3"            id="dateech3"       value="<?php echo $sDateEcheance3;?>" />
  <input type="hidden" name="montantech3"         id="montantech3"    value="<?php echo $sMontantEcheance3;?>" />
  <input type="hidden" name="dateech4"            id="dateech4"       value="<?php echo $sDateEcheance4;?>" />
  <input type="hidden" name="montantech4"         id="montantech4"    value="<?php echo $sMontantEcheance4; ?>" />

  <!--      FIN SECTION PAIEMENT FRACTIONNE-->
  <p><input type="submit" name="bouton" class="lien_paiement2" value="Acheter" /></p>         
</form>
</article>
</section>
<br><br><br>
      <?php require 'footer.php'; ?>
</div>
</body>
</html>
<?php $_SESSION['grand_total']=$donnees3['grand_total'];