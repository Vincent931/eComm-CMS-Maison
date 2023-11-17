<?php session_start(); 

require 'boutique0.php';
require 'texte1.php';
if(isset($_POST['ordre']) AND !empty($_POST['ordre']))

{

$k=intval($_POST['compteur']);

$i=0;

while($i<$k)

{

$i++;
$ordre="";

$inp="";
$inp="ordre".$i;
$ordre=$_POST[$inp];
echo $ordre.'--';
	
$req=$bdd->prepare('SELECT * FROM produits WHERE id=?');
$req->execute(array($ordre));
$donnees3=$req->fetch();


$ref_obj=$donnees3['ref_obj'];
$obs_url=$donnees3['obs_url'];
$nom= $donnees3['nom'];
$afficher = $donnees3['afficher'];
$img_type= $donnees3['img_type'];
$cle_image = $donnees3['cle_image'];
$titre = $donnees3['titre'];
$description = $donnees3['description'];
$prix = $donnees3['prix'];
$TVA = $donnees3['TVA'];
$promotion = $donnees3['promotion'];
$quantite = $donnees3['quantite'];
$livraison = $donnees3['livraison'];
$poids = $donnees3['poids'];
$date_creation = $donnees3['date_creation'];
$barre=$donnees3['barre'];

$req4 = $bdd->prepare('INSERT INTO produits(ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

$req4->execute(array($ref_obj, $obs_url, $nom, $afficher, $img_type, $cle_image, $titre, $description, $prix, $barre, $TVA, $promotion, $quantite, $livraison, $poids, $date_creation));

$req5=$bdd->query('SELECT * FROM produits');
while($donnees4=$req5->fetch()) {
$_SESSION['id']=htmlspecialchars($donnees4['id']);
}

$req6=$bdd->prepare('UPDATE explications SET id_produit=:id_new WHERE id_produit=:id_produit');
$req6->execute(array('id_new'=>$_SESSION['id'], 'id_produit'=>$ordre));


$req7=$bdd->prepare('DELETE FROM produits WHERE id=?');
$req7->execute(array($ordre));

//update publicité1


$req20=$bdd1->prepare('UPDATE publicite1 SET id_prod=:id_new WHERE id_prod=:id_a_changer');
$req20->execute(array('id_new'=>$_SESSION['id'], 'id_a_changer'=>$ordre));

//update publicité2

$req21=$bdd1->prepare('UPDATE publicite2 SET id_prod=:id_new WHERE id_prod=:id_a_changer');
$req21->execute(array('id_new'=>$_SESSION['id'], 'id_a_changer'=>$ordre));

echo $_SESSION['id'].'--';

}
	
$_SESSION['message']='Produits déplacés';

}
if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
if(isset($req4)){$req4->closeCursor();}
if(isset($req5)){$req5->closeCursor();}
if(isset($req6)){$req6->closeCursor();}
if(isset($req7)){$req7->closeCursor();}
if(isset($req20)){$req20->closeCursor();}
if(isset($req21)){$req21->closeCursor();}

header("Location: changer-ordre.php");
/*echo $afficher.'--'.$cle_image.'--'.$titre.'--'.$description.'--'.$prix.'--'.$TVA.'--'.$promotion.'--'.$quantite.'--'.$livraison.'--'.$livraison_associe.'--'.$livraison_poly.'--'.$livr_inter.'--'.$poids.'--'.$date_creation;
*/
//echo 'anc='.$ordre.' new='.$_SESSION['id'];
?>
