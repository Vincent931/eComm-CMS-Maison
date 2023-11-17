<?php session_start();

require 'boutique0.php';

if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){

$nameF=htmlspecialchars($_POST['nameF']);
if($_FILES['music']['error']>0){ 
	$_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE L'ENREGISTREMENT' ou REESSAYER";
	header("Location: music-upload.php");
}
$extension_valide = array('mp3','MP3');
$extension_upload=strtolower( substr(strrchr($_FILES['music']['name'], '.') ,1) );
$fichier=$nameF.'.'.$extension_upload;
if (in_array($extension_upload, $extension_valide)){
	$req1=$bdd->prepare('SELECT * FROM music WHERE nom=?');
	$req1->execute(array($fichier));
	$music_exist=$req1->fetch();
	if(isset($music_exist['nom']) AND !empty($music_exist['nom'])){
		$_SESSION['message']="L'enregistrement existe déjà"; header("Location: music-upload.php");
	} else {
		//changer jpeg en jpg
if($extension_upload=='MP3'){
	$extension_upload='mp3';
}

//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/{$nameF}.{$extension_upload}";
$nameF.='.';
$nameF.=$extension_upload;
$resultat=move_uploaded_file($_FILES['music']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";}

$req=$bdd->prepare('INSERT INTO music(nom, description) VALUES(:nom, :description)');
$req->execute(array('nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description'])));

chmod("../publicimgs/$nameF", 0644);


$_SESSION['message']="Enregistrement uploadé";

header("Location: music-upload.php");
}

} else {
	$_SESSION['message']="L'extension de votre fichier n'est pas bonne où votre fichier est trop grand...";
	header("Location: music-upload.php");
	
}
	}else{$_SESSION['message']="Remplissez le champ description";header("Location:music-upload.php");}
}else{$_SESSION['message']="Remplissez le champ nom de MP3";header("Location:music-upload.php");}	