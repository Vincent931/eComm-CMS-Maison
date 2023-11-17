<?php session_start();

require 'boutique0.php';

$id=urldecode($_GET['id']);

$req=$bdd->prepare('SELECT * FROM video WHERE id=?');
$req->execute(array($id));
$donnees=$req->fetch();

$video='../publicimgs/'.$donnees['nom'];

unlink($video);

$req1=$bdd->prepare('DELETE FROM video WHERE id=:id');
$req1->execute(array('id'=>$id));

$_SESSION['message']="Vidéo effacée";

header("Location: lister-videos.php");
