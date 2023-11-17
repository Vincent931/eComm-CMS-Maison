<?php session_start();
$email=urldecode($_GET['email']);

require 'texte1.php';

$req1=$bdd1->prepare('DELETE FROM adresses WHERE email=?');
$req1->execute(array($email));



$_SESSION['message']="Email effacé";

header("Location:mailing.php");
