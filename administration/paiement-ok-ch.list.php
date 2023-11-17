<?php session_start();
$position=$_POST['position'];

require 'texte1.php';

$contenu=$_POST['message'];

$req1=$bdd1->query('SELECT * FROM retok');
$exist=$req1->rowCount();

if ($exist>0){

$req=$bdd1->prepare('UPDATE retok SET contenu=:contenu');
$req->execute(array('contenu'=>$contenu));

} else {

$req=$bdd1->prepare('INSERT INTO retok SET contenu=:contenu');
$req->execute(array('contenu'=>$contenu));

}

$_SESSION['message']="Page enregistrée";
header("Location:paiement-ok-ch.php?position=".$position);