<?php

//use PHPUnit\Framework\TestCase;
class prueba extends PHPUnit_Framework_TestCase
{
    public function testQuery()
    {
      require "funciones.php";
        //$cl="Select ..";
        $this->assertSame(false,login("201602570","123"));
    }

    public function testVotar(){
      //require "funciones.php";
      $this->assertSame(true,votar("201602520",3));
    }
}

 ?>
