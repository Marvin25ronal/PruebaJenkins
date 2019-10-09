<?php
/**
 *
 */
use PHPUnit\Framework\TestCase;
class pruebaNotificarTodos extends TestCase
{
    public function testNotificarTodos(){
        require "../plantilla/notificacion.php";
        $this->assertSame(true,notificarTodos("Prueba notificación", "Esta es la prueba de una notificación."));
    }
}

 ?>
