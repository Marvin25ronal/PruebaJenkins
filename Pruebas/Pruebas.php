<?php

use PHPUnit\Framework\TestCase;
class Prueba extends TestCase{

  public function testCorrerPrueba(){
    require __DIR__."\../Pruebas Compartir/PruebaCompartir.php";
    //Compartir informacion
    $prueba1=new pruebaCompartir();
    $prueba1->Correr();
    //Compartir BDD

    
  }
}

 ?>
