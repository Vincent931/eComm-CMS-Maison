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
			<h2 style="text-align:center">Index->tarifs</h2>
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
			<h4>Index->tarifs</h4>
			<?php $req2=$bdd->query('SELECT * FROM redirect');
			$donnees2=$req2->fetch();?>
			<p style="width:600px;margin:auto; text-align:left">Vous pouvez faire une redirection automatique de la page d'accueil vers la Page produits.</p>
			<form method="post" action="indexto-ch.php" style="text-align:right;width:800px; margin:auto">
				<p>Faire la redirection ?
					<input type="radio" name="redirect" value="oui" id="oui" <?php if($donnees2['redirect']=="oui"){echo "checked";}?>/><label for="oui">Oui</label>
					<input type="radio" name="redirect" value="non" id="non" <?php if($donnees2['redirect']!="oui"){echo "checked";}?>/><label for="non">Non</label>
				</p>
				<p><label for="url">url de redirection (ex: tarifs.php ou https://monsite.com/tarifs.php) </label><input type="text" name="url" id="url" value="<?php if (isset($donnees2['url']) AND !empty($donnees2['url'])){echo $donnees2['url']; } ?>"/></p>
				<p>
					<input type="submit" value="Rediriger"/>
				</p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>