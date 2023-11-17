<?php session_start();
require 'texte1.php';
if(isset($_POST['subject']) AND !empty($_POST['subject'])){
	$sujet=$_POST['subject'];
	if(isset($_POST['contenu']) AND !empty($_POST['contenu'])){
	$contenu=$_POST['contenu'];
		if(isset($_POST['nameF']) AND !empty($_POST['nameF'])){

			$nameF=htmlspecialchars($_POST['nameF']);
			$extension_upload=strtolower( substr(strrchr($nameF, '.') ,1) );
			//transfert du fichier temporaire vers repertoire du serveur
			//dossier publicimgs
			$nom="../publicimgs/$nameF";
			
			$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
			if($resultat){$_SESSION['message']="Chargement OK.";}
			

			chmod("../publicimgs/$nameF", 0766);

			if($extension_upload=='jpg'){
			$image = imagecreatefromjpeg("../publicimgs/".$nameF);
			} else {
				$image = imagecreatefrompng("../publicimgs/".$nameF);
			}
			//données de l'image avant et après
			$width_a_corriger=imagesx($image);
			$height_a_corriger = imagesy($image);
			$width = 300;
			$height = round((300/$width_a_corriger)*$height_a_corriger);
			$image_p = imagecreatetruecolor(300, $height);
			//creation de la nouvelle image
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_a_corriger, $height_a_corriger);

			//enregistrement de l'image
			if($extension_upload=='jpg'){
			imagejpeg($image_p, "../publicimgs/".$nameF);
			}
			if($extension_upload=='png'){
			imagepng($image_p, "../publicimgs/".$nameF);
			}
			
			//bdd
			$req1=$bdd1->query('SELECT * FROM campagne');
			$donnees1=$req1->fetch();
			if(isset($donnees1['subject']) AND !empty($donnees1['subject'])){
			$req=$bdd1->prepare('UPDATE campagne SET contenu=:contenu, subject=:subject, image=:image');
			$req->execute(array('contenu'=>$contenu, 'subject'=>$sujet, 'image'=>$nameF));

			}else{

			$req=$bdd1->prepare('INSERT INTO campagne(contenu, subject, image) VALUES(:contenu, :subject, :image)');
			$req->execute(array('contenu'=>$contenu, 'subject'=>$sujet, 'image'=>$nameF));
			} $_SESSION['message']="Chargement OK";
		} else {

				$image="";
				//bdd
				$req1=$bdd1->query('SELECT * FROM campagne');
				$donnees1=$req1->fetch();
				if(isset($donnees1['subject']) AND !empty($donnees1['subject'])){
				$req=$bdd1->prepare('UPDATE campagne SET contenu=:contenu, subject=:subject, image=:image');
				$req->execute(array('contenu'=>$contenu, 'subject'=>$sujet, 'image'=>$image));

				}else{

				$req=$bdd1->prepare('INSERT INTO campagne(contenu, subject, image) VALUES(:contenu, :subject, :image)');
				$req->execute(array('contenu'=>$contenu, 'subject'=>$sujet, 'image'=>$image));
				}
		}//fermeture du $_post['nameF']
	} else {$_SESSION['message']="Contenu absent"; header("Location:mailing.php");}
} else{$_SESSION['message']="Sujet absent"; header("Location:mailing.php");}
header("Location:mailing.php");
