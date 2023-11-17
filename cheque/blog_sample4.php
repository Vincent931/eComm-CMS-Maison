<?php
require '../signifiant.php';
try
{
	$bdd4 = new PDO('mysql:host=localhost;dbname='.$baseblogsample.';charset=utf8', $admin, $keypass);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
