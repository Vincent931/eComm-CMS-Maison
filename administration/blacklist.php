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
			<h2 style="text-align:center">Blacklist</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Toutes les IP de la blacklist interdisent l'accès aux commentaire à l'utilisateur concerné.</p>
<?php 
$req = $bdd2->query('SELECT * FROM blacklist ORDER BY id');
while ($donnees = $req->fetch())
{
?>


				<div style="text-align:center">
					<p style="border:1px solid black;width:120px;margin:auto;background-color:#DDE3E3;"><?php echo htmlspecialchars($donnees['ip']); ?></p>
				</div>
			<p><em><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="effacer-ip.post.php?id=<?php echo htmlspecialchars(urlencode($donnees['id'])); ?>">Effacer de la Blacklist</a></em></p>
<?php
} 
$req->closeCursor();
?>			<br><br>
			<form id="blacklist_form" method="post" action="ajouter-ip-blacklist.php">
				<p style="text-align:right"><label for="ip">IP à Blacklister : </label><input type="text" name="ip" id="ip"/></p>
				<p><input type="submit" value="Envoyer"/></p>
			</form>


		</div>
      <br><br><br><br><br>
	</body>
</html>