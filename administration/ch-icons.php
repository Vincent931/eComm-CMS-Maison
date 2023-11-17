<?php session_start(); 

require 'boutique0.php';

if($_FILES['image']['error']>0){ $_SESSION['message']="ERREUR DE TRANSFERT, VERIFIER LA TAILLE DE L'IMAGE OU REESSAYER";
header("Location: icones-bandeau.php");
}

$extension_valide = array('jpg','png');
$extension_upload=strtolower( substr(strrchr($_FILES['image']['name'], '.') ,1) );
if (in_array($extension_upload, $extension_valide)){
//contact
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='contact'){
		$int="contact";

		$nameF='contact';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));
	
		} else {

			$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
		}					
	header("Location: icones-bandeau.php");
}
//icone	
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='icone'){
	$int="icone";

	$nameF='icone';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);

	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));
	
		} else {

			$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
		}					
	header("Location: icones-bandeau.php");
}
//label de facture
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='labelF'){
	if($extension_upload == "png"){
	$int="labelF";

	$nameF='logo';
	$nameBEF='logo';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs / et/admin
	$nom="../logo.".$extension_upload;
	$nom2="../publicimgs/logo.".$extension_upload;
	$nom3="logo.".$extension_upload;

	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom2);

	if($resultat){$_SESSION['message']="Chargement OK.";} else {$_SESSION['message']= "error";}

	//redimensionner image uploadé
	/*if($extension_upload == 'jpg'){
		$image = imagecreatefromjpeg($nom);
	} else {
		$image = imagecreatefrompng($nom);
	}*/
	/*//données de l'image avant et après
	$width_a_corriger=imagesx($image);
	$height_a_corriger = imagesy($image);
	$width = 165;
	$height = round((165/$width_a_corriger)*$height_a_corriger);
	$image_p = imagecreatetruecolor(165, $height);
	//creation de la nouvelle image
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_a_corriger, $height_a_corriger);
	*/
	//enregistrement de l'image labelF
	/*if($extension_upload == 'png'){
	imagepng($image_p, "../publicimgs/".$nameBEF.".".$extension_upload);
	copy($nameBEF.".".$extension_upload, "../".$nameBEF.".".$extension_upload);
	}*/
		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		} else {
			$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
		}
	header("Location: icones-bandeau.php");
	}else {$_SESSION['message']="Vous devez télécharger une image .png pour le label facture."; header("Location:icones-bandeau.php");}
}
//bandeau	
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='bandeau'){
	$int="bandeau";
	$int2="bandeau-mail";

	$nameF='bandeau';
	$nameBEF='bandeau';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";} else {echo "error";}

	//redimensionner image uploadé
	if($extension_upload=='jpg'){
	$image = imagecreatefromjpeg($nom);
	} else {
		$image = imagecreatefrompng($nom);
	}

	//données de l'image avant et après
	$width_a_corriger=imagesx($image);
	$height_a_corriger = imagesy($image);
	$width = 300;
	$height = round((300/$width_a_corriger)*$height_a_corriger);
	$image_p = imagecreatetruecolor(300, $height);
	//creation de la nouvelle image
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_a_corriger, $height_a_corriger);

	//enregistrement de l'image bandeau-mail
	if($extension_upload=='jpg'){
	imagejpeg($image_p, "../publicimgs/".$nameBEF."-mail.".$extension_upload);
	}
	if($extension_upload=='png'){
	imagepng($image_p, "../publicimgs/".$nameBEF."-mail.".$extension_upload);
	}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){


		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		$req1=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req1->execute(array('nom'=>$nameBEF."-mail.".$extension_upload, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int2));
				
		} else {
					$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
					$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
				
					$req1=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
					$req1->execute(array('intitule'=>$int2, 'nom'=>$nameBEF."-mail.".$extension_upload, 'description'=>$_POST['description']));
		}

	header("Location: icones-bandeau.php");
}
//caddie
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='caddie'){
	$int="caddie";

	$nameF='caddie';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		} else {
					$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
					$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
				}
	header("Location: icones-bandeau.php");
}
//monnaie	
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='monnaie'){
	$int="monnaie";

	$nameF='monnaie';
//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		} else {
					$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
					$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
				}
	header("Location: icones-bandeau.php");
}
//comments
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='comments'){
	$int='comments';

	$nameF='comments';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/{$nameF}.{$extension_upload}";
	$nameF.='.';
	$nameF.=$extension_upload;
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		} else {
			$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
		}

	header("Location: icones-bandeau.php");
}
//accueil
if(isset($_POST['changerImage']) AND $_POST['changerImage']=='accueil'){
	$int='accueil';

	$nameF='accueil.png';
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/accueil.png";
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){$_SESSION['message']="Chargement OK.";}

		$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req2->execute(array($int));
		$donnees2=$req2->fetch();
		if(isset($donnees2['intitule']) AND !empty($donnees2['intitule'])){

		$req=$bdd->prepare('UPDATE image SET nom=:nom, description=:description WHERE intitule=:intitule');
		$req->execute(array('nom'=>$nameF, 'description'=>htmlspecialchars($_POST['description']), 'intitule'=>$int));

		} else {
			$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req->execute(array('intitule'=>$int, 'nom'=>$nameF, 'description'=>$_POST['description']));
		}

	header("Location: icones-bandeau.php");
}

} else {$_SESSION['message']="L'extension de votre fichier n'est pas bonne";
header("Location: icones-bandeau.php");
}

?>