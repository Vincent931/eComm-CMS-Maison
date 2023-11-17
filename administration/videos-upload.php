<?php session_start();
require 'boutique0.php';
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
			<h2 style="text-align:center">Uploader Vidéo</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
    	<p>Choisissez un vidéo MP4(codec vidéo H.264, codec son MP3)</p>
     	<p>Mettez les valeurs PHP de votre serveur à :</p>
      	<p>Max_file_upload: 256M</p>
  	  	<p>Memory_limit: 1024M</p>
  	  	<p>Post_max_size: 512M</p>
  	  	<p>Upload_max_filesize: 212M</p>
  	  </br>
		<?php require 'bank-img-vid-mp3-10.php';?>

        <form style="text-align:right;margin:auto;width:550px" id="ch_form" name="ch_form" method="post" action="videos-upload.list.php" enctype="multipart/form-data">
          <p><label for="video">Vidéo (.mp4)</label>
          <input type="file" name="video" id="video"/></p>
          <p><label for="nameF">Nom à donner à cette vidéo (sans le .mp4)</label>
          <input type="text" name="nameF" id="nameF"/></p>
          <p><label for="description">Description de la vidéo</label>
          <input type="text" name="description" id="description"/></p>
          <p><label for="image">Image Présentation</label>
            <input type="text" name="image" id="image"/></p>
          <div style="display:inline-block">
            <p><span style="display:block"><input id="voir" type="button" name="voir" value="image de présentation"/></span></p>
            <p><input style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none" id="cacher" type="button" name="cacher" value="Cacher"/></p>
          </div>
          
          <p style="text-align:center"><input type="submit" name="submit" value="Charger"/></p>
        </form>

</div>
  <br><br><br><br><br>
  </body>
</html>