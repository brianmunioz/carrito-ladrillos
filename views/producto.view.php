<?php include 'header.php'?>

<h1>PRODUCTOS</h1>
<br><br>
<div class="prod">
    <img src="<?php echo 'img/'.$prod['img']?>" alt="">
    <h1><?php echo $prod['nombre']  ?></h1>
    <h3>$<?php echo $prod['precio']  ?></h3>
    <p><?php echo $prod['descripcion']  ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$id?>" method="POST">
    <div class="group-cantidad">
        <label for="cantidad"><h4>Cantidad: </h4> </label>
    <input type="number" class="cantidad" name="cantidad" max="<?php echo $prod['cantidad']?>" min="1"  value="1">

    </div>
    <input type="submit" value="agregar al carrito">
    </form>
</div>
    
<?php include 'footer.php'?>