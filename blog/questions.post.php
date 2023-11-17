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

$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();


$IP=$_SERVER['REMOTE_ADDR'];

//requete metadonnees de mail
$req20=$bdd1->query('SELECT * FROM societe');
$ste=$req20->fetch();

$nom_ste=$ste['nom'];
$mail_ste=$ste['mail'];
$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];
$mdp=$ste['mdp'];

$mail_client=htmlspecialchars($_POST['mail']);
/*$mdp_e=sha1($_POST['mdp']);*/
$message=htmlspecialchars($_POST['message_envoi']);

$int='bandeau';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image1=$donnees10['nom'];

/*$req=$bdd->prepare('SELECT * FROM compte WHERE mail=? AND motdepasse=?');
$req->execute(array($mail_client, $mdp_e));
$donnees=$req->fetch();*/

	/*if(isset($donnees['mail']) AND !empty($donnees['mail'])){*/

	require 'mail-questions.php';
	$_SESSION['message']='Question envoyée, nous mettons tout en oeuvre pour y répondre au plus tôt...';
	/*} else {
		$_SESSION['message']="ERREUR 1...";
	}*/
header('Location:Question');