<?php
require 'signifiant.php';
try
{
	$bdd = new PDO('mysql:host=localhost;dbname='.$baseboutique.';charset=utf8', $admin, $keypass);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
