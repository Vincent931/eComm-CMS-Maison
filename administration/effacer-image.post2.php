<?php session_start();

require 'boutique0.php';

$id=htmlspecialchars($_POST['id']);
$req=$bdd->prepare('SELECT * FROM image WHERE id=?');
$req->execute(array($id));
$donnees=$req->fetch();

$image='../publicimgs/'.$donnees['nom'];

unlink($image);

$req1=$bdd->prepare('DELETE FROM image WHERE id=:id');
$req1->execute(array('id'=>$id));

$_SESSION['message']="Image effacée";

header("Location: lister-image.php");
