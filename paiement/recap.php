<?php session_start();

//////////////////////////////////////// mail achat
require 'texte1.php';

require 'boutique0.php';


$req21=$bdd1->query('SELECT vente FROM mails');
$mails=$req21->fetch();
$mail_vente=$mails['vente'];

$req22=$bdd1->query('SELECT * FROM societe');
$ste=$req22->fetch();
$nom_ste=$ste['nom'];

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();


$mail_ste=$ste['mail'];

$url_ste=$ste['url'];

$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$reference=$_SESSION['reference'];

$int='bandeau';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];
$type_paie="Monético";
require '../customer/mail-achat.php';
////////////////////////////////////////

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

if(isset($_POST['coupon']) AND !empty($_POST['coupon'])){
  
  
        
  $req4=$bdd->query('SELECT * FROM reduction');
  $donnees4=$req4->fetch();
  if(isset($donnees4['coupon']) AND !empty($donnees4['coupon'])){
    if($_POST['coupon']==$donnees4['coupon']){
      $req8=$bdd->prepare('SELECT* FROM nbre_reduction WHERE reference=?');
      $req8->execute(array($_SESSION['reference']));
      $donnees7=$req8->fetch();
      if($donnees7['nbre']==1){
      $reduction=$donnees4['valeur'];
      $req6=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
      $req6->execute(array($_SESSION['reference']));
        while($donnees6=$req6->fetch()){
          $plancher=$donnees6['grand_total'];
        }
        if($donnees4['minimum']<=$plancher){
        $req6=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
        $req6->execute(array($_SESSION['reference']));
          while($donnees6=$req6->fetch()){
          
          $grand_total=$donnees6['grand_total']-$reduction;

          $req5=$bdd->prepare('UPDATE commande SET reduction=:reduction, grand_total=:grand_total WHERE reference=:reference');
          $req5->execute(array('reduction'=>$reduction,'grand_total'=>$grand_total, 'reference'=>$_SESSION['reference']));

          $req9=$bdd->prepare('UPDATE nbre_reduction SET nbre=:nbre WHERE reference=:reference');
          $req9->execute(array('nbre'=>0, 'reference'=>$_SESSION['reference']));

          } 
        } else{ $_SESSION['message_spe']="Vous n'avez pas atteint le minimum d'achat pour bénéficier de cette réduction";}
      } else{$_SESSION['message_spe']="Votre réduction est déjà prise en compte";}
    } else{$_SESSION['message_spe']="Votre Bon de réduction n'est pas valable, Vérifier la mise en forme";}
  }
}




$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
$req3->execute(array($_SESSION['reference']));
$donnees3=$req3->fetch();
$_SESSION['mail']=$donnees3['acheteur'];

$req77=$bdd->query('SELECT * FROM click_c');
$donnees77=$req77->fetch();
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
if($donnees3['ref2']!="click"){
$sMontant = $donnees3['grand_total'];
} elseif($donnees3['ref2']=="click"){ $sMontant="5.00";}
// Currency : ISO 4217 compliant
if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){$sDevise  = "EUR";} else{$sDevise  = "USD";};
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
if(isset($donnees3['livr_inter']) AND $donnees3['livr_inter']=='oui'){
  if($donnees['pays']=='ASS'){$pays='AS';} elseif
  ($donnees['pays']=='BYY'){$pays='BY';} elseif
  ($donnees['pays']=='ISS'){$pays='IS';}elseif
  ($donnees['pays']=='INN'){$pays='IN';}elseif
  ($donnees['pays']=='IDD'){$pays='ID';}elseif
  ($donnees['pays']=='TOO'){$pays='TO';}else
  {$pays=$donnees['pays'];}
if (!empty($donnees['stateOrProvince'])){$rawContexteCommand1->billing->stateOrProvince=$donnees['stateOrProvince'];}
} elseif ($donnees['pays']=='FR' AND $donnees3['livr_inter']!='oui'){
  $pays='FR';
}
if (!empty($pays)){$rawContexteCommand1->billing->country=$pays;} 

