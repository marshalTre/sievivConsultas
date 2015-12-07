<?php

if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);
require_once './conector.php';

class consultaAdmin {

    public function ver() {
        $nombre = filter_input(INPUT_GET, 'Nombre');
        $UAPVIF = filter_input(INPUT_GET, 'UAPVIF');
        $conGen = "SELECT usuario, clave, nombre_completo, uapvif FROM usuarios WHERE uapvif='" . $UAPVIF . "' OR nombre_completo LIKE'%" . $nombre . "%'";
        $consulta = pg_query(conector::conex(), $conGen);
        if (pg_fetch_all($consulta) > 0) {
            echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
            echo "<table border = '1'>";
            echo '<tr class="titulos"><td>Usuario</td><td>Contraseña</td><td>Nombre Completo</td><td>UAPVIF</td></tr>';

            while ($reg = pg_fetch_array($consulta)) {
                echo "<tr class='titulos2'><td>" . $reg['usuario'] . "</td><td>" . $reg['clave'] . "</td><td>" . $reg['nombre_completo'] . "</td>";
                switch ($reg['uapvif']) {
                    case 1 :
                        echo '<td>ALVARO OBREGON</td>';
                        break;
                    case 2 :
                        echo '<td>AZCAPOTZALCO</td>';
                        break;
                    case 3 :
                        echo '<td>BENITO JUAREZ</td>';
                        break;
                    case 4 :
                        echo '<td>COYOACAN</td>';
                        break;
                    case 5 :
                        echo '<td>CUAJIMALPA</td>';
                        break;
                    case 6 :
                        echo '<td>CUAUHTEMOC</td>';
                        break;
                    case 7 :
                        echo '<td>GUSTAVO A MADERO</td>';
                        break;
                    case 8 :
                        echo '<td>IZTACALCO</td>';
                        break;
                    case 9 :
                        echo '<td>IZTAPALAPA</td>';
                        break;
                    case 10 :
                        echo '<td>MAGDALENA CONTRERAS</td>';
                        break;
                    case 11 :
                        echo '<td>MIGUEL HIDALGO</td>';
                        break;
                    case 12 :
                        echo '<td>MILPA ALTA</td>';
                        break;
                    case 13 :
                        echo '<td>TLAHUAC</td>';
                        break;
                    case 14 :
                        echo '<td>TLALPAN</td>';
                        break;
                    case 15 :
                        echo '<td>VENUSTIANO CARRANZA</td>';
                        break;
                    case 16 :
                        echo '<td>XOCHIMILCO</td>';
                        break;
                    case 33 :
                        echo '<td>ADMINISTRADOR</td>';
                        break;
                }
                echo '</tr>';
            }
            echo '</table>';
            pg_free_result($reg);
        } else {
            echo '<center><h1>EL NOMBRE QUE BUSCA NO SE ENCUENTRA EN LA BASE DE DATOS</h1></center>';
        }
    }

    public function insertarUsuario() {
        $usuario = filter_input(INPUT_GET, 'nomusu');
        $contra = filter_input(INPUT_GET, 'contra');
        $creador = filter_input(INPUT_GET, 'crea');

        $del = filter_input(INPUT_GET, 'del');
        $nombreUs = filter_input(INPUT_GET, 'usuario');
        $uapvif = filter_input(INPUT_GET, 'UAPVIF');
        $rol = filter_input(INPUT_GET, 'rol');

        $conGen = "INSERT INTO usuarios(usuario, grupo, clave, creator, aplica, descrip, nombre_completo, uapvif, rol)"
                . "VALUES('" . $usuario . "', 'UAPVIF', '" . $contra . "', '" . $creador . "', 'SIEVIF', '" . $del . "', '" . $nombreUs . "', '" . $uapvif . "', '" . $rol . "')";

        $consulta = pg_query(conector::conex(), $conGen);

        if ($consulta) {
            echo '<center><h1>Ingresado Correctamente</h1></center>';
        } else {
            echo '<center><h1>No se pudo ingresar el usuario</h1></center>';
        }
    }

