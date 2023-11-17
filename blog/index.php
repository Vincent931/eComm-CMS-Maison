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
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
require 'blog2.php';

$IP_blacklist='non';

$req2=$bdd2->query('SELECT * FROM blacklist');
while($donnees2=$req2->fetch()){
	if($donnees2['ip']==$_SERVER['REMOTE_ADDR']){$IP_blacklist='oui';}
}
if($IP_blacklist=='oui'){ header("Location:error-comment.php");}
?>

<!DOCTYPE html>
<html>
  <html id="bloc_page">
 <?php require 'head.php';?>
 <style>
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
#d_e{
  width:800px;
  margin-left:30%;
  margin-right: 100%;
  margin-top: 50px;
  margin-bottom: 10px;
}
.classe_100{
    width:400px;
    list-style-type: none;
    text-decoration:none;
    margin-left:100%;
    margin-right: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align:left;
    display: flex;
    flex-direction: column;
    background-color: white;
    vertical-align: middle;
    border-radius: 4px/4px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.jeuxcw{
  width:300px;
}
#menuB{
  display:none;
}
@-moz-document url-prefix(){
}
  @media only screen and (min-width: 200px) and (max-width: 1024px)  {
  #div_large{
    margin-top: 150px;
    margin-left: 0;
  }
  #h1_comment1{
    margin: 50px auto 0 auto;
    width: 150px;
    word-wrap: wrap;
  }
  #boutons_connect1{
    text-align: center;
    margin: auto;
    width: 330px;
  }
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
#d_e{
  width:300px;
  margin-left:15px;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
}
.classe_100{
    width:330px;
    margin-left:0;
    margin-right: 0;
    margin-top: 10px;
    margin-bottom: 10px;
}
.jeuxcw{
  width: 330px;
  margin-left:0;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 10px;
}
#menuB{
  display:none;
}
#titl{
  font-size: 18px;
}
@-moz-document url-prefix(){
}
}
</style>
  <title>Questions/Réponses, Page des sujets vincent-dev-web</title>
  <meta name="description" content="Vous obtenez des réponses à vos questionnements d'ordre général sur l'intégration de site vincent-dev-web"/>
</head>
   <body>
    <?php require 'header.php';?>
<div>
	<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
<div id="d_e">  
<?php
$req1=$bdd1->query('SELECT * FROM colorS');
$donnees1=$req1->fetch(); ?> 
<div id="div_large" style="background-color:<?php echo $donnees1['couleurBS'];?>">
<h1 id="h1_comment1">Questions / Réponses</h1>
</div><br>
			<h2 style="text-align:center;margin:auto;color:#50F114">- Je Sais ... </h2><br>
			<div id="boutons_connect1">
				<img src="../publicimgs/personne_icone.png" style="width:45px" id="bt_img">
			</div>
				<h2 style="background-color:white;text-align:center">Aujourd'hui le <?php echo date('d').'/'.date('m').'/'.date('Y'); ?></h2>
<?php 
if (isset($_SESSION['id_sujet']))
{
	$_SESSION['id_sujet'] = null;
}
//on récupère les 5 derniers billets
$req = $bdd2->query('SELECT id, image, img_type, titre1, contenu1, couleurT, couleurS, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics ORDER BY id');
while ($donnees = $req->fetch())
{
$img_type=$donnees['img_type'];?>
				<br>
        <div class='lef'><?php if(isset($img_type) AND $img_type=="image"){ ?>   
            <img class="img_norm" src="../publicimgs/<?php echo htmlspecialchars($donnees['image']);?>"/>
            <?php }
          if(isset($img_type) AND $img_type=="youtube"){ ?><iframe class="ifr" <?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php
            } if(isset($img_type) AND $img_type=="video"){ ?>
          <video src="../publicimgs/<?php echo $donnees['image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:left"></video>
        <?php }?>
        </div><br>
				<h2 id="titl" style="background-color:<?php echo $donnees['couleurT'];?>;text-decoration:underline"><?php echo $donnees['titre1']; ?></h2>
				<p>&nbsp;</p>
				<p style="background-color:<?php echo $donnees['couleurS'];?>;text-align:left"><?php echo html_entity_decode($donnees['contenu1']); ?></p>
				<p style="text-align:right"><em><a class="a_99_subm" style="text-align:right" href="detail-commenter-<?php echo htmlspecialchars($donnees['id']); ?>">Je donne mon avis...</a></em></p>
				<p>&nbsp;</p>

<?php
} //fin de la boucle des billets

$req->closeCursor();
$req1->closeCursor();
?>

<p>&nbsp;</p><p>&nbsp;</p>
<!--Jeux concours-->
<?php $req3=$bdd1->query('SELECT * FROM jeux');
$donnees3=$req3->fetch();
if(isset($donnees3['afficher']) AND $donnees3['afficher']=='oui'){
	echo 
		'<div class="classe_100" style="margin:auto;text-align:center;background-color:'.$donnees3['background'].'">
		<div style="height:15px">&nbsp;</div><h3 style="text-align:center;margin:auto;color:#289AFE">Jouons un peu ...</h3><div style="padding:10px;text-align:center"><img src="../publicimgs/'.$donnees3['image'].'" style="width:300px;text-align:center;margin:auto"/></div><div class="jeuxcw" style="margin:auto;padding:10px;text-align:left">'.$donnees3['contenu'].'</div>
		</div><br><br>';
}?>
</div>
		<p style="clear:left">&nbsp;</p>
			</div>
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
