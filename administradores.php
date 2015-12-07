<?php
        session_start();
        if(isset($_SESSION["session_user"])){
	}
	else{
		header("location:index.php");
		exit();
	
	}
        ?>
<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Administrador</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css"

    </head>
    
     <frameset rows="25%,*" frameborder="no" marginwidth="10%" marginheight="10%" scrolling="no">
        <frame src="encabezado.php" name="enc"></frame>
            <frameset cols="20%,*" frameborder="no" marginwidth="10%" marginheight="30%" scrolling="no">
                <frame src="admin-nav.php" name="izquierda"></frame>
                <frame src="admin-busqueda.php" name="derecha"></frame>
            </frameset>

    </frameset>
    
</html>






    
</html>