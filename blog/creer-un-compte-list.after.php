<?php session_start();

$url="";
$urlpanier="";
if(isset($_GET['url']) AND !empty($_GET['url'])){
   $url=$_GET['url'];
   if($url=="panier"){
      $urlpanier='?url=panier';
   }
}


require 'boutique0.php';
if(isset($_POST['prenom']) AND !empty($_POST['prenom'])){
    if(isset($_POST['nom']) AND !empty($_POST['nom'])){
    	if(isset($_POST['adresse1']) AND !empty($_POST['adresse1'])){
    		if(isset($_POST['code_postal']) AND !empty($_POST['code_postal'])){
    			if(isset($_POST['ville']) AND !empty($_POST['ville'])){
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$adresse1=htmlspecialchars($_POST['adresse1']);
$code_postal=htmlspecialchars($_POST['code_postal']);
$ville=htmlspecialchars($_POST['ville']);
$pays=htmlspecialchars($_POST['pays']);

require 'pays-change.php';

if(isset($_POST['societe']) AND !empty($_POST['societe'])){
$societe=htmlspecialchars($_POST['societe']);	
} else{ $societe="";}
if(isset($_POST['adresse2']) AND !empty($_POST['adresse2'])){
$adresse2=htmlspecialchars($_POST['adresse2']);	
} else{ $adresse2="";}
if(isset($_POST['stateOrProvince']) AND !empty($_POST['stateOrProvince'])){
$stateOrProvince=htmlspecialchars($_POST['stateOrProvince']);	
} else{ $stateOrProvince="";}

$req1 = $bdd->prepare('UPDATE compte SET nom=:nom, prenom=:prenom, societe=:societe, adresse1=:adresse1, adresse2=:adresse2, code_postal=:code_postal, ville=:ville, stateOrProvince=:stateOrProvince, pays=:pays, pays_string=:pays_string, nom_livr=:nom_livr, prenom_livr=:prenom_livr, societe_livr=:societe_livr, adresse1_livr=:adresse1_livr, adresse2_livr=:adresse2_livr, code_postal_livr=:code_postal_livr, ville_livr=:ville_livr, stateOrProvince_livr=:stateOrProvince_livr, pays_livr=:pays_livr, pays_livr_string=:pays_livr_string WHERE mail=:mail');
            $req1->execute(array(
              'nom'=>$nom,
              'prenom'=>$prenom, 
              'societe'=>$societe,
              'adresse1'=>$adresse1,
              'adresse2'=>$adresse2,
              'code_postal'=>$code_postal,
              'ville'=>$ville,
              'stateOrProvince'=>$stateOrProvince,
              'pays'=>$pays,
              'pays_string'=>$pays1,
              'nom_livr'=>$nom,
              'prenom_livr'=>$prenom,
              'societe_livr'=>$societe,
              'adresse1_livr'=>$adresse1,
              'adresse2_livr'=>$adresse2,
              'code_postal_livr'=>$code_postal,
              'ville_livr'=>$ville,
              'stateOrProvince_livr'=>$stateOrProvince,
              'pays_livr'=>$pays,
              'pays_livr_string'=>$pays1,
              'mail'=>$_SESSION['mail']));

            if(isset($_GET['url']) AND !empty($_GET['url'])){
            $url=$_GET['url'];
                if($url=="panier"){
                 header('Location:../panier.php');
                }
            }

            } else { $_SESSION['message'] = "Veuillez remplir le champs ville";
            if(isset($urlpanier) AND $urlpanier=="?url=panier"){
            header('Location:se-connecter?url=panier');} 
            else { header('Location:se-connecter');}
            }
        } else {
                  $_SESSION['message'] = "Veuillez remplir le champs Code Postal";
                    if(isset($urlpanier) AND $urlpanier=="?url=panier"){
                        header('Location:se-connecter?url=panier');} 
                        else { header('Location:se-connecter');}
        }
     } else {
               $_SESSION['message'] = "Veuillez remplir le champs adresse";
                if(isset($urlpanier) AND $urlpanier=="?url=panier"){
                    header('Location:se-connecter?url=panier');} 
                    else { header('Location:se-connecter');}
    }
  } else {
         $_SESSION['message'] = "Veuillez remplir le champs nom";
          if(isset($urlpanier) AND $urlpanier=="?url=panier"){
            header('Location:se-connecter?url=panier');} 
            else { header('Location:se-connecter');}

 }
} else {
      $_SESSION['message'] = "Veuillez remplir le champs prénom";
       if(isset($urlpanier) AND $urlpanier=="?url=panier"){
        header('Location:se-connecter?url=panier');} 
        else { header('Location:se-connecter');}
}

