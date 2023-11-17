<?php session_start();
require 'texte1.php';

$req=$bdd1->query('DELETE FROM publicite2');

$_SESSION['message']="EFFACE.";

header("Location:publicite-ch.php");