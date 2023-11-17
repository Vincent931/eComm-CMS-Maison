<?php session_start();
?>

<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'texte1.php';
  $req24=$bdd1->query('SELECT * FROM societe');
  $name=$req24->fetch();?>
  <?php require 'boutique0.php';
   require 'head.php';?>
   <style>
  #connect_bef{
  width: 800px;
  margin-left:100%;
  margin-right: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
}
@-moz-document url-prefix(){
}
@media all and (min-width: 120px) and (max-width: 1080px){
 #connect_bef{
  width: 330px;
  margin-left:10px;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
  position: relative;
  top: -170px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Vous devez d'abord vous connecter</title>
  <meta name="description" content="Avant de profiter des services vincent-dev-web, vous devriez vous connecter ou créer un compte"/>
</head>
     <body>
<?php require 'header.php';?>
    	<div style="height:150px" id="con_bef">&nbsp;</div>
      <div id="connect_bef"><h1 style="color:#11DE48">Vous devez d'abord vous connecter</h1><br><br>
        <a class="a_99_subm" style="width:220px" href="se-connecter">Je me connecte</a>
        <h1>&nbsp;</h1>
        <a class="a_99_subm" style="width:220px" href="creer-un-compte">Je crée mon compte</a>
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
