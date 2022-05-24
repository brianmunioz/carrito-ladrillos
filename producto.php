<?php session_start();
include 'config.php';
include 'functions.php';
$id = limpiarDatos($_GET['id']);
if(!$id || empty($id)){
    header('Location: index.php');
}
$conn = conexion($bd);
if($conn){
    $statement = $conn->prepare('SELECT * FROM productos WHERE id = ?');
    $statement->execute([$id]);
    $prod = $statement->fetch();
    if(empty($prod)) header('Location: index.php');

}
else{
    echo 'error';
}
if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['cantidad'])){
    $carrito = array(
        'id'=>$id,
        'nombre'=>$prod['nombre'],
        'precio'=>$prod['precio'],
        'cantidad'=>$_POST['cantidad']
    );
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array($carrito);       
    }else{
        $existe=false;
        print_r(sizeof($_SESSION['carrito']));
        for($i = 0; $i < sizeof($_SESSION['carrito']);$i++ ){
            if($_SESSION['carrito'][$i]['id'] == $prod['id']){
                $_SESSION['carrito'][$i] = $carrito;
                $existe=true;
            }
        }
        if($existe == false){
            array_push($_SESSION['carrito'],$carrito);
        }
    }
    header('Location: carrito.php');
}

include 'views/producto.view.php';
