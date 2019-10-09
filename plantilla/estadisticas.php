<?php
	function obtenerVotaciones(){
		include('funciones.php');
		return mysqli_fetch_array(queryLog("Select * from votacion;"));
	}

	function obtenerCargos(){
		return mysqli_fetch_array(queryLog("Select * from cargo;"));
	}

	function obtenerCandidatos($votacion){
		return mysqli_fetch_array(queryLog("Select * from candidato where votacion = ".$votacion.";"));
	}

?>