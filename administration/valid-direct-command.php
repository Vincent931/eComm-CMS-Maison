<?php session_start();
session_destroy();
session_start();

$ref=$_GET['ref'];
$mail1= $_GET['mail'];

require 'texte1.php';

require 'boutique0.php';



$reference=$_GET['ref'];

$i=0;
$j=0;
$key="";
for($k=0;$k<=12;$k++){
		$key.=rand(0,9);
	}
//update des 1/quantites et 2/declaration des commandes payés
$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
$req3->execute(array($reference));
while($donnees=$req3->fetch())
{

	
$mot=substr($donnees['telechar'],0,14);
$vente=substr($donnees['telechar'],14,255);
	
$deux=2;
if($mot=='telechargement'){

$req30=$bdd->prepare('INSERT INTO telechargement(cle, facteur, file) VALUES(:cle, :facteur, :file)');
$req30->execute(array('cle'=>$key, 'facteur'=>$deux, 'file'=>$vente));
}
//recuperation quantite
$titre=htmlspecialchars($donnees['titre']);
$req=$bdd->prepare('SELECT quantite FROM operande WHERE titre=? AND reference=?');
$req->execute(array($titre, $reference));
$quantite=$req->fetch();
$quantite_achanger=$quantite['quantite'];
//quantite
$req1=$bdd->prepare('UPDATE produits SET quantite=:quantite WHERE titre=:titre');
$req1->execute(array('quantite'=>$quantite_achanger, 'titre'=>$titre));
//etat commande oui
$oui='oui';
$req2=$bdd->prepare('UPDATE commande SET etat=:etat WHERE reference=:reference AND titre=:titre ');
$req2->execute(array('etat'=>$oui,'reference'=>$reference, 'titre'=>$titre));

}

$ajout="";
$k=0;
	$req31=$bdd->prepare('SELECT * FROM telechargement WHERE cle=?');
	$req31->execute(array($key));
	while($donnees31=$req31->fetch()){
		$k++;
}
$_SESSION['message']="Vente validée";
header("Location:vendre-direct.php");

