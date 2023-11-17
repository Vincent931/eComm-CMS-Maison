<?php session_start();

$BDD=$_POST['bdd'];
if ($BDD=='BDD'){

require 'texte1.php';	

$handle = fopen('../publicimgs/listing@.txt', 'r');
/*Si on a réussi à ouvrir le fichier*/
if ($handle)
{
	/*Tant que l'on est pas à la fin du fichier*/
	while (!feof($handle))
	{
		/*On lit la ligne courante*/
		$buffer = fgets($handle);
		$email=substr($buffer,0,-2);

		$req=$bdd1->prepare('INSERT INTO listing(adresse) VALUES (:adresse)');
		$req->execute(array('adresse'=>$email));

		echo $email,'<br>';


	}
	/*On ferme le fichier*/
	fclose($handle);
}
echo '***********************************************FIN************************************************************';
}
?>
<a href="charger-listing-email.php">RETOUR</a>