<?php
require "./Funciones.php";
if(isset($_GET["votacion"])){
  $votacion=$_GET["votacion"];
  $usuario=$_GET["usuario"];
  $cargo=$_GET["cargo"];
  $consulta="delete from candidato where candidato.usuario=".$usuario." and cargo=".$cargo." and votacion=".$votacion.";";
  printf($consulta);
  $res=query($consulta);
  header('Location: AgregarCargos.php?funcion=7&id='.$votacion);
}

 ?>
