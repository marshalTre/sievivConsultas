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
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="stylesheet" href="CSS/consultas.css">

    </head>

    <body>

        <nav>
            
            <ul>
                <h2 style="text-align: center; color: #848484;">Menú de Consultas</h2><br>
                <center>
                    <a href="usuarios-gen.php" target="der" class="btn">Generador</a><br><br><br>
                    <a href="usuarios-rec.php" target="der" class="btn">Receptor</a><br><br><br>
                    <a href="usuarios-per.php" target="der" class="btn">Personas</a><br><br><br>
                    <a href='Controler/cerrarsesion.php' class="btn2" target="_top" >Cerrar sesion</a>
                </center>
                
            </ul>
            
        </nav>




    </body>
</html>

