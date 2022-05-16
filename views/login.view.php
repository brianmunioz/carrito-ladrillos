<?php include 'header.php';?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <input type="text" name="user" placeholder="User">
    <input type="password" name="pass" placeholder="pass">
    <input type="submit" value="Login">
</form>
<?php if(!empty($errores)):?>
    <h1><?php echo $errores?></h1>
<?php endif?>
<?php include 'footer.php';?>