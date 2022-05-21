<?php session_start();
error_reporting(0);
if(!isset($_SESSION['carrito']) )header('Location: index.php');
if(isset($_SESSION['datos'])) header('Location: comprar.php');
include 'functions.php';
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $errores = '';
    if(isset($_SESSION['errores'])){
        unset($_SESSION['errores']);
    }
    $nombre = limpiarDatos($_POST['nombre']);
    $apellido = limpiarDatos($_POST['apellido']);
    $dni = limpiarDatos($_POST['dni']);
    $calle = limpiarDatos($_POST['calle']);
    $nro  = limpiarDatos($_POST['nro']);
    $depto  = limpiarDatos($_POST['depto']);
    $barrio = limpiarDatos($_POST['barrio']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $provincia = limpiarDatos($_POST['provincia']);
    $postal = limpiarDatos($_POST['postal']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $tel  = limpiarDatos($_POST['tel']);
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    if(empty($nombre) || strlen($nombre) < 2)$errores .= '-El campo nombre no debe estar vacío o debe ser más largo <br>';
    if(empty($apellido) || strlen($apellido)<2)  $errores .= '-El campo apellido no debe estar vacío o debe ser más largo <br>';
    if(empty($dni) ||strlen($dni)!=8 || !is_numeric($dni))  $errores .= '-El campo DNI no debe estar vacío o debe tener 8 dígitos o no escribió un número<br>';
    if(empty($calle) || strlen($calle)<=2 )  $errores .= '-El campo Calle no debe estar vacío o debe tener por los menos 3 caracteres<br>';
    if(empty($nro) || !is_numeric($nro)  )  $errores .= '-El campo nro no debe estar vacío o no es un número <br>';
    if(empty($provincia) || strlen($provincia)<5 )  $errores .= '-El campo provincia no debe estar vacío o es demasiado corto el nombre de la provincia<br>';
    if(empty($ciudad) || strlen($ciudad)<=2 )  $errores .= '-El campo ciudad no debe estar vacío o es demasiado corto<br>';
    if(empty($postal)|| strlen($postal)<4 )  $errores .= '-El campo código postal no debe estar vacío o es demasiado corto<br>';
    if(empty($tel) || strlen($tel)<=7  || !is_numeric($tel) )  $errores .= '-El campo teléfono no debe estar vacío o es demasiado corto, o no es un número<br>';   
    if(!preg_match($regex, $email)||empty($email) ) $errores .= '-El campo email no debe estar vacío o es invalido<br>';
    if($errores == ''){        
        $datos = array(
            'nombre'=> $nombre,
            'apellido'=>$apellido,
            'dni'=> $dni,
            'calle'=>$calle,
            'nro'=> $nro,
            'depto'=> $depto,
            'barrio'=> $barrio,
            'ciudad'=>$ciudad,
            'provincia'=> $provincia,
            'postal'=> $postal,
            'email'=>$email,
            'tel'=>$tel
         );
         $_SESSION['datos']=$datos;
         header('Location: comprar.php');
    }
    else
    {
        $_SESSION['errores'] = $errores; 
    }    
}
include 'views/checkout-datos.view.php';
