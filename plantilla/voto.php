  <?php
	session_start();
	$_SESSION["per"] = 1;
  include "arriba.php";
  include "funciones.php";
  include "notificacion.php";
  
	$todoOk = false;
	$cargo = 1;
	if(isset($_GET["us"])){
	  $us = $_GET["us"];
	  $cargo = $_GET["cargo"];
	  $idvotacion = $_GET["idvotacion"];
	  $todoOk = votar($us , $cargo);
	  $consulta = "Select correo from usuario where carne = ".$_SESSION["iduser"].";";
	  $correo = query($consulta);
	  $ya_voto = query("insert into ya_voto values (".$us.",".$idvotacion.",".$cargo.");");
	  echo $ya_voto;
	  $row = mysqli_fetch_row($correo);
	  notificar_voto($row[0],$_SESSION["votacion"]);
	}
  //include ("connection.php");
  //echo "se realizo la conexión";
?>
		<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="selvoto.php">Voto</a>
          </li>
          <!--El titulo de la votación lo obtenemos de la base de datos -->

          <li class="breadcrumb-item active">Resultados</li>
        </ol>

        <!-- Page Content -->
        <!--El titulo de la votación lo obtenemos de la base de datos -->
        <h1 class="display-1">Elecciones a Rector</h1>
		<p><?php 
			if($todoOk){
				echo "Tu voto se ha registrado con exito.";
			}else{
				echo "Algo ha salido mal.";
			}
		?>  </p>
		<div class="col text-center">
        <a  class="btn btn-primary" role="button" href="barras.php?us=<?php echo $us; ?>&cargo=<?php echo $cargo; ?>">Ver resultados</a>
		</div>
		</br></br></br>

		
<?php
	include "abajo.php";
?>