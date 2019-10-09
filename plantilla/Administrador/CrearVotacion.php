<!DOCTYPE html>
<?php
include "Plantilla.php";
?>
<html lang="en">

<form class="" action="" method="post">
  <table>
    <tr>
      <td>Ingrese nombre de las votaciones</td>
      <td><input type="text" name="realname" value=""></td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td>Ingrese fecha de inicio</td>
      <td>
        <input type="date" name="feI" value="">
      </td>
    </tr>
    <tr>
      <td>Ingrese fecha de culminacion</td>
      <td>
        <input type="date" name="feF" value="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="submit" value="Crear Votacion" class="btn btn-primary">
      </td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['submit'])){
  $realname=$_POST['realname'];
  $fecha_inicio=$_POST['feI'];
  $fecha_final=$_POST['feF'];
  if(empty($realname)){
    ?>
    <script type="text/javascript">
    alert("Esta vacia el nombre");
    </script>
    <?php
    return;
  }else{
    include "Funciones.php";
    CrearVotacion($realname,$fecha_inicio,1,$fecha_final);
    ?>
    <script type="text/javascript">
    location.href="./Plantilla.php";
  </script>
  <?php
}

}
?>
