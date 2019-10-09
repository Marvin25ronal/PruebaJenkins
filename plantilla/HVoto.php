<?php
	session_start();
	$_SESSION["per"] = 1;
  include "arriba.php";
  include ("connection.php");

  //echo "se realizo la conexión";
?>
<div class="container-fluid">
  <h1>El voto se registro con exito!</h1>
  <button type="button" name="button" onclick="f1()"> Ver Resultados</button>
  <img src="./plantilla/img/E.png" alt="">
  <script type="text/javascript">
    function f1(){
      location.href="https://www.w3schools.com/js/tryit.asp?filename=tryjs_confirm";
    }
  </script>
</div>
</html>

<?php
	include "abajo.php";
?>
