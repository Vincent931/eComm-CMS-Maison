<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';
require 'texte1.php';
$req20=$bdd1->query('SELECT * FROM nav_haut');
$nav_haut=$req20->fetch();
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req22=$bdd1->query('SELECT * FROM nav_bas');
$nav_bas=$req22->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
if(isset($_SERVER['HTTP_REFERER']) AND $_SERVER['HTTP_REFERER']!='recherche-result.php'){
	$_SESSION['REFERER']=$_SERVER['HTTP_REFERER'];
} else{ $_SESSION['REFERER']='tarifs.php';}
?>

<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php';?>
  <style>
        /**********Tarifs************/
.bloc_page{
  display: flex;
  flex-direction:column;
  width: 100%;
}
#cont_cat_rech{
  display: flex;
  flex-direction:column;
  width: 550px;
}
.h3_telech{
  width: 250px;
  display: flex;
  flex-direction: column;
  position: relative;
  left: 400px;
  text-align:center;
  margin:auto;
  background-color:white;
  text-decoration:none;
  color: #5B6975;
  border: 0px solid #5B6975;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.a_telech{
  width: 250px;
  display: flex;
  flex-direction: column;
  background-color:white;
  text-decoration:none;
  color: #5B6975;
}
#categories{
  display: flex;
  flex-direction: column;
  width: 300px;
  height: 230px;
  margin: auto;
  margin-left: 100px;
}
.categories_p{
  display: flex;
  flex-direction: column;
  width: 400px;
  margin: auto;
  text-align: left;
  color: #5B6975;
}
.categories_p a{
  display: flex;
  flex-direction: row;
  color: #5B6975;
}
.img_cat{
  width: 45px;
  position: relative;
  top:-5px ;
}
#form_cat{
  width:500px;
  display: flex;
  flex-direction: row;
  position: relative;
  top: -120px;
  margin: auto;
  margin-left: 550px;
}
#img_caddie_panier{
  width:22px;
}
#contenant{
  width:1800px;
  display: flex;
  flex-direction:row;
  justify-content: start;
  flex-wrap: wrap;
  margin:auto;
}
.conteneur_produit{
  width:300px;
  height:510px;
  text-align:left;
  margin:30px;
  display: flex;
  flex-direction: column;
  background-color:white;
}
.image_pro_tarif{
  width:298px;
  height:298px;
  display:block;
}
.image_pro_tarif2{
  min-width:298px;
  max-width: 298px;
  min-height:298px;
  max-height:298px;
  display:block;
}
#iframe{
display:block;
padding-top: 50px;
}
.title{
  max-width:100%;
  height:65px;
  display:block;
  overflow-wrap: break-word;
  text-align:left;
}
.price{
  text-align:left;
  text-decoration:none;
  width:150px;
  display:block;
  font-weight:bold;
  color:#11DE48;
  font-size:25px;
}
.p_pro_lien{
  max-width:100%;
  text-align:left;
  vertical-align:baseline;
}
.addPanier{
  width:160px;border-radius:5px/5px;color:white;padding:15px;float:left;background-color:black;text-decoration:none;
}
.a_pro_lien{
  width:50px;
  border-radius:5px/5px;
  text-align:center;
  float:right;
  padding:15px;
  background-color:black;/*#8BC0F4;*/
  color:white;
  text-decoration:none;
}
.a_pro_lien_2{
  text-decoration:none;
}
#col{
  background-color:black;
  color:white;
}
#cola{
  background-color:black;
  color:white;
}
#ret_list{
  position: relative;
  left: 400px;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
 /* tarifs */
  #cont_cat_rech{
    display: flex;
    flex-direction: column;
    width: 300px;
    box-sizing: content-box;
  }
  .h3_telech{
    display:flex;
    flex-direction: column;
    width: 250px;
    box-sizing: content-box;
    position: relative;
    left: 10px;
    font-weight: normal;
    position: relative;
    top: -170px;
  }
  #categories{
    display: flex;
    flex-direction: column;
    width: 300px;
    box-sizing: content-box;
    height: 230px;
    margin: auto;
    margin-left: 10px;
    position: relative;
    top: -170px;
  }
  .categories_p{
    display: flex;
    flex-direction: column;
    box-sizing: content-box;
    width: 300px;
  }
  #form_cat{
    display: flex;
    flex-direction: column;
    width:300px;
    position: relative;
    box-sizing: content-box;
    top: 50px;
    margin-left: 10px;
    position: relative;
    top: -200px;
  }
  .bloc_page{
    display: flex;
    flex-direction: column;
    width: 330px;
    box-sizing: content-box;
  }
  #contenant{
    box-sizing: content-box;
    width:300px;
    box-sizing: content-box;
    display:flex;
    flex-direction: column;
    flex-wrap: wrap;
    margin-left:20px;
    position: relative;
    top: -190px;
  }
  .image_pro_tarif{
    width:300px;
    display:flex;
    box-sizing: content-box;
    flex-direction: column;
    height:auto;
    margin:auto;
    text-align:center;
  }
  .conteneur_produit{
    width:300px;
    box-sizing: content-box;
    display:flex;
    flex-direction: column;
    margin-left:0;
  }
  .a_pro_lien{
    margin-right:20px;
    display:flex;
    flex-direction: column;
    box-sizing: content-box;
  }
  #ret_list{
    position:relative;
    top: -245px;
    left: 15px;
  }
  #menu{
    position:relative;
    top: -360px;
    }
