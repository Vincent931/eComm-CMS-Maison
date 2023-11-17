<?php session_start();


require '_header.php';

require '../texte1.php';
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require '../boutique0.php';
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
	<body>			
		<?php require 'menu-haut.php';?>
<div class="bloc_page">
<p style="height:100px;display:block">&nbsp;</p>
<?php $req30=$bdd->query('SELECT * FROM download');
				$donnees30=$req30->fetch();
				if(isset($donnees30['exist']) AND !empty($donnees30['exist'])){
					if($donnees30['exist']=='oui'){
					echo '<h3 style="text-align:center;margin:auto">'.'<a style="border:1px solid blue;background-color:#DDC9F5;text-decoration:none;color:black" href="telechargements.php">'.'Accèder aux téléchargements'.'</a>'.'</h3>';}}
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$i=0;
?>
<h1><?php echo $ste['nom'].' - '.$ste['sigle']; ?></h1>
<h2 style="text-align:center;margin:auto">Tous les Produits</h2>
<div id="cont_cat_rech">
	<?php 
	$req150=$bdd->query('SELECT * FROM cat_ok');
	$donnees150=$req150->fetch();
	if($donnees150['oui_non']=='oui')
	{ 
		echo '<div id="categories">';
		$req151=$bdd->query('SELECT * FROM categories');

		while($donnees151=$req151->fetch())
		{
		echo '<p class="categories_p">'.'<img class="img_cat" src="../publicimgs/'.$donnees151['icone'].'"/>'.'&nbsp;&nbsp;'.'<a href="tarifs.php?cat='.$donnees151['prefixe'].'">'.$donnees151['nom'].'</a>'.'</p>';
		}
		echo '<p class="categories_p">'.'<img class="img_cat" src="../publicimgs/plus.png"/>'.'&nbsp;&nbsp;'.'<a href="tarifs.php?cat=">'.'Tous/Toutes'.'</a>'.'</div>';
	}
?>
	<form id="form_cat" action="recherche-result.php" method="POST">
			<input class="cat_inp" type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>
			<input class="cat_inp" type="submit" value="Valider"/>
	</form>
</div>
<br><br>
<section>
	<article>
<div id="contenant">
<!----><?php 
if($typeP =="")
{
	$produits = $DB->query('SELECT * FROM produits WHERE afficher=\'oui\'');
foreach ( $produits as $produit ): 
if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	$mot=substr($produit->nom,0,14);
	if ($mot!='telechargement'){
		$i++;
			if ($i>=$d AND $i<=$g) {?>
<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	<a href="#"><img class="image_pro_tarif" src="../publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
<?php }
 if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><iframe style="width: 298px; height: 298px" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	}
	if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	<a href="#"><video class="image_pro_tarif" src="../publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video></a>
<?php }?>
			<div class="espace_ap">&nbsp;</div>
			<div class="title"><?= $produit->titre; ?></div>
			</br>
			<div><a class="price" style="display:inline-block" href="#"><?php echo number_format($produit->prix,2,',',' '); if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span style="display:inline-block;position:relative;right:-60px"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="produit-solo.php?id_prod=<?php echo urlencode($produit->id);?>">VOIR</a></p>
			
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
			if ($i>=$d AND $i<=$g) {?>
<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<a href="#"><img class="image_pro_tarif" src="../publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees180['cle_image'];}else{echo $donnees180['cle_image'];} ?>"></a>
			<div class="espace_ap">&nbsp;</div>
			<div class="title"><?= $donnees180['titre']; ?></div>
			</br>
			<a class="price" href="#"><?php echo number_format($donnees180['prix'],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?php echo $donnees180['id']; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="produit-solo.php?id_prod=<?php echo urlencode($donnees180['id']);?>">VOIR</a></p>
			
</div>
<?php }
$pp=$i;
}

}
$g+=30;
$h=$g-60;

}?>
</div>		<!---->
</article>
</section>
</br></br>	
<div style="text-align:center;margin:auto">
	<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="tarifs.php"> Page 1</a>
	<?php if ($d>=30){echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="'.$urlA.'&page='.urlencode($h).'">'.' <<< '.'</a>';}
	 echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="'.$urlA.'&page='.urlencode($g).'">'.' >>>'.'</a>';
	$_SESSION['telechar']="";?>
</div></br></br></br></br>
<p>&nbsp;</p>
<a id="see_panier" href="panier.php"><img id="img_caddie_panier" src="../publicimgs/caddie.png"/> Voir Panier </a>
<p>&nbsp;</p>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<form action="recherche-result.php" method="POST">
		<input type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>
		<input type="submit" value="Valider"/>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
</form></br></br></br></br><br><br><br><br><br><br><br>
</br></br>
</div>
</body>
<div id="footer">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
</div>
	</footer>
</html>