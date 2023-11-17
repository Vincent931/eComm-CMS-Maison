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
			<h2 style="text-align:center">Uploader MP3</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
    	<p>Choisissez une musique MP3(codec son MP3)</p>
     	
  	  </br>
        <form style="text-align:right;margin:auto;width:550px" method="post" action="music-upload.list.php" enctype="multipart/form-data">
          <p><label for="music">Musique (.mp3)</label>
          <input type="file" name="music" id="music"/></p>
          <p><label for="nameF">Nom à donner à cette enregistrement (sans le .mp3)</label>
          <input type="text" name="nameF" id="nameF"/></p>
          <p><label for="description">Description de l'enregistrement'</label>
          <input type="text" name="description" id="description"/></p>
          <p style="text-align:center"><input type="submit" name="submit" value="Charger"/></p>
        </form>

</div>
  <br><br><br><br><br>
  </body>
</html>