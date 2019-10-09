<?php
     
	 class RegistrarVoto extends PHPUnit_Framework_TestCase {
		 
		 public $usuario_id;
		 public $votacion_id;
		 public $cargo_id;
		
		 
		 public function __Construct($usuario_id=0,$votacion_id=0,$cargo_id=0){
		       	 $this->usuario_id;
				 $this->votacion_id;
				 $this->cargo_id;
		 }
		 
		 public function testgetUsuario(){
			 
			 return $this->usuario_id;
		 }
		 
		 public function testgetVotacion(){
			 
			 return $this->votacion_id;
		 }
		 
		 public function testgetCargo(){
			 
			 return $this->cargo_id;
		 }
	     
		 public function testSetInsertarVoto($usuario_id=0,$votacion_id=0,$cargo_id=0){ //Se insertar el voto
                
				$objeto = new RegistrarVoto($usuario_id,$votacion_id,$cargo_id);	
				return "Voto Regisrado";
		 }			 
		 
	 }
	 
	 
?>