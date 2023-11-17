<form style="width:550px;margin:auto;text-align:right" name="id_modifierF<?php echo $i;?>" id="id_modifierF<?php echo $i;?>" method="POST" action="modification-telechargement.list.php">
<div style="display:inline-block;width:460px;text-align:center"><?php if(isset($img_type) AND $img_type=="image"){ ?>		
	<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php if($ifpromo=='oui'){echo 'promo-'.htmlspecialchars($donnees['cle_image']);}else{echo htmlspecialchars($donnees['cle_image']);} ?>"/>
<?php }
 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	}  
	if(isset($img_type) AND $img_type=="video"){ ?>
	<video src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?></div>
			<div style="display:inline-block;width:460px;text-align:right"><input type="hidden" name="id_modifier<?php echo $i;?>" id="id_modifier<?php echo $i;?>" value="<?php echo $donnees['id'];?>"/>
			<p style="text-align:right"><input style="text-align:right" type="submit" value="Modifier"/></p>
			<p style="color:blue"><?php echo 'ID : '.htmlspecialchars($donnees['id']); ?></p>
			<?php if(isset($mot)){if($mot=='telechargement'){echo '<p style="color:blue">'.'Nom Téléchargement : '.$charge.'</p>'; }}?>
			<p><?php echo 'Reference Objet : '.htmlspecialchars($donnees['ref_obj']); ?></p>
			<p><?php echo 'Observations (ex:url) : '.htmlspecialchars($donnees['obs_url']); ?></p>
			<p><?php echo 'Afficher dans la boutique : '.htmlspecialchars($donnees['afficher']); ?></p>
			<p><?php echo 'Catégorie : '.$donnees['nom'];?></p>
			<p><?php echo 'TYPE d\'image : '.$donnees['img_type'];?></p>
			<p><?php echo 'Nom-image produit : '.htmlspecialchars($donnees['cle_image']); ?></p>
			<p><?php echo htmlspecialchars($donnees['titre']); ?></p>
			<p><?php echo htmlspecialchars($donnees['description']); ?></p>
			<p><?php echo 'Prix TTC (';if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo '€';} else{echo '$';} echo ') : '.htmlspecialchars($donnees['prix']); ?></p>
			<p><?php echo 'Prix Barré (';if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo '€';} else{echo '$';} echo ') : '.htmlspecialchars($donnees['barre']); ?></p>
			<p><?php echo 'Taux TVA (ex: 0.055 ou 0.206) : '.htmlspecialchars($donnees['TVA']); ?>
			<p><?php echo 'Promotion : '.htmlspecialchars($donnees['promotion']); ?></p>
			<p><?php echo 'Quantité : '.htmlspecialchars($donnees['quantite']); ?></p>
			<p><?php echo 'Livraison (';if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo '€';} else{echo '$';} echo ') : '.htmlspecialchars($donnees['livraison']); ?></p>
			<p><?php echo 'Poids en grammes (+emballages) : '.htmlspecialchars($donnees['poids']);?></p>
			<p><?php echo 'Ajouté le : '.htmlspecialchars($donnees['date_creation']); ?></p>
			<p><?php echo 'Explications : '.htmlspecialchars($donnees2['precisiona']); ?></p>
			<p><?php echo 'Nom de l\'image 1 : '.htmlspecialchars($donnees2['image1']); ?></p>
			<p><?php echo 'Nom de l\'image 2 : '.htmlspecialchars($donnees2['image2']); ?></p>
			<p><?php echo 'Nom de l\'image 3 : '.htmlspecialchars($donnees2['image3']); ?></p></div>
</form>