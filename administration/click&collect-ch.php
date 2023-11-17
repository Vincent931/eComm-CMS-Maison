<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';

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
			<h2 style="text-align:center">Click & Collect</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Le Click & Collect utilise vos Config de Paiement (Monético, Paypal Braintree, Paypal SDK), pensez à les configurer avant de faire utiliser l'option Click & Collect (Dans l'ordre de préférence (1.Monético, 2.Paypal Braintree, 3.Paypal SDK)</p>
			<br>
			<?php 
			$req=$bdd->query('SELECT * FROM click_c');
			$donnees=$req->fetch();
			?>
			<form method="post" action="click&collect-ch.list.php">
				<p>Utiliser le Click & Collect ? (Le Bouton Click & Collect apparaît sur la Page Panier)</p>
				<p><label for="existon">Oui</label>
				<input type="radio" name="existon" id="existon" value="oui" <?php if(isset($donnees['existon']) AND ($donnees['existon']=="oui")){echo "checked";}?>/>
				<label for="existon">Non</label>
				<input type="radio" name="existon" id="existon" value="non" <?php if(isset($donnees['existon']) AND ($donnees['existon']=="non")){echo "checked";}?>/></p>

				<p>N'utiliser que le Click & Collect ? (Les boutons Monético Paypal Braintree et Paypal SDK n'apparaîtront pas)</p>
				<p><label for="remplace">Oui</label>
				<input type="radio" name="remplace" id="remplace" value="oui" <?php if(isset($donnees['remplace']) AND ($donnees['remplace']=="oui")){echo "checked";}?>/>
				<label for="remplace">Non</label>
				<input type="radio" name="remplace" id="remplace" value="non" <?php if(isset($donnees['remplace']) AND ($donnees['remplace']=="non")){echo "checked";}?>/></p>

				<p>Quelle banque utiliser ?</p>
				<p><label for="optionB">Monético</label>
				<input type="radio" name="optionB" id="optionB" value="monetico" <?php if(isset($donnees['optionB']) AND ($donnees['optionB']=="monetico")){echo "checked";}?>/>
				<label for="optionB">Paypal Braintree</label>
				<input type="radio" name="optionB" id="optionB" value="braintree"<?php if(isset($donnees['optionB']) AND ($donnees['optionB']=="braintree")){echo "checked";}?>/>
				<label for="optionB">Paypal SDK</label>
				<input type="radio" name="optionB" id="optionB" value="SDK"<?php if(isset($donnees['optionB']) AND ($donnees['optionB']=="SDK")){echo "checked";}?>/></p>
				<p><input type="submit" value="Envoyer"/></p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>