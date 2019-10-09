<?php
/**
 *
 */
class pruebaEditarVotacion extends PHPUnit_Framework_TestCase
{
    public function testEditarVotacion(){
      require "../plantilla/Administrador/Funciones.php";
      $this->assertSame("true",ActualizarVotacion("2","Votacion del futurooo","2018-05-10","0","2019-05-10"));
      $this->assertSame("true",ActualizarVotacion("2","Regresamos al pasado","2018-05-10","1","2019-05-1"));
      //pruebas fecha menor que la de vencimiento
      $this->assertSame("false",ActualizarVotacion("2","Votacion del futurooo","2018-05-10","0","2000-04-10"));
      $this->assertSame("false",ActualizarVotacion("2","Regresamos al pasado","2018-05-10","1","2000-04-1"));
    }

}


 ?>
