<?php session_start();

if (isset($_GET['sujet']) AND !empty($_GET['sujet']))
			{				
					
					$id=htmlspecialchars(urldecode($_GET['sujet']));
					
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
<?php					
$req = $bdd2->prepare('SELECT id, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics WHERE id=?');
$req->execute(array($id));
$donnees = $req->fetch();

?>
<h3 style="text-align: center">Sujet choisi</h3>
	<table style="width:55%;margin:auto">
				<tr>
					<td>Edité le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['titre1']); ?></td>
				</tr>
				<tr>
					<td><?php echo htmlspecialchars($donnees['contenu1']); ?></td>	
				</tr>
			</br>
</table>
			
	<p style="background-color:black;width:80%;margin-left:auto;margin-right:auto;height:1.5px"></p>
	<h3 style="text-align:center">Commentaires</h3>
<?php

$req = $bdd2->prepare('SELECT id, pseudo, message, DATE_FORMAT(date_creation_message, \'%d/%m/%Y à %Hh%imin%ss\') As date_creation_message_fr FROM commentaires WHERE id_sujet = :id_sujet ORDER BY date_creation_message');
$req->execute(array(
'id_sujet' => $id)); //ici on utilise l'id de billets rentré en url qui correspond à id_billet dans la bdd commentaires
while ($donnees = $req->fetch())
			
		{
		?><table style="width:65%;margin:auto">
				<tr>
					<td>Ecrit le <?php echo htmlspecialchars($donnees['date_creation_message_fr']); ?> Par: <?php echo htmlspecialchars($donnees['pseudo']); ?></td>
				</tr>
				<tr>
					<td>Message/Article : <?php echo htmlspecialchars($donnees['message']); ?></td>	
				</tr>
			</br>
</table>
<p style="text-align:center"><em><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="effacer-commentaire.post2.php?commentaire=<?php echo htmlspecialchars(urlencode($donnees['id'])); ?>">Effacer ce commentaire ...</a></em></p>
		<?php
		}
//Fin de boucle de récupération des 5 derniers commentaires
$req->closeCursor();
} else { $_SESSION['message']='ERRREUR de données GET sur effacer-commentaire.php';}
?>
		</div>
      <br><br><br><br><br>
	</body>
</html>