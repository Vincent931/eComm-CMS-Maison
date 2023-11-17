<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//phpmailer
//$mail = new PHPMailer(true);
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $serveur_mail; // Specify main and backup SMTP servers
   	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $mdp;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);
	$mail->addAddress($mail1, $nom_ste);               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //image
//$mail->AddEmbeddedImage("bandeau-mail.png", $image, "bandeau-mail.png");
$mail->AddAttachment($pdf_insert);        // Add attachments
    //$mail->AddAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject ="Reinitialisation de compte";

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

				<table width="100%" border="0"  cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
				<td style="valign:bottom;text-align:center;mso-line-height-rule:exactly;line-height:25px;font-size:18px"> De '.$nom_ste.'...</td>
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
				<table width="100%" border="0"  cellpadding="0" cellspacing="0" text-align="center" margin="auto">
				<tr style="margin:auto;valign:bottom;text-align:center;width:300px">
				<td style="margin:auto;valign:bottom;text-align:center;width:300px"><img style="width:300px;text-align:center;margin:auto" alt="'.$nom_ste.'-Bandeau" src="'.$url_ste.'/publicimgs/'.$image1.'">
				</tr>
				</table>
				</tbody>

				<table width=100%>
				<tbody>
				<tr style="height:30px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

				<table width="100%" border="0"  cellpadding="0" cellspacing="0">
				<tbody>
				<tr><td style="margin:auto;text-align:center"><a style="text-align:center;margin:auto;text-decoration:none;border-radius:10px/10px;color:white; background-color:black;padding:4px" href="'.$url_ste.'/reinitialisation-etape-1-'.$mail1.'-'.$key.'">Reinitialiser votre compte ICI</a><br><br> Cliquez sur la PJ pour en savoir plus sur'.$nom_ste.'.</br>
				'.$mail_init.'</td>
				</tr>
				</tbody>
				</table>
				<table>

				<tbody>
				<tr style="height:50px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>


			</body>
		</html>';// HTML version of the email
//
$mail->AltBody =  'Reinitialiser votre compte en cliquant sur ce lien: https://www-1-zero.fr/reinitialisation.list.php?mail='.urlencode($mail1).'&key='.urlencode($key).' ou en l\'ajoutant dans votre navigateur. '.$mail_init;// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}