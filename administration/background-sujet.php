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
			<h1>Couleur du background sur Sujets et Commentaires</h1>
			<br>
			<?php $req=$bdd1->query('SELECT * FROM colorS');
			$donnees=$req->fetch();?>
			<form method="post" action="background-sujet.list.php" style="margin:auto;text-align:center">
				<p><input style="text-align:center;margin:auto" type="submit" value="Envoyer"/></p>
				<p>&nbsp;</p>
				<p><label for="couleurBS">Couleur de fond : </label><input type="text" name="couleurBS" id="couleurBS" value="<?php echo $donnees['couleurBS'];?>"/><br>
				<p style="border:0.5px solid brown;margin:auto;text-align:center;width:50px;height:30px;background-color:<?php echo $donnees['couleurBS'];?>">&nbsp;</p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>