<?php session_start();
require 'boutique0.php';
require 'blog2.php';
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
			<h2>Modification sujet</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
			</div></br>
			<p><?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?></p></br>
<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
<?php 
$req3=$bdd2->query('SELECT * FROM topics');
$i=$req3->rowCount();

for($j=1;$j<=$i;$j++){
	if(isset($_POST['id'.$j]) AND !empty($_POST['id'.$j])){
		$_SESSION['idM']=$_POST['id'.$j];
	}
}

echo $_SESSION['idM'];
$req=$bdd2->prepare('SELECT * FROM topics WHERE id=?');
$req->execute(array($_SESSION['idM']));
$donnees = $req->fetch();
$img_type=$donnees['img_type'];

require 'bank-img-vid-mp3-5.php';?>
	<form id="ch_form" name="ch_form" method="POST" action="modification-sujet.list2.php">
		<div>

		<?php if(isset($img_type) AND $img_type=="image"){ ?>		
		<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php echo htmlspecialchars($donnees['image']);?>"/>
<?php }
 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} if(isset($img_type) AND $img_type=="video"){ ?>
	<video src="../publicimgs/<?php echo $donnees['image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?>
		<p><label style="color:red">Type d'image Produit Principal</label>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button"id="imgsrc" value="image"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="video_you" value="vidéo you tube"/>
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button" id="videosrc" value="vidéo"/></p>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="imgsrc1" value="imgsrc" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_you1" value="video_you" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="video_on1" value="video" <?php if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){echo 'checked';}?>/>&nbsp;&nbsp;&nbsp;&nbsp;</p>

				<div id="vue_image">
				<p><label for="image" style="color:blue">Image: </label></p>
  				<p><input id="cacher" type="button" name="cacher" value="Cacher"/></p>
				<p><input type="text" name="image" id="image" onmouseover="this.focus();" value="<?php if(substr($donnees['image'],0,3)!="src"){ echo $donnees['image'];}?>"/></p>
				</div>

				<div id="vue_video_you">
				<p><label for="cle_vid_you" style="color:blue">Vidéo Youtube: </label></p>
  				<p>Veuillez remplir le morceau d'url de votre vidéo (<span style="color: blue">src="https://www.youtube.com/embed/etc..."</span>) dans <?php $chaine="<iframe ";echo htmlentities($chaine); ?><span style="color: blue">src="https://www.youtube.com/embed/4Yy_x7nHBhI"</span> <?php $chaine="title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";echo htmlentities($chaine); ?></p>
				<p><textarea style="width:450px;height:70px" type="text" name="cle_vid_you" id="cle_vid_you"><?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?></textarea></p>
				</div>

				<div id="vue_video">
				<p><label id="lab_vid" for="cle_vid" style="color:blue">Vidéo: </label></p>
  				<p><input id="cacher1" type="button" name="cacher1" value="Cacher"/></p>
				<p><input type="text" name="cle_vid" id="cle_vid" onmouseover="this.focus();" value="<?php if(substr($donnees['image'],0,3)!="src"){ echo $donnees['image'];}?>"/></p>
				</div>

		<p><label for="date_creation">Date de création de la forme aaaa/mm/jj </label></p>
		<p><input style="border:1px solid black" type="date" name="date_creation" id="date_creation" value="<?php echo $donnees['date_creation']; ?>"/></p>
		<p><label for="titre1">Titre </label></p>
		<p><textarea style="border:1px solid black" type="text" name="titre1" id="titre1" rows="2" cols="75"><?php echo $donnees['titre1']; ?></textarea></p>
		<p><label for="couleurT"> Couleur Background Titre (& Commentaires): </label><input type="text" name="couleurT" id="couleurT" value="<?php echo $donnees['couleurT'];?>"/></p>
		<p><label for="contenu1">Contenu </label></p>
		<p><textarea style="border:1px solid black" type="text" name="contenu1" id="contenu1" rows="6" cols="75"><?php echo $donnees['contenu1']; ?></textarea></p>
		<p><label for="couleurS"> Couleur Background sujet : </label><input type="text" name="couleurS" id="couleurS" value="<?php echo $donnees['couleurS'];?>"/></p>
		<input type="hidden" name="id_modifier" id="id_modifier" value="<?php echo $_SESSION['idM']; ?>"/>
		</br></br>
		<input type="submit" value="Changer sujet"/>
		</div>
	</form>	
	</br>
<?php
$req->closeCursor();
?>	
		</div>
      <br><br><br><br><br>
	</body>
</html>