<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Login</title>


        <script language="JavaScript">
            self.moveTo(screen.width / 2 - 400, screen.height / 2 - 300)
            self.resizeTo(Width = "800", Height = "600")
        </script>


        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css">
    </head>

    <body>

        <div id="wrapper">
        <header id="header">
            <h3 style="float: right; color: white; margin-right: 2%;">Consultas</h3>
            <h1 style="float: right;">SIEVIF</h1>

            <table cellpadding="5">
                <tr>
                    <td id="celda"><image id="image" src="images/sedeso.png"/></td>
                    <td id="celda"><image id="image" src="images/DGIDS.png"/></td>
                </tr>
            </table>
            <div id="div1">Dirección General de Igualdad y Diversidad Social </div>
            <div style="color: white; text-align: center; margin-top: 1%; margin-bottom: -1%;">Preferentemente abrir esta pagina con Mozzila Firefox</div>
        </header>

        <section>
            <div class="login-card">
                <h1>Bienvenid@</h1><br>
                <form id="form" method="post" action="Controler/logueo-control.php">
                    <input type="text" name="user" placeholder="Usuario" required>
                    <input type="password" name="pass" placeholder="Contraseña" required="">
                    <input type="submit" name="login" class="login login-submit" value="Entrar" required="">
                </form>
            </div>
        </section>
	
	 </div>
<!--	<footer id="footer">

        </footer>-->
    </body>
</html>
