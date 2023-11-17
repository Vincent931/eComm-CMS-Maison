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
			</div></br><br><br>
			<?php $req=$bdd1->query('SELECT * FROM lignep');
			$donnees=$req->fetch();
			?>
	<form method="post" action="ligne-panier.php">
		<input type="submit" value="Sauvegarder"/>
		<p><label for="lignep">Contenu de la ligne<span style="font-size:8px">(1)</span> présente sur page Panier.php</label></p>
		<p><textarea id="lignep" name="lignep" cols=60 row=5 ><?php echo $donnees['contenu'];?></textarea></p>
	</form>		
		</div>
      <br><br><br><br><br>
	</body>
</html>