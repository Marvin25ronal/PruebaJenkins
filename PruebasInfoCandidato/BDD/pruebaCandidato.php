<?php




include "./Story/PHPUnit_Story.php";
require "./../../plantilla/candidato/fCandidato.php";

class pruebaCambiarInfoCandidato extends PHPUnit_Extensions_Story_TestCase{
   /**
  * @scenario
  */
  public function testFallaAlCambiarInfoSinSerAdminYNoSerMiInfo(){
      $this->given('editarInfoCandidato')
        ->when("CambiarInfoOtroUsuario", 2 , "algo" , 1) 
    		 ->then('falla');
  }

  /**
  * @scenario
  */
  public function testIniciaSesion(){
    	$this->given('editarInfoCandidato')
    		 ->when('CambiarInfoPropia',1,'algo',1)
    		 ->then('funciona');
  }

  public function runGiven(&$world, $action, $arguments)
  {
    echo "\nGiven ".$action."\n";
    switch ($action) {
      case 'editarInfoCandidato':
      break;
      default:{
      	return $this->notImplemented($action);
      }
    }
  }

  public function runWhen(&$world, $action, $arguments)
  {
  	switch($action){
      case 'CambiarInfoPropia':
      case 'CambiarInfoOtroUsuario':
      echo "When ".$action."\n";
      $world['p0']=$arguments[0];
      $world['p1']=$arguments[1];
      $world['p2']=$arguments[2];
  	}
  }
  public function runThen(&$world, $action, $arguments)
  {
  	echo "Then ".$action."\n\n";
  	switch($action) {            
  		case 'funciona': 
  		{              
  			$this->assertNotEmpty(modCandidatoAsCandidato($world["p0"] , $world["p1"] , $world["p2"] ));            
  		}           
  		break; 
  		case 'falla': 
  		{                
  			return $this->assertNull(modCandidatoAsCandidato($world["p0"] , $world["p1"] , $world["p2"] ));            
  		}           
  		break;           
  		default:
  		{                
  			return $this->notImplemented($action);            
  		}        
  	}
  }
}


function getNull(){

  return null;
}
?>
