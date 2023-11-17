<?php session_start(); 
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
$_SESSION['count']=0;
$_SESSION['count1']=0;
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Configuration Livraison Internationale</h2>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
</br><h2 style="text-align:center">Prix du Kg</h2>
<form id="form_livr_inter" action="livraison-internationale-ch.php" method="post">
	<p style="color:blue">ATTENTION VOUS DEVEZ AVOIR COMMANDER L'OPTION POUR MONETICO<br>
	POUR PAYPAL L'OPTION EST DEBLOQUE PAR DEFAUT</p>
	<h2 style="text-align:center;margin:auto"><input style="margin:auto;text-align:center" type="submit" value="Envoyer"/></h2><br><br>
<?php $req=$bdd->query('SELECT * FROM pays1');
$donnees=$req->fetch();
echo 'France = (€-$)'.'<input type="text" class="inp_livr_inter" name="FR" id="FR" value="'.$donnees['FR'].'"/>'.
'Guadeloupe = (€-$)'.'<input type="text" class="inp_livr_inter" name="GP" id="GP" value="'.$donnees['GP'].'"/>'.
'Guyane française = (€-$)'.'<input type="text" class="inp_livr_inter" name="GF" id="GF" value="'.$donnees['GF'].'"/>'.
'Martinique = (€-)'.'<input type="text" class="inp_livr_inter" name="MQ" id="MQ" value="'.$donnees['MQ'].'"/>'.
'Mayotte = (€-$)'.'<input type="text" class="inp_livr_inter" name="YT" id="YT" value="'.$donnees['YT'].'"/>'.
'Polynésie française = (€-$)'.'<input type="text" class="inp_livr_inter" name="PF" id="PF" value="'.$donnees['PF'].'"/>'.
'Réunion = (€-)'.'<input type="text" class="inp_livr_inter" name="RE" id="RE" value="'.$donnees['RE'].'"/>'.
'Saint Martin = (€-$)'.'<input type="text" class="inp_livr_inter" name="MF" id="MF" value="'.$donnees['MF'].'"/>'.
'Saint-Pierre-et-Miquelon = (€-$)'.'<input type="text" class="inp_livr_inter" name="PM" id="PM" value="'.$donnees['PM'].'"/>'.
'Terres Australes Françaises = (€-$)'.'<input type="text" class="inp_livr_inter" name="TF" id="TF" value="'.$donnees['TF'].'"/>'.
'Afghanistan = (€-$)'.'<input type="text" class="inp_livr_inter" name="AF" id="AF" value="'.$donnees['AF'].'"/>'.
'Îles d\'Åland = (€-$)'.'<input type="text" class="inp_livr_inter" name="AXE" id="AXE" value="'.$donnees['AXE'].'"/>'.
'Albanie = (€-$)'.'<input type="text" class="inp_livr_inter" name="AL" id="AL" value="'.$donnees['AL'].'"/>'.
'Algérie = (€-$)'.'<input type="text" class="inp_livr_inter" name="DZ" id="DZ" value="'.$donnees['DZ'].'"/>'.
'Samoa américaines = (€-$)'.'<input type="text" class="inp_livr_inter" name="ASS" id="ASS" value="'.$donnees['ASS'].'"/>'.//AS=Samoa américaines**************************************************************************************************************************
'Andorre = (€-$)'.'<input type="text" class="inp_livr_inter" name="AD" id="AD" value="'.$donnees['AD'].'"/>'.
'Angola = (€-$)'.'<input type="text" class="inp_livr_inter" name="AO" id="AO" value="'.$donnees['AO'].'"/>'.
'Anguilla = (€-$)'.'<input type="text" class="inp_livr_inter" name="AI" id="AI" value="'.$donnees['AI'].'"/>'.
'Antarctique = (€-$)'.'<input type="text" class="inp_livr_inter" name="AQ" id="AQ" value="'.$donnees['AQ'].'"/>'.
'Antigua-et-Barbuda = (€-$)'.'<input type="text" class="inp_livr_inter" name="AG" id="AG" value="'.$donnees['AG'].'"/>'.
'Argentine = (€-$)'.'<input type="text" class="inp_livr_inter" name="AR" id="AR" value="'.$donnees['AR'].'"/>'.
'Aruba = (€-$)'.'<input type="text" class="inp_livr_inter" name="AW" id="AW" value="'.$donnees['AW'].'"/>'.
'Australie = (€-$)'.'<input type="text" class="inp_livr_inter" name="AU" id="AU" value="'.$donnees['AU'].'"/>'.
'Autriche = (€-$)'.'<input type="text" class="inp_livr_inter" name="AT" id="AT" value="'.$donnees['AT'].'"/>'.
'Azerbaïdjan = (€-$)'.'<input type="text" class="inp_livr_inter" name="AZ" id="AZ" value="'.$donnees['AZ'].'"/>';

$req2=$bdd->query('SELECT * FROM pays2');
$donnees2=$req2->fetch();


echo 'Bahamas = (€-$)'.'<input type="text" class="inp_livr_inter" name="BS" id="BS" value="'.$donnees2['BS'].'"/>'.
'Bahreïn = (€-$)'.'<input type="text" class="inp_livr_inter" name="BH" id="BH" value="'.$donnees2['BH'].'"/>'.
'Bangladesh = (€-$)'.'<input type="text" class="inp_livr_inter" name="BD" id="BD" value="'.$donnees2['BD'].'"/>'.
'Barbados = (€-$)'.'<input type="text" class="inp_livr_inter" name="BB" id="BB" value="'.$donnees2['BB'].'"/>'.
'Biélorussie = (€-$)'.'<input type="text" class="inp_livr_inter" name="BYY" id="BYY" value="'.$donnees2['BYY'].'"/>'.//BY=Biélorussie************************************************************************************************************************************
'Belgique = (€-$)'.'<input type="text" class="inp_livr_inter" name="BE" id="BE" value="'.$donnees2['BE'].'"/>'.
'Belize = (€-$)'.'<input type="text" class="inp_livr_inter" name="BZ" id="BZ" value="'.$donnees2['BZ'].'"/>'.
'Bénin = (€-$)'.'<input type="text" class="inp_livr_inter" name="BJ" id="BJ" value="'.$donnees2['BJ'].'"/>'.
'Bermudes = (€-$)'.'<input type="text" class="inp_livr_inter" name="BM" id="BM" value="'.$donnees2['BM'].'"/>'.
'Bhoutan = (€-$)'.'<input type="text" class="inp_livr_inter" name="BT" id="BT" value="'.$donnees2['BT'].'"/>'.
'État de Bolivie = (€-$)'.'<input type="text" class="inp_livr_inter" name="BO" id="BO" value="'.$donnees2['BO'].'"/>'.
'Bonaire, Saint-Eustache et Saba = (€-$)'.'<input type="text" class="inp_livr_inter" name="BQ" id="BQ" value="'.$donnees2['BQ'].'"/>'.
'Bosnie-Herzégovine = (€-$)'.'<input type="text" class="inp_livr_inter" name="BA" id="BA" value="'.$donnees2['BA'].'"/>'.
'Botswana = (€-$)'.'<input type="text" class="inp_livr_inter" name="BW" id="BW" value="'.$donnees2['BW'].'"/>'.
'Île Bouvet = (€-$)'.'<input type="text" class="inp_livr_inter" name="BV" id="BV" value="'.$donnees2['BV'].'"/>'.
'Brésil = (€-$)'.'<input type="text" class="inp_livr_inter" name="BR" id="BR" value="'.$donnees2['BR'].'"/>'.
'Territoire britannique de l\'océan Indien = (€-$)'.'<input type="text" class="inp_livr_inter" name="IO" id="IO" value="'.$donnees2['IO'].'"/>'.
'Brunéi Darussalam = (€-$)'.'<input type="text" class="inp_livr_inter" name="BN" id="BN" value="'.$donnees2['BN'].'"/>'.
'Bulgarie = (€-$)'.'<input type="text" class="inp_livr_inter" name="BG" id="BG" value="'.$donnees2['BG'].'"/>'.
'Burkina Faso = (€-$)'.'<input type="text" class="inp_livr_inter" name="BF" id="BF" value="'.$donnees2['BF'].'"/>'.
'Burundi = (€-$)'.'<input type="text" class="inp_livr_inter" name="BI" id="BI" value="'.$donnees2['BI'].'"/>'.
'Cambodge = (€-$)'.'<input type="text" class="inp_livr_inter" name="KH" id="KH" value="'.$donnees2['KH'].'"/>'.
'Cameroun = (€-$)'.'<input type="text" class="inp_livr_inter" name="CM" id="CM" value="'.$donnees2['CM'].'"/>'.
'Canada = (€-$)'.'<input type="text" class="inp_livr_inter" name="CA" id="CA" value="'.$donnees2['CA'].'"/>'.
'Cap Vert = (€-$)'.'<input type="text" class="inp_livr_inter" name="CV" id="CV" value="'.$donnees2['CV'].'"/>';

