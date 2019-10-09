<?php
include "fun_noticia.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  require "../Contra.php";

  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
  eliminar_noticia($conexion,$id);
}
header('Location: listado_noticias.php');
?>
