<?php session_start();

$lignep=$_POST['lignep'];

require '../texte1.php';

$req=$bdd1->query('SELECT * FROM lignep');
$donnees=$req->fetch();

if (isset($donnees['contenu']) AND !empty($donnees['contenu'])){

	$req1=$bdd1->prepare('UPDATE lignep SET contenu=:contenu');
	$req1->execute(array('contenu'=>$lignep));

} else {

	$req1=$bdd1->prepare('INSERT INTO lignep(contenu) VALUES(?)');
	$req1->execute(array($lignep));

}
if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}

$_SESSION['message']="Ligne Ajoutée";

header('Location:line(1)-ch.php');
?>

