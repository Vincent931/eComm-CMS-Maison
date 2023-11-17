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

require 'blog2.php';

if(isset($_COOKIE['email']) AND !empty($_COOKIE['email'])){
	$_SESSION['mail']=$_COOKIE['email'];
}

$IP_blacklist='non';

$req2=$bdd2->query('SELECT * FROM blacklist');
while($donnees2=$req2->fetch()){
	if($donnees2['ip']==$_SERVER['REMOTE_ADDR']){$IP_blacklist='oui';}
}
if($IP_blacklist=='oui'){ header("Location:error-comment.php");}
?>

<!DOCTYPE html>
  <html id="bloc_page">
  <?php require 'head.php';?>
  <style>
    body{
      box-sizing: border-box;
    }
    .lef{
    text-align: left;
  }
 .img_norm{
  text-align:left;
  width:450px;
  border:0;
  margin-left:0;
  margin-right:auto;
  }
  .ifr{
    width: 450px;
    height: 280px;
    text-align: left;
    margin-left: 0;
  }
#com_e{
  width:800px;
  margin-left:23%;
  margin-right: 100%;
  margin-top: 80px;
  margin-bottom: 10px;
}
#div_large{
  width:650px;
  margin-left:100%;
  margin-right: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
  padding:35px;
  text-align:center;
  border-radius: 4px/4px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
#h1_comment1{
  margin:auto;
  width: 600px;
  list-style-type: none;
  text-decoration:none;
  text-align:center;
  display: flex;
  flex-direction: column;
  background-color: white;
  vertical-align: middle;
  border-radius: 4px/4px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
