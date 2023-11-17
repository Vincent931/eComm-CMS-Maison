<br><br><br><br>
<form method="post" action="">
	<p style="text-align:center"><input type="text" name="mot" id="mot"/>
	<input type="submit" value="Chiffrer ce mot de passe"/></p>
</form>
<?php
if(isset($_POST['mot']) AND !empty($_POST['mot'])){
// Mot de passe à chiffrer pour un fichier .htpasswd
$clearTextPassword = $_POST['mot'];

// Crypter le mot de passe
$password = crypt ($clearTextPassword, base64_encode ($clearTextPassword));

// Imprimer le mot de passe crypté
echo '<br><br>'.'<h3 style="color:red; text-align:center">'.'<span style="color:black">'.' le mot de passe à entrer dans le .htpasswd est '.'</span>'.$password.'</h3>';

}?>