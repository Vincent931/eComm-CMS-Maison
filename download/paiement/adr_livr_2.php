<?php           
                
                $etat='non';
                $pseudo="";
                $mdp="987123";
                $confirme=0;
                $nul="";
                //
  							$_SESSION['mail']=$mail1;
                //
                require 'pays-change.php';
                //
                if(isset($_POST['identique']) AND $_POST['identique']=='oui'){
  								if(isset($donnees['mail']) AND !empty($donnees['mail'])){
                    
  								$req=$bdd->prepare('UPDATE compte SET mail=:nmail, confirmkey=:nconfirmkey, nom=:nnom, prenom=:nprenom, societe=:nsociete, adresse1=:nadresse1, adresse2=:nadresse2, code_postal=:ncode_postal, ville=:nville, stateOrProvince=:nstateOrProvince, pays=:npays, pays_string=:npays_string, nom_livr=:nom_livr, prenom_livr=:prenom_livr, societe_livr=:societe_livr, adresse1_livr=:adresse1_livr, adresse2_livr=:adresse2_livr, code_postal_livr=:code_postal_livr, ville_livr=:ville_livr, stateOrProvince_livr=:stateOrProvince_livr, pays_livr=:pays_livr, pays_livr_string=:pays_livr_string WHERE mail=:nmail');
  								$req->execute(array('nmail'=>$mail1,'nconfirmkey'=>$key, 'nnom'=>$nom, 'nprenom'=>$prenom, 'nsociete'=>$societe, 'nadresse1'=>$adresse1, 'nadresse2'=>$adresse2,'ncode_postal'=>$code_postal, 'nville'=>$ville, 'nstateOrProvince'=>$province, 'npays'=>$pays, 'npays_string'=>$pays1, 'nom_livr'=>$nom, 'prenom_livr'=>$prenom, 'societe_livr'=>$societe, 'adresse1_livr'=>$adresse1, 'adresse2_livr'=>$adresse2, 'code_postal_livr'=>$code_postal, 'ville_livr'=>$ville, 'stateOrProvince_livr'=>$province, 'pays_livr'=>$pays, 'pays_livr_string'=>$pays1,'nmail'=>$mail1));
  								$req->closeCursor();
                                if($_POST['international']=='oui'){
                                //cas des livraisons internationales
                                require 'boutique0.php';
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

                                if(isset($donnees151[$pays]) AND !empty($donnees151[$pays])){
                                
                                $prix_kg=$donnees151[$pays];
                                
                                } elseif(isset($donnees152[$pays]) AND !empty($donnees152[$pays])){

                                    $prix_kg=$donnees152[$pays];

                                } elseif(isset($donnees153[$pays]) AND !empty($donnees153[$pays])){

                                    $prix_kg=$donnees153[$pays];

                                } elseif(isset($donnees154[$pays]) AND !empty($donnees154[$pays])){

                                    $prix_kg=$donnees154[$pays];

                                } elseif(isset($donnees155[$pays]) AND !empty($donnees155[$pays])){

                                    $prix_kg=$donnees155[$pays];

                                } elseif(isset($donnees156[$pays]) AND !empty($donnees156[$pays])){

                                    $prix_kg=$donnees156[$pays];

                                } elseif(isset($donnees157[$pays]) AND !empty($donnees157[$pays])){

                                    $prix_kg=$donnees157[$pays];

                                } elseif(isset($donnees158[$pays]) AND !empty($donnees158[$pays])){

                                    $prix_kg=$donnees158[$pays];

                                } elseif(isset($donnees159[$pays]) AND !empty($donnees159[$pays])){

                                    $prix_kg=$donnees159[$pays];

                                } elseif(isset($donnees160[$pays]) AND !empty($donnees160[$pays])){

                                    $prix_kg=$donnees160[$pays];

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
                            }
                $req2=$bdd->prepare('UPDATE commande SET acheteur=:acheteur WHERE reference=:reference AND etat=:etat');
                $req2->execute(array('acheteur'=>$mail1, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));
                header("Location:recap.php");

  								  } else { $journalise='oui';
                      $req3 = $bdd->prepare('INSERT INTO compte(pseudo, mail, motdepasse, confirmkey, confirme, nom, prenom, societe, adresse1, adresse2, code_postal, ville, stateOrProvince, pays, pays_string, nom_livr, prenom_livr, societe_livr, adresse1_livr, adresse2_livr, code_postal_livr, ville_livr, stateOrProvince_livr, pays_livr, pays_livr_string, journalise) VALUES(:pseudo, :mail, :motdepasse, :confirmkey, :confirme, :nom, :prenom, :societe, :adresse1, :adresse2, :code_postal, :ville, :stateOrProvince, :pays, :pays_string, :nom_livr, :prenom_livr, :societe_livr, :adresse1_livr, :adresse2_livr, :code_postal_livr, :ville_livr, :stateOrProvince_livr,:pays_livr, :pays_livr_string, :journalise)');
                          $req3->execute(array(
                            'pseudo'=>$pseudo,
                            'mail'=>$mail1,
                            'motdepasse'=>$mdp,
                            'confirmkey'=>$key,
                            'confirme'=>$confirme,
                            'nom'=>$nom,
                            'prenom'=>$prenom, 
                            'societe'=>$societe,
                            'adresse1'=>$adresse1,
                            'adresse2'=>$adresse2,
                            'code_postal'=>$code_postal,
                            'ville'=>$ville,
                            'stateOrProvince'=>$province,
                            'pays'=>$pays,
                            'pays_string'=>$pays1,
                            'nom_livr'=>$nom,
                            'prenom_livr'=>$prenom,
                            'societe_livr'=>$societe,
                            'adresse1_livr'=>$adresse1,
                            'adresse2_livr'=>$adresse2,
                            'code_postal_livr'=>$code_postal,
                            'ville_livr'=>$ville,
                            'stateOrProvince_livr'=>$province,
                            'pays_livr'=>$pays,
                            'pays_livr_string'=>$pays1,
                            'journalise'=>$journalise
                          ));
                    $req7=$bdd->prepare('UPDATE commande SET acheteur=:acheteur WHERE reference=:reference AND etat=:etat');
                    $req7->execute(array('acheteur'=>$mail1, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));

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

                                 if(isset($donnees151[$pays]) AND !empty($donnees151[$pays])){
                                
                                $prix_kg=$donnees151[$pays];
                                
                                } elseif(isset($donnees152[$pays]) AND !empty($donnees152[$pays])){

                                    $prix_kg=$donnees152[$pays];

                                } elseif(isset($donnees153[$pays]) AND !empty($donnees153[$pays])){

                                    $prix_kg=$donnees153[$pays];

                                } elseif(isset($donnees154[$pays]) AND !empty($donnees154[$pays])){

                                    $prix_kg=$donnees154[$pays];

                                } elseif(isset($donnees155[$pays]) AND !empty($donnees155[$pays])){

                                    $prix_kg=$donnees155[$pays];

                                } elseif(isset($donnees156[$pays]) AND !empty($donnees156[$pays])){

                                    $prix_kg=$donnees156[$pays];

                                } elseif(isset($donnees157[$pays]) AND !empty($donnees157[$pays])){

                                    $prix_kg=$donnees157[$pays];

                                } elseif(isset($donnees158[$pays]) AND !empty($donnees158[$pays])){

                                    $prix_kg=$donnees158[$pays];

                                } elseif(isset($donnees159[$pays]) AND !empty($donnees159[$pays])){

                                    $prix_kg=$donnees159[$pays];

                                } elseif(isset($donnees160[$pays]) AND !empty($donnees160[$pays])){

                                    $prix_kg=$donnees160[$pays];

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

                    $req3->closeCursor();
                    $req7->closeCursor();

                    header("Location:recap.php");
                    }
                    
                  } else {
                    if(isset($donnees['mail']) AND !empty($donnees['mail'])){
                    $req4=$bdd->prepare('UPDATE compte SET mail=:nmail, confirmkey=:nconfirmkey, nom=:nnom, prenom=:nprenom, societe=:nsociete, adresse1=:nadresse1, adresse2=:nadresse2, code_postal=:ncode_postal, ville=:nville, stateOrProvince=:nstateOrProvince, pays=:npays, pays_string=:npays_string WHERE mail=:nmail');
                    $req4->execute(array('nmail'=>$mail1,'nconfirmkey'=>$key, 'nnom'=>$nom, 'nprenom'=>$prenom, 'nsociete'=>$societe, 'nadresse1'=>$adresse1, 'nadresse2'=>$adresse2,'ncode_postal'=>$code_postal, 'nville'=>$ville, 'nstateOrProvince'=>$province, 'npays'=>$pays, 'npays_string'=>$pays1, 'nmail'=>$mail1));

                    $req5=$bdd->prepare('UPDATE commande SET acheteur=:acheteur WHERE reference=:reference AND etat=:etat');
                    $req5->execute(array('acheteur'=>$mail1, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));

                    $req4->closeCursor();
                    $req5->closeCursor();

                    } else {
                          $req6 = $bdd->prepare('INSERT INTO compte(pseudo, mail, motdepasse, confirmkey, confirme, nom, prenom, societe, adresse1, adresse2, code_postal, ville, stateOrProvince, pays, pays_string, nom_livr, prenom_livr, societe_livr, adresse1_livr, adresse2_livr, code_postal_livr, ville_livr, stateOrProvince_livr, pays_livr, pays_livr_string) VALUES(:pseudo, :mail, :motdepasse, :confirmkey, :confirme, :nom, :prenom, :societe, :adresse1, :adresse2, :code_postal, :ville, :stateOrProvince, :pays, :pays_string, :nom_livr, :prenom_livr, :societe_livr, :adresse1_livr, :adresse2_livr, :code_postal_livr, :ville_livr, :stateOrProvince_livr,:pays_livr, :pays_livr_string)');
                          $req6->execute(array(
                            'pseudo'=>$pseudo,
                            'mail'=>$mail1,
                            'motdepasse'=>$mdp,
                            'confirmkey'=>$key,
                            'confirme'=>$confirme,
                            'nom'=>$nom,
                            'prenom'=>$prenom, 
                            'societe'=>$societe,
                            'adresse1'=>$adresse1,
                            'adresse2'=>$adresse2,
                            'code_postal'=>$code_postal,
                            'ville'=>$ville,
                            'stateOrProvince'=>$province,
                            'pays'=>$pays,
                            'pays_string'=>$pays1,
                            'nom_livr'=>$nom,
                            'prenom_livr'=>$prenom,
                            'societe_livr'=>$societe,
                            'adresse1_livr'=>$adresse1,
                            'adresse2_livr'=>$adresse2,
                            'code_postal_livr'=>$code_postal,
                            'ville_livr'=>$ville,
                            'stateOrProvince_livr'=>$province,
                            'pays_livr'=>$pays,
                            'pays_livr_string'=>$pays1
                          ));
                          $req6=$bdd->prepare('UPDATE commande SET acheteur=:acheteur WHERE reference=:reference AND etat=:etat');
                          $req6->execute(array('acheteur'=>$mail1, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));

                    }
                  }

if (isset($req)){$req->closeCursor();}
if (isset($req1)){$req1->closeCursor();}
if (isset($req2)){$req2->closeCursor();}
if (isset($req3)){$req3->closeCursor();}
if (isset($req4)){$req4->closeCursor();}
if (isset($req5)){$req5->closeCursor();}
if (isset($req6)){$req6->closeCursor();}