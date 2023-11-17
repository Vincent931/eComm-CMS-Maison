<?php session_start();

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<script>var p=12;</script>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Ajouter 1 produit a tarif variable</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?><p>Ne dupliquez pas de produit, toujours au moins un caractère de différence pour le titre</p>

<?php $req3=$bdd->query('SELECT * FROM produits WHERE obs_url LIKE \'libreP\''); 
$donnees3=$req3->fetch();
$p=11;
?>
<form method="post" action="effacer-produit.list.php">
	<input type="hidden" name="id_effacer" id="id_effacer" value="<?php echo $donnees3['id'];?>"/>
	<input type="submit" value="Effacer"/>
</form>
<?php require 'bank-img-vid-mp3-4.php';?>
<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
			<form style="width:550px;margin:auto;text-align:right" id="ch_form" name="ch_form" method="POST" action="ajouter-produit-libre.list.php">
				<?php if(isset($donnees3['cle_image'])){ ?>
				<p><img src="../publicimgs/<?php echo $donnees3['cle_image'];?>" style="width:150px"/></p>
				<?php 
				} ?>
				<p><label for="ref_obj">Référence Objet (la vôtre) </label>
				<input type="text" name="ref_obj" id="ref_obj" value="<?php if(isset($donnees3['ref_obj'])){echo $donnees3['ref_obj'];}?>"/></p>

				<p><label style="color:red">Type d'image Produit Principal</label>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="button"id="imgsrc" value="image" checked/>
  				</p>
  				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="inp_vid_img" id="imgsrc1" value="imgsrc"/>
  				<p><input type="text" name="cle_image" id="cle_image" onmouseover="this.focus();" value="<?php if(isset($donnees3['cle_image'])){echo $donnees3['cle_image'];}?>"/></p>
  				<p><input id="cacher" type="button" name="cacher" value="CACHER"/></p>
				<!--<p><label for="cle_image">
  				<p><input id="voir" type="button" name="voir" value="image"/></p>
  				<p><input id="cacher" type="button" name="cacher" value="CACHER"/></p>
				-->

				<p><label for="afficher">Afficher </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="oui" value="oui" <?php if(isset($donnees3['afficher'])){if($donnees3['afficher']=="oui"){echo "checked";}}?>/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="afficher" id="non" value="non" <?php if(isset($donnees3['afficher'])){if($donnees3['afficher']=="non"){echo "checked";}}?>/></p>

				<p><label for="categories">Catégorie </label></p>
				<?php $req510=$bdd->query('SELECT * FROM categories');
				while($donnees510=$req510->fetch()){ ?>
				<p>
				<label for="categorie"><?php echo $donnees510['nom'];?></label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="categorie" id="<?php echo $donnees510['prefixe'];?>" value="<?php echo $donnees510['prefixe'];?>" <?php if(isset($donnees3['nom']) AND $donnees3['nom']==$donnees510['prefixe']){echo "checked";}?>/>
				</p>
				<?php
				}?>

				<p><label for="titre">Titre </label></p>
				<p><textarea style="border:1px solid black;vertical-align:top;margin-top:15px" name="titre" id="titre" rows="2" cols="75"><?php if(isset($donnees3['titre'])){echo $donnees3['titre'];}?></textarea></p>
					
				<p><label for="prix">Prix TTC(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="prix" id="prix" value="<?php if(isset($donnees3['prix'])){echo $donnees3['prix'];}?>"/></p>

				<p><label for="barre">Prix Barré(<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="barre" id="barre" value="<?php if(isset($donnees3['barre'])){echo $donnees3['barre'];}?>"/></p>

				<p><label for="TVA">Taux TVA (ex: 0.055 ou 0.206) </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="TVA" id="TVA" value="<?php if(isset($donnees3['TVA'])){echo $donnees3['TVA'];}?>"/></p>

				<p><label for="promotion">Promotion </label></p>
				<p><label for="oui">oui </label>&nbsp;<label for="non">non </label></p>
				<p><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="oui" value="oui" <?php if(isset($donnees3['promotion'])){if($donnees3['promotion']=="oui"){echo "checked";}}?>/>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="radio" name="promotion" id="non" value="non" <?php if(isset($donnees3['promotion'])){if($donnees3['promotion']=="non"){echo "checked";}}?>/></p>
				</p>
				
				<p><label for="description">Description </label></p>
				<p><textarea style="border:1px solid black;vertical-align:top;margin-top:15px" name="description" id="description" rows="10" cols="120"><?php if(isset($donnees3['description'])){echo $donnees3['description'];}?></textarea></p>
					
				<p><label for="quantite">Quantité </label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="number" name="quantite" id="quantite" value="<?php if(isset($donnees3['quantite'])){echo $donnees3['quantite'];}?>"/></p>

				<p><label for="livraison">Livraison (<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?>)</label>
				<input style="border:1px solid black;vertical-align:top;margin-top:15px" type="text" name="livraison" id="livraison" value="<?php if(isset($donnees3['livraison'])){echo $donnees3['livraison'];}?>"/></p>

				<p><label for="poids">Poids en grammes (+emballages)(Pour la livraison internationale)</label>
				<input style="border:1px solid black; vertical-align:top; margin-top:15px" type="text" name="poids" id="poids" value="<?php if(isset($donnees3['poids'])){echo $donnees3['poids'];}?>"/></p>

				<input type="hidden" name="id" id="id" value="<?php if(isset($donnees3['id'])){echo $donnees3['id'];}?>"/>

				<?php if(isset($donnees3['id']) AND !empty ($donnees3['id'])){$req4=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
					$req4->execute(array(htmlspecialchars($donnees3['id'])));
					$donnees4=$req4->fetch();}?>
				<p><label for="precisiona">Explications</label>
				<textarea  style="width: 450px" rows="14" cols="120" name="precisiona" id="precisiona"><?php if(isset($donnees4['precisiona'])){echo $donnees4['precisiona'];}?></textarea></p>

				<p><label for="image1">Nom de l'image 1 (avec .jpg ou .png)</label>
				<input type="text" name="image1" id="image1" value="<?php if(isset($donnees4['image1'])){echo $donnees4['image1'];}?>"/></p>

				<p><label for="image2">Nom de l'image 2 (avec .jpg ou .png)</label>
				<input type="text" name="image2" id="image2" value="<?php if(isset($donnees4['image2'])){echo $donnees4['image2'];}?>"/></p>
				
				<p><label for="image3">Nom de l'image 3 (avec .jpg ou .png)</label>
				<input type="text" name="image3" id="image3" value="<?php if(isset($donnees4['image3'])){echo $donnees4['image3'];}?>"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Valider"/></p>
				
			</form>
		</div>
		  <br><br><br><br><br>
	</body>
</html>	