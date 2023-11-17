<?php session_start();

if(!empty($_POST['id_modifier']) AND !empty($_POST['date_creation']) AND !empty($_POST['titre1']) AND !empty($_POST['contenu1']))
	{				
		$id_modifier=htmlspecialchars($_POST['id_modifier']);
		$titre1=$_POST['titre1'];
		$contenu1=$_POST['contenu1'];
		$couleurT=$_POST['couleurT'];
		$couleurS=$_POST['couleurS'];
		$date_creation=$_POST['date_creation'];
		//type d'image et image
		if($_POST['inp_vid_img']=="imgsrc"){
			$image=$_POST['image'];
			$img_type="image";
		}
		if($_POST['inp_vid_img']=="video_you"){
			$image=$_POST['cle_vid_you'];
			$img_type="youtube";
		}
		if($_POST['inp_vid_img']=="video"){
			$image=$_POST['cle_vid'];
			$img_type="video";
		}
		require 'blog2.php';
			//écriture du billet avec prepare
			$req = $bdd2->prepare('UPDATE topics SET image=:image, img_type=:img_type, titre1=:titre1, contenu1=:contenu1, couleurT=:couleurT, couleurS=:couleurS, date_creation=:date_creation WHERE id=:id_modifier');
			$req->execute(array(
			'image'=>$image,
			'img_type'=>$img_type,
			'titre1'=>$titre1,
			'contenu1'=>$contenu1,
			'couleurT'=>$couleurT,
			'couleurS'=>$couleurS,
			'date_creation'=>$date_creation,
			'id_modifier'=>$id_modifier));
			$req->closeCursor();
			$req=$bdd2->prepare('SELECT id FROM topics WHERE titre1=?');
			$req->execute(array($titre1));
			$donnees1=$req->fetch();
			$req2=$bdd2->prepare('UPDATE commentaires SET id_sujet=:id_sujet WHERE id_sujet=:id_sujet');
			$req2->execute(array('id_sujet'=>htmlspecialchars($donnees1['id']),
			'id_sujet'=>$id_modifier));
					
} else { $_SESSION['message']='Vous devez remplir correctement tous les champs';
header("Location: modification-sujet.php");}

header("Location:modification-sujet.php");

?>