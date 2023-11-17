<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
} setcookie('email', $_SESSION['mail'], time() + 365*24*3600, null, null, false, true);
header("Location: tarifs.php");