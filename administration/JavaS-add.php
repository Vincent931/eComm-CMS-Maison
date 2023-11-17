<?php session_start();
require 'boutique0.php';
$Page=$_POST['Page'];
$Contenu=$_POST['Contenu'];
$req=$bdd->prepare('SELECT * FROM JavaScript WHERE Page=?');
$req->execute(array($Page));
$exist=$req->rowCount();

if($exist>0){
	$_SESSION['message']="Page déjà existante, modifiez ou abandonnez";
	header('Location:JavaS.php');
}
else{
	$req1=$bdd->prepare('INSERT INTO JavaScript(Page, Contenu) VALUES(:Page, :Contenu)');
	$req1->execute(array('Page'=>$Page, 'Contenu'=>$Contenu));
	$_SESSION['message']="Code JavaScript ajouté Pour la Page".$Page;
	header('Location:JavaS.php');
}
