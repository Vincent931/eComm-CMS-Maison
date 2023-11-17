<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require "boot.php";

if (empty($_POST["payment_method_nonce"])) {
	header('location: derniere-etape');
}
      	require 'boutique0.php';
        $etat='non';
        $req=$bdd->prepare('SELECT * FROM commande WHERE etat=:etat AND acheteur=:acheteur');
        $req->execute(array('etat'=>$etat,'acheteur'=>htmlspecialchars($_SESSION['mail'])));
        
        while($donnees=$req->fetch())
        {$amount=$donnees['grand_total'];}
    	$_SESSION['montant']=$amount;
    	$req2=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
		  $req2->execute(array(htmlspecialchars($_SESSION['mail'])));
		  $coordonnees=$req2->fetch();
//eviter l'erreur private array
		
		$prenom=htmlspecialchars($coordonnees['prenom']);
		$nom=htmlspecialchars($coordonnees['nom']);
		$company=htmlspecialchars($coordonnees['societe']);
		$email=htmlspecialchars($coordonnees['mail']);
//transaction
$nonceFromTheClient = $_POST["payment_method_nonce"];
$result = $gateway->transaction()->sale([
  'amount' => $amount,
  'paymentMethodNonce' => $nonceFromTheClient,
  'customer' => [
		'firstName' => $prenom,
    	'lastName' => $nom,
    	'company' => $company,
    	'email' => $email
	],
  'options' => [
    'submitForSettlement' => True
  ]
]);

$req->closeCursor();
$req2->closeCursor();


if ($result->success === true) {
  header("Location: retour-ok.php");
} else
{
	print_r($result->errors);
	
	echo '<h4>'.'Le traitement a échoué, veuillez réessayer'.'</h4>';
	echo '<a style="border:1px solid black;background-color:white;color:black" href="index.php">'.'Réessayer le paiement'.'</a>';
  header('Location:Paiement-Annule');
	die();
}
