<?php


use PHPUnit\Framework\TestCase;
include_once("./../plantilla/Foro/fForo.php"); 

class PruebaComenForos extends TestCase

//class PruebaVehiculoCola extends PHPUnit_Framework_TestCase
{
    //id    texto   foro   comentarista
    public function testCrearForo(){
        
        $this->assertNotEmpty(crearComenForo("algo"  , 24 , 1));
    }

    public function testEliminararForo(){
        //id del foro
        $this->assertNotEmpty(elimComenForo(1));
    }


    public function testEditarForo(){
        //id foro, titulo , texto , imagen
        $this->assertNotEmpty(editComenForo(1 , "algo jejeje"));
    }

}