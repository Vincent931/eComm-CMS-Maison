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
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$_SESSION['prod_solo']="";
if(isset($_GET['page']) AND !empty($_GET['page'])){
	$g=intval(urldecode($_GET['page']));
$d=$g-29;
} else{
		$d=1;
		$g=30;
}
if(isset($_GET['cat']) AND !empty($_GET['cat'])){
	$typeP=htmlspecialchars($_GET['cat']);
} else{
	$typeP="";
}
$urlA='tarifs.php?cat='.urlencode($typeP);
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
  height:105px;
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
#bas_page{
  text-align:center;
  margin:auto;
  width:1800px;
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
  }
  #categories{
    display: flex;
    flex-direction: column;
    width: 300px;
    box-sizing: content-box;
    height: 230px;
    margin: auto;
    margin-left: 10px;
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
  }
  .bloc_page{
    display: flex;
    flex-direction: column;
    width: 330px;
    box-sizing: content-box;
    position: relative;
    top: -105px;
  }
  #contenant{
    box-sizing: content-box;
    width:300px;
    box-sizing: content-box;
    display:flex;
    flex-direction: column;
    flex-wrap: wrap;
    margin-left:20px;
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
  #menu{
    position:relative;
    top: -210px;
  }
  #bas_page{
  text-align:center;
  margin:0;
  width:330px;
  position: relative;
  top: -15px;
  }
    @-moz-document url-prefix(){
      .h3_telech{
        top: 15px;
      }
      #categories{
        position: relative;
        top: 35px;
      }
      #cont_cat_rech{
        position: relative;
        top: -20px;
      }
      #menu{
      position: relative;
      top: -130px;
      }
    }
}
</style>
  <title>Page des Téléchargements à vendre sur vincent-dev-web</title>
  <meta name="description" content="Cette Page des téléchargements est inactive mais elle représente ce que vous pouvez vendre avec le Gabarit vincent-dev-web"/>
</head>
	<body>			
<?php require 'header.php'; ?>
<div class="bloc_page">
<?php 
$i=0;
?>
<div id="cont_cat_rech"><br><br><br><br>
<?php $req30=$bdd->query('SELECT * FROM download');
$donnees30=$req30->fetch();
	if(isset($donnees30['exist']) AND !empty($donnees30['exist'])){
		if($donnees30['exist']=='oui'){
					echo '<h3 class="h3_telech">'.'<a class="a_telech" href="tarifs.php">'.'Revenir aux Produits'.'</a>'.'</h3>';
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
?>
	<form id="form_cat" action="resultat-recherche" method="POST">
			<p><input class="cat_inp" type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/><input class="cat_inp" type="submit" value="Valider"/></p>
	</form>
<br><br>
<div id="contenant">
<?php 
if($typeP =="")
{
	$produits = $DB->query('SELECT * FROM produits WHERE afficher=\'oui\'');
foreach ( $produits as $produit ): 
if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	$mot=substr($produit->nom,0,14);
	if ($mot=='telechargement'){
		$i++;
					if ($i>=$d AND $i<=$g) {?>

<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	<a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
<?php }
 if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><iframe style="width: 298px; height: 298px" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	}
	if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	<a href="#"><video class="image_pro_tarif" src="publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video></a>
<?php }?>
			<div class="espace_ap">&nbsp;</div>
			<h2 class="title"><?= $produit->titre; ?></h2>
			</br>
			<div><a class="price" style="display:inline-block" href="#"><?php echo number_format($produit->prix,2,',',' '); if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span style="display:inline-block;position:relative;right:-60px"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="achat-<?php echo urlencode($produit->id);?>">VOIR</a></p>
</div>
	<?php }
	$pp=$i;
	}
endforeach;
$g+=30;
$h=$g-60;
} else { $oui="oui";
	$req180 = $bdd->prepare('SELECT * FROM produits WHERE nom=:nom AND afficher=:afficher');
	$req180->execute(array('nom'=>htmlspecialchars($typeP), 'afficher'=>$oui));
	while($donnees180=$req180->fetch()){ 
if(isset($donnees180['promotion']) AND ($donnees180['promotion'] == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	$mot=substr($donnees180['nom'],0,14);
	if ($mot!='telechargement'){
		$i++;
		$img_type=$donnees180['img_type'];
			if ($i>=$d AND $i<=$g) {?>
<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
<?php if(isset($img_type) AND $img_type=="image"){ ?>		
	<a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees180['cle_image'];}else{echo $donnees180['cle_image'];} ?>"></a>

<?php }
 if(isset($img_type) AND $img_type=="youtube"){ ?><a href="#" class="image_pro_tarif2"><iframe style="width: 298px; height: 298px" <?php echo $donnees180['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
 	<?php
	} 
	if(isset($img_type) AND $img_type=="video"){ ?>
	<video class="image_pro_tarif" src="publicimgs/<?php echo $donnees180['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees180['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?>
			<div class="espace_ap">&nbsp;</div>
			<h2 class="title"><?= $donnees180['titre']; ?></h2>
			</br>
			<a class="price" href="#"><?php echo number_format($donnees180['prix'],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?php echo $donnees180['id']; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="achat-<?php echo urlencode($donnees180['id']);?>">VOIR</a></p>
</div>
<?php }
$pp=$i;
}

}
$g+=30;
$h=$g-60;

}?>
</div>		<!---->
</br></br>	
<div id="bas_page">
	<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="telechargements.php"> Page 1</a>
	<?php if ($d>=30){echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="telechargements.php?page='.urlencode($h).'">'.' Page précédente '.'</a>';}
	 echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="telechargements.php?page='.urlencode($g).'">'.' Page suivante'.'</a>';
	$_SESSION['telechar']='telechargements.php';?>
<p>&nbsp;</p>
<form action="resultat-recherche" method="POST">
		<input type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>
		<input type="submit" value="Valider"/>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
</form>
</div></br></br></br>
</div>
<div>
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