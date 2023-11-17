<?php
require '_header.php';
$json = array('error' => true);
if(isset($_GET['id'])){
	$produit = $DB->query('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));
	if(empty($produit)){
		$json['message'] = "Ce produit n'existe pas.";
	}else{
		$panier->add($produit[0]->id);
		$json['error']  = false;
		$json['total']  = number_format($panier->total(),2,',',' ');
		$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier.';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier.";
}
echo json_encode($json);
