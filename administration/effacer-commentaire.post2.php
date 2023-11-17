<?php session_start();

if (isset($_GET['commentaire']) AND !empty($_GET['commentaire']))
			{				
					
					$id=htmlspecialchars(urldecode($_GET['commentaire']));

					require 'blog2.php';
					
					//écriture du billet avec prepare
					$req = $bdd2->prepare('DELETE FROM commentaires WHERE id=?');
					$req->execute(array($id));
					$req->closeCursor();
					
					
			} else { $_SESSION['message']='ERRREUR de données GET sur effacer-commentaire.post.php';}

header("Location:effacer-commentaire.php");
?>