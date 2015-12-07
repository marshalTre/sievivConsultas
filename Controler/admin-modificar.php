<?php

if (!isset($_SESSION)) {
    session_start();
}

error_reporting(0);
require_once './conector.php';

class modificar {

    public function modif() {

        $numunic = filter_input(INPUT_GET, 'unico');

        $conPer = "SELECT per_nombre, per_apepat, per_apemat, per_sexo, per_fecha_nac, per_estado_civil, per_lugar_nac, per_sabe_leer, per_grado_estudios, per_ocupacion, per_discapacidad, per_procedencia FROM persona WHERE per_id = '" . $numunic . "'";
        $consultaPer = pg_query(conector::conex(), $conPer);

        if ($reg = pg_fetch_array($consultaPer)) {
            include '../admin-FormInsertar.php';
        } else {
            echo '<CENTER><h2>No se encontro el ID en la Base de Datos</h2></CENTER>';
        }
        return $numunic;
    }

    public function insertarPer() {

        $idUnico = filter_input(INPUT_GET, 'idUnico');
        $nombrePer = filter_input(INPUT_GET, 'nombreP');
        $apePat = filter_input(INPUT_GET, 'apePatPer');
        $apeMat = filter_input(INPUT_GET, 'apeMatPer');
        $genero = filter_input(INPUT_GET, 'genero');
        $fechaNacim = filter_input(INPUT_GET, 'fechaNac');
        $edoCivil = filter_input(INPUT_GET, 'edoCiv');
        $lugarNacim = filter_input(INPUT_GET, 'lugNac');
        $leerBien = filter_input(INPUT_GET, 'leer');
        $gradoEst = filter_input(INPUT_GET, 'gradEst');
        $ocupacion = filter_input(INPUT_GET, 'ocupa');
        $discapacidad = filter_input(INPUT_GET, 'disca');
        $procedencia = filter_input(INPUT_GET, 'proce');


        $insertarPersonas = "UPDATE persona set per_nombre='" . $nombrePer . "', per_apepat='" . $apePat . "',"
                . "per_apemat='" . $apeMat . "', per_sexo='" . $genero . "', per_fecha_nac='" . $fechaNacim . "', "
                . "per_estado_civil='" . $edoCivil . "', per_lugar_nac='" . $lugarNacim . "', per_sabe_leer='" . $leerBien . "',"
                . "per_grado_estudios='" . $gradoEst . "', per_ocupacion='" . $ocupacion . "', per_discapacidad='" . $discapacidad . "', "
                . "per_procedencia='" . $procedencia . "' WHERE per_id = '" . $idUnico . "'";

        $insertarPerN = pg_query(conector::conex(), $insertarPersonas);
        if (pg_fetch_all($insertarPerN > 0)) {
            echo '<center><h1>Los campos han sido modificados exitosamente</h1></center>';
        } else {
            echo '<center><h1>Los campos no han sido modificados</h1></center>';
        }
    }

    public function buscarFormato() {

        $numunic2 = filter_input(INPUT_GET, 'idUnico2');//idUnico2 es numero que viene de captura de admin-pant.php
                                                        //que es el numero de persona en la BD

        $conPerFor = "SELECT form_per_id, form_id, form_tipo_formato FROM formato WHERE form_per_id = '" . $numunic2 . "'";
        $consultaPer2 = pg_query(conector::conex(), $conPerFor); //aqui compara que el idUnico2 de persona sea igual al de formato 
                                                                 //para encontrar en nuevo numero creado para saber que ficha es


        if (pg_fetch_all($consultaPer2) > 0) {
            echo '<link href="../CSS/consultas.css" rel="stylesheet" type="text/css">';
            echo '<center>';
            echo "<table border = '1' id='tabla'>";
            echo '<tr class="titulos"><td>ID</td><td>Tipo Ficha</td></tr>';
            while ($reg = pg_fetch_array($consultaPer2)) {
                echo "<tr class='titulos2'><td>" . $reg[form_per_id] . "</td>";
                switch ($reg['form_tipo_formato']) {
                    case r:
                        echo '<td><a href="../admin-FormRep.php?numero=' . $reg[form_id] . '&& numero2=' . $reg[form_per_id] . '">RECEPTOR</a></td>';
                        break;
                    case g:
                        echo '<td> <a href="../admin-FormGen.php?numero=' . $reg[form_id] . '&& numero2=' . $reg[form_per_id] . '">GENERADOR</a></td>';
                        break;
                    case i:

                        echo '<td><a href="../admin-FormIO.php?numero=' . $reg[form_id] . '&& numero2=' . $reg[form_per_id] . '">IO</a></td>';
                        break;
                }
                echo '</tr>';
            }

            echo '</table>';
            echo '</center>';
            pg_free_result($reg);
        } else {

            echo '<center><h1>No se encuentra el ID</h1></center>';
        }
    }

