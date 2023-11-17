<?php
require 'boutique0.php';

if(isset($_POST['add']) AND !empty($_POST['add']))
{
	if(isset($_POST['prefixe_add']) AND !empty($_POST['prefixe_add'])){

		$oui='oui';
		$add=$_POST['add'];
		$prefixe=$_POST['prefixe_add'];
		$nom_icone=$_POST['nom_icone'];

		if(isset($_FILES['fichier_up']['tmp_name'])){

		$extension_upload=strtolower( substr(strrchr($_FILES['fichier_up']['name'], '.') ,1) );

		$fichier=$nom_icone.'.'.$extension_upload;} else {
			$fichier="";
		}

		$req0=$bdd->query('SELECT * FROM cat_ok');
		$donnees0=$req0->fetch();

		if(isset($donnees0['oui_non']) AND !empty($donnees0['oui_non'])){
				$req=$bdd->prepare('UPDATE cat_ok SET oui_non=:oui_non');
				$req->execute(array('oui_non'=>$oui));

		} else {
				$req=$bdd->prepare('INSERT INTO cat_ok(oui_non) VALUES (?)');
				$req->execute(array($oui));
		}

		$req1=$bdd->prepare('SELECT * FROM categories WHERE nom=?');
		$req1->execute(array($fichier));

		$image_exist=$req1->fetch();


		$req1=$bdd->prepare('INSERT INTO categories(nom, prefixe, icone) VALUES(?,?,?)');
		$req1->execute(array($add, $prefixe, $fichier));

		//transfert du fichier temporaire vers repertoire du serveur
		//dossier publicimgs
		$nom="../publicimgs/".$fichier;

		if(isset($_FILES['fichier_up']['tmp_name'])){

		$resultat=move_uploaded_file($_FILES['fichier_up']['tmp_name'], $nom);

		if($resultat){$_SESSION['message']="Chargement OK.";}

		chmod("../publicimgs/".$fichier, 0644);
		}

		header("Location: categories.php");

	}else{$_SESSION['message']="Remplissez le champ description";header("Location:categories.php");}
}else{$_SESSION['message']="Remplissez le champ nom Catégorie";header("Location:categories.php");}
