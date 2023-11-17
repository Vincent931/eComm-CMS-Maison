<?php session_start();
$mail_init=$_POST['message'];
require 'texte1.php';

$req=$bdd1->query('SELECT * FROM mail_vente_valid');
$exist=$req->rowCount();

if($exist>0){

$req1=$bdd1->prepare('UPDATE mail_vente_valid SET vente_validation=:vente_validation');
$req1->execute(array('vente_validation'=>$mail_init));
} else {
	$req1=$bdd1->prepare('INSERT INTO mail_vente_valid SET vente_validation=:vente_validation');
	$req1->execute(array('vente_validation'=>$mail_init));
}

if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}

$_SESSION['message']="email modifié";
header('Location:mail-validation-achat-ch.php');