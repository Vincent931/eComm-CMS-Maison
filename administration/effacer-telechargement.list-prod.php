<?php session_start();

$id=$_POST['id_effacer'];

require 'boutique0.php';

$req=$bdd->prepare('DELETE FROM produits WHERE id=:id');
$req->execute(array('id'=>$id));

$exist="non";
$oui="oui";
$non="non";

$req4=$bdd->query('SELECT * FROM produits WHERE (nom) LIKE "%telechargement%" ORDER BY id');
while($donnees4=$req4->fetch()){
	if(isset($donnees4['nom']) AND !empty($donnees4['nom'])){

	$exist="oui";

	$req6=$bdd->prepare('DELETE FROM download WHERE exist=:exist');
	$req6->execute(array('exist'=>$oui));

	$req7=$bdd->prepare('DELETE FROM download WHERE exist=:exist');
	$req7->execute(array('exist'=>$non));

	$req5=$bdd->prepare('INSERT INTO download(exist) VALUES(?)');
	$req5->execute(array($oui));
	}
}
$req8=$bdd->query('SELECT * FROM produits WHERE (nom) LIKE "%telechargement%" ORDER BY id');
{
	$count=$req8->rowCount();
	if($count<1){

		$req7=$bdd->query('DELETE FROM download');
		
		$req5=$bdd->prepare('INSERT INTO download(exist) VALUES(?)');
		$req5->execute(array($non));
	} else{
		$req5=$bdd->prepare('UPDATE download(exist) VALUES(?)');
		$req5->execute(array($oui));
	}
}
if(isset($req)){$req->closeCursor();}
if(isset($req6)){$req6->closeCursor();}
if(isset($req7)){$req7->closeCursor();}
if(isset($req5)){$req5->closeCursor();}
if(isset($req8)){$req8->closeCursor();}
if(isset($req4)){$req4->closeCursor();}
header("Location: effacer-telechargement.php");