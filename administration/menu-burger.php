<?php session_start();
require 'texte1.php';

$ouinon=$_POST['burger'];

$req=$bdd1->query('SELECT * FROM menu_burger');
$exist=$req->rowCount();

if($exist>0){
	$req1=$bdd1->prepare('UPDATE menu_burger SET afficher=:afficher');
	$req1->execute(array('afficher'=>$ouinon));
} else {
	$req1=$bdd1->prepare('INSERT INTO menu_burger SET afficher=:afficher');
	$req1->execute(array('afficher'=>$ouinon));
}

if(isset($req)){
	$req->closeCursor();
}
if(isset($req1)){
	$req1->closeCursor();
}
$_SESSION['message']="Caractéristique du menu sauvegardé";
header('Location:menus.php');