<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '../texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require '../boutique0.php';

$bank=$_POST['bank'];

$req21=$bdd1->query('SELECT compte_creation FROM mails');
$mail_creation=$req21->fetch();
$mail_confirm=$mail_creation['compte_creation'];

$req22=$bdd1->query('SELECT * FROM societe');
$ste=$req22->fetch();
$nom_ste=$ste['nom'];

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$req23=$bdd->query('SELECT nom FROM pdf');
$pdf=$req23->fetch();
$pdf_ins=$pdf['nom'];

$pdf_insert='../publicimgs/'.$pdf_ins;


	if(isset($_POST['cgv']) AND $_POST['cgv']=='oui'){
		if(isset($_POST['mail']) AND !empty($_POST['mail'])){
    $mail1=htmlspecialchars(strtolower($_POST['mail']));
    setcookie('accept_cookie',true, time()+ 365*24*3600,'/',null, false, true);
    setcookie('email',$mail1, time()+ 365*24*3600,'/',null, false, true);
    $_SESSION['mail']=$mail1;
    
			if(isset($_POST['nom']) AND !empty($_POST['nom'])){
			$nom = htmlspecialchars($_POST['nom']);
			  if(isset($_POST['prenom']) AND !empty($_POST['prenom'])){
				$prenom = htmlspecialchars($_POST['prenom']);
                    				if(isset($_POST['societe']) AND !empty($_POST['societe'])) {
                    				$societe= htmlspecialchars($_POST['societe']);
                    				} else {$societe="";}
					if(isset($_POST['adresse1']) AND !empty($_POST['adresse1'])){
					$adresse1 = htmlspecialchars($_POST['adresse1']);
					                  if(isset($_POST['adresse2']) AND !empty($_POST['adresse2'])){
                  					$adresse2 = htmlspecialchars($_POST['adresse2']);
                  					} else {$adresse2="";}
						if(isset($_POST['code_postal']) AND !empty($_POST['code_postal'])){
						$code_postal = htmlspecialchars($_POST['code_postal']);
							if(isset($_POST['ville']) AND !empty($_POST['ville'])){
							$ville = htmlspecialchars($_POST['ville']);
  							if(isset($_POST['pays']) AND !empty($_POST['pays'])){
                  if(isset($_POST['international']) AND $_POST['international']=='international_oui'){
                    if(isset($_POST['province']) AND !empty($_POST['province'])){ 
                       //key
                      $longueurKey = 19;
                      $key = "";
                      for($i=1;$i<$longueurKey;$i++) {
                      $key .= mt_rand(0,9);
                      }

                      $req1=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
                      $req1->execute(array($mail1));
                      $donnees=$req1->fetch();
                      if(isset($donnees['id']) AND !empty($donnees['id'])){
                      $ku="";} else {
                     
                      //recuperation du nom de bandeau                     
                            $req49=$bdd1->query('SELECT compte_creation FROM mails');
                            $donnees49=$req49->fetch();
                            $mail_compte=$donnees49['compte_creation'];
                      $int='bandeau';
                            $req28=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
                            $req28->execute(array($int));
                            $donnees10=$req28->fetch();
                            $image=$donnees10['nom'];

                      //mail php
                      require '../blog/mail-compte.php';
                      }
                      $pays=$_POST['pays'];
                      $oui='oui';
                      $province=htmlspecialchars($_POST['province']);
                      $req30=$bdd->prepare('UPDATE commande SET livr_inter=:livr_inter WHERE reference=:reference');
                      $req30->execute(array('livr_inter'=>$oui, 'reference'=>$_SESSION['reference']));
                      require 'adr_livr_2.php';    

                    } else { $_SESSION['message']="Vous devez remplir le champs Région ou Province pour une vente à l'international."; header("Location:Adresse-Facturation-Paiement-'.$bank.'-'.'");}
                  } else {
                    //key
                      $longueurKey = 19;
                      $key = "";
                      for($i=1;$i<$longueurKey;$i++) {
                      $key .= mt_rand(0,9);
                      } 

                    $req1=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
                    $req1->execute(array($mail1));
                    $donnees=$req1->fetch();
                    if(isset($donnees['id']) AND !empty($donnees['id'])){
                    $ku="";} else {
                    
                    $req49=$bdd1->query('SELECT compte_creation FROM mails');
                            $donnees49=$req49->fetch();
                            $mail_compte=$donnees49['compte_creation'];
                    //recuperation du nom de bandeau-mail
                    $int='bandeau';
                            $req28=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
                            $req28->execute(array($int));
                            $donnees10=$req28->fetch();
                            $image=$donnees10['nom'];
                            //mail php
                    require '../blog/mail-compte.php';
                    }
                            $pays='FR';
                            $province='';
                            require 'adr_livr_2.php';
                            
                            }
                } else {$_SESSION['message']="Vous devez remplir le champs Pays.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
              } else {$_SESSION['message']="Vous devez remplir le champs Ville.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
            } else {$_SESSION['message']="Vous devez remplir le champs Code Postal.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
          } else {$_SESSION['message']="Vous devez remplir le champs Adresse.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
        } else {$_SESSION['message']="Vous devez remplir le champs Prénom.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
      } else {$_SESSION['message']="Vous devez remplir le champs Nom.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
    } else { $_SESSION['message']="Vous devez entrez une adresse e-mail.";header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
  } else {$_SESSION['message']="Quelquechose s'est mal passé, CGV ? International(champs Région ou Province)?"; header("Location:Adresse-Facturation-Paiement-'.$bank;'-'.'");}
?>

<!DOCTYPE html>
<html id="bloc_page">
  <?php require 'head.php';?>
  <style>
/*index paiement*/
#ind_paie{
    text-align:center;
    width: 400px;
    margin-left: 100%;
    margin-right: 100%;
}
#ind_paie_h4{
  text-align:center;
  width: 800px;
  margin: 0;
}
/* Banniere select */
#containair{
  display:block;
  margin-left: 0;
  margin-right:0;
  text-align:left;
  background-color:white;
  width:800px;
  color: #5B6975;
}
#banniere1, #banniere2, #banniere3, #banniere4{
  display:inline-block;
  margin:0;
  border:0;
  padding-top:14px;
  background-color:white;
  color: #5B6975;
  width:22.49%;
  height:40px;
  font-size: 14px;
  vertical-align:middle;
  text-align:center;
  border-bottom:none;
  text-decoration:none;
}
#span_ban1, #span_ban2, #span_ban3, #span_ban4{
  vertical-align:middle;
  text-align:center;
  font-size: 14px;
  font-weight:bold;
  color: #5B6975;
  text_decoration: none;
}
#span_ban1 a, #span_ban2 a, #span_ban3 a, #span_ban4 a{
  display:inline-block;
  font-size: 14px;
  color: #5B6975;
  text-decoration:none;
}
#banniere_select{
  display:inline-block;
  margin:0;
  border:0;
  padding-top:14px;
  background-color:white;
  color: #5B6975;
  width:24.49%;
  height:40px;
  font-size: 14px;
  vertical-align:middle;
  text-align:center;
  border-bottom:3px solid blue;
  text-decoration:none;
}
#span_select{
  vertical-align:middle;
  text-align:center;
  font-weight:bold;
  font-size: 14px;
  color: #289AFE;
  text-decoration:none;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px){
#containair{
  width:100%;
}
#banniere1, #banniere2, #banniere3, #banniere4{
  display:none;
    }
