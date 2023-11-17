<?php
require 'boutique0.php';

$req=$bdd->query('SELECT * FROM categories');
while ($donnees=$req->fetch()){
	echo 'Catégorie :'.$donnees['nom'].'<br>'.'Préfixe Normalisé (à copier-coller) :'.'<span style="color:blue">'.$donnees['prefixe'].'</span>';
	echo '<br>'.'<br>';
}