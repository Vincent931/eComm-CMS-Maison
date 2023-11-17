<?php

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
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
    $mail->Port       = 587;                                    // TCP port to connect to 587 !important 587 pas 465
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);
	$mail->addAddress($mail_ste, $nom_ste);               // Name is optional
	//$mail->addAddress('test@ckoi-7art.com');               // Name is optional
    //$mail->addReplyTo('@.fr', 'Commentaire');
    //$mail->addCC('vincentnguyen332@gmail.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   	//image
   	//$mail->AddEmbeddedImage("bandeau-mail.png", $image, "bandeau-mail.png");
	//$mail->Body = <img alt="www-1-zero" src="https://www-1-zero.fr/publicimgs/bandeau-mail.png">;

    //$mail->addAttachment('publicimgs/grille-tarifs.pdf');         // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name

    // Content
$mail->isHTML(true);
$mail->Subject ="Nouveau commentaire sur ".$nom_ste;  
$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	   			<head>
	   				<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   				<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"
	   			</head>

	   			<html xmlns:v"urn:schemas-microsoft-com:vml">
	   			<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family:Verdana,Tahoma,verdana,tahoma,sans-serif">
					
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
					<td style="valign:bottom;text-align:center;mso-line-height-rule: exactly;line-height:25px;font-size:18px"> De '.$nom_ste.' :</td>
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
					<table align="center">
					<tr style="height:auto">
					<td style="text-align:center;width:300px"><img style="width:300px" alt="'.$nom_ste.'-Bandeau-mail" src="'.$url_ste.'/publicimgs/'.$image.'"/></td>
					</tr>
					</table>
					</tbody>

					<div style="width:400px;text-align:left;margin:auto">
					</br>1 commentaire a ete valide sur votre site '.$nom_ste.'<br><br><span style="text-decoration:underline">Voici son contenu :</span>
					</br><br><span style="color:blue">'.$message_envoi.'</span><br></br>
					<span style="text-decoration:underline">Sur le Sujet :</span> <span style="color:green">'.$sujet.'</span><br><br>
					<span style="text-decoration:underline">Adresse IP de l\'utilisateur :</span> <span style="color:red">'.$IP.'</span><br><br>
					<span style="text-decoration:underline">Email de l\'utilisateur :</span> <span style="color:green">'.$email_user.'</span><br><br>
					<span style="text-decoration:underline">En cas de Spam de Commentaire :</span>
					<br><br><span style="text-align:center;margin:auto"><a style="text-decoration:none;border-radius:10px/10px;color:white;background-color:black;padding:4px" href="'.$url_ste.'/administration/effacer-commentaire.post.php?sujet='.urlencode($id_sujet).'">effacer</a></span><br><br>
					et ou <br><br><span style="text-align:center;margin:auto"><a style="text-decoration:none;border-radius:10px/10px;color:white;background-color:black;padding:4px" href="'.$url_ste.'/administration/blacklist.php">Ajouter l\'IP en Blacklist</a></span>
					</div>

					<table>
					<tbody>
					<tr style="height:30px">
					<td>&nbsp;</td>
					</tr>
					</tbody>
					</table>
				</body>
			</html>';
$mail->AltBody ='1 commentaire a ete valide sur votre site '.$nom_ste.', allez sur l\'espace sujet puis commentaire, cliquez sur '.$url_ste.'/administration/effacer-commentaire.php';// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}