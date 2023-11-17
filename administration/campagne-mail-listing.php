<?php session_start();

require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Campagne sur LISTING - Résultat</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
			</div></br>
			<p style="color:blue">Destinataire(s):</p>
<?php
$valeur=$_POST['valeur'];
$i=0;
$dest="";

require 'boutique0.php';
require 'texte1.php';

$req31=$bdd1->query('SELECT * FROM campagne_listing');
$donnees31=$req31->fetch();

$subject=$donnees31['subject'];
$mail_campagne=$donnees31['contenu'];
$mail_ste=$donnees31['email_addr'];
$motdepasse=$donnees31['motdepasse'];
$serveur_mail=$donnees31['serveur_mail'];


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['valeur']) AND ($_POST['valeur']=='all')){

$req30=$bdd1->query('SELECT * FROM listing');
while($donnees30=$req30->fetch()){

//phpmailer
//$mail = new PHPMailer(true);
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       =  $serveur_mail; // Specify main and backup SMTP servers
   	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $motdepasse;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, 'important');
	$mail->addAddress($donnees30['adresse'], 'important');               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //image
//$mail->AddEmbeddedImage("bandeau-mail.png", $image, "bandeau-mail.png");
//$mail->addAttachment($pdf_insert);        // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject =$subject;

$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   			<head>
   				<meta http-equiv="content-type" content="text/html; charset=utf-8">
   				<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"
   			</head>

   			<html xmlns:v"urn:schemas-microsoft-com:vml">
   			<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
				
   				<table>
				<tbody>
				<tr style="height:50px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

				<table align="center">
				<tbody>
				<tr><td>'.$mail_campagne.'</td>
				</tr>
				</tbody>
				</table>
				<table>

				<tbody>
				<tr style="height:250px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

			</body>
		</html>';// HTML version of the email
//
$mail->AltBody =  $mail_campagne;// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$i++;
echo $donnees30['adresse'].'<br>';
$dest=$donnees30['adresse'];
}
//fin de boucle
$_SESSION['message']=$i." Email(s) envoyé(s) sur "; 
if(isset($_POST['valeur']) AND !empty($_POST['valeur'])){
	$_SESSION['message'].=$dest;
	}
$_SESSION['message'].=" pour: <span style=\"color:blue\">".$_POST['valeur'].'</span>';
}
//fin du if=all
else if(isset($_POST['valeur']) AND ($_POST['valeur']=='test')){
$req30=$bdd1->query('SELECT * FROM societe');
while($donnees30=$req30->fetch()){

//phpmailer
//$mail = new PHPMailer(true);
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       =  $serveur_mail; // Specify main and backup SMTP servers
   	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $motdepasse;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, 'important');
	$mail->addAddress($donnees30['mail'], 'important');               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //image
//$mail->AddEmbeddedImage("bandeau-mail.png", $image, "bandeau-mail.png");
//$mail->addAttachment($pdf_insert);        // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject =$subject;

$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   			<head>
   				<meta http-equiv="content-type" content="text/html; charset=utf-8">
   				<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"
   			</head>

   			<html xmlns:v"urn:schemas-microsoft-com:vml">
   			<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
				
   				<table>
				<tbody>
				<tr style="height:50px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

				<table align="center">
				<tbody>
				<tr><td>'.$mail_campagne.'</td>
				</tr>
				</tbody>
				</table>
				<table>

				<tbody>
				<tr style="height:250px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

			</body>
		</html>';// HTML version of the email
//
$mail->AltBody =  $mail_campagne;// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$i++;
echo $donnees30['mail'].'<br>';
$dest=$donnees30['mail'];
}
//fin de boucle
$_SESSION['message']=$i." Email(s) envoyé(s) sur "; 
if(isset($_POST['valeur']) AND !empty($_POST['valeur'])){
	$_SESSION['message'].=$dest;
	}
$_SESSION['message'].=" pour: <span style=\"color:blue\">".$_POST['valeur'].'</span>';
}

if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
echo 'Contenu: <br>'.htmlentities($mail_campagne);
echo '<br>'.'<br>'.'<br>'.'<br>'.'<h2 style="text-align:center;color:blue">'.'ENVOI des EMAILS terminés, à partir de'.' IP: '.$_SERVER['REMOTE_ADDR'].'</h2>';?>
<br><br>
<a href="mailing-all.php" id="grey_color" style="margin:auto;text-align:center">Retourner au Mailing by Listing</a>		
		</div>
      <br><br><br><br><br>
	</body>
</html>


