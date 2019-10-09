<!DOCTYPE html>
<?php

?>
<html lang="en">
<?php
include "Plantilla.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  require "Funciones.php";
  $consulta="SELECT * FROM votacion where id=".$id.";";
  $resultado=query($consulta);
  $cl = mysqli_fetch_array( $resultado );

  //$resul=
  ?>
  <form class="" action="" method="post">
    <h3>Nombre</h3>
    <br>
    <br>
    <input type="text" name="nombre" value="<?php print($cl[1]);?>">
    <br>
    <h3>Fecha de incio</h3>
    <br>
    <input type="date" name="fechain"  value="<?php print($cl[2]) ?>">
    <br>
    <?php

    if($cl[3]==1){
      ?>
      <label>
        <input type="checkbox" name="estado" checked="true" value="">Activa
      </label>
      <?php
    }else{
      ?>
      <label>
        <input type="checkbox" name="estado"  value="">Activa
      </label>
      <?php

    }

    ?>
    <br>
    <input type="date" name="fechafin" value="<?php print($cl[4]); ?>">
    <input type="submit" name="submit" value="Actualizar" class="btn btn-success">
  </form>
  <?php

}

if(isset($_POST['submit'])){
  $realname=$_POST['nombre'];
  $fecha_inicio=$_POST['fechain'];
  $fecha_final=$_POST['fechafin'];
  if(empty($realname)){
    ?>
    <script type="text/javascript">
    alert("Esta vacia el nombre");
    </script>
    <?php
    return;
  }else{
    //  include "Funciones.php";
    $resultado=  ActualizarVotacion($id,$realname,$fecha_inicio,1,$fecha_final);
    print($resultado."Este es el resultado");
    if($resultado==="true"){
      ?>
<script type="text/javascript">
  	location.href="./Plantilla.php";
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