$req3=$bdd->query('SELECT * FROM pays3');
$donnees3=$req3->fetch();


echo 'Iles Caïman = (€-$)'.'<input type="text" class="inp_livr_inter" name="KY" id="KY" value="'.$donnees3['KY'].'"/>'.
'République centrafricaine = (€-$)'.'<input type="text" class="inp_livr_inter" name="CF" id="CF" value="'.$donnees3['CF'].'"/>'.
'Tchad = (€-$)'.'<input type="text" class="inp_livr_inter" name="TD" id="TD" value="'.$donnees3['TD'].'"/>'.
'Chili = (€-$)'.'<input type="text" class="inp_livr_inter" name="CL" id="CL" value="'.$donnees3['CL'].'"/>'.
'Chine = (€-$)'.'<input type="text" class="inp_livr_inter" name="CN" id="CN" value="'.$donnees3['CN'].'"/>'.
'Île Christmas = (€-$)'.'<input type="text" class="inp_livr_inter" name="CX" id="CX" value="'.$donnees3['CX'].'"/>'.
'Îles Cocos (Keeling) = (€-$)'.'<input type="text" class="inp_livr_inter" name="CC" id="CC" value="'.$donnees3['CC'].'"/>'.
'Colombie = (€-$)'.'<input type="text" class="inp_livr_inter" name="CO" id="CO" value="'.$donnees3['CO'].'"/>'.
'Comores = (€-$)'.'<input type="text" class="inp_livr_inter" name="KM" id="KM" value="'.$donnees3['KM'].'"/>'.
'Congo = (€-$)'.'<input type="text" class="inp_livr_inter" name="CG" id="CG" value="'.$donnees3['CG'].'"/>'.
'Congo, République démocratique du = (€-$)'.'<input type="text" class="inp_livr_inter" name="CD" id="CD" value="'.$donnees3['CD'].'"/>'.
'Iles Cook = (€-$)'.'<input type="text" class="inp_livr_inter" name="CK" id="CK" value="'.$donnees3['CK'].'"/>'.
'Costa Rica = (€-$)'.'<input type="text" class="inp_livr_inter" name="CR" id="CR" value="'.$donnees3['CR'].'"/>'.
'Côte d\'Ivoire = (€-$)'.'<input type="text" class="inp_livr_inter" name="CI" id="CI" value="'.$donnees3['CI'].'"/>'.
'Croatie = (€-$)'.'<input type="text" class="inp_livr_inter" name="HR" id="HR" value="'.$donnees3['HR'].'"/>'.
'Cuba = (€-$)'.'<input type="text" class="inp_livr_inter" name="CU" id="CU" value="'.$donnees3['CU'].'"/>'.
'Curaçao = (€-$)'.'<input type="text" class="inp_livr_inter" name="CW" id="CW" value="'.$donnees3['CW'].'"/>'.
'Chypre = (€-$)'.'<input type="text" class="inp_livr_inter" name="CY" id="CY" value="'.$donnees3['CY'].'"/>'.
'République tchèque = (€-$)'.'<input type="text" class="inp_livr_inter" name="CZ" id="CZ" value="'.$donnees3['CZ'].'"/>'.
'Danemark = (€-$)'.'<input type="text" class="inp_livr_inter" name="NSP" id="NSP" value="'.$donnees3['NSP'].'"/>'.
'Djibouti = (€-$)'.'<input type="text" class="inp_livr_inter" name="DJ" id="DJ" value="'.$donnees3['DJ'].'"/>'.
'Dominique = (€-$)'.'<input type="text" class="inp_livr_inter" name="DM" id="DM" value="'.$donnees3['DM'].'"/>'.
'République dominicaine = (€-$)'.'<input type="text" class="inp_livr_inter" name="DO" id="DO" value="'.$donnees3['DO'].'"/>'.
'Équateur = (€-$)'.'<input type="text" class="inp_livr_inter" name="CE" id="CE" value="'.$donnees3['CE'].'"/>'.
'Égypte = (€-$)'.'<input type="text" class="inp_livr_inter" name="EG" id="EG" value="'.$donnees3['EG'].'"/>';

$req4=$bdd->query('SELECT * FROM pays4');
$donnees4=$req4->fetch();


