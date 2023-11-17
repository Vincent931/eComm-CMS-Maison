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
			<h2 style="text-align:center">Lister les Comptes</h2>
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
$req = $bdd->query('SELECT * FROM compte ORDER BY id ');
while ($donnees = $req->fetch())
{ ?>
	<div>
		<p><?php echo htmlspecialchars($donnees['nom']).' --- '.htmlspecialchars($donnees['prenom']); ?></p>
			<p>Mail : <a style="text-decoration:underline" href="comptes.list.php?mail=<?php echo htmlspecialchars($donnees['mail']); ?>"><?php echo htmlspecialchars($donnees['mail']); ?></a></p>
			<p><a style="text-decoration:underline" href ="comptes-effacer.php?mail=<?php echo htmlspecialchars($donnees['mail']); ?>">Effacer ce compte</a></p>
    </br>
	</div>
<?php
} 
$req->closeCursor();
?>
			
		</div>
      <br><br><br><br><br>
	</body>
</html>