<?php include 'header.php'?>

<h1>COMPLETAR DATOS</h1>
<div class="contenedor">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <input type="text" name="nombre" placeholder="Nombre"required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="number" name="dni" placeholder="DNI" required>
        <input type="text" name="calle" placeholder="Calle" required>
        <input type="number" name="nro" placeholder="nro"required>
        <input type="text" name="depto" placeholder="Depto">
        <input type="text" name="barrio" placeholder="Barrio" >
        <input type="text" name="ciudad" placeholder="Ciudad" required>
        <input type="text" name="provincia" placeholder="Provincia" required>
        <input type="text" name="postal" placeholder="Código postal" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="tel" placeholder="Teléfono" required>   
        <input type="submit" class="btn-coninuar" value="continuar">
    </form>
</div>
<?php include 'footer.php'?>