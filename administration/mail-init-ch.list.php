<?php session_start();
$mail_init=$_POST['message'];

require 'texte1.php';
$req=$bdd1->query('SELECT * FROM mails');
$exist=$req->rowCount();
$vente="<br>";
$reinitialisation="<br>";
if($exist>0){

$req1=$bdd1->prepare('UPDATE mails SET compte_creation=:compte_creation');
$req1->execute(array('compte_creation'=>$mail_init));

} else {
	$req1=$bdd1->prepare('INSERT INTO mails SET vente=:vente, compte_creation=:compte_creation, reinitialisation=:reinitialisation');
	$req1->execute(array('vente'=>$vente, 'compte_creation'=>$mail_init, 'reinitialisation'=>$reinitialisation));
}
if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
$_SESSION['message']="email modifié";
header('Location:mail-init-ch.php');