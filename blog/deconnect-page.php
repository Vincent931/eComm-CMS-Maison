<?php session_start();
session_destroy();
session_unset();
require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';

require 'blog2.php';
?>

<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'head.php';?>
  <style>
#dec_e{
  width: 800px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 80px;
  margin-bottom: 10px;
  text-align: center;
}
.deconn_h{
  text-align: center;
}
.boutons_connect{
  text-align: center;
}
@-moz-document url-prefix(){
}
@media all and (min-width: 120px) and (max-width: 1080px){
    #deconn_img{
      width:120px;
    }
    #dec_e{
      width: 330px;
      margin-left:10px;
      margin-right: 0;
      margin-top: 10px;
      margin-bottom: 10px;
      position: relative;
      top: -100px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Déconnexion vincent-dev-web</title>
  <meta name="description" content="déconnectez-vous de votre compte vincent-dev-web ici"/>
</head>
    <body>
<?php require 'header.php'; ?>
      </br></br></br></br>
<div id="dec_e">
<h1 id="deconn_h">Mon-Compte</h1>		
			<div id="boutons_connect">
				<img id="deconn_img" src="../publicimgs/personne_icone.png" style="width:45px">
			</div><br>       
          <h2 class="deconn_h2"style="text-align:center;color:red">Déconnecté...</h2>
</div>
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