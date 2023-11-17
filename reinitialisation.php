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
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php'; ?>
	<style> 
#reinit_div{
  width:600px;
  margin-left: 20%;
	margin-right: 20%;
	margin-top: 10px;
	margin-bottom: 10px;
}
#div_talk{
  width: 600px;
  margin-left: 80%;
	margin-right: 80%;
	margin-top: 10px;
	margin-bottom: 10px;
}
#form_reinit{
	width: 600px;
  margin-left: 80%;
	margin-right: 80%;
	margin-top: 10px;
	margin-bottom: 10px;
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#reinit_div{
  width:330px;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
	position:relative;
  top: -200px;
}
#div_talk{
  width: 330px;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#form_reinit{
	width: 330px;
  margin-left: 0;
	margin-right: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#menu{
  position:relative;
  top: -350px;
}
}
</style>
	<title>Page de réinitialisation de mot de passe vincent-dev-web</title>
	<meta name="description" content="Vous pouvez réinitialiser votre mot de passe de compte ici."/>
</head>
	<body>
<?php require 'header.php'; ?>
</br><div class="vis1"></br><br><p style="height:50px">&nbsp;</p></div><div class="sauter_ligne"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
<div style="margin:0;border:0;padding:0">
		
<?php if(isset($_SESSION['message'])){echo '<h3 style="background-color:white;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>
		<div id="reinit_div">
			<div id="div_talk">
			<p>Vous avez <span style="color: red">perdu</span>, ou <span style="color: red">jamais utilisé</span>, vos identifiants de connexions ?!</p>
			<p>Vous pouvez réinitialiser votre mot de passe et pseudo à partir de votre email.<p>
			<p>Veuillez remplir le champs ci-dessous.</p>
			<p style="color:blue">Un lien de réinitialisation va vous être envoyé sur votre boîte mail.</p>
			<p style="text-align:right">Vérifiez le dossier <span style="color:red">Spams</span>.</p>
		</div>
			
			</br></br></br>
				<form id="form_reinit" method="POST" action="reinitialisation.pre.list.php">
						<p style="text-align:center"><label for="mail">Email </label></p>
						<p><input class="inp_99" style="width:200px" type="email" placeholder="monemail@mail.com" name="mail" id="mail"/></p>
						<p><input class="inp_99_subm" style="width:200px" type="submit" value="Valider"/></p>
					</tr>
				</form>
				<p style="height:250px">&nbsp;</p>	
		</div>
<br><br><br><br><br>
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

	