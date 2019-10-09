<?php
require "Compartir.php";

if(isset($_POST["send"])){
  $grafica=$_POST["graf"];
  $com=new Compartir;
  $com->CompartirGrafica($_POST['DESTINATARIO'],$grafica,$_POST['DESCRIPCION']);
  ?>
  <script type="text/javascript">
    location.href="../index.php";
  </script>
  <?php
}

 ?>
