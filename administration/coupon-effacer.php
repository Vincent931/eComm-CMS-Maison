<?php session_start();

$id=urldecode($_GET['id']);

require 'boutique0.php';

$req=$bdd->prepare('DELETE FROM reduction WHERE id=:id');
$req->execute(array('id'=>$id));

$_SESSION['message']="IL N'Y A PLUS DE COUPON REDUCTION SUR LE SITE";

header("Location:coupon-reduction.php");