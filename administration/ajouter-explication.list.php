<?php session_start();

require 'boutique0.php';


	if(!empty($_POST['precisiona'])){
	$precisiona=$_POST['precisiona'];}
	else{$precisiona="";}
	if(!empty($_POST['image1'])){
	$image1=htmlspecialchars($_POST['image1']);}
	else{$image1="";}
	if(!empty($_POST['image2'])){
	$image2=htmlspecialchars($_POST['image2']);}
	else{$image2="";}
	if(!empty($_POST['image3'])){
	$image3=htmlspecialchars($_POST['image3']);}
	else{$image3="";}
	if(!empty($_POST['id_produit'])) {
	$id_produit=htmlspecialchars($_POST['id_produit']);

	$req2=$bdd->prepare('INSERT INTO explications(id_produit, precisiona, image1, image2, image3) VALUES(?, ?, ?, ?, ?)');
	$req2->execute(array($id_produit, $precisiona, $image1, $image2, $image3));
	$req2->closeCursor();
					
	$_SESSION['message']='Explications ajoutées à la base de données';}
	else {$_SESSION['message']='Pas ou mauvais Numéro';}

header("Location: ajouter-explication.php");
