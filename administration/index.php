<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
$_SESSION['count']=0;
$_SESSION['count1']=0;
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Vous avez la liste des requis d'établissement votre site <a style="color:blue;text-decoration:underline" target="_blank" href="requis.php">ici</a></p>
			<br>
			<h4>Produit</h4>
<?php $i=0;
$req = $bdd->query('SELECT id, afficher, img_type, cle_image, titre, description, prix, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id ');
while ($donnees = $req->fetch())
{ $req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
			$req2->execute(array(htmlspecialchars($donnees['id'])));
			$donnees2=$req2->fetch();
			$i++;
			$img_type=$donnees['img_type'];
			$ifpromo=$donnees['promotion'];
			if($i<=1){?>
	<table id="largeur_table">
		<tr>
			<td><?php if(isset($img_type) AND $img_type=="image"){ ?>		
				<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php if($ifpromo=='oui'){echo 'promo-'.htmlspecialchars($donnees['cle_image']);}else{echo htmlspecialchars($donnees['cle_image']);} ?>"/>
				<?php }
			 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			 	<?php
				}
				if(isset($img_type) AND $img_type=="video"){ ?>
				<video src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
				<?php }?>
			</td>
			<td><p><?php echo 'Nom de la clé img : '.htmlspecialchars($donnees['cle_image']); ?></p>
			<p><?php echo 'Afficher dans la boutique : '.htmlspecialchars($donnees['afficher']); ?></p>
			<p><?php echo htmlspecialchars($donnees['titre']); ?></p>
			<p><?php echo htmlspecialchars($donnees['description']); ?></p>
			<p><?php echo 'Prix(';if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';}echo ') : '.htmlspecialchars($donnees['prix']); ?></p>
			<p><?php echo 'Promotion : '.htmlspecialchars($donnees['promotion']); ?></p>
			<p><?php echo 'Quantité : '.htmlspecialchars($donnees['quantite']); ?></p>
			<p><?php echo 'Livraison (';if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';}echo ') : '.htmlspecialchars($donnees['livraison']); ?></p>
			<p><?php echo 'Ajouté le : '.htmlspecialchars($donnees['date_creation']); ?></p></td>	
		</tr>
	</table>
	<?php if (isset($donnees2['precisiona']) AND !empty($donnees2['precisiona'])) {
						echo '<p class="precisiona">'.htmlspecialchars($donnees2['precisiona']).'</p>';} ?>
	<table>
		<tr><?php if(isset($donnees2['image1']) AND !empty($donnees2['image1'])) {
					echo '<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image1']).'"/>'.'</td>';}
			if(isset($donnees2['image2']) AND !empty($donnees2['image2'])) {
						echo '<td class="espace_image1">'.' '.'</td>'.'<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image2']).'"/>'.'</td>'.
			'<td class="espace_image2">'.' '.'</td>';}
			if(isset($donnees2['image3']) AND !empty($donnees2['image3'])) {
						echo '<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image3']).'"/>'.'</td>';} ?>
		</tr>
	</table>
	<p style="color:blue">Accessible dans Administration > Produit</p>
<?php
} 
}
$req->closeCursor();
?><br><br>
<h4>Blog</h4>
<?php $t=0;
$req3 = $bdd2->query('SELECT id, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics ORDER BY id');
while ($donnees = $req3->fetch())
{
	$t++;
	if ($t<=1){
?>

	<table style="width:65%;margin:auto">
				<tr>
					<td>Edité le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['titre1']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['contenu1']); ?></td>	
				</tr>
			</br>
</table>
<p style="color:blue">Accessible dans Administration > Sujet/Commentaires</p>
<?php
}
}
?>		
		</div>
      <br><br><br><br><br>
	</body>
</html>