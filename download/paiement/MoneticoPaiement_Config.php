<?php
/***************************************************************************************
* Warning !! MoneticoPaiement_Config contains the key, you have to protect this file with all     *   
* the mechanism available in your development environment.                             *
* You may for instance put this file in another directory and/or change its name       *
***************************************************************************************/
require 'texte1.php';
$req=$bdd1->query('SELECT * FROM monetico');
$donnees=$req->fetch();



/*define ("MONETICOPAIEMENT_KEY", "00A6124635A3A67FE316DC05F524EAADFB3C8E90");
define ("MONETICOPAIEMENT_EPTNUMBER", "7471838");
define ("MONETICOPAIEMENT_VERSION", "3.0");
define ("MONETICOPAIEMENT_URLSERVER", "https://p.monetico-services.com/test/");
define ("MONETICOPAIEMENT_COMPANYCODE", "www1zero");
define ("MONETICOPAIEMENT_URLOK", "https://www-1-zero.fr/paiement/retour-ok.php?ref=");
define ("MONETICOPAIEMENT_URLKO", "https://www-1-zero.fr/paiement/retour-error.php?ref=");*/
define ("MONETICOPAIEMENT_KEY", $donnees['hash']);
define ("MONETICOPAIEMENT_EPTNUMBER", $donnees['TPE']);
define ("MONETICOPAIEMENT_VERSION", $donnees['version']);
define ("MONETICOPAIEMENT_URLSERVER", $donnees['url']);
define ("MONETICOPAIEMENT_COMPANYCODE", $donnees['code']);
define ("MONETICOPAIEMENT_URLOK", $donnees['url_web']."/paiement/retour-ok.php?ref=");
define ("MONETICOPAIEMENT_URLKO", $donnees['url_web']."/paiement/retour-error.php?ref=");

define ("MONETICOPAIEMENT_CTLHMAC", "V%s.sha1.php--[CtlHmac%s%s]-%s");
define ("MONETICOPAIEMENT_CTLHMACSTR", "CtlHmac%s%s");
define ("MONETICOPAIEMENT_PHASE2BACK_RECEIPT","version=2\ncdr=%s");
define ("MONETICOPAIEMENT_PHASE2BACK_MACOK","0");
define ("MONETICOPAIEMENT_PHASE2BACK_MACNOTOK","1\n");
define ("MONETICOPAIEMENT_URLPAYMENT", "paiement.cgi");

?>
