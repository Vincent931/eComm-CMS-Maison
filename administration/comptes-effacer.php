<?php session_start();
$effacement=htmlspecialchars($_GET['mail']);
require 'boutique0.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2>Confirmation d'effacement de Compte</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p>Confirmer l'effacement du compte : <?php echo $effacement;?></p></br></br>
      <div>
        <form action="comptes-effacer.list.php" method="post">
          <input type="hidden" name="effacement" value="<?php echo $effacement;?>"/>
          <input type="submit" value="confirmer"/>
        </form>
      </div>
		
		</div>
      <br><br><br><br><br>
	</body>
</html>