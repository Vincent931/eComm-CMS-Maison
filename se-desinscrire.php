<?php
require 'boutique0.php';
require'texte1.php';

$mail=urldecode($_GET['mail']);
$non='non';
$cle=urldecode($_GET['key']);

$req1=$bdd1->prepare('SELECT * FROM desinscrire WHERE cle=:cle');
$req1->execute(array('cle'=>$cle));
$donnees=$req1->fetch();

if(isset($donnees['cle']) AND !empty($donnees['cle'])){

	if(isset($_GET['mail']) AND !empty($_GET['mail'])){

	$req=$bdd->prepare('UPDATE compte SET journalise=:journalise WHERE mail=:mail');
	$req->execute(array('journalise'=>$non, 'mail'=>$mail));
	
	$req2=$bdd1->prepare('DELETE FROM desinscrire WHERE cle=:cle');
	$req2->execute(array('cle'=>$cle));

	} else {$_SESSION['message']='ERROR';}
} else {$_SESSION['message']='ERROR';}


?>
<br><br><br><br><h1 style="color:blue;text-align:center">Vous êtes désinscrit</h1>
<?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){
	echo '<p style="color:red">'.$_SESSION['message'].'</p>';
	$_SESSION['message']="";
}
