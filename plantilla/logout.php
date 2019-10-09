<?php
	session_start();
	$_SESSION["log"] = 0;
	$_SESSION["userName"] = "";
	$_SESSION["tipo"] = 0;
	$_SESSION["iduser"] = 0; 
	header('Location: index.php');
?>
