<?php
include "Plantilla.php";
include "Funciones.php";
$mensaje="";
if(isset($_GET["id"])){
  //es la pagina de editar

  $id=$_GET["id"];
  $cdatos="Select * from cargo where id=\"".$id."\"";
  $resultado=query($cdatos);
  $cl = mysqli_fetch_array( $resultado );
  ?>
  <form class="" action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre de Cargo</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" value="<?php print($cl[1]); ?>">
      <br>
      <label for="">Descripcion </label>
      <br>
      <textarea name="descripcion" rows="8" cols="80"><?php print($cl[2]); ?></textarea>
      <input type="submit" name="submit" value="Actualizar">
      <small id="emailHelp" class="form-text text-muted"><?php echo $mensaje; ?></small>
    </div>
  </form>
  <?php

  //se agrega los datos
}else{
  ?>

  <form class="" action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre de Cargo</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre">
      <br>
      <label for="">Descripcion </label>
      <br>
      <textarea name="descripcion" rows="8" cols="80"></textarea>
      <input type="submit" name="submit" value="Crear">
      <small id="emailHelp" class="form-text text-muted"><?php echo $mensaje; ?></small>
    </div>
  </form>

  <?php
}
if(isset($_POST['submit'])){

  $nombre=$_POST['nombre'];
  $descripcion=$_POST['descripcion'];
  if(empty($nombre)){
    ?>
    <script type="text/javascript">
    alert("Esta vacia el nombre");
    </script>
    <?php
    return;
  }else{

    if(isset($id)){
      $res=CrearCargo($nombre,$descripcion,0,$id);
      ?>
      <script type="text/javascript">
      location.href="Plantilla.php?funcion=5";
      </script>
      <?php
      return;
    }
    $res=CrearCargo($nombre,$descripcion,1,0);
    if($res==="false"){
      $mensaje="No se puede agregar ese registro";
    }else{
      ?>
      <script type="text/javascript">
      location.href="./Plantilla.php";
      </script>
      <?php
    }
  }
}




?>
