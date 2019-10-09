  <?php
	session_start();
	$_SESSION["per"] = 1;
  include "arriba.php";
  
  
  $cargo = 1;
  if(isset($_GET["us"])){
	  $us = $_GET["us"];
	  $cargo = $_GET["cargo"];
	  
	  $resultado = query("select usuario.carne as 'carne', usuario.nombre as 'nombre',  candidato.nvotos as 'nvotos' from candidato , usuario , votacion
where candidato.usuario = usuario.carne and  votacion.estado = 1 and votacion.id = candidato.votacion and cargo = ".$cargo.";");
		$nvotos = "[";
		$res = 0;
		$candidatos = "[";
		$i = 0;
		while ($cl = mysqli_fetch_array( $resultado )){
			$res += $cl["nvotos"];
			$candidatos = $candidatos."\"".$cl["nombre"]."\"";
			$nvotos = $nvotos."\"".$cl["nvotos"]."\"";
			if($i!=(count($cl)-1)){
				$candidatos = $candidatos.",";
				$nvotos = $nvotos.",";
			}
			$i++;
		}
		$candidatos = $candidatos."]";
		$nvotos = $nvotos."]";
 }
  //include ("connection.php");
  //echo "se realizo la conexión";
?>


 

 <div class="col-md-10 col-md-offset-4">
 <h1><?php echo "Total de votos: ".$res; ?></h1>
</br></br>
<div class="col text-center">
<div id="chart-container">
    <canvas id="mycanvas"></canvas>
    </div>
	</div>
	</div>

    <!-- javascript -->
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script>
<script>
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
$(document).ready(function(){
	Chart.defaults.global.responsive = true;
Chart.defaults.global.scaleBeginAtZero = true;
Chart.defaults.global.barBeginAtOrigin = false,
Chart.defaults.global.animation = false;

    
    var player = <?php echo $candidatos ?>;
    var score = <?php echo $nvotos?>;
	
	score.push(0);
      var chartdata = {
        labels: player,
        datasets: [
        {
			label: "Votos",
			backgroundColor: [ "red", "blue", "orange","green", "brown",  "blue", "yellow","purple", "red", "blue", "orange","green", "brown",  "blue", "yellow","purple" ],
            data: score
        }]
    
    };
	  
	  /*datasets : [
          {
            label: 'Total de votos',
            backgroundColor: getRandomColor(),
            borderColor: getRandomColor(),
            hoverBackgroundColor: getRandomColor(),
            hoverBorderColor: getRandomColor(),
            data: score
          }],
		  scales:{
        yAxes:[{
            min:0,
            //this value will be overridden if the scale is greater than this value
            suggestedMax:10
        }]
    }
	  */
	  

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
});
</script>
</br></br></br></br></br></br>
<?php
	mostrartabla("select usuario.carne, usuario.nombre ,  candidato.nvotos from candidato , usuario , votacion
where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.estado = 1 and cargo = ".$cargo.";" , "Resultados");


	include "abajo.php";
?>