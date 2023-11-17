<?php session_start();

require 'blog2.php';
?>
<!DOCTYPE html>
  <html>
  <?php require 'head2.php';?>
    <body id="bloc_page2">
      <div>
<h1 id="h1">Sujet choisi pour chatter</h1>
<?php if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h3 style="color:red;text-align:center">'.$_SESSION['message'].'</h3>';} ?>
            <section>
            	<article>
<?php // Connexion à la base de données

//1eres conditions de securite
if (isset($_GET['sujet']))	//isset sur $_GET['sujet'] et attribution de la variable $id_sujet
	{
		$id_sujet = htmlspecialchars(urldecode($_GET['sujet']));
		$id_sujet = (int) ($id_sujet);
	}
elseif (   ( (isset($donnees['id'])) AND (isset($_GET['sujet'])) ) OR (isset($donnees['id']))   )	//isset sur $donnees['id']
	{
		$id_sujet = htmlspecialchars($donnees['id']);
	}
elseif ( isset($_SESSION['id_sujet']))	//attribution de $id_billet avec $_SESSION['id_sujet'] venu de commentaires_post.php']
	{
		$id_sujet = htmlspecialchars($_SESSION['id_sujet']);	//quel que soit la variable d'entrée en sortie = $id_sujet
	}
if (isset($_POST['pseudo_envoi']))
	{
			$_POST['pseudo_envoi'] = null;	//on attribue $_COOKIE['pseudo'] de $_POST['pseudo_envoi'] venu de commentaires_post.php
	}

//récupération du billet avec prepare
$req = $bdd2->prepare('SELECT id, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics WHERE id =:id_sujet');
//on récupère la requête dans un array $id_sujet rentré en URL sur index.php ou venu de commentaires_post.php
$req->execute(array(
'id_sujet' => $id_sujet));
$donnees = $req->fetch();

	?>
<div class="affich_sujet">
	<p class="p_af">Le <?php echo htmlspecialchars_decode($donnees['date_creation_fr']); ?></p>
	<h2 class="p_af"><?php echo htmlspecialchars_decode($donnees['titre1']); ?></h2>
	<p class="p_af"><?php echo htmlspecialchars_decode($donnees['contenu1']); ?></p>
	</br>
</div>

				<h2 id="h1_2">Derniers commentaires :</h2>
<?php
//récupération des commentaires avec une requete preparée
$req = $bdd2->prepare('SELECT pseudo, message, DATE_FORMAT(date_creation_message, \'%d/%m/%Y à %Hh%imin%ss\') As date_creation_message_fr FROM commentaires WHERE id_sujet = :id_sujet ORDER BY date_creation_message DESC LIMIT 0,12');
$req->execute(array(
'id_sujet' => $id_sujet)); //ici on utilise l'id de billets rentré en url qui correspond à id_billet dans la bdd commentaires
while ($donnees = $req->fetch())
			
		{
		?>
<div id="affich_sujet_comment">
	<p>Le <?php echo htmlspecialchars($donnees['date_creation_message_fr']); ?> Par <?php echo htmlspecialchars($donnees['pseudo']); ?></p>
	<p><?php echo htmlspecialchars($donnees['message']); ?></p>	
	</br>
</div>
		<?php
		}
//Fin de boucle de récupération des 5 derniers commentaires
$req->closeCursor();
		?>
<div id="comment_form">
	<form action="commentaires.post.php" method="post">
	    <p><label for="mail">Pseudo </label></p>
	    <p><input class="inp_form0" type="text" name="pseudo" id="mail" value="<?php if(isset($_SESSION['pseudo'])) {echo htmlspecialchars($_SESSION['pseudo']);} ?>"/></p>
		<p><label for="mdp">Mot de Passe </label></p>
		<p><input class="inp_form1" type="password" name="mdp" id="mdp"/></p>
		<p><textarea class="area_form" style="margin-top:2.5%" name="message_envoi" rows="10" cols="50"/>Message ...</textarea></p>
    	<p><input type="hidden" name="id_sujet" value="<?php if(isset($id_sujet)) {echo htmlspecialchars($id_sujet);} ?>"/></p>
		<p><input class="sub_form" style="margin-top:1.25%"type="submit" value="Valider" /></p>
	</form>
	<p><a class="a_ret" style="background-color:#F4F7DC;border:1px solid black;color:black;text-decoration:none;padding:4px" href="index.php">Retour</a></p>
</div>
</article>
</section>
<br><br><br>
</div>  
    <?php require 'footer.php';?>
   </body>
</html>
