<?php session_start();

require 'boutique0.php';

if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){
	if(isset($_POST['description']) AND !empty($_POST['description'])){

	$nameF=htmlspecialchars($_POST['nameF']);
	if($_FILES['image']['error']>0){ 
		$_SESSION['message']="ERREUR de TRANSFERT, VERIFIER LA TAILLE DE L'IMAGE ou REESSAYER";
		header("Location: charger-image.php");die();
	}
	$extension_valide = array('jpg', 'jpeg', 'png');
	$extension_upload=strtolower( substr(strrchr($_FILES['image']['name'], '.') ,1) );
	$fichier=$nameF.'.'.$extension_upload;
		if (in_array($extension_upload, $extension_valide)){
			$req1=$bdd->prepare('SELECT * FROM image WHERE nom=?');
			$req1->execute(array($fichier));
			$image_exist=$req1->fetch();
				if(isset($image_exist['nom']) AND !empty($image_exist['nom'])){
					$_SESSION['message']="L'image existe déjà"; header("Location: charger-image.php"); die();
				} 
					//changer jpeg en jpg
				if($extension_upload=='jpeg'){
					$extension_upload='jpg';}
				//transfert du fichier temporaire vers repertoire du serveur
				//dossier publicimgs
				$nom="../publicimgs/{$nameF}.{$extension_upload}";
				$nameF.='.';
				$nameF.=$extension_upload;
				$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
				if($resultat){$_SESSION['message']="Chargement OK.";}
				$int="";
				$req=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
				$req->execute(array('intitule'=>$int,
									'nom'=>$nameF,
									'description'=>htmlspecialchars($_POST['description'])));
				chmod("../publicimgs/$nameF", 0644);

				//image promo
				$source = imagecreatefrompng("../publicimgs/promo.png");
				//redimensionner image uploadé
				if($extension_upload=='jpg'){
				$image = imagecreatefromjpeg("../publicimgs/".$nameF);
				} else {
					$image = imagecreatefrompng("../publicimgs/".$nameF);
				}
				//données de l'image avant et après
				$width_a_corriger=imagesx($image);
				$height_a_corriger = imagesy($image);
				$width = 600;
				$height = round((600/$width_a_corriger)*$height_a_corriger);
				$image_p = imagecreatetruecolor(600, $height);
				//creation de la nouvelle image
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_a_corriger, $height_a_corriger);

				//enregistrement de l'image provisoire
				chmod("../publicimgs/"."promo-".$nameF, 0644);
				if($extension_upload=='jpg'){
				imagejpeg($image_p, "../publicimgs/"."promo-".$nameF);
				}
				if($extension_upload=='png'){
				imagepng($image_p, "../publicimgs/"."promo-".$nameF);
				}

				//mise en memoire de toutes les metadonnées de l'image
				if($extension_upload=='jpg'){
					$destination=imagecreatefromjpeg("../publicimgs/"."promo-".$nameF);
				}
				if($extension_upload=='png'){
					$destination=imagecreatefrompng("../publicimgs/"."promo-".$nameF);
				}

				//placement y de promo
				$coord_y=$height-150;

				//creation de l'image finale
				imagecopymerge($destination, $source, 50, $coord_y, 0, 0, 200, 104, 100);
				chmod("../publicimgs/"."promo-".$nameF, 0644);
				if($extension_upload=='jpg'){
				imagejpeg($destination, "../publicimgs/"."promo-".$nameF);
				}
				if($extension_upload=='png'){
				imagepng($destination, "../publicimgs/"."promo-".$nameF);
				}
				//insertion BDD
				$nom="promo-".$nameF;
				$description='Image Offre de vente de '.$nameF;
				$req2=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
				$req2->execute(array('intitule'=>$int,
									'nom'=>$nom,
									'description'=>$description));

				$_SESSION['message']="Image uploadée";

				header("Location: charger-image.php");
		} else {$_SESSION['message']="L'extension de votre fichier n'est pas bonne";header("Location: charger-image.php");}
	}else{$_SESSION['message']="Remplissez le champ description";header("Location:charger-image.php");}
}else{$_SESSION['message']="Remplissez le champ nom de l'image";header("Location:charger-image.php");echo $_POST['description'];}