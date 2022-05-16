<?php include 'header.php'?>
<div class="contenedor">
    <h1 class="title">PRODUCTOS</h1>
    <div class="grid">
        <?php foreach($resultado as $prod):?>
            <div class="prod">                
                <img src="<?php echo 'img/'.$prod['img']?>" alt="">
                <h1><?php echo $prod['nombre']  ?></h1>
                <h3>$<?php echo $prod['precio']  ?></h3>
                <a href="producto.php?id=<?php echo $prod['id']  ?>"><img class="btn-mas"src="img/mas.png" alt=""></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
    <?php include 'footer.php'?>