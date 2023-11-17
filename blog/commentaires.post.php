<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
// Connexion à la base de données
require 'texte1.php';

require 'boutique0.php';

require 'blog2.php';
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();


if (isset($_POST['id_sujet']) AND !empty($_POST['id_sujet']) AND isset($_POST['mail']) AND !empty($_POST['mail']))  {
$id_sujet = htmlspecialchars($_POST['id_sujet']);
$mdp1=htmlspecialchars($_POST['mdp']);
$mail = htmlspecialchars(strtolower($_POST['mail']));
$message_envoi = htmlspecialchars($_POST['message_envoi']);
$mdp=sha1($mdp1);
//verif d'un user enregistré
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($mail));
$userexist = $req->rowCount();
$donnees=$req->fetch();
if($userexist > 0) {
	if($mdp==$donnees['motdepasse']){
//pseudo existant ou non
if(isset($donnees['pseudo']) AND !empty($donnees['pseudo'])){
	$pseudo_envoi=$donnees['pseudo'];
} else {$pseudo_envoi="1234";}
//on fait une requête d'ajout de commentaire
$req2 = $bdd2->prepare('INSERT INTO commentaires(id_sujet, pseudo, message, date_creation_message) VALUES(:id_sujet, :pseudo_envoi, :message_envoi, NOW())');
$req2->execute(array(
'id_sujet' => $id_sujet,
'pseudo_envoi' => $pseudo_envoi,
'message_envoi' => $message_envoi));
$req->closeCursor();
$req2->closeCursor();
//requete metadonnees de mail
$req20=$bdd1->query('SELECT * FROM societe');
$ste=$req20->fetch();
$nom_ste=$ste['nom'];
$mail_ste=$ste['mail'];
$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];
$mdp=$ste['mdp'];
$image=$url_ste."/publicimgs/bandeau-mail.png";
//requête de sujet
$req3=$bdd2->prepare('SELECT * FROM topics WHERE id=?');
$req3->execute(array($id_sujet));
$donnees2=$req3->fetch();
//requête de recupération id créé plus haut
$req4=$bdd2->prepare('SELECT id FROM commentaires WHERE message=?');
$req4->execute(array($message_envoi));
$donnees3=$req4->fetch();
$id_commentaire=$donnees3['id'];
//ip
$IP=$_SERVER['REMOTE_ADDR'];
$email_user=$donnees['mail'];
$sujet=$donnees2['titre1'];
$sujet_contenu=$donnees2['contenu1'];

$int='bandeau';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];

require 'mail-commentaires.php';


$_SESSION['id_sujet'] = $id_sujet;//on redirige vers commentaires.php
		} else{$_SESSION['message']="Mauvais mot de passe, si vous ne vous en souvenez pas, cliquez sur l'onglet: Problème de compte,  en bas de page.";header("Location:detail-commenter-".$id_sujet);}
	} else{$_SESSION['message']="Vous devez entrer le bon email, si vous n'y parvenez pas cliquez sur l'onglet: Problème de compte,  en bas de page.";header("Location:detail-commenter-".$id_sujet);}
} else { $_SESSION['message']="Veuillez remplir tous les champs.";header("Location:commentaires.php");}
header ('Location: detail-commenter-'.$id_sujet);
