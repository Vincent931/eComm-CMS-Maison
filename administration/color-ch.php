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
			<h2 style="text-align:center">Accueil</h2>
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
$req=$bdd1->query('SELECT * FROM colors');
$donnees=$req->fetch();
$color_menu_haut=$donnees['colMH'];
$color_menu_haut_burger=$donnees['colMHB'];
$color_menu_bas=$donnees['colMB'];
$color_menu_S=$donnees['colS'];
$bac_color_menu_haut=$donnees['bacColMH'];
$bac_color_menu_haut_burger=$donnees['bacColMHB'];
$bac_color_menu_bas=$donnees['bacColMB'];
$bac_color_menu_S=$donnees['bacColS'];
$color_page=$donnees['colP'];
$bac_page=$donnees['bacColP'];
$color_button_add=$donnees['bacColAdd'];
$color_button_add_pol=$donnees['colAdd'];
$color_button_voir=$donnees['bacColVoir'];
$color_button_voir_pol=$donnees['colVoir'];
?>
<p>Couleur en anglais ou du type #D89AF0, voir sur <a href="https://www.webfx.com/web-design/color-picker/" style="text-decoration:underline; color:blue">https://www.webfx.com/web-design/color-picker/</a></p>
<form method="post" action ="color-ch.list.php">
  <input style="margin:auto;display:block" type="submit" value="Envoyer"/></br>
    <label style="margin:auto;display:block" for="bac_color_menu_haut">Couleur du menu Haut</label>
    <input style="margin:auto;display:block" type="text" name="bac_color_menu_haut" id="bac_color_menu_haut" value="<?php echo $bac_color_menu_haut;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $bac_color_menu_haut;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="bac_color_menu_haut_burger">Couleur du menu Haut Burger</label>
    <input style="margin:auto;display:block" type="text" name="bac_color_menu_haut_burger" id="bac_color_menu_haut_burger" value="<?php echo $bac_color_menu_haut_burger;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $bac_color_menu_haut_burger;?>">&nbsp;</p><br>
	  
    <label style="margin:auto;display:block" for="bac_color_menu_bas">Couleur du menu Bas</label>
    <input style="margin:auto;display:block" type="text" name="bac_color_menu_bas" id="bac_color_menu_bas" value="<?php echo $bac_color_menu_bas;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $bac_color_menu_bas;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="bac_color_menu_S">Couleur du menu Side</label>
    <input style="margin:auto;display:block" type="text" name="bac_color_menu_S" id="bac_color_menu_S" value="<?php echo $bac_color_menu_S;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $bac_color_menu_S;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="bac_page">Couleur des pages</label>
    <input style="margin:auto;display:block" type="text" name="bac_page" id="bac_page" value="<?php echo $bac_page;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $bac_page;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_menu_haut">Couleur des Polices menu Haut</label>
    <input style="margin:auto;display:block" type="text" name="color_menu_haut" id="color_menu_haut" value="<?php echo $color_menu_haut;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_menu_haut;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_menu_haut_burger">Couleur des Polices menu Haut Burger</label>
    <input style="margin:auto;display:block" type="text" name="color_menu_haut_burger" id="color_menu_haut_burger" value="<?php echo $color_menu_haut_burger;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_menu_haut_burger;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_menu_bas">Couleur des Polices Menu Bas</label>
    <input style="margin:auto;display:block" type="text" name="color_menu_bas" id="color_menu_bas" value="<?php echo $color_menu_bas;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_menu_bas;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_menu_S">Couleur des Polices Menu Side</label>
    <input style="margin:auto;display:block" type="text" name="color_menu_S" id="color_menu_S" value="<?php echo $color_menu_S;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_menu_S;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_page">Couleur des Polices pages</label>
    <input style="margin:auto;display:block" type="text" name="color_page" id="color_page" value="<?php echo $color_page;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_page;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_button_add">Couleur du Bouton PANIER</label>
    <input style="margin:auto;display:block" type="text" name="color_button_add" id="color_button_add" value="<?php echo $color_button_add;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_button_add;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_button_add_pol">Couleur Police de ce bouton</label>
    <input style="margin:auto;display:block" type="text" name="color_button_add_pol" id="color_button_add_pol" value="<?php echo $color_button_add_pol;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_button_add_pol;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_button_voir">Couleur des Boutons Acheter et Retour</label>
    <input style="margin:auto;display:block" type="text" name="color_button_voir" id="color_button_voir" value="<?php echo $color_button_voir;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_button_voir;?>">&nbsp;</p><br>
    
    <label style="margin:auto;display:block" for="color_button_voir_pol">Couleur Police de ces boutons</label>
    <input style="margin:auto;display:block" type="text" name="color_button_voir_pol" id="color_button_voir_pol" value="<?php echo $color_button_voir_pol;?>"/></br>
    <p style="margin:auto;text-align:center;width:100px;height:30px;background-color:<?php echo $color_button_voir_pol;?>">&nbsp;</p><br>
		</div>
      <br><br><br><br><br>
	</body>
</html>