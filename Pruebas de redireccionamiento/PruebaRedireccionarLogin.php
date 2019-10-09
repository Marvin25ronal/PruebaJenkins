<?php

//use PHPUnit\Framework\TestCase;
class PruebaRedireccionarLogin extends PHPUnit_Framework_TestCase
{
    public function testRedireccionarLogin()
    {
      require '../plantilla/RedireccionarLogin.php';
	  login("20000000","admin");
	  $this->assertSame(1,tipoUsuario());
	  //1 es la respuesta del metodo si el usuario es de tipo administrador
	  login("20100000","12345");
	  $this->assertSame(2,tipoUsuario());
	  //2 es la respuesta del metodo si el usuario es de tipo candidato
	  login("201652302","7777777");
	  $this->assertSame(3,tipoUsuario());
	  //2 es la respuesta del metodo si el usuario es de tipo candidato
    }
}

 ?>

