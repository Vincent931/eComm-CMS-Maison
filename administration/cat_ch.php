<?php session_start();

require 'boutique0.php';

$oui_non=$_POST['afficher'];

$i=0;
$req1=$bdd->query('SELECT * FROM categories');
while($donnees=$req1->fetch()){
$i++;

$change=$_POST['a'.$i];
$pref_change=$_POST['b'.$i];
$pref_a_change=$donnees['prefixe'];
$icone=$_POST['name_icon'.$i];

echo $_POST['a'.$i];
echo $_POST['b'.$i];

$req=$bdd->prepare('UPDATE categories SET nom=:nom, prefixe=:prefixe, icone=:icone WHERE prefixe=:prefixe_a_change');
$req->execute(array('nom'=>$change, 'prefixe'=>$pref_change, 'prefixe_a_change'=>$pref_a_change, 'icone'=>$icone));

$req02=$bdd->prepare('UPDATE produits SET nom=:nom_ch WHERE nom=:nom');
$req02->execute(array('nom_ch'=>$pref_change, 'nom'=>$pref_a_change));

}

$req01=$bdd->prepare('UPDATE cat_ok SET oui_non=:oui_non');
$req01->execute(array('oui_non'=>$oui_non));

header("Location:categories.php");