echo 'Salvador = (€-$)'.'<input type="text" class="inp_livr_inter" name="SV" id="SV" value="'.$donnees4['SV'].'"/>'.
'Guinée équatoriale = (€-$)'.'<input type="text" class="inp_livr_inter" name="GQ" id="GQ" value="'.$donnees4['GQ'].'"/>'.
'Erythrée = (€-$)'.'<input type="text" class="inp_livr_inter" name="ER" id="ER" value="'.$donnees4['ER'].'"/>'.
'Estonie = (€-$)'.'<input type="text" class="inp_livr_inter" name="EE" id="EE" value="'.$donnees4['EE'].'"/>'.
'Ethiopie = (€-$)'.'<input type="text" class="inp_livr_inter" name="ET" id="ET" value="'.$donnees4['ET'].'"/>'.
'Îles Falkland (Malvinas) = (€-$)'.'<input type="text" class="inp_livr_inter" name="FK" id="FK" value="'.$donnees4['FK'].'"/>'.
'Îles Féroé = (€-$)'.'<input type="text" class="inp_livr_inter" name="FO" id="FO" value="'.$donnees4['FO'].'"/>'.
'Fidji = (€-$)'.'<input type="text" class="inp_livr_inter" name="FJ" id="FJ" value="'.$donnees4['FJ'].'"/>'.
'Finlande = (€-$)'.'<input type="text" class="inp_livr_inter" name="FI" id="FI" value="'.$donnees4['FI'].'"/>'.
'Gambie = (€-$)'.'<input type="text" class="inp_livr_inter" name="GM" id="GM" value="'.$donnees4['GM'].'"/>'.
'Géorgie = (€-$)'.'<input type="text" class="inp_livr_inter" name="GE" id="GE" value="'.$donnees4['GE'].'"/>'.
'Allemagne = (€-$)'.'<input type="text" class="inp_livr_inter" name="DE" id="DE" value="'.$donnees4['DE'].'"/>'.
'Ghana = (€-$)'.'<input type="text" class="inp_livr_inter" name="GH" id="GH" value="'.$donnees4['GH'].'"/>'.
'Gibraltar = (€-$)'.'<input type="text" class="inp_livr_inter" name="GI" id="GI" value="'.$donnees4['GI'].'"/>'.
'Grèce = (€-$)'.'<input type="text" class="inp_livr_inter" name="GR" id="GR" value="'.$donnees4['GR'].'"/>'.
'Groenland = (€-$)'.'<input type="text" class="inp_livr_inter" name="GL" id="GL" value="'.$donnees4['GL'].'"/>'.
'Grenade = (€-$)'.'<input type="text" class="inp_livr_inter" name="GD" id="GD" value="'.$donnees4['GD'].'"/>'.
'Guam = (€-$)'.'<input type="text" class="inp_livr_inter" name="GU" id="GU" value="'.$donnees4['GU'].'"/>'.
'Guatemala = (€-$)'.'<input type="text" class="inp_livr_inter" name="GT" id="GT" value="'.$donnees4['GT'].'"/>'.
'Guernesey = (€-$)'.'<input type="text" class="inp_livr_inter" name="GG" id="GG" value="'.$donnees4['GG'].'"/>'.
'Guinée = (€-$)'.'<input type="text" class="inp_livr_inter" name="GN" id="GN" value="'.$donnees4['GN'].'"/>'.
'Guinée Bissau = (€-$)'.'<input type="text" class="inp_livr_inter" name="GW" id="GW" value="'.$donnees4['GW'].'"/>'.
'Guyane = (€-$)'.'<input type="text" class="inp_livr_inter" name="GY" id="GY" value="'.$donnees4['GY'].'"/>'.
'Haïti = (€-$)'.'<input type="text" class="inp_livr_inter" name="HT" id="HT" value="'.$donnees4['HT'].'"/>'.
'Îles Heard et McDonald = (€-$)'.'<input type="text" class="inp_livr_inter" name="HM" id="HM" value="'.$donnees4['HM'].'"/>';

$req5=$bdd->query('SELECT * FROM pays5');
$donnees5=$req5->fetch();


echo 'Saint-Siège (État du Vatican) = (€-$)'.'<input type="text" class="inp_livr_inter" name="VA" id="VA" value="'.$donnees5['VA'].'"/>'.
'Honduras = (€-$)'.'<input type="text" class="inp_livr_inter" name="HN" id="HN" value="'.$donnees5['HN'].'"/>'.
'Hong Kong = (€-$)'.'<input type="text" class="inp_livr_inter" name="HK" id="HK" value="'.$donnees5['HK'].'"/>'.
'Hongrie = (€-$)'.'<input type="text" class="inp_livr_inter" name="HU" id="HU" value="'.$donnees5['HU'].'"/>'.
'Islande = (€-$)'.'<input type="text" class="inp_livr_inter" name="ISS" id="ISS" value="'.$donnees5['ISS'].'"/>'.//IS=islande******************************************************************************************************************
'Inde = (€-$)'.'<input type="text" class="inp_livr_inter" name="INN" id="INN" value="'.$donnees5['INN'].'"/>'.//IN=Inde***********************************************************************************************************************
'Indonésie = (€-$)'.'<input type="text" class="inp_livr_inter" name="IDD" id="IDD" value="'.$donnees5['IDD'].'"/>'.//ID=Indonésie**************************************************************************************************************
'Iran, République islamique d \' = (€-$)'.'<input type="text" class="inp_livr_inter" name="IR" id="IR" value="'.$donnees5['IR'].'"/>'.
'Iraq = (€-$)'.'<input type="text" class="inp_livr_inter" name="IQ" id="IQ" value="'.$donnees5['IQ'].'"/>'.
'Irlande = (€-$)'.'<input type="text" class="inp_livr_inter" name="IE" id="IE" value="'.$donnees5['IE'].'"/>'.
'Ile de Man = (€-$)'.'<input type="text" class="inp_livr_inter" name="IM" id="IM" value="'.$donnees5['IM'].'"/>'.
'Israël = (€-$)'.'<input type="text" class="inp_livr_inter" name="IL" id="IL" value="'.$donnees5['IL'].'"/>'.
'Italie = (€-$)'.'<input type="text" class="inp_livr_inter" name="IT" id="IT" value="'.$donnees5['IT'].'"/>'.
'Jamaïque = (€-$)'.'<input type="text" class="inp_livr_inter" name="JM" id="JM" value="'.$donnees5['JM'].'"/>'.
'Japon = (€-$)'.'<input type="text" class="inp_livr_inter" name="JP" id="JP" value="'.$donnees5['JP'].'"/>'.
'Jersey = (€-$)'.'<input type="text" class="inp_livr_inter" name="JE" id="JE" value="'.$donnees5['JE'].'"/>'.
'Jordanie = (€-$)'.'<input type="text" class="inp_livr_inter" name="JO" id="JO" value="'.$donnees5['JO'].'"/>'.
'Kazakhstan = (€-$)'.'<input type="text" class="inp_livr_inter" name="KZ" id="KZ" value="'.$donnees5['KZ'].'"/>'.
'Kenya = (€-$)'.'<input type="text" class="inp_livr_inter" name="KE" id="KE" value="'.$donnees5['KE'].'"/>'.
'Kiribati = (€-$)'.'<input type="text" class="inp_livr_inter" name="KI" id="KI" value="'.$donnees5['KI'].'"/>'.
'Corée, République populaire démocratique de = (€-$)'.'<input type="text" class="inp_livr_inter" name="KP" id="KP" value="'.$donnees5['KP'].'"/>'.
'Corée, République de = (€-$)'.'<input type="text" class="inp_livr_inter" name="KR" id="KR" value="'.$donnees5['KR'].'"/>'.
'Koweït = (€-$)'.'<input type="text" class="inp_livr_inter" name="KW" id="KW" value="'.$donnees5['KW'].'"/>'.
'Kirghizistan = (€-$)'.'<input type="text" class="inp_livr_inter" name="KG" id="KG" value="'.$donnees5['KG'].'"/>'.
'République démocratique populaire laos = (€-$)'.'<input type="text" class="inp_livr_inter" name="LA" id="LA" value="'.$donnees5['LA'].'"/>';

$req6=$bdd->query('SELECT * FROM pays6');
$donnees6=$req6->fetch();


