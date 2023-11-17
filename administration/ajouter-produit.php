<?php session_start();

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<script>
	var p=0;
</script>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Ajouter 1 produit</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?><p>Ne dupliquez pas de produit, toujours au moins un caractère de différence pour le titre</p>

<?php require 'bank-img-vid-mp3-4.php';?>
<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>

			<form style="width:550px;margin:auto;text-align:right" id="ch_form" name="ch_form" method="POST" action="ajouter-produit.list.php">
				<p><label for="ref_obj">Référence Objet (la vôtre) </label>
				<input type="text" name="ref_obj" id="ref_obj"/></p>

				<p><label for="obs_url">Observations (exemple: url)</label>
				<input type="text" name="obs_url" id="obs_url"/></p>	

				<p><label style="color:red">Type d'image Produit Principal</label>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button"id="imgsrc" value="image"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="video_you" value="vidéo you tube"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="videosrc" value="vidéo"/></p>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="imgsrc1" value="imgsrc"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_you1" value="video_you"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_on1" value="video"/>&nbsp;&nbsp;&nbsp;&nbsp;</p>

				<div id="vue_image">
				<p><label for="cle_image" style="color:blue">Image: </label></p>
  				<p><input id="cacher" type="button" name="cacher" value="Cacher"/></p>
				<p><input type="text" name="cle_image" id="cle_image" onmouseover="this.focus();"/></p>
				</div>

				<div id="vue_video_you">
				<p><label for="cle_vid_you" style="color:blue">Vidéo Youtube: </label></p>
  				<p>Veuillez remplir le morceau d'url de votre vidéo (<span style="color: blue">src="https://www.youtube.com/embed/etc..."</span>) dans <?php $chaine="<iframe ";echo htmlentities($chaine); ?><span style="color: blue">src="https://www.youtube.com/embed/4Yy_x7nHBhI"</span> <?php $chaine="title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";echo htmlentities($chaine); ?></p>
				<p><textarea style="width:450px;height:70px" type="text" name="cle_vid_you" id="cle_vid_you">src="https://www.youtube.com/embed/4Yy_x7nHBhI"</textarea></p>
				</div>

				<div id="vue_video">
				<p><label id="lab_vid" for="cle_vid" style="color:blue">Vidéo: </label></p>
  				<p><input id="cacher1" type="button" name="cacher1" value="Cacher"/></p>
				<p><input type="text" name="cle_vid" id="cle_vid" onmouseover="this.focus();"/></p>
				</div>

				<p><label for="afficher">Afficher </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="oui" value="oui" checked/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="non" value="non"/></p>

				<p><label for="categories">Catégorie </label></p>
				<?php $req510=$bdd->query('SELECT * FROM categories');
				while($donnees510=$req510->fetch()){ ?>
				<p>
				<label for="categorie"><?php echo $donnees510['nom'];?></label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="categorie" id="<?php echo $donnees510['prefixe'];?>" value="<?php echo $donnees510['prefixe'];?>"/>
				</p>
				<?php
				}?>
				<p><textarea style="border:1px solid black;vertical-align:top;margin-top:15px" name="titre" id="titre" rows="2" cols="75">Entrez le titre ici</textarea></p>
					
				<p><label for="prix">Prix TTC(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="prix" id="prix"/></p>

				<p><label for="barre">Prix Barré(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="barre" id="barre"/></p>

				<p><label for="TVA">Taux TVA (ex: 0.055 ou 0.206) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="TVA" id="TVA"/></p>

				<p><label for="promotion">Promotion </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="oui" value="oui"/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="non" value="non" checked/></p>
				</p>
				
				<p><textarea style="border:1px solid black;vertical-align:top;margin-top:15px" name="description" id="description" rows="10" cols="120">Entrez la description ici</textarea></p>
					
				<p><label for="quantite">Quantité </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="number" name="quantite" id="quantite"/></p>

				<p><label for="livraison">Livraison (<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>)</label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="livraison" id="livraison"/></p>

				<p><label for="poids">Poids en grammes (+emballages)(Pour la livraison internationale)</label>
				<input style="border:1px solid black; vertical-align:top; margin-top:15px" type="text" name="poids" id="poids"/></p> 
				
				<p><label for="precisiona">Explications</label>
				<textarea  style="width: 450px" rows="14" cols="120" name="precisiona" id="precisiona">Texte de précision sur le produit, vous pouvez ajouter des donnees sur la fabrication, le coût, la politique de livraison, de vente, la société productrice ou toutes autres formes de renseignements complémentaires, cela donne du crédit à votre société quant à son sérieux et généralement fait grimper les ventes ...</textarea></p>

				<p><label for="image1">Nom de l'image 1 (avec .jpg ou .png)</label>
				<input type="text" name="image1" id="image1"/></p>

				<p><label for="image2">Nom de l'image 2 (avec .jpg ou .png)</label>
				<input type="text" name="image2" id="image2"/></p>
				
				<p><label for="image3">Nom de l'image 3 (avec .jpg ou .png)</label>
				<input type="text" name="image3" id="image3"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Ajouter"/></p>
				
			</form>
<?php $req = $bdd->query('SELECT id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id');
while ($donnees = $req->fetch())
{
	$img_type=$donnees['img_type'];
	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
	$mot=substr($donnees['nom'],0,14);
	if ($mot!='telechargement'){

	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();

	require 'affichage-prod-v.php'; 
	require 'affichage-explic.php';
}
} 
$req->closeCursor();
?>

		</div>
		  <br><br><br><br><br>
	</body>
</html>	