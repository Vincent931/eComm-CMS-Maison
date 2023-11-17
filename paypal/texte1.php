<?php
require '../signifiant.php';
try
{
	$bdd1 = new PDO('mysql:host=localhost;dbname='.$basetexte.';charset=utf8', $admin, $keypass);
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
