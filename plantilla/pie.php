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

	<!-- Breadcrumbs-->
	<h1>Resultados grafica de pie</h1>
</br>
<!-- Page Content -->
<!--El titulo de la votación lo obtenemos de la base de datos -->
<?php
$votaccion = "";
while ($cl = mysqli_fetch_array( $resultado )){
	$votacion = $cl["nombre"];
	printf("<h3 class=\"display-5\">" .$votacion. "</h3>");
	?>






	<?php

	?>

	<div class="row">
		<?php
		$resultado1 = query("select * from cargo;");

		while ($cl1 = mysqli_fetch_array( $resultado1 )){
			?>

			<div class="card" style="width: 18rem;">
				<a href="MostrarPie.php?idv=<?php echo $cl["id"]; ?>&idc=<?php echo $cl1["id"]?>" class="btn btn-primary"><?php echo $cl1["nombre"]; ?></a>

			</div>

			<?php
		}
		?>
		<?php
		?>
	</div>
	</br></br></br>

<!-- CARDS END -->







<?php
}

?>

<!--<p class="lead">Algo</p>-->




<!-- CARDS -->
 </br></br></br></br></br></br></br>
<?php
include "abajo.php";
?>
