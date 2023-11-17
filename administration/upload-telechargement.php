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
			<h2 style="text-align:center">Uploader fichier Téléchargement</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p>Choisissez un nom sans espace, le même que vous avez renseigné lors de la création Téléchargement</p></br>

        <form style="text-align:right;margin:auto;width:550px" method="post" action="upload-telechargement.list.php" enctype="multipart/form-data">
          <p><label for="fichier_up">fichier </label>
          <input type="file" name="fichier_up" id="fichier_up"/></p>
          <p><label for="nameF">Nom à donner à ce fichier (sans l'extension .pdf ou autre) </label>
          <input type="text" name="nameF" id="nameF"/></p>
          <p><label for="description">Description du fichier </label>
          <input type="text" name="description" id="description"/></p>
          <p style="text-align:center"><input type="submit" name="submit" value="Charger"/></p>
        </form>
        <br>
        <h4>Liste des Téléchargements</h4>

<?php
$req=$bdd->query('SELECT * FROM upload');
While($donnees=$req->fetch())
{
  
  
    ?><p><img style="width:100px;border:2px solid blue" src="../download/file.png"/></p>
    <p>Nom du téléchargement : <?php echo $donnees['nom'];?></p>
    <p>Description : <?php echo $donnees['description'];?></p>
  <p>------- <a style="text-decoration:underline" href="effacer-telechargement.list.php?id=<?php echo urlencode($donnees['id']); ?>">Effacer ce téléchargement du dossier download</a></p>
  </br>
  <?php
}
?>
</div>
  <br><br><br><br><br>
  </body>
</html>