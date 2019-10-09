<?php


use PHPUnit\Framework\TestCase;
include_once("./../plantilla/Foro/fForo.php"); 



class PruebaForo extends TestCase

//class PruebaVehiculoCola extends PHPUnit_Framework_TestCase
{
    
    public function testAddForo(){
        //                                    cliente , empleado , vehiculo , fecha_estimada, descripcion
        $this->assertNotEmpty(addForo(2 , "algo jeje" , "el titulo" , ""));
    }

    public function testEditForo(){
        //                                    cliente , empleado , vehiculo , fecha_estimada, descripcion
        $this->assertNotEmpty(editForo(2 , "algo editado" , "Sin titulo" , ""));
    }

    public function testdeleteForo(){
        //                                    cliente , empleado , vehiculo , fecha_estimada, descripcion
        $this->assertNotEmpty(deleteForo(2));
    }

}