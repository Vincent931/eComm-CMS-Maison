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
$req25=$bdd1->query('SELECT * FROM publicite1');
$image=$req25->fetch();
$req26=$bdd1->query('SELECT * FROM publicite2');
$image1=$req26->fetch();
require 'boutique0.php';
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
require 'compteur.php';
$req3=$bdd->query('SELECT * FROM redirect');
$donnees3=$req3->fetch();
if(isset($donnees3['redirect']) AND $donnees3['redirect']=="oui"){
	header("Location:tarifs.php");
}
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php'; ?>
	<script><?php echo $donnees41['Contenu'];?></script>
<style>
	#cheque{
		display:block;
		margin-left: 100%;
		margin-right: 100%;
		text-align:center;
		width:330px;
 		padding: 15px;
  	border-radius: 4px/4px;
  	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	}
.p_che{
	margin:0;
	text-align:left;
}
.p_titl{
	font-size:14pt;
	color:#289AFE;
	text-decoration:underline;
}
.p_che2{
	margin:0;
	text-align:center;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#cheque{
		margin-left: 0;
		margin-right: 0;
		position: relative;
		top: -100px;
	}
.p_che{
	margin:0;
}
.p_titl{
	font-size:14pt;
}
.p_che2{
	margin:0;
}
@-moz-document url-prefix(){
}
}
</style>
	<title>Expédiez vos chèques avec ces coordonnées</title>
	<meta name="description" content="Utilisez ces coordonnées de vincent-dev-web pour vos paiements par chèque"/>
</head>
<body>
<?php	require 'header.php'; ?>
		<br><br><br><br><br><br>
<?php $req5=$bdd1->query('SELECT * FROM cheque');
$donnees5=$req5->fetch();?>
		<div id="cheque">
			<p class="p_che p_titl">Expédiez votre règlement à: </p><p style="height:15px">&nbsp;</p>
			<p class="p_che"><?php if(isset($donnees5['prenom'])){echo $donnees5['prenom'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['nom'])){echo $donnees5['nom'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['societe'])){echo $donnees5['societe'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['adresse1'])){echo $donnees5['adresse1'];}?></p>
			<?php if(isset($donnes5['adresse2'])){echo '<p class="p_che">'.$donnees5['adresse2'].'</p>';}?>
			<p class="p_che"><?php if(isset($donnees5['CP'])){echo $donnees5['CP'];}?> - <?php if(isset($donnees5['ville'])){echo $donnees5['ville'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['pays'])){echo $donnees5['pays'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['RCS'])){echo 'RCS : '.$donnees5['RCS'];}?></p>
			<p class="p_che"><?php if(isset($donnees5['ville_RCS'])){echo $donnees5['ville_RCS'];}?></p><br><br>
			<p class="p_che2"><a style="text-align:center;margin:auto" href="erase-panier.php" class="a_99_subm">Retour</a></p>
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
</html>
