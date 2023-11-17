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
			<h2 style="text-align:center">Effacer image</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br></br>
      <div>
<?php $req=$bdd->query('SELECT * FROM image');
While($donnees=$req->fetch())
{
  
  if(isset($donnees['intitule']) AND $donnees['intitule']=='labelF'){
    ?>
<div class="bl_admin"><p><img style="width:165px" src="../logo.png"/> Nom de l'image : <?php echo $donnees['nom']; ?></p>
    <p>Description : <?php echo $donnees['description'];?> ---- vous ne pouvez pas effacer cette image, remplacement dans Image/PDF/Mails > Icônes internes</p>
</div>
    </br>
    <?php
  }
  if($donnees['intitule']!='labelF'){
  ?>
<div class="bl_admin">
  <p><img style="width:180px" src="../publicimgs/<?php echo $donnees['nom'];?>"/></p>
  <p>Nom de l'image : <?php echo $donnees['nom']; ?></p>
  <p>Description : <?php echo $donnees['description'];?></p>
  <p><a style="text-decoration:underline" href="effacer-image.post.php?id=<?php echo urlencode($donnees['id']); ?>">Effacer cette image</a></p>
  </br>
</div>
  <?php
}
}
?>
      </div>
    </div>
      <br><br><br><br><br>
  </body>
</html>