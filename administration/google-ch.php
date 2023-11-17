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
      <h2 style="text-align:center">Informations Google Maps</h2>
      <div id="boutons_connect">
        <img src="../publicimgs/personne_icone.png" style="width:45px">
        <tr>
          <td>
            <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
          </td>
        </tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
      </div></br>
<?php $req=$bdd1->query('SELECT * FROM google_mp');
$donnees=$req->fetch();
?>
<p><a href="https://cloud.google.com/maps-platform/?apis=maps" id="grey_color">Créez votre compte Google Pro pour obtenir une carte situant votre société</a> sur https://cloud.google.com/maps-platform/?apis=maps (gratuit pour moins de 14000 connexions/mois).</p>
<p>Créez votre espace et activez maps API Javascript.</p>
<P>Trouver votre API Key sur https://developers.google.com/maps/documentation/javascript/get-api-key .</P>
<p>Veuillez entrer la latitude, longitude et si Google Maps est utilisé.</p>
<form id="map_form" method="post" action="google-ch.list.php">
  <p><label for="exist">Afficher Maps (oui/non) </label>
  <input type="text" name="exist" id="exist" value="<?php echo $donnees['exist'];?>"/></p>
  <p><label for="latitude">Latitude </label>
  <input type="text" name="latitude" id="latitude" value="<?php echo $donnees['lat'];?>"/></p>
  <p><label for="longitude">Longitude </label>
  <input type="text" name="longitude" id="longitude" value="<?php echo $donnees['lon'];?>"/></p>
   <p><label for="api">Key d'API </label>
  <input type="text" name="api" id="api" value="<?php echo $donnees['api'];?>"/></p>
  <p style="text-align:center"><input type="submit"/></p>
</form>
    </br></br>
    
   
    </div>
      <br><br><br><br><br>
  </body>
</html>