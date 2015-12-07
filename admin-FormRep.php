<?php
//
session_start();
require_once './Controler/conector.php';
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.php");
    exit();
}
$numRec = filter_input(INPUT_GET, 'numero'); //este es el numero de formato
$numPer = filter_input(INPUT_GET, 'numero2'); // este es el numero de persona

$nombres = " SELECT per_nombre, per_apepat, per_apemat FROM persona WHERE per_id='" . $numPer . "'"; //Busco nombre en Persona para imprimirlo
$conNombre = pg_query(conector::conex(), $nombres);

$conPerRec = "SELECT rec_form_id, rec_credencial_ijdf, rec_edad, rec_expediente, rec_relacion_hecho, rec_parentesco_gen"
        . ",rec_regimen, rec_separado, rec_tiempo_separado, rec_tiempo_union, rec_tiempo_residencia, rec_num_personas, rec_tipo_familia,"
        . "rec_ciclo_vtal, rec_jerarquias, rec_roles, rec_limites, rec_comunicacion, rec_maltrato_psico, rec_otro_psico, rec_periodicidad_psico,"
        . "rec_maltrato_fisico, rec_otro_fisico, rec_periodicidad_fisico, rec_maltrato_sexual, rec_otro_sexual ,rec_periodicidad_sexual, "
        . "rec_inicio_problematica, rec_lugar_maltrato, rec_dia_ult_evento_vf, rec_ingreso_mensual, rec_porcent_ingr_recept,"
        . "rec_porcent_ingr_gen, rec_porcent_ingr_otro, rec_tipo_vivienda, rec_total_cuartos, rec_situacion_vivienda, rec_servicios_vivienda,"
        . "rec_tipo_muros, rec_tipo_techo, rec_tipo_piso, rec_nombre_gen, rec_apat_gen, rec_amat_gen, rec_domicilio_gen, rec_lugar_trabajo_gen, "
        . "rec_ocupacion_gen, rec_edad_gen, rec_sexo_gen, rec_actividades_preferenciales, rec_adicciones, rec_perfil_adiccion, rec_frena_agresion,"
        . "rec_violencia_familiares, rec_conflictos_laborales, rec_que_situac_violenta, rec_activ_delictivas,rec_amenaza_arma, rec_armas_casa,"
        . "rec_porta_arma, rec_antecedentes_penales, rec_cometio_delitos, rec_presento_denuncia, rec_antec_psiq, rec_tratamiento, rec_medicamentos,"
        . "rec_tiempo_t, rec_canalizado, rec_atendio, rec_servicios_prop, rec_observaciones, rec_fec_ingreso FROM ficha_receptor WHERE rec_form_id = '" . $numRec . "'";


$consultaREC = pg_query(conector::conex(), $conPerRec);

