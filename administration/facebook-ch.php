<?php session_start();
require 'boutique0.php';
require 'texte1.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head-js-ch.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
      <h2 style="text-align:center">Informations Partage Facebook</h2>
      <div id="boutons_connect">
        <img src="../publicimgs/personne_icone.png" style="width:45px">
        <tr>
          <td>
            <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
          </td>
        </tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
      </div></br>
<?php $req=$bdd1->query('SELECT * FROM facebook');
$donnees=$req->fetch();
?>
<p>Pour optimiser le Partage Facebook vous avez besoin d'une image, d'un titre, d'une description, de l'url de votre site et du nom du site</p>
<?php if(isset($donnees['image']) AND !empty($donnees['image'])){ echo '<p>'.'<img style="width:120px;text-align:center;margin:auto"src="../publicimgs/'.$donnees['image'].'"'.'<p>';}
?><div style="display:inline-block">
    <a style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none" href="image-bank.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Image Bank</a> 
</div>
<form style="width:500px;text-align:right;margin:auto" method="post" action="facebook-ch.list.php">
  <p><label for="etat">Afficher (oui/non) </label>
  <input type="text" name="etat" id="etat" value="<?php echo $donnees['etat'];?>"/></p>
  <p><label for="image">Nom de l'Image </label>
  <input type="text" name="image" id="image" value="<?php echo $donnees['image'];?>"/></p>
  <p><label for="titre">Titre (1 ligne) </label>
  <textarea cols="50" rows="3" type="text" name="titre" id="titre"><?php echo $donnees['titre'];?></textarea></p>
  <p><label for="description">Description (1-3 lignes)</label>
  <textarea cols="50" rows="3" type="text" name="description" id="description"><?php echo $donnees['description'];?></textarea></p>
  <p><label for="url">Url du site (https://monsite.com) </label>
  <input type="text" name="url" id="url" value="<?php echo $donnees['url'];?>"/></p>
  <p><label for="nom_site">Nom du site (monsite.com) </label>
  <input type="text" name="nom_site" id="nom_site" value="<?php echo $donnees['nom_site'];?>"/></p>
  <p style="text-align:center"><input type="submit"/></p>
</form>
    </br></br>
    
   
    </div>
      <br><br><br><br><br>
  </body>
</html>