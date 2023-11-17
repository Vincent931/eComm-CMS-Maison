<?php session_start();

require '../_header.php';
require '../texte1.php';
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
require '../boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
if(isset($_SERVER['HTTP_REFERER']) AND $_SERVER['HTTP_REFERER']!='recherche-result.php'){
	$_SESSION['REFERER']=$_SERVER['HTTP_REFERER'];
} else{ $_SESSION['REFERER']='tarifs.php';}
?>
<!DOCTYPE html>
<html id="bloc_page">
	<?php require 'head.php';?>
	<body>			
		<?php require 'menu-haut.php';?>
<p style="height:100px;display:block">&nbsp;</p>
<div>
<h1><?php echo $ste['nom'].' - '.$ste['sigle']; ?></h1>
	<h2 style="text-align:center;margin:auto">Produits recherchés :</h2>
	<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
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

	<section>
	<article>
		<div id="contenant">
<!----><?php  while($donnees=$req->fetch()){
	if(isset($donnees['promotion']) AND ($donnees['promotion'] == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	$i++?>
	<div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<a href="#"><img class="image_pro_tarif" src="../publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees['cle_image'];}else{echo $donnees['cle_image'];} ?>"></a>
			<div class="espace_ap">&nbsp;</div>
			<div class="title"><?= $donnees['titre']; ?></div>
			</br>
			<a class="price" href="#"><?php echo number_format($donnees['prix'],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a>
			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?= $donnees['id']; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="produit-solo.php?id_prod=<?php echo urlencode($donnees['id']);?>">VOIR</a></p>
</div>
<?php $pp=$i; } ?>
</div>
</article>
</section></br></br></br>

<?php } else {
	?>
<p style="text-align:center;margin:auto">Aucun Résultat pour : <? echo $q; ?>...</p>
<?php } ?>
</br><p>&nbsp;</p><a id="see_panier" href="panier.php"><img id="img_caddie_panier" src="../publicimgs/caddie.png"/> Voir Panier </a><p>&nbsp;</p>
<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="<?php echo $_SESSION['REFERER'];?>">Retourner aux Produits</a>
</br></br>	
</br></br></br></br>
</div>
</body>
<div id="footer">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
</div>
</html>					