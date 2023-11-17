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
<?php require 'head.php';?>
</script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Code JavaScript</h2>
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
			<p>Vous pouvez ajouter du code Javascript dans les Pages Accueil, Politique de Confidentialité, Contact, CGV, Paiement-OK, Paiement-ERROR, Landing Page, Produit Solo & toutes les Pages supplémentaires</p>
			<br><br>
			<h4>Code Javascript sans les balises &#60script&#62" et &#60/script&#62</h4>
			<p style="text-decoration:underline; color:green">Listing: </p>
			<?php $req2=$bdd->query('SELECT * FROM JavaScript');
			while($donnees2=$req2->fetch()){
			?>
			<p style="color:blue"><?php echo $donnees2['Page'];?></p><br>
			<p style="margin:auto;text-align:center"><a style="border:1px solid black;background-color:#E7EEF5;text-decoration:none; color:black" href="pre-JavaS.php?id=<?php echo $donnees2['id'];?>">Modifier</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="border:1px solid black;background-color:#E7EEF5;text-decoration:none; color:black" href="erase-JavaS.php?id=<?php echo $donnees2['id'];?>">Effacer</a></p><br>
			<?php } ?>
			<br>
			<h3 style="margin:auto;text-align:center">Ajouter du JavaScript à une Page</h3>
			<form method="post" action="JavaS-add.php" style="width:700px; text-align:right;margin:auto">
				<p><label for="Page">Nom de la page (ex:index.php ou /paiement/retour-error.php) </label><input type="text" name="Page" id="Page"/></p>
				<p><label for="contenu" >Code JavaScript <textarea cols="70" rows="30" name="Contenu" id="Contenu"></textarea></label></p>
				<p><input type="submit" value="Envoyer"/></p>
			</form>
		</div>
      <br><br><br><br><br>
	</body>