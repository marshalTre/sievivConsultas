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
    </head>
    <body>
    <header id="header">
            <h3 style="float: right; color: white; margin-right: 2%;">Consultas</h3>
            <h1 style="float: right;">SIEVIF</h1>

            <table cellpadding="5">
                <tr>
                    <td id="celda"><image id="image" src="images/sedeso.png"/></td>
                    <td id="celda"><image id="image" src="images/DGIDS.png"/></td>
                    <td id="celda"><script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
document.write('<div class="fecha">' +diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()+ '</div>');
</script>  </td>
                    
                </tr>
            </table>
            <div id="div1">Dirección General de Igualdad y Diversidad Social</div>
        </header>
   


    </body>
</html>