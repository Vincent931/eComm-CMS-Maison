<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
$_SESSION['count']=0;
$_SESSION['count1']=0;
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Configurer Paypal Checkout</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
<?php $req2=$bdd->query('SELECT * FROM paypal_checkout');
$donnees2=$req2->fetch();
$count=$req2->rowCount();
if ($count>0){$ok="oui";}
else{
	$ok="non";
} ?>

			<p>Créez un compte Paypal Pro sur: <a href="https://www.paypal.com/fr/webapps/mpp/merchant">https://www.paypal.com/fr/webapps/mpp/merchant</a></p>
			<p>Collectez vos id client, secret, dans votre dashboard Paypal</p>
			<p>Environnement = sandbox pour les tests</p>
			<p>Environnement = production pour encaisser</p>
			<p>Fournissez vos clés :(id client et secret) de votre environnement (différents suivants env: sandbox ou production)</p>
			<p>Pour re-créditer un client aller dans l'administration paypal et envoyer la somme par Paypal (nécessité d'un compte Paypal pour l'acheteur).</p>
			<p>Utilisez Paypal Checkout annule Paypal Braintree</p>
			<p>1-Créer votre compte Business dans le Dashboard Paypal</p>
			<p>2-Créer votre API rest dans le Dashboard Paypal developper</p>
			<p>3-Copier votre id client et secret (sandbox ou live)</p>
			<p>4-Définissez l'adresse retour sur htpps://monsite.com/paypal-checkout/retour-ok.php</p>
			<br><br>
			<p>Solution de Paiement</p>
			<form style="width:550px;margin:auto;text-align:right" method="POST" action="paypal-checkout-ch.list.php">
				
				<p>Utilisez Paypal Checkout ? 
					<input type="radio" name="exist" value="oui" id="oui" <?php if(isset($ok) AND $ok=="oui"){if($donnees2['exist']=="oui"){echo "checked";}}?>/><label for="oui">Oui</label>
					<input type="radio" name="exist" value="non" id="non" <?php if(isset($donnees2['exist'])){if($donnees2['exist']!="oui"){echo "checked";}}?>/><label for="non">Non</label>
				</p>
				
				<p>Environnement ?
				<input type="radio" name="env" value="sandbox" id="sandbox" <?php if(isset($ok) AND $ok=="oui"){if($donnees2['env']=="sandbox"){echo "checked";}}?>/><label for="sandbox">sandbox</label>
					<input type="radio" name="env" value="production" id="production" <?php if(isset($donnees2['env'])){if($donnees2['env']=="production"){echo "checked";}}?>/><label for="production">production</label>
				</p>

				<p><label for="client_id">ID de Client(vous) </label>
				<input type="text" name="client_id" id="client_id" value="<?php if(isset($ok) AND $ok=="oui"){echo $donnees2['client_id']; }?>"/></p>
				
				<p><label for="secret">Secret </label>
				<input type="text" name="secret" id="secret" value="<?php if(isset($ok) AND $ok=="oui"){echo $donnees2['secret']; }?>"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Valider"/></p>
				
			</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>