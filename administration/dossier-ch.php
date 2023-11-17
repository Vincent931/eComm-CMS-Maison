<?php session_start();

require 'texte1.php';
require 'boutique0.php';

$dossier=$_POST['dossier'];

//recuperation nom ancien dossier
$req1=$bdd1->query('SELECT dossier FROM societe');
$rep=$req1->fetch();
$dir='../download/'.$rep['dossier'];

//effacement bdd ts les telechargements
$req2=$bdd->query('DELETE FROM upload');

//effacement ancien dossier
function rrmdir($dir) {
 if (is_dir($dir)) { // si le paramètre est un dossier
     $objects = scandir($dir); // on scan le dossier pour récupérer ses objets
     foreach ($objects as $object) { // pour chaque objet
          if ($object != "." && $object != "..") { // si l'objet n'est pas . ou ..
               if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object);else unlink($dir."/".$object); // on supprime l'objet
              }
     }
     reset($objects); // on remet à 0 les objets
     rmdir($dir); // on supprime le dossier
     }
 }
rrmdir($dir);
//insertion bdd nouveau nom de dossier
$req=$bdd1->prepare('UPDATE societe SET dossier=:dossier');
$req->execute(array('dossier'=>$dossier));

//création du dossier
	chmod('../download', 0775);
	mkdir('../download/'.$dossier);
	chmod('../download/'.$dossier, 0775);
	// création du fichier
    $f = fopen('../download/'.$dossier.'/index.php', "x+");
    // écriture
    $index='<?php header("Location:../../index.php");';
    fputs($f, $index);
    // fermeture
    fclose($f);

//effacement de ts les téléchargements de la bdd produits
$req4 = $bdd->query('SELECT * FROM produits ORDER BY id');
while ($donnees = $req4->fetch())
    {
    $mot=substr($donnees['nom'],0,14);
    if($mot=="telechargement"){

    $id=$donnees['id'];

    $req5=$bdd->prepare('DELETE FROM produits WHERE id=:id');
    $req5->execute(array('id'=>$id));

    $req6=$bdd->prepare('DELETE FROM explications WHERE id_produit=:id_produit');
    $req6->execute(array('id_produit'=>$id));

}
}

//mise à exist non
$non='non';
$req3=$bdd->prepare('UPDATE download SET exist=:exist');
$req3->execute(array('exist'=>$non));

//message
$_SESSION['message']="Répertoire créé vous avez perdu tous les téléchargements du dossier Ancien";

header("Location:societe-ch.php");