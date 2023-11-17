<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '../texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

require '../boutique0.php';

$req21=$bdd1->query('SELECT compte_creation FROM mails');
$mail_creation=$req21->fetch();
$mail_confirm=$mail_creation['compte_creation'];

$req22=$bdd1->query('SELECT * FROM societe');
$ste=$req22->fetch();
$nom_ste=$ste['nom'];

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$req23=$bdd->query('SELECT nom FROM pdf');
$pdf=$req23->fetch();
$pdf_ins=$pdf['nom'];

$pdf_insert='../publicimgs/'.$pdf_ins;

$oui="";
if(isset($_POST['cgv']) AND $_POST['cgv']=='oui'){
  if(isset($_POST['mail']) AND !empty($_POST['mail'])){
  $mail1=htmlspecialchars(strtolower($_POST['mail']));
  setcookie('accept_cookie',true, time()+ 365*24*3600,'/',null, false, true);
  setcookie('email',$mail1, time()+ 365*24*3600,'/',null, false, true);
    //facturation
    if(isset($_POST['nom']) AND !empty($_POST['nom'])){
      if(isset($_POST['prenom']) AND !empty($_POST['prenom'])){
        if(isset($_POST['adresse1']) AND !empty($_POST['adresse1'])){
          if(isset($_POST['code_postal']) AND !empty($_POST['code_postal'])){
            if(isset($_POST['ville']) AND !empty($_POST['ville'])){
              if(isset($_POST['pays']) AND !empty($_POST['pays'])){
                //livraison
                if(isset($_POST['nom_livr']) AND !empty($_POST['nom_livr'])){
                  if(isset($_POST['prenom_livr']) AND !empty($_POST['prenom_livr'])){
                    if(isset($_POST['adresse1_livr']) AND !empty($_POST['adresse1_livr'])){
                      if(isset($_POST['code_postal_livr']) AND !empty($_POST['code_postal_livr'])){
                        if(isset($_POST['ville_livr']) AND !empty($_POST['ville_livr'])){
                          if(isset($_POST['pays_livr']) AND !empty($_POST['pays_livr'])){

                            //si international              
                            if(isset($_POST['international']) AND $_POST['international']=='international_oui'){
                              //si contenu province rempli
                              if(isset($_POST['province_livr']) AND !empty($_POST['province_livr'])){
                               $intern="OK";

                                //key
                                $longueurKey = 19;
                                $key = "";
                                for($i=1;$i<$longueurKey;$i++) {
                                $key .= mt_rand(0,9);
                                }

                                $req1=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
                                $req1->execute(array($_SESSION['mail']));
                                $donnees=$req1->fetch();
                                  if(isset($donnees['id']) AND !empty($donnees['id'])){
                                  $ku="";} else {
                                  //recuperation du nom de bandeau                     
                                  $req49=$bdd1->query('SELECT compte_creation FROM mails');
                                  $donnees49=$req49->fetch();
                                  $mail_compte=$donnees49['compte_creation'];
                                  $int='bandeau';
                                  $req28=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
                                  $req28->execute(array($int));
                                  $donnees10=$req28->fetch();
                                  $image=$donnees10['nom'];
                                  //mail php
                                  require '../blog/mail-compte.php';
                                  }
                                
                                require 'adr_livr_2.php';
                              //si pas contenu province livr
                              } else { $_SESSION['message']="Vous devez remplir le champs Région ou Province pour une vente à l'international."; header("Location:../panier.php");
                              }
                            //si pas international
                            } else {
                            $intern="KO";
                            //key
                            $longueurKey = 19;
                            $key = "";
                              for($i=1;$i<$longueurKey;$i++) {
                              $key .= mt_rand(0,9);
                              } 

                            $req1=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
                            $req1->execute(array($_SESSION['mail']));
                            $donnees=$req1->fetch();
                              if(isset($donnees['id']) AND !empty($donnees['id'])){
                              $ku="";} else {
                                  
                              $req49=$bdd1->query('SELECT compte_creation FROM mails');
                              $donnees49=$req49->fetch();
                              $mail_compte=$donnees49['compte_creation'];
                              //recuperation du nom de bandeau-mail
                              $int='bandeau';
                              $req28=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
                              $req28->execute(array($int));
                              $donnees10=$req28->fetch();
                              $image=$donnees10['nom'];
                              //mail php
                              require '../blog/mail-compte.php';
                              }
                            
                            require 'adr_livr_2.php';      
                            }
                          } else {$_SESSION['message']="Vous devez remplir le champs Pays Livraison.";header("Location:../panier.php");}
                        } else {$_SESSION['message']="Vous devez remplir le champs Ville Livraison.";header("Location:../panier.php");}
                      } else {$_SESSION['message']="Vous devez remplir le champs Code Postal Livraison.";header("Location:../panier.php");}
                    } else {$_SESSION['message']="Vous devez remplir le champs Adresse Livraison.";header("Location:../panier.php");}
                  } else {$_SESSION['message']="Vous devez remplir le champs Prénom Livraison.";header("Location:../panier.php");}
                } else {$_SESSION['message']="Vous devez remplir le champs Nom LIvraison.";header("Location:../panier.php");}

              } else {$_SESSION['message']="Vous devez remplir le champs Pays.";header("Location:../panier.php");}
            } else {$_SESSION['message']="Vous devez remplir le champs Ville.";header("Location:../panier.php");}
          } else {$_SESSION['message']="Vous devez remplir le champs Code Postal.";header("Location:../panier.php");}
        } else {$_SESSION['message']="Vous devez remplir le champs Adresse.";header("Location:../panier.php");}
      } else {$_SESSION['message']="Vous devez remplir le champs Prénom.";header("Location:../panier.php");}
    } else {$_SESSION['message']="Vous devez remplir le champs Nom.";header("Location:../panier.php");}
  } else { $_SESSION['message']="Vous devez entrez une adresse e-mail";header("Location:../panier.php");}
} else {$_SESSION['message']="Vous devez valider les CGV";header("Location:../panier.php");}
//$_SESSION['message']="QUELQUE CHOSE S'EST MAL PASSE";  header('location:nul1.php');

