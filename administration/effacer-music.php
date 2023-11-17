<?php session_start();

require 'boutique0.php';

$id=urldecode($_GET['id']);

$req=$bdd->prepare('SELECT * FROM music WHERE id=?');
$req->execute(array($id));
$donnees=$req->fetch();

$music='../publicimgs/'.$donnees['nom'];

unlink($music);

$req1=$bdd->prepare('DELETE FROM music WHERE id=:id');
$req1->execute(array('id'=>$id));

$_SESSION['message']="MP3 effacé";

header("Location: lister-musique.php");