#span_ban1, #span_ban2, #span_ban3, #span_ban4{
  display:none;
}
#banniere_select{
  display:inline-block;
  width:100%;
}
#span_select{
  display:inline-block;
}
/*adresselivraison*/
#ind_paie{
    text-align:center;
    width: 330px;
    margin-left: 0;
    margin-right: 0;
}
.h_adr{
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -250px;
}
@-moz-document url-prefix(){
}
}
</style>
  <meta name="robots" content="noindex">
</head>
	<body style="text-align:center">
		<div id="ind_paie">
<div id="containair">
     <div id="banniere1"><span id="span_ban1"><a href="Adresse-Facturation-Paiement-<?php echo $bank;?>-">Facturation</a></span></div>
     <div id="banniere_select"><span id="span_select"><a href="Adresse-Livraison">Livraison</a></span></div>
     <div id="banniere3"><span id="span_ban3"><a href="<?php if ($bank=="monetico"){echo "../paiement/RECAPITULATIF";}elseif ($bank=="paypal"){echo "../paypal/RECAPITULATIF";}elseif ($bank=="paypal-SDK"){echo "../paypal-SDK/RECAPITULATIF";}elseif ($bank=="cheque"){echo "../cheque/RECAPITULATIF";}?>">Récapitulatif</a></span></div>
     <div id="banniere4"><span id="span_ban4" style="">Paiement</span></div>
