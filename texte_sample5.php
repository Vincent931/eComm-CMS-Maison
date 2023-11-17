<?php
require 'signifiant.php';
try
{
	$bdd5 = new PDO('mysql:host=localhost;dbname='.$basetextesample.';charset=utf8', $admin, $keypass);

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
