<?php session_start();

session_destroy();

require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req20=$bdd1->query('SELECT * FROM retok');
$retok=$req20->fetch();
require 'boutique0.php';
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
?>
<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html>
  <?php require 'head.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script><?php echo $donnees41['Contenu'];?></script>
<body id="bloc_page_ret_ok">
  <div class="info_paiement">
     <!--<div style="text-shadow:none;min-width:1000px;text-align:left;" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
    <h1 style="color:blue;text-align:center">Paiement</h1>
    <h3 style="margin:auto;text-align:center">Paiement accepté</h3>
    <p class="p_img_paiem"><img class="paiement_image" src="../publicimgs/bouton_paiement.png"></p>
      <?php echo html_entity_decode($retok['contenu']);?>
		    <div class="div_liens" style="text-align:center;margin:auto;">
				<a style="text-align:center;margin:auto;" class="a_99_subm" href="../accueil.html">Accueil</a>
			</div>
    </div>
    <?php require 'footer.php'; ?>
    <br><br><br>
  </body>
</html>