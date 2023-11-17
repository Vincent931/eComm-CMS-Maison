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
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();

if(isset($_POST['formconnexion'])) {
   $mailconnect1 = htmlspecialchars($_POST['mailconnect']);
   $mailconnect = strtolower($mailconnect1);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd1->prepare("SELECT * FROM compte WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: panier.php");
      } else {
         $erreur = "Mes identifiants sont incorrects";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés";
   }
}
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php'; ?>
   <body>         
<?php require 'menu-haut.php'; 
      require 'menu-haut-no-burger.php'; ?>
</br><div class="vis1"></br><br></br></br></div>
      <div>
            <h1>www-1-zero : Vente de boutiques web en ligne</h1>       
      <h2 style="text-align:center;margin:auto">Se connecter</h2>
      <p style="text-align:center;display:inline"><img src="publicimgs/numerique.png" alt="Suite de bits" style="width:300px;height:85px;border-radius:5px 5px;border:1px solid black"/></p>
         <div id="boutons_connect">
            <img src="publicimgs/personne_icone.png" style="width:45px">
         </div>          
         <?php 
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>       
            <section>
               <article>
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input style="border:1px solid black" type="submit" name="formconnexion" value="Je me connecte" />
         </form>
         </br>
         <p style="text-align:center">où</p>
         </br>
         <p><a id="grey_color" href="blog/creer-un-compte.php">Je crée un compte</a></p>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </article>
   </section>
         <nav id="nav_side">
                  <ul><a style="text-decoration:none" href="mon-compte.php">Se Connecter</a></ul>
                  <ul><a style="text-decoration:none" href="blog/deconnect-page.php">Déconnecter</a></ul>
                  <ul><a style="text-decoration:none" href="blog/creer-un-compte.php">Créer un Compte</a></ul>
                  <ul><a style="text-decoration:none" href="blog/index.php">Retour aux Sujets</a></ul>
                  <ul><a style="text-decoration:none" href="blog/deposer.un.topic.php">Déposer un sujet</a></ul>
                  <ul><a style="text-decoration:none" href="facture.php">Factures</a></ul>
            </nav>
         </div>      
      <?php require 'footer.php'; ?>
      <?php require 'footer-resp.php';?>
   </body>
</html>