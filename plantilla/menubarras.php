<?php
	session_start();
	$_SESSION["per"] = 1;
  include "arriba.php";
  //include ("connection.php");

	 $resultado = query("select * from votacion;");



		$ncargo = "";


  //echo "se realizo la conexión";
?>
<div class="container">
      <h1>Resultados en gráfica de barras de:</h1>
	  </br>
              <?php
      $votaccion = "";
  		while ($cl = mysqli_fetch_array( $resultado )){
  			$votacion = $cl["nombre"];
          printf("<h3 class=\"display-5\">" .$votacion. "</h3>");
          ?>
			<div class="row">
          <?php
          $resultado1 = query("select * from cargo;");

          while ($cl1 = mysqli_fetch_array( $resultado1 )){
            ?>
                <div class="card" style="width: 18rem;">
                <a href="antbarras.php?us=<?php echo $cl["id"]; ?>&cargo=<?php echo $cl1["id"]?>" class="btn btn-primary"><?php echo $cl1["nombre"]; ?></a>
                
              </div>
            <?php
          }
          ?>
		  </div>
		  </br></br></br>
		<?php
  		}

       ?>
	   </br></br></br></br></br></br></br>
<?php
include "abajo.php";
?>
