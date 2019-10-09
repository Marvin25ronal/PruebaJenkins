<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
include "Foro/fForo.php";

//include ("connection.php");


if (isset($_GET["niu"])) {
    crearComenForo($_GET["text"], $_GET["id"], $_SESSION["iduser"]);
}else if(isset($_GET["d"])){
    elimComenForo($_GET["d"]);
}
$resultado = query("select foro.id,texto,  usuario.nombre as 'creador' , titulo, imagen  from foro, usuario where usuario.carne = foro.creador and  foro.id = " . $_GET["id"]);


$titulo = "";
$texto = "";
$autor = "";
while ($cl = mysqli_fetch_array($resultado)) {
    $titulo = $cl["titulo"];
    $texto = $cl["texto"];
    $autor = $cl["creador"];
    break;
}


//echo "se realizo la conexión";
?>



<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <!--El titulo de la votación lo obtenemos de la base de datos -->

        <li class="breadcrumb-item "><a href="foro.php">Foro</a></li>
        <li class="breadcrumb-item active"><?php echo $titulo; ?></li>
    </ol>

    <!-- Page Content -->
    <!--El titulo de la votación lo obtenemos de la base de datos -->
    <!--<p class="lead">Algo</p>-->




    <!-- CARDS -->
    <div class="container-fluid">

        <?php
        $cargo = 1;
        echo "<h3> Foro </h3>";



        //echo("hola");



        ?>

        <?php
        //cuando si este lanzado en una pagina anterior seleccionaremos el cargo, no sera por defecto 1 :D


        ?>

        <!-- 01 -->
        <div class="card">
            <?php

            if ($cl["imagen"] != null && $cl["imagen"] != "" &&  false) {
                ?>
                <img class="card-img-top" src="img/<?php echo $cl["imagen"]; ?>" alt="Card image cap">
            <?php
            }
            ?>

            <h1 class="card-title"><?php echo $cl["titulo"];  ?> <small> <?php echo $cl["creador"]; ?> </small></h1>
            <div class="card-body">
                <!-- Nombre de planillla -->

                <p> <?php echo $texto; ?> </p>
            </div>
        </div>

        <hr />
        <hr />

        <div class="row">
            <?php
            $resultado = query("select id, texto , nombre from mensaje_foro , usuario where comentarista = carne and foro =" . $_GET["id"] . " ;");
            //cuando si este lanzado en una pagina anterior seleccionaremos el cargo, no sera por defecto 1 :D

            while ($cl = mysqli_fetch_array($resultado)) {

                ?>

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- 01 -->
                    <div class="card">

                        <h2 class="card-title"> <small> <?php echo $cl["nombre"]; ?> </small></h2>
                        <div class="card-body">
                            <!-- Nombre de planillla -->


                            <p> <?php echo $cl["texto"]; ?> </P>
                        </div>
                        <?php

                            if (isset($_SESSION["tipo"])) {
                                if ($_SESSION["tipo"] == 1) {
                                    ?>
                                <a href="foroComen.php?d=<?php echo $cl["id"]; ?>&id=<?php echo $_GET["id"]; ?>"  class="btn btn-danger">Eliminar</a>

                        <?php
                                }
                            }
                            ?>

                    </div>

                    <br />
                </div>

                <div class="col-md-2"></div>

                <?php
                }

                if (isset($_SESSION["iduser"])) {
                    if ($_SESSION["iduser"] > 0) {
                        ?>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <hr />
                        <form method="get" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"];  ?>" />
                            <div class="form-group"><label class=" control-label">Agregar nuevo comentario</label>
                                <textarea class="form-control" name="text" rows="3"><?php   ?></textarea>
                            </div>
                            <input class="btn btn-primary " type="submit" name="niu" value="Comentar" />
                        </form>

                    </div>
                    <div class="col-md-2"></div>

            <?php        }
            }
            ?>
        </div>



    </div>
    <!-- CARDS END -->







</div>




<?php
include "abajo.php";
?>