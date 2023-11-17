<?php session_start();
$redirect=$_POST['redirect'];
$url=$_POST['url'];

require 'boutique0.php';

$req=$bdd->query('SELECT* FROM redirect');
$exists=$req->rowCount();

if($exists>0){
	$req2=$bdd->prepare('UPDATE redirect SET redirect=:redirect, url=:url');
	$req2->execute(array('redirect'=>$redirect, 'url'=>$url));
	$_SESSION['message']="Valeur de Redirection changée";
} else {
	$req2=$bdd->prepare('INSERT INTO redirect(redirect, url) VALUES(:redirect, :url)');
	$req2->execute(array('redirect'=>$redirect, 'url'=>$url));
	$_SESSION['message']="Valeur de Redirection changée";
}
$req->closeCursor();
if(isset($req2)){
	$req2->closeCursor();
}
header("Location:indexto.php");