echo 'Lettonie = (€-$)'.'<input type="text" class="inp_livr_inter" name="LV" id="LV" value="'.$donnees6['LV'].'"/>'.
'Liban = (€-$)'.'<input type="text" class="inp_livr_inter" name="LB" id="LB" value="'.$donnees6['LB'].'"/>'.
'Lesotho = (€-$)'.'<input type="text" class="inp_livr_inter" name="LS" id="LS" value="'.$donnees6['LS'].'"/>'.
'Libéria = (€-$)'.'<input type="text" class="inp_livr_inter" name="LR" id="LR" value="'.$donnees6['LR'].'"/>'.
'Libye = (€-$)'.'<input type="text" class="inp_livr_inter" name="LY" id="LY" value="'.$donnees6['LY'].'"/>'.
'Liechtenstein = (€-$)'.'<input type="text" class="inp_livr_inter" name="LI" id="LI" value="'.$donnees6['LI'].'"/>'.
'Lituanie = (€-$)'.'<input type="text" class="inp_livr_inter" name="LT" id="LT" value="'.$donnees6['LT'].'"/>'.
'Luxembourg = (€-$)'.'<input type="text" class="inp_livr_inter" name="LU" id="LU" value="'.$donnees6['LU'].'"/>'.
'Macao = (€-$)'.'<input type="text" class="inp_livr_inter" name="MO" id="MO" value="'.$donnees6['MO'].'"/>'.
'Macédoine = (€-$)'.'<input type="text" class="inp_livr_inter" name="MK" id="MK" value="'.$donnees6['MK'].'"/>'.
'Madagascar = (€-$)'.'<input type="text" class="inp_livr_inter" name="MG" id="MG" value="'.$donnees6['MG'].'"/>'.
'Malawi = (€-$)'.'<input type="text" class="inp_livr_inter" name="MW" id="MW" value="'.$donnees6['MW'].'"/>'.
'Malaisie = (€-$)'.'<input type="text" class="inp_livr_inter" name="MY" id="MY" value="'.$donnees6['MY'].'"/>'.
'Maldives = (€-$)'.'<input type="text" class="inp_livr_inter" name="MV" id="MV" value="'.$donnees6['MV'].'"/>'.
'Mali = (€-$)'.'<input type="text" class="inp_livr_inter" name="ML" id="ML" value="'.$donnees6['ML'].'"/>'.
'Malte = (€-$)'.'<input type="text" class="inp_livr_inter" name="MT" id="MT" value="'.$donnees6['MT'].'"/>'.
'Îles Marshall = (€-$)'.'<input type="text" class="inp_livr_inter" name="MH" id="MH" value="'.$donnees6['MH'].'"/>'.
'Mauritanie = (€-$)'.'<input type="text" class="inp_livr_inter" name="MR" id="MR" value="'.$donnees6['MR'].'"/>'.
'Maurice = (€-$)'.'<input type="text" class="inp_livr_inter" name="MU" id="MU" value="'.$donnees6['MU'].'"/>'.
'Mexique = (€-$)'.'<input type="text" class="inp_livr_inter" name="MX" id="MX" value="'.$donnees6['MX'].'"/>'.
'Micronésie, États fédérés de = (€-$)'.'<input type="text" class="inp_livr_inter" name="FM" id="FM" value="'.$donnees6['FM'].'"/>'.
'Moldova, République de = (€-$)'.'<input type="text" class="inp_livr_inter" name="MD" id="MD" value="'.$donnees6['MD'].'"/>'.
'Monaco = (€-$)'.'<input type="text" class="inp_livr_inter" name="MC" id="MC" value="'.$donnees6['MC'].'"/>'.
'Mongolie = (€-$)'.'<input type="text" class="inp_livr_inter" name="MN" id="MN" value="'.$donnees6['MN'].'"/>'.
'Montserrat =(€-$)'.'<input type="text" class="inp_livr_inter" name="MS" id="MS" value="'.$donnees6['MS'].'"/>';

$req7=$bdd->query('SELECT * FROM pays7');
$donnees7=$req7->fetch();


echo 'Maroc = (€-$)'.'<input type="text" class="inp_livr_inter" name="MA" id="MA" value="'.$donnees7['MA'].'"/>'.
'Mozambique = (€-$)'.'<input type="text" class="inp_livr_inter" name="MZ" id="MZ" value="'.$donnees7['MZ'].'"/>'.
'Myanmar = (€-$)'.'<input type="text" class="inp_livr_inter" name="MM" id="MM" value="'.$donnees7['MM'].'"/>'.
'Namibie = (€-$)'.'<input type="text" class="inp_livr_inter" name="NA" id="NA" value="'.$donnees7['NA'].'"/>'.
'Nauru = (€-$)'.'<input type="text" class="inp_livr_inter" name="NR" id="NR" value="'.$donnees7['NR'].'"/>'.
'Népal = (€-$)'.'<input type="text" class="inp_livr_inter" name="NP" id="NP" value="'.$donnees7['NP'].'"/>'.
'Pays-Bas = (€-$)'.'<input type="text" class="inp_livr_inter" name="NL" id="NL" value="'.$donnees7['NL'].'"/>'.
'Nouvelle-Calédonie = (€-$)'.'<input type="text" class="inp_livr_inter" name="NC" id="NC" value="'.$donnees7['NC'].'"/>'.
'Nouvelle-Zélande = (€-$)'.'<input type="text" class="inp_livr_inter" name="NZ" id="NZ" value="'.$donnees7['NZ'].'"/>'.
'Nicaragua = (€-$)'.'<input type="text" class="inp_livr_inter" name="NI" id="NI" value="'.$donnees7['NI'].'"/>'.
'Niger = (€-$)'.'<input type="text" class="inp_livr_inter" name="NE" id="NE" value="'.$donnees7['NE'].'"/>'.
'Nigéria = (€-$)'.'<input type="text" class="inp_livr_inter" name="NG" id="NG" value="'.$donnees7['NG'].'"/>'.
'Nioué = (€-$)'.'<input type="text" class="inp_livr_inter" name="NU" id="NU" value="'.$donnees7['NU'].'"/>'.
'Île Norfolk = (€-$)'.'<input type="text" class="inp_livr_inter" name="NF" id="NF" value="'.$donnees7['NF'].'"/>'.
'Îles Mariannes du Nord = (€-$)'.'<input type="text" class="inp_livr_inter" name="MP" id="MP" value="'.$donnees7['MP'].'"/>'.
'Norvège = (€-$)'.'<input type="text" class="inp_livr_inter" name="NO" id="NO" value="'.$donnees7['NO'].'"/>'.
'Oman = (€-$)'.'<input type="text" class="inp_livr_inter" name="OM" id="OM" value="'.$donnees7['OM'].'"/>'.
'Pakistan = (€-$)'.'<input type="text" class="inp_livr_inter" name="PK" id="PK" value="'.$donnees7['PK'].'"/>'.
'Palaos = (€-$)'.'<input type="text" class="inp_livr_inter" name="PW" id="PW" value="'.$donnees7['PW'].'"/>'.
'Territoire palestinien sous dépendance = (€-$)'.'<input type="text" class="inp_livr_inter" name="PS" id="PS" value="'.$donnees7['PS'].'"/>'.
'Panama = (€-$)'.'<input type="text" class="inp_livr_inter" name="PA" id="PA" value="'.$donnees7['PA'].'"/>'.
'Papouasie-Nouvelle-Guinée = (€-$)'.'<input type="text" class="inp_livr_inter" name="PG" id="PG" value="'.$donnees7['PG'].'"/>'.
'Paraguay = (€-$)'.'<input type="text" class="inp_livr_inter" name="PY" id="PY" value="'.$donnees7['PY'].'"/>'.
'Pérou = (€-$)'.'<input type="text" class="inp_livr_inter" name="PE" id="PE" value="'.$donnees7['PE'].'"/>'.
'Philippines = (€-$)'.'<input type="text" class="inp_livr_inter" name="PH" id="PH" value="'.$donnees7['PH'].'"/>';

