<?php session_start();

require 'boutique0.php';
if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){
		if(isset($_POST['image']) AND !empty($_POST['image'])){

$nameF=htmlspecialchars($_POST['nameF']);
if($_FILES['video']['error']>0){ 
	$_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE LA VIDEO ou REESSAYER";
	header("Location: videos-upload.php");
}
$extension_valide = array('mp4','MP4');
$extension_upload=strtolower( substr(strrchr($_FILES['video']['name'], '.') ,1) );
$fichier=$nameF.'.'.$extension_upload;
if (in_array($extension_upload, $extension_valide)){
	$req1=$bdd->prepare('SELECT * FROM video WHERE nom=?');
	$req1->execute(array($fichier));
	$video_exist=$req1->fetch();
	if(isset($video_exist['nom']) AND !empty($video_exist['nom'])){
		$_SESSION['message']="L'image existe déjà"; header("Location: videos-upload.php");
	} else {
		//changer jpeg en jpg
if($extension_upload=='MP4'){
	$extension_upload='mp4';
}

//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/{$nameF}.{$extension_upload}";
$nameF.='.';
$nameF.=$extension_upload;
$resultat=move_uploaded_file($_FILES['video']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";}
$image0=$_POST['image'];
$req=$bdd->prepare('INSERT INTO video(image0, nom, description) VALUES(:image0, :nom, :description)');
$req->execute(array('image0'=>$image0,
					'nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description'])));

chmod("../publicimgs/$nameF", 0766);


$_SESSION['message']="Vidéo uploadé";

header("Location: videos-upload.php");
}

} else {
	$_SESSION['message']="L'extension de votre fichier n'est pas bonne où votre fichier est trop grand...";
	header("Location: videos-upload.php");
	
}
		}else{$_SESSION['message']="Remplissez le champ image"; header("Location:videos-upload.php");}
	}else{$_SESSION['message']="Remplissez le champ description"; header("Location:videos-upload.php");}
}else{$_SESSION['message']="Remplissez le champ nom de vidéo"; header("Location:videos-upload.php");}		