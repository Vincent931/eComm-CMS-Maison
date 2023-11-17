<?php session_start(); 
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
			<h2 style="text-align:center">Boutique</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
<?php 
$req = $bdd2->query('SELECT id, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics ORDER BY id');
while ($donnees = $req->fetch())
{
?>

	<table style="width:65%;margin-left:16%">
				<tr>
					<td>Edité le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['titre1']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['contenu1']); ?></td>	
				</tr>
			</br>
</table>
			<p><em><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="effacer-sujet.post.php?sujet=<?php echo htmlspecialchars(urlencode($donnees['id'])); ?>">Effacer ce sujet ...</a></em></p>
	<p style="background-color:black;width:80%;margin-left:auto;margin-right:auto;height:1.5px"></p>
<?php
} 
$req->closeCursor();
?>
			
		</div>
      <br><br><br><br><br>
	</body>
</html>