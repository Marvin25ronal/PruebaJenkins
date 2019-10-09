<?php
include "Plantilla.php";
require "Funciones.php";
$consultacon="Select * from cargo";

if(isset($_GET["id"])){
  $id=$_GET["id"];
  $consultacon="select cargo.id,usuario.carne,usuario.nombre as \"Nombre usuario\",cargo.nombre as \"Cargo\" from cargo,usuario,votacion,candidato where candidato.votacion=\"".$id."\" and
  candidato.cargo=cargo.id and usuario.carne=candidato.usuario and votacion.id=candidato.votacion
  ;";
  $consultaUsuario="select usuario.carne,usuario.nombre from usuario";
  $consultaCargos="select cargo.id,cargo.nombre from cargo;";
}
if(isset($_GET["msg"])){
  ?>
  <div class="alert alert-danger"><?php printf($_GET["msg"]); ?></div>
  <?php

}
?>



<?php
?>
<form class="" action="" method="post">
  <div class="form-group">
    <h3>Usuarios</h3>
    <br>
    <?php
    crearSelector($consultaUsuario,"Usuarios",100);
    ?>
    <h3>Cargos</h3>
    <br>
    <?php
    crearSelector($consultaCargos,"Cargos",1);
    ?>
    <input type="submit" class="button btn-success" name="submit" value="Agregar">
  </div>
</form>
<?php
listaCargos($consultacon,"Datos votacion");
?>


<?php
function crearSelector($consulta,$name,$modo){

  $res=query($consulta);
  ?>
  <select name="<?php printf($name) ?>" class="mdb-select md-form">
    <option value="" disabled selected>Choose your option</option>

    <?php
    while ($cl = mysqli_fetch_array( $res )){
      if($modo==1){
        printf("<option id=\"".$name."\" value=\"".$cl[0]."\">".$cl[1]."</option>");
      }else{
        printf("<option id=\"".$name."\" value=\"".$cl[0]."\">".$cl[1]."-".$cl[0]."</option>");
      }

    }
    ?>
  </select>



  <?php

}
?>

<?php
if(isset($_POST["submit"])){
  $usuario=$_POST['Usuarios'];
  $cargo=$_POST['Cargos'];
  $url="./AgregarElemento.php?id=".$id."&usuario=".$usuario."&cargo=".$cargo;
  ?>
  <script type="text/javascript">
  location.href="<?php echo $url; ?>";
  </script>
  <?php
  ?>

  <?php
  ?>
  <?php
}

?>
<?php
function listaCargos($consulta , $tittle){

  ?>

  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h2 align="center"><?php echo $tittle; ?></h2></div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <?php
            //  require "Funciones.php";
            $resultado = query($consulta);
            $info_campo = $resultado->fetch_fields();
            $ncolumnas = 0;
            $contador=0;
            foreach ($info_campo as $valor) {
              if($contador==0){
                $contador=$contador+1;
                continue;
              }
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


          while ($cl = mysqli_fetch_array( $resultado )){
            //echo $cl;
            $nreg++;
            print('<tr>');
            $aux = false;
            $contador2=0;
            foreach($cl as $valor){

              if($contador2==0){

                $contador2=$contador2+1;
                $aux=true;
                continue;
              }
              if($aux == true){

                $aux = false;
                continue;
              }
              $aux = true;
              printf("<td>%s</td>",   $valor);
            }
            $boton="<td><button type=\"button\" name=\"button\" onclick=\"funcionRE(".$cl[0].",".$cl[1].",".$_GET["id"].")\" class=\"btn btn-info\">Remover</button></td>";
            printf($boton);
            print('</tr>');
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
<script type="text/javascript">
  function funcionRE(cargo,carne,votacion){
      location.href="./EliminarElemento.php?votacion="+votacion+"&cargo="+cargo+"&usuario="+carne;
  }
</script>
<?php

?>
