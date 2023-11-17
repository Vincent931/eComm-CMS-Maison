<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

require 'boutique0.php';

  $non='non';

    $refvente=$_SESSION['reference'];//la reference1

    $_SESSION['reference2']="";
    $reference2="";
    $monfichier = fopen('../reference.txt', 'r+');
    $reference_before=fgets($monfichier);
    $reference_before2=$reference_before+1;
    fseek($monfichier, 0);
    fputs($monfichier, $reference_before2);
    fclose($monfichier);
    $reference2.='refp2';
    $reference2.=$reference_before2;
    $_SESSION['reference2']=$reference2;

    $req4=$bdd->prepare('UPDATE commande SET ref2=:ref2new WHERE reference=:referenceold AND etat=:etat');
    $req4->execute(array('ref2new'=>$_SESSION['reference2'], 'referenceold'=>$refvente, 'etat'=>$non));

$annee=date('Y');
$mois=date('m');
$jour=date('d');


$heure=date('H');
$minute=date('i');
$seconde=date('s');
$jour2="";$mois2="";$annee2="";
//annee bisextile
switch ($annee){
  case 2020:
    switch($mois){
      case 01:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
        break;
      case 1:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
      case 12:
        $mois2=1;
        $annee2=$annee+1;
        $jour2=$jour;
        break;
        default:
        $mois2=$mois+1;
        $annee2=$annee+1;
        $jour2=$jour;
        switch($jour){
          case 31:
          $jour2=30;
          break;
          default:
          $jour2=$jour;
        }
    break;  
    }
  break;
  case 2024:
  $annee2=$annee;
  $mois2=$mois+1;
  $jour2=$jour;
    switch($mois){
      case 01:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
        break;
      case 1:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
      case 12:
        $mois2=1;
        $annee2=$annee+1;
        $jour2=$jour;
        break;
        default:
        $mois2=$mois+1;
        $annee2=$annee+1;
        $jour2=$jour;
        switch($jour){
          case 31:
          $jour2=30;
          break;
          default:
          $jour2=$jour;
        }
    break;  
    }
  break;
  case 2028:
    $annee2=$annee;
  $mois2=$mois+1;
  $jour2=$jour;
    switch($mois){
      case 01:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
      case 1:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
      case 12:
        $mois2=1;
        $annee2=$annee+1;
        $jour2=$jour;
        break;
        default:
        $mois2=$mois+1;
        $annee2=$annee+1;
        $jour2=$jour;
        switch($jour){
          case 31:
          $jour2=30;
          break;
          default:
          $jour2=$jour;
        }
    break;  
    }
    break;
  case 2032:
    $annee2=$annee;
  $mois2=$mois+1;
  $jour2=$jour;
    switch($mois){
      case 01:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
        break;
      case 1:
        switch($jour){
          case 30:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          case 31:
          $jour2=29;
          $mois2=$mois+1;
          $annee2=$annee;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
      case 12:
        $mois2=1;
        $annee2=$annee+1;
        $jour2=$jour;
        break;
        default:
        $mois2=$mois+1;
        $annee2=$annee+1;
        $jour2=$jour;
        switch($jour){
          case 31:
          $jour2=30;
          break;
          default:
          $jour2=$jour;
        }
    break;  
    }
    break;
  default:
  $mois2=$mois+1;
  $annee2=$annee;
  $jour2=$jour;
    switch($mois){
      case 01:
      $mois2=$mois+1;
      $annee2=$annee;
        switch($jour){
          case 29:
          $jour2=28;
          break;
          case 30:
          $jour2=28;
          $mois2=$mois+1;
          break;
          case 31:
          $jour2=28;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
        }
      break;
      case 1:
      $mois2=$mois+1;
      $annee2=$annee;
        switch($jour){
          case 29:
          $jour2=28;
          break;
          case 30:
          $jour2=28;
          $mois2=$mois+1;
          break;
          case 31:
          $jour2=28;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
        }
      break;
      case 12:
      $annee2=$annee+1;
      $jour2=$jour;
      $mois2=1;
      break;
      default:
        switch($jour){
          case 31:
          $jour2=30;
          break;
          default:
          $jour2=$jour;
          $mois2=$mois+1;
          $annee2=$annee;
        }
      break;
    }
}
$jour2_aft="";$mois2_aft="";
$jour2_aft=$jour2;
$mois2_aft=$mois2;
if($jour2==1 OR $jour2=='01'){$jour2_aft='01';}

if($mois2==1 OR $mois2=='01'){$mois2_aft='01';}

if($jour2==2 OR $jour2=='02'){$jour2_aft='02';}

if($mois2==2 OR $mois2=='02'){$mois2_aft='02';}

if($jour2==3 OR $jour2=='03'){$jour2_aft='03';}

if($mois2==3 OR $mois2=='03'){$mois2_aft='03';}

if($jour2==4 OR $jour2=='04'){$jour2_aft='04';}

if($mois2==4 OR $mois2=='04'){$mois2_aft='04';}

if($jour2==5 OR $jour2=='05'){$jour2_aft='05';}

if($mois2==5 OR $mois2=='05'){$mois2_aft='05';}

if($jour2==6 OR $jour2=='06'){$jour2_aft='06';}

if($mois2==6 OR $mois2=='06'){$mois2_aft='06';}

if($jour2==7 OR $jour2=='07'){$jour2_aft='07';}

if($mois2==7 OR $mois2=='07'){$mois2_aft='07';}

if($jour2==8 OR $jour2=='08'){$jour2_aft='08';}

if($mois2==8 OR $mois2=='08'){$mois2_aft='08';}

if($jour2==9 OR $jour2=='09'){$jour2_aft='09';}

if($mois2==9 OR $mois2=='09'){$mois2_aft='09';}

$date_ech2=$jour2_aft.'/'.$mois2_aft.'/'.$annee2;

$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();


//Calcul 2ème échéance
//round($adeduire, 2);
$a_deduire_before=$_SESSION['grand_total']/2;
$a_deduire=round($a_deduire_before, 2);
$montant2_bef=$_SESSION['grand_total']-$a_deduire;

$montant1=number_format($a_deduire, 2, '.', '');
$montant2=number_format($montant2_bef, 2, '.', '');
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
$sReference = $_SESSION['reference2'];
// Amount : format  "xxxxx.yy" (no spaces)
$sMontant = $_SESSION['grand_total'];
// Currency : ISO 4217 compliant
$sDevise  = "EUR";
// Contextual information related to the order : JSON, UTF-8, hexadecimally encoded
// cart details, shipping and delivery addresses, technical context
$rawContexteCommand1 = new stdClass();
$rawContexteCommand1->billing=new stdClass();
$rawContexteCommand1->shipping=new stdClass();
$rawContexteCommand1->client=new stdClass();
$rawContexteCommand1->billing->firstName=$donnees['prenom'];
$rawContexteCommand1->billing->lastName=$donnees['nom'];
$rawContexteCommand1->billing->addressLine1=$donnees['adresse1'];
$rawContexteCommand1->billing->city=$donnees['ville'];
$rawContexteCommand1->billing->postalCode=$donnees['code_postal'];
$rawContexteCommand1->billing->country=$donnees['pays'];
$rawContexteCommand1->shipping->firstName=$donnees['prenom_livr'];
$rawContexteCommand1->shipping->lastName=$donnees['nom_livr'];
$rawContexteCommand1->shipping->addressLine1= $donnees['adresse1_livr'];
$rawContexteCommand1->shipping->city=$donnees['ville_livr'];
$rawContexteCommand1->shipping->postalCode=$donnees['code_postal_livr'];
$rawContexteCommand1->shipping->country=$donnees['pays_livr'];
$rawContexteCommand1->shipping->email=$donnees3['acheteur'];
$rawContexteCommand1->client->email=$donnees3['acheteur'];

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
$sEmail = $_SESSION['mail'];
// SECTION PAIEMENT FRACTIONNE - Section spécifique au paiement fractionné
// between 2 and 4
// entre 2 et 4
//$sNbrEch = "4";
$sNbrEch = "2";
// date echeance 1 - format dd/mm/yyyy
$sDateEcheance1 = date('d/m/Y');
//$sDateEcheance1 = "";
// montant �ch�ance 1 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance1 = "0.26" . $sDevise;
$sMontantEcheance1 = $montant1.$sDevise;
// date echeance 2 - format dd/mm/yyyy
$sDateEcheance2 = $date_ech2;//$date2; 
// montant �ch�ance 2 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance2 = "0.25" . $sDevise;
$sMontantEcheance2 = $montant2. $sDevise;
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
    "url_retour_err=$oEpt->sUrlKO",
    "url_retour_ok=$oEpt->sUrlOK",
    "version={$oEpt->sVersion}"
  ]
);
// MAC computation
$sMAC = $oHmac->computeHmac($phase1go_fields);
// FIN SECTION CODE
$non='non';
$req2=$bdd->prepare('UPDATE commande SET ref2=:ref2, mac2=:mac2 WHERE etat=:etat AND acheteur=:acheteur');
$req2->execute(array('ref2'=>$_SESSION['reference2'], 'mac2'=>$sMAC, 'etat'=>$non, 'acheteur'=>$_SESSION['mail_retour']));
?>
<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html>
            <head>
                              <meta charset="utf-8"/>
                              <link href="../css/style.css" rel="stylesheet"/>
                              <link rel="shortcut icon" href="../publicimgs/icone.png">
                              <title>www-1-zéro</title>
                        </head>
  <body>
    <div id="bloc_page">
      <h1>Paiement</h1>
      <section>
        <article>
