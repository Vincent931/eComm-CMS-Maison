<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

require 'boutique0.php';

if(isset($_GET['mail'], $_GET['key']) AND !empty($_GET['mail']) AND !empty($_GET['key'])) {
   $mail = htmlspecialchars(urldecode($_GET['mail']));
   $key = htmlspecialchars(urldecode($_GET['key']));
   $requser = $bdd->prepare("SELECT * FROM compte WHERE mail = ? AND confirmkey = ?");
   $requser->execute(array($mail, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirme'] == 0) {
         $updateuser = $bdd->prepare("UPDATE compte SET confirme = 1 WHERE mail = ? AND confirmkey = ?");
         $updateuser->execute(array($mail, $key));
         $_SESSION['message']="Votre compte a bien été confirmé, veuillez observer la grille des produits pour plus de précisions. Connectez-vous, onglet Compte dans le menu du Haut ou cliquez sur le lien: Connectez-vous.";

      } else {
         $_SESSION['message']= "Votre compte a déjà été confirmé, veuillez réinitialiser votre compte si vous avez des soucis...".'<a href="reinitialisation.php">Réinitialiser ici</a>';
      }
   } else {
      $_SESSION['message']="L'utilisateur n'existe pas !!!";
   }
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
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req25=$bdd1->query('SELECT * FROM publicite1');
$image=$req25->fetch();
$req26=$bdd1->query('SELECT * FROM publicite2');
$image1=$req26->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
   <?php require 'head.php'; ?>
<meta name="robots" content="noindex">
</head>
   <body>         
<?php require 'menu-haut.php'; 
      require 'menu-haut-no-burger.php'; ?>
</br><div class="vis1"></br><br></br></br></div>

<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>        
         <?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
      <br><br>
      <h2 style="color:blue;text-align:center;margin:auto">VOTRE COMPTE EST CONFIRME </h2><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
      <?php require 'footer.php'; ?>
   </body>
</html>
