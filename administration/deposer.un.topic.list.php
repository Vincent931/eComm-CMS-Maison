<?php session_start();

if (!empty($_POST['titre_envoi']) AND !empty($_POST['contenu_envoi']))
			{
					$titre = htmlspecialchars($_POST['titre_envoi']);
					$contenu = htmlspecialchars($_POST['contenu_envoi']);
					$couleurT=$_POST['couleurT'];
					$couleurS=$_POST['couleurS'];
					if($_POST['inp_vid_img']=="imgsrc"){
						$cle_image=$_POST['cle_image'];
						$img_type="image";
					}
					if($_POST['inp_vid_img']=="video_you"){
						$cle_image=$_POST['cle_vid_you'];
						$img_type="youtube";
					}
					if($_POST['inp_vid_img']=="video"){
						$cle_image=$_POST['cle_vid'];
						$img_type="video";
					}
					$image=$_POST['cle_image'];

					require 'blog2.php';
					
					//écriture du billet avec prepare
					$req = $bdd2->prepare('INSERT INTO topics(image, img_type, titre1, contenu1, couleurT, couleurS, date_creation) VALUES (?, ?, ?, ?, ?, ?, NOW())');
					$req->execute(array($image, $img_type, $titre, $contenu, $couleurT, $couleurS));
					$req->closeCursor();
					header("Location: modification-sujet.php");
					
			} else { $_SESSION['erreur']='Vous devez remplir tous les champs'; 
		header("Location: deposer.un.topic.php"); }
?>