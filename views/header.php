<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $ruta?>/css/style.css">
    <title>Eco Brick</title>
</head>
<body>
    <div class="contenedor">
        <div class="header">
            <div class="logo"><a href="index.php">Eco Brick</a> </div>
            
            <a href="carrito.php" class="carrito">
                <img src="<?php echo $ruta?>/img/carrito.png" alt="">
                <?php if(isset($_SESSION['carrito'])): ?>
                <span><?php echo sizeof($_SESSION['carrito'])?> </span>
                <?php endif ?>
                </a>
        </div>
    </div>
