<?php
/**
 *
 */
class PruebasEliminarVotacion extends PHPUnit_Framework_TestCase
{
    public function testEliminar(){
      require "../plantilla/Administrador/Funciones.php";
      $this->assertSame("true",EliminarVotacion("25"));
      //$this->assertSame("true",EliminarVotacion("26"));
    }

}


 ?>
