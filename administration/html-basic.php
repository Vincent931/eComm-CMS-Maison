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
			<h2 style="text-align:center">Récap des balises HTML et attributs CSS</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>

			<div style="text-align:left; margin-left:30px;text-decoration:underline">HTML</div>
      <div style="text-align:left; margin-left:30px; background-color:#F7D9B7">
        <p>Il faut entourer de balises <?php $chaine="<p>";echo htmlentities($chaine); ?>un  paragraphe<?php $chaine="</p>"; echo htmlentities($chaine);?></p>
        <p>Il faut entourer de balises <?php $chaine="<h1>";echo htmlentities($chaine); ?>Un titre important<?php $chaine="</h1>"; echo htmlentities($chaine);?></p>
        <p>Il faut entourer de balises <?php $chaine="<h3>";echo htmlentities($chaine); ?>Un titre moins important (jusqu'à h6)<?php $chaine="</h3>"; echo htmlentities($chaine);?></p>
        <p>Il faut entourer de balises <?php $chaine="<div>";echo htmlentities($chaine); ?>Un bloc pour lui apporter des propriétés<?php $chaine="</div>"; echo htmlentities($chaine);?></p>
        <p>Exemple <?php $chaine="<div style=\"text-align:left\">";echo htmlentities($chaine); ?>Un bloc à centrer à gauche<?php $chaine="</div>"; echo htmlentities($chaine);?></p>
        <p>Il faut entourer de balises <?php $chaine="<span style=\"text-decoration:underline\">";echo htmlentities($chaine); ?>Un morceau de texte pour lui apporter des propriétés<?php $chaine="</span>"; echo htmlentities($chaine);?></p>
        <p>Exemple <?php $chaine="<span style=\"text-decoration:underline\">";echo htmlentities($chaine); ?>Un bloc pour le centrer à gauche<?php $chaine="</span>"; echo htmlentities($chaine);?></p>
        <p>Pour insérer une image <?php $chaine="<img src=\"publicimgs/NomImage.jpg\"/>";echo htmlentities($chaine); ?> ou publicimgs ne doit pas être oublié ainsi que le / de fin</p>
        <p>Pour insérer un lien <?php $chaine="<a href=\"https://exemple.fr\">";echo htmlentities($chaine);?>le lien cliquable<?php $chaine="</a>";echo htmlentities($chaine);?> voici comment on procéde</p>
        <p>Pour insérer un lien <?php $chaine="<a id=\"grey_color\" href=\"https://exemple.fr\">";echo htmlentities($chaine);?>le lien cliquable en bouton<?php $chaine="</a>";echo htmlentities($chaine);?> il faut ajouter id="grey_color"</p>
        <p>Ajouter target="_blank" au lien pour ouvrir sur un nouvel onglet du navigateur (si click) <?php $chaine="<a href=\"htttps://site.com\" target=\"_blank\">";echo htmlentities($chaine); ?>on clic<?php $chaine="</a>";echo htmlentities($chaine); ?></p>
        <p>Il faut entourer de balises <?php $chaine="<blockquote>";echo htmlentities($chaine); ?>une citation<?php $chaine="</blockquote>"; echo htmlentities($chaine);?></p>
        <p>Pour un saut de ligne <?php $chaine="</br>";echo htmlentities($chaine); ?></p>
      </div>
      <div style="text-align:left; margin-left:30px;text-decoration:underline">CSS</div>
      <div style="text-align:left; margin-left:30px;background-color:#C1E791">
        <p>Il faut ajouter à la balise <?php $chaine="<p style=\"\">";echo htmlentities($chaine); ?>un  paragraphe qui aura les propriétés <?php $chaine="</p>"; echo htmlentities($chaine);?> nommés dans le style=""</p>
        <p>exemple <?php $chaine="<img src=\"publicimgs/image.png\" style=\"width:300px;margin-left:15px;margin-right:45px;float:left\"/>";echo htmlentities($chaine); ?> insérera une image d'une largeur de 300px avec marge gauche de 15px, marge droite de 45px et sera placé à gauche de l'élément dans lequel elle est contenue </p>
        <p>style="margin:auto" laisse le navigateur definir la taille des marges (margin-left, margin-top, margin-right, margin-bottom)</p>
        <p>style="border-radius:25px/25px;border:1px solid black" affichera des bordures arrondies de 25px de rayon avec un trait d'épaisseur de 1px noir</p>
        <p><?php $chaine="<div style=\"display:inline-block;text-align:center\">";echo htmlentities($chaine); ?>Un bloc situé à droite du précédent si il a la place<?php $chaine="</div>"; echo htmlentities($chaine);?></p>
        <p><?php $chaine="<div style=\"display:block\">";echo htmlentities($chaine); ?>Un bloc situé en dessous du précédent si il n'y a pas de règle qui l'en empêche (le texte sera aligné au centre du bloc)<?php $chaine="</div>"; echo htmlentities($chaine);?></p>
        <p>style="font-size:12px;font-weight:bold" affichera une police de 12px en gras</p>
        <p>style="font-size:14px;font-weight:normal;font-style:italic" affichera une police de 14px en écriture italique non gras</p>
        <p>style="background-color:yellow" affiche l'élément en jaune (fond); style="background-color:#F7D9B7" affiche l'élément en #F7D9B7-color</p>
        <p>style="color:red" affiche les caractères en rouge</p>
        <p>Trouver la couleur qui convient sur <a style="text-decoration:underline" href="https://www.webfx.com/web-design/color-picker/" target="_blank">https://www.webfx.com/web-design/color-picker/</a> (outil gratuit)</p>
        <p>Pour afficher une image à gauche ou à droite <?php $chaine="<img src\"publicimgs/monimage.png\" style=\"float:left\"/> ";echo htmlentities($chaine); $chaine="<img src\"publicimgs/monimage.png\" style=\"float:right\"/>"; echo htmlentities($chaine);?></p>
        <p>Pour afficher une image au centre <?php $chaine="<img src\"publicimgs/monimage.png\" style=\"margin:auto;text-align:center\"/> ";echo htmlentities($chaine);?></p>
        <p>Lorsque vous choisissez une valeur > 300px de largeur pour une image <?php $chaine="<img src\"publicimgs/monimage.png\" id=\"quatre\"/> ";echo htmlentities($chaine);?> pour une image de 400px</p>
        <p>Autre exemple une valeur 500px  <?php $chaine="<img src\"publicimgs/monimage.png\" id=\"cinq\" style=\"text-align:center\"/> ";echo htmlentities($chaine);?> pour une image de 500px, mettez un id à la valeur voulue (un, deux, trois, quatre, cinq, six, sept, huit, neuf, dix, onze, douze). (le width passe à 300px en responsive)</p>
        <p>Pour reprendre l'affichage prévu sous ces images <?php $chaine="<div style=\"clear:left\">du texte dessous</div>";echo htmlentities($chaine);?> ou <?php $chaine="<div style=\"clear:right\">dutexte desssous</div>";echo htmlentities($chaine);?> ou <?php $chaine="<div style=\"clear:both\">du texte dessous</div>";echo htmlentities($chaine);?></p>
      </div>
      <div style="text-align:left; margin-left:30px;text-decoration:underline">CONSEILS</div>
      <div style="text-align:left; margin-left:30px;background-color:#A6DFFD">
        <p>Les <?php $chaine="<div>";echo htmlentities($chaine); ?> contenant des <?php $chaine="<div>";echo htmlentities($chaine); ?> et doivent être fermées obligatoirement: <?php $chaine="</div>"; echo htmlentities($chaine).htmlentities($chaine);?></p></br>
        <p><?php $chaine="<div>";echo htmlentities($chaine); ?> Bloc Contenant</p>
        <p><?php $chaine="<div>";echo htmlentities($chaine); ?> Bloc1 <?php $chaine="</div>";echo htmlentities($chaine); ?></p>
        <p><?php $chaine="<div>";echo htmlentities($chaine); ?> Bloc2 <?php $chaine="</div>";echo htmlentities($chaine); ?></p>
        <p><?php $chaine="<div>";echo htmlentities($chaine); ?> Bloc3 <?php $chaine="</div>";echo htmlentities($chaine); ?></p>
        <p><?php $chaine="</div>";echo htmlentities($chaine); ?> (fermeture du Bloc) contenant peut vous donner une idée de la présentation de votre contenu</p></br>
        <p>Effacer les cookies et données de site de votre navigateur pour tester vos pages (Les fichiers sont mis en caches et quelquefois les modifications ne s'appliquent qu'à cette condition)</p>
      </div>
</div>
  <br><br><br><br><br>
</body>
</html>