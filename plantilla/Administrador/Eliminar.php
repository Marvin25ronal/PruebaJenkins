<?php
include "Funciones.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  EliminarVotacion($id);
}
header('Location: Plantilla.php');
?>
