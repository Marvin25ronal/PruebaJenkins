<?php
use PHPUnit\Framework\TestCase;
class ObtenerDatosVoto extends TestCase {

  public $usuario_id;
  public $votacion_id;
  public $cargo_id;

  $lista= array();

  public function __Construct($usuario_id=0,$votacion_id=0,$cargo_id=0){
    $this->usuario_id;
    $this->votacion_id;
    $this->cargo_id;

    $lista = array('usuario_id' => '32', 'votacion_id' => '43', 'cargo_id' => '54');
    $lista = array('usuario_id' => '33', 'votacion_id' => '44', 'cargo_id' => '55');
    $lista = array('usuario_id' => '34', 'votacion_id' => '45', 'cargo_id' => '56');
    $lista = array('usuario_id' => '35', 'votacion_id' => '46', 'cargo_id' => '57');
    $lista = array('usuario_id' => '36', 'votacion_id' => '47', 'cargo_id' => '58');
  }

  public function testgetUsuario(){

    return $this->usuario_id;
  }

  public function testgetVotacion(){

    return $this->votacion_id;
  }

  public function testgetCargo(){

    return $this->cargo_id;
  }

  public function testgetListaVoto(){ //Se realiza la consulta de votos

    for($i=0;$i<sizeof($lista);$i++){

      echo $lista->usuario_id . "  " . $lista->votacion_id . "  " . $lista->cargo_id;
    }

  }

}


?>
