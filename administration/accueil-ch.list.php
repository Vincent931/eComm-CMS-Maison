<?php session_start();

$position=$_POST['position'];

require 'texte1.php';

$contenu=$_POST['message'];

$req1=$bdd1->query('SELECT * FROM accueil');
$exist=$req1->rowCount();
if ($exist>0){

$req=$bdd1->prepare('UPDATE accueil SET contenu=:contenu');
$req->execute(array('contenu'=>$contenu));

} else {

$req=$bdd1->prepare('INSERT INTO accueil SET contenu=:contenu');
$req->execute(array('contenu'=>$contenu));

}

$_SESSION['message']="Page enregistré";
header("Location:accueil-ch.php?position=".$position);