<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  //$_SESSION["usuario"]=$_SESSION["usuario"];
  $logiado = "true";
  $_SESSION["per"] = 1;
  if(!isset($_SESSION["log"])){
    $_SESSION["log"] = 0;
  }
  if($_SESSION["log"] == 1){
    $logiado = true;
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
        <a class="nav-link" href="../index.php">
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
            <a class="nav-link" href="../selvoto.php">
              <i class="fas fa-fw fa-check-square"></i>
              <span>Voto</span></a>
            </li>
            <li class="nav-item">
              <h6 class="dropdown-header">Resultados anteriores:</h6>
              <a class="nav-link" href="../pie.php">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Grafica de Pie</span></a>
                <li class="nav-item">
                  <a class="nav-link" href="../menubarras.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Grafica de Barras</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../denuncias.php">
                      <i class="fas fa-fw fa-check-square"></i>
                      <span>Denuncias</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../candidatos.php">
                        <i class="fas fa-fw fa-eye"></i>
                        <span>Informacion canddiatos</span></a>
                      </li>
                    </ul>




                    <script type="text/javascript">
                    function salir(){
                      alert("nada");
                      <?php
                      $_SESSION=null;
                      ?>
                    }

                    </script>

                    <!-- lo de arriba es el encabezado -->



                    <!-- lo de abajo el footer -->
