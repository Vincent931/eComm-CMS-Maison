<?php session_start();
$id=$_GET['id'];

require 'boutique0.php';

$req=$bdd->prepare('DELETE FROM JavaScript WHERE id=?');
$req->execute(array($id));

$_SESSION['message']="Code Effacé";

header('Location:JavaS.php');