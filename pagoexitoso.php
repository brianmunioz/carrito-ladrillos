
<?php session_start();
if(!isset($_SESSION['carrito']) && !isset($_SESSION['datos'])){
    header('Location: index.php');};
$carrito=$_SESSION['carrito'];
include 'config.php';
include 'functions.php';
$nombre = limpiarDatos($_SESSION['datos']['nombre']);
$apellido = limpiarDatos($_SESSION['datos']['apellido']);
$dni = limpiarDatos($_SESSION['datos']['dni']);
$calle = limpiarDatos($_SESSION['datos']['calle']);
$nro = limpiarDatos($_SESSION['datos']['nro']);
$depto = limpiarDatos($_SESSION['datos']['depto']);
$barrio = limpiarDatos($_SESSION['datos']['barrio']);
$ciudad = limpiarDatos($_SESSION['datos']['ciudad']);
$postal = limpiarDatos($_SESSION['datos']['postal']);
$provincia = limpiarDatos($_SESSION['datos']['provincia']);
$tel = limpiarDatos($_SESSION['datos']['tel']);
$email = limpiarDatos($_SESSION['datos']['email']);
$tipoPago = limpiarDatos($_GET['payment_type']);
$estadoPago = limpiarDatos($_GET['status']);
$idPago = limpiarDatos($_GET['payment_id']);
$conn = conexion($bd);
$statement = $conn->prepare('INSERT INTO ventas (id_compra,nombre,apellido,dni,calle,nro,depto,barrio,ciudad,postal,provincia,telefono,email,tipo_pago,id_pago, estado) 
VALUES (null,:nombre,:apellido,:dni,:calle,:nro,:depto,:barrio,:ciudad,:postal,:provincia,:telefono,:email,:tipo_pago,:id_pago,:estado) ');
$statement->execute(array(
    ':nombre'=>$nombre,
    ':apellido'=>$apellido,
    ':dni'=>$dni,
    ':calle'=>$calle,
    ':nro'=>$nro,
    ':depto'=>$depto,
    ':barrio'=>$barrio,
    ':ciudad'=>$ciudad,
    ':postal'=>$postal,
    ':provincia'=>$provincia,
    ':telefono'=>$tel,
    ':email'=>$email,
    ':tipo_pago'=>$tipoPago,
    ':id_pago'=>$idPago,
    ':estado'=>$estadoPago
));
$statement = $conn->prepare('SELECT * FROM productos');
$statement->execute();
$resultado = $statement->fetchAll();

for($i = 0; $i < sizeof($resultado);$i++){
    for($x = 0; $x < sizeof($carrito);$x++){
    if($resultado[$i]['id'] == $carrito[$x]['id']){
        $statement = $conn->prepare('INSERT INTO prod_vendidos ( id, id_pago, id_prod, nombre, cantidad, precio)VALUES
        (null,:idpago,:idprod,:nombre,:cantidad,:precio)');
        $statement->execute(array(
            ':idpago'=>$idPago,
            'idprod'=>$carrito[$x]['id'],
            'nombre'=>$carrito[$x]['nombre'],
            'cantidad'=>$carrito[$x]['cantidad'],
            'precio'=>$resultado[$i]['precio']
        ));
        $statement = $conn->prepare(' UPDATE productos SET cantidad =:cantidad WHERE id = :id');
        $statement->execute(array(
            ':cantidad' => $resultado[$i]['cantidad'] - $carrito[$x]['cantidad'],
            ':id'=>$resultado[$i]['id']
        ));
       


    }
    }
}
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
include 'views/pagoexitoso.view.php';