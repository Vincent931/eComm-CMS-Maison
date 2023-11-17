<?php session_start();


$ok=$_POST['dollar'];


require 'boutique0.php';

$req=$bdd->query('SELECT * FROM taux_USD');
$donnees=$req->fetch();

if (isset($donnees['ok']) AND !empty($donnees['ok'])){
	$req2=$bdd->prepare('UPDATE taux_USD SET ok=:ok');
	$req2->execute(array('ok'=>$ok));
} else {
	$req2=$bdd->prepare('INSERT INTO taux_USD(ok) VALUES (:ok)');
	$req2->execute(array('ok'=>$ok));
}
$req->closeCursor();
$req2->closeCursor();

$_SESSION['message']="Données sauvegardées";

header("Location: conversion-ch.php");