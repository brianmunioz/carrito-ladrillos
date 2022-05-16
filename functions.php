<?php 


 function conexion($bd){
    try{
        $conn = new PDO('mysql:host='.$bd['host'].'; dbname='.$bd['bdname'] ,$bd['user'],$bd['pass']);
        return $conn;
    }catch(PDOException $e){
        return false;
    }
}
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripcslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
