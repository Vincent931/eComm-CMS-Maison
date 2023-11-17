<?php session_start();

require 'boutique0.php';

if(isset($_POST['afficher']) AND !empty($_POST['afficher'])){
	if(isset($_POST['titre']) AND !empty($_POST['titre'])) {
		if(isset($_POST['description'])){
			if(isset($_POST['prix']) AND !empty($_POST['prix'])) {
				if(isset($_POST['barre']) AND !empty($_POST['barre'])) {
					if(isset($_POST['quantite']) AND !empty($_POST['quantite'])) {
						if(isset($_POST['TVA']) AND !empty($_POST['TVA'])) {
							if(isset($_POST['livraison']) AND !empty($_POST['livraison'])) {
								if(isset($_POST['cle_down'])){
									if(isset($_POST['livraison']) AND !empty($_POST['livraison'])) {$livraison=htmlspecialchars($_POST['livraison']);}
									else { $livraison="";}
									$poids=0;
								if(isset($_POST['precisiona']) AND !empty($_POST['precisiona'])) {
									$precisiona=$_POST['precisiona'];}
									else { $precisiona="";}
								if(isset($_POST['image1']) AND !empty($_POST['image1'])) {
									$image1=htmlspecialchars($_POST['image1']);}
									else { $image1="";}
								if(isset($_POST['image2']) AND !empty($_POST['image2'])) {
									$image2=htmlspecialchars($_POST['image2']);}
									else { $image2="";}
								if(isset($_POST['image3']) AND !empty($_POST['image3'])) {
									$image3=htmlspecialchars($_POST['image3']);}
									else { $image3="";}
								if(isset($_POST['promotion']) AND !empty($_POST['promotion'])) {
									$promotion=htmlspecialchars($_POST['promotion']);}
									else { $promotion="";}
							//type d'image et image
								if($_POST['inp_vid_img']=="imgsrc"){
										$image=$_POST['cle_image'];
										$img_type="image";
									}
									if($_POST['inp_vid_img']=="video_you"){
										$image=$_POST['cle_vid_you'];
										$img_type="youtube";
									}
									if($_POST['inp_vid_img']=="video"){
										$image=$_POST['cle_vid'];
										$img_type="video";
									}

							$afficher=htmlspecialchars($_POST['afficher']);
							$titre=$_POST['titre'];
							$description=$_POST['description'];
							$prix=htmlspecialchars($_POST['prix']);
							$quantite=htmlspecialchars($_POST['quantite']);
							$TVA=htmlspecialchars($_POST['TVA']);
							$nom='telechargement'.$_POST['cle_down'];
							$barre=$_POST['barre'];
							$ref_obj=$_POST['ref_obj'];
							$obs_url=$_POST['obs_url'];
							$id_modifier=htmlspecialchars($_POST['id_modifier']);

							$req=$bdd->prepare('UPDATE produits SET ref_obj=:ref_obj,obs_url=:obs_url, nom=:nom, afficher=:afficher, img_type=:img_type, cle_image=:cle_image, titre=:titre, description=:description, prix=:prix, barre=:barre, TVA=:TVA, promotion=:promotion, quantite=:quantite, livraison=:livraison, poids=:poids WHERE id=:id_modifier');

							$req->execute(array('ref_obj'=>$ref_obj, 'obs_url'=>$obs_url, 'nom'=>$nom, 'afficher'=>$afficher, 'img_type'=>$img_type, 'cle_image'=>$image, 'titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'barre'=>$barre, 'TVA'=>$TVA, 'promotion'=>$promotion, 'quantite'=>$quantite, 'livraison'=>$livraison, 'poids'=>$poids, 'id_modifier'=>$id_modifier));
							
							$req2=$bdd->prepare('UPDATE explications SET precisiona=:precisiona, image1=:image1, image2=:image2, image3=:image3 WHERE id_produit=:id_produit');
							$req2->execute(array('precisiona'=>$precisiona, 'image1'=>$image1, 'image2'=>$image2, 'image3'=>$image3, 'id_produit'=>$id_modifier));

							$req->closeCursor();
							$req2->closeCursor();

							$_SESSION['message']='Valeur d\'affichage modifiée id N°'.$id_modifier.'';
								}else{ $_SESSION['message']='Veuillez remplir le champ Téléchargement avant de valider le formulaire';}
							}else{ $_SESSION['message']='Veuillez remplir le champ Livraison avant de valider le formulaire';}
						} else { $_SESSION['message']='Veuillez remplir le champs Taux TVA avant de valider le formulaire';}
					} else { $_SESSION['message']='Veuillez remplir le champs Quantite avant de valider le formulaire.';}
				} else { $_SESSION['message']='Veuillez remplir le champs Prix Barré avant de valider le formulaire.';}	
			} else { $_SESSION['message']='Veuillez remplir le champs Prix avant de valider le formulaire.';}
		} else { $_SESSION['message']='Veuillez remplir le champs Description avant de valider le formulaire.';}
	} else { $_SESSION['message']='Veuillez remplir le champs Titre avant de valider le formulaire.';}
} else { $_SESSION['message']='Veuillez remplir le champs Afficher avant de valider le formulaire.';}

header("Location: modification-telechargement.php");