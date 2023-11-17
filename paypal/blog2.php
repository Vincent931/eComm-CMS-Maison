<?php
require '../signifiant.php';
try
{
	$bdd2 = new PDO('mysql:host=localhost;dbname='.$baseblog.';charset=utf8', $admin, $keypass);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
