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
$req24=$bdd1->query('SELECT nom FROM societe');
$sigle=$req24->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$id=htmlspecialchars(urldecode($_GET['id_prod']));

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>			
</br>
	
<div class="bloc_page">
<h1 id="h1_titre_solo" style="text-align:center"><?php echo $sigle['nom'];?></h1>

<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

	$i=0;
?>
<section>
	<article>

<!----><?php $produits = $DB->query('SELECT * FROM produits WHERE id=\''.$id.'\'');
				foreach ( $produits as $produit ): 
					$i++;
					
					if ($i<=30) {?>
	<?php if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
	$ifpromo="oui";
	} else {$ifpromo="non";} 
	
		?>
<div id="contenant_produit_solo">
	<a href="#"><img class="image_pro_solo" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
	<div id="espace_en">&nbsp;</div>
	<div id="conteneur_produit_solo">
			<div id="espace_av2">&nbsp;</div>
			<div id="title_2"><?= $produit->titre; ?></div>
			<div class="espace_ap2">&nbsp;</div>
			<div id="description_produit_2"><?php echo $produit->description; ?>
			<div class="espace_ap2">&nbsp;</div>
			<a id="price_2" href="#"><?php echo number_format($produit->prix,2,',',' '); ?> €</a>
			<p id="p_pro_lien_2"><a id="col_add" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a id="col_voir" class="a_pro_lien_2" href="tarifs.php">Retour</a></p>
	</div>		
</div>
<br><br>	
<?php 
			$req=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
			$req->execute(array($produit->id));
			$donnees=$req->fetch();
			
			if (isset($donnees['precisiona']) AND !empty($donnees['precisiona'])) {
						echo '<div class="comments">'.'<p class="comments_p">'.'<img class="comments_img" style="width:22px" src="publicimgs/comments.png"/>'.'Précisions'.'</p>'.'</div>'.'</br>';
						echo '<p class="precisiona_solo_2">'.htmlspecialchars($donnees['precisiona']).'</p>';} ?>

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
</div>
</article>
</section>
</br></br></br></br>

</form>

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
  //background bouton voir et retour
  $bacColVoir=$col['bacColVoir'];
  //police
  $colVoir=$col['colVoir'];
?>
<script>
    //1erbutton
    var buttonAddCol=document.getElementsByClassName('addPanier')
    buttonAddCol.style.backgroundColor="<?php echo $bacColAdd; ?>";
    //coleur de police
    buttonAddCol.style.color="<?php echo $colAdd;?>";
    //2eme bouton
    var buttonVoirCol=document.getElementsByClassName('a_pro_lien_2')
    buttonVoirCol.style.backgroundColor="<?php echo $bacColVoir; ?>";
    //couleur de police
    buttonVoirCol.style.color="<?php echo $colVoir;?>";
</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</div>
	</footer>
</html>