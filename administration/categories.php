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
			<h2 style="text-align:center">Categories des Produits</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div>
			<br><br>
			<p style="color:blue; margin:auto; text-align:left; width:650px">Lorsque vous ajouterez une catégorie, celles ci n'apparaitront sur la page produit que si vous mettez la valeur oui à "afficher ?"</p>
			<p>Le préfixe normalisé est le nom qui est enregistré en base, il doit correspondre à une norme: Sans espace sans caractères spéciaux et accents.</p>
<form style="text-align:right; margin:auto;width:500px" method="post" action="cat_ch.php">
<?php $i=0;
		$req0=$bdd->query('SELECT * FROM cat_ok');
		$donnees1=$req0->fetch();
		$req=$bdd->query('SELECT * FROM categories');
		while($donnees=$req->fetch())
		{
			$i++;
			echo '<p>'.'<label for="a'.$i.'">'.'Nom de la Catégorie  '.'</label>'.'<input type="text" id="a'.$i.'" name="a'.$i.'" value="'.$donnees['nom'].'"./>'.'</p>'.'<p>'.'<label for="b'.$i.'">'.'Préfixe normalisé  '.'</label>'.'<input type="text" id="b'.$i.'" name="b'.$i.'" value="'.$donnees['prefixe'].'"./>'.'</p>'	.'<p>'.'<label for="icone">'.'Nom de l\'image '.'</label>'.'<input type="text" name="name_icon'.$i.'" id="name_icon'.$i.'" value="'.$donnees['icone'].'"/>'.'</p>'.'<p>'.'<img style="width:33px" src="../publicimgs/'.$donnees['icone'].'"/>'.'</p>';
			echo '<a href="cat_erase.php?erase='.$donnees['prefixe'].'&icon=oui">'.'EFFACER (Avec l\'image)'.'</a>'.'<br>';
			echo '<a href="cat_erase.php?erase='.$donnees['prefixe'].'&icon=sans">'.'EFFACER (Sans l\'image)'.'</a>'.'<br>';
		}
if($i!=0){ echo '<p>'.'<label for="afficher">'.'AFFICHER ? (oui/non) '.'</label>'.'<input type="text" id="afficher" name="afficher" value="'.$donnees1['oui_non'].'"/>'.'</p>'.'<p>'.'<input type="submit" value="changer"/>'.'</p>';
}
?>
</form>
<br><form method="post" action="plus-add.php" enctype="multipart/form-data">
	<input type="submit" value="Charger image Tous/Toutes"/>
	<h1>Changer l'<span style="color:green">image Tous/Toutes</span> (uniquement .png)<input type="file" name="fichier_up1" id="fichier_up1"/></h1>
</form>
<br><br>
<h2 style="margin:auto; text-align:center">Ajouter une Catégorie</h2>
<h2 style="margin:auto; text-align:center">Le préfixe normalisé ne comporte ni accents ni espaces</h2>
		<form method="post" action="cat_add.php" enctype="multipart/form-data">
			<p><label for id="add">Nom de la catégorie </label><input type="text" id="add" name="add"/></p>
			<p><label for="prefixe_add">Préfixe normalisé </label><input type="text" id="prefixe_add" name="prefixe_add"/></p>
			<p><label for="fichier_up">Image à télécharger</label><input type="file" name="fichier_up" id="fichier_up"/></p>
			<p><label for="nom_icone">Nom de cette image sans l'extension (.jpg, png)</label><input type="text" name="nom_icone" id="nom_icone"/>
			<p><input type="submit" value="Ajouter catégorie"/></p>
		</form>
		</div>
      <br><br><br><br><br>
	</body>
</html>