<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
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
			<h4>Lister Toutes Les adresses</h4>
			<br><br>
			<div style="margin:auto;text-align:left;width:400px">
			<?php $i=0; 
			$req=$bdd1->query('SELECT * FROM listing');
				while($donnees=$req->fetch()){
					$i++;
					echo $donnees['adresse'].';<br>';
				} ?>
			</div>
		</div>
		<p style="color:red;margin:auto;text-align:left;width:400px"><?php echo $i;?> adresses sans doublons en BDD</p>
      <br><br><br><br><br>
	</body>
</html>