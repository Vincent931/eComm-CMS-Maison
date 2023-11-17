<?php session_start(); 

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$mod=0;
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Changer l'ordre d'affichage</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			<p>Aller fin de page pour changer l'orde des id</p>
			<h2>Listing tous produits</h2>
<?php 
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
$i=0;
$req = $bdd->query('SELECT id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id ');
while ($donnees = $req->fetch())
{
	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
$i++;
$img_type=$donnees['img_type'];
	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();
	
	require 'affichage-prod.php'; 
	require 'affichage-explic.php';

}
$req->closeCursor();
?>		<p>Numéros de l'id</p>
		<form style="width:550px;text-align:right;margin:auto" method="POST" action="changer-ordre.list.php">
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
		<p style="text-align:center"><span style="color:red"><?php echo $j-1; ?></span> Produits En Bases</p>


		</div>
		  <br><br><br><br><br>
	</body>
</html>

