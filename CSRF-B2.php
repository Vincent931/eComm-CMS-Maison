<?php
session_start();
//On va vérifier :
//Si le jeton est présent dans la session et dans le formulaire
if(isset($_SESSION['token']) /*&& isset($_SESSION['token_time']) */&& isset($_POST['token']))
{
	//Si le jeton de la session correspond à celui du formulaire
	if($_SESSION['token'] == $_POST['token'])
	{
		//On stocke le timestamp qu'il était il y a 15 minutes
		//$timestamp_ancien = time() - (15*60);
		//Si le jeton n'est pas expiré
		//if($_SESSION['token_time'] >= $timestamp_ancien)
		//{
				//ON FAIT TOUS LES TRAITEMENTS ICI
				//...
				//...
		//}
		//Si le referer est bon
			if($_SERVER['HTTP_REFERER'] == '127.0.0.1/CSRF-B.php')
			{
				//ON FAIT TOUS LES TRAITEMENTS ICI
				//...
				echo 'Yes';
			}
	}
} //SINON, ON RAJOUTE DES ELSE ET DES MESSAGES D'ERREUR
else { header('Location:error.php');}
?>