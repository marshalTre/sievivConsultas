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
        <script language="JavaScript">
            function conMayusculas(field) {
                field.value = field.value.toUpperCase()
            }
        </script>


    </head>

    <body>




        <section>
            
            <div class="login-card">
                <h1 class="Encab">Consulta<br>de<br>Personas</h1><br>
                
                <form id="form" method="get" action="Controler/Consulta-control3.php">
                    
                    <input type="text" name="apat" placeholder="Apellido Paterno" onChange="conMayusculas(this)">
                    <input type="text" name="amat" placeholder="Apellido Materno" onChange="conMayusculas(this)">
                    <input type="submit" name="login" class="login login-submit" value="Buscar">
                    
                </form>
            </div>

        </section>










    </body>
</html>
