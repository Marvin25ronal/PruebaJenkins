<?php
/**
*
*/
use PHPUnit\Framework\TestCase;
class pruebaCompartir extends TestCase
{
  public function testCompartirGrafica(){
    include_once __DIR__."\../plantilla/Compartir/Compartir.php";
    $archivo="data:image/gif;base64,
    R0lGODdhMAAgAOMAANwCDOyCDPzmDPSeDNwSDPS2DOyODPzqDPSiDNwaDAAAAAAAAAAAAAAAAAAA
    AAAAACwAAAAAMAAgAAAE/fAISaew98q8+/TdZlUkdpyjOZarhpbkScnfTMfvDQd87//AoHDYAxiP
    yKRyyWw6n9BoMkElVK8Jaxar7XK/23BhTC6bz+i0mqwxwVIzuDyXqns4mExbpNff8QaBgoOEhYaH
    iIIEi4yNjo+QkZKMUpWWR1aZW5qcm56doJ9bCAOkpqWop6qprKuurH2xsrO0fXx+eXN5f29/sQPA
    rMHDwaTExsTFycUIVGFaztHPzl7S09KZl9pRk93e34uJ4uPkgbXn6Oku6uztB2vw8fJj1vX29/j2
    2/v8/VJEAAMK5LErF4iCeNokZEEnhps4vWpUkPjBTgsUC+sk3GNLQwQAOw==";
    $s=new Compartir;
    $this->assertEquals(true,$s->CompartirGrafica("marvin1ronal@gmail.com",$archivo,"Este es el cuerpo"));
  //  $this->assertEquals(false,$s->CompartirGrafica("1",$archivo,"Este es el cuerpo"));

  }
  public function testCompartirCandidato(){
    include_once __DIR__."\../plantilla/Compartir/Compartir.php";
    $archivo="data:image/gif;base64,
    R0lGODdhMAAgAOMAANwCDOyCDPzmDPSeDNwSDPS2DOyODPzqDPSiDNwaDAAAAAAAAAAAAAAAAAAA
    AAAAACwAAAAAMAAgAAAE/fAISaew98q8+/TdZlUkdpyjOZarhpbkScnfTMfvDQd87//AoHDYAxiP
    yKRyyWw6n9BoMkElVK8Jaxar7XK/23BhTC6bz+i0mqwxwVIzuDyXqns4mExbpNff8QaBgoOEhYaH
    iIIEi4yNjo+QkZKMUpWWR1aZW5qcm56doJ9bCAOkpqWop6qprKuurH2xsrO0fXx+eXN5f29/sQPA
    rMHDwaTExsTFycUIVGFaztHPzl7S09KZl9pRk93e34uJ4uPkgbXn6Oku6uztB2vw8fJj1vX29/j2
    2/v8/VJEAAMK5LErF4iCeNokZEEnhps4vWpUkPjBTgsUC+sk3GNLQwQAOw==";
    $s=new Compartir;
    $this->assertEquals(true,$s->CompartirCandidato("marvin1ronal@gmail.com",$archivo,"Manuel","Este es la informacion del candidato","Este es el cuerpo"));
  }

}


?>
