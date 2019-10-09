<?php
session_start();

include "notificacion.php";
include "funciones.php";
include "arriba.php";
if(isset($_SESSION["log"]) &&  $_SESSION["log"]== 1 &&  isset($_SESSION["tipo"]) && $_SESSION["tipo"]!=0){
	if($_SESSION["tipo"]==1){
		$_SESSION["log"] == 1;
		?>
		<script type="text/javascript">
			location.href="./Administrador/Plantilla.php";
		</script>
		<?php
	} else if($_SESSION["tipo"]==2){
		$_SESSION["log"] == 1;
		?>
		<script type="text/javascript">

		location.href="index_USUARIO.php";

		</script>
		<?php
	} else if($_SESSION["tipo"]==3){
		$_SESSION["log"] == 1;
		?>
		<script type="text/javascript">

		location.href="index_USUARIO.php";

		</script>
		<?php
	}
}

$_SESSION["per"] = 0;
$contra_mal = false;
$logiado = false;

if(isset($_POST)){
	if(isset($_POST["user"]) AND ISSET($_POST["pass"])){
		$contra_mal = !login($_POST["user"], $_POST["pass"]);
		$user=$_POST["user"];
		unset($_POST["user"]);
		if(!$contra_mal){
			$tipo=query("select tipo_usuario from usuario where usuario.carne=\"".$user."\" OR usuario.correo=\"".$user."\" ;");

			if(!isset($_SESSION["reload"])){
				$_SESSION["reload"] = 0;
			}

			$row = mysqli_fetch_row($tipo);
			$_SESSION["tipo"] = $row[0];
			if($row[0]==1){
				$_SESSION["log"] == 1;
				$_SESSION["usuario"]=$user;
				?>
				<script type="text/javascript">

				location.href="./Administrador/Plantilla.php";

				</script>
				<?php
			} else if($row[0]==2){
				$_SESSION["log"] == 1;
				?>
				<script type="text/javascript">

				location.href="index_USUARIO.php";

				</script>
				<?php
			} else if($row[0]==3){
				$_SESSION["log"] == 1;
				?>
				<script type="text/javascript">

				location.href="index_USUARIO.php";

				</script>
				<?php
			}else{
				if($_SESSION["reload"] == 0){
					$_SESSION["reload"] = 1;
					?>

					<script>
					window.location.reload();
					</script>
					<?php
				}
			}

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




?>

<h1>Bienvenido <?php echo $_SESSION["userName"]; ?></h1>
<hr/>
<div class="row">
	<div class="col-md-6">
		<ul>
			<li>Universidad de San Carlos de Guatemala</li>

			<ul>
			</div>
			<div class="col-md-6">
				<?php if(!$logiado){ ?>
					<h3>Login</h3>
					<form method="post" class="form-horizontal" action="index.php" enctype="multipart/form-data">
						<div class="form-group"><label class="col-sm-2 control-label">user</label><div class="col-sm-10"> <input class="form-control" type="text" name="user"/></div>    </div>
						<div class="form-group"><label class="col-sm-2 control-label">pass</label><div class="col-sm-10"> <input class="form-control" type="password" name="pass"/></div></div>
						<div class="row"><div class="col-md-8">
							<input class="btn btn-primary btn-block" type="submit" value="Login"/>
						</div></div>
					</form>
					<?php
					if($contra_mal){
						echo "Usuario o contraseña incorrecto.";
					}
				}
				?>

			</div>
		</div>


		<?php

		include "abajo.php";



		?>
