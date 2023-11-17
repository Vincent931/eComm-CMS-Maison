<?php session_start();

require 'boutique0.php';

$mail=htmlspecialchars($_POST['effacement']);

$req=$bdd->prepare('DELETE FROM compte WHERE mail=?');
$req->execute(array($mail));

$_SESSION['message']="Compte effacé !";

header("Location:comptes.php");