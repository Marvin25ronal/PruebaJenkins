<?php
require "Plantilla.php";

if(isset($_POST["datos"])){
  $grafica=$_POST["datos"];
  $nombre=$_POST["nombre"];
  $informacion=$_POST["informacion"];
}
?>

<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Compartir grafica</h2>
  </div>
  <div class="panel-body">
    <div class="container-fluid">
      <form class="" action="CompartirCandidatoFinal.php" method="post" onsubmit="funcion();">
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
        <input id="graf" type="hidden" name="graf" value="">
        <input type="hidden" id="nombre" name="nombre" value="">
        <input type="hidden" id="informacion" name="informacion" value="">
        <input type="submit" name="send" value="Enviar correo" class="btn btn-success">
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function funcion(){
  document.getElementById("graf").value="<?php echo $grafica; ?>";
  document.getElementById("nombre").value="<?php echo $nombre; ?>";
  document.getElementById("informacion").value="<?php echo $informacion; ?>";

}
</script>
<?php*/
}

?>