</div>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
<br>
<div id="ind_paie_h4">
   <!--<div style="text-shadow:none;min-width:1000px;text-align:left" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
			<h4 class="h_adr"><?php if(isset($_SESSION['message1'])){echo $_SESSION['message1']; $_SESSION['message1']="";} ?></h4>
      <h4 class="h_adr">Etape 2/3 - Adresse de Livraison</h4>
</div>
<section>
   	<article>
   		
</br>
		<form class="form_99_500" style="margin:auto;text-align:right" method="POST" action="adresse-livraison-list.php">
      <div id="ind_paie">
        <input type="hidden" name="bank" id="bank" value="<?php echo $_POST['bank'];?>"/>
				<?php 
				$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
				$req->execute(array($_SESSION['mail']));
				$donnees=$req->fetch(); ?>
				
				<p style="margin:auto;text-align:center"><label for="prenom_livr" class="heading">Prénom </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="prenom_livr" id="prenom_livr" value="<?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);} ?>"/></p>

        <p style="margin:auto;text-align:center"><label for="nom_livr" class="heading">Nom </label></p>
        <p style="margin-right:30px"><input type="text" class="inp_99" name="nom_livr" id="nom_livr" value="<?php if(isset($donnees['nom_livr'])){echo htmlspecialchars($donnees['nom_livr']);} ?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="societe_livr" class="heading">Société </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="societe_livr" id="societe_livr" value="<?php if(isset($donnees['societe_livr'])){echo htmlspecialchars($donnees['societe_livr']);} ?>"/></p>

				<p style="margin:auto;text-align:center"><label for="adresse1_livr" class="heading">Adresse </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="adresse1_livr" id="adresse1_livr" value="<?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);} ?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="adresse2_livr" class="heading">Complément d'adresse </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="adresse2_livr" id="adresse2_livr" value="<?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);} ?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="code_postal_livr" class="heading">Code Postal </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="code_postal_livr" id="code_postal_livr" value="<?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);} ?>"/>
				
				<p style="margin:auto;text-align:center"><label for="ville_livr" class="heading">Ville </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="ville_livr" id="ville_livr" value="<?php if(isset($donnees['ville_livr'])){echo htmlspecialchars($donnees['ville_livr']);} ?>"/></p>

        <p style="margin:auto;text-align:center"><label for="province_livr" class="heading">Région ou province (International) </label></p>
        <p style="margin-right:30px"><input type="text" class="inp_99" name="province_livr" id="province_livr" value="<?php if(isset($donnees['stateOrProvince_livr'])){echo htmlspecialchars($donnees['stateOrProvince_livr']);} ?>"/></p>
        <input type="hidden" name="international" value="<?php if(isset($_POST['check_paie'])){if ($_POST['check_paie']=='international_oui'){echo 'international_oui';}else{echo '';}}else{echo '';}?>"/>

        <p style="margin:auto;text-align:center"><label for="pays_livr" class="heading">Pays </label></p>
        <p style="margin-right:30px"><select name="pays_livr" id="pays_livr"></p>
          <optgroup label="France-Dom-Tom">
  <option value = "FR"> France </option>
  <option value = "GP"> Guadeloupe </option>
  <option value = "GF"> Guyane française </option>
  <option value = "MQ"> Martinique </option>
  <option value = "YT"> Mayotte </option>
  <option value = "PF"> Polynésie française </option>
  <option value = "RE"> Réunion </option>
  <option value = "MF"> Saint Martin (partie française) </option>
  <option value = "PM"> Saint-Pierre-et-Miquelon </option>
  <option value = "TF"> Terres Australes Françaises </option>
          </optgroup>
          <optgroup label="International"><!--//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga-->
  <option value = "AF"> Afghanistan </option> 
  <option value = "AXE"> Îles d'Åland </option> 
  <option value = "AL"> Albanie </option> 
  <option value = "DZ"> Algérie </option>
  <option value = "ASS"> Samoa américaines </option>
  <option value = "AD"> Andorre </option>
  <option value = "AO"> Angola </option>
  <option value = "AI"> Anguilla </option>
  <option value = "AQ"> Antarctique </option>
  <option value = "AG"> Antigua-et-Barbuda </option>
  <option value = "AR"> Argentine </option>
  <option value = "AW"> Aruba </option>
  <option value = "AU"> Australie </option>
  <option value = "AT"> Autriche </option>
  <option value = "AZ"> Azerbaïdjan </option>
  <option value = "BS"> Bahamas </option>
  <option value = "BH"> Bahreïn </option>
  <option value = "BD"> Bangladesh </option>
  <option value = "BB"> Barbade </option><
  <option value = "BYY"> Biélorussie </option>
  <option value = "BE"> Belgique </option>
  <option value = "BZ"> Belize </option>
  <option value = "BJ"> Bénin </option>
  <option value = "BM"> Bermudes </option>
  <option value = "BT"> Bhoutan </option>
  <option value = "BO"> Bolivie, État plurinational de </option><
  <option value = "BQ"> Bonaire, Saint-Eustache et Saba </option>
  <option value = "BA"> Bosnie-Herzégovine </option>
  <option value = "BW"> Botswana </option>
  <option value = "BV"> Île Bouvet </option>
  <option value = "BR"> Brésil </option>
  <option value = "IO"> Territoire britannique de l'océan Indien </option>
  <option value = "BN"> Brunéi Darussalam </option>
  <option value = "BG"> Bulgarie </option>
  <option value = "BF"> Burkina Faso </option> 
  <option value = "BI"> Burundi </option>
  <option value = "KH"> Cambodge </option>
  <option value = "CM"> Cameroun </option> 
  <option value = "CA"> Canada </option>
  <option value = "CV"> Cap Vert </option>
  <option value = "KY"> Iles Caïman </option>
  <option value = "CF"> République centrafricaine </option>
  <option value = "TD"> Tchad </option>
  <option value = "CL"> Chili </option>
  <option value = "CN"> Chine </option>
  <option value = "CX"> Île Christmas </option>
  <option value = "CC"> Îles Cocos (Keeling) </option>
  <option value = "CO"> Colombie </option> 
  <option value = "KM"> Comores </option>
  <option value = "CG"> Congo </option>
  <option value = "CD"> Congo, République démocratique du </option>
  <option value = "CK"> Iles Cook </option>
  <option value = "CR"> Costa Rica </option>
  <option value = "CI"> Côte d'Ivoire </option> 
  <option value = "HR"> Croatie </option>
  <option value = "CU"> Cuba </option>
  <option value = "CW"> Curaçao </option>
  <option value = "CY"> Chypre </option>
  <option value = "CZ"> République tchèque </option>
  <option value = "NSP"> Danemark </option>
  <option value = "DJ"> Djibouti </option>
  <option value = "DM"> Dominique </option>
  <option value = "DO"> République dominicaine </option>
  <option value = "CE"> Équateur </option>
  <option value = "EG"> Égypte </option>
  <option value = "SV"> Salvador </option>
  <option value = "GQ"> Guinée équatoriale </option>
  <option value = "ER"> Erythrée </option> 
  <option value = "EE"> Estonie </option>
  <option value = "ET"> Ethiopie </option>
  <option value = "FK"> Îles Falkland (Malvinas) </option>
  <option value = "FO"> Îles Féroé </option>
  <option value = "FJ"> Fidji </option>
  <option value = "FI"> Finlande </option>
  <option value = "GM"> Gambie </option>
  <option value = "GE"> Géorgie </option>
  <option value = "DE"> Allemagne </option>
  <option value = "GH"> Ghana </option>
  <option value = "GI"> Gibraltar </option>
  <option value = "GR"> Grèce </option>
  <option value = "GL"> Groenland </option>
  <option value = "GD"> Grenade </option>
  <option value = "GU"> Guam </option>
  <option value = "GT"> Guatemala </option>
  <option value = "GG"> Guernesey </option>
  <option value = "GN"> Guinée </option>
  <option value = "GW"> Guinée Bissau </option>
  <option value = "GY"> Guyane </option>
  <option value = "HT"> Haïti </option> 
  <option value = "HM"> Îles Heard et McDonald </option>
  <option value = "VA"> Saint-Siège (État du Vatican) </option>
  <option value = "HN"> Honduras </option>
  <option value = "HK"> Hong Kong </option> 
  <option value = "HU"> Hongrie </option>
  <option value = "ISS"> Islande </option>
  <option value = "INN"> Inde </option>
  <option value = "IDD"> Indonésie </option>
  <option value = "IR"> Iran, République islamique d '</option>
  <option value = "IQ"> Iraq </option>
  <option value = "IE"> Irlande </option>
  <option value = "IM"> Ile de Man </option>
  <option value = "IL"> Israël </option>
  <option value = "IT"> Italie </option>
  <option value = "JM"> Jamaïque </option>
  <option value = "JP"> Japon </option>
  <option value = "JE"> Jersey </option>
  <option value = "JO"> Jordanie </option>
  <option value = "KZ"> Kazakhstan </option>
  <option value = "KE"> Kenya </option>
  <option value = "KI"> Kiribati </option>
  <option value = "KP"> Corée, République populaire démocratique de </option>
  <option value = "KR"> Corée, République de </option>
  <option value = "KW"> Koweït </option>
  <option value = "KG"> Kirghizistan </option>
  <option value = "LA"> République démocratique populaire lao </option>
  <option value = "LV"> Lettonie </option>
  <option value = "LB"> Liban </option>
  <option value = "LS"> Lesotho </option>
  <option value = "LR"> Libéria </option>
  <option value = "LY"> Libye </option>
  <option value = "LI"> Liechtenstein </option>
  <option value = "LT"> Lituanie </option>
  <option value = "LU"> Luxembourg </option>
  <option value = "MO"> Macao </option>
  <option value = "MK"> Macédoine, ancienne République yougoslave de </option>
  <option value = "MG"> Madagascar </option>
  <option value = "MW"> Malawi </option>
  <option value = "MY"> Malaisie </option>
  <option value = "MV"> Maldives </option>
  <option value = "ML"> Mali </option>
  <option value = "MT"> Malte </option>
  <option value = "MH"> Îles Marshall </option>
  <option value = "MR"> Mauritanie </option>
  <option value = "MU"> Maurice </option>
  <option value = "MX"> Mexique </option>
  <option value = "FM"> Micronésie, États fédérés de </option>
  <option value = "MD"> Moldova, République de </option>
  <option value = "MC"> Monaco </option>
  <option value = "MN"> Mongolie </option>
  <option value = "ME"> Monténégro </option>
  <option value = "MS"> Montserrat </option>
  <option value = "MA"> Maroc </option>
  <option value = "MZ"> Mozambique </option>
  <option value = "MM"> Myanmar </option>
  <option value = "NA"> Namibie </option>
  <option value = "NR"> Nauru </option>
  <option value = "NP"> Népal </option>
  <option value = "NL"> Pays-Bas </option>
  <option value = "NC"> Nouvelle-Calédonie </option>
  <option value = "NZ"> Nouvelle-Zélande </option>
  <option value = "NI"> Nicaragua </option>
  <option value = "NE"> Niger </option>
  <option value = "NG"> Nigéria </option>
  <option value = "NU"> Nioué </option>
  <option value = "NF"> Île Norfolk </option>
  <option value = "MP"> Îles Mariannes du Nord </option>
  <option value = "NO"> Norvège </option>
  <option value = "OM"> Oman </option>
  <option value = "PK"> Pakistan </option>
  <option value = "PW"> Palaos </option>
  <option value = "PS"> Territoire palestinien occupé </option>
  <option value = "PA"> Panama </option>
  <option value = "PG"> Papouasie-Nouvelle-Guinée </option>
  <option value = "PY"> Paraguay </option>
  <option value = "PE"> Pérou </option>
  <option value = "PH"> Philippines </option>
  <option value = "PN"> Pitcairn </option>
  <option value = "PL"> Pologne </option>
  <option value = "PT"> Portugal </option>
  <option value = "PR"> Porto Rico </option>
  <option value = "QA"> Qatar </option>
  <option value = "RO"> Roumanie </option>
  <option value = "RU"> Fédération de Russie </option>
  <option value = "RW"> Rwanda </option>
  <option value = "BL"> Saint Barthélemy </option>
  <option value = "SH"> Sainte-Hélène, Ascension et Tristan da Cunha </option>
  <option value = "KN"> Saint-Kitts-et-Nevis </option>
  <option value = "LC"> Sainte-Lucie </option>
  <option value = "VC"> Saint-Vincent-et-les Grenadines </option>
  <option value = "WS"> Samoa </option>
  <option value = "SM"> Saint-Marin </option> 
  <option value = "ST"> Sao Tomé et Principe </option>
  <option value = "SA"> Arabie saoudite </option>
  <option value = "SN"> Sénégal </option>
  <option value = "RS"> Serbie </option>
  <option value = "SC"> Seychelles </option>
  <option value = "SL"> Sierra Leone </option>
  <option value = "SG"> Singapour </option>
  <option value = "SX"> Sint Maarten (partie néerlandaise) </option>
  <option value = "SK"> Slovaquie </option>
  <option value = "SI"> Slovénie </option>
  <option value = "SB"> Iles Salomon </option>
  <option value = "SO"> Somalie </option>
  <option value = "ZA"> Afrique du Sud </option>
  <option value = "GS"> Îles Géorgie du Sud et Sandwich du Sud </option>
  <option value = "SS"> Soudan du Sud </option>
  <option value = "ES"> Espagne </option>
  <option value = "LK"> Sri Lanka </option>
  <option value = "SD"> Soudan </option>
  <option value = "SR"> Suriname </option>
  <option value = "SJ"> Svalbard et Jan Mayen </option>
  <option value = "SZ"> Swaziland </option>
  <option value = "SE"> Suède </option>
  <option value = "CH"> Suisse </option>
  <option value = "SY"> République arabe syrienne </option>
  <option value = "TW"> Taiwan, province de Chine </option>
  <option value = "TJ"> Tadjikistan </option>
  <option value = "TZ"> Tanzanie, République-Unie de </option>
  <option value = "TH"> Thaïlande </option>
  <option value = "TL"> Timor-Leste </option>
  <option value = "TG"> Togo </option>
  <option value = "TK"> Tokélaou </option>
  <option value = "TOO"> Tonga </option>
  <option value = "TT"> Trinité-et-Tobago </option>
  <option value = "TN"> Tunisie </option>
  <option value = "TR"> Turquie </option>
  <option value = "TM"> Turkménistan </option>
  <option value = "TC"> Îles Turques et Caïques </option>
  <option value = "TV"> Tuvalu </option>
  <option value = "UG"> Ouganda </option>
  <option value = "UA"> Ukraine </option>
  <option value = "AE"> Emirats Arabes Unis </option>
  <option value = "GB"> Royaume-Uni </option>
  <option value = "US"> États-Unis </option>
  <option value = "UM"> Îles mineures éloignées des États-Unis </option>
  <option value = "UY"> Uruguay </option>
  <option value = "UZ"> Ouzbékistan </option>
  <option value = "VU"> Vanuatu </option>
  <option value = "VE"> Venezuela, République bolivarienne de </option>
  <option value = "VN"> Viet Nam </option>
  <option value = "VG"> Îles Vierges britanniques </option>
  <option value = "VI"> Îles Vierges américaines </option>
  <option value = "WF"> Wallis et Futuna </option>
  <option value = "EH"> Sahara occidental </option>
  <option value = "YE"> Yémen </option>
  <option value = "ZM"> Zambie </option>
  <option value = "ZW"> Zimbabwe </option>
  </optgroup>
</select></p>
				
				<p style="margin:auto;text-align:center"><input style="margin:auto;text-align:center" type="submit" class="inp_99_subm" value="Valider" onclick="change();"/></p>
			</div>
		</form>
	</article>
</section>
<br><br><br>
      <?php require 'footer.php'; ?>
		</div>
	</body>
</html>
