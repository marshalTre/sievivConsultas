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
        <title>Admin</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="stylesheet" href="CSS/consultas.css">

    </head>

    <body>

        <nav>
            
            <ul>
                <h2 style="text-align: center; color: #848484;">Menú</h2><br>
                <center>
                    <a href="admin-busqueda.php" target="derecha" class="btn">BúsquedaUs</a><br><br><br>
                    <a href="admin-insertar.php" target="derecha" class="btn">InsertarUs</a><br><br><br>
                    <a href="admin-eliminar.php" target="derecha" class="btn">EliminarId</a><br><br><br>
                    <a href="admin-modficar.php" target="derecha" class="btn">ModificarId</a><br><br><br>
                    
                    <a href='Controler/cerrarsesion.php' class="btn2" target="_top" >Cerrar sesión</a>
                </center>
                
            </ul>
            
        </nav>




    </body>
</html>
