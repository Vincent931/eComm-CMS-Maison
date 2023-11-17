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
			<h2 style="text-align:center">Uploader image</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p>Choisissez un nom sans espace, le même que vous avez renseigné lors de la création Produit ou Description</p></br>

        <form style="text-align:right;margin:auto;width:550px" method="post" action="interm-charger-img.php" enctype="multipart/form-data">
          <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
          <p><label for="image">Image (.jpg .png) | Max= 2Mo</label>
          <input type="file" name="image" id="image"/></p>
          <p><label for="nameF">Nom à donner à cette image (sans le .jpg ou le .png)</label>
          <input type="text" name="nameF" id="nameF"/></p>
          <p><label for="description">Description de l'image</label>
          <input type="text" name="description" id="description"/></p>
          <p style="text-align:center"><input type="submit" name="submit" value="Charger"/></p>
        </form>

</div>
  <br><br><br><br><br>
  </body>
</html>