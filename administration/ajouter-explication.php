<?php session_start();

require 'boutique0.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Ajouter 1 explication</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>
<div style="display:inline-block">
    <a style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="image-bank.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Image Bank</a> 
</div>	
			<p>Explications - Précisions</p>
			<form style="width:550px;margin:auto;text-align:right" method="POST" action="ajouter-explication.list.php">
				
				<p><textarea style="width:450px" rows="14" cols="120" name="precisiona" id="precisiona">Texte de précision sur le produit, vous pouvez ajouter des donnees sur la fabrication, le coût, la politique de livraison, de vente, la société productrice ou toutes autres formes de renseignements complémentaires, celà donne du crédit à votre société quant à son sérieux et généralement fait grimper les ventes ...</textarea></p>

				<p><label for="image1">Nom de l'image 1 (avec .jpg ou .png)</label></p>
				<p><input type="text" name="image1" id="image1"/></p>

				<p><label for="image2">Nom de l'image 2 (avec .jpg ou .png)</label></p>
				<p><input type="text" name="image2" id="image2"/></p>
				
				<p><label for="image3">Nom de l'image 3 (avec .jpg ou .png)</label></p>
				<p><input type="text" name="image3" id="image3"/></p>
 				
 				<p><label for="id_produit">Numéro de l'id correspondant au produit pour lequel vous voulez ajouter du contenu</label></p>
 				<p><input type="number" name="id_produit" id="id_produit"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Ajouter explication"/></p>
				
			</form>
			<?php

$req = $bdd->query('SELECT id, ref_obj, obs_url, nom, afficher, cle_image, titre, description, prix, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id');
while ($donnees = $req->fetch())
{
	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
	$mot=substr($donnees['nom'],0,14);
	if ($mot!='telechargement'){

	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();

	require 'affichage-prod.php'; 
	require 'affichage-explic.php';
}
} 
$req->closeCursor();
?>

		</div>
		  <br><br><br><br><br>
	</body>
</html>