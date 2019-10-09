<?php
include "Funciones.php";
if(isset($_GET["id"])){
  $idvotacion=$_GET["id"];
  $idusuario=$_GET["usuario"];
  $idcargo=$_GET["cargo"];
  $res=  AgregarElemento($idvotacion,$idcargo,$idusuario);
  if($res==="false"){
    header('Location: AgregarCargos.php?funcion=7&id='.$idvotacion."&msg=El dato ya existe");
  }else{
    header('Location: AgregarCargos.php?funcion=7&id='.$idvotacion);
  }
}
?>
