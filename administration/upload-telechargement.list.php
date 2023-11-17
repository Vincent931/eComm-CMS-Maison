<?php session_start();

require 'boutique0.php';
require 'texte1.php';
$req2=$bdd1->query('SELECT dossier FROM societe');
$ste=$req2->fetch();

if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){

$descr=htmlspecialchars($_POST['description']);
$nameF=htmlspecialchars($_POST['nameF']);
$extension_upload=strtolower( substr(strrchr($_FILES['fichier_up']['name'], '.') ,1) );

$fichier=$nameF.'.'.$extension_upload;

	$req1=$bdd->prepare('SELECT * FROM upload WHERE nom=?');
	$req1->execute(array($fichier));
	$image_exist=$req1->fetch();
	if(isset($image_exist['nom']) AND !empty($image_exist['nom'])){
		$_SESSION['message']="Le fichier existe déjà"; header("Location: upload-telechargement.php");
	} else {
//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../download/".$ste['dossier']."/"."{$nameF}.{$extension_upload}";

$resultat=move_uploaded_file($_FILES['fichier_up']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";}
$int="telechargement";
$req=$bdd->prepare('INSERT INTO upload(intitule, nom, description) VALUES(:intitule, :nom, :description)');
$req->execute(array('intitule'=>$int,
					'nom'=>$fichier,
					'description'=>$descr));

chmod("../download/".$ste['dossier']."/".$fichier, 0644);
}

header("Location: upload-telechargement.php");

	}else{$_SESSION['message']="Remplissez le champ description";header("Location:upload-telechargement.php");}
}else{$_SESSION['message']="Remplissez le champ nom téléchargement";header("Location:upload-telechargement.php");}