<?php
if(isset($_POST['mensaje']) && !empty($_POST['email']))
{

	

	if(!empty($_FILES['archivo']['name']))
	{
		

		$nombre = "Sistema de Votaciones en Linea USAC";
		$apellido="";
		$mail="ingenieria.analisisydiseno@gmail.com";
		$mensaje=$_POST['mensaje'];
		//$correox = "ingenieria.analisisydiseno@gmail.com";

		$nameFile = $_FILES['archivo']['name'];
		$sizeFile= $_FILES['archivo']['size'];
		$typeFile= $_FILES['archivo']['type'];
		$tempFile= $_FILES['archivo']['tmp_name'];

		$fecha= time();
		$fechaFormato = date("j/n/Y",$fecha);
		
		//$correoDestino = "info@escuelactec.com";
		$correoDestino = "ingenieria.analisisydiseno@gmail.com";
		
		//asunto del correo
		$asunto = 'Se ha creado una nueva denuncia con Imagen- SVLUSAC';

		// -> mensaje en formato Multipart MIME
		$cabecera = "MIME-VERSION: 1.0\r\n";
		$cabecera .= "Content-type: multipart/mixed;";
		$cabecera .="boundary=\"=C=T=E=C=\"\r\n";
		//$headers .= "From: ".$nombre." <".$correox.">\r\n";
		$cabecera .= 'From: {$mail}';

		//Primera parte del mensaje (texto plano)
		//    -> encabezado de la parte

		$cuerpo = "--=C=T=E=C=\r\n";
		$cuerpo .= "Content-type: text/plain";
		$cuerpo .= "charset=utf-8\r\n";
		$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n";
		$cuerpo .= "\r\n"; // línea vacía
		$cuerpo .= "Correo enviado por: " . $nombre . " ". $apellido;
		$cuerpo .= " con fecha: " . $fechaFormato;
		$cuerpo .= '
					<html>
					<head>
 						<title></title>
					</head>
					<body>
						<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">Nueva Denuncia</span></h1>
						<p>Notificar a: </strong><br />'.$_POST['email'].'</p>
						<p>Se cre&oacute; una nueva denuncia en l&iacute;nea <strong>Mensaje: </strong> <br />'.$_POST['mensaje'].'</p>
						<p>&nbsp;</p>
						<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://i.ibb.co/NSLjL4S/LOGO.jpg" alt="LOGO" width="242" height="237" border="0" /></p>
					</body>
					</html>
					';
		//$cuerpo .= "Email: " . $mail;
		//$cuerpo .= "Mensaje: " . $mensaje;
		$cuerpo .= "\r\n";// línea vacía

		// -> segunda parte del mensaje (archivo adjunto)
			//    -> encabezado de la parte
		$cuerpo .= "--=C=T=E=C=\r\n";
		$cuerpo .= "Content-Type: application/octet-stream; ";
		$cuerpo .= "name=" . $nameFile . "\r\n";
		$cuerpo .= "Content-Transfer-Encoding: base64\r\n";
		$cuerpo .= "Content-Disposition: attachment; ";
		$cuerpo .= "filename=" . $nameFile . "\r\n";
		$cuerpo .= "\r\n"; // línea vacía

		$fp = fopen($tempFile, "rb");
		$file = fread($fp, $sizeFile);
		$file = chunk_split(base64_encode($file));

		$cuerpo .= "$file\r\n";
		$cuerpo .= "\r\n"; // línea vacía
		$cuerpo .= "--=C=T=E=C=--\r\n";


		//Enviar el correo

		if(mail($correoDestino, $asunto, $cuerpo, $cabecera)){
			echo "Correo enviado...";
			header('Location: denuncias.php');
		}else{
			echo "Correo NO enviado...";
			header('Location: denuncias.php');
		}
	}else
	{
		$cuerpo = '
					<html>
					<head>
 						<title></title>
					</head>
					<body>
						<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">Nueva Denuncia</span></h1>
						<p>Notificar a: </strong><br />'.$_POST['email'].'</p>
						<p>Se cre&oacute; una nueva denuncia en l&iacute;nea <strong>Mensaje: </strong> <br />'.$_POST['mensaje'].'</p>
						<p>&nbsp;</p>
						<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://i.ibb.co/NSLjL4S/LOGO.jpg" alt="LOGO" width="242" height="237" border="0" /></p>
					</body>
					</html>
					';

		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$nombre = "Sistema de Votaciones en Linea USAC";
		$correox = "ingenieria.analisisydiseno@gmail.com";
		$headers .= "From: ".$nombre." <".$correox.">\r\n";
		$correo ="ingenieria.analisisydiseno@gmail.com";

		if(mail($correo,'Se ha creado una nueva denuncia - SVLUSAC',$cuerpo,$headers))
		{
			echo "Correo enviado...";
			header('Location: denuncias.php');
			//return true;
		}else
		{
			echo "Correo NO enviado...";
			header('Location: denuncias.php');
			//return false;
		}

	}
	
	
	/*
	$destino = "ingenieria.analisisydiseno@gmail.com";
	$desde = "From: ". "Sistema de votación";
	$asunto = "Nueva denuncia";
	$mensaje = $_POST['mensaje'];
	mail($destino,$asunto,$mensaje,$desde);
	echo "Correo enviado...";
	*/
}else
{
	echo "Problemas al enviar";
	header('Location: denuncias.php');
}


