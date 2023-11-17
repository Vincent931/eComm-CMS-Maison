<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';
$_SESSION['cle']="";
require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req22=$bdd1->query('SELECT * FROM nav_bas');
$nav_bas=$req22->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req24=$bdd1->query('SELECT nom FROM societe');
$sigle=$req24->fetch();
require 'boutique0.php';

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$_SESSION['prod_solo']="oui";
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<title>Page de produit unique de vincent-dev-web</title>
	<meta name="description" content="Vous pouvez configurer un produit unique dans cette page"/>
</head>
	<body>			
</br>
	
<div class="bloc_page">
<h1><?php echo $sigle['nom'];?></h1>

<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$i=0;
?>
<!----><?php $produits = $DB->query('SELECT * FROM produits WHERE nom=\'prod_solo\'');
				foreach ( $produits as $produit ): 
					$i++;
					
					if ($i<=30) {?>
	<?php if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
?>
<div id="contenant_produit_solo">
	<?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	<a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
<?php }
 if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><iframe style="width: 298px; height: 298px" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	}
	if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	<a href="#"><video class="image_pro_tarif" src="publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video></a>
<?php }?>
	<div id="espace_en">&nbsp;</div>
	<div id="conteneur_produit_solo">
			<div id="espace_av2">&nbsp;</div>
			<div id="title_2"><?= $produit->titre; ?></div>
			<div class="espace_ap2">&nbsp;</div>
			<div id="description_produit_2"><?php echo $produit->description; ?>
			<div class="espace_ap2">&nbsp;</div>
			<div><a id="price_2" href="#"><?php echo number_format($produit->prix,2,',',' ');  if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span style="display:inline-block;position:relative;right:-60px"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			<p id="p_pro_lien_2"><a id="col1" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a></p>
	</div>		
</div>
<br><br>	
<?php 
			$req=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
			$req->execute(array($produit->id));
			$donnees=$req->fetch();
			
			if (isset($donnees['precisiona']) AND !empty($donnees['precisiona'])) { ?>
						<p class="comments_p"><img class="comments_img" style="width:22px" src="publicimgs/comments.png"/> Précisions</p></br>
						<div class="precisiona_solo_2"><?php echo $donnees['precisiona'];?></div><?php } ?>

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
		<!---->
</br></br></br></br>

</form>
</br></br></br></br><br><br><br><br><br><br><br>
</br></br>
</div>
</body>
<div id="footer">
	<?php $req30=$bdd1->query("SELECT * FROM colors");
  $col=$req30->fetch();
  //background bouton add
  $bacColAdd=$col['bacColAdd'];
  //police
  $colAdd=$col['colAdd'];
?>
<script>
    //recup du 1er
    var buttonAddCol1=document.getElementById('col1');
    //
    buttonAddCol1.style.backgroundColor="<?php echo $bacColAdd; ?>";
    //couleur de police
    buttonAddCol1.style.color="<?php echo $colAdd;?>";
    //
</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</div>
</html>