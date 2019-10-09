<?php
include "Plantilla.php";
include_once "Funciones.php";
include_once "../Compartir/Compartir.php";
if(isset($_GET['id'])){

  $te="select * from noticia where id=4;";
  $consulta=query($te);
  $cl = mysqli_fetch_array($consulta);
  $nombre=$cl[1];
  $contenido=$cl[2];
  $img=$cl[4];
}
if(isset($_POST["graf"])){
  //se viene los datos para Compartir
  $nombre=$_POST['nombre'];
  $contenido=$_POST['informacion'];
  $img=$_POST['graf'];
  $correo=$_POST['DESTINATARIO'];
  $cuerpo=$_POST['DESCRIPCION'];
  $noticia=new Compartir;
  $noticia->CompartirNoticia($nombre,$contenido,$correo,$cuerpo,$img);
  ?>
  <script type="text/javascript">
    location.href="./Plantilla.php?funcion=100";
  </script>
  <?php
}
?>

<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Compartir Noticia</h2>
  </div>
  <div class="panel-body">
    <div class="container-fluid">
      <form class="" action="CompartirNoticia.php" method="post" onsubmit="funcion();">
        <br>
        <h4>Correos</h4>
        <div class="input-group mb-3">
          <input type="text" size="100" class="form-control" id="x" name="DESTINATARIO" placeholder="correos separados por coma" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <br>
        <h4>Cuerpo</h4>
        <div class="input-group mb-3">
          <textarea class="form-control" rows="10" id="y" cols="100" name="DESCRIPCION" aria-label="With textarea"></textarea>
        </div>
        <br>
        <input type="hidden" id="graf"  name="graf" value="">
        <input  type="hidden" id="nombre" name="nombre" value="">
        <input type="hidden"  id="informacion" name="informacion" value="">
        <input type="submit" name="send" value="Enviar correo" class="btn btn-success">
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function funcion(){
  document.getElementById("graf").value="<?php echo $img; ?>";
  document.getElementById("nombre").value="<?php echo $nombre; ?>";
  document.getElementById("informacion").value="<?php echo str_replace("\n", "\\n \\r", str_replace("\r","",$contenido)); ?>";
  //var sus=document.getElementById("informacion").value;
  //sus=sus.replace("<br>","TT");
  //document.getElementById("informacion").value=sus;
}
</script>
<?php*/
}

?>
