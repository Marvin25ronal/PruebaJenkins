<?php

	include_once __DIR__."/funciones.php";

	function notificar($correo, $asunto, $cuerpo){
		$cuerpo = '
					<html>
					<head>
 					<title></title>
					</head>
					<body>
					<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">'.$asunto.'<br /></span></h1>
<p>'.$cuerpo.'</p>
<p>Para más información ingrese al <a href="http://localhost:8080/Analisis-Grupo5/Plantilla/index.php">Sistema de Votaciones en L&iacute;nea USAC.&nbsp;</a></p>
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
		if(mail($correo,$asunto,$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
    	}
	}

	function notificarTodos($asunto, $cuerpo){
		$cuerpo = '
					<html>
					<head>
 					<title></title>
					</head>
					<body>
					<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">'.$asunto.'<br /></span></h1>
<p>'.$cuerpo.'</p>
<p>Para más información ingrese al <a href="http://localhost:8080/Analisis-Grupo5/Plantilla/index.php">Sistema de Votaciones en L&iacute;nea USAC.&nbsp;</a></p>
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
		$correos = obtener_correos();
		if(mail($correos,$asunto,$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
    	}
	}

	function notificar_modificacion_informacion_candidato( $correo ) {
		$cuerpo = '
					<html>
					<head>
 					<title></title>
					</head>
					<body>
					<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">Modific&oacute; su informaci&oacute;n de candidato<br /></span></h1>
<p>Se modifico la informaci&oacute;n de su perfil de candidato. </p>
<p>Para ver las modificaciones ingrese al <a href="http://localhost:8080/Analisis-Grupo5/Plantilla/index.php">Sistema de Votaciones en L&iacute;nea USAC.&nbsp;</a></p>
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
		if(mail($correo,'Modificación de información - SVLUSAC',$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
    	}
	}

	function notificar_voto( $correo, $votacion ) {
		$cuerpo = '
					<html>
					<head>
 					<title></title>
					</head>
					<body>
					<h1 style="color: #5e9ca0; text-align: center;"><span style="color: #2b2301;">Ingres&oacute; un voto<br /></span></h1>
<p>Se ingres&oacute; su voto en las votaciones '.$votacion.'.</p>
<p>Para ver los resultados en tiempo real ingrese al <a href="http://localhost:8080/Analisis-Grupo5/Plantilla/index.php">Sistema de Votaciones en L&iacute;nea USAC.&nbsp;</a></p>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://i.ibb.co/NSLjL4S/LOGO.jpg" alt="LOGO" width="242" height="237" border="0" /></p>
					</body>
					</html>
					';
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$nombre = "Sistema de Votaciones en Linea USAC";
		$emisor = "ingenieria.analisisydiseno@gmail.com";
		$headers .= "From: ".$nombre." <".$emisor.">\r\n";
		if(mail($correo,'Ingresó un voto - SVLUSAC',$cuerpo,$headers)){
        	return true;
    	}else{
        	return false;
    	}
	}

	function obtener_correos(){
		$consulta = queryLog("select correo from usuario;");
		$cadena = "";
		while($correos = mysqli_fetch_array($consulta)){
    		$cadena = $cadena.$correos["correo"].',';
		}

		$cadena = substr_replace($cadena ,"", -1);
		return $cadena;
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
?>