//
if (!empty($donnees['prenom_livr'])){$rawContexteCommand1->shipping->firstName=$donnees['prenom_livr'];}
if (!empty($donnees['nom_livr'])){$rawContexteCommand1->shipping->lastName=$donnees['nom_livr'];}
if (!empty($donnees['adresse1_livr'])){$rawContexteCommand1->shipping->addressLine1=$donnees['adresse1_livr'];}
if (!empty($donnees['ville_livr'])){$rawContexteCommand1->shipping->city=$donnees['ville_livr'];}
if (!empty($donnees['code_postal_livr'])){$rawContexteCommand1->shipping->postalCode=$donnees['code_postal_livr'];}
//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga
if(isset($donnees3['livr_inter']) AND $donnees3['livr_inter']=='oui'){
  if($donnees['pays_livr']=='ASS'){$pays_livr='AS';} elseif
  ($donnees['pays_livr']=='BYY'){$pays_livr='BY';} elseif
  ($donnees['pays_livr']=='ISS'){$pays_livr='IS';} elseif
  ($donnees['pays_livr']=='INN'){$pays_livr='IN';} elseif
  ($donnees['pays_livr']=='IDD'){$pays_livr='ID';} elseif
  ($donnees['pays_livr']=='TOO'){$pays_livr='TO';} else
  {$pays_livr=$donnees['pays_livr'];}
if (!empty($donnees['stateOrProvince_livr'])){$rawContexteCommand1->shipping->stateOrProvince=$donnees['stateOrProvince_livr'];}
} elseif ($donnees3['livr_inter']!='oui'){
  $pays_livr='FR';
}
if (!empty($pays_livr)){$rawContexteCommand1->shipping->country=$pays_livr;} 

//
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
?>

<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<style>
   *{
    box-sizing: border-box;
  }
  body{
    width: 150rem;
    margin-left:0;
    margin-right:0;
  }
