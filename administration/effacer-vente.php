<?php session_start(); 

require 'boutique0.php';
if (isset($_GET['mail']) AND !empty($_GET['mail']) AND isset($_GET['ref']) AND !empty($_GET['ref']))
			{ $mail=$_GET['mail'];
			$ref=$_GET['ref'];}				

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<form method="post" action="effacer-vente.list.php">
			<input type="hidden" name="reference" id="reference" value="<?php echo $ref;?>"/>
			<input type="hidden" name="acheteur" id="acheteur" value="<?php echo $mail;?>"/>
			<input type="submit" value="Je confirme l'effacement"/>
			<form></br>
			</br>
		</br>
	<a id="grey_color" href="stock-factures.php">Annulez l'effacement ici</a>
		</div>
      <br><br><br><br><br>
	</body>
</html>
