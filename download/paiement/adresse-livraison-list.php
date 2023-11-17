<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

require 'boutique0.php';

	if(isset($_POST['nom_livr']) AND !empty($_POST['nom_livr'])){
	$nom_livr = htmlspecialchars($_POST['nom_livr']);
		if(isset($_POST['prenom_livr']) AND !empty($_POST['prenom_livr'])){
			$prenom_livr = htmlspecialchars($_POST['prenom_livr']);
			if(isset($_POST['societe_livr']) AND !empty($_POST['societe_livr'])) {
			$societe_livr= htmlspecialchars($_POST['societe_livr']);
			} else {$societe_livr="";}
			if(isset($_POST['adresse1_livr']) AND !empty($_POST['adresse1_livr'])){
			$adresse1_livr = htmlspecialchars($_POST['adresse1_livr']);
				if(isset($_POST['adresse2_livr']) AND !empty($_POST['adresse2_livr'])){
				$adresse2_livr = htmlspecialchars($_POST['adresse2_livr']);
				} else {$adresse2_livr="";}
				if(isset($_POST['code_postal_livr']) AND !empty($_POST['code_postal_livr'])){
				$code_postal_livr = htmlspecialchars($_POST['code_postal_livr']);
					if(isset($_POST['ville_livr']) AND !empty($_POST['ville_livr'])){
					$ville_livr = htmlspecialchars($_POST['ville_livr']);
						if(isset($_POST['pays_livr']) AND !empty($_POST['pays_livr'])){
						$pays_livr=htmlspecialchars($_POST['pays_livr']);
							if(isset($_POST['international']) AND $_POST['international']=='international_oui'){
                    			if(isset($_POST['province_livr']) AND !empty($_POST['province_livr'])){ 
                      			$province_livr=htmlspecialchars($_POST['province_livr']);
								require 'pays-change2.php';
								require 'adr_livr_3.php';
								header("Location:recap.php");
                    			} else { $_SESSION['message']="Vous devez remplir le champs Région ou Province pour une vente à l'international."; header("Location:adresse-livraison.php");
                    			}
                  			} else {  	$province_livr=htmlspecialchars($_POST['province_livr']);
                  						$pays_livr='FR';
                  						$pays1='France';
										$req=$bdd->prepare('UPDATE compte SET nom_livr=:nnom_livr, prenom_livr=:nprenom_livr, societe_livr=:nsociete_livr, adresse1_livr=:nadresse1_livr, adresse2_livr=:nadresse2_livr, code_postal_livr=:ncode_postal_livr, ville_livr=:nville_livr, stateOrProvince_livr=:nstateOrProvince_livr, pays_livr=:npays_livr, pays_livr_string=:npays_livr_string WHERE mail=:nmail_livr');
										$req->execute(array('nnom_livr'=>$nom_livr, 'nprenom_livr'=>$prenom_livr, 'nsociete_livr'=>$societe_livr, 'nadresse1_livr'=>$adresse1_livr, 'nadresse2_livr'=>$adresse2_livr,'ncode_postal_livr'=>$code_postal_livr, 'nville_livr'=>$ville_livr, 'nstateOrProvince_livr'=>$province_livr,'npays_livr'=>$pays_livr, 'npays_livr_string'=>$pays1, 'nmail_livr'=>$_SESSION['mail']));
										$req->closeCursor();
										header("Location:recap.php");
									}
						} else {$_SESSION['message1']="Vous devez remplir le champs Pays.";header("Location:adresse-livraison.php");}

					} else {$_SESSION['message1']="Vous devez remplir le champs Ville.";header("Location:adresse-livraison.php");}
				} else {$_SESSION['message1']="Vous devez remplir le champs Code Postal.";header("Location:adresse-livraison.php");}
			} else {$_SESSION['message1']="Vous devez remplir le champs Adresse.";header("Location:adresse-livraison.php");}
		} else {$_SESSION['message1']="Vous devez remplir le champs Prénom.";header("Location:adresse-livraison.php");}
	} else {$_SESSION['message1']="Vous devez remplir le champs Nom.";header("Location:adresse-livraison.php");}
echo $_POST['international'].'---'.$_SESSION['message'];