<?php
$rawContexteCommand1 = new stdClass();
$rawContexteCommand1->billing=new stdClass();
$rawContexteCommand1->shipping=new stdClass();
$rawContexteCommand1->client=new stdClass();
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();
if (isset($donnees['prenom']) AND !empty($donnees['prenom'])){$rawContexteCommand1->billing->firstName=$donnees['prenom'];}
if (isset($donnees['nom'])){$rawContexteCommand1->billing->lastName=$donnees['nom'];}
if (isset($donnees['adresse1'])){$rawContexteCommand1->billing->addressLine1=$donnees['adresse1'];}
if (!empty($donnees['ville'])){$rawContexteCommand1->billing->city=$donnees['ville'];}
if (!empty($donnees['code_postal'])){$rawContexteCommand1->billing->postalCode=$donnees['code_postal'];}
//
if (!empty($donnees['stateOrProvince'])){$rawContexteCommand1->billing->stateOrProvince=$donnees['stateOrProvince'];}//stateOrProvince=='maine et loire'

if (!empty($donnees['pays'])){$rawContexteCommand1->billing->country=$donnees['pays'];}
if (!empty($donnees['prenom_livr'])){$rawContexteCommand1->shipping->firstName=$donnees['prenom_livr'];}
if (!empty($donnees['nom_livr'])){$rawContexteCommand1->shipping->lastName=$donnees['nom_livr'];}
if (!empty($donnees['adresse1_livr'])){$rawContexteCommand1->shipping->addressLine1=$donnees['adresse1_livr'];}
if (!empty($donnees['ville_livr'])){$rawContexteCommand1->shipping->city=$donnees['ville_livr'];}
if (!empty($donnees['code_postal_livr'])){$rawContexteCommand1->shipping->postalCode=$donnees['code_postal_livr'];}

if (!empty($donnees['stateOrProvince_livr'])){$rawContexteCommand1->shipping->stateOrProvince=$donnees['stateOrProvince_livr'];}//stateOrProvince=='maine el loire'

if (!empty($donnees['pays_livr'])){$rawContexteCommand1->shipping->country=$donnees['pays_livr'];}
if (!empty($donnees3['acheteur'])){$rawContexteCommand1->shipping->email=$donnees3['acheteur'];}
if (!empty($donnees3['acheteur'])){$rawContexteCommand1->client->email=$donnees3['acheteur'];}

/*Les champs stateOrProvince posent problèmes, Pouvez vous me debugger SVP */