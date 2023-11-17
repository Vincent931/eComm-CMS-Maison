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
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2>Modification de téléchargement</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} 				
$i=0;
$req3=$bdd->query('SELECT * FROM produits');

$count=$req3->rowCount();

for($j=1;$j<=$count;$j++){
	if(isset($_POST['id_modifier'.$j]) AND !empty($_POST['id_modifier'.$j])){
		$_SESSION['id_modifierT']=$_POST['id_modifier'.$j];
	}
}

$req = $bdd->prepare('SELECT id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits WHERE id=:id_modifier ');
$req->execute(array('id_modifier' =>$_SESSION['id_modifierT']));
$donnees = $req->fetch();
if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
$img_type=$donnees['img_type'];
$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
$req2->execute(array($_SESSION['id_modifierT']));
$donnees2=$req2->fetch();

$charge=substr($donnees['nom'],14,255);
?><p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
<?php require 'bank-img-vid-mp3-11.php';?>

<form style="width:550px;text-align:right;margin:auto" id="ch_form" name="ch_form" action="stvl-telechargement.php" method="post">
		<p style="color:blue"><?php echo 'id N° : '.htmlspecialchars($donnees['id']); ?></p>
		<p><input type="hidden" name="id_modifier" id="id_modifier" value="<?php echo $_SESSION['id_modifierT']; ?>"/></p>
		<p style="text-align:center"><input type="submit" value="Changer"/></p>
		<br>
		<div style="display:inline-block;width:460px;text-align:center"><?php if(isset($img_type) AND $img_type=="image"){ ?>		
	<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php if($ifpromo=='oui'){echo 'promo-'.htmlspecialchars($donnees['cle_image']);}else{echo htmlspecialchars($donnees['cle_image']);} ?>"/>
<?php }
 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} if(isset($img_type) AND $img_type=="video"){ ?>
	<video src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?></div>
		<p><label style="color:blue" for="telechargement">Nom du téléchargement: <?php echo $charge;?></label>
		<p><input id="voir3" type="button" name="voir3" value="Voir"/></p>
		<p><input id="cacher3" type="button" name="cacher3" value="Cacher"/></p>
		<input type="text" name="cle_down" id="cle_down" value="<?php echo $charge;?>"/></p>
		<br>

		<p><label for="ref_obj">Référence Objet (la vôtre) </label></p>
		<p><input type="text" name="ref_obj" id="ref_obj" value="<?php echo htmlspecialchars($donnees['ref_obj']); ?>"/></p>
		<p><label for="obs_url">Observations (exemple: url)</label></p>
		<p><input type="text" name="obs_url" id="obs_url" value="<?php echo htmlspecialchars($donnees['obs_url']); ?>"/></p>

  		<p><label style="color:red">Type d'image Produit Principal</label>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button"id="imgsrc" value="image"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="video_you" value="vidéo you tube"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="videosrc" value="vidéo"/></p>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="imgsrc1" value="imgsrc" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_you1" value="video_you" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_on1" value="video" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;</p>

				<div id="vue_image">
				<p><label for="cle_image" style="color:blue">Image: </label></p>
  				<p><input id="cacher" type="button" name="cacher" value="Cacher"/></p>
				<p><input type="text" name="cle_image" id="cle_image" onmouseover="this.focus();" value="<?php if(substr($donnees['cle_image'],0,3)!="src"){ echo $donnees['cle_image'];}?>"/></p>
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

		<p><label for="afficher">Afficher </label></p>
		<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
		<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="oui" value="oui" <?php if(isset($donnees['afficher']) AND ($donnees['afficher']=='oui')){echo "checked";}?>/>
		<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="non" value="non"<?php if(isset($donnees['afficher']) AND ($donnees['afficher']=='non')){echo "checked";}?>/></p>

		<p><label for="titre">Titre </label></p>
		<p><textarea style="border:1px solid black;width:450px" type="text" name="titre" id="titre" rows="2" cols="75"/><?php echo htmlspecialchars($donnees['titre']); ?></textarea></p>
		<p><label for="description">Description </label></p>
		<p><textarea style="border:1px solid black;width:450px" type="text" name="description" id="description" rows="6" cols="75"/><?php echo htmlspecialchars($donnees['description']); ?></textarea></p>
		<p><label for="prix">Prix (<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) avec un point et 2 décimales (obligatoire) </label></p>
		<p><input type="text" name="prix" id="prix" value="<?php echo htmlspecialchars($donnees['prix']); ?>"/></p>

		<p><label for="barre">Prix Barré(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) avec un point et 2 décimales (obligatoire) </label></p>
		<p><input type="text" name="barre" id="barre" value="<?php echo htmlspecialchars($donnees['barre']); ?>"/></p>

		<p><label for="TVA">Taux TVA (ex: 0.055 ou 0.206) </label></p>
		<p><input type="text" name="TVA" id="TVA" value="<?php echo htmlspecialchars($donnees['TVA']); ?>"/></p>
		
		<p><label for="promotion">Promotion </label></p>
		<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
		<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="oui" value="oui" <?php if(isset($donnees['promotion']) AND ($donnees['promotion']=='oui')){echo "checked";}?>/>
		<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="non" value="non" <?php if(isset($donnees['promotion']) AND ($donnees['promotion']=='non')){echo "checked";}?>/></p>
		</p>

		<p><input type="number" name="quantite" id="quantite" value="<?php echo htmlspecialchars($donnees['quantite']); ?>"/></p>
		
		<p><label for="livraison">Livraison (<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>)</label></p>
		<p><input type="text" name="livraison" id="livraison" value="<?php echo htmlspecialchars($donnees['livraison']); ?>"/></p>
	    <?php if(isset($donnees2['id']) AND !empty($donnees2['id'])){
	    ?>
		<p><label for="precisiona">Explications </label></p>
		<p><textarea style="border:1px solid black;width:450px" type="text" name="precisiona" id="precisiona" rows="14" cols="75"><?php echo htmlspecialchars($donnees2['precisiona']); ?></textarea></p>
		<p><label for="image1">Nom de l'image 1 (avec .jpg ou .png)</label></p>
		<p><input type="text" name="image1" id="image1" value="<?php echo htmlspecialchars($donnees2['image1']); ?>"/></p>
		<p><label for="image2">Nom de l'image 2 (avec .jpg ou .png)</label></p>
		<p><input type="text" name="image2" id="image2" value="<?php echo htmlspecialchars($donnees2['image2']); ?>"/></p>
		<p><label for="image3">Nom de l'image 3 (avec .jpg ou .png)</label></p>
		<p><input type="text" name="image3" id="image3" value="<?php echo htmlspecialchars($donnees2['image3']); ?>"/></p>
		
		
	<?php }
	?>	
</form>

<?php
$req->closeCursor();
$req2->closeCursor();
?>
		</div>
      <br><br><br><br><br>
	</body>
</html>
<?php
