<?php session_start();
require 'boutique0.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Lister Sons</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
  	  </br>
<div style="width:450px;margin:auto;text-align:right">
<?php require 'boutique0.php';
$req=$bdd->query('SELECT * FROM music');
while($donnees=$req->fetch())
{
?>
<p style="text-align:center"><img style="width:150px" src="../publicimgs/music.png"/></p>
<p>Description : <?php echo $donnees['description'];?></p>
<p>Nom de l'enregistrement' : <?php echo $donnees['nom'];?></p>
<audio style="display:block" src="../publicimgs/<?php echo $donnees['nom'];?>" controls width="300"></audio>
<p style="text-align:center"><a href="effacer-music.php?id=<?php echo urlencode($donnees['id']);?>">Effacer MP3</a></p>
<br>
<?php
} ?>
</div>

</div>
  <br><br><br><br><br>
  </body>
</html>