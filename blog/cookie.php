<?php session_start(); setcookie('mail', $_SESSION['mail'], time() + 365*24*3600, null, null, false, true);
header("Location: mon-compte.php");