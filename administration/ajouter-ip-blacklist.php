<?php session_start();

$ip=htmlspecialchars($_POST['ip']);

require 'blog2.php';

$req=$bdd2->prepare('INSERT INTO blacklist (ip) VALUES(:ip)');
$req->execute(array('ip'=>$ip));

$_SESSION['message']="IP Blacklisté";

header('Location:blacklist.php');