$req8=$bdd->query('SELECT * FROM pays8');
$donnees8=$req8->fetch();


echo 'Pitcairn = (€-$)'.'<input type="text" class="inp_livr_inter" name="PN" id="PN" value="'.$donnees8['PN'].'"/>'.
'Pologne = (€-$)'.'<input type="text" class="inp_livr_inter" name="PL" id="PL" value="'.$donnees8['PL'].'"/>'.
'Portugal = (€-$)'.'<input type="text" class="inp_livr_inter" name="PT" id="PT" value="'.$donnees8['PT'].'"/>'.
'Porto Rico = (€-$)'.'<input type="text" class="inp_livr_inter" name="PR" id="PR" value="'.$donnees8['PR'].'"/>'.
'Qatar = (€-$)'.'<input type="text" class="inp_livr_inter" name="QA" id="QA" value="'.$donnees8['QA'].'"/>'.
'Roumanie = (€-$)'.'<input type="text" class="inp_livr_inter" name="RO" id="RO" value="'.$donnees8['RO'].'"/>'.
'Fédération de Russie = (€-$)'.'<input type="text" class="inp_livr_inter" name="RU" id="RU" value="'.$donnees8['RU'].'"/>'.
'Rwanda = (€-$)'.'<input type="text" class="inp_livr_inter" name="RW" id="RW" value="'.$donnees8['RW'].'"/>'.
'Saint Barthélemy = (€-$)'.'<input type="text" class="inp_livr_inter" name="BL" id="BL" value="'.$donnees8['BL'].'"/>'.
'Sainte-Hélène, Ascension et Tristan da Cunha = (€-$)'.'<input type="text" class="inp_livr_inter" name="SH" id="SH" value="'.$donnees8['SH'].'"/>'.
'Saint-Kitts-et-Nevis = (€-$)'.'<input type="text" class="inp_livr_inter" name="KN" id="KN" value="'.$donnees8['KN'].'"/>'.
'Sainte-Lucie = (€-$)'.'<input type="text" class="inp_livr_inter" name="LC" id="LC" value="'.$donnees8['LC'].'"/>'.
'Saint-Vincent-et-les Grenadines = (€-$)'.'<input type="text" class="inp_livr_inter" name="VC" id="VC" value="'.$donnees8['VC'].'"/>'.
'Samoa = (€-$)'.'<input type="text" class="inp_livr_inter" name="WS" id="WS" value="'.$donnees8['WS'].'"/>'.
'Sao Tomé et Principe = (€-$)'.'<input type="text" class="inp_livr_inter" name="ST" id="ST" value="'.$donnees8['ST'].'"/>'.
'Arabie saoudite = (€-$)'.'<input type="text" class="inp_livr_inter" name="SA" id="SA" value="'.$donnees8['SA'].'"/>'.
'Sénégal = (€-$)'.'<input type="text" class="inp_livr_inter" name="SN" id="SN" value="'.$donnees8['SN'].'"/>'.
'Serbie = (€-$)'.'<input type="text" class="inp_livr_inter" name="RS" id="RS" value="'.$donnees8['RS'].'"/>'.
'Seychelles = (€-$)'.'<input type="text" class="inp_livr_inter" name="SC" id="SC" value="'.$donnees8['SC'].'"/>'.
'Sierra Leone = (€-$)'.'<input type="text" class="inp_livr_inter" name="SL" id="SL" value="'.$donnees8['SL'].'"/>'.
'Singapour = (€-$)'.'<input type="text" class="inp_livr_inter" name="SG" id="SG" value="'.$donnees8['SG'].'"/>'.
'Sint Maarten (partie néerlandaise) = (€-$)'.'<input type="text" class="inp_livr_inter" name="SX" id="SX" value="'.$donnees8['SX'].'"/>'.
'Slovaquie = (€-$)'.'<input type="text" class="inp_livr_inter" name="SK" id="SK" value="'.$donnees8['SK'].'"/>'.
'Slovénie = (€-$)'.'<input type="text" class="inp_livr_inter" name="SI" id="SI" value="'.$donnees8['SI'].'"/>';


$req9=$bdd->query('SELECT * FROM pays9');
$donnees9=$req9->fetch();


echo 'Iles Salomon = (€-$)'.'<input type="text" class="inp_livr_inter" name="SB" id="SB" value="'.$donnees9['SB'].'"/>'.
'Somalie = (€-$)'.'<input type="text" class="inp_livr_inter" name="SO" id="SO" value="'.$donnees9['SO'].'"/>'.
'Afrique du Sud = (€-$)'.'<input type="text" class="inp_livr_inter" name="ZA" id="ZA" value="'.$donnees9['ZA'].'"/>'.
'Îles Géorgie du Sud et Sandwich du Sud = (€-$)'.'<input type="text" class="inp_livr_inter" name="GS" id="GS" value="'.$donnees9['GS'].'"/>'.
'Soudan du Sud = (€-$)'.'<input type="text" class="inp_livr_inter" name="SS" id="SS" value="'.$donnees9['SS'].'"/>'.
'Espagne = (€-$)'.'<input type="text" class="inp_livr_inter" name="ES" id="ES" value="'.$donnees9['ES'].'"/>'.
'Sri Lanka = (€-$)'.'<input type="text" class="inp_livr_inter" name="LK" id="LK" value="'.$donnees9['LK'].'"/>'.
'Soudan = (€-$)'.'<input type="text" class="inp_livr_inter" name="SD" id="SD" value="'.$donnees9['SD'].'"/>'.
'Suriname = (€-$)'.'<input type="text" class="inp_livr_inter" name="SR" id="SR" value="'.$donnees9['SR'].'"/>'.
'Svalbard et Jan Mayen = (€-$)'.'<input type="text" class="inp_livr_inter" name="SJ" id="SJ" value="'.$donnees9['SJ'].'"/>'.
'Swaziland = (€-$)'.'<input type="text" class="inp_livr_inter" name="SZ" id="SZ" value="'.$donnees9['SZ'].'"/>'.
'Suède = (€-$)'.'<input type="text" class="inp_livr_inter" name="SE" id="SE" value="'.$donnees9['SE'].'"/>'.
'Suisse = (€-$)'.'<input type="text" class="inp_livr_inter" name="CH" id="CH" value="'.$donnees9['CH'].'"/>'.
'République arabe syrienne = (€-$)'.'<input type="text" class="inp_livr_inter" name="SY" id="SY" value="'.$donnees9['SY'].'"/>'.
'Taiwan, province de Chine = (€-$)'.'<input type="text" class="inp_livr_inter" name="TW" id="TW" value="'.$donnees9['TW'].'"/>'.
'Tadjikistan = (€-$)'.'<input type="text" class="inp_livr_inter" name="TJ" id="TJ" value="'.$donnees9['TJ'].'"/>'.
'Tanzanie, République-Unie de = (€-$)'.'<input type="text" class="inp_livr_inter" name="TZ" id="TZ" value="'.$donnees9['TZ'].'"/>'.
'Thaïlande = (€-$)'.'<input type="text" class="inp_livr_inter" name="TH" id="TH" value="'.$donnees9['TH'].'"/>'.
'Timor-Leste = (€-$)'.'<input type="text" class="inp_livr_inter" name="TL" id="TL" value="'.$donnees9['TL'].'"/>'.
'Togo = (€-$)'.'<input type="text" class="inp_livr_inter" name="TG" id="TG" value="'.$donnees9['TG'].'"/>'.
'Tokélaou = (€-$)'.'<input type="text" class="inp_livr_inter" name="TK" id="TK" value="'.$donnees9['TK'].'"/>'.
'Tonga = (€-$)'.'<input type="text" class="inp_livr_inter" name="TOO" id="TOO" value="'.$donnees9['TOO'].'"/>'.//TO=Tonga********************************************************************************************************************************
'Trinité-et-Tobago = (€-$)'.'<input type="text" class="inp_livr_inter" name="TT" id="TT" value="'.$donnees9['TT'].'"/>'.
'Tunisie = (€-$)'.'<input type="text" class="inp_livr_inter" name="TN" id="TN" value="'.$donnees9['TN'].'"/>'.
'Turquie = (€-$)'.'<input type="text" class="inp_livr_inter" name="TR" id="TR" value="'.$donnees9['TR'].'"/>';


