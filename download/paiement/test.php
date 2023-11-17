<?php
require 'boutique0.php';
 $pays_livr='GP';
$req150=$bdd->query('SELECT * FROM pays1');
$donnees150=$req150->fetch();
if(isset($donnees150[$pays_livr]) AND !empty($donnees150[$pays_livr])){
	$prix_kg=$donnees150[$pays_livr];
	echo $prix_kg;
} else {echo 'pffftt';}
