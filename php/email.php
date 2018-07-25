<?php

require("PHPMailer/class.phpmailer.php");

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // send via SMTP
$mail->Host = "mail.innove.co.cr";  // SMTP servers
$mail->Port = '465'; // SMTP servers
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "info@innove.co.cr";  // SMTP username
$mail->Password = "info07*"; // SMTP password

$mail->From = "info@innove.co.cr";
$mail->FromName = "Innove Mailer";

 
$mail->IsHTML(true); // send as HTML
$mail->SMTPSecure = 'ssl';

$mail->AddAddress("info@innove.co.cr", "Info Innové, S.A.");

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->Subject = "Se recibio un mensaje desdes el Sitio Web";

$msj = "Se recibió un mensaje por medio de un formulario del sitio Web, el menajes es el siguiente:<br><br>";
$msjAlt = "Se recibió un mensaje por medio de un formulario del sitio Web, el menajes es el siguiente: \n";


foreach($_GET as $key => $val){
	$msj .= "<b>" . $key . "</b>: " . $val . "<br>";
	$msjAlt .= $key . ": " . $val . ". \n";
}


$mail->Body    = $msj;
$mail->AltBody = $msjAlt;

if(!$mail->Send())
{
   echo "No se puedo enviar el mensaje. Por favor, escribanos a info@innove.co.cr.";
   exit;
}

echo "OK";
?>
