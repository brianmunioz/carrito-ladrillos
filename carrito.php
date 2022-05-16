<?php session_start();
include 'config.php';
include 'functions.php';
    if(isset($_SESSION['carrito'])){
        $resultado= $_SESSION['carrito'];

    }
             
$totalCarrito = 0;
include 'views/carrito.view.php';