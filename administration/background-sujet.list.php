<?php session_start();

$couleurBS=$_POST['couleurBS'];

require '../texte1.php';

$req=$bdd1->query('SELECT * FROM colorS');
$donnees=$req->fetch();

if(isset($donnees['couleurBS']) AND !empty($donnees['couleurBS'])){

	$req1=$bdd1->prepare('UPDATE colorS SET couleurBS=:couleurBS');
	$req1->execute(array('couleurBS'=>$couleurBS));

} else {

	$req1=$bdd1->prepare('INSERT INTO colorS(couleurBS) VALUES(?)');
	$req1->execute(array($couleurBS));

}

$_SESSION['message']='Couleur sauvegardée';
header("Location:background-sujet.php");