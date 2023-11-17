<?php
require 'boutique0.php';

$journalise='oui';
$mail=urldecode($_GET['email']);

$req=$bdd->prepare('UPDATE compte SET journalise=:journalise WHERE mail=:mail');
$req->execute(array('journalise'=>$journalise, 'mail'=>$mail));

$_SESSION['message']="Etat changé";

header("Location:mailing.php");