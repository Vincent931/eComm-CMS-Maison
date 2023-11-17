<?php session_start();

require 'boutique0.php';

if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){

$nameF=htmlspecialchars($_POST['nameF']);
if($_FILES['image']['error']>0){ $_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE L'IMAGE ou REESSAYER";
header("Location: charger-pdf.php");
}
$extension_valide = array('svg');
$extension_upload=strtolower( substr(strrchr($_FILES['image']['name'], '.') ,1) );

if (in_array($extension_upload, $extension_valide)){
	
$intitule="svg";
//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/{$nameF}.{$extension_upload}";

$nameF.='.';
$nameF.=$extension_upload;
$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";}

$req1=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req1->execute(array($intitule));
$donnees=$req1->fetch();

if(isset($donnees['nom']) AND !empty($donnees['nom'])){

$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
$req->execute(array('nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description']),
					'intitule'=>$intitule));

if($donnees['nom']!=$nameF){
unlink('../publicimgs/'.$donnees['nom']);
}

} else{ 

$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
$req->execute(array('intitule'=>$intitule,
					'nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description'])));

}


chmod("../publicimgs/$nameF", 0644);
header("Location: bitpay-ch.php");
} else {
	$_SESSION['message']="L'extension de votre fichier n'est pas bonne";
	header("Location: bitpay-ch.php");
}

	}else{$_SESSION['message']="Remplissez le champ description"; header("Location:bitpay-ch.php");}
}else{$_SESSION['message']="Remplissez le champ nom de svg"; header("Location:bitpay-ch.php");}	