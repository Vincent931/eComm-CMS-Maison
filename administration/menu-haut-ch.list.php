<?php session_start();
require 'texte1.php';

if(isset($_POST['tarifs']) AND !empty($_POST['tarifs'])){
	if(isset($_POST['blog']) AND !empty($_POST['blog'])){


$tarifs=htmlspecialchars($_POST['tarifs']);
$blog=htmlspecialchars($_POST['blog']);

$req1=$bdd1->query('SELECT * FROM nav_haut');
$donnees1=$req1->fetch();

if(isset($donnees1['tarifs']) AND !empty($donnees1['tarifs'])){

$req=$bdd1->prepare('UPDATE nav_haut SET tarifs=:tarifs, blog=:blog');
$req->execute(array('tarifs'=>$tarifs, 'blog'=>$blog));

} else{

$req=$bdd1->prepare('INSERT INTO nav_haut(tarifs, blog) VALUES(:tarifs, :blog)');
$req->execute(array('tarifs'=>$tarifs, 'blog'=>$blog));

}

$_SESSION['message']="Valeurs du menu Haut enregistré";
header("Location:menu-haut-ch.php");

	} else{$_SESSION['message']="Remplissez le champ titre de Blog";header("Location:menu-haut-ch.php");}
} else{$_SESSION['message']="Remplissez le champ titre de la page Produit";header("Location:menu-haut-ch.php");}