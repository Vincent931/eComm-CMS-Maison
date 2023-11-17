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
			<h2 style="text-align:center">Configurer Paypal</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white;color:red;text-align:center;margin:auto">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
$req=$bdd1->query('SELECT * FROM paypal');
$donnees=$req->fetch();
?>
			<div style="width:600px;margin:auto;text-align:left">
			<p>Créez un compte Paypal Pro sur: <a href="https://www.paypal.com/fr/webapps/mpp/merchant">https://www.paypal.com/fr/webapps/mpp/merchant</a></p>
			<p>Attachez un compte Baintree à ce compte sur: <a href="https://www.braintreegateway.com/login"> https://www.braintreegateway.com/login</a></p>
			<p>Environnement = sandbox pour les tests</p>
			<p>Environnement = production pour encaisser</p>
			<p>Fournissez vos clés :(publique et privé) et votre id_marchand obtenu sur Braintree</p>
			<p>Attention les clés sont différentes suivant que vous soyez en sandbox ou en production</p>
			<p>Pour re-créditer un client aller dans l'administration braintree.</p>
			<br><br>
			</div>
			<p>Solution de Paiement <span style="color: blue">Paypal Braintree</span></p>
			<form style="width:800px;margin:auto;text-align:right" method="POST" action="paypal-ch.list.php">
				
				<p>Utilisez Paypal Braintree (vous devez avoir créé votre compte) ?
					<input type="radio" name="exist" value="oui" id="oui" <?php if($donnees['exist']=="oui"){echo "checked";}?>/><label for="oui">Oui</label>
					<input type="radio" name="exist" value="non" id="non" <?php if($donnees['exist']!="oui"){echo "checked";}?>/><label for="non">Non</label>
				</p>
				
				<p><label for="environnement">Environnement </label>
				<input type="text" name="environnement" id="environnement" value="<?php echo $donnees['environnement']; ?>"/></p>

				<p><label for="marchand_id">ID de Marchand </label>
				<input type="text" name="marchand_id" id="marchand_id" value="<?php echo $donnees['marchand_id']; ?>"/></p>
				
				<p><label for="cle_publique">Clé Publique </label>
				<input type="text" name="cle_publique" id="cle_publique" value="<?php echo $donnees['cle_publique']; ?>"/></p>
 				
 				<p><label for="cle_prive">Clé_Privé </label>
 				<input style="width:350px" type="text" name="cle_prive" id="cle_prive" value="<?php echo $donnees['cle_prive']; ?>"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Valider"/></p>
				
			</form>
		</div>
		  <br><br><br><br><br>
	</body>
</html>