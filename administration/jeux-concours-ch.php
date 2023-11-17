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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
			<h3>Configurer un jeux concours (loto)</h3>
			<h4>Le jeux concours est disponible à /blog/jeux-concours ou jeux-concours.php si vous êtes dans le dossier /blog ou https://monsite.fr/blog/jeux-concours.php</h4>
			<p>Tous les jours 3 essais au loto d'obtenir 4 numéros, une capture d'écran doit vous être envoyé en cas de gain</p>
			<?php require 'bank-img-vid-mp3-4.php';?>
			<?php $req=$bdd1->query('SELECT * FROM jeux');
			$donnees=$req->fetch();?>
			<form id="ch_form" name="ch_form" method="post" action="jeux-concours-ch.list.php">
				<p><label for="cle_image"></label></p>
  				<p><input id="voir" type="button" name="voir" value="image"/></p>
  				<p><input id="cacher" type="button" name="cacher" value="CACHER"/></p>
  				<p><label for="cle_image">Nom image</label>
				<p><input type="text" name="cle_image" id="cle_image" value="<?php if(isset($donnees['image']) AND !empty($donnees['image'])){echo $donnees['image'];}?>" onmouseover="this.focus();"/></p>

				<p><label for="color">Couleur de background</label></p>
				<?php if(isset($donnees['background']) AND !empty($donnees['background'])){echo '<p style="height:30px;width:120px;margin:auto;text-align:center;border:0.5px solid brown;background-color:'.$donnees['background'].'">&nbsp;</p>';}?>
				<p><input type="text" name="color" id="color" value="<?php if(isset($donnees['background']) AND !empty($donnees['background'])){echo $donnees['background'];}?>"/></p>

				<p><label for="afficher">Afficher </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="oui" value="oui" <?php if (isset($donnees['afficher']) AND $donnees['afficher']=='oui'){ echo "checked";} ?>/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="non" value="non" <?php if (isset($donnees['afficher']) AND $donnees['afficher']=='non'){ echo "checked";} ?>/></p>

				<?php if(isset($donnees['image']) AND !empty($donnees['image'])){echo '<p><img style="text-align:center;margin:auto;width:200px" src="../publicimgs/'.$donnees['image'].'"/></p>';}?>

				<p><label for="contenu">Contenu</label></p>
				<p><textarea cols="90" rows="10" type="text" name="contenu" id="contenu"><?php if(isset($donnees['contenu']) AND !empty($donnees['contenu'])){echo $donnees['contenu'];}?></textarea></p>
				<p><input type="submit" value="Envoyer"/></p>
			</form>

		</div>
      <br><br><br><br><br>
	</body>
</html>