<?php session_start();

require 'texte1.php';

$afficher=$_POST['afficher'];
$image=$_POST['cle_image'];
$contenu=$_POST['contenu'];
$color=$_POST['color'];

$req=$bdd1->query('SELECT * FROM jeux');
$exist=$req->rowCount();

if ($exist>0){
	$req1=$bdd1->prepare('UPDATE jeux SET background=:background, afficher=:afficher, image=:image,contenu=:contenu');
	$req1->execute(array('background'=>$color,'afficher'=>$afficher, 'image'=>$image, 'contenu'=>$contenu));
} else {
	$req1=$bdd1->prepare('INSERT INTO jeux SET background=:background, afficher=:afficher, image=:image,contenu=:contenu');
	$req1->execute(array('background'=>$color, 'afficher'=>$afficher, 'image'=>$image, 'contenu'=>$contenu));
}

$_SESSION['message']="Valeurs sauvegardées";

header('Location:jeux-concours-ch.php');