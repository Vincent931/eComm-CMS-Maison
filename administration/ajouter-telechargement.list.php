<?php session_start();

require 'boutique0.php';

if(isset($_POST['afficher']) AND isset($_POST['titre']) AND isset($_POST['description']) AND isset($_POST['prix']) AND isset($_POST['quantite'])){
	if( !empty($_POST['afficher'])){
		if( !empty($_POST['titre'])) {
			if(!empty($_POST['description'])){
				if(!empty($_POST['prix'])){
					if(!empty($_POST['barre'])){
						if(!empty($_POST['quantite'])){
							if(!empty($_POST['TVA'])){
								if(!empty($_POST['livraison'])){
										if (!empty($_POST['cle_down'])) {
										$livraison=htmlspecialchars($_POST['livraison']);}
										else { $livraison="";}
										
										$poids=1000;
										
										if(!empty($_POST['promotion'])){
											$promotion=htmlspecialchars($_POST['promotion']);}
											else { $promotion="";}
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
										$afficher = htmlspecialchars($_POST['afficher']);
										$titre = $_POST['titre'];
										$description = $_POST['description'];
										$prix = htmlspecialchars($_POST['prix']);
										$TVA = htmlspecialchars($_POST['TVA']);
										$quantite = htmlspecialchars($_POST['quantite']);
										$barre=$_POST['barre'];

										if(!empty($_POST['precisiona'])){
											$precisiona=$_POST['precisiona'];}
											else{$precisiona="";}
										if(!empty($_POST['image1'])){
											$image1=htmlspecialchars($_POST['image1']);}
											else{$image1="";}
										if(!empty($_POST['image2'])){
											$image2=htmlspecialchars($_POST['image2']);}
											else{$image2="";}
										if(!empty($_POST['image3'])){
											$image3=htmlspecialchars($_POST['image3']);}
											else{$image3="";}
										if(!empty($_POST['ref_obj'])){
											$ref_obj=htmlspecialchars($_POST['ref_obj']);}
											else{$ref_obj="";}
										if(!empty($_POST['obs_url'])){
											$obs_url=htmlspecialchars($_POST['obs_url']);}
											else{$obs_url="";}

										$nom='telechargement'.$_POST['cle_down'];

										$exist='non';
										$oui='oui';
										$non='non';

										$req4=$bdd->query('SELECT * FROM produits WHERE (nom) LIKE "%telechargement%" ORDER BY id');
										while($donnees4=$req4->fetch()){
										if(isset($donnees4['nom']) AND !empty($donnees4['nom'])){

											$exist='oui';

											$req6=$bdd->query('DELETE FROM download');
											

											$req5=$bdd->prepare('INSERT INTO download(exist) VALUES(?)');
											$req5->execute(array($oui));
										}
										}

										if($exist=='non'){

											$req6=$bdd->query('DELETE FROM download');

											$req5=$bdd->prepare('INSERT INTO download(exist) VALUES(?)');
											$req5->execute(array($oui));
										}

										$req = $bdd->prepare('INSERT INTO produits(ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
										$req->execute(array($ref_obj, $obs_url, $nom, $afficher, $img_type, $cle_image, $titre, $description, $prix, $barre, $TVA, $promotion, $quantite, $livraison, $poids));
										
										$req3=$bdd->prepare('SELECT id FROM produits WHERE nom=?');
										$req3->execute(array($nom));
										$donnees=$req3->fetch();
										
										$id=$donnees['id'];
										
										$req2=$bdd->prepare('INSERT INTO explications(id_produit, precisiona, image1, image2, image3) VALUES(?, ?, ?, ?, ?)');
										$req2->execute(array(htmlspecialchars($donnees['id']), $precisiona, $image1, $image2, $image3));
										
										if(isset($req4)){$req4->closeCursor();}
										if(isset($req5)){$req5->closeCursor();}
										if(isset($req6)){$req6->closeCursor();}
										if(isset($req)){$req->closeCursor();}
										if(isset($req2)){$req2->closeCursor();}
										if(isset($req3)){$req3->closeCursor();}

										$_SESSION['message']='Produit ajouté à la base de données';
										
								}else{$_SESSION['message']='Vous devez remplir le champs Livraison';}
							}else {$_SESSION['message']='Vous devez remplir le champx Taux TVA';}
						} else {$_SESSION['message']='Vous devez remplir le champ Quantité';}
					} else {$_SESSION['message']='Vous devez remplir le champ Prix Barré';}
				} else {$_SESSION['message']='Vous devez remplir le champ Prix';}
			} else {$_SESSION['message']='Vous devez remplir le champ Description';}
		} else {$_SESSION['message']='Vous devez remplir le champ Titre';}
	} else {$_SESSION['message']='Vous devez remplir le champ Afficher par oui ou non';}
} else {$_SESSION['message']='Le formulaire est corrompu';}
header("Location: ajouter-telechargement.php");

