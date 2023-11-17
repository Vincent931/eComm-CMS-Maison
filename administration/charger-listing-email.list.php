<?php session_start();

if($_FILES['listing']['error']>0){ $_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE L'IMAGE ou REESSAYER";
header("Location: charger-listing-email.php");
}
$extension_valide = array('txt');
$extension_upload=strtolower( substr(strrchr($_FILES['listing']['name'], '.') ,1) );

if (in_array($extension_upload, $extension_valide)){

//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/listing@.txt";
$resultat=move_uploaded_file($_FILES['listing']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";} else{
	$_SESSION['message']="Erreur, vérifier les permissions pour lez dossier publicimgs (écriture pour others-777((vous devez remettre en 644 après opération)))";
}

chmod($nom, 0644);

}
header("Location: charger-listing-email.php");
