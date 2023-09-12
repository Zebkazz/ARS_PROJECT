<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'models/PHPMailer/src/Exception.php';
require 'models/PHPMailer/src/PHPMailer.php';
require 'models/PHPMailer/src/SMTP.php';


function sendemail($mail_ema, $mail_upa, $mail_sfe, $mail_name, $txt_link, $txt_mess, $mail_asun, $template){
	//require 'PHPMailer/get_oauth_token.php';
	
	$mail = new PHPMailer(true);
	$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
	$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
	$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
	$mail->Username = $mail_ema;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
	$mail->Password = $mail_upa; 		// Tu contraseña de gmail
	$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
	$mail->Port = 587;                          // Puerto TCP  para conectarse 
	$mail->setFrom($mail_sfe, $mail_name);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_sfe, $mail_name);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_sfe);   // Agregar quien recibe el e-mail enviado
	$message = file_get_contents($template);
	$message = str_replace('{{first_name}}', $mail_name, $message);
	$message = str_replace('{{message}}', $txt_mess, $message);
	$message = str_replace('{{customer_email}}', $mail_sfe, $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	
	$mail->Subject = $mail_asun;
	$mail->msgHTML($message);
	if(!$mail->send()) {
		echo '<p style="color:red">No se pudo enviar el mensaje..';
		echo 'Error de correo: ' . $mail->ErrorInfo;
		echo "</p>";
	} else {
		echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
	}
}
?>