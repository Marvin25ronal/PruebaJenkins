
<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
include "candidato/fCandidato.php";
//include ("connection.php");
$nombre = "";
$infor ="";
$foto = "";
$resultado = query("select * from votacion where estado = 1;");




$votaccion = "";
while ($cl = mysqli_fetch_array($resultado)) {
  $votacion = $cl["nombre"];
  break;
}



//echo "se realizo la conexión";
?>

<script type="text/javascript">

function funcion(){
  <?php

  $resultado = obtenerInfoCandidato("select * from candidato , usuario where candidato.usuario = usuario.carne and carne =  " . $_GET["idc"] . ";");
  while ($cl = mysqli_fetch_array($resultado)) {
    $nn = $cl["nombre"];
    $ii = $cl["informacion"];
    $ff = $cl["fotografia"];
    break;
  } ?>
  var src = document.getElementById("imagen").currentSrc;
  document.getElementById("datos").value=src;
  document.getElementById("nombre").value="<?php echo $nn; ?>";
  document.getElementById("informacion").value="<?php echo $ii; ?>";

  document.getElementById("formulario").submit();
}

</script>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <!--El titulo de la votación lo obtenemos de la base de datos -->

    <a href="candidatos.php">
      <li class="breadcrumb-item active">Candidato</li>
    </a>
  </ol>

  <!-- Page Content -->
  <!--El titulo de la votación lo obtenemos de la base de datos -->
  <h1 class="display-1"><?php echo $votacion; ?></h1>
  <!--<p class="lead">Algo</p>-->



  <form class="" id="formulario" action="./Compartir/CompartirCandidato.php" method="post">
    <input type="hidden" id="nombre"name="nombre" value="">
    <input type="hidden" id="datos"name="datos" value="">
    <input type="hidden" id="informacion"name="informacion" value="">
  </form>
  <!-- CARDS -->
  <div class="container-fluid">

    <?php
    if (isset($_GET["idc"])) {

      if(isset($_GET["info"])){

        modCandidatoAsAdmin($_GET["idc"], $_GET["info"]);
      }

      $cargo = $_GET["idc"];
      $idus = $cargo;
      $resultado = obtenerInfoCandidato("select * from candidato , usuario where candidato.usuario = usuario.carne and carne =  " . $_GET["idc"] . ";");
      while ($cl = mysqli_fetch_array($resultado)) {
        $ncargo = $cl["nombre"];
        $info = $cl["informacion"];
        $foto = $cl["fotografia"];
        break;
      }





      //echo("hola");



      ?>


      <div class="row">

        <div class="col-md-4">
          <img class="card-img-top" id="imagen" src="img/<?php echo $foto; ?>" alt="Card image cap">
        </div>
        <div class="col-md-8">
          <?php echo "<h3>" . $ncargo . "</h3>"; ?>
          <?php $nombre=$ncargo; ?>
          <?PHP
          if (!isset($_SESSION["iduser"])) {
            $_SESSION["iduser"] = "";
            $_SESSION["tipo"] = 0;
          }
          $edit = false;
          if (isset($_GET["ed"])) {
            $edit = true;
          }
          if ($_SESSION["iduser"] == $cargo || $_SESSION["tipo"] == 1) {
            if ($edit) {
              ?>
              <form method="get" class="form-horizontal" id="usrform" action="candidato.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="idc" value="<?php echo $idus; ?>" />

                  <label for="exampleFormControlTextarea1">información</label>
                  <textarea class="form-control rounded-0" name="info" form="usrform" rows="10" ><?php echo $info; ?></textarea>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <input class="btn btn-primary btn-block" type="submit"  value="Cambiar información" />
                  </div>
                </div>

              </form>
              <?php
            }else{
              echo "<p>" . $info . "</p>";
              $infor=$info;
              ?>
              <a href="candidato.php?idc=<?php echo $idus."&ed=1"; ?>" class="btn btn-primary btn-block">Cambiar informacion</a>
              <?php

            }
          } else {
            echo "<p>" . $info . "</p>";
            $infor=$info;
            ?>
            <button type="button" name="button" onclick="funcion();"class="btn btn-info" >Compartir</button>

            <?php
          }
          ?>
        </div>
      </div>


      <?php


    } else {
      ?>

      <div class="row">
        <?php
        $resultado = query("select * from cargo;");

        while ($cl = mysqli_fetch_array($resultado)) {
          ?>
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <a href="candidatos.php?idc=<?php echo $cl["id"]; ?>" class="btn btn-primary"><?php echo $cl["nombre"]; ?></a>

            </div>
          </div>
          <?php
        }

        ?>
        <?php
      }
      ?>

    </div>
  </div>

  <!-- CARDS END -->







</div>




<?php
include "abajo.php";
?>
