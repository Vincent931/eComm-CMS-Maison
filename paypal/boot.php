<?php
require 'texte1.php';
$req=$bdd1->query('SELECT * FROM paypal');
$donnees=$req->fetch();
$environnement=$donnees['environnement'];
$marchand_id=$donnees['marchand_id'];
$cle_publique=$donnees['cle_publique'];
$cle_prive=$donnees['cle_prive'];

//autoloading the packages in the vendor folder
require "lib/autoload.php";

$gateway = new Braintree_Gateway ([
  'environment' => $environnement,
  'merchantId' => $marchand_id,
  'publicKey' => $cle_publique,
  'privateKey' => $cle_prive
]);
