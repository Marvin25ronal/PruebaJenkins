<?php
include_once __DIR__ . "\\..\\funciones.php";


function addForo($iduser, $texto, $titulo, $imagen = "")
{
    try {
        $var = sprintf("insert into foro(creador , texto , titulo , imagen) values(%d , '%s' , '%s' , '%s'); ", $iduser, $texto, $titulo, $imagen);
        queryLog($var);
        return true;
    } catch (Exception $e) { }
}

function editForo($idForo, $texto, $titulo, $imagen = "")
{
    try {
        $var = sprintf("update  foro set texto='%s' , titulo = '%s' , imagen = '%s' where id = %d " ,  
        $texto, $titulo, $imagen, $idForo);
         
        queryLog($var);
        return true;
    } catch (Exception $e) { }
}

function deleteForo($idForo)
{
    try {
        $var = sprintf("delete from foro  where id = %d " ,   $idForo);
         
        queryLog($var);
        return true;
    } catch (Exception $e) { }
}

function crearComenForo($texto , $foro , $comentarista){
    
    try {
        $var = sprintf("insert into mensaje_foro(texto  ,foro , comentarista) values ('%s' , %d , %d); ", $texto , $foro , $comentarista);
         
        queryLog($var);
        return true;
    } catch (Exception $e) { }

}

function editComenForo($id , $texto){

    try {
        $var = sprintf("update mensaje_foro set texto = '%s' where id = %d; ", $texto , $id);
        queryLog($var);
        return true;
    } catch (Exception $e) { }
}

function elimComenForo($id){

    
    try {
        $var = sprintf("delete from  mensaje_foro where id = %d; ", $id);
        queryLog($var);
        return true;
    } catch (Exception $e) { }
}