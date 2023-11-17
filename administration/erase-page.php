<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
$id=$_GET['id'];
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;margin:auto;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<?php $req150=$bdd->prepare('SELECT * FROM page WHERE id=?');
			$req150->execute(array($id));
			$donnees150=$req150->fetch();
?>
<p>&nbsp;</p>
<p style="text-align:center; margin:auto; width:300px">Vous êtes sur de vouloir effacer <span style="color:red"><?php echo $donnees150['nom'];?></span></p>
<br><br>
<form method="post" action="erase-page2.php" style="width:300px;margin:auto;text-align:center">
	<input style="color:red" type="submit" value="Effacer"/>
	<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
</form>
<br><br>
	<a href="pages.php" style="margin:auto;text-align:center;border:1px solid gray">Annuler</a>
</div>

   </head>
   <body>
      <br><br><br><br><br>
	</body>
</html>
