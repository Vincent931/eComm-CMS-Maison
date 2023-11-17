<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
?>
<h4 style="text-align:center;background-color: yellow">Votre compte a déjà été confirmé</h4>
