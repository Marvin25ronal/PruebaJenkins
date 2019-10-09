<?php
require "Compartir.php";

if(isset($_POST["graf"])){

  $grafica=$_POST["graf"];
  $nombre=$_POST["nombre"];
  $informacion=$_POST["informacion"];
  $com=new Compartir;
  $com->CompartirCandidato($_POST['DESTINATARIO'],$grafica,$nombre,$informacion,$_POST['DESCRIPCION']);
  ?>
  <script type="text/javascript">
   location.href="../index.php";

  </script>
  <?php
}

 ?>
