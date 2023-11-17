<?php session_start();

require 'boutique0.php';
if(isset($_POST['afficher']) AND isset($_POST['titre']) AND isset($_POST['description']) AND isset($_POST['prix']) AND isset($_POST['quantite'])){
	if( !empty($_POST['ref_obj'])) {
		if( !empty($_POST['obs_url'])) {
			if( !empty($_POST['afficher'])){
				if( !empty($_POST['titre'])) {
					if(!empty($_POST['description'])){
						if(!empty($_POST['prix'])){
							if(!empty($_POST['barre'])){
								if(!empty($_POST['quantite'])){
									if(!empty($_POST['TVA'])){
											if(!empty($_POST['livraison'])){
												$livraison=htmlspecialchars($_POST['livraison']);}
												else { $livraison="";}
											if(!empty($_POST['poids'])){
												$poids=htmlspecialchars($_POST['poids']);}
												else { $poids="";}
											if(!empty($_POST['promotion'])){
												$promotion=$_POST['promotion'];}
												else { $promotion="";}
											//Video image ou youtube
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
											
											$afficher = $_POST['afficher'];
											
											$titre = htmlspecialchars($_POST['titre']);
											$description = htmlspecialchars($_POST['description']);
											$prix = htmlspecialchars($_POST['prix']);
											$TVA = htmlspecialchars($_POST['TVA']);
											$quantite = htmlspecialchars($_POST['quantite']);
											
											$barre=$_POST['barre'];
											$ref_obj=$_POST['ref_obj'];
											$obs_url=$_POST['obs_url'];
											if(!empty($_POST['precisiona'])){
												$precisiona=htmlspecialchars($_POST['precisiona']);}
												else{$precisiona="";}
											if(!empty($_POST['image1'])){
												$image1=htmlspecialchars($_POST['image1']);}
												else{$image1="";}
											if(!empty($_POST['image2'])){
												$image2=htmlspecialchars($_POST['image2']);}
												else{$image2="";}

											$nom='prod_solo';
											$image3="";
											
											$req=$bdd->prepare('SELECT * FROM produits WHERE nom=?');
											$req->execute(array($nom));
											$donnees=$req->fetch();

											if(isset($donnees['nom']) AND $donnees['nom']=='prod_solo'){

											
											$id_produit=$donnees['id'];
											$date_creation=$donnees['date_creation'];

											$req1=$bdd->prepare('UPDATE produits SET ref_obj=:ref_obj,obs_url=:obs_url, nom=:nom, afficher=:afficher, img_type=:img_type, cle_image=:cle_image, titre=:titre, description=:description, prix=:prix, barre=:barre, TVA=:TVA, promotion=:promotion, quantite=:quantite, livraison=:livraison, poids=:poids WHERE nom=:nom');

											$req1->execute(array('ref_obj'=>$ref_obj, 'obs_url'=>$obs_url, 'nom'=>$nom, 'afficher'=>$afficher, 'img_type'=>$img_type, 'cle_image'=>$cle_image, 'titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'barre'=>$barre, 'TVA'=>$TVA, 'promotion'=>$promotion, 'quantite'=>$quantite, 'livraison'=>$livraison, 'poids'=>$poids, 'nom'=>$nom));
									
											$req2=$bdd->prepare('UPDATE explications SET precisiona=:precisiona, image1=:image1, image2=:image2, image3=:image3 WHERE id_produit=:id_produit');
											$req2->execute(array('precisiona'=>$precisiona, 'image1'=>$image1, 'image2'=>$image2, 'image3'=>$image3, 'id_produit'=>$id_produit));
											
											$req3=$bdd->prepare('UPDATE prod_solo SET afficher=:afficher');
											$req3->execute(array('afficher'=>$afficher));

											} else {

											$req1 = $bdd->prepare('INSERT INTO produits(ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
											$req1->execute(array($ref_obj, $obs_url, $nom, $afficher, $img_type, $cle_image, $titre, $description, $prix, $barre, $TVA, $promotion, $quantite, $livraison, $poids));

											$req4=$bdd->query('SELECT id FROM produits WHERE nom=\'prod_solo\'');
											$donnees2=$req4->fetch();
											$id_produit=$donnees2['id'];

											$req2=$bdd->prepare('INSERT INTO explications(id_produit, precisiona, image1, image2, image3) VALUES(?, ?, ?, ?, ?)');
											$req2->execute(array($id_produit, $precisiona, $image1, $image2, $image3));

											$req3=$bdd->prepare('INSERT INTO prod_solo(afficher) VALUES(?)');
											$req3->execute(array($afficher));
											
											}

											$req->closeCursor();
											$req1->closeCursor();
											$req2->closeCursor();

											$_SESSION['message']='Produit ajouté à la base de données';

									}else {$_SESSION['message']='Vous devez remplir le champx Taux TVA';}
								} else {$_SESSION['message']='Vous devez remplir le champ Quantité';}
							} else {$_SESSION['message']='Vous devez remplir le champ Prix Barré';}	
						} else {$_SESSION['message']='Vous devez remplir le champ Prix';}
					} else {$_SESSION['message']='Vous devez remplir le champ Description';}
				} else {$_SESSION['message']='Vous devez remplir le champ Titre';}
			} else {$_SESSION['message']='Vous devez remplir champs Afficher, (oui/non)';}
		} else {$_SESSION['message']='Vous devez remplir le champ Observations (ex:url)';}
	} else {$_SESSION['message']='Vous devez remplir le champ Reference_objet';}
} else {$_SESSION['message']='Le formulaire est corrompu';}		
header("Location: product-plus-ch.php");