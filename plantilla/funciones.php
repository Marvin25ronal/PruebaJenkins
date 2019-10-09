<?php



	function queryLog( $query ) {
		/*$usuario = "root";
		$password = "pensa";
		$servidor = "localhost:3306";
		$basededatos = "db_votos";
		*/
		
		include "Contra.php";
		// creación de la conexión a la base de datos con mysql_connect()
		$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

		// Selección del a base de datos a utilizar
		$db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
		$resultado = mysqli_query( $conexion, $query ) or die ( "algo salio mal");
		return  $resultado;
	}

	function login($us, $pass){
		$resultado = queryLog("select * from usuario where (carne = '".$us."'
			|| correo = '".$us."') && pass = '".$pass."';");
			$todo_bien = false;
			while ($cl = mysqli_fetch_array( $resultado )){
				$_SESSION["iduser"] = $cl["carne"];
				$_SESSION["userName"] = $cl["nombre"];
				$_SESSION["tipo"] = $cl["tipo_usuario"];
				$_SESSION["log"] = 1;
				$todo_bien = true;
				break;
			}
			//$_SESSION["reload"] = 0;
		return $todo_bien;
	}

	function votar($us , $cargo){
		$resultado = queryLog("select * from candidato , votacion
		where votacion.id = candidato.votacion and votacion.estado = 1 and cargo = ".$cargo." and usuario = ".$us.";");
		$nvotos = 0;
		$nvotacion = 0;
		while ($cl = mysqli_fetch_array( $resultado )){
			$nvotos = $cl["nvotos"] + 1;
			$nvotacion = $cl["votacion"];
			break;
		}
		queryLog("update candidato set nvotos = ".$nvotos." where usuario = ".$us." and cargo = ".$cargo." and votacion = ". $nvotacion. ";");

		return true;
	}

?>
