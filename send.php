<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$to = "soporte@ecoxonline.com"; 


// recogeremos los datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$telefono = $_POST['phone'];
$mensaje = nl2br($_POST['mensaje']);

if($nombre == "" || $email == "" || $telefono == "" || $mensaje == ""):
	echo '<div class="alert alert-block alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	Todos los campos son requeridos para el envio</div>';
else:

	$mail->From = $email;
	$mail->FromName = "Ecos Online";
	$mail->addAddress($to);
	$mail->Subject = $nombre;
	$mail->isHtml(true);
	$mail->Body = '<strong>'.$nombre.'</strong> le ha contactado desde su web, y le ha enviado el siguiente mensaje: <br><br><p>'.$mensaje.'</p>'.'<strong>Correo Electronico: </strong>'.$email.'</br></br>'.'<strong>Telefono: </strong>'.$telefono;

	$mail->CharSet = 'UTF-8';
	$mail->send();
	echo '<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Tu Mensaje ha sido enviado. </strong></div>';
	
endif;

?>
