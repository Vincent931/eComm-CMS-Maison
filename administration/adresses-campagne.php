<?php session_start();
$email=urldecode($_GET['email']);

require 'texte1.php';

$req1=$bdd1->prepare('SELECT * FROM adresses WHERE email=?');
$req1->execute(array($email));
$donnees1=$req1->fetch();

if(isset($donnees1['email']) AND !empty($donnees1['email'])){
	$_SESSION['message']="Déjà présent dans le Listing";
	header("location:mailing.php");
} else{

$req=$bdd1->prepare('INSERT INTO adresses(email) VALUES(:email)');
$req->execute(array('email'=>$email));
}
header("Location:mailing.php");
