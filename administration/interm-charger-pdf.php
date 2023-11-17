<?php session_start();

require 'boutique0.php';

if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){

$nameF=htmlspecialchars($_POST['nameF']);
if($_FILES['pdf']['error']>0){ $_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE L'IMAGE ou REESSAYER";
header("Location: charger-pdf.php");
}
$extension_valide = array('pdf');
$extension_upload=strtolower( substr(strrchr($_FILES['pdf']['name'], '.') ,1) );

if (in_array($extension_upload, $extension_valide)){
	

//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/{$nameF}.{$extension_upload}";

$nameF.='.';
$nameF.=$extension_upload;
$resultat=move_uploaded_file($_FILES['pdf']['tmp_name'], $nom);
if($resultat){$_SESSION['message']="Chargement OK.";}

$req1=$bdd->query('SELECT * FROM pdf');
$donnees=$req1->fetch();

if(isset($donnees['nom']) AND !empty($donnees['nom'])){

$req=$bdd->prepare('UPDATE pdf SET nom=:nom, description=:description');
$req->execute(array('nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description'])));

if($donnees['nom']!=$nameF){
unlink('../publicimgs/'.$donnees['nom']);
}

} else{ 

$req=$bdd->prepare('INSERT INTO pdf(nom, description) VALUES(:nom, :description)');
$req->execute(array('nom'=>$nameF,
					'description'=>htmlspecialchars($_POST['description'])));

}


chmod("../publicimgs/$nameF", 0644);
header("Location: charger-pdf.php");
} else {
	$_SESSION['message']="L'extension de votre fichier n'est pas bonne";
	header("Location: charger-pdf.php");
}

	}else{$_SESSION['message']="Remplissez le champ description"; header("Location:charger-pdf.php");}
}else{$_SESSION['message']="Remplissez le champ nom de pdf"; header("Location:charger-pdf.php");}	