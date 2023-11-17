<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require 'boutique0.php';
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
$req=$bdd1->query('SELECT contenu FROM a_savoir');
$a_savoir=$req->fetch();
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php';?>
	<style>
#cgv_retour{
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align:left;
}
.cgv_p{
	width: 300px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align:center;
}
.cgv_a{
	width: 100px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 10px;
}
#mise_en_garde{
	color: #5B6975;
	width: 900px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align:left;
}
#cgv_h{
  width: 600px;
  text-align: center;
  margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align:center;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
	#cgv_retour{
	width: 330px;
	margin-left: 10px;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
.cgv_p{
	width: 330px;
	margin-left:0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}
.cgv_a{
	width: 100px;
	margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}
#mise_en_garde{
	width: 330px;
	margin-left: 15px;
	margin-right: 15px;
	margin-top: 10px;
	margin-bottom: 10px;
}
#cgv_h{
  width: 330px;
  text-align: center;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
@-moz-document url-prefix(){
}
}
</style>
	<title>Page de Conditions Générales de Ventes Vincent-dev-web</title>
	<meta name="description" content="Vous êtes sur la Page des Conditions Générales de Ventes vincent-dev-web"/>
</head>
	<body>
<?php require 'header.php'; ?>
		<br><div class="vis1"><br><br><br><br><br></div>
<?php echo '<div id="cgv_retour">'.'<p class="cgv_p" style="text-align:center;color:red">'.'La validation des Conditions Générales de Vente fait acte de connaissance des termes de la vente'.'</p><br>'.'<p class="cgv_p">'.'<a class="cgv_a" id="grey_color" href="'.$_SERVER['HTTP_REFERER'].'">'.'Retour'.'</a>'.'</p>'.'</br>'.'</div>';$_SESSION['cgv']="";
			?>		
			<div id="mise_en_garde">
			<h1 id="cgv_h">Conditions Générales de Vente</h1>
			<br>
			<?php echo html_entity_decode($a_savoir['contenu']);?>
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