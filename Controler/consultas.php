<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(0);
require_once './conector.php';

class consulta {

    public function ConsultaGen() {
        $apellidoPat = filter_input(INPUT_GET, 'apat');
        $apellidoMat = filter_input(INPUT_GET, 'amat');

        $conGen = "select persona.per_nombre, persona.per_apepat, persona.per_apemat, persona.per_fecha_nac, ficha_receptor.rec_edad, ficha_receptor.rec_nombre_gen , ficha_receptor.rec_edad_gen,
                  ficha_receptor.rec_exp_ts, formato.form_tipo_formato, formato.form_uapvif, ficha_receptor.rec_expediente FROM persona INNER JOIN formato ON formato.form_per_id=persona.per_id INNER JOIN ficha_receptor ON
                  formato.form_id=ficha_receptor.rec_form_id AND ficha_receptor.rec_apat_gen='" . $apellidoPat . "' AND
                  ficha_receptor.rec_amat_gen='" . $apellidoMat . "' ORDER BY ficha_receptor.rec_nombre_gen";

        $consulta = pg_query(conector::conex(), $conGen);


        if (pg_fetch_all($consulta) > 0) {
            echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
            echo "<table border = '1'>";
            echo '<tr class="titulos"><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Fecha de Nacimiento</td><td>Edad</td><td>Nombre del Generador</td><td>Apellido Paterno Generador</td><td>Apellido Mataterno Generador</td><td>Edad del Generador</td><td>TS</td><td>Expediente</td><td>Tipo</td><td>UAPVIF</td></tr>';
            while ($reg = pg_fetch_array($consulta)) {
                echo "<tr class='titulos2'><td>" . $reg[per_nombre] . "</td><td>" . $reg[per_apepat] . "</td><td>" . $reg[per_apemat] . "</td><td>" . $reg[per_fecha_nac] . "</td><td>" . $reg[rec_edad] . "</td>"
                . "<td><b>" . $reg[rec_nombre_gen] . "</b></td><td><b>" . $apellidoPat . "</b></td><td><b>" . $apellidoMat . "</b></td><td>" . $reg[rec_edad_gen] . "</td><td>" . $reg[rec_exp_ts] . "</td>"
                . "<td>" . $reg[rec_expediente] . "</td>";
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
            pg_free_result($reg);
        } else {

            echo '<center><h1>LOS APELLIDOS QUE BUSCA NO SE ENCUENTRA EN LA BASE DE DATOS</h1></center>';
        }
    }

    public function ConsultaRec() {
        $apellidoPat = filter_input(INPUT_GET, 'apat');
        $apellidoMat = filter_input(INPUT_GET, 'amat');

        $conGen = "select per_nombre, per_fecha_nac, rec_edad, rec_nombre_gen, rec_apat_gen, rec_amat_gen,
                  rec_edad_gen, rec_exp_ts, form_tipo_formato, form_uapvif, rec_expediente
                  FROM persona INNER JOIN formato ON formato.form_per_id=persona.per_id
                  INNER JOIN ficha_receptor ON formato.form_id=ficha_receptor.rec_form_id AND persona.per_apepat='" . $apellidoPat . "' AND
                  persona.per_apemat='" . $apellidoMat . "' ORDER BY persona.per_nombre";

        $consulta = pg_query(conector::conex(), $conGen);

        if (pg_fetch_all($consulta) > 0) {
            echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
            echo "<table border = '1'>";
            echo '<tr class="titulos"><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Fecha de Nacimiento</td><td>Edad</td><td>Nombre del Generador</td><td>Apellido Paterno Generador</td><td>Apellido Mataterno Generador</td><td>Edad del Generador</td><td>TS</td><td>Expediente</td><td>Tipo</td><td>UAPVIF</td></tr>';
            while ($reg = pg_fetch_array($consulta)) {
                echo "<tr class='titulos2'><td><b>" . $reg['per_nombre'] . "</b></td><td><b>" . $apellidoPat . "</b></td><td><b>" . $apellidoMat . "</b></td><td>" . $reg[per_fecha_nac] . "</td><td>" . $reg[rec_edad] . "</td>"
                . "<td>" . $reg[rec_nombre_gen] . "</td><td>" . $reg[rec_apat_gen] . "</td><td>" . $reg[rec_amat_gen] . "</td><td>" . $reg[rec_edad_gen] . "</td><td>" . $reg[rec_exp_ts] . "</td>"
                . "<td>" . $reg[rec_expediente] . "</td>";

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
            pg_free_result($reg);
        } else {

            echo '<center><h1>LOS APELLIDOS QUE BUSCA NO SE ENCUENTRA EN LA BASE DE DATOS</h1></center>';
        }
    }

    public function ConsultaPer() {
        $apellidoPat = filter_input(INPUT_GET, 'apat');
        $apellidoMat = filter_input(INPUT_GET, 'amat');

        $conGen = "SELECT rec_nombre_gen, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM ficha_receptor INNER JOIN formato ON ficha_receptor.rec_form_id=formato.form_id AND rec_apat_gen='" . $apellidoPat . "' AND rec_amat_gen='" . $apellidoMat . "' 
                  UNION ALL SELECT per_nombre, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM persona INNER JOIN formato ON persona.per_id=formato.form_per_id AND per_apepat='" . $apellidoPat . "' AND per_apemat='" . $apellidoMat . "' 
                  UNION ALL SELECT gen_nombre_rec, form_tipo_formato, form_uapvif, form_fecha_registro, form_fecha_ult_modif 
                  FROM ficha_generador INNER JOIN formato ON ficha_generador.gen_form_id=formato.form_id AND gen_apat_rec='" . $apellidoPat . "' AND gen_amat_rec='" . $apellidoMat . "' ORDER BY rec_nombre_gen ";

        $consulta = pg_query(conector::conex(), $conGen);

        if (pg_fetch_all($consulta) > 0) {

            
                echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
                echo "<table border = '1'>";
                echo '<tr class="titulos"><td> Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td>'
                . '<td>Fecha de Registro</td><td>Fecha Ultima Modificación</td>'
                . '<td>Tipo</td><td>UAPVIF</td></tr>';
                while ($reg = pg_fetch_array($consulta)) {
                    echo "<tr class='titulos2'><td><b>" . $reg[rec_nombre_gen] . "</td><td><b>" . $apellidoPat . "</b></td>"
                    . "<td><b>" . $apellidoMat . "</b></td><td>" . $reg['form_fecha_registro'] . "</td>"
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
                echo '<center>Si encontro a la Persona que busca en esta tabla y no en las otras de Generador y Receptor, entonces es IO</center>';
                pg_free_result($reg);
            
        } else {

            echo '<center><h1>LOS APELLIDOS QUE BUSCA NO SE ENCUENTRA EN LA BASE DE DATOS</h1></center>';
        }
    }

}
