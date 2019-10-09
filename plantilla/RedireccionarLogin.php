<?php

function tipoUsuario(){
	if($_SESSION["tipo"] == 1){
		return 1;
	else if($_SESSION["tipo"] == 2);
		return 2;
	else if($_SESSION["tipo"] == 1)
		return 3;
	return 0;
}
?>
