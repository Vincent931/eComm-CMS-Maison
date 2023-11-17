<?php session_start();
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script>
	var p=0;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Déposer un sujet</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
			</div></br>
            <section>
            	<article>
<?php if(isset($_SESSION['erreur'])) {
            //echo '<font color="red">'.$_SESSION['erreur']."</font>";
				?><h4 style="background-color:red;text-align:center"><?php echo htmlspecialchars($_SESSION['erreur']); ?></h4>
				<?php 
            $_SESSION['erreur']= ''; } 
            require 'bank-img-vid-mp3-4.php';?>
            <p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
<form id="ch_form" name="ch_form" style="width:750px; text-align:right;margin:auto" action="deposer.un.topic.list.php" method="post">
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

			    <div id="bloc_envoi">
			       	<p><textarea style="margin-top:2.5%" name="titre_envoi" rows="4" cols="50" placeholder="Titre"/></textarea></p>
			       	<p><label for="couleurT"> Couleur Background Titre (ex:red) </label><input type="text" name="couleurT" id="couleurT"/></p>
					<p><textarea style="margin-top:2.5%" name="contenu_envoi" rows="7" cols="50" placeholder="Sujet"/></textarea></p>
					<p><label for="couleurS"> Couleur Background Sujet (ex:#3E8BCE) </label><input type="text" name="couleurS" id="couleurS"/><input style="margin-top:1.25%" type="submit" name="form_topic" value="Je soumets mon topic" /></p>
				</div>
	</form>
</br></br>
</article>
</section>			
	
		</div>
      <br><br><br><br><br>
	</body>
</html>