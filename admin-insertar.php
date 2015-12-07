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
                <h1 class="Encab">Insertar Usuari@</h1><br>
                <form  id="form" method="get" action="Controler/admin-control2.php">
                    <h3>Nombre de Usuario:</h3>
                    <input type="text" name="nomusu" placeholder="Usuario" maxlength="8" onChange="conMayusculas(this)" required>
                    <h3>Contraseña:</h3>
                    <input type="text" name="contra" placeholder="Clave" maxlength="8" onChange="conMayusculas(this)" required>
                    <h3>Creador de usuari@:</h3>
                    <input type="text" name="crea" placeholder="Creador" maxlength="8" onChange="conMayusculas(this)" required>
                    <h3>Delegación de Procedencia:</h3>
                    <select name="del" id="select" required>
                        <option value=""></option>
                        <option value="ALVARO OBREGON">ALVARO OBREGON</option>
                        <option value="AZCAPOTZALCO">AZCAPOTZALCO</option>
                        <option value="BENITO JUAREZ">BENITO JUAREZ</option>
                        <option value="COYOACAN">COYOACAN</option>
                        <option value="CUAJIMALPA">CUAJIMALPA</option>
                        <option value="CUAUHTEMOC">CUAUHTEMOC</option>
                        <option value="GUSTAVO A MADERO">GUSTAVO A MADERO</option>
                        <option value="IZTACALCO">IZTACALCO</option>
                        <option value="IZTAPALAPA">IZTAPALAPA</option>
                        <option value="MAGDALENA CONTRERAS">MAGDALENA CONTRERAS</option>
                        <option value="MIGUEL HIDALGO">MIGUEL HIDALGO</option>
                        <option value="MILPA ALTA">MILPA ALTA</option>
                        <option value="TLAHUAC">TLAHUAC</option>
                        <option value="TLALPAN">TLALPAN</option>
                        <option value="VENUSTIANO CARRANZA">VENUSTIANO CARRANZA</option>
                        <option value="XOCHIMILCO">XOCHIMILCO</option>
			<option value="DGIDS">DGIDS</option>
                    </select>
                    <h3>Nombre Completo de Usuari@:</h3>
                    <input type="text" name="usuario" placeholder="Nombre Completo" maxlength="100" onChange="conMayusculas(this)" required>
                    <h3>UAPVIF de Procedencia:</h3>
                    <select name="UAPVIF" id="select" required>
                        <option value=""></option>
                        <option value="01">ALVARO OBREGON</option>
                        <option value="02">AZCAPOTZALCO</option>
                        <option value="03">BENITO JUAREZ</option>
                        <option value="04">COYOACAN</option>
                        <option value="05">CUAJIMALPA</option>
                        <option value="06">CUAUHTEMOC</option>
                        <option value="07">GUSTAVO A MADERO</option>
                        <option value="08">IZTACALCO</option>
                        <option value="09">IZTAPALAPA</option>
                        <option value="10">MAGDALENA CONTRERAS</option>
                        <option value="11">MIGUEL HIDALGO</option>
                        <option value="12">MILPA ALTA</option>
                        <option value="13">TLAHUAC</option>
                        <option value="14">TLALPAN</option>
                        <option value="15">VENUSTIANO CARRANZA</option>
                        <option value="16">XOCHIMILCO</option>
			<option value="33">DGIDS</option>
                    </select>
                    <h3>ROL:</h3>
                    <select name="rol" id="select" required>
                        <option value=""></option>
                        <option value="1">INFORMATICA</option>
                        <option value="2">LOCATEL</option>
                        <option value="3">RED</option>
                        <option value="4">DAPVIF</option>
                        <option value="5">UAPVIF</option>
                        <option value="6">CONSULTA</option>
                        </select><br><br>
                    <input type="submit" name="login" class="login login-submit" value="INSERTAR" required="">
                </form>
            </div>

        </section>












    </body>
</html>
