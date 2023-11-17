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
  <style>
/*retour-ok*/
.info_paiement{
  width: 600px;
  margin: auto;
  padding: 15px;
  text-align: center;
  border-radius: 4px/4px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.paiement_image{
  width: 130px;
}
#paie_ok{
  width: 580px;
  text-align: left;
}
.a_fact_ret_ok, .a_acc_ret_ok{
      margin-left:15px;
}
.p_ret_ok{
      text-align:right;
      font-size:8px;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
/*retour-ok*/
.info_paiement{
  width: 330px;
  margin: 0;
}
#paie_ok{
  width: 330px;
  margin: 0;
  text-align: left;
}
.a_cent{
  width: 330px;
  margin: 0;
  text-align: center;
}
@-moz-document url-prefix(){
}
}
</style>
  <script><?php echo $donnees41['Contenu'];?></script>
  <meta name="robots" content="noindex">
</head>
<body id="bloc_page_ret_ok">
  <?php require 'header.php';?>
  <div class="info_paiement">
     <!--<div style="text-shadow:none;min-width:1000px;text-align:left;" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
    <h1 style="color:#289AFE;text-align:center">Paiement</h1>
    <h3 style="color:#11DE48;text-align:center">Paiement accepté</h3>
    <p class="p_img_paiem"><img class="paiement_image" src="publicimgs/bouton_paiement.png"></p>
    <div id="paie_ok">
      <?php echo html_entity_decode($retok['contenu']);?>
		    <div class="div_liens" style="text-align:center;margin:auto;">
    </div>
				<p class="a_cent"><a style="text-align:center;margin:auto;" class="a_99_subm" href="accueil.html">Accueil</a><p>
			</div>
    </div>
    <br><br><br>
<?php $non_aff_compt=true; require 'footer.php';?>
        <!-- Javascript -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="assets/js/custom.js"></script>
  </body>
</html>