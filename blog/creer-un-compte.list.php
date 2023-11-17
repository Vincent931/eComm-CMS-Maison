<?php session_start();

$url="";
$urlpanier="";
if(isset($_GET['url']) AND !empty($_GET['url'])){
   $url=$_GET['url'];
   if($url=="panier"){
      $urlpanier='?url=panier';
   }
}

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
$req50=$bdd1->query('SELECT * FROM societe');
$donnees50=$req50->fetch();
$nbre=strlen($donnees50['url']);
$nbre1=$nbre+25;
//if(substr($_SERVER['HTTP_REFERER'],0,$nbre1)==$donnees50['url'].'/blog/creer-un-compte.php'){
require 'boutique0.php';

require 'blog2.php';

   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail_un = htmlspecialchars($_POST['mail']);
   $mail_deux = htmlspecialchars($_POST['mail2']);
   $mail1 = strtolower($mail_un);
   $mail2 = strtolower($mail_deux);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $pseudoexist=0;
   $req=$bdd->query('SELECT pseudo FROM compte');
   while($donnees=$req->fetch()){
    $pseudo1=htmlspecialchars($donnees['pseudo']);
    if($pseudo1==$pseudo){
      $pseudoexist=1;
    }
   }
if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
  if($pseudolength <= 255) {
    if($mail1 == $mail2) {
      if(filter_var($mail1, FILTER_VALIDATE_EMAIL)) {
      $reqmail = $bdd->prepare("SELECT * FROM compte WHERE mail = ?");
      $reqmail->execute(array($mail1));
      $mailexist = $reqmail->rowCount();
        if($mailexist == 0) {
          if($mdp == $mdp2) {
          $_SESSION['mail']=$mail1;
          $longueurKey = 19;
          $key = "";
          for($i=1;$i<$longueurKey;$i++) {
          $key .= mt_rand(0,9);
          }
            if($pseudoexist!=1) {
            setcookie('email',$mail1, time()+ 365*24*3600,'/',null, false, true); 
            $nul="";
            $confirme=0;
            $journalise='oui';
            $req1 = $bdd->prepare('INSERT INTO compte(pseudo, mail, motdepasse, confirmkey, confirme, nom, prenom, societe, adresse1, adresse2, code_postal, ville, stateOrProvince, pays, pays_string, nom_livr, prenom_livr, societe_livr, adresse1_livr, adresse2_livr, code_postal_livr, ville_livr, stateOrProvince_livr, pays_livr, pays_livr_string, journalise) VALUES(:pseudo, :mail, :motdepasse, :confirmkey, :confirme, :nom, :prenom, :societe, :adresse1, :adresse2, :code_postal, :ville, :stateOrProvince, :pays, :pays_string, :nom_livr, :prenom_livr, :societe_livr, :adresse1_livr, :adresse2_livr, :code_postal_livr, :ville_livr, :stateOrProvince, :pays_livr, :pays_livr_string, :journalise)');
            $req1->execute(array(
              'pseudo'=>$pseudo,
              'mail'=>$mail1,
              'motdepasse'=>$mdp,
              'confirmkey'=>$key,
              'confirme'=>$confirme,
              'nom'=>$nul,
              'prenom'=>$nul, 
              'societe'=>$nul,
              'adresse1'=>$nul,
              'adresse2'=>$nul,
              'code_postal'=>$nul,
              'ville'=>$nul,
              'stateOrProvince'=>$nul,
              'pays'=>$nul,
              'pays_string'=>$nul,
              'nom_livr'=>$nul,
              'prenom_livr'=>$nul,
              'societe_livr'=>$nul,
              'adresse1_livr'=>$nul,
              'adresse2_livr'=>$nul,
              'code_postal_livr'=>$nul,
              'ville_livr'=>$nul,
              'stateOrProvince_livr'=>$nul,
              'pays_livr'=>$nul,
              'pays_livr_string'=>$nul,
              'journalise'=>$journalise));

              $req1->closeCursor();
              $_SESSION['mail']=$mail1;

$req21=$bdd1->query('SELECT compte_creation FROM mails');
$mail_creation=$req21->fetch();
$mail_compte=$mail_creation['compte_creation'];

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

$int='bandeau';
$req24=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req24->execute(array($int));
$donnees10=$req24->fetch();
$image=$donnees10['nom'];

require 'mail-compte.php';

            } else {
                      $_SESSION['message']= "Pseudo déjà existant, Veuillez en choisir un autre.";}
          } else {
                     $_SESSION['message'] = "Vos mots de passes ne correspondent pas. Veuillez réitérer votre requête.";}
        } else {
                  $_SESSION['message'] = 'Adresse mail déjà utilisée. Veuillez réiterer votre requête.';}
      } else {
               $_SESSION['message'] = "Votre adresse mail n'est pas valide. Veuillez réitérer votre requête.";}
    } else {
            $_SESSION['message'] = "Vos adresses mail ne correspondent pas. Veuillez réitérer votre requête.";}
  } else {
         $_SESSION['message'] = "Votre pseudo ne doit pas dépasser 255 caractères. Veuillez réitérer votre requête.";}
} else {
      $_SESSION['message'] = "Tous les champs doivent être complétés. Veuillez réitérer votre requête.<br><br><a style=\"margin:auto;text-align:center\" href=\"creer-un-compte\" class=\"inp_99_subm\">Retour</a>";}
