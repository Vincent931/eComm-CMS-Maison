<?php session_start(); 

require 'boutique0.php';

$req=$bdd->query('SELECT * FROM music');
While($donnees=$req->fetch())
{

  ?>
  <p><img style="width:180px" src="../publicimgs/music.png"/></p>
  <p style="color:blue"><?php echo $donnees['nom']; ?></p>
  <p><?php echo $donnees['description'];?></p>
  </br>
  <?php
}
?>
<br><br><br><br><br>