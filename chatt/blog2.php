<?php
try
{
	$bdd2 = new PDO('mysql:host=localhost;dbname=vvhv1249_chatt;charset=utf8', 'vvhv1249_Logl85ugre6952i1pfe5', 'luZIXwi046XV3PxA$');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
