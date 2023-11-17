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

/*if(isset($_COOKIE['email']) AND !empty($_COOKIE['email'])){
$_SESSION['mail']=$_COOKIE['email'];
}
if(isset($_SESSION['mail']) AND !empty($_SESSION['mail'])){
   $z="1";
   setcookie('email',$_SESSION['mail'], time()+ 365*24*3600,'/',null, false, true);
} else{ $_SESSION['mail']="";}*/

   if(isset($_POST['formconnexion'])) {
      $mailconnect1 = htmlspecialchars($_POST['mailconnect']);
      $mailconnect= strtolower($mailconnect1);
      $mdpconnect = sha1($_POST['mdpconnect']);
      if(isset($mailconnect) AND!empty($mailconnect) AND isset($mdpconnect) AND !empty($mdpconnect)) {
         $req = $bdd->prepare('SELECT * FROM compte WHERE mail = ? AND motdepasse = ?');
         $req->execute(array($mailconnect, $mdpconnect));
         $exist = $req->rowCount();
         if($exist > 0) {
            $donnees = $req->fetch();
            $_SESSION['pseudo'] = $donnees['pseudo'];
            $_SESSION['mail'] = $donnees['mail'];
            setcookie('email',$donnees['mail'], time()+ 365*24*3600,'/',null, false, true);
            if(isset($_GET['url']) AND $_GET['url']=='panier'){
               header('Location:../panier.php');
            }
            $message='Connecté, Avez-vous des questions ? <br><br><a class="a_99_subm" style="width:200px" href="Question">Questions </a><br><br>';
         } else {
            $message = "Mes identifiants sont incorrects";
         }
      } else {
         $message = "Tous les champs doivent être complétés";
      }
   }
?>

<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'head.php';?>
  <style>
   #moncompte{
  display: flex;
  flex-direction: column;
  width: 600px;
  margin-left:29%;
  margin-right: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
}
.h_connect{
   text-align: center;
}
#boutons_connect{
   text-align: center;
   margin-bottom: 40px;
}
@media all and (min-width: 120px) and (max-width: 1080px){
   #img_conn{
     width:100px
    }
    #moncompte{
     width: 330px;
     margin-left:0;
     margin-right: 0;
     margin-top: -80px;
     margin-bottom: 10px;
    }
}
</style>
   <title>Connexion à vincent-dev-web</title>
   <meta name="description" content="Vous pouvez vous connecter à votre compte vincent-dev-web via cette page"/>
</head>
    <body>
<?php require 'header.php'; ?>
      </br></br></br></br><br><br><br><br><br><br><br>
      <div id="moncompte">
<h1 class="h_connect"><?php echo $ste['nom'];?></h1>
         <h2 id="h2_connect" style="text-align:center;margin:auto;color:#289AFE">Je me connecte</h2><br>
         <div id="boutons_connect">
            <img id="img_conn" src="../publicimgs/personne_icone.png" style="width:45px">
         </div>            
         <?php if(isset($message) AND !empty($message)){echo '<h3 class="h_connect" style="text-align:center;margin:auto;color:red">'.$message.'</h3>'; $message="";} ?>       
            <section>
               <article>
         <form id="for_conn" class="form_99_400" method="POST" action="<?php if(isset($urlpanier) AND !empty($urlpanier)){echo $urlpanier;}?>" style="text-align:right;margin:auto" >
            <p><label for="mailconnect">Email&nbsp;&nbsp;</label><input class="inp_99" type="email" name="mailconnect" id="mailconnect" placeholder="user@mail.com"/></p>
            <p><label for="mdpconnect">Mot de Passe &nbsp;&nbsp;</label><input class="inp_99" type="password" name="mdpconnect" id="mdpconnect" placeholder="Mot de passe" /></p>
            <p style="font-size:12px">Pas de compte ?&nbsp;&nbsp;<a style="color:blue;text-decoration:underline;font-size:12px" href="creer-un-compte<?php if(isset($urlpanier) AND $urlpanier=="?url=panier"){echo $urlpanier;}?>">Créer un compte</a>&nbsp;&nbsp;ou&nbsp;&nbsp;
            <a style="color:blue;text-decoration:underline;font-size:12px" href="../reinitialiser">Mot de passe perdu</a></p><br/>
            <h3 style="margin:auto;text-align:center"><input type="submit" class="inp_99_subm" style="width:200px;margin:auto;text-align:center" name="formconnexion" value="Se connecter" /></h3>
         </form>      
         
      </article>
   </section><br><br><br><br><br><br>
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
