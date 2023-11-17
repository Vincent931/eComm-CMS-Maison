<?php session_start();

$id=$_POST['id'];

require 'boutique0.php';

$req=$bdd->prepare('SELECT * FROM page WHERE id=?');
$req->execute(array($id));
$donnees=$req->fetch();
$fichier=$donnees['nom'];


unlink('../'.$fichier);

$req1=$bdd->prepare('DELETE FROM page WHERE id=?');
$req1->execute(array($id));

$_SESSION['message']="Effacé !";

header("Location:pre-pages.php");