if ($reg1 = pg_fetch_array($consultaREC)) {
    ?>

    <!DOCTYPE html>
    <html lang="es">
        <head>
            <title>Usuario</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="CSS/InsertarForm.css" type="text/css" media="all">
            <script language="JavaScript">
                function conMayusculas(field) {
                    field.value = field.value.toUpperCase()
                }
            </script>
            <script type="text/javascript"
            src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".flip").click(function () {
                        $(".panel").slideToggle("slow");
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".flip2").click(function () {
                        $(".panel2").slideToggle("slow");
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".flip3").click(function () {
                        $(".panel3").slideToggle("slow");
                    });
                });
            </script>


        </head>
        <body>
            <section>

                <form id="form" method="post" action="Controler/admin-control29.php?numFor=<?php echo $numRec; ?>">
                    <center>

                        <center><h3 id="tuid"><?php
                                if ($reg2 = pg_fetch_array($conNombre)) {
                                    echo $reg2['per_nombre'];
                                    echo $reg2['per_apepat'];
                                    echo $reg2['per_apemat'] . "<br>";
                                    echo 'Edad:' . $reg1['rec_edad'];
                                }
                                ?><br><br>
                                Modifique solo los campos a corregir de la Ficha Receptor <input id="input01" type="text" name="idUnico2" value="<?php echo $numPer; ?>"><br>
                            </h3></center>


                        <p class="flip">Perfil del Receptor</p>
                        <div class="panel">

                            <h3 id="titulosInput">Fecha de Ingreso:</h3>
                            <input id="input01" type="date" name="fecha" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_fec_ingreso'] ?>"><br>
                            <h3 id="titulosInput">Credencial IJDF:</h3>
                            <input id="input01" type="text" name="ijdf" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_credencial_ijdf'] ?>"><br>
                            <h3 id="titulosInput">Expediente:</h3>
                            <input id="input01" type="text" name="expediente" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_expediente'] ?>"><br>
                            <h3 id="titulosInput">Relacion de hecho:<?php echo $reg1['rec_relacion_hecho'] ?></h3>
                            <select name="relhe" id="select">
                                <option value="<?php echo $reg1['rec_relacion_hecho'] ?>"></option>
                                <option value="E">E-NINGUNA</option>
                                <option value="A">B-CONCUBINATO</option>
                                <option value="B">C-AMASIATO</option>
                                <option value="C">D-NOVIAZGO</option>
                                <option value="D">E-DIVERSA</option>
                                <option value="F">F-OTRO</option>
                            </select>
                            <h3 id="titulosInput">Parentesco con el Generador:<?php echo $reg1['rec_parentesco_gen'] ?></h3>
                            <select name="parentesco" id="select">
                                <option value="<?php echo $reg1['rec_parentesco_gen'] ?>"></option>
                                <option value="B">B-CÓNYUGE</option> 
                                <option value="C">C-CONCUBINO/A</option>
                                <option value="D">D-AMASIO/A</option>
                                <option value="E">E-NOVIO/A</option>
                                <option value="F">F-EX CÓNYUGE</option>
                                <option value="G">G-EX CONCUBINO/A</option>
                                <option value="H">H-EX NOVIO/A</option>
                                <option value="I">I-HIJO/A</option>
                                <option value="J">J-PADRE</option>
                                <option value="K">K-MADRE</option>
                                <option value="L">L-HERMANO/A</option>
                                <option value="M">M-CUÑADO/A</option>
                                <option value="N">N-SUEGRO/A</option>
                                <option value="O">O-PAREJA DIVERSA</option>
                                <option value="R">R-MADRASTRA</option>
                                <option value="Q">Q-PADRASTRO</option>
                                <option value="P">P-OTRO</option>
                                <option value="A">A-NINGUNO</option>
                            </select>
                            <h3 id="titulosInput">Régimen en que se encuentra casad@:<?php echo $reg1['rec_regimen'] ?></h3>
                            <select name="regimen" id="select">
                                <option value="<?php echo $reg1['rec_regimen'] ?>"></option>
                                <option value="C">C-SOCIEDAD CON YUGAL</option>
                                <option value="B">B-SEPARACION DE BIENES</option>
                            </select>
                            <h3 id="titulosInput">Se encuentra con su pareja:<?php echo $reg1['rec_separado'] ?></h3>
                            <select name="separado" id="select">
                                <option value="<?php echo $reg1['rec_separado'] ?>"></option>
                                <option value="S">S-SEPARADOS</option>
                                <option value="U">U-UNIDOS</option>
                            </select>
                            <h3 id="titulosInput">Tiempo de Separación:<?php echo $reg1['rec_tiempo_separado'] ?></h3>
                            <select name="tiempoSep" id="select">
                                <option value="<?php echo $reg1['rec_tiempo_separado'] ?>"></option>
                                <option value="A">A-1 DÍA A 1 SEMANA</option>
                                <option value="B">B-1 SEMANA A 1 MES</option>
                                <option value="C">C-1 MES A 6 MESES</option>
                                <option value="D">D-6 MESES A 1 AÑO</option>
                                <option value="E">E-1 AÑO A 5 AÑOS</option>
                                <option value="F">F-5 AÑOS a 10 AÑOS</option>
                                <option value="G">G-MÁS DE 10 AÑOS</option>
                            </select>
                            <h3 id="titulosInput">Tiempo en Unión:<?php echo $reg1['rec_tiempo_union'] ?></h3>
                            <select name="tiempoUni" id="select">
                                <option value="<?php echo $reg1['rec_tiempo_union'] ?>"></option>
                                <option value="A">A-1 DÍA A 1 SEMANA</option>
                                <option value="B">B-1 SEMANA A 1 MES</option>
                                <option value="C">C-1 MES A 6 MESES</option>
                                <option value="D">D-6 MESES A 1 AÑO</option>
                                <option value="E">E-1 AÑO A 5 AÑOS</option>
                                <option value="F">F-5 AÑOS a 10 AÑOS</option>
                                <option value="G">G-MÁS DE 10 AÑOS</option>
                            </select>
                            <h3 id="titulosInput">Tiempo de residencia en el DF:<?php echo $reg1['rec_tiempo_residencia'] ?></h3>
                            <select name="tiempoRes" id="select">
                                <option value="<?php echo $reg1['rec_tiempo_residencia'] ?>"></option>
                                <option value="A">A-1 DÍA A 1 SEMANA</option>
                                <option value="B">B-1 SEMANA A 1 MES</option>
                                <option value="C">C-1 MES A 6 MESES</option>
                                <option value="D">D-6 MESES A 1 AÑO</option>
                                <option value="E">E-1 AÑO A 5 AÑOS</option>
                                <option value="F">F-5 AÑOS a 10 AÑOS</option>
                                <option value="G">G-MÁS DE 10 AÑOS</option>
                            </select>
                            <h3 id="titulosInput">Cuantas personas viven en el domicilio:</h3>
                            <input id="input01" type="text" name="cuantasPer" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_num_personas'] ?>"><br>
                            <h3 id="titulosInput">Tipo de familia:<?php echo $reg1['rec_tipo_familia'] ?></h3>
                            <select name="tipoFam" id="select">
                                <option value="<?php echo $reg1['rec_tipo_familia'] ?>"></option>
                                <option value="A">A-Extensa</option>
                                <option value="B">B-Nuclear</option>
                                <option value="C">C-Reconstruida</option>
                                <option value="D">D-Uniparental</option>
                                <option value="E">E-Monoparental</option>
                                <option value="F">F-OTRA</option>
                            </select>
                            <h3 id="titulosInput">Nombre Generador:</h3>
                            <input id="input01" type="text" name="nomRec" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_nombre_gen'] ?>"><br>
                            <h3 id="titulosInput">Apellido Paterno Generador:</h3>
                            <input id="input01" type="text" name="apatRec" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_apat_gen'] ?>"><br>
                            <h3 id="titulosInput">Apellido Materno Generador:</h3>
                            <input id="input01" type="text" name="amatRec" onChange="conMayusculas(this)" value="<?php echo $reg1['rec_amat_gen'] ?>"><br>


                        </div>


                        <p class="flip2">Adicciones y Viloencia</p>
                        <div class="panel2">

                            <h3 id="titulosInput">Perfil de Adicción<?php echo $reg['gen_perfil_adiccion'] ?></h3>
                            <select name="perAdic" id="select">
                                <option value="<?php echo $reg['gen_perfil_adiccion'] ?>"></option>
                                <option value="A">A-NINGUNO</option>
                                <option value="B">B-FUNCIONAL</option>
                                <option value="C">C-INACTIVO/EX-ADICTO</option>
                                <option value="D">D-DISFUNCIONAL</option>
                            </select>
                            <h3 id="titulosInput">Frena Agresión<?php echo $reg['gen_frena_agresion'] ?></h3>
                            <select name="frena" id="select">
                                <option value="<?php echo $reg['gen_frena_agresion'] ?>"></option>
                                <option value="A">A-SI</option>
                                <option value="B">B-NO</option>   
                            </select>
                            <h3 id="titulosInput">Violencia con Familiares<?php echo $reg['gen_violencia_familiares'] ?></h3>
                            <select name="violFam" id="select">
                                <option value="<?php echo $reg['gen_violencia_familiares'] ?>"></option>
                                <option value="A">A-SI</option>
                                <option value="B">B-NO</option>   
                            </select>
                            <h3 id="titulosInput">Conflictos laborales<?php echo $reg['gen_conflictos_laborales'] ?></h3>
                            <select name="confLab" id="select">
                                <option value="<?php echo $reg['gen_conflictos_laborales'] ?>"></option>
                                <option value="A">A-SI</option>
                                <option value="B">B-NO</option>   
                            </select>

                            <h3 id="titulosInput">Amenaza con Arma:<?php echo $reg['gen_amenaza_arma'] ?></h3>
                            <select name="ameArm" id="select">
                                <option value="<?php echo $reg['gen_amenaza_arma'] ?>"></option>
                                <option value="D">D-NINGUNA</option>
                                <option value="A">A-ARMA PUNZOCORTANTE</option>
                                <option value="B">B-ARMA DE FUEGO</option>
                                <option value="C">C-ARMA PUNZOCORTANTE/FUEGO</option>
                                <option value="E">E-OTRA</option>
                            </select>
                            <h3 id="titulosInput">Porta Arma:<?php echo $reg['gen_porta_arma'] ?></h3>
                            <select name="portArm" id="select">
                                <option value="<?php echo $reg['gen_porta_arma'] ?>"></option>
                                <option value="D">D-NINGUNA</option>
                                <option value="A">A-ARMA PUNZOCORTANTE</option>
                                <option value="B">B-ARMA DE FUEGO</option>
                                <option value="C">C-ARMA PUNZOCORTANTE/FUEGO</option>
                                <option value="E">E-OTRA</option>
                            </select>
                            <h3 id="titulosInput">Armas en Casa:<?php echo $reg['gen_armas_casa'] ?></h3>
                            <select name="armCasa" id="select">
                                <option value="<?php echo $reg['gen_armas_casa'] ?>"></option>
                                <option value="D">D-NINGUNA</option>
                                <option value="A">A-ARMA PUNZOCORTANTE</option>
                                <option value="B">B-ARMA DE FUEGO</option>
                                <option value="C">C-ARMA PUNZOCORTANTE/FUEGO</option>
                                <option value="E">E-OTRA</option>
                            </select>
                            <h3 id="titulosInput">Se presento denuncia: <?php echo $reg['gen_presento_denuncia'] ?></h3>
                            <select name="presDen" id="select">
                                <option value="<?php echo $reg['gen_presento_denuncia'] ?>"></option>
                                <option value="A">A-SI</option>
                                <option value="B">B-NO</option>   
                            </select>
                        </div>

                        <p class="flip3">Antecedentes Psiquatricos</p>
                        <div class="panel3">

                            <h3 id="titulosInput">Antecedentes Psiquiatricos<?php echo $reg['gen_antec_psiq'] ?></h3>
                            <select name="antPsi" id="select">
                                <option value="<?php echo $reg['gen_antec_psiq'] ?>"></option>
                                <option value="A">A-SI</option>
                                <option value="B">B-NO</option>   
                                <option value="B">B-NO SABE</option>   
                            </select>
                            <h3 id="titulosInput">Tipo de Tratamiento:</h3>
                            <input id="input01" type="text" name="tratamiento" onChange="conMayusculas(this)" value="<?php echo $reg['gen_tratamiento'] ?>"><br>
                            <h3 id="titulosInput">Medicamentos:</h3>
                            <input id="input01" type="text" name="medicamentos" onChange="conMayusculas(this)" value="<?php echo $reg['gen_medicamentos'] ?>"><br>
                            <h3 id="titulosInput">Tiempo de tratamiento:<?php echo $reg['gen_tiempo_t'] ?></h3>
                            <select name="tiemTra" id="select">
                                <option value="<?php echo $reg['gen_tiempo_t'] ?>"></option>
                                <option value="A">A-1 semana a 1 mes</option>
                                <option value="B">B-1 mes a 3 meses</option>   
                                <option value="C">C-3 meses a 6 meses</option>   
                                <option value="D">D-6 meses a 1 año</option>   
                                <option value="E">E-mas de 1 año</option>   
                                <option value="F">F-No se conoce</option>   
                            </select>
                            <h3 id="titulosInput">Tiempo de residencia en el DF:<?php echo $reg['gen_tiempo_residencia'] ?></h3>
                            <select name="tiemRes" id="select">
                                <option value="<?php echo $reg['gen_tiempo_residencia'] ?>"></option>
                                <option value="A">A-1 DÍA A 1 SEMANA</option>
                                <option value="B">B-1SEMANA A 1 MES</option>   
                                <option value="C">C-1 MES A 6 MESES</option>   
                                <option value="D">D-6 MESES A 1 AÑO</option>   
                                <option value="E">E-1 AÑO A 5 AÑOS</option>   
                                <option value="F">F-5 AÑOS A 10 AÑOS</option>
                                <option value="G">G-MÁS DE 10 AÑOS</option>
                            </select>
                            <h3 id="titulosInput">Institución a donde se canaliza al Receptor:<?php echo $reg['gen_canalizado'] ?></h3>
                            <select name="isntCan" id="select">
                                <option value="<?php echo $reg['gen_canalizado'] ?>"></option>
                                <option value="A">A-UAPVIF</option>
                                <option value="B">B-ALBERGUE</option>   
                                <option value="C">C-INMUJERES</option>   
                                <option value="D">D-DIF DF</option>   
                                <option value="E">E-M.P.</option>   
                                <option value="F">F-FISCALÍA PARA MENORES</option>
                                <option value="G">G-FISCALÍA DE DELITOS SEXUALES</option>
                                <option value="H">H-FISCALÍA DE LO FAMILIAR</option>
                                <option value="I">I-TSJ DF</option>
                                <option value="J">J-JUEZ CIVICO</option>
                                <option value="K">K-DEFENSORÍA DE OFICIO</option>
                                <option value="L">L-BUFETE JURÍDICO</option>
                                <option value="M">M-UAVD</option>
                                <option value="O">O-HOSPITALES PSIQUIATRICOS</option>
                                <option value="P">P-ONG´S</option>
                                <option value="Q">Q-GRUPOS ALTERNATIVOS</option>
                                <option value="R">R-NINGUNO</option>
                                <option value="S">S-OTROS</option>
                            </select>
                            <h3 id="titulosInput">Observaciones:</h3>
                            <textarea name="obser"><?php echo $reg['gen_observaciones'] ?></textarea>
                        </div>
                        <center>
                            <!--<h4 id="tuid">Para cualquier cambio que hagas, elegir tambien los espacios en blanco de las secciones multiples</h4>-->
                            <input type="submit"  name="login" class="button" value="Modificar" required=""></center>



                    </center>
                </form>

            </section>
        </body>
    </html>

    <?php
} else {
    echo '<CENTER><h2>No se encontro el ID del Receptor en la Base de Datos</h2></CENTER>';
}
?>