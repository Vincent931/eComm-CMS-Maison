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
			<h2 style="text-align:center">Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<br>
			<h4>Charger Listing Adresses emails</h4>
			<p style="color:blue">Pensez à regarder la valeur MAX_EXECUTION_TIME, UPLOAD_MAX_FILESIZE_, POST_MAX_SIZE, MEMORY_LIMIT de PHP si le fichier est volumineux</p>
			<p style="color:blue">votre listing doit comporter un email par ligne, suivi de ";" et un retour à la ligne</p>
			<p style="color:blue">Exemple</p>
			<p>adress@gmail.com;</p>
			<p>adresse1@gmail.com;</p>
			<p>adresse3@gmail.com;</p>
			<p>&nbsp;</p>
			<p style="color:blue"><span style="color:red">1ere Opération:</span> Charger le Listing (le fichier doit etre au format .txt)</p>
			<form method="post" action="charger-listing-email.list.php" enctype="multipart/form-data">
		          <p><label for="listing">Listing (.txt)</label>
		          <input type="file" name="listing" id="listing"/></p>
		          <p><input type="submit" name="submit" value="Charger"/></p>
        	</form>
        	<form method="post" action="charger-listing-email.list.bdd.php" >
		          <p style="color:blue"><span style="color:red">2ème Opération:</span> Entrez le Listing en bdd (cette opération élimine les doublons et peut être reproduite)</p>
		          <input type="hidden" value="BDD" name="bdd" id="bdd"/>
		          <p><input type="submit" name="submit" value="Entrez en BDD"/></p>
        	</form>
        	<form method="post" action="afficher-listing-email.list.php" >
		          <p style="color:blue">3ème Opération: Vous pouvez <span style="color:red">Lister</span> toutes les adresses Pour Vérification:</p>
		          <input type="hidden" value="BDD" name="bdd" id="bdd"/>
		          <p><input type="submit" name="submit" value="Lister les adresses"/></p>
        	</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>