<?php include 'header.php'?>
<div class="contenedor">
    <h1>TUS COMPRAS</h1>

    <?php if(isset($_SESSION['carrito'])):?>
        <div class="prod">
        <?php foreach($resultado as $prod):?>
            <div class="item">
         <h1><?php echo $prod['nombre']  ?></h1>
         
            <h3>$<?php echo $prod['precio']  ?> c/u - Cantidad: <?php echo $prod['cantidad']  ?></h3>
            <div class="elimEdit">
            <a href="eliminarChar.php?id=<?php echo htmlspecialchars($prod['id'])?> " style="color:red;">eliminar</a>
            <a href="producto.php?id=<?php echo htmlspecialchars($prod['id'])?> " >Editar</a>
            </div>

         </div>
            
            <?php $totalCarrito += $prod['precio'] *$prod['cantidad'];?>
            
        <?php endforeach; ?>
        <h2>Total: $<?php echo $totalCarrito ?></h2>
        <a href="eliminarChar.php?id=vaciar" style="font-weight: bold;color: red;">Vaciar carrito</a>
        </div>

        <a href="checkout-datos.php" class="btn-finalizar">Finalizar compra</a>
    <?php else: ?>
        <h1><?php echo 'Carrito vacio'?></h1>
    <?php endif; ?>
</div>

    

<?php include 'footer.php'?>
