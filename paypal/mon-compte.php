<?php
session_start();

try
{
   $bdd = new PDO('mysql:host=localhost;dbname=vvhv1249_boutique;charset=utf8', 'root', 'Bpm135');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM compte WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: ../cookie.php");
      } else {
         $erreur = "Mes identifiants sont incorrects";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés";
   }
}
?>
<!DOCTYPE html>
<html>
                       <head>
                              <meta charset="utf-8"/>
                              <link href="../css/style.css" rel="stylesheet"/>
                              <link rel="shortcut icon" href="../publicimgs/icone.png">
                              <title>www-1-zéro</title>
                        </head>

   <body style="text-align:center">
      <div id="bloc_page">
            <h1>www-1-zero : Vente de boutiques web en ligne</h1>
      <div id="en_ligne_haut">
            <nav style="background-color:#61BDDF;font-size:1.08em">
               <ul><a href="index.php">Accueil</a></ul>
               <ul><a href="tarifs.php" class="logo">La Boutique</a></ul>
               <ul><a href="tarifs.php">Découverte des Tarifs</a></ul>
               <ul><a href="blog/index.php">Compte/Blog</a></ul>
               <ul><a href="tarifs.php">Commander</a></ul>
            <nav>

      </div>         
      <h2>Se connecter</h2>
      <p style="text-align:center;display:inline"><img src="../publicimgs/numerique.png" alt="Suite de bits" style="width:300px;height:85px;border-radius:5px 5px;border:1px solid black"/></p>
         <div id="boutons_connect">
            <img src="../publicimgs/personne_icone.png" style="width:45px">
         </div>          
                 
            <section>
               <article>
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input style="border:1px solid black" type="submit" name="formconnexion" value="Je me connecte" />
         </form>      
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </article>
   </section>
            <nav id="nav_side">
            	<ul><a style="text-decoration:none" href="../blog/index.php">Sujets/Accueil</a></ul>
                <ul><a style="text-decoration:none" href="mon-compte.php">Se Connecter</a></ul>
                <ul><a style="text-decoration:none" href="../blog/deconnect-page.php">Je me déconnecte</a></ul>
                <ul><a style="text-decoration:none" href="../blog/creer-un-compte.php">Créer un Compte</a></ul>
                <ul><a style="text-decoration:none" href="../facture.php">Factures</a></ul>
            </nav>      
      <footer>
         <div id="en_ligne">
            <nav id="nav_bas">
               <ul><a href="../contact.php">Contact</a></ul>
               <ul><a href="../publicimgs/grille-tarifs.pdf">Télécharger la grille des tarifs</a></ul>
               <ul><a href="../politique-confidentialité.php">Politique de confidentialité</a></ul>
               <ul><a href="../mise-en-garde.php">Mise en garde</a></ul>
               <ul><a href="../reinitialisation.php">Problème de compte</a>
            </nav>
         </div>
      </footer>
   </body>
</html>