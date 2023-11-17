<?php

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new  PHPMailer\PHPMailer\PHPMailer ;


    //Server settings
                                        
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $serveur_mail;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $mdp;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);//'Mailer'
    $mail->addAddress($mail_ste, $nom_ste);     // Add a recipient
    //$mail->addAddress('test@ckoi-7art.com');               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments//image
   	//$mail->AddEmbeddedImage("bandeau-mail.png", $url_ste.'/publicimgs/bandeau-mail.png', "bandeau-mail.png");
	//$mail->Body = <img alt="www-1-zero" src="https://www-1-zero.fr/publicimgs/bandeau-mail.png">;

    //$mail->addAttachment('publicimgs/grille-tarifs.pdf');         // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Validation d'une commande sur ".$nom_ste;
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
				<table align="left">
				<tr style="height:102px">
				<td style="text-align:left;width:181px"><img alt="'.$nom_ste.'-Bandeau" src="'.$url_ste.'/publicimgs/'.$image.'">
				</tr>
				</table>
				</tbody>

				<table align="center">
				<tbody>
				<tr style="height:50px">
				<td>&nbsp; </td>
				</tr>
				</table>

				<table align="center">
				<tbody>
				<tr>
				<td>Une vente a ete initie, verifiez si l\'achat est valide et cliquez sur le lien suivant: <a href="'.$url_ste.'/administration/stock-factures.php" alt="user">'.$url_ste.'/administration/stock-factures.php'.'</a></td>
				</tr>
				</tbody>
				</table>

				<table>
				<tbody>
				<tr style="height:30px">
				<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>

			</body>
		</html>';
    $mail->AltBody = 'Une vente a ete initie, validez la vente apres verification en cliquant sur le lien suivant: '.$url_ste.'/administration/stock-factures.php';

    $mail->send();