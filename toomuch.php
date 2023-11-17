<?php session_start();
session_destroy();

require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<style>
.toomuch{
	width: 300px;
	margin-left: 50%;
	margin-right: 50%;
	padding: 7px;
	border-radius: 4px/4px;
  	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.h2_panier_bs{
	color:blue;
	margin-left: 0;
	margin-right: 0;
	text-align:center;
	width: 300px;
}
.a_panier_bs{
	margin-left: 0;
	margin-right: 0;
	text-align:center;
	text-decoration:none;
	border-radius:10px/10px;
	color:white;
	background-color:black;
	padding:4px;
	width: 300px;
}
@media only screen and (min-width: 200px) and (max-width: 1024px){
.toomuch{
	width: 300px;
	margin-left: 0;
	margin-right: 0;
}
}
</style>
<!DOCTYPE html>
<html id="bloc_page">
<body>
<?php require 'header.php'; ?>
<p style="height:150px">&nbsp;</p>
<div class="toomuch">
<h2 class="h2_panier_bs">Vous ne pouvez pas ajouter plus de 30 produits au panier</h2>
<p style="height:20px">&nbsp;</p>
<a class="a_panier_bs" href="tarifs.php">Retour</a>
<br><br><br><br><br><br><br><br><br><br><br>
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
</div>
</html>