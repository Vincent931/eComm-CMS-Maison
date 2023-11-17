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
			<h2 style="text-align:center">Uploader le PDF de la société</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p>Choisissez un nom sans espace</p></br>

        <form method="post" action="interm-charger-pdf.php" enctype="multipart/form-data">
          <p><label for="pdf">Document (.pdf)</label>
          <input type="file" name="pdf" id="pdf"/></p>
          <p><label for="nameF">Nom à donner à ce pdf (sans caractères speciaux sf "-" et sans le .pdf)</label>
          <input type="text" name="nameF" id="nameF"/></p>
          <p><label for="description">Description du pdf</label>
          <input type="text" name="description" id="description"/></p>
          <p><input type="submit" name="submit" value="Charger"/></p>
        </form>

</div>
  <br><br><br><br><br>
  </body>
</html>