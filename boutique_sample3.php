<?php
require 'signifiant.php';
try
{
	$bdd3 = new PDO('mysql:host=localhost;dbname='.$baseboutiquesample.';charset=utf8', $admin, $keypass);
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
