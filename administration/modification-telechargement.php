<?php session_start(); 

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$_SESSION['compteur']=0;
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Modification de Téléchargement</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
<?php 
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>
<br><br>
<form style="width:550px;margin:auto;text-align:right" method="POST" action="modification-telechargement.list.php">
</form>
<?php
$i=0;
$req = $bdd->query('SELECT id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id');
while ($donnees = $req->fetch())
	{ $i++;
	$mot=substr($donnees['nom'],0,14);
	if($mot=="telechargement"){

	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();
	$mot=substr($donnees['nom'],0,14);
	$charge=substr($donnees['nom'],14,255);
	$img_type=$donnees['img_type'];
	require 'affichage-prod-telech.php'; 
	require 'affichage-explic.php';
}
} 
$req->closeCursor();
?>

		<br><br><br><br><br>
		</div>
	</body>
</html>