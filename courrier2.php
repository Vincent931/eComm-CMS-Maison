<?php session_start();

if(isset($_POST['comments']) AND !empty($_POST['comments']) AND isset($_POST['email']) AND !empty($_POST['email'])){
require 'texte1.php';

$req=$bdd1->query('SELECT mail FROM societe');
$mail=$req->fetch();

$mailto=$mail['mail'];

header ("Location: mailto:".$mailto."?subject=Intérressé%20par%20vos%20produits%20&body=Mon%20email%20est%20".$_POST['email'].".%20".$_POST['comments'].".");

exit();
}
?>