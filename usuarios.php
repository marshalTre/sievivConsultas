<?php
session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Usuario</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css"

    </head>
    
     <frameset rows="25%,*" frameborder="no" marginwidth="10%" marginheight="10%" scrolling="no">
        <frame src="encabezado.php" name="enc"></frame>
            <frameset cols="20%,*" frameborder="no" marginwidth="10%" marginheight="30%" scrolling="no">
                <frame src="usuarios-nav.php" name="izq"></frame>
                <frame src="usuarios-gen.php" name="der"></frame>
            </frameset>

    </frameset>
    
</html>