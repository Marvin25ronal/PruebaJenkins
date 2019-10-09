<?php
include_once __DIR__ . "\\..\\funciones.php";



function obtenerInfoCandidato($idCand){

    $resultado = queryLog($idCand);

    return $resultado;
}

function modCandidatoAsCandidato($idCand, $info, $idlog){

    if($idCand == $idlog){
        return modCandidatoAsAdmin($idCand, $info);
    }
}

function modCandidatoAsAdmin($idCand , $info){
  
    try{
        queryLog("update candidato set informacion = '".$info."' where usuario = ".$idCand.";");
        return true;
    }catch(Exception $ec){

    }
}
?>