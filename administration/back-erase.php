<?php session_start();

require 'boutique0.php';

require 'texte1.php';

$back=$_GET['int'];

$id=$_GET['id'];

$req300=$bdd1->query('SELECT * FROM background');
$donnees300=$req300->fetch();

$back1=$donnees300['back1'];
$back2=$donnees300['back2'];
$back3=$donnees300['back3'];

if($back=='back1'){
	$back1="";
}
if($back=='back2'){
	$back2="";
}
if($back=='back3'){
	$back3="";
}


$req301=$bdd->prepare('DELETE FROM image WHERE intitule=?');
$req301->execute(array($back));

$req302=$bdd1->prepare('UPDATE background SET back1=:back1, back2=:back2, back3=:back3');
$req302->execute(array('back1'=>$back1, 'back2'=>$back2, 'back3'=>$back3));

unlink("../publicimgs/".$back.".jpg");

$_SESSION['message']="Image Effacée";

header("Location: back-image.php");
