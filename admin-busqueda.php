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
                <h1 class="Encab">Busqueda<br>de<br>Usuari@</h1><br>
                <form id="form" method="get" action="Controler/admin-control.php">
                    <input type="text" name="Nombre" placeholder="Nombre parcial o completo" onChange="conMayusculas(this)">
                    <select name="UAPVIF" id="select">
                        <option></option>
                        <option value="1">ALVARO OBREGON</option>
                        <option value="2">AZCAPOTZALCO</option>
                        <option value="3">BENITO JUAREZ</option>
                        <option value="4">COYOACAN</option>
                        <option value="5">CUAJIMALPA</option>
                        <option value="6">CUAUHTEMOC</option>
                        <option value="7">GUSTAVO A MADERO</option>
                        <option value="8">IZTACALCO</option>
                        <option value="9">IZTAPALAPA</option>
                        <option value="10">MAGDALENA CONTRERAS</option>
                        <option value="11">MIGUEL HIDALGO</option>
                        <option value="12">MILPA ALTA</option>
                        <option value="13">TLAHUAC</option>
                        <option value="14">TLALPAN</option>
                        <option value="15">VENUSTIANO CARRANZA</option>
                        <option value="16">XOCHIMILCO</option>
                    </select>
                    <input type="submit" name="login" class="login login-submit" value="Buscar" required="">
                </form>
            </div>

        </section>
        
        





        




    </body>
</html>