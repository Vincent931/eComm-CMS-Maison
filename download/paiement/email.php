<?php session_start();

require 'texte1.php';

$req=$bdd1->query('SELECT mail FROM societe');
$mail=$req->fetch();

$mailto=$mail['mail'];

header ("Location: mailto:".$mailto);

exit();
?>