/*Marge sur recap.php, retour KO.php et retour-OK.php*/
#grey_color_marge
{
  border:1px solid grey;
  background-color:#DDE3E3;
  box-shadow:2px 2px 4px #DDE3E3;
  padding: 3px;
  margin-left:12px;
  margin-right:12px;
}
/* recap*/
#recap{
  width:80%;
  margin-left: 0 auto;
  margin-right: 0;
}
label{
  margin-left: auto;
  margin-right: auto;
}
#paiement_cb
{
  width: 25rem;
  margin-left:auto;
  margin-right: auto;
  padding-left: auto;
}
#paiement_image
{
  width:120px;
  display:inline-block;
  margin:auto;
  text-align:center;
}
form{
  width: 50rem;
  margin-left: auto;
  margin-right: auto;
}
#coupon{
  width: 25rem;
  margin-left: auto;
  margin-right: auto;
}
.contenair_all{
  display: flex;
  flex-direction: row;
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  justify-content: space-around;
}
#bloc_div{
  display: flex;
  flex-direction: column;
  width:500px;
  margin-left: 10%;
  margin-right: 0;
}
#adresses{
  width: 330px;
  display: flex;
  flex-direction: column;
  margin-left: 100px;
}
#image_recap
{
  width:180px;
  display:block;
}
.infos{
  text-align: center;
  margin-left:auto;
  margin-right: auto;
}
.p_infos{
  width:180px;
  margin-left: 0;
  margin-right: auto;
  text-align: center;
}
.p_inf{
  margin-top: 20px;
  text-align: center;
  margin-left:auto;
  margin-right: auto;
  margin-bottom: 20px;
}
.paiement_box
{
  margin-bottom:35px;
}
.titl_liens{
  color: #5B6975;
}
.description_ach{
   display:inline:block; 
}
#a_gauche, #au_milieu, #droite
{
  display:inline-block;
  margin:auto;
}
#recap p{
  display:block;
  line-height:13px;
}
#recap a{
  display:inline:block;
}
#recap a #grey_color{
  display:inline:block;
}
#inp_sub{
  width: 100px;
  margin: 0;
  padding: 0;
  margin-left: auto;
  margin-right: auto;
}
.paiem2_image
{
  text-align:right;
  float:right;
  margin-right:0px;
}
.paiem3_marge
{
  margin-left:140px;
}
#lien_paiement_b1,#lien_paiement_b3,#lien_paiement_b4{
  margin-left: auto;
  margin-right: auto;
  background-color:#DDE3E3;
  color: #5B6975;
  text-decoration:none;
  border:2px solid gray;
  font-size:10px;
  text-align: center;
}
#lien_paiement_b1{
  margin-top: 30px;
  width: 100px;
  padding-left:8px;
  padding-right: 8px;
  padding-top: 5px;
  padding-bottom: 5px;
  margin-bottom: 30px;
}
#lien_paiement_b3{
  margin-top: 30px;
  width: 100px;
  padding-left:13px;
  padding-right: 13px;
  padding-top: 5px;
  padding-bottom: 5px;
  margin-bottom: 30px;
}
#lien_paiement_b4{
  margin-top: 30px;
  width: 100px;
  padding-left:22px;
  padding-right: 22px;
  padding-top: 5px;
  padding-bottom: 5px;
  margin-bottom:30px;
}
.lien_paiement3
{
  border:1px solid gray;
  background-color:#DDE3E3;
  box-shadow:2px 2px 4px #DDE3E3;
  font-size:12px;
  padding: 5px;
  margin:20px;
}
.info_paiement
{
  border:1px solid blue;
  background-color:#F4F2DA;
  border-radius:25px/25px;
  margin:auto;
  padding-top:0px;
  padding-bottom:10px;
  padding-left:15px;
  padding-right:15px;
  width:750px;
  text-align:left;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px){
/*recap*/
#recap{
  margin-left: 0;
  margin-right: 0;
}
#paiement_cb{
  margin-left: 140px;
  margin-right: 0;
  position: relative;
  left: -140px;
}
form{
  margin-left: -140px;
  margin-right: 0;
  text-align: center;
}
label{
  margin-left: 0;
  margin-right: 0;
  display: block;
}
.inp_99{
  display: block;
}
.inp_99_subm{
  margin-left: 0;
  margin-right: 0;
}
.contenair_all{
  display: flex;
  flex-direction: column;
  width: 330px;
  margin-left: 0;
  margin-right: 0;
}
#bloc_div{
  display: flex;
  flex-direction: column;
  width:300px;
  margin-left: -70px;
  margin-right: 0;
}
#adresses{
  width: 330px;
  display: flex;
  flex-direction: column;
  margin-left: 100px;
}
#image_recap{
  width:200px;
  text-align:center;
  margin-left: 150px;
}
.p_infos{
  width: 200px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 153px;
}
#lien_paiement2{
  display: block;
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 310px;
}
#adr_fact, #adr_livr,.infos{
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  text-align: left;
}
.infos{
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -120px;
}
#inp_sub{
  display: block;
  z-index: 99999;
}
#lien_paiement_b1,#lien_paiement_b3,#lien_paiement_b4{
  margin-left: 60px;
}
@-moz-document url-prefix(){
}
}
</style>
<meta name="robots" content="noindex">
</head>
  <body>
    <div id="recap">
<br><br>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
 <!--<div style="text-shadow:none;min-width:1000px;text-align:left" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<br>
<div id="paiement_cb"><img id="paiement_image" src="../publicimgs/bouton_paiement.png"/><h3 style="text-decoration:underline">Vérifiez votre commande</h3></div><br>
<?php $req7=$bdd->query('SELECT * FROM reduction');
  $donnees7=$req7->fetch();
  if(isset($donnees7['coupon'])AND !empty($donnees7['coupon'])){
    if($donnees3['ref2']!="click"){
      if(isset($_SESSION['message_spe']) AND !empty($_SESSION['message_spe'])){
      echo '<h4 style="color:red;text-align:center; margin:auto">'.$_SESSION['message_spe'].'</h4>'; $_SESSION['message_spe']="";
    }
  ?><form method="post" action="">
<p><label for="coupon">COUPON REDUCTION </label><input class="inp_99" type="text" name="coupon" id="coupon"/></p>
<p>&nbsp;</p>
<p><input class="inp_99_subm" type="submit" value="Réduire"/>
</form>
<br>
<?php } 
} ?>
<div class="contenair_all">
<div id="bloc_div">

