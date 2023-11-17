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
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
$req=$bdd1->query('SELECT contenu FROM politique');
$politique=$req->fetch();
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php'; ?>
	<style>
#politique h1{
	text-align:center;
  margin:auto;
}
#politique{
  width: 900px;
  margin-left: 20%;
	margin-right: 100%;
	margin-top: 10px;
	margin-bottom: 10px;
  color: #5B6975;
  text-align:left;
  position: relative;
  top: -180px;
}
@-moz-document url-prefix(){
  #politique{
  	top: -60px;
}
}
@media only screen and (min-width: 200px) and (max-width: 1024px){
	#politique{
  width: 330px;
  margin-left: 15px;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#politique h1{
	text-align:center;
  margin:0;
}
#menu{
	position:relative;
	top: -180px;

}
@-moz-document url-prefix(){
  	#politique{
  		top: -130px;
		}
}
}
</style>
		<title>Page politique de confidentialité vincent-dev-web</title>
	<meta name="description" content="Cette page résume notre politique de confidentialité, vincent-dev-web"/>
</head>
	<body>
<?php require 'header.php'; ?>
			<br><div class="vis1"><br><br><br><br><br></div>
			<br><br><br><br><br><br><br>
<div id="politique">
<h1>Mentions légales et politique de confidentialié</h1>
<br>
<?php echo html_entity_decode($politique['contenu']);?>
</div>
<br><br><br>
<?php $non_aff_compt=true; require 'footer.php';?>
        <!-- Javascript -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/jquery.easing.min.js"></script>
        <script src="./assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="./assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="./assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="./assets/js/custom.js"></script>
	</body>
</html>