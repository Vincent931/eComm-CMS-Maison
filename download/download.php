<?php

require '../boutique0.php';
require '../texte1.php';

$cle=$_GET['cle'];
$file=$_GET['file'];

$req=$bdd->prepare('SELECT * FROM telechargement WHERE cle=? AND file=?');
$req->execute(array($cle, $file));
$donnees=$req->fetch();
if(isset($donnees['facteur']) AND $donnees['facteur']>0){

	$nbre=$donnees['facteur'];
	$nbre1=intval($nbre);
	$nbre1--;
	$req1=$bdd->prepare('UPDATE telechargement SET facteur=:facteur WHERE cle=:cle AND file=:file');
	$req1->execute(array('facteur'=>$nbre1, 'cle'=>$cle, 'file'=>$file));

	$req2=$bdd1->query('SELECT dossier FROM societe');
	$ste=$req2->fetch();

$dossier=$ste['dossier'].'/';


$fichier = $dossier.$_GET['file']; 
//$fichier_taille = filesize($fichier);
//header("Content-disposition: attachment; filename=$fichier");
header("Content-disposition: attachment; filename=$file");
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: application/octet-stream");
//header("Content-Length: $fichier_taille");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
header("Expires: 0");
readfile($fichier);

} else {
	header("Location:telechargement.php?file=".$file."&cle=".$cle);
}
?>