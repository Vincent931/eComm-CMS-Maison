<?php session_start(); 

require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$_SESSION['compteur']=0;
$img_type="";
$mod=12;
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Modification de produit</h2>
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

<?php $i=0;

$req = $bdd->query('SELECT id, ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM produits ORDER BY id ');
while ($donnees = $req->fetch())
{
	$img_type=$donnees['img_type'];
	$i++;
	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}
	$mot=substr($donnees['nom'],0,14);
	if ($mot!='telechargement'){

	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();

	require 'affichage-prod.php'; 
	if(isset($donnees2['id']) AND !empty($donnees2['id'])){require 'affichage-explic.php';}
	?>
<p style="background-color:black;width:80%;margin-left:auto;margin-right:auto;height:1.5px"></p>
<?php
}
} 
$req->closeCursor();
$req2->closeCursor();
?>			
		</div>
      <br><br><br><br><br>
	</body>
</html>