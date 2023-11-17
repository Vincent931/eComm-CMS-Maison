<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
$req50=$bdd1->query('SELECT * FROM societe');
$donnees50=$req50->fetch();

if(isset($_POST['mail']) AND !empty($_POST['mail'])) {

require 'texte1.php';

require 'boutique0.php';
	
$mail_un = htmlspecialchars($_POST['mail']);
$mail1 = strtolower($mail_un);
$key = "";

	if(filter_var($mail1, FILTER_VALIDATE_EMAIL)) {
	$reqmail = $bdd->prepare("SELECT * FROM compte WHERE mail = ?");
	$reqmail->execute(array($mail1));
	$mailexist = $reqmail->rowCount();
	    if($mailexist == 1) {
	    	$longueurKey = 19;
                
                    for($i=1;$i<$longueurKey;$i++) {
                    $key .= mt_rand(0,9);
              		}
					$confirme=0;
                    $correct = $bdd->prepare("UPDATE compte SET confirmkey =:nv_confirmkey, confirme=:nv_confirme WHERE mail=:mail");
                    $correct->execute(array('nv_confirmkey'=> $key, 'nv_confirme'=>$confirme, 'mail'=>$mail1));
                    $correct->closeCursor();
$req20=$bdd1->query('SELECT * FROM societe');
$ste=$req20->fetch();
$nom_ste=$ste['nom'];

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$req21=$bdd->query('SELECT nom FROM pdf');
$pdf=$req21->fetch();
$pdf_ins=$pdf['nom'];

$req21=$bdd1->query('SELECT reinitialisation FROM mails');
$mails=$req21->fetch();
$mail_init=$mails['reinitialisation'];

$int='bandeau';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image1=$donnees10['nom'];

$pdf_insert='publicimgs/'.$pdf_ins;

require 'mail-init.php';

			$_SESSION['message']="Votre compte va être réinitialiser, regardez vos mails.";
			$reqmail->closeCursor();
			$_SESSION['mail']=$mail1;
		} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Cet adresse mail n'existe pas dans la base, vous pouvez créer un compte : </span><br>".'<a style="margin:auto;background-color:yellow;color:black" href "tarif.list.php">Créer un compte</a>';}
	} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Vous devez entrer une adresse courriel valide.</span>";}
}
$_SESSION['message']="<span style=\"background-color:red;color:black\">Veuillez vérifier vos emails, regardez la boite Spams également</span>";
header("Location: accueil.html");
//echo '---'.$mail1.'---'.$mdp.'---'.$pdf_ins.'---'.$image1.'---'.$serveur_mail.'---'.$nom_ste.'---'.$serveur_mail.'---'.$key.'---'.$confirme.'---'.$url_ste.'---'.$mail_ste;
//var_dump($mail->send());