$req10=$bdd->query('SELECT * FROM pays10');
$donnees10=$req10->fetch();


echo 'Turkménistan = (€-$)'.'<input type="text" class="inp_livr_inter" name="TM" id="TM" value="'.$donnees10['TM'].'"/>'.
'Îles Turques et Caïques = (€-$)'.'<input type="text" class="inp_livr_inter" name="TC" id="TC" value="'.$donnees10['TC'].'"/>'.
'Tuvalu = (€-$)'.'<input type="text" class="inp_livr_inter" name="TV" id="TV" value="'.$donnees10['TV'].'"/>'.
'Ouganda = (€-$)'.'<input type="text" class="inp_livr_inter" name="UG" id="UG" value="'.$donnees10['UG'].'"/>'.
'Ukraine = (€-$)'.'<input type="text" class="inp_livr_inter" name="UA" id="UA" value="'.$donnees10['UA'].'"/>'.
'Emirats Arabes Unis = (€-$)'.'<input type="text" class="inp_livr_inter" name="AE" id="AE" value="'.$donnees10['AE'].'"/>'.
'Royaume-Uni = (€-$)'.'<input type="text" class="inp_livr_inter" name="GB" id="GB" value="'.$donnees10['GB'].'"/>'.
'États-Unis d\'Amérique = (€-$)'.'<input type="text" class="inp_livr_inter" name="US" id="US" value="'.$donnees10['US'].'"/>'.
'Îles mineures éloignées des États-Unis = (€-$)'.'<input type="text" class="inp_livr_inter" name="UM" id="UM" value="'.$donnees10['UM'].'"/>'.
'Uruguay = (€-$)'.'<input type="text" class="inp_livr_inter" name="UY" id="UY" value="'.$donnees10['UY'].'"/>'.
'Ouzbékistan =(€-$)'.'<input type="text" class="inp_livr_inter" name="UZ" id="UZ" value="'.$donnees10['UZ'].'"/>'.
'Vanuatu = (€-$)'.'<input type="text" class="inp_livr_inter" name="VU" id="VU" value="'.$donnees10['VU'].'"/>'.
'Venezuela, République bolivarienne de = (€-$)'.'<input type="text" class="inp_livr_inter" name="VE" id="VE" value="'.$donnees10['VE'].'"/>'.
'Viêtnam = (€-$)'.'<input type="text" class="inp_livr_inter" name="VN" id="VN" value="'.$donnees10['VN'].'"/>'.
'Îles Vierges britanniques = (€-$)'.'<input type="text" class="inp_livr_inter" name="VG" id="VG" value="'.$donnees10['VG'].'"/>'.
'Îles Vierges américaines = (€-$)'.'<input type="text" class="inp_livr_inter" name="VI" id="VI" value="'.$donnees10['VI'].'"/>'.
'Wallis et Futuna = (€-$)'.'<input type="text" class="inp_livr_inter" name="WF" id="WF" value="'.$donnees10['WF'].'"/>'.
'Sahara occidental = (€-$)'.'<input type="text" class="inp_livr_inter" name="EH" id="EH" value="'.$donnees10['EH'].'"/>'.
'Yémen = (€-$)'.'<input type="text" class="inp_livr_inter" name="YE" id="YE" value="'.$donnees10['YE'].'"/>'.
'Zambie = (€-$)'.'<input type="text" class="inp_livr_inter" name="ZM" id="ZM" value="'.$donnees10['ZM'].'"/>'.
'Zimbabwe = (€-$)'.'<input type="text" class="inp_livr_inter" name="ZW" id="ZW" value="'.$donnees10['ZW'].'"/>';


