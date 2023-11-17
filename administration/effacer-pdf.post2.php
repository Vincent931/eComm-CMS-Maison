<?php session_start();

require 'boutique0.php';

$id=htmlspecialchars($_POST['id']);
$req=$bdd->query('SELECT * FROM pdf');
$donnees=$req->fetch();

$pdf='../publicimgs/'.$donnees['nom'];

unlink($pdf);

$nom="zéro.pdf"; $description="zéro";

$req1=$bdd->prepare('UPDATE pdf SET nom=:nom, description=:description');
$req1->execute(array('nom'=>$nom, 'description'=>$description));

$_SESSION['message']="PDF effacé, le nom en base est maintenant zéro.pdf";

header("Location: effacer-pdf.php");