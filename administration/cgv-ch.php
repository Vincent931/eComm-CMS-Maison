<?php session_start();
require 'boutique0.php';
require 'texte1.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head-js-ch.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
      <h2 style="text-align:center">Changer page CGV</h2>
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

$req=$bdd1->query('SELECT * FROM a_savoir');
$menu=$req->fetch();

?>
<p><a href="index.php" id="grey_color">Retour</a></p>
<p><a href="html-basic.php" id="grey_color" target="_blank">Ouvrir page d'aide</a></p>
<?php require 'paragraphe-editeur.php'; ?>
<?php require 'bank-img-vid-mp3.php';?>
  <form action="cgv-ch.list.php" name="ch_form" id="ch_form" method="post">
    <p style="color:blue">Page CGV</p>
    <input type="hidden" name="position" id="position"></input>
    <p><input id="grey_color" type="submit" onclick="pos()" Value="Enregistrer"/></p>
<fieldset style="width:950px;background:#8DC8FC;margin:auto">
<p>
<?php require 'editeur-racine.php'; ?>
</p>

<textarea style="width:950px; height:900px" rows="32" cols="90" name="message" id="message" wrap="virtual" onmouseover="this.focus();"><?php if(isset($menu['contenu'])){ echo $menu['contenu'];}?></textarea>
        
      </form>
    </br></br>
    
   
    </div>
      <br><br><br><br><br>
  </body>
</html>
<script>
  Scroller();
</script>