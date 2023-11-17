<?php session_start();

require 'boutique0.php';
require 'texte1.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Configurer Monético</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
$req=$bdd1->query('SELECT * FROM monetico');
$donnees=$req->fetch();
?>			<div style="width:600px;margin:auto;text-align:left">
			<p>Contactez un conseiller CIC ou Crédit Mutuel, Fournissez ces <span style="color:blue">3 urls</span>:</p>
			<p>https://monsite.com/<span style="color:blue">paiement/retour-ok.php</span></p>
			<p>https://monsite.com/<span style="color:blue">paiement/Paiement-Annule</span></p>
			<p>https://monsite.com/<span style="color:blue">paiement/interface-retour.php</span></p>
			<br>
			<p>Remplacer https://monsite.com par votre url.</p>
			<p>Valider 3 achats sur la plateforme de test avant de renseigner l'url de production.</p>
			<p>Test : https://p.monetico-services.com/test/ --- Production : https://p.monetico-services.com/</p>
			<p>Clé Mac : renseignez la bonne clé (<span style="text-decoration:underline">1 en téléchargements</span>, <span style="text-decoration:underline">1 en visible</span> sur l'espace Monético).</p>
			<p>Pour <span style="color:blue">re-créditer un client aller dans l'administration monético</span>.</p>
			<br><br>
			</div>
			<br><br>
			<p>Solution de Paiement <span style="color: blue">Monético</span></p>
			<form style="width:800px;margin:auto;text-align:right" method="POST" action="monetico-ch.list.php">
				
				<p>Utilisez Monético (Paypal braintree passe en inactif, paypal checkout peut être utilisé)
					<input type="radio" name="exist" value="oui" id="oui" <?php if($donnees['exist']=="oui"){echo "checked";}?>/><label for="oui">Oui</label>
					<input type="radio" name="exist" value="non" id="non" <?php if($donnees['exist']!="oui"){echo "checked";}?>/><label for="non">Non</label>
				</p>

				<p><label for="hash">Clé de Hashage (Hmac)</label>
				<input  style="width:450px" type="text" name="hash" id="hash" value="<?php echo $donnees['hash']; ?>"/></p>

				<p><label for="TPE">Numéro de TPE</label>
				<input type="text" name="TPE" id="TPE" value="<?php echo $donnees['TPE']; ?>"/></p>
				
				<p><label for="version">Numéro de version (3.0)</label>
				<input type="text" name="version" id="version" value="<?php echo $donnees['version']; ?>"/></p>
 				
 				<p><label for="url">url serveur</label>
 				<input style="width:350px" type="text" name="url" id="url" value="<?php echo $donnees['url']; ?>"/></p>

 				<p><label for="code">code société</label>
				<input type="text" name="code" id="code" value="<?php echo $donnees['code']; ?>"/></p>

				<p><label for="url_web">url du site (https://monsite.com)</label>
				<input style="width:350px" type="text" name="url_web" id="url_web" value="<?php echo $donnees['url_web']; ?>"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Valider"/></p>
				
			</form>
		</div>
		  <br><br><br><br><br>
	</body>
</html>