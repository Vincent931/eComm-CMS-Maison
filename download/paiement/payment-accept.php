<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req20=$bdd1->query('SELECT * FROM retok');
$retok=$req20->fetch();
require 'boutique0.php';
?>
<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html>
  <?php require 'head.php';?>
<body id="bloc_page_ret_ok">
  <div class="info_paiement">
    <h1 style="color:blue;text-align:center">Paiement</h1>
    <h3 style="margin:auto;text-align:center">Paiement accepté</h3>
    <p class="p_img_paiem"><img class="paiement_image" src="../publicimgs/bouton_paiement.png"></p>
      <?php echo html_entity_decode($retok['contenu']);?>
		    <div class="div_liens">
				<a id="grey_color" class="a_acc_ret_ok" href="../index.php">Accueil</a>
			</div>
    </div>
    <P class="p_ret_ok">www-1-zero</P>
    <?php require 'footer.php'; ?>
  </body>
</html>