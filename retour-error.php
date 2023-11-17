<?php session_start();


$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'boutique0.php';
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req20=$bdd1->query('SELECT * FROM reterror');
$reterror=$req20->fetch();
?>
<!DOCTYPE html>
<html>
<?php require 'head.php';?>
<style>	
/*retour-error */
.info_paiement{
	width: 500px;
	margin: auto;
	padding: 20px;
	text-align: center;
	border-radius: 4px/4px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.paiement_image{
	width: 130px;
	margin: auto;
}
.h3_ret_err{
	color: red;
}
.p_centre_ret_err0{
  text-align:center;
}
.p_centre_ret_err{
  text-align:center;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
/*retour-error */
.info_paiement{
	width: 320px;
	margin: 0;
}
	@-moz-document url-prefix(){
}
}
</style>
	<meta name="robots" content="noindex">
</head>
	<script><?php echo $donnees41['Contenu'];?></script>
<body id="bloc_page_ret_err">
	<?php require 'header.php';?>
	<br><br><br><br>
<h1 class="h_ret_err">ERREUR de Paiement</h1>
<div class="info_paiement">
	 <!--<div style="text-shadow:none;min-width:1000px;text-align:left;" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
	<h3 class="h3_ret_err">Paiement annulé</h3>
	<p class="p_centre_ret_err0"><img class="paiement_image" src="publicimgs/bouton_paiement.png"></p>
	<?php echo html_entity_decode($reterror['contenu']);?>
	<p class="p_centre_ret_err"><a class="a_99_subm" href="../tarifs.php">Retenter achat</a></p>
</div>
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