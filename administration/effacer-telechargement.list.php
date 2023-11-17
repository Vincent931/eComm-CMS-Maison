<?php session_start();

require 'boutique0.php';
//id du fichier
$id=urldecode($_GET['id']);
//recuperation du nom de dossier
require 'texte1.php';
$req3=$bdd1->query('SELECT dossier FROM societe');
$ste=$req3->fetch();
$dossier=$ste['dossier'];

//selection du nom de fichier
$req=$bdd->prepare('SELECT * FROM upload WHERE id=?');
$req->execute(array($id));
$donnees=$req->fetch();
//chemin et nom du fichier
$fichier='../download/'.$dossier.'/'.$donnees['nom'];
//effacer fichier
unlink($fichier);

$req1=$bdd->prepare('DELETE FROM upload WHERE id=:id');
$req1->execute(array('id'=>$id));

$_SESSION['message']="Fichier effacé, pensez à passer l'affichage du téléchargement associé à : non ....";

header("Location: upload-telechargement.php");