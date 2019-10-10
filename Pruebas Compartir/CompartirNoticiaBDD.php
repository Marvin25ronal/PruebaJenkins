<?php
include_once __DIR__."\Story\PHPUnit_Story.php";
include_once __DIR__."\..\plantilla\Compartir\Noticia.php";
include_once __DIR__."\..\plantilla\Compartir\Compartir.php";
include_once __DIR__."\..\plantilla\Compartir\Compartir.php";

class CompartirNoticia extends PHPUnit_Extensions_Story_TestCase{
  /**
  * @scenario
  */
  public function testMensajeUnicoDestinatario(){
    $noticia=new Noticia("Este es el titulo","Este es el contenido");
    $this->given('Noticia',$noticia)
    ->when('email','marvin1ronal@gmail.com')
    ->and('idnoticia',3)
    ->then('Se envia mensaje',1);
    //Nueva master
  }
  /**
  * @scenario
  */
  public function MensajeMultipleDestinatario(){
    $noticia=new Noticia("Este es el titulo multiple","Este es el contenido de noticia multiple");
    $this->given('Noticia',$noticia)
    ->when('listaemail1','marvin1ronal@gmail.com')
    ->and('listaemail','marvin1ronal@gmail.com')
    ->and('listaemail','marvin1ronal@gmail.com')
    ->then('Se envia mensaje multiple',1);
  }
  public function runGiven(&$world, $action, $arguments)
  {
    echo "\nGiven ".$action."\n";
    switch ($action) {
      case 'Noticia':
      $world['noticia']=$arguments[0];
      break;
      default:
      return $this->notImplemented($action);
      break;

    }
  }
  public function runWhen(&$world, $action, $arguments)
  {

    switch($action){
      case 'email':
      echo "When ".$action."\n";
      $world['email']=$arguments[0];
      break;
      case 'listaemail1':
      echo "When ".$action."\n";
      $world['conta']=0;
      $world['listaemail'][$world['conta']]=$arguments[0];
      $world['conta']++;
      break;
      case 'listaemail':
      echo "And ".$action."\n";
      $world['listaemail'][$world['conta']]=$arguments[0];
      $world['conta']++;
      break;
    }
  }
  public function runThen(&$world, $action, $arguments)
  {
    $compar=new Compartir;
    $titulo=$world['noticia']->titulo;
    $mensaje=$world['noticia']->contenido;
    echo "Then ".$action."\n";
    switch($action){
      case 'Se envia mensaje':
      $this->assertEquals(true,$compar->CompartirNoticia($titulo,$mensaje,$world['email'],"Contenido cuerpo","Compartir.png"));
      break;
      case 'Se envia mensaje multiple':
      for($i=0;$i<$world['conta'];$i++){

        $this->assertEquals(true,$compar->CompartirNoticia($titulo,$mensaje,$world['listaemail'][$i],"Contenido Cuerpo","Compartir.png"));
      }

    }
  }
}

?>
