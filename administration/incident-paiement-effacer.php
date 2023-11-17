<?php session_start();

require 'boutique0.php';
$id=htmlspecialchars($_GET['id']);
$req = $bdd->prepare('DELETE FROM incident_paiement WHERE id=?');
$req->execute(array($id));
header("Location:incident-paiement.php");