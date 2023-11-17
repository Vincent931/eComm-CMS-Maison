<?php session_start(); 
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">ajouter du css</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Ne changez pas le css existant, ajoutez le vôtre, si besoin réinitialisez</p>
			<a  id="grey_color" href="faketocss-reinit.php">Réinitialiser</a>
			<br>
			<h4>css</h4>
<?php $req=$bdd->query('SELECT css FROM css');
$donnees=$req->fetch();
?> <form method="post" action="faketocss-change.php">
		<p style="text-align:center"><input type="submit" value="Envoyer"/><p>
		<textarea style="width:400px; height:900px" name="css" id="css"><?php echo $donnees['css'];?></textarea>
	</form>	
		</div>
      <br><br><br><br><br>
	</body>
</html>