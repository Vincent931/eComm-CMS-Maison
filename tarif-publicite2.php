<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();

if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';

require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req24=$bdd1->query('SELECT nom FROM societe');
$sigle=$req24->fetch();
require 'boutique0.php';

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();

?>

<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<style>
#contenant_produit_solo{
  width:800px;
  display:block;
  margin:100px;
  margin-bottom: 10px;
  text-align: center;
}
.image_pro_solo{
  width:368px;
  height:368px;
  display:inline-block;
  vertical-align:top;
}
.image_pro_solo2{
  border: 1px solid black;
  width:368px;
  height:368px;
  display:inline-block;
  vertical-align:top;
  /*border: 0;*/
  padding: 0;
  margin: 0;
}
#espace_en{
  width:20px;
  display:inline-block;
  vertical-align:top;
}
.a_tar12{
  display:inline-block;
}
#conteneur_produit_solo{
  width:370px;
  height:370px;
  display:inline-block;
  vertical-align:top;
}
#espace_av2{
  display:block;
  height:15px;
}

#title_2{
  display:block;
  overflow-wrap: break-word;
  height:80px;
  font-size:16px;
  color:#289AFE;
  text-align:left;
}
.espace_ap2{
  height:15px;
  display:block;
}
#description_produit_2{
  display:block;
  overflow-wrap: break-word;
  font-size:14px;
  height:120px;
  text-align:left;
}
#price_2{
  text-align:left;
  text-decoration:none;
  width:100px;
  display:block;
  font-weight:bold;
  color: #11DE48;
  font-size:25px;
}
#price_barre{
  display:inline-block;
  position:relative;
  right:-60px;
  top:-20px
}
#p_pro_lien_2{
  max-width:80%;
  text-align:left;
  vertical-align:baseline;
  display:block;
}
#p_pro_lien_2 .addPanier{
  font-size:16px;width:190px;border-radius:5px/5px;color:white;padding:15px;float:left;text-decoration:none;display:inline-block;

}
#col1.add.addPanier{
  width: 160px;
  font-size:15px;
}
a#cola1.a_pro_lien_2{
  font-size:15px;
  position: relative;
  top: 5px;
}
.a_pro_lien_2{
  width:64px;
  background-color:red;
  color:white;
  border-radius:5px/5px;
  text-align:center;
  float:right;
  padding:10px;
  font-size:16px;
  text-decoration:none;
  display:inline-block;
}
#bloc_img_solo{
  margin:auto;
  display:block;
  width: 950px;
  text-align: left;
}
#largeur_image{
  width:280px;
  height:280px;
  display:inline-block;
  margin:10px;
}
div.comments {
  margin:auto;
  width:50%;
  display:block;
  text-align:left;
  position:relative;
  top:35px;
}
.precisiona_solo_2{
  font-size:15px;
  text-align:center;
  width:500px;
  margin:110px;
  margin-top: 5px;
  display:block;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
.bloc_page{
  position: relative;
  top: -110px;
}
#contenant_produit_solo{
  width:330px;
  margin:0;
  margin-bottom: 10px;
}
.image_pro_solo{
  width:330px;
  height:330px;
  display:block;
}
.image_pro_solo2{
  width:330px;
  height:330px;
  display:block;
}
#espace_en{
  display:none;
}
.a_tar12{
  display:block;
}
#conteneur_produit_solo{
  width:330px;
  height:330px;
  display:block;
}
#espace_av2{
  display:block;
  height:5px;
}
#title_2{
  display:block;
  overflow-wrap: break-word;
  height:70px;
}
.espace_ap2{
  height:5px;
  display:block;
}
#description_produit_2{
  display:block;;
  height:100px;
}
#price_2{
  width:100px;
  font-size:15px;
}
#p_pro_lien_2{
  max-width:80%;
  text-align:left;
  vertical-align:baseline;
  display:block;
  position: relative;
  top: 60px;
}
#price_2{
  position: relative;
  top: 68px;
}
#price_barre{
  position: relative;
  top:55px
}
#p_pro_lien_2 .addPanier{
  font-size:15px;
  width:330px;
  display:block;
}
#col1.add.addPanier{
  width: 150px;
  font-size:15px;
}
a#cola1.a_pro_lien_2{
  font-size:15px;
  position: relative;
  top: 5px;
  left: 25px;
}
.a_pro_lien_2{
  width:60px;
  background-color:red;
  float:right;
  font-size:15px;
  display:inline-block;
}
#bloc_img_solo{
  margin:auto;
  display:block;
  width: 330px;
  text-align: left;
}
#largeur_image{
  width:330px;
  height:330px;
  display:block;
  margin:10px;
}
div.comments {
  margin:auto;
  width:330px;
  display:block;
  text-align:left;
  position:relative;
  top:35px;
}
.precisiona_solo_2{
  font-size:15px;
  text-align:center;
  width:330px;
  margin:0;
  margin-top: 5px;
  display:block;
}
#menu{
  position:relative;
  top: -200px;
}
@-moz-document url-prefix(){
    #price_2{
     position: relative;
     top: 55px;
    }
    #p_pro_lien_2{
      position: relative;
      top: 50px;
    }
    #price_barre{
      top:38px
    }
  }
}
}
</style>
  <title>Page de présentation du produit publicité basse du site vincent-dev-web</title>
  <meta name="description" content="Nous présentons ce produit(2) à la publicité sur vincent-dev-web"/>
