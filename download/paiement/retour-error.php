<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'boutique0.php';
require 'texte1.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req20=$bdd1->query('SELECT * FROM reterror');
$reterror=$req20->fetch();
?>

<!DOCTYPE html>
<html>
<?php require 'head.php';?>
<body id="bloc_page_ret_err">
<h1 class="h_ret_err">Paiement-ERROR</h1>
<div class="info_paiement">
	<h3 class="h3_ret_err">Paiement annulé</h3>
	<p class="p_centre_ret_err0"><img class="paiement_image" src="../publicimgs/bouton_paiement.png"></p>
	<?php echo html_entity_decode($reterror['contenu']);?>
	<p class="p_centre_ret_err"><a class="a_ret_err" href="../tarifs.php">Retenter achat</a></p>
</div>
  	<P class="p_ret_err">www-1-zero</P>
 	<?php require 'footer.php'; ?>
</body>
</html>