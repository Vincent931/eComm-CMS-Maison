<?php session_start();
require 'boutique0.php';
require 'texte1.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Changer intitulés Menus Haut</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
<?php 

$req=$bdd1->query('SELECT * FROM nav_haut');
$menu=$req->fetch();

?>
      <form action="menu-haut-ch.list.php" method="post">
        <p>Titre menu page des produits</p>
        <p><input type="text" name="tarifs" id="tarifs" value="<?php echo $menu['tarifs'];?>"/></p>
        <p>Titre menu Blog/Comptes</p>
        <p><input type="text" name="blog" id="blog" value="<?php echo $menu['blog'];?>"/></p>
        <p><input type="submit" Value="Valider"/></p>
      </form>
    </br></br>
    <a href="index.php" id="grey_color">Retour</a>
    </div>
      <br><br><br><br><br>
	</body>
</html>