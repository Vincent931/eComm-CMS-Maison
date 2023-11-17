<?php session_start();

require 'boutique0.php';

if(isset($_POST['coupon'])AND !empty($_POST['coupon'])){
	if(isset($_POST['valeur'])AND !empty($_POST['valeur'])){
		if(isset($_POST['minimum'])AND !empty($_POST['minimum'])){
$coupon=$_POST['coupon'];
$valeur=$_POST['valeur'];
$minimum=$_POST['minimum'];

$req=$bdd->query('SELECT * FROM reduction');
$donnees=$req->fetch();

if(isset($donnees['coupon']) AND !empty($donnees['coupon'])){

	$req1=$bdd->prepare('UPDATE reduction SET coupon=:coupon, valeur=:valeur, minimum=:minimum');
	$req1->execute(array('coupon'=>$coupon, 'valeur'=>$valeur, 'minimum'=>$minimum));

} else {

	$req1=$bdd->prepare('INSERT INTO reduction(coupon, valeur, minimum) VALUES (:coupon, :valeur, :minimum)');
	$req1->execute(array('coupon'=>$coupon, 'valeur'=>$valeur, 'minimum'=>$minimum));

}

$_SESSION['message']="Coupon Réduction Configuré";header("Location:coupon-reduction.php");

		} else{$_SESSION['message']="Veuillez remplir le champs"; header("Location:coupon-reduction.php");}
	} else{$_SESSION['message']="Veuillez remplir le champs"; header("Location:coupon-reduction.php");}
} else{$_SESSION['message']="Veuillez remplir le champs"; header("Location:coupon-reduction.php");}	