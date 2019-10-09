<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	$logiado = false;
	if (!isset($_SESSION["log"])) {
		$_SESSION["log"] = 0;
	}
	if ($_SESSION["log"] == 1) {
		$logiado = true;
	}
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema de votos</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.php">Sistema de votación</a>

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
					<i></i>
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
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

					<?php if (!$logiado) { ?>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
					<?php } else { ?>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
					<?php } ?>
				</div>
			</li>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item active" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>-->
			<?php if (!$logiado) { ?>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">
						<i class="fas fa-fw fa-user"></i>
						<span>Login</span></a>
				</li>
			<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-fw fa-user"></i>
						<span>Logout</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="selvoto.php">
						<i class="fas fa-fw fa-check-square"></i>
						<span>Voto</span></a>
				</li>

			<?php } ?>
			<li class="nav-item">
				<h6 class="dropdown-header">Resultados anteriores:</h6>
				<a class="nav-link" href="pie.php">
					<i class="fas fa-fw fa-chart-pie"></i>
					<span>Grafica de Pie</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="menubarras.php">
					<i class="fas fa-fw fa-chart-bar"></i>
					<span>Grafica de Barras</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="denuncias.php">
					<i class="fas fa-fw fa-check-square"></i>
					<span>Denuncias</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="candidatos.php">
					<i class="fas fa-fw fa-eye"></i>
					<span>Informacion canddiatos</span></a>
			</li>


			<li class="nav-item">
				<a class="nav-link" href="foro.php">
					<i class="fas fa-fw fa-eye"></i>
					<span>Foros</span></a>
			</li>
		</ul>

		<div id="content-wrapper">


			<?php
			// Ejemplo de conexión a base de datos MySQL con PHP.
			//
			// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com

			// Datos de la base de datos



			function query($query)
			{
				include "Contra.php";

				// creación de la conexión a la base de datos con mysql_connect()
				$conexion = mysqli_connect($servidor, $usuario, $password) or die("NO hay servidor");

				// Selección del a base de datos a utilizar
				$db = mysqli_select_db($conexion, $basededatos) or die("no hay bd");
				$resultado = mysqli_query($conexion, $query) or die("algo salio mal");
				return  $resultado;
			}

			function quer2($query, $conexion)
			{
				$resultado = mysqli_query($conexion, $query) or die("algo salio mal :(");
				return  $resultado;
			}


			function mostrartabla($consulta, $tittle)
			{

				?>

				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">
						<h2 align="center"><?php echo $tittle; ?></h2>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<?php
										$resultado = query($consulta);
										$info_campo = $resultado->fetch_fields();
										$ncolumnas = 0;
										foreach ($info_campo as $valor) {
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
									while ($cl = mysqli_fetch_array($resultado)) {
										//echo $cl;
										$nreg++;
										print('<tr>');
										$aux = false;
										foreach ($cl as $valor) {
											if ($aux == true) {
												$aux = false;
												continue;
											}
											$aux = true;
											printf("<td>%s</td>",   $valor);
										}
										print('</tr>');
									}
									if ($ncolumnas == 0) {
										print("<tr>
								<td align='right'># " . $nreg . "</td>
						</tr>");
									} else {
										print("<tr>
								<td colspan='" . $ncolumnas . "'></td><td align='right'># " . $nreg . "</td>
						</tr>");
									}
									$resultado->free();

									?>
							</tbody>
						</table>
					</div>
				</div>

			<?php
			}

			function mostrartabla2($consulta, $tittle)
			{

				?>

				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<?php
										$resultado = query($consulta);
										$info_campo = $resultado->fetch_fields();
										$ncolumnas = 0;
										foreach ($info_campo as $valor) {
											printf("<td><h4>%s</h4></td>",   $valor->name);
											$ncolumnas++;
										}
										$ncolumnas += 1;
										?>
									<td>Modificar</td>
									<td>Eliminar</td>
								</tr>
							</thead>
							<tbody>

								<?php
									$nreg = 0;
									while ($cl = mysqli_fetch_array($resultado)) {
										//echo $cl;
										$nreg++;
										print('<tr>');
										$aux = false;
										$nn = true;
										foreach ($cl as $valor) {
											if ($aux == true) {
												$aux = false;
												continue;
											}
											if ($nn) {
												$nn = false;
												$id = $valor;
											}
											$aux = true;
											printf("<td>%s</td>",   $valor);
										}
										?>
									<td><a href="<?php echo $tittle . "?up=" . $id ?>">Modificar</a></td>
									<td><a href="<?php echo $tittle . "?el=" . $id ?>">Eliminar</a></td>
								<?php
										print('</tr>');
									}
									if ($ncolumnas == 0) {
										print("<tr>
								<td align='right'># " . $nreg . "</td>
						</tr>");
									} else {
										print("<tr>
								<td colspan='" . $ncolumnas . "'></td><td align='right'># " . $nreg . "</td>
						</tr>");
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

			<!-- lo de arriba es el encabezado -->



			<!-- lo de abajo el footer -->