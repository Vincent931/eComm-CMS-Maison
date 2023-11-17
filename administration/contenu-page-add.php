<?php session_start();

require 'boutique0.php';

$id=$_POST['cache'];

	if(isset($_POST['message']) AND !empty($_POST['message'])){
		$_SESSION['contenu']=$_POST['message'];
	}

$req=$bdd->prepare('SELECT * FROM page WHERE id=?');
$req->execute(array($id));

$donnees=$req->fetch();

$nom=$donnees['nom'];

$req1=$bdd->prepare('UPDATE page SET contenu=:contenu WHERE id=:id');
$req1->execute(array('contenu'=>$_SESSION['contenu'], 'id'=>$id));

$_SESSION['message']="CONTENU changé !";
$_SESSION['contenu']="";
header("Location:pages.php?nom=".$nom);