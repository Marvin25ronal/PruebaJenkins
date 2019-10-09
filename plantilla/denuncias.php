<?php
	session_start();
	
	include "arriba.php";
	/*
	$_SESSION["per"] = 0;
	$contra_mal = false;
	$logiado = false;
	if(isset($_POST)){
		if(isset($_POST["user"]) AND ISSET($_POST["pass"])){
			$resultado = query("select * from usuario where (carne = '".$_POST["user"]."' 
			|| correo = '".$_POST["user"]."') && pass = '".$_POST["pass"]."';");
			
			$contra_mal = true;
			
			while ($cl = mysqli_fetch_array( $resultado )){
				$_SESSION["iduser"] = $cl["carne"];
				$_SESSION["userName"] = $cl["nombre"];
				$_SESSION["log"] = 1;
				$contra_mal = false;
			}			
		}
		
	}
		
	$logiado = false;
	if(!isset($_SESSION["log"])){
		$_SESSION["log"] = 0;
	}
	if(!isset($_SESSION["userName"])){
		$_SESSION["userName"] = "";
		
	}
	if($_SESSION["log"] == 1){
		$logiado = true;
	}
	*/
	

?>
<!---->

<h1>Bienvenido </h1>
<hr/>
<div class="row">
	<div class="col-md-6">
		<ul>
			<li>Universidad de San Carlos de Guatemala</li>
			
		<ul>
	</div>
	<div class="col-md-6">
	<h3>Denuncia</h3>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form action="fun_denuncias.php" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">
						Email de notificación de la denuncia
					</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" required="true" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Denuncia 
					</label>
					<input type="" name="mensaje" class="form-control" id="exampleInputPassword1" required="true" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputFile">
						Puedes adjuntar una imagen que sea relevante como constancia de la denuncia
						<br>Cargar imagen
					</label>
					<!--<input type="file" class="form-control-file" name="archivo" id="exampleInputFile" />-->
					<input type="file" name="archivo" value="Sin título.png">
					<p class="help-block">
						¿Eres un humano?
					</p>
				</div>
				<div class="checkbox">					 
					<label>
						<input type="checkbox" required="true" /> Check me 
					</label>
				</div> 
				<button type="submit" class="btn btn-primary">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>
	
	
	</div>
</div>


	<?php
	
include "abajo.php";



?>
