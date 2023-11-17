<?php session_start();
require 'boutique0.php';
$url=$_SERVER['HTTP_REFERER'];
$titre=$_POST['titre'];

if(isset($_POST['augmenter']) AND !empty($_POST['augmenter'])){
	$a=intval($_POST['augmenter']);
}else{
	$a=0;
}
if(isset($_POST['reduire']) AND !empty($_POST['reduire'])){
	$r=intval($_POST['reduire']);
}else{
	$r=0;
}
$req=$bdd->prepare('SELECT quantite FROM produits WHERE titre=:titre');
$req->execute(array('titre'=>$titre));
$donnees=$req->fetch();

$number=intval($donnees['quantite']);
$new_number=$number+$a-$r;

$req1=$bdd->prepare('UPDATE produits SET quantite=:quantite WHERE titre=:titre');
$req1->execute(array('quantite'=>$new_number, 'titre'=>$titre));

$req->closeCursor();
$req1->closeCursor();

$_SESSION['message']="Valeur mise à ".$new_number.' pour : '.$titre;

header("Location:".$url);