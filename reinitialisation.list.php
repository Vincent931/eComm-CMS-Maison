<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

if(isset($_GET['mail'])AND !empty($_GET['mail']) AND isset($_GET['key']) AND !empty($_GET['key'])) {
	
	$mail=htmlspecialchars(urldecode($_GET['mail']));
	$key=htmlspecialchars(urldecode($_GET['key']));
} else {$_SESSION['message']="ERREUR, veuillez contacter l'administrateur.";}

require 'texte1.php';
$req20=$bdd1->query('SELECT * FROM nav_haut');
$nav_haut=$req20->fetch();
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req22=$bdd1->query('SELECT * FROM nav_bas');
$nav_bas=$req22->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php';?>
	<style>
#reinit2_contenant{
	width: 600px;
	margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#reinit2_contenant h2{
	width:600px;
  margin-left: 80%;
	margin-right: 80%;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}
#reinit2_div{
  width:600px;
  margin-left: 80%;
	margin-right: 80%;
	margin-top: 10px;
	margin-bottom: 10px;
}
#reinit2_form{
  width:600px;
  margin-left: 30%;
	margin-right: 30%;
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#reinit2_contenant{
	width: 330px;
	margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
	position: relative;
	top: -300px;
}
#reinit2_contenant h2{
	width:330px;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#reinit2_div{
  width:330px;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#reinit2_form{
  width:330px;
  margin-left: 0;
	margin-right: 30;
	margin-top: 10px;
	margin-bottom: 10px;
}
#menu{
  position:relative;
  top: -400px;
}
}
</style>
	<title>Deuxième étape de réinitialisation de mot de passe compte vincent-dev-web</title>
	<meta name="description" content="Vous êtes sur la deuxième étape de la rénitialisation de votre mot de passe."/>
</head>
	<body>			
<?php require 'header.php'; ?>
		</br><div class="vis1"></br><br></br></br></div>
<div id="reinit2_contenant">
			<p style="height:100px">&nbsp;</p>
			<h2>Réinitialisation de compte :</h2>
			<div id="reinit2_div">
				</br><?php if(isset($_SESSION['message'])){echo '<h3 style="background-color:white;color:red;width:400px;margin:auto;text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</br>
				<form id="reinit2_form" class="form_99_400" method="POST" action="reinitialisation.list2.php">
					<p><label for="mdp">Mot de Passe </label></p>
					<p><input class="inp_99" type="password" name="mdp" id="mdp"/></p>

					<p><label for="mdp2">Confirmez Mot de Passe </label></p>
					<p><input class="inp_99" type="password" name="mdp2" id="mdp2"/></p>
					
					<p><label for="pseudo">Pseudo </label></p>
					<p><input class="inp_99" type="text" name="pseudo" id="pseudo"/></p><br>

					<input type="hidden" name="key" id="key" value="<?php echo $key;?>"/>
					<input type="hidden" name="mail" id="mail" value="<?php echo $mail;?>"/>
					<p style="text-align:center"><input class="inp_99_subm" style="width:200px" type="submit" value="Valider"/></p>
				</form>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br>
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

