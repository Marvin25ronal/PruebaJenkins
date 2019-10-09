<?php

use PHPUnit\Framework\TestCase;
class prueba extends TestCase
{
    public function testCambiarinfoPropia()
    {
      require "../plantilla/candidato/fCandidato.php";
        //$cl="Select ..";
        $this->assertNotEmpty(modCandidatoAsCandidato("123","nueva info" , "123"));
        $this->assertNotEmpty(modCandidatoAsCandidato("12","nueva info" , "123"));
        $this->assertNotEmpty(modCandidatoAsCandidato("123","nueva info" , "12"));
    }


}

 ?>
