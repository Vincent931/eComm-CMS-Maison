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
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$_SESSION['prod_solo']="";
if(isset($_GET['page']) AND !empty($_GET['page'])){
	$g=intval(urldecode($_GET['page']));
$d=$g-29;
} else{
		$d=1;
		$g=30;
	}
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>			
		<?php require 'menu-haut.php';?>
</br></br></br></br>

<div class="bloc_page">
<h1><?php echo $ste['nom'].' - '.$ste['sigle']; ?></h1>
	<h2 style="text-align:center;margin:auto">Ce que nous proposons:</h2>
				<br><br>
				<?php $req30=$bdd->query('SELECT * FROM download');
				$donnees30=$req30->fetch();
				if(isset($donnees30['exist']) AND !empty($donnees30['exist'])){
					if($donnees30['exist']=='oui'){
					echo '<h3 style="text-align:center;margin:auto">'.'<a style="border:1px solid blue;background-color:#DDC9F5;text-decoration:none;color:black" href="telechargements.php">'.'Accèder aux téléchargements'.'</a>'.'</h3>';}}
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$i=0;
?><br>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<form action="recherche-result.php" method="POST">
		<input type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>
		<input type="submit" value="Valider"/>
</form>
<br>
<section>
	<article>
<div id="contenant">
<!----><?php $produits = $DB->query('SELECT * FROM produits WHERE afficher=\'oui\'');
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
			<a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
			<div class="espace_ap">&nbsp;</div>
			<div class="title"><?= $produit->titre; ?></div>
			</br>
			<a class="price" href="#"><?php echo number_format($produit->prix,2,',',' '); ?> €</a>
			<p class="p_pro_lien"><a class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a class="a_pro_lien" href="produit-solo.php?id_prod=<?php echo urlencode($produit->id);?>">VOIR</a></p>
</div>
	<?php }
	}

endforeach;
$g+=30;
$h=$g-60;
?>
</div>		<!---->
</article>
</section>
</br></br>	
<div style="text-align:center;margin:auto">
	<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="tarifs.php"> Page 1</a>
	<?php if ($d>=30){echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="tarifs.php?page='.urlencode($h).'">'.' Page précédente '.'</a>';}
	 echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="tarifs.php?page='.urlencode($g).'">'.' Page suivante'.'</a>';
	$_SESSION['telechar']="";?>
</div></br></br></br></br>
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
	<script type="text/javascript" src="js/app.js"></script>
</div>
		<?php require 'footer.php';
		require 'footer-resp.php';
?>	</footer>
</html>