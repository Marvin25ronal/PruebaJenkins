<?php

require_once __DIR__."/../../Pruebas Compartir/Story/PHPUnit_Story.php";
require_once __DIR__.'/../../../plantilla/Login.php';
require_once __DIR__.'/../../../plantilla/funciones.php';
use PHPUnit\Framework\TestCase;
/**
 * @group Unit
 *
 */
class pruebaLogin extends PHPUnit_Extensions_Story_TestCase{
   /**
  * @scenario
  */
  public function test_Falla_Al_Recibir_Credenciales_Vacias(){
    	$this->given('Login sin ingresar usuario y contraseña')
    		 ->then('Error', false);
  }

  /**
  * @scenario
  */
  public function test_No_Inicia_Sesion_Usuario_Inexistente(){
      $this->given('Login')
         ->when('Usuario inexistente y Contraseña','1234','1234')
         ->then('No entra', false);
  }

  /**
  * @scenario
  */
  public function test_No_Inicia_Sesion_Contraseña_Vacia(){
      $this->given('Login')
         ->when('Solo ingresa carnet pero no contraseña','1234','')
         ->then('No entra', false);
  }

  /**
  * @scenario
  */
  public function test_No_Inicia_Sesion_Usuario_Vacio(){
      $this->given('Login')
         ->when('Solo ingresa contraseña pero no carnet','','1234')
         ->then('No entra', false);
  }

  /**
  * @scenario
  */
  public function test_Inicia_Sesion_Contraseña_Incorrecta(){
      $this->given('Login')
         ->when('Usuario existente y Contraseña incorrecta','201602420','j')
         ->then('No entra', true);
  }

  /**
  * @scenario
  */
  public function test_Inicia_Sesion_Credenciales_Correctas(){
      $this->given('Login')
         ->when('Usuario existente y Contraseña correcta','201602420','123')
         ->then('Entra', true);
  }

  public function runGiven(&$world, $action, $arguments)
  {
    echo "\nGiven ".$action."\n";
    switch ($action) {
      case 'Login sin ingresar usuario y contraseña':
      case 'Login':
      $world['login']=new Login();
      break;
      default:{
      	return $this->notImplemented($action);
      }
    }
  }

  public function runWhen(&$world, $action, $arguments)
  {
  	switch($action){
      case 'Usuario y Contraseña vacios':
      case 'Usuario existente y Contraseña incorrecta':
      case 'Usuario inexistente y Contraseña':
      case 'Solo ingresa contraseña pero no carnet':
      case 'Solo ingresa carnet pero no contraseña':
      case 'Usuario existente y Contraseña correcta':
      echo "When ".$action."\n";
      $world['carnet']=$arguments[0];
      $world['pass']=$arguments[1];
  	}
  }
  public function runThen(&$world, $action, $arguments)
  {
  	echo "Then ".$action."\n\n";
  	switch($action) {
  		case 'Error':
  		{
  			return $this->assertEquals($arguments[0], $world['login']->iniciar("",""));
  		}
  		break;
      case 'No entra':
      case 'Entra':
      {
        return $this->assertEquals($arguments[0], $world['login']->iniciar($world['carnet'],$world['pass']));
      }
      break;
  		default:
  		{
  			return $this->notImplemented($action);
  		}
  	}
  }
}

?>
