<?php session_start();

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">UNE PAGE SOLO</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>
<div class="prod_plus_ch">
<p>Vous devez uploader vos images, les prix avec un (.) et avec 2 chiffres après le point obligatoire. le taux TVA de la forme 0.206 ou 0.055</p>
<p>La page de ce produit est https://monsite.com/produit-best, Partagez-la sur vos objectifs publicités (remplacer monsite.com par votre nom de domaine)</p>
<p>Pour un mono-produit Facebook renseignez cette url.</p>

<?php 
$prod_solo="prod_solo";
$req=$bdd->prepare('SELECT * FROM produits WHERE nom=?');
$req->execute(array($prod_solo));
$donnees=$req->fetch();
if(isset($donnees['id']) AND !empty($donnees['id'])){
	$req7=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req7->execute(array($donnees['id']));
	$donnees2=$req7->fetch(); } ?>
<h3 style="color:blue;margin:auto;text-align:right;text-decoration:underline"><a href="product-plus-erase.php?id=<?php echo $donnees['id'];?>">Effacer le produit Solo</a></h3>
</div><?php
require 'bank-img-vid-mp3-4.php';?>
<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>

			<form style="width:550px;margin:auto;text-align:right" id="ch_form" name="ch_form" method="POST" action="product-plus-ch.list.php">
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button"id="imgsrc" value="image"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="video_you" value="vidéo you tube"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="videosrc" value="vidéo"/></p>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="imgsrc1" value="imgsrc" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_you1" value="video_you" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_on1" value="video" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;</p>

				<div id="vue_image">
				<p><label for="image" style="color:blue">Image: </label></p>
  				<p><input id="cacher" type="button" name="cacher" value="Cacher"/></p>
				<p><input type="text" name="cle_image" id="cle_image" onmouseover="this.focus();" value="<?php if(isset($donnees['cle_image'])){if(substr($donnees['cle_image'],0,3)!="src"){ echo $donnees['cle_image'];}}?>"/></p>
				</div>

				<div id="vue_video_you">
				<p><label for="cle_vid_you" style="color:blue">Vidéo Youtube: </label></p>
  				<p>Veuillez remplir le morceau d'url de votre vidéo (<span style="color: blue">src="https://www.youtube.com/embed/etc..."</span>) dans <?php $chaine="<iframe ";echo htmlentities($chaine); ?><span style="color: blue">src="https://www.youtube.com/embed/4Yy_x7nHBhI"</span> <?php $chaine="title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";echo htmlentities($chaine); ?></p>
				<p><textarea style="width:450px;height:70px" type="text" name="cle_vid_you" id="cle_vid_you"><?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?></textarea></p>
				</div>

				<div id="vue_video">
				<p><label id="lab_vid" for="cle_vid" style="color:blue">Vidéo: </label></p>
  				<p><input id="cacher1" type="button" name="cacher1" value="Cacher"/></p>
				<p><input type="text" name="cle_vid" id="cle_vid" onmouseover="this.focus();" value="<?php if(substr($donnees['cle_image'],0,3)!="src"){ echo $donnees['cle_image'];}?>"/></p>
				</div>
				
				<p><label for="ref_obj">Reference Objet (la votre) </label>
				<input style="border:1px solid black" type="text" name="ref_obj" id="ref_obj" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['ref_obj']; } ?>"/></p>

				<p><label for="obs_url">Observation (ex:url) </label>
				<input style="border:1px solid black" type="text" name="obs_url" id="obs_url" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['obs_url']; } ?>"/></p>

				<p><label for="titre">Titre</label>
				<textarea style="border:1px solid black;vertical-align:top;margin-top:15px" name="titre" id="titre" rows="2" cols="75"><?php if(isset($donnees['id']) AND !empty($donnees['id'])){echo $donnees['titre']; } ?></textarea></p>		

				<p><label for="afficher">Afficher (oui/non)</label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="oui" value="oui" <?php if(isset($donnees['id']) AND !empty($donnees['id'])){if($donnees['afficher']=='oui'){echo 'checked';}}?>/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="non" value="non" <?php if(isset($donnees['id']) AND !empty($donnees['id'])){if($donnees['afficher']=='non'){echo 'checked';}}?>/></p>

				<p><label for="prix">Prix TTC(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black" type="text" name="prix" id="prix" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['prix']; } ?>"/></p>

				<p><label for="barre">Prix Barré(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black" type="text" name="barre" id="barre" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['barre']; } ?>"/></p>

				<p><label for="TVA">Taux TVA (ex: 0.055 ou 0.206) </label>
				<input style="border:1px solid black" type="text" name="TVA" id="TVA" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['TVA']; } ?>"/></p>

				<p><label for="promotion">Promotion </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="oui" value="oui" <?php if(isset($donnees['promotion']) AND ($donnees['promotion']=='oui')){echo "checked";}?>/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="non" value="non" <?php if(isset($donnees['promotion']) AND ($donnees['promotion']=='non')){echo "checked";}?>/></p>
				</p>

				<p><label for="description">Description</label>
				<textarea style="border:1px solid black" name="description" id="description" rows="10" cols="120"><?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['description']; } ?></textarea></p>
					
				<p><label for="quantite">Quantité </label>
				<input style="border:1px solid black" type="number" name="quantite" id="quantite" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['quantite']; } ?>"/></p>

				<p><label for="livraison">Livraison (<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>)</label>
				<input style="border:1px solid black" type="text" name="livraison" id="livraison" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['livraison']; } ?>"/></p>

				<p><label for="poids">Poids en grammes (+emballages)(Pour la livraison internationale)</label>
				<input style="border:1px solid black" type="text" name="poids" id="poids" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees['poids']; } ?>"/></p> 
				
				<p><label for="precisiona">Explications</label>
				<textarea  style="width: 450px" rows="14" cols="120" name="precisiona" id="precisiona"><?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees2['precisiona']; } ?></textarea></p>

				<p><label for="image1">Nom de l'image 1 (avec .jpg ou .png)</label>
				<input style="border:1px solid black" type="text" name="image1" id="image1" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees2['image1']; } ?>"/></p>

				<p><label for="image2">Nom de l'image 2 (avec .jpg ou .png)</label>
				<input style="border:1px solid black" type="text" name="image2" id="image2" value="<?php if(isset($donnees['id']) AND !empty($donnees['id'])){ echo $donnees2['image2']; } ?>"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Valider"/></p>
				
			</form>
<?php $req1 = $bdd->query('SELECT  id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits WHERE nom=\'prod_solo\'');
$donnees = $req1->fetch();
	if(isset($donnees['img_type']) AND !empty($donnees['img_type'])){$img_type=$donnees['img_type'];}
	if (isset($donnees['id']) AND !empty($donnees['id']))
	{
	if($donnees['promotion']=='oui'){
	$ifpromo="oui";
	} else {$ifpromo="non";}
	require 'affichage-prod-solo.php';
	}
	?>
	
	<?php if (isset($donnees['id']) AND !empty($donnees['id']))
	{
	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit =?');
	$req2->execute(array($donnees['id']));
	require 'affichage-prod-solo-explic.php';
	}


if(isset($req)){$req->closeCursor();}
if(isset($req7)){$req7->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
if(isset($req2)){$req2->closeCursor();}
?>

		</div>
		  <br><br><br><br><br>
	</body>
</html>