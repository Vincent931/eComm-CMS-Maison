<?php //mail php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//phpmailer

//MAIL POUR LE NOUVEAU CLIENT
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $serveur_mail;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $mdp;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to 587 pas 465
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);//'Mailer'
    $mail->addAddress($mail1, $nom_ste); 
    //$mail->addAddress('test@ckoi-7art.com');               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');//ajouté une réponse
    //$mail->addCC('vincentnguyen332@gmail.com');
    //$mail->addBCC('master@www-1-zero.fr');

    // Attachments
     //image
    //$mail->AddEmbeddedImage("bandeau-mail.png", $url_ste."/publicimgs/bandeau-mail.png", "bandeau-mail.png");
    //$mail->Body = <img alt="www-1-zero" src="https://www-1-zero.fr/publicimgs/bandeau-mail.png">;
    $mail->AddAttachment($pdf_insert);         // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name

    // Content
$mail->isHTML(true);

$mail->Subject ="Confirmation de compte sur ".$url_ste;                 

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
              <td style="valign:bottom;text-align:center;mso-line-height-rule: exactly;line-height:25px;font-size:18px">De '.$nom_ste.' :</td>
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
              <td style="margin:auto;valign:bottom;text-align:center;width:300px"><img style="width:300px;text-align:center;margin:auto" alt="'.$nom_ste.'-Bandeau-mail" src="'.$url_ste.'/publicimgs/'.$image.'">
              </tr>
              </table>
              </tbody>

              <table width="100%">
              <tbody>
              <tr style="height:25px">
              <td>&nbsp;</td>
              </tr>
              </tbody>
              </table>


              <table align="center">
              <tbody>
              <tr style="height:50px">
              <td>&nbsp;</td>
              </tr>
              </tbody>
              </table>

              <table style="text-align:center;margin:auto">
              <tbody>
              <tr style="text-align:center;margin:auto">
              <td  style="text-align:left;margin:auto;width:600px">'.$mail_compte.'</td>
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

              <table style="text-align:center;margin:auto">
              <tbody>
              <tr style="text-align:center;margin:auto">
              <td style="text-align:center;margin:auto"><a style="text-decoration:none;border-radius:10px/10px;color:white;background-color:black;padding:4px;text-align:center;margin:auto" href="'.$url_ste.'/compte-ok-'.$mail1.'&key='.urlencode($key).'">Confirmez Compte</a></td>
              </tr>
              </tbody>
              </table>
           </body>
        </html>';// HTML version of the email

$mail->AltBody =  $mail_compte. ' Confirmez votre compte en cliquant sur ce lien ou en l\'ajoutant dans votre navigateur. '.$url_ste.'/confirmation-compte.php?mail='.urlencode($mail1).'&key='.urlencode($key) ;// Text version of the email

 $mail->send();
 } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }

//MAIL POUR L'administrateur
$mail = new  PHPMailer\PHPMailer\PHPMailer ;

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $serveur_mail;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mail_ste;                     // SMTP username
    $mail->Password   = $mdp;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                   // TCP port to connect to 587
    //Recipients
    $mail->setFrom($mail_ste, $nom_ste);//'Mailer'
    $mail->addAddress($mail_ste, $nom_ste); 
    //$mail->addAddress('test@ckoi-7art.com');               // Name is optional
    //$mail->addReplyTo('vincentnguyen332@gmail.com', 'Information');//ajouté une réponse
    //$mail->addCC('vincentnguyen332@gmail.com');
    //$mail->addBCC('master@www-1-zero.fr');

    // Attachments
     //image
    //$mail->AddEmbeddedImage("bandeau-mail.png", $url_ste."/publicimgs/bandeau-mail.png", "bandeau-mail.png");
    //$mail->Body = <img alt="www-1-zero" src="https://www-1-zero.fr/publicimgs/bandeau-mail.png">;

    //$mail->addAttachment('../publicimgs/grille-tarifs.pdf');         // Add attachments
    //$mail->addAttachment('publicimgs/bandeau-mail.png', 'www-1-zero-Bandeau');    // Optional name

    // Content
$mail->isHTML(true);

$mail->Subject ="Creation de Compte sur ".$nom_ste;                 

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
              <table align="center">
              <tr style="width:100%;text-align:center;margin:auto">
              <td style="text-align:center;width:300px;margin:auto"><img alt="'.$nom_ste.'-Bandeau-mail" src="'.$url_ste.'/publicimgs/'.$image.'"/></td>
              </tr>
              </table>
              </tbody>

              <table align="center">
              <tbody>
              <tr style="height:50px">
              <td>&nbsp;</td>
              </tr>
              </tbody>
              </table>

              <table style="text-align:center;margin:auto">
              <tbody>
              <tr style="text-align:center;margin:auto;width:600px">
              <td style="width:600px;text-align:center;margin:auto"><span style="margin:auto;text-align:center"><a style="text-decoration:none;border-radius:10px/10px;color:white;background-color:black;padding:4px;text-align:center;margin:auto" href="'.$url_ste.'/administration/comptes.php">Listing de compte </a></span><br><br> Cet email est automatique des lors d\'une modification ou creation de compte.<br>Il peut s\'agir d\'une initialisation de vente (validee ou non)...</td>
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
              </html>';// HTML version of the email

$mail->AltBody =  $url_ste.'/administration/comptes.php Ce compte est ajoute, lister le en cliquant sur ce lien ou en l\'ajoutant dans votre navigateur. ';// Text version of the email

 $mail->send();
 } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
