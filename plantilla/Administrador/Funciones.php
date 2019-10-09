<?php

function CrearVotacion($nombre,$fechainicial,$estado,$fechafinal){
  $consulta="INSERT INTO votacion (estado,fecha_inicio,fecha_fin,nombre) VALUES(1,\"".$fechainicial."\",\"".$fechafinal."\",\"".$nombre."\");";
  $res=query($consulta);
  include "../notificacion.php";
  notificar_nueva_votacion($nombre);
  return true;
}
function query( $query ) {
  include "../Contra.php";
  /*$usuario = "root";
  $password = "85296473";
  $servidor = "localhost:3306";
  $basededatos = "db_votos";*/
  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("Mal1");
  // Selección del a base de datos a utilizar
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Mal2" );
  $resultado = mysqli_query( $conexion, $query ) or die ( "Mal3");
  mysqli_close( $conexion );
  return  $resultado;
}
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
function EliminarVotacion($id){
  $consulta1="delete from ya_voto where ya_voto.votacion=\"".$id."\";";
  $consulta2="delete from candidato where candidato.votacion=\"".$id."\";";
  $consulta3="delete from votacion where votacion.id=\"".$id."\";";
  $res=query($consulta1);
  echo($res."Este es uno");
  if($res==="Mal3"){
    return "false";
  }
  $res=query($consulta2);
  echo($res."Este es 2");
  if($res==="Mal3"){
    return "false";
  }
  $res=query($consulta3);
  echo($res);
  if($res==="Mal3"){
    return "false";
  }
  return "true";
}
function CrearCargo($nombre,$descripcion,$modo,$id){
  $consulta="";
  if($modo===0){
    $consulta="update cargo set cargo.nombre=\"".$nombre."\",cargo.descripcion=\"".$descripcion."\" where id=\"".$id."\";";
  }else{
    $consulta="insert into cargo (nombre,descripcion)values(\"".$nombre."\",\"".$descripcion."\");";
  }

  $res=query($consulta);
  if($res==="Mal3"){
    return "false";
  }
  return "true";
}
function EliminarCargo($id){
  $consulta1="delete from ya_voto where ya_voto.cargo=\"".$id."\";";
  $consulta2="delete from candidato where candidato.cargo=\"".$id."\";";
  $consulta3="delete from cargo where cargo.id=\"".$id."\";";
  $res=query($consulta1);
  echo($res."Este es uno");
  if($res==="Mal3"){
    return "false";
  }
  $res=query($consulta2);
  echo($res."Este es 2");
  if($res==="Mal3"){
    return "false";
  }
  $res=query($consulta3);
  echo($res);
  if($res==="Mal3"){
    return "false";
  }
  return "true";
}
function AgregarElemento($idvotacion,$cargo,$usuario){
  $pregunta="select * from candidato where usuario=".$usuario." and cargo=".$cargo." and votacion=".$idvotacion;
  $cantidad=query($pregunta);
  if(mysqli_num_rows($cantidad)>0){
    return "false";
  }
  $consulta="insert into candidato(usuario,cargo,votacion,nvotos) values (".$usuario.",".$cargo.",".$idvotacion.",0);";
  $res=query($consulta);
  if($res==="Mal3"){
    return "false";
  }
  return "true";
}



?>
