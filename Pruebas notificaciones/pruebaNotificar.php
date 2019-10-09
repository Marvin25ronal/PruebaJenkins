<?php
/**
 *
 */
use PHPUnit\Framework\TestCase;
class pruebaNotificar extends TestCase
{
    public function testNotificar(){
        require "../plantilla/notificacion.php";
        $this->assertSame(true,notificar("ingrita.rpm@gmail.com", "Prueba notificación", "Esta es la prueba de una notificación."));
    }
}

 ?>
