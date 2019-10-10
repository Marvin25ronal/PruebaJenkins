<?php

use PHPUnit\Framework\TestCase;
/**
 * @group Unit
 *
 */

class pruebaNotificar extends TestCase
{
    public function testNotificar(){
        require_once __DIR__."\..\../plantilla/notificacion.php";
        $this->assertSame(true,notificar("marvin1ronal@gmail.com", "Prueba notificación", "Esta es la prueba de una notificación."));
    }
}

 ?>
