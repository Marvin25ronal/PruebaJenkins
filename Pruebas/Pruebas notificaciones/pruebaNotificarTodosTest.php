<?php

use PHPUnit\Framework\TestCase;
/**
 * @group Unit
 *
 */
class pruebaNotificarTodos extends TestCase
{

  public function testNotificarTodos(){
    require_once __DIR__."\..\../plantilla/notificacion.php";
    $this->assertSame(true,notificarTodos("Prueba notificación", "Esta es la prueba de una notificación."));
  }
}

?>
