<?php
class PruebasCrearCargo extends PHPUnit_Framework_TestCase
{
    public function testCrearCargo(){
      require "../plantilla/Administrador/Funciones.php";
      $this->assertSame("true",CrearCargo("Cargo 2","Este es el cargo 2",1,0));
      $this->assertSame("true",CrearCargo("Cargo 3","Este es el cargo 2",1,0));
    }
}

 ?>
