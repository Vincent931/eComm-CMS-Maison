<?php session_start(); 
require 'texte1.php';
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
			<h2 style="text-align:center">Conversion $USD->€EUR</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center; color:red; margin:auto">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Vous pouvez afficher tous les prix en $, les opérations bancaires se feront toujours en $ (prévenez votre banque pour que les paiements soient acceptés en $).</p>
			<p>Si vous cochez l'option €, tous les prix seront affiché en €.</p>
			<h4 style="color:blue; text-align:center, margin:auto">Configuration de l'affichage $ ou € sur la boutique</h4>
			<?php $req2=$bdd->query('SELECT * FROM taux_USD');
			$donnees2=$req2->fetch();
			?>
		<form style="text-align:right;width:450px;margin:auto" method="post" action="conversion.php">
			<input style="text-align:center; margin:auto" type="submit" value="Changer"/>
			<p><label for="oui">Dollars $ </label><input type="radio" name="dollar" id="oui" value="oui" <?php if ($donnees2['ok']=='oui'){ echo "checked=\"checked\"";}?>/></p>
			<p><label for="non">Euros € </label><input type="radio" name="dollar" id="non" value="non" <?php if ($donnees2['ok']!='oui'){ echo "checked=\"checked\"";}?>/></p>
		</form>
		<br><br>

		</div>
      <br><br><br><br><br>
	</body>
</html>