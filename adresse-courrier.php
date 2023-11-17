<?php session_start();

require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req25=$bdd1->query('SELECT * FROM publicite1');
$image=$req25->fetch();
$req26=$bdd1->query('SELECT * FROM publicite2');
$image1=$req26->fetch();


$req24=$bdd1->query('SELECT * FROM cheque');
$name2=$req24->fetch();
$req25=$bdd1->query('SELECT * FROM publicite1');
$image=$req25->fetch();
$req26=$bdd1->query('SELECT * FROM publicite2');
$image1=$req26->fetch();
require 'boutique0.php'; ?>

<!DOCTYPE HTML>
<?php require 'head.php'; ?>
<style>
#cheque{
	display:block;
	margin-left: 10%;
	margin-right: 100%;
	text-align:center;
	padding: 15px;
	width:330px;
	border-radius: 4px/4px;
  	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.h_cour{
	margin: 0;
	width: 330px;
	font-size: 19px;
	text-decoration: underline;
	color:#289AFE;
}
.p_che{
	margin:0;
	text-align:left;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#cheque{
		margin: 40px auto auto 15px;
	}
.p_che{
	margin:0;
}
@-moz-document url-prefix(){
}
}
</style>
	<title>Adresse Courrier de vincent-dev-web</title>
	<meta name="description" content="Vous pouvez obtenir l'adresse postale de vincent-dev-web sur cette page"/>
</head>
<body>
	<?php require 'header.php'; ?>
		<br><br><br><br>
	<div id="cheque">
		<h1 class="h_cour">Adresse Postale:</h1><br>
		<p class="p_che"><?php echo $name2['prenom'].' '.$name2['nom'];?></p>
		<p class="p_che"><?php echo $name2['societe'];?></p>
		<p class="p_che"><?php echo $name2['adresse1'];?></p>
		<p class="p_che"><?php echo $name2['adresse2'];?></p>
		<p class="p_che"><?php echo $name2['CP'];?> - <?php echo $name2['ville'];?></p>
		<p class="p_che"><?php echo $name2['pays'];?></p>
		<p class="p_che">RCS <?php echo $name2['RCS'];?>-<?php echo $name2['ville_RCS'];?></p>
		<p></p>
		<p>&nbsp;</p>
		<a href="Contact-et-Infos" class="a_99_subm">RETOUR</a>
	</div>
	<br><br><br><br>
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