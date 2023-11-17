<?php session_start(); 

require 'blog2.php';

if(isset($_POST['ordre']) AND !empty($_POST['ordre']))

{

$k=intval($_POST['compteur']);
echo $k;

$i=0;

while($i<$k)

{

$i++;
$ordre="";

$inp="";
$inp="ordre".$i;
$ordre=$_POST[$inp];
echo $ordre.'--';
	
$req=$bdd2->prepare('SELECT * FROM topics WHERE id=?');
$req->execute(array($ordre));
$donnees3=$req->fetch();

$nv_image==htmlspecialchars($donnees3['image']);
$nv_img_type==htmlspecialchars($donnees3['img_type']); 
$nv_titre1=htmlspecialchars($donnees3['titre1']);
$nv_contenu1=htmlspecialchars($donnees3['contenu1']);
$nv_couleurT==htmlspecialchars($donnees3['couleurT']);
$nv_couleurS==htmlspecialchars($donnees3['couleurS']);
$nv_date_creation=htmlspecialchars($donnees3['date_creation']);


$req2= $bdd2->prepare('INSERT INTO topics(image, img_type,titre1, contenu1, couleurT, couleurS, date_creation) VALUES(:nv_image, :nv_img_type, :nv_titre1, :nv_contenu1, :nv_couleurT, :nv_couleurS,  :nv_date_creation)');
$req2->execute(array('nv_image'=>$nv_image, 'nv_img_type'=>$nv_img_type, 'nv_titre1'=>$nv_titre1, 'nv_contenu1'=>$nv_contenu1, 'nv_couleurT'=>$nv_couleurT, 'nv_couleurS'=>$nv_couleurS, 'nv_date_creation'=>$nv_date_creation));

$req5=$bdd2->query('SELECT * FROM topics');
while($donnees4=$req5->fetch()) {
$_SESSION['id']=htmlspecialchars($donnees4['id']);
}

$req7=$bdd2->prepare('DELETE FROM topics WHERE id=?');
$req7->execute(array($ordre));

}
	
$_SESSION['message']='Sujets déplacés';

}
header("Location: changer-ordre-sujet.php");