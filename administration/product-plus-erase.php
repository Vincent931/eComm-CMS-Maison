<?php Session_start();
$id=$_GET['id'];

require 'boutique0.php';
$req=$bdd->prepare('DELETE FROM produits WHERE id=?');
$req->execute(array($id));

$_SESSION['message']="Produit Solo effacé";
header('Location:product-plus-ch.php');