<?php session_start();

if(isset($_POST['message']) AND!empty($_POST['message'])){$contenu=$_POST['message'];}else{$contenu="";}
if(isset($_POST['subject']) AND!empty($_POST['subject'])){$subject=$_POST['subject'];}else{$subject="";}
if(isset($_POST['adresse']) AND!empty($_POST['adresse'])){$email_addr=$_POST['adresse'];}else{$email_addr="";}
if(isset($_POST['mdp']) AND!empty($_POST['mdp'])){$motdepasse=$_POST['mdp'];}else{$motdepasse="";}
if(isset($_POST['serveur_mail']) AND!empty($_POST['serveur_mail'])){$serveur_mail=$_POST['serveur_mail'];}else{$serveur_mail="";}

require 'texte1.php';
$req=$bdd1->query('SELECT * FROM campagne_listing');
$exist=$req->rowCount();

if($exist>0){

$req1=$bdd1->prepare('UPDATE campagne_listing SET contenu=:contenu, subject=:subject, email_addr=:email_addr, motdepasse=:motdepasse, serveur_mail=:serveur_mail');
$req1->execute(array('contenu'=>$contenu, 'subject'=>$subject, 'email_addr'=>$email_addr, 'motdepasse'=>$motdepasse, 'serveur_mail'=>$serveur_mail));

} else {
	$req1=$bdd1->prepare('INSERT INTO campagne_listing SET contenu=:contenu, subject=:subject, email_addr=:email_addr, motdepasse=:motdepasse, serveur_mail=:serveur_mail');
	$req1->execute(array('contenu'=>$contenu, 'subject'=>$subject, 'email_addr'=>$email_addr, 'motdepasse'=>$motdepasse, 'serveur_mail'=>$serveur_mail));
}

if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}

$_SESSION['message']="Email Configuré, veuillez tester avant d'envoyer la campagne";
header('Location:mailing-all.php');