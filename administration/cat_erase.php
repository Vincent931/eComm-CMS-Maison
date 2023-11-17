<?php session_start();

require 'boutique0.php';

$erase = $_GET['erase'];
$icone=$_GET['icon'];

$nul="";
$i=0;
$non='non';
if($icone=='sans'){

$req=$bdd->prepare('DELETE FROM categories WHERE prefixe=?');
$req->execute(array($erase));

$req02=$bdd->prepare('UPDATE produits SET nom=:nom_ch WHERE nom=:nom');
$req02->execute(array('nom_ch'=>$nul, 'nom'=>$erase));

$req1=$bdd->query('SELECT * FROM categories');
while($donnees=$req1->fetch()){
	$i++;
}

if($i=0){
	$req01=$bdd->prepare('UPDATE cat_ok SET oui_non=:oui_non');
	$req01->execute(array('oui_non'=>$non));
}
}


if($icone=='oui'){

$req2=$bdd->prepare('SELECT * FROM categories WHERE prefixe=?');
$req2->execute(array($erase));
$donnees3=$req2->fetch();

echo '-------------'.$donnees3['icone'].'-----------'.$erase;
unlink('../publicimgs/'.$donnees3['icone']);


$req=$bdd->prepare('DELETE FROM categories WHERE prefixe=?');
$req->execute(array($erase));

$req02=$bdd->prepare('UPDATE produits SET nom=:nom_ch WHERE nom=:nom');
$req02->execute(array('nom_ch'=>$nul, 'nom'=>$erase));

$req1=$bdd->query('SELECT * FROM categories');
while($donnees=$req1->fetch()){
	$i++;
}

if($i=0){
	$req01=$bdd->prepare('UPDATE cat_ok SET oui_non=:oui_non');
	$req01->execute(array('oui_non'=>$non));
}
}
$_SESSION['message']="Categorie effacée";
if(isset($req)){$req->closeCursor();}
if(isset($req01)){$req01->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
if(isset($req2)){$req2->closeCursor();}
if(isset($req02)){$req02->closeCursor();}

header("Location:categories.php");