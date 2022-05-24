<?php session_start();
include 'functions.php';
if(!isset($_SESSION['carrito'])) header('Location: index.php');
$carrito = $_SESSION['carrito'];
$nuevoCarrito = [];
$id =  limpiarDatos($_GET['id']);
$eliminar = false;
$x = 0;
for($i = 0; $i < sizeof($carrito);$i++){  

    if($carrito[$i]['id'] == $id){
        $eliminar = true;  
    } else{
        $nuevoCarrito[$x]=$carrito[$i];
        $x++;
    }
}
$_SESSION['carrito'] = $nuevoCarrito;
if(empty($_SESSION['carrito']) || $id == 'vaciar') session_destroy();
if($eliminar == false)header('Location: index.php');
header('Location: carrito.php');
