<?php

//use PHPUnit\Framework\TestCase;
class pruebaVoto extends PHPUnit_Framework_TestCase
{

    public function testVotar(){
      require "funciones.php";
      $this->assertSame(true,votar("201602520",3));
    }
}

 ?>
