<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	session_start();
	//$_SESSION["usuario"]=$_SESSION["usuario"];
	$logiado = "true";
	if(!isset($_SESSION["log"])){
		$_SESSION["log"] = 0;
	}
	if($_SESSION["log"] == 1){
		$logiado = true;
	}
	if(isset($_GET["funcion"])){
		$funcion=$_GET["funcion"];
	}else{
		$funcion=100;
	}
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}


	//session_start();
  	//$kk=$_SESSION['usario'];
	//debug_to_console($logiado);
	//$_SESSION["usuario"]=$user;
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Configuracion </title>

	<!-- Custom fonts for this template-->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.php">Operaciones de Administrador</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">

			</div>
		</form>

		<!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i ></i>
					<span class="badge badge-danger">9+</span>
				</a>
			</li>
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-fw"></i>
					<span class="badge badge-danger"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
					<a class="dropdown-item" href="#">Action</a>

				</div>
			</li>
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
				</a>

			</li>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="Plantilla.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Opciones</span>
				</a>
			</li>
			<?php if(!$logiado){ ?>
				<li class="nav-item">
					<a class="nav-link" href="#"  data-toggle="modal" data-target="#loginModal">
						<i class="fas fa-fw fa-user"></i>
						<span>Login</span></a>
					</li>
				<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link"  onclick="salir();"  data-toggle="modal" href="../selvoto.php">
							<i class="fas fa-fw fa-user"></i>
							<span>Ver como usuario</span></a>
						</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="./CrearVotacion.php?funcion=3">
							<i class="fas fa-fw fa-check-square"></i>
							<span>Crear Votacion</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./CrearCargo.php?funcion=4">
								<i class="fas fa-fw fa-check-square"></i>
								<span>Crear Cargo</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./Plantilla.php?funcion=5">
								<i class="fas fa-fw fa-check-square"></i>
								<span>Lista de cargos </span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="noticia.php">
								<i class="fas fa-fw fa-list-alt"></i>
								<span>Nueva noticia</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="noticia_copia.php">
								<i class="fas fa-fw fa-list-alt"></i>
								<span>Noticias</span></a>
							</li>

							</ul>


							<?php
							$cons="SELECT id,nombre, fecha_inicio as \" Fecha de inicio \", fecha_fin AS \"Fecha de caducidad\", (case when estado=1 then \"Activa\" ELSE  \"Terminada\" END)AS \"ESTADO\"  FROM VOTACION;";

							if(isset($funcion)){

								if($funcion==100){
									//editar
									?>
									<div id="content-wrapper">

										<div class="container-fluid">

											<!-- Breadcrumbs-->
											<ol class="breadcrumb">
												<!--El titulo de la votación lo obtenemos de la base de datos -->

												<h2>Votaciones actuales</h2>
											</ol>
										</div>

										<?php
										mostrartabla($cons,"Votaciones ");
									}else if($funcion==1){
										?>
										<div id="content-wrapper">

											<div class="container-fluid">

												<!-- Breadcrumbs-->
												<ol class="breadcrumb">
													<!--El titulo de la votación lo obtenemos de la base de datos -->

													<h2>Editar Votacion	</h2>
												</ol>
											</div>
											<?php
										}else if($funcion==3){
											?>
											<div id="content-wrapper">

												<div class="container-fluid">

													<!-- Breadcrumbs-->
													<ol class="breadcrumb">
														<!--El titulo de la votación lo obtenemos de la base de datos -->

														<h2>Crear Votacion	</h2>
													</ol>
												</div>
												<?php
											}else if($funcion==4){
												?>
												<div id="content-wrapper">

													<div class="container-fluid">

														<!-- Breadcrumbs-->
														<ol class="breadcrumb">
															<!--El titulo de la votación lo obtenemos de la base de datos -->

															<h2>Crear Cargo	</h2>
														</ol>
													</div>
													<?php
												}else if($funcion==5){
													?>
													<div id="content-wrapper">

														<div class="container-fluid">

															<!-- Breadcrumbs-->
															<ol class="breadcrumb">
																<!--El titulo de la votación lo obtenemos de la base de datos -->

																<h2>Cargos	</h2>
															</ol>
														</div>
														<?php
														$consulta="Select * from cargo;";
														mostrarCargos($consulta,"Cargos actuales");
													}else if($funcion==6){
														?>
														<div id="content-wrapper">
															<div class="container-fluid">

																<!-- Breadcrumbs-->
																<ol class="breadcrumb">
																	<!--El titulo de la votación lo obtenemos de la base de datos -->

																	<h2>Editar Cargo	</h2>
																</ol>
															</div>
															<?php
														}else if($funcion==7){
															?>
															<div id="content-wrapper">
																<div class="container-fluid">

																	<!-- Breadcrumbs-->
																	<ol class="breadcrumb">
																		<!--El titulo de la votación lo obtenemos de la base de datos -->

																		<h2>Agregar cargos	</h2>
																	</ol>
																</div>
																<?php
															}else if($funcion==25){
																
															}
														}
														?>
														<?php
														// Ejemplo de conexión a base de datos MySQL con PHP.
														//
														// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com

														// Datos de la base de datos





														function mostrartabla($consulta , $tittle){

															?>

															<div class="panel panel-default">
																<!-- Default panel contents -->
																<div class="panel-heading"><h2 align="center"><?php echo $tittle; ?></h2></div>
																<div class="table-responsive">
																	<table class="table table-striped">
																		<thead>
																			<tr>
																				<?php
																				require "Funciones.php";
																				$resultado = query($consulta);
																				$info_campo = $resultado->fetch_fields();
																				$ncolumnas = 0;
																				$contador=0;
																				foreach ($info_campo as $valor) {
																					if($contador==0){
																						$contador=$contador+1;
																						continue;
																					}
																					printf("<td><h4>%s</h4></td>",   $valor->name);
																					$ncolumnas++;
																				}
																				$ncolumnas -= 1;
																				?>

																			</tr>
																		</thead>
																		<tbody>

																			<?php
																			$nreg = 0;


																			while ($cl = mysqli_fetch_array( $resultado )){
																				//echo $cl;
																				$nreg++;
																				print('<tr>');
																				$aux = false;
																				$contador2=0;
																				foreach($cl as $valor){

																					if($contador2==0){

																						$contador2=$contador2+1;
																						$aux=true;
																						continue;
																					}
																					if($aux == true){

																						$aux = false;
																						continue;
																					}
																					$aux = true;
																					printf("<td>%s</td>",   $valor);
																				}
																				$boton="<td><button type=\"button\" name=\"button\" onclick=\"funcionE(".$cl[0].")\" class=\"btn btn-info\">Editar</button></td>";
																				printf($boton);
																				$boton2="<td><button type=\"button\" name=\"button2\" onclick=\"funcionA(".$cl[0].")\" class=\"btn btn-warning\">Elementos</button></td>";
																				printf($boton2);
																				$boton3="<td><button type=\"button\" name=\"button2\" onclick=\"funcionD(".$cl[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
																				printf($boton3);
																				print('</tr>');
																			}
																			$resultado->free();

																			?>
																		</tbody>
																	</table>
																</div>
															</div>

															<?php
														}
														function mostrarCargos($consulta , $tittle){

															?>

															<div class="panel panel-default">
																<!-- Default panel contents -->
																<div class="panel-heading"><h2 align="center"><?php echo $tittle; ?></h2></div>
																<div class="table-responsive">
																	<table class="table table-striped">
																		<thead>
																			<tr>
																				<?php
																				require "Funciones.php";
																				$resultado = query($consulta);
																				$info_campo = $resultado->fetch_fields();
																				$ncolumnas = 0;
																				$contador=0;
																				foreach ($info_campo as $valor) {
																					if($contador==0){
																						$contador=$contador+1;
																						continue;
																					}
																					printf("<td><h4>%s</h4></td>",   $valor->name);
																					$ncolumnas++;
																				}
																				$ncolumnas -= 1;
																				?>

																			</tr>
																		</thead>
																		<tbody>

																			<?php
																			$nreg = 0;


																			while ($cl = mysqli_fetch_array( $resultado )){
																				//echo $cl;
																				$nreg++;
																				print('<tr>');
																				$aux = false;
																				$contador2=0;
																				foreach($cl as $valor){

																					if($contador2==0){

																						$contador2=$contador2+1;
																						$aux=true;
																						continue;
																					}
																					if($aux == true){

																						$aux = false;
																						continue;
																					}
																					$aux = true;
																					printf("<td>%s</td>",   $valor);
																				}
																				$boton="<td><button type=\"button\" name=\"button\" onclick=\"funcionCE(".$cl[0].")\" class=\"btn btn-info\">Editar</button></td>";
																				printf($boton);
																				$boton3="<td><button type=\"button\" name=\"button2\" onclick=\"funcionCD(".$cl[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
																				printf($boton3);
																				print('</tr>');
																			}
																			$resultado->free();

																			?>
																		</tbody>
																	</table>
																</div>
															</div>

															<?php
														}



														function debug_to_console($data) {
															$output = $data;
															if (is_array($output))
															$output = implode(',', $output);

															echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
														}

														?>
														<script type="text/javascript">
														function salir(){
														}
														function funcionE(valor){
															location.href="./EditarVotacion.php?funcion=1&id="+valor;
														}
														function funcionD(id){
															var mensaje=confirm("Esta seguro de eliminar este registro?");
															if(mensaje==true){
																location.href="./Eliminar.php?id="+id;

															}

														}
														function funcionA(valor){
															location.href="./AgregarCargos.php?funcion=7&id="+valor;
														}
														function funcionCE(valor){
															location.href="./CrearCargo.php?funcion=6&id="+valor;
														}
														function funcionCD(valor){
															var mensaje=confirm("Esta seguro de eliminar este cargo?");
															if(mensaje==true){
																location.href="./EliminarC.php?id="+valor;
															}
														}
														</script>

														<!-- lo de arriba es el encabezado -->



														<!-- lo de abajo el footer -->
