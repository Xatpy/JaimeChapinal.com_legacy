<?php
//Correo de destino; donde se enviará el correo.
$correoDestino = "jaime.chapinal@gmail.com";

//Texto emisor; sólo lo leerá quien reciba el contenido.
$textoEmisor = "MIME-VERSION: 1.0\r\n";
$textoEmisor .= "Content-type: text/html; charset=UTF-8\r\n";

/*
	Recopilo los datos vía POST
	Con strip_tags suprimo etiquetas HTML y php para evitar una posible inyección.
	Como no gestiona base de datos no es necesario limpiar de inyección SQL.
*/
$nombre = strip_tags($_POST['name']);
$correo = strip_tags($_POST['email']);
$subject = strip_tags($_POST['subject']);
$comentario = strip_tags($_POST['message']);
$fecha = time();
/*$fechaFormateada = date("j/n/Y", $fecha);*/
$fechaFormateada = date("c", $fecha);

//Formateo el asunto del correo
$asunto = "Contacto web jaimechapinal.com: $nombre ; ";

//Formateo el cuerpo del correo
$cuerpo = "Enviado por: " . $nombre . " "  . " a las " . $fechaFormateada . "\n";
$cuerpo .= "Asunto: " . $subject . "\n";
$cuerpo .= "E-mail: " . $correo . "\n";
$cuerpo .= "Comentario: " . $comentario;

// Envío el mensaje
echo("Send");
mail( $correoDestino, $asunto, $cuerpo, "From: Web Jaime Chapinal <mail@jaimechapinal.com>");
?>