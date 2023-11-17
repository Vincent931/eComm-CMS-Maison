<?php session_start();

$ref=urldecode($_GET['ref']);

require 'boutique0.php';

$req=$bdd->prepare('DELETE FROM commande WHERE reference=:reference');
$req->execute(array('reference'=>$ref));

$_SESSION['message']="Commande perdue EFFACEE";

header('Location:operations-perdues.php');