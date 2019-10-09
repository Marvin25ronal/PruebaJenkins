<?php

    //PRUEBA PARA COMPROBAR QUE LOS CAMPOS REQUERIDOS DE CARGAR LA NOTICIA SON OBTENIDOS DE MANERA CORRECTA 

    use PHPUnit\Framework\TestCase;

    class testCarga extends TestCase
    {

        public function carga()
        {
            //Metodo que comprueba que la recuperacion de los valores de la base de datos de la noticia son correctas 
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