<?php session_start();
$Contenu=$_POST['Contenu'];
$Page=$_POST['Page'];
$id=$_POST['id'];

require 'boutique0.php';
$req=$bdd->prepare('UPDATE JavaScript SET Page=:Page, Contenu=:Contenu WHERE id=:id');
$req->execute(array('Page'=>$Page, 'Contenu'=>$Contenu, 'id'=>$id));

$_SESSION['message']="Valeurs changées pour code JavaScript sur Page=".$Page;
header('Location:JavaS.php');