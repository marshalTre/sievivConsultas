<?php
session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" >
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link href="CSS/navegador.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <header>
            
        </header>
    <center>
    <ul id="nav">
            <li><a href="admin-pant1.php" target="Sub">1° Captura</a>
                
            </li>
            <li>
            </li>
            <li><a href="admin-pant2.php" target="Sub">Fichas</a>
                
            </li>
            
        </ul>
        <script src="js/script.js"></script>
    </center>
    <center><iframe src="#" name="Sub" id="recuadro"
      width="750" height="420" scrolling="auto" frameborder="0">
      
    </iframe></center>
    </body>
</html>