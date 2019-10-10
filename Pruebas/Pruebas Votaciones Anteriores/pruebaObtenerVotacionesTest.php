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

        $this->assertSame(count(obtenerVotaciones()),count(obtenerVotaciones()));
    }

    public function testObtenerCargos(){
        $this->assertSame(count(obtenerCargos()),count(obtenerCargos()));
    }

    public function testObtenerCandidatos(){
    	$this->assertSame(count(obtenerCandidatos(5)),count(obtenerCandidatos(5)));
    }
}

 ?>
