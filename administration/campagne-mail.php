<?php session_start();
$mail_campaign=$_POST['campaign'];

require 'boutique0.php';
require 'texte1.php';

$req31=$bdd1->query('SELECT * FROM campagne');
$donnees31=$req31->fetch();
$subject=$donnees31['subject'];

$req20=$bdd1->query('SELECT * FROM societe');
$ste=$req20->fetch();

$nom_ste=$ste['nom'];

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];
$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$req21=$bdd1->query('SELECT reinitialisation FROM mails');
$mails=$req21->fetch();
$mail_init=$mails['reinitialisation'];

$int='bandeau-mail';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image1=$donnees10['nom'];

$image=$url_ste.'/publicimgs/'.$image1;

$req32=$bdd1->query('SELECT * FROM campagne');
$donnees32=$req32->fetch();

if(isset($donnees32['image']) AND !empty($donnees32['image'])){
	$image_sup=$donnees32['image'];} else {
		$image_sup="";
	}

$key="";

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$req30=$bdd1->query('SELECT * FROM adresses');
while($donnees30=$req30->fetch()){

$key="";
for($i=1;$i<14;$i++){
	$key.=mt_rand(0,9);
}
$req35=$bdd1->prepare('INSERT INTO desinscrire(cle) VALUES(:cle)');
$req35->execute(array('cle'=>$key));
//phpmailer
//$mail = new PHPMailer(true);
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       =  $serveur_mail; // Specify main and backup SMTP servers
   	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $mdp;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);
	$mail->addAddress($donnees30['email'], $nom_ste);               // Name is optional
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

				<table width="100%" boder="0"  cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
				<td style="valign:bottom;text-align:center;mso-line-height-rule: exactly;line-height:25px;font-size:18px"> De '.$nom_ste.'</td>
				</tr>
				</tbody>	
				</table>

				<table width="100%">
				<tbody>
				<tr style="height:25px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

				<tbody>
				<table align="left">
				<tr>
				<td style="text-align:left;width:302px"><img style="width:300px" alt="'.$nom_ste.'-Bandeau-mail" src="'.$url_ste.'/publicimgs/'.$image1.'"/></td>
				</tr>
				</table>
				</tbody>

				<table width=100%>
				<tbody>
				<tr style="width:301px">
				<td><img style="width:300px;text-align:center" alt="'.$nom_ste.'-'.$image_sup.'" src="'.$url_ste.'/publicimgs/'.$image_sup.'"/></td>
				</tr>
				</tbody>
				</table>

				<table align="left">
				<tbody>
				<tr><td>'.$mail_campaign.'</td>
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

				<tbody>
				<tr style="font-size:8px;text-align:center">
				<td>Vous pouvez vous <a style="color:blue;font-size:8px;text-align:center" href="'.$url_ste.'/se-desinscrire.php?mail='.urlencode($donnees30['email']).'&key='.urlencode($key).'">Desinscrire</a>  de la newsletter ici.</td>
				</tr>
				</tbody>
				</table>

			</body>
		</html>';// HTML version of the email
//
$mail->AltBody =  $mail_campaign;// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
$_SESSION['message']="Emails envoyés";
 
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
			<h2 style="text-align:center">EMAILS ENVOIS</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../index.php" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} 
echo '<br>'.'<br>'.'<br>'.'<br'.'<h2 style="text-align:center;color:blue">'.'ENVOI des EMAILS terminés'.'</h2>';?>
<br><br>
<a href="mailing.php" id="grey_color" style="margin:auto;text-align:center">Retourner au Mailing</a>
			</div></br>
			
		</div>
      <br><br><br><br><br>
	</body>
</html>


