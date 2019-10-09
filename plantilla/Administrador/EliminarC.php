<?php
include "Funciones.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  EliminarCargo($id);
}
header('Location: Plantilla.php?funcion=5');
?>
