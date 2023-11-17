<?php session_start();

$id=$_GET['id'];

require '../boutique0.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
</script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Modifier Code Javascript</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
			</div>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</br>
			<br><br>
			<h4>Code Javascript sans les balises &#60script&#62" et &#60/script&#62</h4>
			<p style="text-decoration:underline; color:green">Listing: </p>
			<?php $req2=$bdd->prepare('SELECT * FROM JavaScript WHERE id=?');
			$req2->execute(array($id));
			$donnees2=$req2->fetch();
			?>
			<h3 style="margin:auto;text-align:center">Ajouter du JavaScript à une Page</h3>
			<form method="post" action="JavaS-change.php" style="width:700px; text-align:right;margin:auto">
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
				<p><label for="Page">Nom de la page (ex:index.php ou /paiement/paiement-error.php) </label><input type="text" name="Page" id="Page" value="<?php echo $donnees2['Page'];?>"/></p>
				<p><label for="contenu" >Code JavaScript <textarea cols="70" rows="30" name="Contenu" id="Contenu"><?php echo $donnees2['Contenu'];?></textarea></label></p>
				<p><input type="submit" value="Envoyer"/></p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>