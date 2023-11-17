<?php session_start();

require 'texte1.php';

$req=$bdd1->query('SELECT mail FROM societe');
$mail=$req->fetch();

$mailto=$mail['mail'];

header ("Location: mailto:".$mailto."?subject=Intérressé%20par%20vos%20produits%20&body=Mon%20email%20est%20".$_POST['email'].".%20Je%20suis%20 intérressé%20par%20vos%20produits%2C%20pouvez%20vous%20me%20recontacter%20SVP%20%3F");

exit();
?>