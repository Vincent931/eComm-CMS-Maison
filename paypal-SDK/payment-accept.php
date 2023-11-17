<?php session_start();

session_destroy();
require 'boutique0.php';
require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req20=$bdd1->query('SELECT * FROM retok');
$retok=$req20->fetch();

?>
<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html>
  <?php require 'head.php';?>
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
    <p class="p_img_paiem"><img class="paiement_image" style="width:120px" src="../publicimgs/paypal-SDK.png"></p>
      <?php echo html_entity_decode($retok['contenu']);?>
		    <div class="div_liens" style="text-align:center;margin:auto">
				<a style="text-align:center;margin:auto" class="a_99_subm" href="../accueil.html">Accueil</a>
			</div>
    </div>
    <?php require 'footer.php'; ?>
    <br><br><br>
  </body>
</html>
