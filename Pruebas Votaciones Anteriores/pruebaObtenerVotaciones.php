<?php
/**
 *
 */
use PHPUnit\Framework\TestCase;
class pruebaObtenerVotaciones extends TestCase
{
    public function testObtenerVotaciones(){
        require "../plantilla/estadisticas.php";
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
