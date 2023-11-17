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
			<h2 style="text-align:center">Effacer 1 explication</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			<form style="width:550px;margin:auto;text-align:right" method="POST" action="effacer-explication.list.php">
 				<p><label for="id_produit">Numéro </label><input type="number" name="id_produit" id="id_produit"/></p>

				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Effacer explication"/></p>
				
			</form>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

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