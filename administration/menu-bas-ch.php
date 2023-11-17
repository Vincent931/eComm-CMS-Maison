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
			<h2 style="text-align:center">Changer intitulés Menus Bas</h2>
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

$req=$bdd1->query('SELECT * FROM nav_bas');
$menu=$req->fetch();

?>
      <form action="menu-bas-ch.list.php" method="post">
        <p><label for="contactez">Titre Menu Page Contact</label></p>
        <p><input type="text" name="contactez" id="contactez" value="<?php echo $menu['contactez'];?>"/></p>
        <p><label for="infos">Titre Menu pdf(infos société)</label></p>
        <p><input type="text" name="infos" id="infos" value="<?php echo $menu['infos'];?>"/></p>
        <p><label for="politique">Titre Menu Politique de confidentialité</label></p>
        <p><input type="text" name="politique" id="politique" value="<?php echo $menu['politique'];?>"/></p>
        <p><label for="a_savoir">Titre Menu Condition Générale de Vente</label></p>
        <p><input type="text" name="a_savoir" id="a_savoir" value="<?php echo $menu['a_savoir'];?>"/></p>
        <p><label for="reinitialisation">Titre Menu Réinitialisation de compte</label></p>
        <p><input type="text" name="reinitialisation" id="reinitialisation" value="<?php echo $menu['reinitialisation'];?>"/></p>
        <p><input type="submit" Value="Valider"/></p>
      </form>
      </br></br>
    <a href="index.php" id="grey_color">Retour</a>
    </div>
      <br><br><br><br><br>
	</body>
</html>