<?php session_start();

require 'texte1.php';

if(isset($_POST['exist']) AND !empty($_POST['exist'])){
	if(isset($_POST['latitude']) AND !empty($_POST['latitude'])){
		if(isset($_POST['longitude']) AND !empty($_POST['longitude'])){
			if(isset($_POST['api']) AND !empty($_POST['api'])){

$exist=htmlspecialchars($_POST['exist']);
$lat=htmlspecialchars($_POST['latitude']);
$lon=htmlspecialchars($_POST['longitude']);
$api=htmlspecialchars($_POST['api']);

$req1=$bdd1->query('SELECT* FROM google_mp');
$donnees=$req1->fetch();

if(isset($donnees['exist']) AND !empty($donnees['exist'])){
	$req2=$bdd1->prepare('UPDATE google_mp SET exist=:exist, lat=:lat, lon=:lon, api=:api');
	$req2->execute(array('exist'=>$exist,'lat'=>$lat, 'lon'=>$lon, 'api'=>$api));
} else {
	$req2=$bdd1->prepare('INSERT INTO google_mp(exist, lat, lon, api) VALUES (?, ?, ?, ?)');
	$req2->execute(array($exist, $lat, $lon, $api));
}
$_SESSION['message']="Ajouté";

header('Location:google-ch.php');

			} else{$_SESSION['message']="Remplissez le champ clé d'API";header("Location:google-ch.php");}
		} else{$_SESSION['message']="Remplissez le champ longitude";header("Location:google-ch.php");}
	} else{$_SESSION['message']="Remplissez le champ latitude";header("Location:google-ch.php");}
} else{$_SESSION['message']="Remplissez le champ Afficher";header("Location:google-ch.php");}			

