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
			<h2 style="text-align:center">Police</h2>
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
			<h4>Police</h4>
			<?php $req2=$bdd->query('SELECT * FROM police');
			$donnees2=$req2->fetch();
			$url=$donnees2['url'];
			$name=$donnees2['name'];
			$format=$donnees2['format'];
			?>
			<p style="width:600px;margin:auto; text-align:left">Vous pouvez ajouter une police @import.</p>
			<form method="post" action="police-ch.php" style="text-align:right;width:600px; margin:auto">
				<p>Utiliser une police différente ?
					<input type="radio" name="exists" value="oui" id="oui" <?php if($donnees2['existson']=="oui"){echo "checked";}?>/><label for="oui">Oui</label>
					<input type="radio" name="exists" value="non" id="non" <?php if($donnees2['existson']!="oui"){echo "checked";}?>/><label for="non">Non</label>
				</p>
				<p style="text-align:left"><label style="text-align:left" for="url">Indiquez l'url à insérer (ex: http://fonts.gstatic.com/s/londrinashadow/v3/dNYuzPS_7eYgXFJBzMoKdf8mOSX00gsdbtRvMGBBXNY.woff')</label></p>
					<p><input type="text" name="url" value="<?php echo $url;?>" id="url" />
				</p>
				<p><label for="name">indiquez le nom de la police (ex:Londrina Shadow)</label>	
					<input type="text" name="name" value="<?php echo $name;?>" id="name"/></p>
				<p>
				<p><label for="format">Format (ex:woff) </label>	
					<input type="text" name="format" value="<?php echo $format;?>" id="format"/></p>
				<p>	
					<input type="submit" value="Valider"/>
				</p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>