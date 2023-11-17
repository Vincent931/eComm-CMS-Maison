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
    $mail->Host       =  'smtp.gmail.com'; // Specify main and backup SMTP servers
   	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vincentnguyen332@gmail.com';                     // SMTP username
    $mail->Password   = 'AwTr849igH';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587 !important 587 pas 465
    //Recipients
    $mail->setFrom('vincentnguyen332@gmail.com', 'Commentaires-Chatt');
	$mail->addAddress('message@ckoi-7art.com', 'Commentaires-Chatt');               // Name is optional
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
$mail->Subject ="Nouveau commentaire sur Chatt.ckoi-7art.com";  
$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	   			<head>
	   				<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   				<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"
	   			</head>

	   			<html xmlns:v"urn:schemas-microsoft-com:vml">
	   			<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

					<tbody>
					<table>
					<tr style="height:50px">
					<td>&nbsp;</td>
					</tr>
					</table>
					</tbody>

					<tbody>
					<table width="100%" boder="0"  cellpadding="0" cellspacing="0">
					<tr>
					<td style="valign:bottom;text-align:center;mso-line-height-rule: exactly;line-height:25px;font-size:18px"> De Chatt.ckoi-7art.com</td>
					</tr>
					</table>
					</tbody>	
					
					<tbody>
					<table width="100%">
					<tr style="height:25px">
					<td>&nbsp;</td>
					</tr>
					</table>
					</tbody>
					
					<tbody>
					<table align="left">
					<tr style="height:102px">
					<td style="text-align:left;width:502px"><img style="width:300px" alt="image-mail.jpg" src="https://chatt.ckoi-7art.com/image-mail.jpg">
					</tr>
					</table>
					</tbody>

					<tbody>
					<table>
					<tr>
					<td style="text-align:center;display:block">
					</br>1 commentaire a ete valide sur votre site chatt</br><br>Contenu:<br>'.$message_envoi.'<br><br><br>ID de sujet :<br>'.$id_sujet.'<br><br><br>IP:<br>'.$_SERVER['REMOTE_ADDR'].'
					</td>
					</tr>
					</table>
					</tbody>

					
					<tbody>
					<table>
					<tr style="height:30px">
					<td>&nbsp;</td>
					</tr>
					</table>
					</tbody>
					
					</body>

			</html>';
$mail->AltBody ='1 commentaire a ete valide sur votre site chatt';// Text version of the email
$mail->send();

 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