/* $req=$bdd->query('SELECT * FROM pays1');
$donnees=$req->fetch();
echo 'France = '.$donnees['FR'].'€----'.
'Guadeloupe = '.$donnees['GP'].'€----'.
'Guyane française = '.$donnees['GF'].'€----'.
'Martinique = '.$donnees['MQ'].'€----'.
'Mayotte = '.$donnees['YT'].'€----'.
'Polynésie française = '.$donnees['PF'].'€----'.
'Réunion = '.$donnees['RE'].'€----'.
'Saint Martin = '.$donnees['MF'].'€----'.
'Saint-Pierre-et-Miquelon = '.$donnees['PM'].'€----'.
'Terres Australes Françaises = '.$donnees['TF'].'€----'.
'Afghanistan = '.$donnees['AF'].'€----'.
'Îles d\'Åland = '.$donnees['AXE'].'€----'.
'Albanie = '.$donnees['AL'].'€----'.
'Algérie = '.$donnees['DZ'].'€----'.
'Samoa américaines = '.$donnees['AS'].'€----'.
'Andorre = '.$donnees['AD'].'€----'.
'Angola = '.$donnees['AO'].'€----'.
'Anguilla = '.$donnees['AI'].'€----'.
'Antarctique = '.$donnees['AQ'].'€----'.
'Antigua-et-Barbuda = '.$donnees['AG'].'€----'.
'Argentine = '.$donnees['AR'].'€----'.
'Aruba = '.$donnees['AW'].'€----'.
'Australie = '.$donnees['AU'].'€----'.
'Autriche = '.$donnees['AT'].'€----'.
'Azerbaïdjan = '.$donnees['AZ'].'€----';

$req2=$bdd->query('SELECT * FROM pays2');
$donnees2=$req2->fetch();


echo 'Bahamas = '.$donnees2['BS'].'€----'.
'Bahreïn = '.$donnees2['BH'].'€----'.
'Bangladesh = '.$donnees2['BD'].'€----'.
'Barbados = '.$donnees2['BB'].'€----'.
'Biélorussie = '.$donnees2['BY'].'€----'.
'Belgique = '.$donnees2['BE'].'€----'.
'Belize = '.$donnees2['BZ'].'€----'.
'Bénin = '.$donnees2['BJ'].'€----'.
'Bermudes = '.$donnees2['BM'].'€----'.
'Bhoutan = '.$donnees2['BT'].'€----'.
'État de Bolivie = '.$donnees2['BO'].'€----'.
'Bonaire, Saint-Eustache et Saba = '.$donnees2['BQ'].'€----'.
'Bosnie-Herzégovine = '.$donnees2['BA'].'€----'.
'Botswana = '.$donnees2['BW'].'€----'.
'Île Bouvet = '.$donnees2['BV'].'€----'.
'Brésil = '.$donnees2['BR'].'€----'.
'Territoire britannique de l\'océan Indien = '.$donnees2['IO'].'€----'.
'Brunéi Darussalam = '.$donnees2['BN'].'€----'.
'Bulgarie = '.$donnees2['BG'].'€----'.
'Burkina Faso = '.$donnees2['BF'].'€----'.
'Burundi = '.$donnees2['BI'].'€----'.
'Cambodge = '.$donnees2['KH'].'€----'.
'Cameroun = '.$donnees2['CM'].'€----'.
'Canada = '.$donnees2['CA'].'€----'.
'Cap Vert = '.$donnees2['CV'].'€----';

$req3=$bdd->query('SELECT * FROM pays3');
$donnees3=$req3->fetch();


echo 'Iles Caïman = '.$donnees3['KY'].'€----'.
'République centrafricaine = '.$donnees3['CF'].'€----'.
'Tchad = '.$donnees3['TD'].'€----'.
'Chili = '.$donnees3['CL'].'€----'.
'Chine = '.$donnees3['CN'].'€----'.
'Île Christmas = '.$donnees3['CX'].'€----'.
'Îles Cocos (Keeling) = '.$donnees3['CC'].'€----'.
'Colombie = '.$donnees3['CO'].'€----'.
'Comores = '.$donnees3['KM'].'€----'.
'Congo = '.$donnees3['CG'].'€----'.
'Congo, République démocratique du = '.$donnees3['CD'].'€----'.
'Iles Cook = '.$donnees3['CK'].'€----'.
'Costa Rica = '.$donnees3['CR'].'€----'.
'Côte d\'Ivoire = '.$donnees3['CI'].'€----'.
'Croatie = '.$donnees3['HR'].'€----'.
'Cuba = '.$donnees3['CU'].'€----'.
'Curaçao = '.$donnees3['CW'].'€----'.
'Chypre = '.$donnees3['CY'].'€----'.
'République tchèque = '.$donnees3['CZ'].'€----'.
'Danemark = '.$donnees3['NSP'].'€----'.
'Djibouti = '.$donnees3['DJ'].'€----'.
'Dominique = '.$donnees3['DM'].'€----'.
'République dominicaine = '.$donnees3['DO'].'€----'.
'Équateur = '.$donnees3['CE'].'€----'.
'Égypte = '.$donnees3['EG'].'€----';

$req4=$bdd->query('SELECT * FROM pays4');
$donnees4=$req4->fetch();


echo 'Salvador = '.$donnees4['SV'].'€----'.
'Guinée équatoriale = '.$donnees4['GQ'].'€----'.
'Erythrée = '.$donnees4['ER'].'€----'.
'Estonie = '.$donnees4['EE'].'€----'.
'Ethiopie = '.$donnees4['ET'].'€----'.
'Îles Falkland (Malvinas) = '.$donnees4['FK'].'€----'.
'Îles Féroé = '.$donnees4['FO'].'€----'.
'Fidji = '.$donnees4['FJ'].'€----'.
'Finlande = '.$donnees4['FI'].'€----'.
'Gambie = '.$donnees4['GM'].'€----'.
'Géorgie = '.$donnees4['GE'].'€----'.
'Allemagne = '.$donnees4['DE'].'€----'.
'Ghana = '.$donnees4['GH'].'€----'.
'Gibraltar = '.$donnees4['GI'].'€----'.
'Grèce = '.$donnees4['GR'].'€----'.
'Groenland = '.$donnees4['GL'].'€----'.
'Grenade = '.$donnees4['GD'].'€----'.
'Guam = '.$donnees4['GU'].'€----'.
'Guatemala = '.$donnees4['GT'].'€----'.
'Guernesey = '.$donnees4['GG'].'€----'.
'Guinée = '.$donnees4['GN'].'€----'.
'Guinée Bissau = '.$donnees4['GW'].'€----'.
'Guyane = '.$donnees4['GY'].'€----'.
'Haïti = '.$donnees4['HT'].'€----'.
'Îles Heard et McDonald = '.$donnees4['HM'].'€----';

$req5=$bdd->query('SELECT * FROM pays5');
$donnees5=$req5->fetch();


echo 'Saint-Siège (État du Vatican) = '.$donnees5['VA'].'€----'.
'Honduras = '.$donnees5['HN'].'€----'.
'Hong Kong = '.$donnees5['HK'].'€----'.
'Hongrie = '.$donnees5['HU'].'€----'.
'Islande = '.$donnees5['IS'].'€----'.
'Inde = '.$donnees5['IN'].'€----'.
'Indonésie = '.$donnees5['ID'].'€----'.
'Iran, République islamique d \' = '.$donnees5['IR'].'€----'.
'Iraq = '.$donnees5['IQ'].'€----'.
'Irlande = '.$donnees5['IE'].'€----'.
'Ile de Man = '.$donnees5['IM'].'€----'.
'Israël = '.$donnees5['IL'].'€----'.
'Italie = '.$donnees5['IT'].'€----'.
'Jamaïque = '.$donnees5['JM'].'€----'.
'Japon = '.$donnees5['JP'].'€----'.
'Jersey = '.$donnees5['JE'].'€----'.
'Jordanie = '.$donnees5['JO'].'€----'.
'Kazakhstan = '.$donnees5['KZ'].'€----'.
'Kenya = '.$donnees5['KE'].'€----'.
'Kiribati = '.$donnees5['KI'].'€----'.
'Corée, République populaire démocratique de = '.$donnees5['KP'].'€----'.
'Corée, République de = '.$donnees5['KR'].'€----'.
'Koweït = '.$donnees5['KW'].'€----'.
'Kirghizistan = '.$donnees5['KG'].'€----'.
'République démocratique populaire laos = '.$donnees5['LA'].'€----';

$req6=$bdd->query('SELECT * FROM pays6');
$donnees6=$req6->fetch();


echo 'Lettonie = '.$donnees6['LV'].'€----'.
'Liban = '.$donnees6['LB'].'€----'.
'Lesotho = '.$donnees6['LS'].'€----'.
'Libéria = '.$donnees6['LR'].'€----'.
'Libye = '.$donnees6['LY'].'€----'.
'Liechtenstein = '.$donnees6['LI'].'€----'.
'Lituanie = '.$donnees6['LT'].'€----'.
'Luxembourg = '.$donnees6['LU'].'€----'.
'Macao = '.$donnees6['MO'].'€----'.
'Macédoine = '.$donnees6['MK'].'€----'.
'Madagascar = '.$donnees6['MG'].'€----'.
'Malawi = '.$donnees6['MW'].'€----'.
'Malaisie = '.$donnees6['MY'].'€----'.
'Maldives = '.$donnees6['MV'].'€----'.
'Mali = '.$donnees6['ML'].'€----'.
'Malte = '.$donnees6['MT'].'€----'.
'Îles Marshall = '.$donnees6['MH'].'€----'.
'Mauritanie = '.$donnees6['MR'].'€----'.
'Maurice = '.$donnees6['MU'].'€----'.
'Mexique = '.$donnees6['MX'].'€----'.
'Micronésie, États fédérés de = '.$donnees6['FM'].'€----'.
'Moldova, République de = '.$donnees6['MD'].'€----'.
'Monaco = '.$donnees6['MC'].'€----'.
'Mongolie = '.$donnees6['MN'].'€----'.
'Montserrat ='.$donnees6['MS'].'€----';

$req7=$bdd->query('SELECT * FROM pays7');
$donnees7=$req7->fetch();


'Maroc = '.$donnees7['MA'].'€----'.
'Mozambique = '.$donnees7['MZ'].'€----'.
'Myanmar = '.$donnees7['MM'].'€----'.
'Namibie = '.$donnees7['NA'].'€----'.
'Nauru = '.$donnees7['NR'].'€----'.
'Népal = '.$donnees7['NP'].'€----'.
'Pays-Bas = '.$donnees7['NL'].'€----'.
'Nouvelle-Calédonie = '.$donnees7['NC'].'€----'.
'Nouvelle-Zélande = '.$donnees7['NZ'].'€----'.
'Nicaragua = '.$donnees7['NI'].'€----'.
'Niger = '.$donnees7['NE'].'€----'.
'Nigéria = '.$donnees7['NG'].'€----'.
'Nioué = '.$donnees7['NU'].'€----'.
'Île Norfolk = '.$donnees7['NF'].'€----'.
'Îles Mariannes du Nord = '.$donnees7['MP'].'€----'.
'Norvège = '.$donnees7['NO'].'€----'.
'Oman = '.$donnees7['OM'].'€----'.
'Pakistan = '.$donnees7['PK'].'€----'.
'Palaos = '.$donnees7['PW'].'€----'.
'Territoire palestinien sous dépendance = '.$donnees7['PS'].'€----'.
'Panama = '.$donnees7['PA'].'€----'.
'Papouasie-Nouvelle-Guinée = '.$donnees7['PG'].'€----'.
'Paraguay = '.$donnees7['PY'].'€----'.
'Pérou = '.$donnees7['PE'].'€----'.
'Philippines = '.$donnees7['PH'].'€----';

$req8=$bdd->query('SELECT * FROM pays8');
$donnees8=$req8->fetch();


echo 'Pitcairn = '.$donnees8['PN'].'€----'.
'Pologne = '.$donnees8['PL'].'€----'.
'Portugal = '.$donnees8['PT'].'€----'.
'Porto Rico = '.$donnees8['PR'].'€----'.
'Qatar = '.$donnees8['QA'].'€----'.
'Roumanie = '.$donnees8['RO'].'€----'.
'Fédération de Russie = '.$donnees8['RU'].'€----'.
'Rwanda = '.$donnees8['RW'].'€----'.
'Saint Barthélemy = '.$donnees8['BL'].'€----'.
'Sainte-Hélène, Ascension et Tristan da Cunha = '.$donnees8['SH'].'€----'.
'Saint-Kitts-et-Nevis = '.$donnees8['KN'].'€----'.
'Sainte-Lucie = '.$donnees8['LC'].'€----'.
'Saint-Vincent-et-les Grenadines = '.$donnees8['VC'].'€----'.
'Samoa = '.$donnees8['WS'].'€----'.
'Saint-Martin (Fr) = '.$donnees8['MF'].'€----'.
'Sao Tomé et Principe = '.$donnees8['ST'].'€----'.
'Arabie saoudite = '.$donnees8['SA'].'€----'.
'Sénégal = '.$donnees8['SN'].'€----'.
'Serbie = '.$donnees8['RS'].'€----'.
'Seychelles = '.$donnees8['SC'].'€----'.
'Sierra Leone = '.$donnees8['SL'].'€----'.
'Singapour = '.$donnees8['SG'].'€----'.
'Sint Maarten (partie néerlandaise) = '.$donnees8['SX'].'€----'.
'Slovaquie = '.$donnees8['SK'].'€----'.
'Slovénie = '.$donnees8['SI'].'€----';

$req9=$bdd->query('SELECT * FROM pays9');
$donnees9=$req9->fetch();


echo 'Iles Salomon = '.$donnees9['SB'].'€----'.
'Somalie = '.$donnees9['SO'].'€----'.
'Afrique du Sud = '.$donnees9['ZA'].'€----'.
'Îles Géorgie du Sud et Sandwich du Sud = '.$donnees9['GS'].'€----'.
'Soudan du Sud = '.$donnees9['SS'].'€----'.
'Espagne = '.$donnees9['ES'].'€----'.
'Sri Lanka = '.$donnees9['LK'].'€----'.
'Soudan = '.$donnees9['SD'].'€----'.
'Suriname = '.$donnees9['SR'].'€----'.
'Svalbard et Jan Mayen = '.$donnees9['SJ'].'€----'.
'Swaziland = '.$donnees9['SZ'].'€----'.
'Suède = '.$donnees9['SE'].'€----'.
'Suisse = '.$donnees9['CH'].'€----'.
'République arabe syrienne = '.$donnees9['SY'].'€----'.
'Taiwan, province de Chine = '.$donnees9['TW'].'€----'.
'Tadjikistan = '.$donnees9['TJ'].'€----'.
'Tanzanie, République-Unie de = '.$donnees9['TZ'].'€----'.
'Thaïlande = '.$donnees9['TH'].'€----'.
'Timor-Leste = '.$donnees9['TL'].'€----'.
'Togo = '.$donnees9['TG'].'€----'.
'Tokélaou = '.$donnees9['TK'].'€----'.
'Tonga = '.$donnees9['TO'].'€----'.
'Trinité-et-Tobago = '.$donnees9['TT'].'€----'.
'Tunisie = '.$donnees9['TN'].'€----'.
'Turquie = '.$donnees9['TR'].'€----';

$req10=$bdd->query('SELECT * FROM pays10');
$donnees10=$req10->fetch();


echo 'Turkménistan = '.$donnees10['TM'].'€----'.
'Îles Turques et Caïques = '.$donnees10['TC'].'€----'.
'Tuvalu = '.$donnees10['TV'].'€----'.
'Ouganda = '.$donnees10['UG'].'€----'.
'Ukraine = '.$donnees10['UA'].'€----'.
'Emirats Arabes Unis = '.$donnees10['AE'].'€----'.
'Royaume-Uni = '.$donnees10['GB'].'€----'.
'États-Unis d\'Amérique = '.$donnees10['US'].'€----'.
'Îles mineures éloignées des États-Unis = '.$donnees10['UM'].'€----'.
'Uruguay = '.$donnees10['UY'].'€----'.
'Ouzbékistan ='.$donnees10['UZ'].'€----'.
'Vanuatu = '.$donnees10['VU'].'€----'.
'Venezuela, République bolivarienne de = '.$donnees10['VE'].'€----'.
'Viêtnam = '.$donnees10['VN'].'€----'.
'Îles Vierges britanniques = '.$donnees10['VG'].'€----'.
'Îles Vierges américaines = '.$donnees10['VI'].'€----'.
'Wallis et Futuna = '.$donnees10['WF'].'€----'.
'Sahara occidental = '.$donnees10['EH'].'€----'.
'Yémen = '.$donnees10['YE'].'€----'.
'Zambie = '.$donnees10['ZM'].'€----'.
'Zimbabwe = '.$donnees10['ZW'].'€----'; 
*/
?>
</form>
		</div>
      <br><br>
<form method="post" action="livraison-internationale-raz.php">
	<label for="raz">Prix du KG (tous les prix à réinitialiser!)</label><input type="text" name="raz" id="raz"/>
	<input type="submit" value="Réinitialiser"/>
</form>
      <br><br><br>
	</body>
</html>
