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
      <?php $id=urldecode($_GET['id']);
            $req=$bdd->prepare('SELECT * FROM image WHERE id=?');
            $req->execute(array(htmlspecialchars($id)));
            $donnees=$req->fetch();
      ?>
        <p>Confirmez vous la suppression de : <?php echo $donnees['nom']; ?> ?</p>
        <p><img style="width:200px" src="../publicimgs/<?php echo $donnees['nom'];?>"/> Description : <?php echo $donnees['description'];?></p>
      </br>
      <p><a id="grey_color"href="lister-image.php">Annuler</a>
      <form action="effacer-image.post2.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo htmlspecialchars($id);?>"/>
        <input style="margin-left:15px" type="submit" value="Confirmer"/>
      </form>
      </p>

    </div>
      <br><br><br><br><br>
  </body>
</html>
