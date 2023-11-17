<?php session_start();

require 'boutique0.php';

if(isset($_POST['inp_vid_img']) AND !empty($_POST['inp_vid_img'])){
	if(isset($_POST['afficher']) AND !empty($_POST['afficher'])){
		if(isset($_POST['titre']) AND !empty($_POST['titre'])) {
			if(isset($_POST['description']) AND !empty($_POST['description'])){
				if(isset($_POST['prix']) AND !empty($_POST['prix'])) {
					if(isset($_POST['barre']) AND !empty($_POST['barre'])) {
						if(isset($_POST['quantite']) AND !empty($_POST['quantite'])) {
							if(isset($_POST['TVA']) AND !empty($_POST['TVA'])) {
								if(isset($_POST['livraison']) AND !empty($_POST['livraison'])) {
									$livraison=htmlspecialchars($_POST['livraison']);}
									else { $livraison="";}
								if(isset($_POST['poids']) AND !empty($_POST['poids'])){
									$poids=htmlspecialchars($_POST['poids']);}
									else{ $poids="";}
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
								if(isset($_POST['categorie']) AND !empty($_POST['categorie'])) {
									$categorie=$_POST['categorie'];
									} else { $categorie="";}
								if(isset($_POST['ref_obj']) AND !empty($_POST['ref_obj'])){
									$ref_obj=$_POST['ref_obj'];}
									else{$ref_obj="";}
								if(isset($_POST['obs_url']) AND !empty($_POST['obs_url'])){
									$obs_url=$_POST['obs_url'];}
									else{$obs_url="";}
								//type d'image et image
								if($_POST['inp_vid_img']=="imgsrc"){
										$image=$_POST['image'];
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
							$barre=$_POST['barre'];
							if(isset($_POST['ref_obj']) AND !empty($_POST['ref_obj'])){
								$ref_obj=$_POST['ref_obj'];}
								else{$ref_obj="";}
							//librep doit rester comme tel
							$id_modifier=htmlspecialchars($_POST['id_modifier']);
							if(isset($_POST['obs_url']) AND !empty($_POST['obs_url'])){
								$obs_url=$_POST['obs_url'];}
								else{$obs_url="";}
							$req3=$bdd->query('SELECT * FROM produits WHERE obs_url LIKE \'libreP\'');
							while($donnees3=$req3->fetch()){
								if($donnees3['obs_url']=='libreP'){
									$idlibreP=$donnees3['id'];
								}
							}
							if($idlibreP==$id_modifier){
							$obs_url="libreP";
							}
							

							$req=$bdd->prepare('UPDATE produits SET ref_obj=:ref_obj, obs_url=:obs_url, nom=:nom, afficher=:afficher, img_type=:img_type, cle_image=:cle_image, titre=:titre, description=:description, prix=:prix, barre=:barre, TVA=:TVA, promotion=:promotion, quantite=:quantite, livraison=:livraison, poids=:poids WHERE id=:id_modifier');

							$req->execute(array('ref_obj'=>$ref_obj, 'obs_url'=>$obs_url, 'nom'=>$categorie, 'afficher'=>$afficher, 'img_type'=>$img_type, 'cle_image'=>$image, 'titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'barre'=>$barre, 'TVA'=>$TVA, 'promotion'=>$promotion, 'quantite'=>$quantite, 'livraison'=>$livraison, 'poids'=>$poids, 'id_modifier'=>$id_modifier));
							
							$req2=$bdd->prepare('UPDATE explications SET precisiona=:precisiona, image1=:image1, image2=:image2, image3=:image3 WHERE id_produit=:id_produit');
							$req2->execute(array('precisiona'=>$precisiona, 'image1'=>$image1, 'image2'=>$image2, 'image3'=>$image3, 'id_produit'=>$id_modifier));

							$req->closeCursor();
							$req2->closeCursor();

							$_SESSION['message']='Valeur d\'affichage modifiée id N°'.$id_modifier.'';

							} else { $_SESSION['message']='Veuillez remplir le champs Taux TVA avant de valider le formulaire';}
						} else { $_SESSION['message']='Veuillez remplir le champs Quantite avant de valider le formulaire.';}
					} else { $_SESSION['message']='Veuillez remplir le champs Prix Barré avant de valider le formulaire.';}	
				} else { $_SESSION['message']='Veuillez remplir le champs Prix avant de valider le formulaire.';}
			} else { $_SESSION['message']='Veuillez remplir le champs Description avant de valider le formulaire.';}
		} else { $_SESSION['message']='Veuillez remplir le champs Titre avant de valider le formulaire.';}
	} else { $_SESSION['message']='Veuillez remplir le champs Afficher avant de valider le formulaire.';}
} else { $_SESSION['message']='Erreur';}
header("Location: modification-produit.php");
/*echo /* $afficher.'-'.$image.'-'.$titre.'-'.$description.'-'.$prix.'-'.$TVA.'-'.$promotion.'-'.$quantite.'-'.$livraison.'-'.$livraison_associe.'-'.$livraison_poly.'-'.$livr_inter.'-'.$poids.'-'.$id_modifier.'-'.$precisiona.'-'.$image1.'-'.$image2.'-'.$image3.'-'.$id_modifier;*/