<?php session_start();

if(isset($_POST['etat']) AND !empty($_POST['etat'])){
	if(isset($_POST['image']) AND !empty($_POST['image'])){
		if(isset($_POST['titre']) AND !empty($_POST['titre'])){
			if(isset($_POST['description']) AND !empty($_POST['description'])){
				if(isset($_POST['url']) AND !empty($_POST['url'])){
					if(isset($_POST['nom_site']) AND !empty($_POST['nom_site'])){

$etat=$_POST['etat'];
$image=$_POST['image'];
$titre=$_POST['titre'];
$description=$_POST['description'];
$url=$_POST['url'];
$nom_site=$_POST['nom_site'];

require 'texte1.php';

$req1=$bdd1->query('SELECT * FROM facebook');
$donnees=$req1->fetch();

if(isset($donnees['etat']) AND !empty($donnees['etat'])){
	$req2=$bdd1->prepare('UPDATE facebook SET etat=:etat, image=:image, titre=:titre, description=:description, url=:url, nom_site=:nom_site');
	$req2->execute(array('etat'=>$etat, 'image'=>$image, 'titre'=>$titre, 'description'=>$description, 'url'=>$url, 'nom_site'=>$nom_site));
} else {
	$req2=$bdd1->prepare('INSERT INTO facebook(etat, image, titre, description, url, nom_site) VALUES (?, ?, ?, ?, ?, ?)');
	$req2->execute(array($etat, $image, $titre, $description, $url, $nom_site));
}

$_SESSION['message']="Facebook Configuré";

header('Location:facebook-ch.php');

					}else{$_SESSION['message']="Remplissez le champs Afficher"; header("Location:facebook-ch.php");}
				}else{$_SESSION['message']="Remplissez le champs image mis en avant"; header("Location:facebook-ch.php");}
			}else{$_SESSION['message']="Remplissez le champs titre"; header("Location:facebook-ch.php");}
		}else{$_SESSION['message']="Remplissez le champs description"; header("Location:facebook-ch.php");}
	}else{$_SESSION['message']="Remplissez le champs url du site"; header("Location:facebook-ch.php");}
}else{$_SESSION['message']="Remplissez le champs nom de site"; header("Location:facebook-ch.php");}
