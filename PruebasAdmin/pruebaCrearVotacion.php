<?php
/**
 *
 */
class pruebaCrearVotacion extends PHPUnit_Framework_TestCase
{
    public function testCrearVotacion1(){
        require "../plantilla/Administrador/Funciones.php";
        $this.assertSame(true,CrearVotacion("nombre3","2019-09-04",0,"2019-09-04"));
        $this.assertSame(true,CrearVotacion("Votaciones 2019 finales33","2019-09-04",0,"2019-09-04"));
    }
    /*public function testVotacionesActuales(){
      //solo tiene que tirar una votacion
        $this->assertSame(1,VotacionesActuales());
        $this->assertSame(0,VotacionesActuales());
        $this->assertSame(25,VotacionesActuales());
    }*/

}


 ?>