#titl_e{
  margin: auto;
  width: 600px;
}
#cont_e{
  margin: auto;
  width: 600px;
}
#pseudo_e{
  margin: auto;
  width: 600px;
}
#mess_e{
  margin: auto;
  width: 600px;
}
#div_e{
  width: 350px;
  margin: auto;
  text-align: center;
}
#mess_h3{
  font-size:14px;
}
.form_blog_comment{
  width:350px;
  margin:auto;
  text-align:center;
  margin-top: 40px;
}
.p_e{
  text-align:right;
  margin-right:20px;
}
.area_blog_comment{
  text-align:left;
  width:450px;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
 .img_norm{
  text-align:center;
  width:330px;
  border:0;
  margin-left:auto;
  margin-right:auto;
  }
  .ifr{
    width: 330px;
    height: 240px; 
  }
  #com_e{
  width:330px;
  margin-left:15px;
  margin-right: 10px;
  margin-top: 60px;
  margin-bottom: 10px;
  box-sizing: border-box;
}
#div_large{
  width:330px;
  margin-left:0;
  margin-right: -50px;
  margin-top: 10px;
  margin-bottom: 10px;
  padding-left:10px;
  padding-right: 10px;
  padding-top: 35px;
  padding-bottom: 35px;
}
h1#h1_comment1{
  width: 330px;
}
#boutons_connect{
  text-align: center;
  margin: auto;
}
#titl_e{
  margin: auto;
  width: 330px;
}
#cont_e{
  margin: auto;
  width: 330px;
}
#pseudo_e{
  margin: auto;
  width: 330px;
}
#mess_e{
  margin: auto;
  width: 330px;
}
#div_e{
  width: 330px;
  margin: auto;
  text-align: center;
}
.h3_e{
  width:330px;
  margin-left:0;
  margin-right: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  box-sizing: border-box;
}
#mess_h3{
  font-size:14px;
}
.form_blog_comment{
  width:330px;
  margin:auto;
}
.p_e{
  text-align:right;
  margin-right:2px;
}
.area_blog_comment{
  width:330px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Commentaires Questions/Réponses vincent-dev-web</title>
  <meta name="description" content="Vous pouvez laisser vos commentaires sur les sujets vincent-dev-web ici"/>
</head>
    <body>
<?php require 'header.php'; ?>
<br><br><br>
<div id="com_e">
<h1 id="h1_comment1">- Lire/Ecrire AVIS -</h1><br>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
			</div><br>
            <section>
            	<article>
<?php $req1=$bdd1->query('SELECT * FROM colorS');
$donnees1=$req1->fetch(); ?>  		
<div id="div_large" style="text-align: center;margin: auto;background-color:<?php echo $donnees1['couleurBS'];?>">
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
// Connexion à la base de données
?>
<h2 style="background-color:white;text-align:center;margin:auto">Aujourd'hui le <?php echo date('d').'/'.date('m').'/'.date('Y'); ?></h2><br>
<?php
//1eres conditions de securite
if (isset($_GET['sujet']))	//isset sur $_GET['sujet'] et attribution de la variable $id_sujet
	{
		$id_sujet = htmlspecialchars(urldecode($_GET['sujet']));
		$id_sujet = (int) ($id_sujet);
	}
elseif (   ( (isset($donnees['id'])) AND (isset($_GET['sujet'])) ) OR (isset($donnees['id']))   )	//isset sur $donnees['id']
	{
		$id_sujet = htmlspecialchars($donnees['id']);
	}
elseif ( isset($_SESSION['id_sujet']))	//attribution de $id_billet avec $_SESSION['id_sujet'] venu de commentaires_post.php']
	{
		$id_sujet = htmlspecialchars($_SESSION['id_sujet']);	//quel que soit la variable d'entrée en sortie = $id_sujet
	}
if (isset($_POST['pseudo_envoi']))
	{
			$_POST['pseudo_envoi'] = null;	//on attribue $_COOKIE['pseudo'] de $_POST['pseudo_envoi'] venu de commentaires_post.php
	}

//récupération du billet avec prepare
$req = $bdd2->prepare('SELECT id, image, img_type, titre1, contenu1, couleurT, couleurS, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics WHERE id =:id_sujet');
//on récupère la requête dans un array $id_sujet rentré en URL sur index.php ou venu de commentaires_post.php
$req->execute(array(
'id_sujet' => $id_sujet));
$donnees = $req->fetch();
$img_type=$donnees['img_type'];
?>
<div class='lef'><?php if(isset($img_type) AND $img_type=="image"){ ?>   
            <img class="img_norm" src="../publicimgs/<?php echo htmlspecialchars($donnees['image']);?>"/>
            <?php }
          if(isset($img_type) AND $img_type=="youtube"){ ?><iframe class="ifr" <?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php
            } if(isset($img_type) AND $img_type=="video"){ ?>
          <video src="../publicimgs/<?php echo $donnees['image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:left"></video>
        <?php }?>
        </div><br>
				<h2 id="titl_e" style="margin:auto;text-align:left;background-color:<?php echo $donnees['couleurT'];?>;text-decoration:underline"><?php echo $donnees['titre1']; ?></h2>
				<p>&nbsp;</p>
				<p id="cont_e" style="margin:auto;text-align:left;background-color:<?php echo $donnees['couleurS'];?>"><?php echo html_entity_decode($donnees['contenu1']); ?></p>	
			</br>

				<h3 id="h3_e" style="text-align:center; margin:auto">Derniers commentaires :</h3>
<?php
//récupération des commentaires avec une requete preparée
$req = $bdd2->prepare('SELECT pseudo, message, DATE_FORMAT(date_creation_message, \'%d/%m/%Y à %Hh%imin%ss\') As date_creation_message_fr FROM commentaires WHERE id_sujet = :id_sujet ORDER BY date_creation_message DESC');
$req->execute(array(
'id_sujet' => $id_sujet)); //ici on utilise l'id de billets rentré en url qui correspond à id_billet dans la bdd commentaires
while ($donnees = $req->fetch())
			
		{
		?><p id="pseudo_e" style="margin:auto;text-align:left;background-color:white;text-decoration:underline">Par: <?php echo htmlspecialchars($donnees['pseudo']); ?></p>
		<p>&nbsp;</p>
		<p id="mess_e" style="margin:auto;text-align:left;background-color:<?php echo $donnees['couleurT'];?>">Message  ---  <?php echo htmlspecialchars($donnees['message']); ?></p>	
		</br>
		<?php
		}
//Fin de boucle de récupération des 5 derniers commentaires
$req->closeCursor();
$req1->closeCursor();
?>
</div>
	<form class="form_blog_comment" action="commentaires.post.php" method="post">
	<div id="div_e">
    <p style="margin-left: 0;text-align:center"><label for="mail">email </label></p>
	<p class="p_e"><input class="inp_99" type="text" name="mail" id="mail" value="<?php if(isset($_SESSION['mail'])) {echo htmlspecialchars($_SESSION['mail']);} ?>"/></p>
	<p style="margin-left: 0;text-align:center"><label for="mdp">Mot de Passe </label></p>
	<p class="p_e"><input class="inp_99" type="password" name="mdp" id="mdp"/></p><br>
	</div>				
	<p style="text-align:center;margin:auto"><textarea class="area_blog_comment textarea_99" name="message_envoi" rows="10" cols="50">Message ...</textarea></p><br>

    <input type="hidden" name="id_sujet" value="<?php if(isset($id_sujet)) {echo htmlspecialchars($id_sujet);} ?>"/>

	<p style="text-align:center;margin:auto"><input class="inp_99_subm" style="width:200px" type="submit" value="Envoyer" /></p><br>
    
  <p style="text-align:center;margin:auto"><a href="Questions-Reponses" style="text-align:center;margin:auto" class="a_99_subm" style="width:200px" type="submit">Retour<a/></p>     

	</form>
</article>
</section>
</div> 
<br><br><br><br><br>
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