<?php 
$non="non";
$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=? AND etat=?');
$req1->execute(array($_SESSION['reference'], $non));
while($donnees2=$req1->fetch()){
?>
<?php if(isset($donnees2['img_type']) AND $donnees2['img_type']=="image"){ ?>   
  <img id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image']; ?>"/>
<?php }
 if(isset($donnees2['img_type']) AND $donnees2['img_type']=="youtube"){ ?><iframe id="image_recap" <?php echo $donnees2['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php
  } 
  if(isset($donnees2['img_type']) AND $donnees2['img_type']=="video"){ ?>
  <video id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees2['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
  <?php } ?><br>      
  <p class="p_infos"><?php echo $donnees2['titre']; ?></p>
  <br>
  <p class="p_infos">TTC : <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?> --- Qté : <?php echo htmlspecialchars($donnees2['quantite']); ?></p>
  <br>
  <p class="p_infos">Sous-Total : <?php echo number_format(htmlspecialchars($donnees2['sous_total']),2,',',' '); if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p><br>
  <?php 
  $_SESSION['livraison']=$donnees2['livraison'];
  $_SESSION['grand_total']=$donnees2['grand_total'];
}
?>
<br style="line-height:4px">
<p class="p_infos">Total : 

<?php 
if($donnees3['ref2']!="click"){
      echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>


    <p class="p_infos">dont Livraison : <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
    <?php if(isset($reduction) AND !empty($reduction)){echo '<br><p class="p_infos">'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else {echo ' $';} 
    echo '</p>';} 
} else {
      echo number_format("5",2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>


    <p class="p_infos">dont Livraison : <?php echo number_format("0",2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
    <?php if(isset($reduction) AND !empty($reduction)){echo '<br><p class="p_infos">'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} 
    echo '</p>';}
} ?>
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
  <p id="inp_sub"><br><br><input class="inp_99_subm" type="submit" name="bouton" id="lien_paiement2" value="Valider la commande" onclick="change();"/></p>
  <br>        
</form>
<?php $req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch(); ?>
</div>
<div id="adresses">
  <div id="adr_fact"><h4 class="titl_liens" style="text-decoration:underline">Facturation</h4>
      <p><?php if(isset($donnees3['acheteur'])){echo htmlspecialchars($donnees3['acheteur']);} ?></p>
      <p><?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);}if(isset($donnees['nom'])){echo ' '.htmlspecialchars($donnees['nom']);}?></p>
      <?php if(isset($donnees['societe'])){echo '<p>'.htmlspecialchars($donnees['societe']).'</p>';}?>
      <p><?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']);}?></p>
      <p><?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']);}?></p>
      <p><?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']);}if(isset($donnees['ville'])){echo ' --- '.htmlspecialchars($donnees['ville']);}?></p>
      <?php if(isset($donnees['stateOrProvince'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince']).'</p>';}?>
      <p><?php if(isset($donnees['pays_string'])){echo htmlspecialchars($donnees['pays_string']);}?></p>
  </div>
  <div id="adr_livr"><h4 class="titl_liens" style="text-decoration:underline">Livraison</h4>
      <p><?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);}if(isset($donnees['nom_livr'])){echo ' '.htmlspecialchars($donnees['nom_livr']);}?></p>
      <?php if(isset($donnees['societe_livr'])){echo '<p>'.htmlspecialchars($donnees['societe_livr']).'</p>';}?>
      <p><?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);}?></p>
      <p><?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);}?></p>
      <p><?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);}if(isset($donnees['ville_livr'])){echo ' --- '.htmlspecialchars($donnees['ville_livr']);}?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';}?>
      <p><?php if(isset($donnees['pays_livr_string'])){echo htmlspecialchars($donnees['pays_livr_string']);}?></p>
  </div>
  <div class="infos">
      <p class="p_inf"><a id="lien_paiement_b1" href="../panier.php" onclick="change();">Facturation</a></p>
      <p class="p_inf"><a id="lien_paiement_b3" href="../panier.php"  onclick="change();">Livraison</a></p>
      <p class="p_inf"><a id="lien_paiement_b4" href="../panier.php" onclick="change();">Email</a></p>
    </div>
</div>
</div>
<br>
<p style="height:100px">&nbsp;</p>
<br><br><br><br><br>
      <?php require 'footer.php'; ?>
</div>
</body>
</html>