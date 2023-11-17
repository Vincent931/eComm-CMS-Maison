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
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
?>

<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<style>
#fact_e{
  width: 600px;
  margin-left:auto;
  margin-right: auto;
  margin-top: 80px;
  margin-bottom: 10px;
  text-align: center;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#fact_e{
  width: 330px;
  margin-left:0;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
}
#menu{
   position:relative;
   top: -60px;
}
@-moz-document url-prefix(){
}
}
</style>
  <meta name="robots" content="noindex"> 
</head>
   <body>         
      <?php require 'header.php';?>
            </br></br></br></br>
<div id="fact_e">
      <h2 id="h2_fact" style="text-align:center;margin:auto"> - Factures - </h2><br>
         <div id="boutons_connect">
            <img src="publicimgs/personne_icone.png" style="width:45px">
         </div>          
<?php

$oui='oui';
if(isset($_SESSION['mail']) AND !empty($_SESSION['mail'])) {
   $mail=htmlspecialchars($_SESSION['mail']);
   $ref="1";
   $req = $bdd->prepare('SELECT reference, acheteur, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE etat=? AND acheteur = ?');
   $req->execute(array($oui, $mail));
   ?><table><?php
while($donnees = $req->fetch()){
 if(isset($ref)AND !empty($ref)){
   if($ref!=$donnees['reference']){
      $ref=$donnees['reference'];?>
         
            <tr>
               <td class="td_fact">Vente du <?php echo $donnees['date_com'];?> <a class="a_fact" style="text-decoration:underline" href="la-facture-<?php echo htmlspecialchars($donnees['acheteur']);?>-<?php echo htmlspecialchars($donnees['reference']) ?>" target="_blank">N° Réf : <?php echo htmlspecialchars(urlencode($donnees['reference'])); ?></a></td>
            </tr>
         
      </br>
  <?php  
}
}
} ?></table><p style="height:400px">&nbsp;</p><?php
} else {?>
<h1 class="h_fact">Accéder aux factures ...</h1>
<p><a class="inp_99_subm" style="width:200px" href="blog/se-connecter">Je me connecte</a></p><br>
<p><a class="inp_99_subm" style="width:200px" href="reinitialiser">Je (ré-) initialise mon compte</a></p>
<?php
}?>   
</div>
   <br><br><br><br><br><br><br>        
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