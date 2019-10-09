<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	session_start();
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
				<a class="nav-link"  onclick="salir();"  data-toggle="modal" href="../index.php">
				<i class="fas fa-fw fa-user"></i>
				<span>Logout</span></a>
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
				<a class="nav-link" href="nueva_noticia.php">
				<i class="fas fa-fw fa-list-alt"></i>
				<span>Nueva Noticias</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="listado_noticias.php">
				<i class="fas fa-fw fa-list-alt"></i>
				<span>Noticias</span></a>
			</li>

		</ul>


		<?php

			if(isset($funcion)){

				if($funcion==100){
					?>
					<div id="content-wrapper">
						<div class="container-fluid">
							<!-- Breadcrumbs-->
							<ol class="breadcrumb">
								<!--El titulo de la votación lo obtenemos de la base de datos -->

							</ol>
						</div>
						<?php
						tablaNoticia("Noticias");
						?>
					<?php
				}
			}
		?>

		<?php
		function tablaNoticia($tittle){

			?>

			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><h2 align="center"><?php echo "Noticias"; ?></h2></div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<?php
								include "fun_noticia.php";
								require "../Contra.php";
								$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");
								// Selección del a base de datos a utilizar
								$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
								$consulta="Select nombre_noticia from noticia where creador=". $_SESSION["usuario"].";";
								$consulta2="Select id from noticia where creador=". $_SESSION["usuario"].";";
								$resultado = mysqli_query( $conexion, $consulta ) or die ( "algo salio mal");
								$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "algo salio mal");

								?>

							</tr>
						</thead>

						<tbody>

							<?php
							$contador = 0;
							while ($cl = mysqli_fetch_array( $resultado )){
								$cl2 =mysqli_fetch_array( $resultado2 );
								//echo $cl;
								$contador++;
								print('<tr>');
								$aux = false;
								$contador2=0;
								printf("<tr>\n");
								printf("<th scope=\"row\">" . $contador . "</th>");
								printf("<td name=\"title\">" . $cl[0] . "</td>");

								$boton="<td><button type=\"button\" name=\"button\" onclick=\"funcionE(".$cl2[0].")\" class=\"btn btn-info\">Editar</button></td>";
								printf($boton);
								$boton2="<td><button type=\"button\" name=\"button2\" onclick=\"funcionA(".$cl[0].")\" class=\"btn btn-warning\">Mostrar Imagen</button></td>";
								printf($boton2);
								$boton3="<td><button type=\"button\" name=\"button2\" onclick=\"funcionD(".$cl2[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
								printf($boton3);
								print('</tr>');
							}
							$resultado->free();

							?>
						</tbody>
					</table>
				</div>
			</div>

<<<<<<< HEAD
<<<<<<< HEAD:plantilla/Administrador/noticia_copia.php
=======
<<<<<<< HEAD:plantilla/Administrador/listado_noticias.php
			<?php
		}
			?>

		
		<script type="text/javascript">
		function salir(){
			alert("nada");
			<?php
			$_SESSION=null;
			?>
		}
		function funcionE(valor){
			location.href="./EditarNoticia.php?funcion=1&id="+valor;
		}
		function funcionD(id){
			var mensaje=confirm("Esta seguro de eliminar este registro?");
			if(mensaje==true){
				location.href="./EliminarNoticia.php?id="+id;
			}
		}
		function funcionI(id){
			var mensaje=confirm("Mostrar imagen");
			if(mensaje==true){
				location.href="./EliminarNoticia.php?id="+id;
			}
		}
		</script>

		<!-- lo de arriba es el encabezado -->



		<!-- lo de abajo el footer -->
=======
>>>>>>> 2-201602420
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
																<div class="panel-heading"><h2 align="center"><?php echo "Noticias"; ?></h2></div>
																<div class="table-responsive">
																	<table class="table table-striped">
																		<thead>
																			<tr>
																				<?php

																				include "fun_noticia.php";
																				require "../Contra.php";
																			/*	$usuario = "root";
																				$password = "85296473";
																				$servidor = "localhost:3306";
																				$basededatos = "db_votos";*/

																				$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

																				// Selección del a base de datos a utilizar
																				$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
																				$consulta="Select nombre_noticia from noticia where creador=". $_SESSION["usuario"].";";
																				$consulta2="Select id from noticia where creador=". $_SESSION["usuario"].";";
																				$resultado = mysqli_query( $conexion, $consulta ) or die ( "algo salio mal");
																				$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "algo salio mal");

																				?>

																			</tr>
																		</thead>
																		<tbody>

																			<?php
																			$contador = 0;


																			while ($cl = mysqli_fetch_array( $resultado )){
																				$cl2 =mysqli_fetch_array( $resultado2 );
																				//echo $cl;
																				$contador++;
																				print('<tr>');
																				$aux = false;
																				$contador2=0;
																				printf("<tr>\n");
																				printf("<th scope=\"row\">" . $contador . "</th>");
																				printf("<td name=\"title\">" . $cl[0] . "</td>");

																				$boton="<td><button type=\"button\" name=\"button\" onclick=\"funcionE(".$cl2[0].")\" class=\"btn btn-info\">Editar</button></td>";
																				printf($boton);
																				$boton3="<td><button type=\"button\" name=\"button\" onclick=\"funcionC(".$cl2[0].")\" class=\"btn btn-success\">Compartir</button></td>";
																				printf($boton3);
																				$boton2="<td><button type=\"button\" name=\"button2\" onclick=\"funcionA(".$cl[0].")\" class=\"btn btn-warning\">Elementos</button></td>";
																				//printf($boton2);
																				$boton3="<td><button type=\"button\" name=\"button2\" onclick=\"funcionD(".$cl2[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
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
															?>

														<?php


														function debug_to_console($data) {
															$output = $data;
															if (is_array($output))
															$output = implode(',', $output);

															echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
														}

														?>
														<script type="text/javascript">
														function salir(){
															alert("nada");
															<?php
															$_SESSION=null;
															?>
														}
														function funcionE(valor){
															location.href="./EditarNoticia.php?funcion=1&id="+valor;
														}
														function funcionD(id){
															var mensaje=confirm("Esta seguro de eliminar este registro?");
															if(mensaje==true){
																location.href="./EliminarNoticia.php?id="+id;
															}

														}
														function funcionC(valor){
															location.href="./CompartirNoticia.php?id="+valor+"&funcion=25";
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
<<<<<<< HEAD
=======
			<?php
		}
			?>

		
		<script type="text/javascript">
		function salir(){
			alert("nada");
			<?php
			$_SESSION=null;
			?>
		}
		function funcionE(valor){
			location.href="./EditarNoticia.php?funcion=1&id="+valor;
		}
		function funcionD(id){
			var mensaje=confirm("Esta seguro de eliminar este registro?");
			if(mensaje==true){
				location.href="./EliminarNoticia.php?id="+id;
			}
		}
		function funcionI(id){
			var mensaje=confirm("Mostrar imagen");
			if(mensaje==true){
				location.href="./EliminarNoticia.php?id="+id;
			}
		}
		</script>

		<!-- lo de arriba es el encabezado -->



		<!-- lo de abajo el footer -->
>>>>>>> 4.1-201220159:plantilla/Administrador/listado_noticias.php
=======
>>>>>>> develop:plantilla/Administrador/noticia_copia.php
>>>>>>> 2-201602420
