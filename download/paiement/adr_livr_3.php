<?php
$req=$bdd->prepare('UPDATE compte SET nom_livr=:nnom_livr, prenom_livr=:nprenom_livr, societe_livr=:nsociete_livr, adresse1_livr=:nadresse1_livr, adresse2_livr=:nadresse2_livr, code_postal_livr=:ncode_postal_livr, ville_livr=:nville_livr, stateOrProvince_livr=:nstateOrProvince_livr, pays_livr=:npays_livr, pays_livr_string=:npays_livr_string WHERE mail=:nmail_livr');
								$req->execute(array('nnom_livr'=>$nom_livr, 'nprenom_livr'=>$prenom_livr, 'nsociete_livr'=>$societe_livr, 'nadresse1_livr'=>$adresse1_livr, 'nadresse2_livr'=>$adresse2_livr,'ncode_postal_livr'=>$code_postal_livr, 'nville_livr'=>$ville_livr, 'nstateOrProvince_livr'=>$province_livr,'npays_livr'=>$pays_livr, 'npays_livr_string'=>$pays1, 'nmail_livr'=>$_SESSION['mail']));
								$req->closeCursor();
								//cas des livraisons internationales
								$i=0;
								$total=0;
								$nv_grand_total=0;
								$nv_poids=0;

								$req2=$bdd->prepare('SELECT titre, quantite, sous_total FROM commande WHERE reference=?');
								$req2->execute(array($_SESSION['reference']));
								while($com=$req2->fetch())
								{
								$livraison[0]=0;
								$poids_tot[0]=0;
								$i++;
								$titre=htmlspecialchars($com['titre']);
								$quantite=htmlspecialchars($com['quantite']);
								//recuperer le prix au kg
								$req151=$bdd->query('SELECT * FROM pays1');
								$donnees151=$req151->fetch();
								$req152=$bdd->query('SELECT * FROM pays2');
								$donnees152=$req152->fetch();
								$req153=$bdd->query('SELECT * FROM pays3');
								$donnees153=$req153->fetch();
								$req154=$bdd->query('SELECT * FROM pays4');
								$donnees154=$req154->fetch();
								$req155=$bdd->query('SELECT * FROM pays5');
								$donnees155=$req155->fetch();
								$req156=$bdd->query('SELECT * FROM pays6');
								$donnees156=$req156->fetch();
								$req157=$bdd->query('SELECT * FROM pays7');
								$donnees157=$req157->fetch();
								$req158=$bdd->query('SELECT * FROM pays8');
								$donnees158=$req158->fetch();
								$req159=$bdd->query('SELECT * FROM pays9');
								$donnees159=$req159->fetch();
								$req160=$bdd->query('SELECT * FROM pays10');
								$donnees160=$req160->fetch();

								if(isset($donnees151[$pays_livr]) AND !empty($donnees151[$pays_livr])){
								
								$prix_kg=$donnees151[$pays_livr];
								
								} elseif(isset($donnees152[$pays_livr]) AND !empty($donnees152[$pays_livr])){

									$prix_kg=$donnees152[$pays_livr];

								} elseif(isset($donnees153[$pays_livr]) AND !empty($donnees153[$pays_livr])){

									$prix_kg=$donnees153[$pays_livr];

								} elseif(isset($donnees154[$pays_livr]) AND !empty($donnees154[$pays_livr])){

									$prix_kg=$donnees154[$pays_livr];

								} elseif(isset($donnees155[$pays_livr]) AND !empty($donnees155[$pays_livr])){

									$prix_kg=$donnees155[$pays_livr];

								} elseif(isset($donnees156[$pays_livr]) AND !empty($donnees156[$pays_livr])){

									$prix_kg=$donnees156[$pays_livr];

								} elseif(isset($donnees157[$pays_livr]) AND !empty($donnees157[$pays_livr])){

									$prix_kg=$donnees157[$pays_livr];

								} elseif(isset($donnees158[$pays_livr]) AND !empty($donnees158[$pays_livr])){

									$prix_kg=$donnees158[$pays_livr];

								} elseif(isset($donnees159[$pays_livr]) AND !empty($donnees159[$pays_livr])){

									$prix_kg=$donnees159[$pays_livr];

								} elseif(isset($donnees160[$pays_livr]) AND !empty($donnees160[$pays_livr])){

									$prix_kg=$donnees160[$pays_livr];

								}
								$req1=$bdd->prepare('SELECT poids FROM produits WHERE titre=?');
								$req1->execute(array($titre));
								$donnees=$req1->fetch();
								$poids=$donnees['poids'];
								$poids_tot[$i]=$poids*$quantite;
								$livraison[$i]=$prix_kg*$poids_tot[$i]/1000;
								$total+=$livraison[$i];
								
								//totaux
								$sous_total[$i]=$com['sous_total'];
								$nv_grand_total+=$sous_total[$i];
								$nv_poids+=$poids_tot[$i];	
								}
								$oui='oui';
								//somme des livraisons + somme des sous_totaux
								$nv_grand_total+=$total;
								$nv_total_forme=number_format($nv_grand_total,2,'.','');
								$livraison_forme=number_format($total,2,'.','');
								//update commande grand_total et livraison
								$req4=$bdd->prepare('UPDATE commande SET livr_inter=:livr_inter, livraison=:livraison, grand_total=:grand_total, poids=:poids WHERE reference=:reference');
								$req4->execute(array('livr_inter'=>$oui,'livraison'=>$livraison_forme, 'grand_total'=>$nv_total_forme, 'poids'=>$nv_poids, 'reference'=>$_SESSION['reference']));
								$_SESSION['livraison']=$total;
								