//header("Location:creer-un-compte.php");
//}
?>
<style>
#com_list{
  width:305px;
  margin-left:auto;
  margin-right: auto;
  margin-top: 80px;
  margin-bottom: 10px;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
  #com_list{
  width:330px;
  margin-left:0;
  margin-right: 0;
  margin-top: 92px;
  margin-bottom: 10px;
  position: relative;
  top: -160px;
  left: 20px;
  }
  @-moz-document url-prefix(){
}
}
</style>
<!DOCTYPE html>
  <html id="bloc_page">
<?php require 'boutique0.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require 'head.php';?>
   <body>
    <div>
<?php require 'header.php'; ?>
<br><br>
<div id="com_list">
<?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>'; $_SESSION['message']="";} ?>
<br><br>
<form method="post" action="creer-un-compte-list.after.php<?php if(isset($url) AND $url=="panier"){echo $urlpanier;}?>">
<p style="margin:auto;text-align:center"><input class="inp_99_subm" type="submit" value="Envoyer"/></p>
<br><br>
<p style="margin:auto;text-align:right"><label for="prenom" class="heading">Prénom </label>
<input type="text" class="inp_99" name="prenom" id="prenom"/></p>

<p style="margin:auto;text-align:right"><label for="nom" class="heading">Nom </label>
<input type="text" class="inp_99" name="nom" id="nom"/></p>
        
<p style="margin:auto;text-align:right"><label for="societe" class="heading">Société </label>
<input type="text" class="inp_99" name="societe" id="societe"/></p>

<p style="margin:auto;text-align:right"><label for="adresse1" class="heading">Adresse </label>
<input type="text" class="inp_99" name="adresse1" id="adresse1"/></p>
        
<p style="margin:auto;text-align:right"><label for="adresse2" class="heading">Complément d'adresse </label>
<input type="text" class="inp_99" name="adresse2" id="adresse2"/></p>
        
<p style="margin:auto;text-align:right"><label for="code_postal" class="heading">Code Postal </label>
<input type="text" class="inp_99" name="code_postal" id="code_postal"/></p>
        
<p style="margin:auto;text-align:right"><label for="ville" class="heading">Ville </label>
<input type="text" class="inp_99" name="ville" id="ville"/></p>

<p style="margin:auto;text-align:right"><label for="province" class="heading">Région ou province (International)</label>
<input type="text" class="inp_99" name="province" id="province"/></p>

<p style="margin:auto;text-align:right"><label for="pays" class="heading">Pays </label>
<select name="pays" id="pays">
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
</form>
</div>
    <br><br><br><br><br>

    </div>
    <!-- Javascript -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery.easing.min.js"></script>
        <script src="../assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="../assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="../assets/js/custom.js"></script>
</body>
</html>