<!DOCTYPE html>
<?php

?>
<html lang="en">
<?php
include "Plantilla.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  //require "Funciones.php";
  require "fun_noticia.php";
  $consulta="SELECT * FROM noticia where id=".$id.";";

  require "../Contra.php";

  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );

  $resultado = mysqli_query( $conexion, $consulta ) or die ( "algo salio mal");

  // $resultado=query($consulta);
  $cl = mysqli_fetch_array( $resultado );

  //$resul=
  ?>
  <form class="" action="" method="post">
    <h3>Nombre</h3>
    <br>
    <br>
    <input type="text" name="nombre" value="<?php print($cl[1]);?>">
    <br>
    <h3>Texto</h3>
    <br>
    
    <textarea name="texto" rows="8" cols="60"><?php print($cl[2]); ?></textarea>
    <br>

    <input type="submit" name="submit" value="Actualizar" class="btn btn-success">
  </form>
  <?php

}

if(isset($_POST['submit'])){
  $realname=$_POST['nombre'];
  $texto=$_POST['texto'];
  if(empty($realname)){
    ?>
    <script type="text/javascript">
    alert("Esta vacio el nombre");
    </script>
    <?php
    return;
  }else{
    //  include "Funciones.php";
    //include "fun_noticia.php";
    $resultado=  actualizar_noticia($conexion,$id,$realname,$texto);
    print($resultado." Este es el resultado");
    if($resultado==true){
      ?>
<script type="text/javascript">
  	location.href="./listado_noticias.php";
</script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        alert("No  se puede modificar asi los datos");
      </script>
      <?php
    }
    ?>
  <?php
}

}


?>
