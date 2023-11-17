<?php session_start();

require 'boutique0.php';
require 'texte1.php';

$nom=$_POST['page_add'].'.php';
$contenu="";

$req=$bdd->prepare('SELECT * FROM page WHERE nom=?');
$req->execute(array($nom));
$donnees=$req->fetch();

if(isset($donnees['nom']) AND $donnees['nom']==$nom){
	$_SESSION['message']='Page déjà existante !';
	header("Location:pre-pages.php");
} else {

$req1=$bdd->prepare('INSERT INTO page(nom, contenu) VALUES(:nom, :contenu)');
$req1->execute(array('nom'=>$nom, 'contenu'=>$contenu));

$_SESSION['message']="PAGE AJOUTEE";

$req2=$bdd1->query('SELECT url FROM societe');
$donnees2=$req2->fetch();
//curl
$url = $donnees2['url'].'/GAB-sample.txt';
//  Initiate curl
     $ch = curl_init();

// Will return the response, if false it print the response
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the url
     curl_setopt($ch, CURLOPT_URL,$url);

// Execute
     $result=curl_exec($ch);

//echo $result;
$file='../'.$nom;

@$fp=fopen($file, "w+"); //ouverture du fichier en mode écriture, création du fichier s'il n'existe pas.
fwrite($fp,$result); // insert le texte: Un texte dans votre fichier.

chmod ($file, 0644);
curl_close($ch);
header("Location:pre-pages.php");
}
