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
			<h2 style="text-align:center">Changer l'ordre d'affichage sujet</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			<p>Pour changer l'ordre des sujets, ne pas mettre plus d'une fois l'id.</p>
			<p style="background-color:blue;width:70%;margin:auto;height:1px"></p>		
<?php 
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center:color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
$i=0;
$req = $bdd2->query('SELECT id, image, img_type, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM topics ORDER BY id ');
while ($donnees = $req->fetch())
{ 
$i++; $img_type=$donnees['img_type'];
	?><table id="largeur_table">
		<tr>
			<td>
				<p style="display:inline-block;width:460px;text-align:center">
				<?php if(isset($img_type) AND $img_type=="image"){ ?>		
					<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php echo htmlspecialchars($donnees['image']); ?>"/>
				<?php }
				 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				 	<?php
					} 
					if(isset($img_type) AND $img_type=="video"){ ?>
					<video src="../publicimgs/<?php echo $donnees['image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
				<?php }?>
				</p>
				<p><?php echo htmlspecialchars($donnees['titre1']); ?></p>
				<p><?php echo htmlspecialchars($donnees['contenu1']); ?></p>
				<p><?php echo 'Ajouté le : '.htmlspecialchars($donnees['date_creation']); ?></p>
				<p style="color:blue"><?php echo 'ID Sujet : '.htmlspecialchars($donnees['id']); ?></p>
			</td>
		</tr>
	</table>
	<p style="background-color:black;width:70%;margin-left:auto;margin-right:auto;height:1px"></p>
<?php
}
$req->closeCursor();

?>		
		<form style="width:550px;text-align:right;margin:auto" method="POST" action="changer-ordre-sujet.list.php">
				<p>
				<?php 
				$j=1;
				while($j<=$i){
					?>
					<label for="ordre<?php echo $j;?>">Numéro <?php echo $j;?> </label><input style="margin:10px;display:inline-block;width:75px" type="number" name="ordre<?php echo $j;?>" id="ordre"/>
					<?php
					$j++;
					}
					?>
				</p>
				<input type="hidden" name="compteur" value="<?php echo $j-1; ?>"/>
				<p style="text-align:center"><input name="ordre" type="submit" value="Envoyer"/></p>
		</form>
		<p style="text-align:center"><span style="color:red"><?php echo $j-1; ?></span> Sujets En Base</p>
      <br><br><br><br><br>
	</body>
</html>

