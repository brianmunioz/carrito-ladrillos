<?php session_start();
include 'config.php';
include 'functions.php';

$conn = conexion($bd);
if($conn){
    $statement = $conn->prepare('SELECT * FROM productos');
    $statement->execute();
    $resultado = $statement->fetchAll();
}
else{
    echo 'error';
}

include 'views/index.view.php';