<h3 style="margin:auto">Validation paiement en 2 fois </h3>
<p><img class="paiement_image" src="../publicimgs/bouton_paiement.png"></p>
 
<!--  SECTION FORMULAIRE : cette section doit être copiée dans votre propre page afin d'afficher le bouton de paiement. Aucune modification n'est requise.-->
<form action="<?php echo $oEpt->sUrlPaiement;?>" method="post" id="PaymentRequest">
<p>
  <input type="hidden" name="version"             id="version"           value="<?php echo $oEpt->sVersion;?>" />
  <input type="hidden" name="TPE"                 id="TPE"               value="<?php echo $oEpt->sNumero;?>" />
  <input type="hidden" name="date"                id="date"              value="<?php echo $sDate;?>" />
  <input type="hidden" name="contexte_commande"   id="contexte_commande" value="<?php echo $sContexteCommande;?>" />
  <input type="hidden" name="montant"             id="montant"           value="<?php echo $sMontant . $sDevise;?>" />
  <input type="hidden" name="reference"           id="reference"         value="<?php echo $sReference;?>" />
  <input type="hidden" name="MAC"                 id="MAC"               value="<?php echo $sMAC;?>" />
  <input type="hidden" name="url_retour_ok"       id="url_retour_ok"     value="<?php echo $oEpt->sUrlOK;?>" />
  <input type="hidden" name="url_retour_err"      id="url_retour_err"    value="<?php echo $oEpt->sUrlKO;?>" />
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
  <input type="hidden" name="montantech4"         id="montantech4"    value="<?php echo $sMontantEcheance4;?>" />
  <!--      FIN SECTION PAIEMENT FRACTIONNE-->
  <input type="submit" name="bouton"              id="bouton"         value="Payer CB" />
</p>
</form>
  <div class="info_paiement">
    <p>Votre Paiement échelonné en deux fois:</br>
    Le : <?php echo date('d/m/Y'); ?>, premier paiement de <?php echo $montant1.$sDevise?></br>
    Le : <?php echo $date_ech2; ?>, deuxième paiement de <?php echo $montant2.$sDevise;?></br>
    Vérifiez votre capacité de paiement et la validité de votre carte.</p>
  </div>
        <?php require 'footer.php'; ?>
</body>
</html>