@-moz-document url-prefix(){

  .h3_telech{
      top: -175px;
    }
    #categories{
    position: relative;
    top: -150px;
  }
  #ret_list{
    position: relative;
    top: -215px;
    left: 20px;
  }
  #menu{
    position:relative;
    top: -300px;
    }
  }
}
</style>
  <title>Résultat de recherche de produits vincent-dev-web</title>
  <meta name="description" content="Vous obtenez les résultats après interrogation de l'algorithme vincent-dev-web"/>
</head>
	<body>			
<?php require 'header.php'; ?>
</br><div class="vis1"></br><br></br></br></div>
<div>
	<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
	<form id="form_cat" action="resultat-recherche" method="POST">
			<p><input class="cat_inp" type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>&nbsp;&nbsp;&nbsp;&nbsp;<input class="cat_inp" type="submit" value="Valider"/></p>
	</form>
<?php
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

if(isset($_POST['searching']) AND !empty($_POST['searching'])){
	$q = htmlspecialchars($_POST['searching']);
	$req=$bdd->query('SELECT * FROM produits WHERE titre LIKE "%'.$q.'%" ORDER BY id');
	if($req->rowCount() ==0) {
	$req = $bdd->query('SELECT * FROM produits WHERE CONCAT(titre, description) LIKE "%'.$q.'%" ORDER BY id');
	}
}
$i=0;
if($req->rowCount() > 0) { ?>
<div id="cont_cat_rech">
<?php $req30=$bdd->query('SELECT * FROM download');
$donnees30=$req30->fetch();
	if(isset($donnees30['exist']) AND !empty($donnees30['exist'])){
		if($donnees30['exist']=='oui'){
					echo '<h3 class="h3_telech">'.'<a class="a_telech" href="telechargements.php">'.'Accèder aux Téléchargements'.'</a>'.'</h3>';
	  }
  }
if(isset($_SESSION['message'])){echo '<h3 class="h3_telech" style="color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$req150=$bdd->query('SELECT * FROM cat_ok');
	$donnees150=$req150->fetch();
	if($donnees150['oui_non']=='oui')
	{ 
		echo '<div id="categories"><br><br><br><br>';
		$req151=$bdd->query('SELECT * FROM categories');

		while($donnees151=$req151->fetch())
		{
		echo '<p class="categories_p">'.'<a href="tarifs.php?cat='.$donnees151['prefixe'].'">'.'<img class="img_cat" src="publicimgs/'.$donnees151['icone'].'"/>'.'&nbsp;&nbsp;'.$donnees151['nom'].'</a>'.'</p>';
		}
		echo '<p class="categories_p">'.'<a href="tarifs.php?cat=">'.'<img class="img_cat" src="publicimgs/plus.png"/>'.'&nbsp;&nbsp;'.'Tous/Toutes'.'</a>'.'</div>';
	}
?>	<br>
<h2 style="text-align:center;margin:auto">Produits recherchés :</h2>
		<div id="contenant">
<!----><?php  while($donnees=$req->fetch()){
	if(isset($donnees['promotion']) AND ($donnees['promotion'] == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	$i++?>
	<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<a href="#">
	<?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){ ?>		
<img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees['cle_image'];}else{echo $donnees['cle_image'];} ?>"/>
<?php }
 if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){ ?><iframe class="image_pro_tarif" <?php echo $donnees['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php } 
	if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){ ?>
	<video class="image_pro_tarif" src="publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?></a>
			<div class="espace_ap">&nbsp;</div>
			<div class="title"><?= $donnees['titre']; ?></div>
			</br>
			<div><a class="price" href="#"><?php echo number_format($donnees['prix'],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span style="display:inline-block;position:relative;right:-60px"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?= $donnees['id']; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="achat-<?php echo urlencode($donnees['id']);?>">VOIR</a></p>
</div>
<?php $pp=$i; } ?>
</div>
</br></br></br>

<?php } else {
	?>
<p style="text-align:center;margin:auto">Aucun Résultat pour : <? echo $q; ?>...</p>
<?php } ?>
</br>
<a id="ret_list" style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="<?php echo $_SESSION['REFERER'];?>">Retourner à la liste</a>
</br></br>	
</br></br></br></br>
</div>
<?php $non_aff_compt=true; require 'footer.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>

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