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

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];

$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$reference=$_SESSION['reference'];

$int='bandeau-mail';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];

require 'mail-achat.php';
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
if(isset($donnees3['livr_inter']) AND $donnees3['livr_inter']=='oui'){
  if($donnees['pays']=='ASS'){$pays='AS';} elseif
  ($donnees['pays']=='BYY'){$pays='BY';} elseif
  ($donnees['pays']=='ISS'){$pays='IS';}elseif
  ($donnees['pays']=='INN'){$pays='IN';}elseif
  ($donnees['pays']=='IDD'){$pays='ID';}elseif
  ($donnees['pays']=='TOO'){$pays='TO';}else
  {$pays=$donnees['pays'];}
if (!empty($donnees['stateOrProvince'])){$rawContexteCommand1->billing->stateOrProvince=$donnees['stateOrProvince'];}
}//
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
}//
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
<div id="containair">
     <div id="banniere1"><span id="span_ban1">Coordonnées</span></div>
     <div id="banniere2"><span id="span_ban2">Livraison</span></div>
     <div id="banniere_select"><span id="span_select">Récapitulatif</span></div>
     <div id="banniere4"><span id="span_ban4" style="">Paiement</span></div>
</div>
<br><br>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
<div id="paiement_cb"><img id="paiement_image" src="../publicimgs/bouton_paiement.png"/><h3 style="text-decoration:underline">Validation de commande</h3></div><br>
<?php $req7=$bdd->query('SELECT * FROM reduction');
  $donnees7=$req7->fetch();
  if(isset($donnees7['coupon'])AND !empty($donnees7['coupon'])){
    if(isset($_SESSION['message_spe']) AND !empty($_SESSION['message_spe'])){
      echo '<h4 style="color:red;text-align:center; margin:auto">'.$_SESSION['message_spe'].'</h4>'; $_SESSION['message_spe']="";
    }
  ?><form method="post" action="">
<p><label for="coupon">COUPON REDUCTION </label><input type="text" name="coupon" id="coupon"/></p>
<p><input type="submit" value="Réduire"/>
</form>
<br>
<?php } ?>
<div id="bloc_div">
<?php 

$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=? AND etat=?');
$req1->execute(array($_SESSION['reference'], $non));
while($donnees2=$req1->fetch()){
?>
  <img id="image_recap" src="../publicimgs/<?php echo htmlspecialchars($donnees2['cle_image']); ?>">        
  <p><?php echo $donnees2['titre']; ?></p>
  <p>TTC : <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' '); ?>€ --- Qté : <?php echo htmlspecialchars($donnees2['quantite']); ?></p>
  <p>Sous-Total : <?php echo number_format(htmlspecialchars($donnees2['sous_total']),2,',',' '); ?>€</p>  
  <?php 
  $_SESSION['livraison']=$donnees2['livraison'];
  $_SESSION['grand_total']=$donnees2['grand_total'];
}
?>
<br style="line-height:4px">
<p>Total : <span style="color:green"><?php echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' '); ?>€</span></p>
<p>dont Livraison : <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' '); ?>€</p>
<?php if(isset($reduction) AND !empty($reduction)){echo '<p>'.'Réduction : '.$reduction.'€'.'</p>';} ?>
</div>
<?php $req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch(); ?>
<div id="adresses">
  <div id="adr_fact"><h4 style="text-decoration:underline">Facturation</h4>
      <p><?php if(isset($donnees3['acheteur'])){echo htmlspecialchars($donnees3['acheteur']);} ?></p>
      <p><?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);}if(isset($donnees['nom'])){echo ' '.htmlspecialchars($donnees['nom']);}?></p>
      <p><?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']);}?></p>
      <p><?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']);}?></p>
      <p><?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']);}if(isset($donnees['ville'])){echo ' --- '.htmlspecialchars($donnees['ville']);}?></p>
      <?php if(isset($donnees['stateOrProvince'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince']).'</p>';}?>
      <p><?php if(isset($donnees['pays_string'])){echo htmlspecialchars($donnees['pays_string']);}?></p>
    </div>
  <div id="adr_livr"><h4 style="text-decoration:underline">Livraison</h4>   
      <p><?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);}if(isset($donnees['nom_livr'])){echo ' '.htmlspecialchars($donnees['nom_livr']);}?></p>
      <p><?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);}?></p>
      <p><?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);}?></p>
      <p><?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);}if(isset($donnees['ville_livr'])){echo ' --- '.htmlspecialchars($donnees['ville_livr']);}?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';}?>
      <p><?php if(isset($donnees['pays_livr_string'])){echo htmlspecialchars($donnees['pays_livr_string']);}?></p>
      <br>
      <p><a id="lien_paiement_b1" href="index.php" onclick="change();">Facturation</a></p>
      <p><a id="lien_paiement_b2" href="adresse-livraison.php"  onclick="change();">Livraison</a></p>
      <p><a id="lien_paiement_b3" href="../panier.php"  onclick="change();">Recalculer</a></p>
      <p><a id="lien_paiement_b4" href="index.php" onclick="change();">Email</a></p>
    </div>
</div>  
<br>


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
  <p id="inp_sub"><input type="submit" name="bouton" id="lien_paiement2" value="Payer" onclick="change();"/></p>
  <br>        
</form>
</article>
</section>
<br><br><br><br><br>
      <?php require 'footer.php'; ?>
</div>
</body>
</html>