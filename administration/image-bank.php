<?php session_start(); 

require 'boutique0.php';

$req=$bdd->query('SELECT * FROM image');
While($donnees=$req->fetch())
{
	if($donnees['intitule']!='labelF'){

	  ?>
	  <div style="display:inline-block; width:185px; text-align:left">
	  <p><img style="width:180px" src="../publicimgs/<?php echo $donnees['nom'];?>"/></p>
	  <p style="color:blue"><?php echo $donnees['nom']; ?></p>
	  <p><?php echo $donnees['description'];?></p>
	  </br>
	  </div>
	  <?php
	}
}
?>
<br><br><br><br><br>
    
