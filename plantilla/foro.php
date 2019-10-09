<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
include "Foro/fForo.php";
//include ("connection.php");

$idforo = "";
$title = "";
$texto = "";
$edit = false;

if (isset($_GET["d"])) {
    deleteForo($_GET["d"]);
} else if (isset($_GET["u"])) {

    $resultado =   query("select * from foro where id = " . $_GET["u"]);
    while ($cl = mysqli_fetch_array($resultado)) {
        $idforo = $cl["id"];
        $title = $cl["titulo"];
        $texto = $cl["texto"];
        $edit = true;
        break;
    }
} else if (isset($_GET["edit"])) {
    editForo($_GET["idf"],  $_GET["text"], $_GET["title"]);
} else if (isset($_GET["niu"])) {

    addForo($_SESSION["iduser"], $_GET["text"], $_GET["title"]);
}

//echo "se realizo la conexión";
?>



<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <!--El titulo de la votación lo obtenemos de la base de datos -->

        <li class="breadcrumb-item active">Foros</li>
    </ol>

    <!-- Page Content -->
    <!--El titulo de la votación lo obtenemos de la base de datos -->

    <!--<p class="lead">Algo</p>-->




    <!-- CARDS -->
    <div class="container-fluid">

        <?php
        $cargo = 1;

        if (isset($_SESSION["iduser"])) {
            if ($_SESSION["iduser"] > 0) {
                ?>
                <div class="container">
                    <form method="get" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group"><label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10"> <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" /></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Texto</label>

                            <textarea class="form-control" name="text" rows="3"><?php echo $texto;  ?></textarea>
                        </div>
                        <?php if ($edit) { ?>
                            <input type="hidden" name="idf" value="<?php echo $idforo;  ?>" ; />
                            <input class="btn btn-primary " type="submit" name="edit" value="Editar" />

                        <?php } else { ?>
                            <input class="btn btn-primary " type="submit" name="niu" value="Guardar" />

                        <?php } ?>
                    </form>
                </div>
                <br />
        <?php
            }
        }


        //echo("hola");



        ?>
        <h3>Foros</h3>
        <div class="row">
            <?php
            $resultado = query("select foro.id,  usuario.nombre as 'creador' , titulo, imagen  from foro, usuario where usuario.carne = foro.creador;");
            //cuando si este lanzado en una pagina anterior seleccionaremos el cargo, no sera por defecto 1 :D

            while ($cl = mysqli_fetch_array($resultado)) {

                ?>

                <div class="col-md-4">
                    <!-- 01 -->
                    <div class="card" style="width: 18rem;">
                        <?php

                            if ($cl["imagen"] != null && $cl["imagen"] != "" &&  false) {
                                ?>
                            <img class="card-img-top" src="img/<?php echo $cl["imagen"]; ?>" alt="Card image cap">
                        <?php
                            }
                            ?>
                        <div class="card-body">
                            <!-- Nombre de planillla -->
                            <h5 class="card-title"><?php echo $cl["titulo"];  ?> <small> <?php echo $cl["creador"]; ?> </small></h5>


                            <?php

                                if (isset($_SESSION["tipo"])) {
                                    if ($_SESSION["tipo"] == 1) {
                                        ?>
                                    <a href="foro.php?d=<?php echo $cl["id"]; ?>" class="btn btn-danger">Eliminar</a>
                                    <a href="foro.php?u=<?php echo $cl["id"]; ?>" class="btn btn-warning">Editar</a>
                            <?php
                                    }
                                }
                                ?>
                            <a href="foroComen.php?id=<?php echo $cl["id"]; ?>" class="btn btn-primary">Mas inforcación</a>

                        </div>
                    </div>

                    <br />
                </div>


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