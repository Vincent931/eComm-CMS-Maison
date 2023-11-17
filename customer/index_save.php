<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
if(isset($_GET['payment']) AND $_GET['payment']=='monetico'){
$bank="monetico";
} else if(isset($_GET['payment']) AND $_GET['payment']=='paypal'){
$bank="paypal"; 
} else if(isset($_GET['payment']) AND $_GET['payment']=='bitpay'){
$bank="bitpay";
} else if(isset($_GET['payment']) AND $_GET['payment']=='paypal-SDK'){
$bank="paypal-SDK";
} else if(isset($_GET['payment']) AND $_GET['payment']=='cheque'){
$bank="cheque";
}else { header('Location:../panier.php');}

require '../boutique0.php';

$ref2="click";
if(isset($_GET['option']) AND $_GET['option']=="click"){
	$req77=$bdd->prepare('UPDATE commande SET ref2=:ref2 WHERE reference=:reference');
	$req77->execute(array('ref2'=>$ref2, 'reference'=>$_SESSION['reference']));
}

require '../texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require '../boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();

if(isset($_COOKIE['email']) AND !empty($_COOKIE['email'])){$_SESSION['mail']=$_COOKIE['email'];} else {$_SESSION['mail']="";}
?>

<!DOCTYPE html>
<html id="bloc_page">
  <?php require 'head.php';?>
  <style>
/*Customer index*/
#ind_paie{
    text-align:center;
    width: 400px;
    margin-left: 150%;
    margin-right: 150%;
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
  text-decoration: none;
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
	display: inline-block;
  vertical-align:middle;
  text-align:center;
  font-weight:bold;
  font-size: 14px;
  color: #289AFE;
  text-decoration:none;
}
#banniere2,#span_ban2,#span_ban2 a{
	text-decoration: none;
	color: #5B6975;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px){

/*banniere*/
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
/*index*/
#ind_paie{
    text-align:center;
    width: 330px;
    margin-left: 0;
    margin-right: 0;
}
@-moz-document url-prefix(){
}
}
</style>
<meta name="robots" content="noindex">
</head>
<body style="text-align:center">
<div id="ind_paie">
<?php $req77=$bdd->query('SELECT * FROM click_c');
$donnees77=$req77->fetch();
if($donnees77['remplace']!="oui"){
	?>

<div id="containair">
     <div id="banniere_select"><span id="span_select"><a href="Adresse-Facturation-Paiement-<?php echo $bank;?>-">Facturation</a></span></div>
     <div id="banniere2"><span id="span_ban2"><a href="Adresse-Livraison">Livraison</a></span></div>
     <div id="banniere3"><span id="span_ban3"><a href="<?php if ($bank=="monetico"){echo "../paiement/RECAPITULATIF";}elseif ($bank=="paypal"){echo "../paypal/RECAPITULATIF";}elseif ($bank=="paypal-SDK"){echo "../paypal-SDK/RECAPITULATIF";}elseif ($bank=="cheque"){echo "../cheque/RECAPITULATIF";}?>">Récapitulatif</a></span></div>
     <div id="banniere4"><span id="span_ban4">Paiement</span></div>
</div>
<?php } ?>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
<br><div id="ind_paie_h1h4">
 <!--<div style="text-shadow:none;min-width:1000px;text-align:left" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<h1>Paiement</h1>
	<?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>'; $_SESSION['message']="";} ?>		

   		<h4><?php if($donnees77['remplace']!="oui"){ ?>Etape 1/3 - <?php } ?>Adresse de Facturation</h4>
</div>
   	<section>
   	<article>	
   	</br></br>
		<form method="POST" style="margin:auto" class="form_99_500" action="Adresse-Livraison" name="adresse_form" id="adresse_form">
<input type="hidden" name="bank" id="bank" value="<?php echo $bank;?>"/>

<div id="ind_paie_bloc">
				<?php 
				if(isset($_SESSION['mail']))
				{
						$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
						$req->execute(array($_SESSION['mail']));
						$donnees=$req->fetch();
				} 

				$_SESSION['cgv']='oui';

				if(isset($_SESSION['message'])){echo '<h4>'.$_SESSION['message'].'</h4>'; $_SESSION['message']="";} ?>
				<p style="text-align:left"><a class="inp_99_subm" href="../mise-en-garde.php">Voir les CGV</a></p>
				<p>&nbsp;</p>

				<p style="text-align:left"><label for="cgv" >J'accepte les CGV </label>
				<input id="check_paie" type="checkbox" name="cgv" id="cgv" value="<?php echo 'oui'; ?>"/></p>
				<p>&nbsp;</p>

				<p style="text-align:left"><label for="international">Vente à l'international </label>
				<input id="check_paie" type="checkbox" name="international" value="international_oui"/></p>
				<p>&nbsp;</p>
				
				<p style="margin:auto;text-align:center"><label for="mail" class="heading">E-mail </label></p>
				<p style="margin-right:30px"><input class="inp_99" type="email" name="mail" id="mail" value="<?php echo htmlspecialchars($_SESSION['mail']); ?>"/></p>

				<p style="margin:auto;text-align:center"><label for="prenom" class="heading">Prénom </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="prenom" id="prenom" value="<?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);} ?>"/></p>

				<p style="margin:auto;text-align:center"><label for="nom" class="heading">Nom </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="nom" id="nom" value="<?php if(isset($donnees['nom'])){echo htmlspecialchars($donnees['nom']); }?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="societe" class="heading">Société </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="societe" id="societe" value="<?php if(isset($donnees['societe'])){echo htmlspecialchars($donnees['societe']); }?>"/></p>

				<p style="margin:auto;text-align:center"><label for="adresse1" class="heading">Adresse </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="adresse1" id="adresse1" value="<?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']); }?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="adresse2" class="heading">Complément d'adresse </label>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="adresse2" id="adresse2" value="<?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']); }?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="code_postal" class="heading">Code Postal </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="code_postal" id="code_postal" value="<?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']); }?>"/></p>
				
				<p style="margin:auto;text-align:center"><label for="ville" class="heading">Ville </label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="ville" id="ville" value="<?php if(isset($donnees['ville'])){echo htmlspecialchars($donnees['ville']); }?>"/></p>

				<p style="margin:auto;text-align:center"><label for="province" class="heading">Région ou province (International)</label></p>
				<p style="margin-right:30px"><input type="text" class="inp_99" name="province" id="province" value="<?php if(isset($donnees['stateOrProvince'])){echo htmlspecialchars($donnees['stateOrProvince']);} ?>"/></p>

				<p style="margin:auto;text-align:center"><label for="pays" class="heading">Pays </label></p>
				<p style="margin-right:30px"><select name="pays" id="pays">
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
	
	<?php if($donnees77['remplace']!="oui"){
		?><p style="text-align:right;margin-right:30px"><label for="identique">Adresse de Livaison identique à facturation</label><input type="checkbox" name="identique" id="identique" value="<?php echo 'oui'; ?>"/></p>
	<?php } else {
	?><input type="hidden" name="identique" id="identique" value="<?php echo 'oui'; ?>"/>
		<input type="hidden" name="identique" id="identique" value="<?php echo 'oui'; ?>"/>
	<?php 
	}	
	?><p style="margin:auto;text-align:center"><input style="margin:auto;text-align:center" class="inp_99_subm" type="submit" value="Valider" id="inp" onclick="change();"/></p>
		</form>
	</div>
	</article>
</section>
<br><br><br>
<?php require 'footer.php';?>			
</div>
	</body>
</html>
