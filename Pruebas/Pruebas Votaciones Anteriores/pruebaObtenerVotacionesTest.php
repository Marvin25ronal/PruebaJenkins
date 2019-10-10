<?php
/**
 *
 */
use PHPUnit\Framework\TestCase;
/**
 * @group Unit
 *
 */
 require_once __DIR__."\../../plantilla/estadisticas.php";
class pruebaObtenerVotaciones extends TestCase
{
    public function testObtenerVotaciones(){

        $this->assertSame(10,count(obtenerVotaciones()));
    }

    public function testObtenerCargos(){
        $this->assertSame(6,count(obtenerCargos()));
    }

    public function testObtenerCandidatos(){
    	$this->assertSame(2,count(obtenerCandidatos(5)));
    }
}

 ?>
