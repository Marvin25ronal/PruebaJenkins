<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
//include ("connection.php");

$resultado = query("select * from votacion where estado = 1;");



$ncargo = "";
$votaccion = "";
while ($cl = mysqli_fetch_array($resultado)) {
  $votacion = $cl["nombre"];
  break;
}



//echo "se realizo la conexión";
?>


<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <!--El titulo de la votación lo obtenemos de la base de datos -->

    <a href="candidatos.php">
      <li class="breadcrumb-item active">Candidatos</li>
    </a>
  </ol>

  <!-- Page Content -->
  <!--El titulo de la votación lo obtenemos de la base de datos -->
  <h1 class="display-1"><?php echo $votacion; ?></h1>
  <!--<p class="lead">Algo</p>-->




  <!-- CARDS -->
  <div class="container-fluid">

    <?php
    if (isset($_GET["idc"])) {
      $cargo = $_GET["idc"];
      $resultado = query("select * from cargo where id = " . $_GET["idc"] . ";");
      while ($cl = mysqli_fetch_array($resultado)) {
        $ncargo = $cl["nombre"];
        break;
      }

      echo "<h3>  Candidatos a " . $ncargo . "</h3>";



      //echo("hola");



      ?>

      <div class="row">
        <?php
        $resultado = query("select usuario.carne, usuario.nombre , usuario.fotografia from candidato , usuario , votacion
        where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.estado = 1 and cargo = " . $cargo . " and usuario.nombre != 'nulo';");

        //cuando si este lanzado en una pagina anterior seleccionaremos el cargo, no sera por defecto 1 :D

        while ($cl = mysqli_fetch_array($resultado)) {

          ?>

          <div class="col-md-4">
            <!-- 01 -->
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/<?php echo $cl["fotografia"]; ?>" alt="Card image cap">
              <div class="card-body">
                <!-- Nombre de planillla -->
                <h5 class="card-title"><?php echo $cl["nombre"]; ?></h5>

                <a href="candidato.php?idc=<?php echo $cl["carne"]; ?>" class="btn btn-primary">Mas información</a>


                <form class="" action="./Compartir/CompartirCandidato.php" method="post">
                  <input type="hidden" name="datos" value="">
                </form>

              </div>
            </div>
          </div>



          <?php
        }

        ?>




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
