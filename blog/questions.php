<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
$req20=$bdd1->query('SELECT * FROM nav_haut');
$nav_haut=$req20->fetch();
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req22=$bdd1->query('SELECT * FROM nav_bas');
$nav_bas=$req22->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
require 'blog2.php';

if(isset($_COOKIE['email']) AND !empty($_COOKIE['email'])){
	$_SESSION['mail']=$_COOKIE['email'];
	$cookie_exist='oui';
}

$IP_blacklist='non';

$req2=$bdd2->query('SELECT * FROM blacklist');
while($donnees2=$req2->fetch()){
	if($donnees2['ip']==$_SERVER['REMOTE_ADDR']){$IP_blacklist='oui';}
}
if($IP_blacklist=='oui'){ header("Location:ERREUR");}
//if($cookie_exist!='oui'){ header("Location:Vous-devez-vous-connecter");}
?>

<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'head.php';?>
  <style>
#quest_e{
  width: 600px;
  margin: auto;
  margin-top: 10px;
  margin-bottom: 10px;
}
.h_connect{
  margin-left:auto;
  margin-right: auto;
  margin-top: 10px;
  margin-bottom: 10px;
  background-color:white;
  text-align:center;
  width:300px
}
.form_blog_comment{
  margin-left:auto;
  margin-right: auto;
  margin-top: 10px;
  margin-bottom: 10px;
  background-color:white;
  text-align:center;
  width:600px
}
.area_blog_comment{
  background-color:#FAF6E0;//#C2E2FD;
}
.inp_99{
  width: 240px;
}
p{
   text-align:center;
}
.area_blog_comment{
  width:530px;
}
@-moz-document url-prefix(){
}
@media all and (min-width: 120px) and (max-width: 1080px){
#quest_e{
  width: 330px;
  margin-left:15px;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
}
.h_connect{
  margin-left:0;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
  width:330px
}
.form_blog_comment{
  margin-left:0;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
  width:330px
}
p{
   text-align:right;
}
.area_blog_comment{
      width:330px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Questions à vincent-dev-web, le développeur</title>
  <meta name="description" content="Posez vos questions à vincent-dev-web sur cette page"/>
</head>
    <body>  	
<?php require 'header.php'; ?>
      </br></br></br></br><br><br>
<div id="quest_e">
<?php if(isset($_SESSION['message'])){echo '<h3 id="mess_h3" style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
// Connexion à la base de données
?>
<h2 class="h_connect" style="">Aujourd'hui le <?php echo date('d').'/'.date('m').'/'.date('Y'); ?></h2>
<form class="form_blog_comment" action="questions.post.php" method="post">
  <!--<p style="font-size:12px">Pas de compte ? <a style="color:blue;text-decoration:underline;font-size:12px" href="creer-un-compte">Créer un compte</a>&nbsp;&nbsp;ou&nbsp;&nbsp;
      <a style="color:blue;text-decoration:underline;font-size:12px" href="../reinitialiser">Mot de passe perdu</a></p>--><br/>
	<p><label for="mail">Votre Email&nbsp;</label><input class="inp_99" type="text" name="mail" id="mail" value="<?php if(isset($_SESSION['mail'])) {echo htmlspecialchars($_SESSION['mail']);} ?>"/></p><br><br>
	<!--<p><label for="mdp">Mot de Passe </label><input class="inp_99" type="password" name="mdp" id="mdp"/></p>-->
	<p><textarea class="area_blog_comment textarea_99" name="message_envoi" rows="10" cols="50">J'envoies ce message:</textarea></p>
	<p style="text-align:center"><input class="inp_99_subm" style="margin-top:1.25%"type="submit" value="Envoyer" /></p>
</form>
</div>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<br><br><br><br><br><br><br><br>
      <!-- Javascript -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery.easing.min.js"></script>
        <script src="../assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="../assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="../assets/js/custom.js"></script>
   </body>
</html>
