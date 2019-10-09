<?php
	session_start();
	$_SESSION["per"] = 1;
  include "arriba.php";
  //include ("connection.php");

	 $resultado = query("select * from votacion where estado = 1;");
	 
		
		
		$ncargo = "";
		$votaccion = "";
		$idvotacion = "";
		while ($cl = mysqli_fetch_array( $resultado )){
			$votacion = $cl["nombre"];
			$idvotacion = $cl["id"];
			break;
		}
		
		
		
		$_SESSION["votacion"] = $votacion;

  //echo "se realizo la conexión";
?>



	<div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <!--El titulo de la votación lo obtenemos de la base de datos -->

          <li class="breadcrumb-item active">Voto</li>
        </ol>

        <!-- Page Content -->
        <!--El titulo de la votación lo obtenemos de la base de datos -->
        <h1 class="display-1"><?php echo $votacion; ?></h1>
        <!--<p class="lead">Algo</p>-->
        
		

		
        <!-- CARDS -->
        <div class="container-fluid">
		
			<?php 
			if(isset($_GET["idc"])){
				$cargo = $_GET["idc"];
			 $resultado = query("select * from cargo where id = ".$_GET["idc"].";");
			while ($cl = mysqli_fetch_array( $resultado )){
				$ncargo = $cl["nombre"];
				break;
			}
			
			$ya = query("Select * from ya_voto where usuario = ".$_SESSION["iduser"]." and votacion =".$idvotacion." and cargo =".$cargo.";");
			$x = 0;
			$i = 0;
			while ($x = mysqli_fetch_array( $ya )){
				$i++;
				break;
			}
			if($i>0){
				//ya voto entonces se sale de la pagina
				
				?>
				<script type="text/javascript">
				alert("Ya emitiste tu voto para este cargo");
				location.href="selvoto.php";

				</script>
				<?php
			} 
			echo "<h3>" . $ncargo . "</h3>"; 
			
			
			
				//echo("hola");
		
			
			
			?>
           
          <div class="row">
			<?php
				$resultado = query("select usuario.carne, usuario.nombre , usuario.fotografia from candidato , usuario , votacion
									where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.estado = 1 and cargo = ".$cargo.";");
				//cuando si este lanzado en una pagina anterior seleccionaremos el cargo, no sera por defecto 1 :D
			
				while ($cl = mysqli_fetch_array( $resultado )){
				
			?>
			
		   <div class="col-md-4">
              <!-- 01 -->
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/<?php echo $cl["fotografia"]; ?>" alt="Card image cap">
                <div class="card-body">
                  <!-- Nombre de planillla -->
                  <h5 class="card-title"><?php echo $cl["nombre"]; ?></h5>
				  
                  <a href="#" data-toggle="modal" data-target="#mod<?php echo $cl["carne"]; ?>" class="btn btn-primary">Votar</a>
                 
				 
                </div>
              </div>
            </div>
           
			 <div class="modal fade" id="mod<?php echo $cl["carne"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Confirma tu voto</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					</div>
					<div class="modal-body">Dale en votar si realmente quieres votar por <?php echo $cl["nombre"]; ?>.</div>
					<div class="modal-footer">
					<a href="voto.php?us=<?php echo $cl["carne"]; ?>&cargo=<?php echo $cargo; ?>&idvotacion=<?php echo $idvotacion; ?>" class="btn btn-primary">Votar</a>
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				</div>
			</div>
		   
		   
		   <?php 
				}
				
				?>
				
				
				
				
				<?php
				
				
			}else{
				?>
				
          <div class="row">
				<?php
				$resultado = query("select * from cargo;");
		
				while ($cl = mysqli_fetch_array( $resultado )){
					?>
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<a href="selvoto.php?idc=<?php echo $cl["id"]; ?>" class="btn btn-primary"><?php echo $cl["nombre"]; ?></a>
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