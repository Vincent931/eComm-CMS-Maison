<?php session_start();

require 'boutique0.php';

if(isset($_POST['afficher']) AND isset($_POST['titre']) AND isset($_POST['description']) AND isset($_POST['prix']) AND isset($_POST['quantite'])){
	if( !empty($_POST['cle_image'])) {
		if( !empty($_POST['afficher'])){
			if( !empty($_POST['titre'])) {
				if(!empty($_POST['description'])){
					if(!empty($_POST['prix'])){
						if(!empty($_POST['quantite'])){
							if(!empty($_POST['TVA'])){
								if(!empty($_POST['livraison'])){
									$livraison=htmlspecialchars($_POST['livraison']);}
									else { $livraison="";}
								if(!empty($_POST['poids'])){
									$poids=htmlspecialchars($_POST['poids']);}
									else { $poids="";}
								if(!empty($_POST['promotion'])){
									$promotion=htmlspecialchars($_POST['promotion']);}
									else { $promotion="";}
								$afficher = htmlspecialchars($_POST['afficher']);
								if($_POST['inp_vid_img']=="imgsrc"){
										$cle_image=$_POST['cle_image'];
										$img_type="image";
									}
								$titre = $_POST['titre'];
								$description = $_POST['description'];
								$prix = htmlspecialchars($_POST['prix']);
								$barre=$_POST['barre'];
								$TVA = htmlspecialchars($_POST['TVA']);
								$quantite = htmlspecialchars($_POST['quantite']);
								$ref_obj=$_POST['ref_obj'];
								$obs_url="libreP";
								if(isset($_POST['id']) AND !empty($_POST['id'])){
									$id_modifier=$_POST['id'];
								}
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
								
								$categorie=$_POST['categorie'];
							
								$req4=$bdd->query('SELECT * FROM produits WHERE obs_url LIKE \'libreP\'');
								$exists=$req4->rowCount();
								if ($exists<1){
								$req = $bdd->prepare('INSERT INTO produits(ref_obj, obs_url, nom, afficher, img_type, cle_image, titre, description, prix, barre, TVA, promotion, quantite, livraison, poids, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
								$req->execute(array($ref_obj, $obs_url, $categorie, $afficher, $img_type, $cle_image, $titre, $description, $prix, $barre, $TVA, $promotion, $quantite, $livraison, $poids));
								
								$req3=$bdd->prepare('SELECT id FROM produits WHERE titre=?');
								$req3->execute(array($titre));
								$donnees=$req3->fetch();
								
								$id=htmlspecialchars($donnees['id']);
								
								$req2=$bdd->prepare('INSERT INTO explications(id_produit, precisiona, image1, image2, image3) VALUES(?, ?, ?, ?, ?)');
								$req2->execute(array(htmlspecialchars($donnees['id']), $precisiona, $image1, $image2, $image3));
								
								$req->closeCursor();
								$req3->closeCursor();
								$req2->closeCursor();

								$_SESSION['message']='Produit ajouté à la base de données';

								} elseif($exists>=1){

								$req=$bdd->prepare('UPDATE produits SET ref_obj=:ref_obj, obs_url=:obs_url, nom=:nom, afficher=:afficher, img_type=:img_type, cle_image=:cle_image, titre=:titre, description=:description, prix=:prix, barre=:barre, TVA=:TVA, promotion=:promotion, quantite=:quantite, livraison=:livraison, poids=:poids WHERE id=:id_modifier');

								$req->execute(array('ref_obj'=>$ref_obj, 'obs_url'=>$obs_url, 'nom'=>$categorie, 'afficher'=>$afficher, 'img_type'=>$img_type, 'cle_image'=>$cle_image, 'titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'barre'=>$barre, 'TVA'=>$TVA, 'promotion'=>$promotion, 'quantite'=>$quantite, 'livraison'=>$livraison, 'poids'=>$poids, 'id_modifier'=>$id_modifier));
						
								$req2=$bdd->prepare('UPDATE explications SET precisiona=:precisiona, image1=:image1, image2=:image2, image3=:image3 WHERE id_produit=:id_produit');
								$req2->execute(array('precisiona'=>$precisiona, 'image1'=>$image1, 'image2'=>$image2, 'image3'=>$image3, 'id_produit'=>$id_modifier));

								$req->closeCursor();
								$req2->closeCursor();

								$_SESSION['message']='Valeur d\'affichage modifiée id N°'.$id_modifier.'';

								}
								$req4->closeCursor();

							}else {$_SESSION['message']='Vous devez remplir le champx Taux TVA';}
						} else {$_SESSION['message']='Vous devez remplir le champ Quantité';}
					} else {$_SESSION['message']='Vous devez remplir le champ Prix';}
				} else {$_SESSION['message']='Vous devez remplir le champ Description';}
			} else {$_SESSION['message']='Vous devez remplir le champ Titre';}
		} else {$_SESSION['message']='Vous devez remplir le champ Afficher par oui ou non';}
	} else {$_SESSION['message']='Vous devez remplir le champ Nom-image';}
} else {$_SESSION['message']='Le formulaire est corrompu';}
header("Location: ajouter-produit-libre.php");