</head>
<?php require 'header.php'; ?>
	<body>			
</br>
<div class="bloc_page">
<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$i=0;
?>
<!----><?php $req31=$bdd1->query('SELECT * FROM publicite2');
$donnees31=$req31->fetch();
$id=$donnees31['id_prod'];

				$produits = $DB->query('SELECT * FROM produits WHERE id=\''.$id.'\'');
				foreach ( $produits as $produit ): 
					$i++;
					
					if ($i<=30) {?>
	<?php if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	
		?>
<div id="contenant_produit_solo">
	<?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	<a href="#"><img class="image_pro_solo" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"/></a>
<?php }
 if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><a href="#" class="image_pro_solo"><iframe class="image_pro_solo" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
	<?php } 
	if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	<a href="#"><video class="image_pro_solo" src="publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video></a>
<?php }?>
	<div id="espace_en">&nbsp;</div>
	<div id="conteneur_produit_solo">
			<div id="espace_av2">&nbsp;</div>
			<h2 id="title_2"><?= $produit->titre; ?></h2>
			<div class="espace_ap2">&nbsp;</div>
			<div id="description_produit_2"><?php echo $produit->description; ?></div>
			<div class="espace_ap2">&nbsp;</div>
			<div><span id="price_2" href="#"><?php echo number_format($produit->prix,2,',',' ');  if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></span><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span id="price_barre"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			<p id="p_pro_lien_2"><a id="col1" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a id="cola1" class="a_pro_lien_2" href="tarifs.php">Retour</a></p>
	</div>		
</div>
<br><br>	
<?php 
			$req=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
			$req->execute(array($produit->id));
			$donnees=$req->fetch();
			
			if (isset($donnees['precisiona']) AND !empty($donnees['precisiona'])) {
						?>
						<div class="precisiona_solo_2"><?php echo $donnees['precisiona'];?></div>
			<?php } ?>

	<div id="bloc_img_solo">
		<?php if(isset($donnees['image3']) AND !empty($donnees['image3'])) {
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image1']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image1']).'"/>'.'</a>';
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image2']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image2']).'"/>'.'</a>';
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image3']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image3']).'"/>'.'</a>'.'<br><br>';
			} 
			elseif (isset($donnees['image2']) AND !empty($donnees['image2'])) {
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image1']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image1']).'"/>'.'</a>';
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image2']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image2']).'"/>'.'</a>'.'<br><br>';
			}
			elseif(isset($donnees['image1']) AND !empty($donnees['image1'])) {
				echo '<a href="publicimgs/'.htmlspecialchars($donnees['image1']).'">'.'<img id="largeur_image" src="publicimgs/'.htmlspecialchars($donnees['image1']).'"/>'.'</a>'.'br><br>';
			} else{echo '<br><br>';}?>
	</div>
	</br></br>
	</br></br>
	<?php }
endforeach ?>
</br></br>

</div>
</div>
<?php require 'footer.php'; ?>
<div id="footer">
  <?php $req30=$bdd1->query("SELECT * FROM colors");
  $col=$req30->fetch();
  //background bouton add
  $bacColAdd=$col['bacColAdd'];
  //police
  $colAdd=$col['colAdd'];
  //background bouton voir et retour
  $bacColVoir=$col['bacColVoir'];
  //police
  $colVoir=$col['colVoir'];
?>
<script>
    //recup du 1er
    var buttonAddCol1=document.getElementById('col1');
    var buttonVoirCola1=document.getElementById('cola1');
    buttonAddCol1.style.backgroundColor="<?php echo $bacColAdd; ?>";
    //couleur de police
    buttonAddCol1.style.color="<?php echo $colAdd;?>";
    //
    buttonVoirCola1.style.backgroundColor="<?php echo $bacColVoir; ?>";
    //couleur de police
    buttonVoirCola1.style.color="<?php echo $colVoir;?>";
    //le reste
    $(document).ready(function(){
/*if (window.matchMedia('(max-width: 1024px)').matches){
    /*$( "#contenant_produit_solo").css('display','block');
    $("#contenant_produit_solo").width(300);
    $( ".image_pro_solo").css('display','block');
    $(".image_pro_solo").width(300);
    $( "#conteneur_produit_solo").css('display','block');
    $("#conteneur_produit_solo").width(300);
    $( "#precisiona_solo_2").css('display','block');
    $("#precisiona_solo_2").width(300);
    var x=$("#contenant_produit_solo").offset();
    var newx=x.left;
    var newy=x.top;
    $("#contenant_produit_solo").offset({ top: newy, left: newx });
    $("#cola1.a_pro_lien_2").width(60);
    $("#col1.add.addPanier").width(120);
    $(".precisiona_solo_2").width(300);
    var x=$(".precisiona_solo_2").offset();
    var newx=x.left;
    var newy=x.top;
    $(".precisiona_solo_2").offset({ top: newy, left: newx });
    $("#description_produit_2").height(170);*/
    }*/
});
</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
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