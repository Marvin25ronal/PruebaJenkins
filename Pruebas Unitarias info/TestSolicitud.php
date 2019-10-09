<?php

    //PRUEBA PARA COMPROBAR QUE LOS CAMPOS REQUERIDOS DE CARGAR LA NOTICIA SON OBTENIDOS DE MANERA CORRECTA 

    use PHPUnit\Framework\TestCase;

    class testCarga extends TestCase
    {

        public function testInformacion()
        {
            //Metodo que comprueba que los valores de la solicitud sean los indicados  
            //Recibimos 
        }

        public function testPushAndPop()
        {
            $stack = [];
            $this->assertSame(0, count($stack));

            array_push($stack, 'foo');
            $this->assertSame('foo', $stack[count($stack)-1]);
            $this->assertSame(1, count($stack));

            $this->assertSame('foo', array_pop($stack));
            $this->assertSame(0, count($stack));
        }
    }

?>