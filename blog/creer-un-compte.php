<?php session_start();

$url="";
$urlpanier="";
if(isset($_GET['url']) AND !empty($_GET['url'])){
   $url=$_GET['url'];
   if($url=="panier"){
      $urlpanier='?url=panier';
   }
}


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
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
?>
<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'head.php';?>
  <style>
#cre_e{
  width: 400px;
  margin-left:auto;
  margin-right: auto;
  margin-top: 100px;
  margin-bottom: 10px;
}
@-moz-document url-prefix(){
}
@media all and (min-width: 120px) and (max-width: 1080px){
#cre_e{
  width: 330px;
  margin-left:0;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
  position: relative;
  top: -220px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Créer un compte vincent-dev-web</title>
  <meta name="description" content="Créer un compte vincent-dev-web vous permet de préremlir nos formulaires, poser vos questions et commenter un sujet"/>
</head>
    <body>
<?php require 'header.php'; ?>
    <div class="vis1"></br></br></div>
    <br><br><br><br>
       <div id="cre_e">
         <h1 id="cre_h"><?php echo $ste['nom'];?></h1>
         <h2 id="cre_h2" style="text-align:center;margin:auto;color:#289AFE">Je crée mon compte</h2><br>
         <div id="boutons_connect">
            <img src="../publicimgs/personne_icone.png" style="width:45px">
         </div>  
         <?php if(isset($_SESSION['message'])) {echo'<h2 style="color:red;text-align:center">'.$_SESSION['message'].'</h2>';$_SESSION['message']="";} 
        require "creer-compte.php";?>
                </br></br></br>    
        </div>
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