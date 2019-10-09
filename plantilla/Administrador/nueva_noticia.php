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

	//debug_to_console($logiado);
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Noticia </title>


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
<!--ESPACIO DE NOTICIAS  -->


<div class="row">
	<div class="col-md-8">
		<ul>
			<h1>Bienvenido </h1>


			<li>Tu listado de noticias <?php echo $_SESSION["usuario"]; ?></li>
			<br>
		<ul>

<!--LLENAR FORMULARIO DE NOTICIAS   -->
		<table class="table table-dark">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Titulo</th>
			<th scope="col">Creado</th>
			</tr>
		</thead>
		<tbody>
			<!--CONSULTA PARA LLENAR LA BD-->
			<?php
				require "../Contra.php";

				$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

				// Selección del a base de datos a utilizar
				$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );

				//$consulta="Select nombre_noticia from noticia where creador=201220159;";
				$consulta="Select nombre_noticia from noticia where creador=". $_SESSION["usuario"].";";

				$resultado = mysqli_query( $conexion, $consulta ) or die ( "algo salio mal");
				//$resultado=query($consulta);
				//$resultado = mysqli_query($consulta,);
				//$info_campo = $resultado->fetch_fields();
				//$fila = mysql_fetch_assoc($resultado);
				//printf($resultado->num_rows);

				$contador=0;
				//$cl = mysqli_fetch_array( $resultado )
				while ($cl = mysqli_fetch_array( $resultado )) {
					//include "fun_noticia.php";
					$contador++;
					printf("<tr>\n");
					printf("<th scope=\"row\">" . $contador . "</th>");
					printf("<td name=\"title\">" . $cl[0] . "</td>");
					printf("<td name=\"title\">" . $_SESSION['usuario'] . "</td>");
					//$boton1="<td><button type=\"button\" name=\"button\" onclick=\"funcionE(".$cl[0].")\" class=\"btn btn-info\">Editar</button></td>";
					//printf($boton1);
					//printf("<td><a  title=\"Edit\" class=\"btn btn-primary btn-sm\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></a></td>");
					//$boton3="<td><button type=\"button\" name=\"button2\" onclick=\"funcionD(".$cl[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
					//$boton2="<td><button type=\"button\" name=\"button2\" onclick=\"eliminar_noticia(".$cl[0].")\" class=\"btn btn-danger\">Eliminar</button></td>";
					//
					//$boton2="<td><a href=\"\" title=\"Eliminar\" onclick=\"eliminar_noticia(".$cl[0] .")\" class=\"btn btn-danger btn-sm\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a></td>";
					//printf($boton2);
					//printf("<td><a href=\"\" title=\"Eliminar\" onclick=\"return confirm(\'Esta seguro de borrar los datos)\" class=\"btn btn-danger btn-sm\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a></td>");
					printf("</tr>\n");
					//echo $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';

				}


			?>


		</tbody>
		</table>






		<br><br><br>



	</div>





	<div class="col-md-4">
	<h3>New Noticia</h3>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">

					<label for="exampleInputEmail1">
						Titulo de la noticia
					</label>
					<input type="" class="form-control" name="title" id="title" />
				</div>
				<div class="form-group">

					<label for="exampleInputEmail1">
						Ingrese la noticia
					</label>

					<textarea name="text" id="text" rows="8" cols="50"></textarea>
				</div>
				<div class="form-group">

					<label for="exampleInputFile">
						Puedes adjuntar una imagen que sea relevante para la noticia
						<br>Cargar imagen
					</label>
					<input type="file" class="form-control-file" name="file" id="file" />

				</div>
				<div class="checkbox">


				</div>
				<button type="submit"  name="submit" class="btn btn-primary">
					Guardar
				</button>
			</form>
			<?php
			if(isset($_POST['submit'])){

				$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

				// Selección del a base de datos a utilizar
				$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );

				$titulo=$_POST['title'];
				$texto=$_POST['text'];
				$user= $_SESSION["usuario"];

				/*
				$nameFile = $_FILES['file']['name'];
				$sizeFile= $_FILES['file']['size'];
				$typeFile= $_FILES['file']['type'];
				$tempFile= $_FILES['file']['tmp_name'];
				*/

				print($titulo);
			if(empty($titulo)){
				?>
				<script type="text/javascript">
				alert("Esta vació el titulo");
				</script>
				<?php
				return;
			}else{

				include "fun_noticia.php";
				$nameFile = $_FILES['file']['name'];
				if(!empty($nameFile))
				{
					//$nameFile = $_FILES['file']['name'];
					$sizeFile= $_FILES['file']['size'];
					$typeFile= $_FILES['file']['type'];
					$tempFile= $_FILES['file']['tmp_name'];
					if (($_FILES["file"]["type"] == "image/gif")
   					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/jpg")
					|| ($_FILES["file"]["type"] == "image/png"))
				   {
						// Ruta donde se guardarán las imágenes que subamos
						$directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
						// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
						if(move_uploaded_file($_FILES['file']['tmp_name'],$directorio.$nameFile))
						{
							?>
							<script type="text/javascript">
							alert("Imagen cargada con éxito");
							</script>
							<?php

						}else
						{
							?>
							<script type="text/javascript">
							alert("No se a movido el archivo");
							</script>
							<?php
						}

						//Nueva noticia con imagen
						ingresar_noticia($conexion, $titulo, $texto, $user,$nameFile);
				   }else
				   {
						echo "No se puede subir una imagen con ese formato ";
				   }
					
				}else
				{
					//Noticia sin imagen
					?>
					<script type="text/javascript">
					alert("No se puede subir la imagen con ese formato ");
					</script>
					<?php
				}
				
				?>
				<script type="text/javascript">
				location.href="nueva_noticia.php";
			</script>
			<?php
			}

			}
			?>
		</div>
	</div>
</div>


	</div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
