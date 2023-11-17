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
<?php require 'head-js-ch.php';?>
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
<div>
	<p>Ajouter une page en premier lieu</p>
	<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
	<form method="post" action="page-add.php">
		<label for="page_add">Nom de la page (sans ".php")</label>
		<input type="text" id="page_add" name="page_add"/>
		<input type="submit" value="Ajouter Page"/>
	</form>
</div>
<br><br>
<p>Vos Pages</p>
<div>
	<?php
	$_SESSION['x']=0;

	$x=0;$req151=$bdd->query('SELECT * FROM page');
	while($donnees151=$req151->fetch()){
		$x++;
		$_SESSION['x']=$x;

		}
		?>

<?php

$req150=$bdd->query('SELECT * FROM page ORDER BY id DESC');
while($donnees150=$req150->fetch()){
	if(isset($donnees150['nom']) AND !empty($donnees150['nom'])){
		?>
		<p><a href="pages.php?nom=<?php echo $donnees150['nom'];?>"><input style="color:blue" type="button" id="inp1" value="<?php echo $donnees150['nom'];?>"/></a></p>
<?php }
}
?>
</div>
   <body>
      <br><br><br><br><br>
	</body>
</html>
