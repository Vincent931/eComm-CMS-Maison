<?php session_start();

if (isset($_GET['sujet']) AND !empty($_GET['sujet']))
			{				
					
					$id=htmlspecialchars(urldecode($_GET['sujet']));
					
					require 'blog2.php';
					
					//écriture du billet avec prepare
					$req = $bdd2->prepare('DELETE FROM topics WHERE id=?');
					$req->execute(array($id));
					$req->closeCursor();
					
					$req = $bdd2->prepare('DELETE FROM commentaires WHERE id_sujet=?');
					$req->execute(array($id));
					$req->closeCursor();
					
			} else { $_SESSION['message']='ERRREUR de données GET sur effacer-sujet.php';}

header("Location:effacer-sujet.php");
?>