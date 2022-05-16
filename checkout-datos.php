<?php session_start();
if(!isset($_SESSION['carrito'])){
    header('Location: index.php');
}
include 'functions.php';


if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $datos = array(
        'nombre'=> limpiarDatos($_POST['nombre']),
        'apellido'=>limpiarDatos($_POST['apellido']),
        'dni'=> limpiarDatos($_POST['dni']),
        'calle'=>limpiarDatos($_POST['calle']),
        'nro'=> limpiarDatos($_POST['nro']),
        'depto'=> limpiarDatos($_POST['depto']),
        'barrio'=> limpiarDatos($_POST['barrio']),
        'ciudad'=>limpiarDatos($_POST['ciudad']),
        'provincia'=> limpiarDatos($_POST['provincia']),
        'postal'=> limpiarDatos($_POST['postal']),
        'email'=> filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        'tel'=>limpiarDatos($_POST['tel'])
     );
     $_SESSION['datos']=$datos;
     header('Location: comprar.php');
}








include 'views/checkout-datos.view.php';