    public function eliminarUs() {

        $numeroid = filter_input(INPUT_GET, 'id');

        $conGen = "SELECT rec_nombre_gen, rec_apat_gen, rec_amat_gen, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM ficha_receptor INNER JOIN formato ON '" . $numeroid . "'=formato.form_id AND ficha_receptor.rec_form_id='" . $numeroid . "'
                  UNION ALL SELECT per_nombre, per_apepat, per_apemat, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM persona INNER JOIN formato ON '" . $numeroid . "'=formato.form_per_id AND persona.per_id='" . $numeroid . "'
                  UNION ALL SELECT gen_nombre_rec, gen_apat_rec, gen_amat_rec, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM ficha_generador INNER JOIN formato ON '" . $numeroid . "'=formato.form_id AND ficha_generador.gen_form_id='" . $numeroid . "' ORDER BY rec_nombre_gen";

//        $congenIO = "SELECT io_form_id FROM ficha_io where io_form_id = '".$numeroid."'";

        $consulta = pg_query(conector::conex(), $conGen);
//        $consultaIO = pg_query(conector::conex(), $congenIO);

        if (pg_fetch_all($consulta) > 0) {
            echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
            echo "<table border = '1'>";
            echo '<tr class="titulos"><td>ID</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td>'
            . '<td>Fecha de Registro</td><td>Fecha Ultima Modificación</td>'
            . '<td>Tipo</td><td>UAPVIF</td></tr>';
            while ($reg = pg_fetch_array($consulta)) {
                echo "<tr class='titulos2'><td>" . $numeroid . "</td><td>" . $reg[rec_nombre_gen] . "</td><td>" . $reg[rec_apat_gen] . "</td>"
                . "<td>" . $reg[rec_amat_gen] . "</td><td>" . $reg['form_fecha_registro'] . "</td>"
                . "<td>" . $reg['form_fecha_ult_modif'] . "</td>";

                switch ($reg['form_tipo_formato']) {
                    case r:
                        echo '<td>RECEPTOR</td>';
                        break;
                    case g:
                        echo '<td>GENERADOR</td>';
                        break;
                    case i:
                        echo '<td>IO</td>';
                        break;
                }

                switch ($reg['form_uapvif']) {
                    case 1 :
                        echo '<td>ALVARO OBREGON</td>';
                        break;
                    case 2 :
                        echo '<td>AZCAPOTZALCO</td>';
                        break;
                    case 3 :
                        echo '<td>BENITO JUAREZ</td>';
                        break;
                    case 4 :
                        echo '<td>COYOACAN</td>';
                        break;
                    case 5 :
                        echo '<td>CUAJIMALPA</td>';
                        break;
                    case 6 :
                        echo '<td>CUAUHTEMOC</td>';
                        break;
                    case 7 :
                        echo '<td>GUSTAVO A MADERO</td>';
                        break;
                    case 8 :
                        echo '<td>IZTACALCO</td>';
                        break;
                    case 9 :
                        echo '<td>IZTAPALAPA</td>';
                        break;
                    case 10 :
                        echo '<td>MAGDALENA CONTRERAS</td>';
                        break;
                    case 11 :
                        echo '<td>MIGUEL HIDALGO</td>';
                        break;
                    case 12 :
                        echo '<td>MILPA ALTA</td>';
                        break;
                    case 13 :
                        echo '<td>TLAHUAC</td>';
                        break;
                    case 14 :
                        echo '<td>TLALPAN</td>';
                        break;
                    case 15 :
                        echo '<td>VENUSTIANO CARRANZA</td>';
                        break;
                    case 16 :
                        echo '<td>XOCHIMILCO</td>';
                        break;
                }

                echo '</tr>';
            }
            echo '</table>';
            

            echo '<link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/login.css">
        <link rel="stylesheet" href="../CSS/consultas.css">';
            echo '<div class="login-card">
                  <form id="form"  method="get" action="./admin-control4.php">
                    <center><h3>Deseas Eliminar el ID de la base de datos</h3></center>
                    <input type="text" name="id" value="' . $numeroid . '" onChange="conMayusculas(this)" required>
                    <input type="submit" name="login" class="login login-submit" value="Eliminar" required="">
                </form>
                </div>';
            pg_free_result($reg);
        } else {
            echo '<center><h1>NO SE ENCUENTRA EL ID  QUE BUSCAS</h1></center>';
        }
       
    }
    
    public function eliminaFicha(){
        $numeroid = filter_input(INPUT_GET, 'id');   
    
        $conGen="SELECT form_id, form_tipo_formato FROM formato WHERE form_id = '" . $numeroid . "'";
        $borGen="delete from ficha_generador where gen_form_id = '" . $numeroid . "'";
        $borRes="delete from ficha_receptor where rec_form_id = '" . $numeroid . "'";
        $borIO="delete from ficha_io where io_form_id = '" . $numeroid . "'";
        $borDom="delete from domicilios where dom_per_id= '" . $numeroid . "'";
        $borFor="delete from formato where form_id='" . $numeroid . "'";
        $borPer="delete from persona where per_id='" . $numeroid . "'";
        
        $consulta = pg_query(conector::conex(), $conGen);
      
        
        if(pg_fetch_all($consulta) > 0){
            while ($reg = pg_fetch_array($consulta)) {
                switch ($reg['form_tipo_formato']) {
                    case 'r' :
                        $consulta1 = pg_query(conector::conex(), $borRes);
                        $consulta2 = pg_query(conector::conex(), $borDom);
                        $consulta3 = pg_query(conector::conex(), $borFor);
                        $consulta4 = pg_query(conector::conex(), $borPer);
                        break;
                    case 'g' :
                        $consulta5 = pg_query(conector::conex(), $borGen);
                        $consulta2 = pg_query(conector::conex(), $borDom);
                        $consulta3 = pg_query(conector::conex(), $borFor);
                        $consulta4 = pg_query(conector::conex(), $borPer);
                        break;
                    case 'i' :
                        $consulta6 = pg_query(conector::conex(), $borIO);
                        $consulta2 = pg_query(conector::conex(), $borDom);
                        $consulta3 = pg_query(conector::conex(), $borFor);
                        $consulta4 = pg_query(conector::conex(), $borPer);
                        break;
                }
            }
            
        }  else {
            echo '<center><h1>El usuario no se encuentra</h1></center>';
        }
        
        
        
        
        
    }

}
