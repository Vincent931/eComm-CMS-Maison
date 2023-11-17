<?php session_start();
require 'blog2.php';
?>
<!DOCTYPE html>
<html>
 <?php require 'head.php';?>
    <body id="bloc_page">
        <div id="page">
    	<h1 id="h1">Choisissez un Sujet pour chatter</h1>
            <section>
            	<article>
<?php 
if (isset($_SESSION['id_sujet']))
{
	$_SESSION['id_sujet'] = null;
}
//on récupère les 5 derniers billets
$req = $bdd2->query('SELECT id, titre1, contenu1, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM topics ORDER BY id');
while ($donnees = $req->fetch())
{
?>
<div class="affich_sujet">
	<p class="p_af">Le <?php echo htmlspecialchars_decode($donnees['date_creation_fr']); ?></p>
	<h2 class="p_af"><?php echo htmlspecialchars_decode($donnees['titre1']); ?></h2>
	<p>&nbsp;</p>
	<p class="p_af"><?php echo htmlspecialchars_decode($donnees['contenu1']); ?></p>
	</br>
</div>
	<p  class="p_af" style="margin:auto;text-align:center"><em><a class="a_comment" style="border:1px solid black;color:black;background-color:#F4E4FB;text-decoration:none" href="commentaires.php?sujet=<?php echo htmlspecialchars($donnees['id']); ?>">Commentaires ...</a></em></p>
<?php
} //fin de la boucle des billets

$req->closeCursor();
?></br></br><br>
		</article>
		</section>
		</div>
		<?php require 'footer.php';?>
	</body>
</html>