//************************************ */

/*
<?php
//recipient
$to = 'recipient@example.com';

//sender
$from = 'sender@example.com';
$fromName = 'Programacion.net';

//email subject
$subject = 'PHP Email with Attachment'; 

//attachment file path
$file = "archivo.pdf";

//email body content
$htmlContent = '<h1>PHP Email with Attachment</h1>
    <p>This email has sent from PHP script with attachment.</p>';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "nMIME-Version: 1.0n" . "Content-Type: multipart/mixed;n" . " boundary="{$mime_boundary}""; 

//multipart boundary 
$message = "--{$mime_boundary}n" . "Content-Type: text/html; charset="UTF-8"n" .
"Content-Transfer-Encoding: 7bitnn" . $htmlContent . "nn"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name="".basename($file).""n" . 
        "Content-Disposition: attachment;n" . " filename="".basename($file).""; size=".filesize($file).";n" . 
        "Content-Transfer-Encoding: base64nn" . $data . "nn";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//email sending status
echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";


*/

/*
$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$nombre = "Sistema de Votaciones en Linea USAC";
		$correox = "ingenieria.analisisydiseno@gmail.com";
		$headers .= "From: ".$nombre." <".$correox.">\r\n";
		if(mail($correo,$asunto,$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
		}
		


function notificar_nueva_votacion( $votacion ) {
		$cuerpo = '
					<html>
					<head>
 					<title></title>
					</head>
					<body>
					<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">Nueva Votaci&oacute;n en Linea</span></h1>
<p>Se cre&oacute; la nueva votaci&oacute;n en l&iacute;nea "<strong>'.$votacion.'</strong>". <br />Para votar, ingresa al <a href="http://localhost:8080/Analisis-Grupo5/Plantilla/index.php">Sistema de Votaciones en L&iacute;nea USAC.&nbsp;</a></p>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://i.ibb.co/NSLjL4S/LOGO.jpg" alt="LOGO" width="242" height="237" border="0" /></p>
					</body>
					</html>
					';
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$nombre = "Sistema de Votaciones en Linea USAC";
		$correo = "ingenieria.analisisydiseno@gmail.com";
		$headers .= "From: ".$nombre." <".$correo.">\r\n";
		$correos = "nada";
		$correos = obtener_correos();
		if(mail($correos,'Se ha creado una nueva votación - SVLUSAC',$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
    	}
	}



*/

?>


