<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';

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
			<h2 style="text-align:center">Background Image sur Page Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Si vous ajoutez jusqu'à 3 images, l'image sur la page Accueil change toutes les 8 secondes</p>
			<p>Si vous n'ajoutez qu'une image, celle ci sera automatiquement fixe</p>
			<p>Pensez à télécharger vos images au format idéal de 1920px x 360px ( .jpg uniquement)</p>
			<p>Effacer vos cookies et données de sites si Problème d'affichage !!!</p>
			<div style="display:inline-block">
    		<a style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="image-bank.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Image Bank</a> 
			</div>
			<br><br>
			<?php $req301=$bdd1->query('SELECT * FROM background');
			$donnees301=$req301->fetch(); ?>
		
			<p>Image1 <img src="../publicimgs/<?php echo $donnees301['back1'];?>" style="width:350px;margin:auto;text-align:center"/><a href="back-erase.php?int=back1&id=<?php echo $donnees301['id'];?>">Effacer</a></p>
			<p>Image2 <img src="../publicimgs/<?php echo $donnees301['back2'];?>" style="width:350px;margin:auto;text-align:center"/><a href="back-erase.php?int=back2&id=<?php echo $donnees301['id'];?>">Effacer</a></p>
			<p>Image3 <img src="../publicimgs/<?php echo $donnees301['back3'];?>" style="width:350px;margin:auto;text-align:center"/><a href="back-erase.php?int=back3&id=<?php echo $donnees301['id'];?>">Effacer</a></p>

				<form method="post" action="back-image.list.php" enctype="multipart/form-data">
				<p><input type="submit" value="Envoyer"/></p>

				<label for="back1">Image1</label>&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="background" id="back1" value="back1"/></br>

				<label for="back2">Image2</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="background" id="back2" value="back2"/></br>

				<label for="back3">Image3</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="background" id="back3"  value="back3"/></br>

				<p><label for="image">Sélectionnez l'image (.jpg)</label>
		        <input type="file" name="image" id="image"/></p>
		</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>