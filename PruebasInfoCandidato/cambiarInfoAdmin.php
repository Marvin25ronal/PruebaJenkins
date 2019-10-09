<?php

use PHPUnit\Framework\TestCase;
class prueba extends TestCase
{
    public function testObtenerInfoCandidato()
    {
      require "../plantilla/candidato/fCandidato.php";
        //$cl="Select ..";
        //function modCandidatoAsAdmin($idCand , $info){
        $this->assertNotEmpty(modCandidatoAsAdmin("123" , "nueva informacion"));
        $this->assertNotEmpty(modCandidatoAsAdmin("122" , "nueva informacion"));
     }
}

 ?>
