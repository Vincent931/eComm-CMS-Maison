<?php
if(isset($_FILES['fichier_up1']['tmp_name'])){

//transfert du fichier temporaire vers repertoire du serveur
//dossier publicimgs
$nom="../publicimgs/plus.png";

$resultat=move_uploaded_file($_FILES['fichier_up1']['tmp_name'], $nom);

if($resultat){$_SESSION['message']="Chargement OK.";}

else{ $_SESSION['message']="Erreur de chargement";}

chmod("../publicimgs/plus.png", 0644);


header("Location: categories.php");

}else{$_SESSION['message']="Chargez le fichier (.png)";header("Location:categories.php");
}
