<table id="largeur_table">
<div style="display:inline-block;width:460px;text-align:center">
<?php if(isset($img_type) AND $img_type=="image"){ ?>		
	<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php if($ifpromo=='oui'){echo 'promo-'.htmlspecialchars($donnees['cle_image']);}else{echo htmlspecialchars($donnees['cle_image']);} ?>"/>
<?php }
 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	}
	if(isset($img_type) AND $img_type=="video"){ ?>
	<video src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?>
</div>
		<tr>
			<td><h3 style="color:blue;text-align:center;margin:auto"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
			<h4 style="text-align:center;margin:auto"><?php echo htmlspecialchars($donnees['description']); ?></h4>
			<p style="color:blue;text-align:center;margin:auto"><?php echo htmlspecialchars($donnees['prix']);if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
			</td>
		</tr>
</table>