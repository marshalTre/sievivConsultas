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
                <h1 class="Encab">Buscar ID</h1><br>
                <form id="form" method="get" action="Controler/admin-control3.php">
                    <h3>Ingresa el ID a buscar:</h3>
                    <input type="text" name="id" placeholder="Numero único" onChange="conMayusculas(this)" required>
                    <input type="submit" name="login" class="login login-submit" value="Buscar" required="">
                </form>
            </div>

        </section>
        
        





        




    </body>
</html>
