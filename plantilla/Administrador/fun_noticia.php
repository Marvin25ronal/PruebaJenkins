<?php

function ingresar_noticia($conn, $titulo, $texto, $user,$imagen)
{
	$consulta="INSERT INTO noticia (id,nombre_noticia,texto,creador,imagen) VALUES(NULL,\"$titulo\",\"$texto\",$user,\"$imagen\");";
	//
	$resultado = mysqli_query( $conn, $consulta ) or die ( " algo salio mal");
	return true;
	//INSERT INTO `noticia` (`id`, `nombre_noticia`, `texto`, `creador`, `imagen`) VALUES (NULL, 'jajajaj', 'asdfasdf', '1234', NULL);
}


function eliminar_noticia($conn, $id)
{
	$consulta="DELETE FROM noticia WHERE id=$id;";
	//printf($conn);
	$resultado = mysqli_query( $conn, $consulta ) or die ( " algo salio mal");
	return true;
	//$query = "delete from $tabla_db1 where id = '$id'";
}

function actualizar_noticia($conn, $id,$titulo,$texto)
{
	$consulta="UPDATE noticia SET noticia.nombre_noticia=\"".$titulo."\", noticia.texto=\"".$texto."\" WHERE noticia.id=$id;";
	//printf($conn);
	$resultado = mysqli_query( $conn, $consulta ) or die ( " algo salio mal");
	return true;
	//$query = "delete from $tabla_db1 where id = '$id'";
}


/*
function ActualizarVotacion($id,$nombre,$fechaini,$estado,$fechafin){
  $fecha_inicial = strtotime($fechaini);
  $fecha_final=strtotime($fechafin);
  if($fecha_final<$fecha_inicial){
    return "false";
  }
  $consulta="update votacion set votacion.estado=\"".$estado."\", votacion.fecha_inicio=\"".$fechaini."\",votacion.fecha_fin=\"".$fechafin."\",votacion.nombre=\"".$nombre."\" where votacion.id=\"".$id."\";";
  $res=query($consulta);
  if($res==="Mal3"){
    return "false";
  }
  return "true";
}
*/

/*
function CrearVotacion($nombre,$fechainicial,$estado,$fechafinal){
	$consulta="INSERT INTO votacion (estado,fecha_inicio,fecha_fin,nombre) VALUES(1,\"".$fechainicial."\",\"".$fechafinal."\",\"".$nombre."\");";
	$res=query($consulta);
	include "../notificacion.php";
	notificar_nueva_votacion($nombre);
	return true;
  }
*/

?>