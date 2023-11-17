<?php session_start(); 
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Modification sujet</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
			</div></br>
			<p><?php if(isset($_SESSION['message'])){echo '<h3 style="text:align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?></p></br>
<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
<?php $i=0;
$req=$bdd2->query('SELECT id, image, img_type, titre1, contenu1, couleurT, couleurS, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics ORDER bY id');
while($donnees = $req->fetch()){
	$i++;
	$img_type=$donnees['img_type'];
?>
<table>
	<tr>
		<td><form method="post" action="modification-sujet.list.php"><input type="hidden" name="id<?php echo $i;?>" id="id<?php echo $i;?>" value="<?php echo $donnees['id'];?>"/><input type="submit" value="Modifier"/></form></td>
	</tr>
	<tr><td style="display:inline-block;width:460px;text-align:center">
<?php if(isset($img_type) AND $img_type=="image"){ ?>		
	<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php echo htmlspecialchars($donnees['image']); ?>"/>
<?php }
 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} 
	if(isset($img_type) AND $img_type=="video"){ ?>
	<video src="../publicimgs/<?php echo $donnees['image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?>
</td>
</tr>
	<tr>
		<td style="width:70%; margin:auto"><?php echo $donnees['date_creation_fr']; ?></td>
	</tr>
	</br>
	<tr>
		<td><?php echo $donnees['titre1']; ?></td>
	</tr>
	<tr>
		<td><?php echo $donnees['contenu1']; ?></td>	
	</tr>
	
	<tr>
		<td>Numéro du sujet : <span style="color:blue"><?php echo htmlspecialchars($donnees['id']); ?></span></td>	
	</tr>
	<tr>
		<td>Couleur Background Titre (& Commentaires): <?php echo htmlspecialchars($donnees['couleurT']); ?></td><td style="width:30px;height:30px;background-color:<?php echo $donnees['couleurT'];?>"></td>	
	</tr>
	<tr>
		<td>Couleur Background Sujet : <?php echo htmlspecialchars($donnees['couleurS']); ?></td><td style="width:30px;height:30px;background-color:<?php echo $donnees['couleurS'];?>"></td>
	</tr>
</table>
	</br>
	<p style="background-color:black; width:70%; height:1px; margin:auto"></p>
<?php
}
$req->closeCursor();
?></br></br>
		</div>
      <br><br><br><br><br>
	</body>
</html>