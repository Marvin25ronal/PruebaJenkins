<?php
session_start();
$_SESSION["per"] = 1;
include "arriba.php";

$nvotos =array();
$candidatos =array();
$cargo = 1;
if(isset($_GET["us"])){
  $us = $_GET["us"];
  $cargo = $_GET["cargo"];
  $resultado = query("select usuario.carne as 'carne', usuario.nombre as 'nombre',  candidato.nvotos as 'nvotos' from candidato , usuario , votacion
  where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and candidato.votacion = ".$us." and cargo = ".$cargo.";");

  $res = 0;

  $contador=0;
  $i = 0;
  while ($cl = mysqli_fetch_array( $resultado )){
    $res += $cl["nvotos"];
    $candidatos[$contador] = $cl["nombre"];
    $nvotos[$contador] = $cl["nvotos"];
    $i++;
    $contador++;
  }
}
//include ("connection.php");
//echo "se realizo la conexión";
?>


<link rel="stylesheet" href="./amcharts4/examples/javascript/column-chart-with-axis-break/index.css" />

<div class="mh-500">
  <h1><?php echo "Total de votos: ".$res; ?></h1>
</br></br>
<div class="col text-center">



  <script src="./amcharts4/core.js"></script>
  <script src="./amcharts4/charts.js"></script>
  <script src="./amcharts4/themes/animated.js"></script>
  <script src="./amcharts4/themes/material.js"></script>
  <form class="" id="formulario" action="./Compartir/CompartirGrafica.php" method="post">
    <input type="hidden" name="datos" id="datos" value="">
  </form>
</div>

</div>
<table class="table-responsive">
  <tr>
    <td>
      <div class="container-fluid">
        <div style="height: 400px; ">
          <div id="chartdiv"class="mh-100" style="width: 1200px; height: 2000px; "></div>
          <input type="button" value="Compartir" onclick="funcion();" class="btn btn-info" />
          <?php
          mostrartabla("select usuario.carne, usuario.nombre ,  candidato.nvotos from candidato , usuario , votacion
          where candidato.usuario = usuario.carne and votacion.id = candidato.votacion and votacion.estado = 1 and cargo = ".$cargo.";" , "Resultados");
          ?>
          <form class="" id="formulario" action="./Compartir/CompartirGrafica.php" method="post">
            <input type="hidden" name="datos" id="datos" value="">
          </form>
        </div>
      </td>
    </tr>
  </table>
</div>

<!-- javascript -->
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script>

<script type="text/javascript">
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv", am4charts.XYChart);
<?php
$cadena="";
if(count($candidatos)>0){
  for($i=0;$i<count($candidatos)-1;$i++){
    $cadena=$cadena."{\"nombre\":";
      $cadena=$cadena."\"".$candidatos[$i]."\"";
      $cadena=$cadena.",";
      $cadena= $cadena."\"nvotos\":";
      $cadena=$cadena.$nvotos[$i];
      $cadena=$cadena."},";
    }
    $cadena=$cadena."{\"nombre\":";
      $cadena=$cadena."\"".$candidatos[$i]."\"";
      $cadena=$cadena.",";
      $cadena= $cadena."\"nvotos\":";
      $cadena=$cadena.$nvotos[$i];
      $cadena=$cadena."}";
    }else{
      $cadena="{}";
      }
      ?>
      chart.data=[
        <?php echo $cadena; ?>
      ];

      chart.padding(40, 40, 40, 40);
      var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.dataFields.category = "nombre";
      categoryAxis.renderer.minGridDistance = 20;
      var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.min = 0;
      <?php


      ?>
      valueAxis.max = <?php
      $ant=0;
      for($i=0;$i<count($nvotos);$i++){
        if($nvotos[$i]>$ant){
          $ant=$nvotos[$i];
        }
      }
      echo (round($ant+$ant*0.30)); ?>;
      valueAxis.strictMinMax = true;
      valueAxis.renderer.minGridDistance = 10;
      valueAxis.renderer.labels.template.hiddenState.transitionDuration = 2000;
      valueAxis.renderer.labels.template.defaultState.transitionDuration = 2000;

      // axis break
      var axisBreak = valueAxis.axisBreaks.create();
      axisBreak.startValue = 2100;
      axisBreak.endValue = 22900;
      axisBreak.breakSize = 0.01;


      // make break expand on hover
      var hoverState = axisBreak.states.create("hover");
      hoverState.properties.breakSize = 1;
      hoverState.properties.opacity = 0.1;
      hoverState.transitionDuration = 1500;

      axisBreak.defaultState.transitionDuration = 1000;

      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.categoryX = "nombre";
      series.dataFields.valueY = "nvotos";
      series.columns.template.tooltipText = "{valueY.value}";
      series.columns.template.tooltipY = 0;
      series.columns.template.strokeOpacity = 0;
      series.columns.template.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });
      </script>

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
    </br></br></br></br></br></br>
    <?php



    include "abajo.php";
    ?>
