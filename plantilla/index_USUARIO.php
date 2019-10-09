<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
?>

<div class="container">
  <div class="row">
    <h1>Bienvenido <?php echo $_SESSION["userName"]; ?> al Sistema de Votaciones en Linea USAC</h1>
    <div class="w-100"></div>
      <div style="width:800px; margin:0 auto;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/PU1.JPG" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="img/PU2.JPG" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="img/PU3.JPG" class="d-block w-100" alt="">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
      </div>
  </div>
</div>




<?php
include "abajo.php";
?>
