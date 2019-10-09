<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";
if(isset($_GET["idv"])){
  $cargo=$_GET["idc"];
  $idvotacion=$_GET["idv"];
}
//include ("connection.php");
//echo "se realizo la conexión";
?>
<head>
  <meta charset="UTF-8" />
  <title>amCharts V4 Example - simple-3D-pie-chart</title>
  <link rel="stylesheet" href="./amcharts4/examples/javascript/simple-3D-pie-chart/index.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div class="container-fluid">

  <div id="chartdiv"></div>
  <input type="button" value="Compartir" onclick="funcion();" class="btn btn-info" />
  <script src="./amcharts4/core.js"></script>
  <script src="./amcharts4/charts.js"></script>
  <script src="./amcharts4/themes/animated.js"></script>
  <form class="" id="formulario" action="./Compartir/CompartirGrafica.php" method="post">
    <input type="hidden" name="datos" id="datos" value="">
  </form>

</div>
<script type="text/javascript">
function funcion(){
  //var datos=document.getElementById("chartdiv").innerHTML;

  chart.exporting.getImage("png").then(function(imgData) {
    // contains exported image data
    img=imgData;
    console.log(img);
    document.getElementById("datos").value=img;
    document.getElementById("formulario").submit();
  });
}

</script>
<script type="text/javascript">
am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.PieChart3D);


chart.legend = new am4charts.Legend();
<?php
$resultado = query("select usuario.carne, usuario.nombre ,  candidato.nvotos from candidato , usuario , votacion
where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.id = ".$idvotacion." and cargo = ".$cargo.";");

?>
<?php
$cant=0;
$cant = query("select count(usuario.carne) from candidato , usuario , votacion
where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.id = ".$idvotacion." and cargo = ".$cargo.";");
$cant= mysqli_num_rows($cant);
$result=query("select count(usuario.carne) as total from candidato , usuario , votacion
where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.id = ".$idvotacion." and cargo = ".$cargo.";");
$data=mysqli_fetch_assoc($result);
echo $data['total'];
$cant=$data['total'];

?>

<?php
$aux=0;
if($cant>0){
  $cadena="";
  while($aux<$cant){
    $cadena=$cadena. "{\"nombre\":";
      $cl=mysqli_fetch_array($resultado);
      $cadena= $cadena."\"". $cl["nombre"]."\"";
      $cadena= $cadena.",";
      $cadena= $cadena."\"nvotos\":";
      $cadena=$cadena."\"".$cl["nvotos"]."\"";
      $cadena=$cadena."},";
      $aux=$aux+1;
    }
    $cadena=$cadena. "{\"nombre\":";
      $cl=mysqli_fetch_array($resultado);
      $cadena= $cadena."\"".$cl["nombre"]."\"";
      $cadena= $cadena.",";
      $cadena= $cadena."\"nvotos\":";
      $cadena=$cadena."\"".$cl["nvotos"]."\"";
      $cadena=$cadena."}";
      $aux=0;
    }else{
      $cadena="{}";
      }


      ?>
      chart.data =[
        <?php echo $cadena ?>

      ];

      chart.innerRadius = am4core.percent(40);

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "nvotos";
      series.dataFields.category = "nombre";
      chart.exporting.menu = new am4core.ExportMenu();

      function exportPNG(){

        chart.exporting.getImage("png").then(function(imgData) {
          // contains exported image data
          img=imgData;
          console.log(img);
          //  document.getElementById("datos").value=img;
        });

        //chart.exporting.export("png");
      }
      </script>
      <?php
      include "abajo.php";
      ?>
