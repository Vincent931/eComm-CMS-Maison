<?php session_start();

$non='non';

require 'boutique0.php';

$req=$bdd->prepare('DELETE FROM commande WHERE etat=:etat');
$req->execute(array('etat'=>$non));

$_SESSION['message']="Commandes perdues EFFACEES (toutes)";

header('Location:operations-perdues.php');