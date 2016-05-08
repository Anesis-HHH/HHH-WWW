<?php

//Reglage du fuseau horaire
date_default_timezone_set('Europe/Paris');

require 'phpmailer/PHPMailerAutoload.php';

//Appel PHP Mailer
$mail = new PHPMailer();

// encodage de l'email (doit être similaire à la source).
$mail->CharSet = 'UTF-8';

// Selection du protocole SMTP
// $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Adresse SMTP
$mail->Host = "smtp.hhh-world.com";
//Port SMTP (25, 465 ou 587)
$mail->Port = 25;
//Authentification activé ?
$mail->SMTPAuth = true;
//Login SMTP 
$mail->Username = "contact@hhh-world.com";
//Password SMTP
$mail->Password = "tiramisu";

//EXPEDITEUR 
$mail->setFrom('contact@hhh-world.com', 'Contact HHH');
//ADRESSE DE REPONSE
$mail->addReplyTo($email,$nom);
//DESTINATAIRE
$mail->addAddress('contact@hhh-world.com', 'Contact HHH');

//SUJET DU MAIL 
$mail->Subject = "Nouveau message sur HHH";

//Pour inclure une page html externe au lieu du simple html : 
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__)); 

//MESSAGE html
$messmail=nl2br($contenu);// on ajoute les sauts de ligne html


$mail->msgHTML('<html><body><table width="580" align="center" cellpadding="0" cellspacing="0" style="font-family:sans-serif;border-style:solid;border-width:2px;border-color:#999"><tr><td width="580" style="font-size: 20px;background-color:#999;color:#FFF;padding:5px;">Vous avez reçu un nouveau message.</td></tr><tr><td style="color: #494949;font-size: 12px;padding:5px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#E4E4E4;background-color: #E4E4E4">De : '.$nom.'<br/> Mail : '.$email.'</td></tr><tr><td style="font-size:14px;padding: 10px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#E4E4E4">'.$messmail.'</td></tr><tr><td style="font-size:10px;padding: 5px;"></td></tr></table></body></html>');

//MESSAGE texte
$mail->AltBody = 'Vous avez reçu un nouveau de message de '.$nom.'\r\n Mail : '.$email.'\r\n'.$messmail;

//pour attacher un fichier :
// $mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
