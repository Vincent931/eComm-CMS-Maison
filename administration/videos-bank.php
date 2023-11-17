<?php session_start(); 

require 'boutique0.php';

$req=$bdd->query('SELECT * FROM video');
While($donnees=$req->fetch())
{

  ?>
  <p><img style="width:180px" src="../publicimgs/<?php echo $donnees['image0'];?>"/></p>
  <p style="color:blue"><?php echo $donnees['nom']; ?></p>
  <p><?php echo $donnees['description'];?></p>
  </br>
  <?php
}
?>
<br><br><br><br><br>
    