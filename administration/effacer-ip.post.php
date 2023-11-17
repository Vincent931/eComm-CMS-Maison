<?php session_start();
$id = htmlspecialchars(urldecode($_GET['id']));

require 'blog2.php';

$req=$bdd2->prepare('DELETE FROM blacklist WHERE id=?');
$req->execute(array($id));

$_SESSION['message']="IP effacer de la Blacklist, l'utilisateur peut à nouveau commenter";
header("Location:blacklist.php");