    public function modificarIO() {
        $idUnico = filter_input(INPUT_POST, 'idUnico2');
        $creIJDG = filter_input(INPUT_POST, 'ijdf');
        $edad = filter_input(INPUT_POST, 'edad');
        $motiv = filter_input(INPUT_POST, 'motivos');
        $inst = filter_input(INPUT_POST, 'inst');
//        $atendio = filter_input(INPUT_POST, 'atendio');
        $obser = filter_input(INPUT_POST, 'obser');
//        $service = filter_input(INPUT_POST, 'servicio');

        foreach ($_POST["atendio"] as $value) {
            $pri.=$value;
        }

        foreach ($_POST["servicio"] as $value2) {
            $pri2.=$value2;
        }

        $insertarIO = "UPDATE ficha_io set io_credencial_ijdf='" . $creIJDG . "', io_edad='" . $edad . "', "
                . "io_motivos='" . $motiv . "', io_institucion='" . $inst . "',io_atendio='" . $pri . "', "
                . "io_observaciones='" . $obser . "',io_servicios_prop='" . $pri2 . "'  WHERE io_form_id = '" . $idUnico . "'";





        $insertarIOB = pg_query(conector::conex(), $insertarIO);


        if ($insertarIOB) {

            echo '<center><h1>Los campos han sido modificados exitosamente</h1></center>';
        } else {
            echo '<center><h1>Los campos no han sido modificados</h1></center>';
        }
    }

    public function modificarGen() {

        $idFormato = filter_input(INPUT_GET, 'numFor');
        $fecha = filter_input(INPUT_POST, 'fecha');
        $ijdf = filter_input(INPUT_POST, 'ijdf');
        $expediente = filter_input(INPUT_POST, 'expediente');
        $relacion = filter_input(INPUT_POST, 'relhe');
        $parentesco = filter_input(INPUT_POST, 'parentesco');
        $nomRec = filter_input(INPUT_POST, 'nomRec');
        $apaRec = filter_input(INPUT_POST, 'apatRec');
        $amaRec = filter_input(INPUT_POST, 'amatRec');
        $regimen = filter_input(INPUT_POST, 'regimen');
        $perAdic = filter_input(INPUT_POST, 'perAdic');
        $frenaAg = filter_input(INPUT_POST, 'frena');
        $violFam = filter_input(INPUT_POST, 'violFam');
        $confLab = filter_input(INPUT_POST, 'confLab');
        $ameArm = filter_input(INPUT_POST, 'ameArm');
        $portArm = filter_input(INPUT_POST, 'portArm');
        $presDen = filter_input(INPUT_POST, 'presDen');
        $antPsi = filter_input(INPUT_POST, 'antPsi');
        $tratamiento = filter_input(INPUT_POST, 'tratamiento');
        $medicamentos = filter_input(INPUT_POST, 'medicamentos');
        $tiemRes = filter_input(INPUT_POST, 'tiemRes');
        $isntCan = filter_input(INPUT_POST, 'isntCan');
        $obser = filter_input(INPUT_POST, 'obser');

        $insertarGEN = "UPDATE ficha_generador set gen_fec_ingreso='" . $fecha . "', gen_credencial_ijdf='" . $ijdf . "', "
                . "gen_expediente='" . $expediente . "', gen_relacion_hecho='" . $relacion . "', gen_parentesco_recep='" . $parentesco . "', "
                . "gen_nombre_rec='" . $nomRec . "', gen_apat_rec='" . $apaRec . "', gen_amat_rec='" . $amaRec . "', "
                . "gen_regimen='" . $regimen . "', gen_perfil_adiccion='" . $perAdic . "', gen_frena_agresion='" . $frenaAg . "', "
                . "gen_violencia_familiares='" . $violFam . "', gen_conflictos_laborales='" . $confLab . "', "
                . "gen_amenaza_arma='" . $ameArm . "', gen_porta_arma='" . $portArm . "', gen_presento_denuncia='" . $presDen . "', "
                . "gen_antec_psiq='" . $antPsi . "', gen_tratamiento='" . $tratamiento . "', gen_medicamentos='" . $medicamentos . "', "
                . "gen_tiempo_residencia='" . $tiemRes . "', gen_canalizado='" . $isntCan . "', gen_observaciones='" . $obser . "' WHERE gen_form_id = '" . $idFormato . "'";

        $insertGEN = pg_query(conector::conex(), $insertarGEN);


        if ($insertGEN) {

            echo '<center><h1>Los campos han sido modificados exitosamente</h1></center>';
        } else {
            echo '<center><h1>Los campos no han sido modificados</h1></center>';
        }
    }

}
