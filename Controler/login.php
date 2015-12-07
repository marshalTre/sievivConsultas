<?php
if(!isset($_SESSION)) { session_start(); }//session.cookie_lifetime tiene que estar en 0 en el php.ini para que se destruya
error_reporting(0);                       //la sesion al cerrar el navegador.
require_once './conector.php';

class login {

    public function logueo() {

        $usuario = filter_input(INPUT_POST, 'user');
        $password = filter_input(INPUT_POST, 'pass');
//        $admin = "select * from usuarios where uapvif='33'";


        $sql = "select * from usuarios where usuario='" . $usuario . "' and clave='" . $password . "' and uapvif='33' and rol ='1'";
        $row = pg_query(conector::conex(), $sql);

        $sql2 = "select * from usuarios where usuario='" . $usuario . "' and clave='" . $password . "' and uapvif <= '16' and rol ='6'";
        $row2 = pg_query(conector::conex(), $sql2);


        if (pg_fetch_array($row) > 0) {
            $_SESSION["session_user"] = $usuario;
            header("Location: ../administradores.php");
        } elseif (pg_fetch_array($row2) > 0) {
            $_SESSION["session_user"] = $usuario;
            header("Location: ../usuarios.php");
            
        } else {

            echo '<script language="javascript">alert("Datos Incorrectos");
                  window.location.href="../index.php";
                  </script>';
        }
    }

}
