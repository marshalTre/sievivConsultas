<?php
//
session_start();
require_once './Controler/conector.php';
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.php");
    exit();
}
$numIO = filter_input(INPUT_GET, 'numero');
$numPer = filter_input(INPUT_GET, 'numero2');

$nombres = " SELECT per_nombre, per_apepat, per_apemat FROM persona WHERE per_id='" . $numPer . "'";
$conNombre = pg_query(conector::conex(), $nombres);

$conPerIO = "SELECT gen_form_id, gen_credencial_ijdf, gen_edad, gen_expediente, gen_relacion_hecho, gen_parentesco_recep"
        . ",gen_actividades_preferenciales,gen_observaciones, gen_adicciones, gen_regimen, gen_perfil_adiccion, gen_nombre_rec"
        . ", gen_apat_rec, gen_amat_rec, gen_frena_agresion, gen_violencia_familiares, gen_conflictos_laborales, gen_que_situac_violenta, "
        . "gen_activ_delictivas, gen_amenaza_arma, gen_porta_arma, gen_armas_casa, gen_antecedentes_penales, "
        . "gen_cometio_delitos, gen_presento_denuncia, gen_antec_psiq, gen_tratamiento, gen_medicamentos, gen_tiempo_t, gen_tiempo_residencia,"
        . "gen_canalizado, gen_atendio,gen_servicios_prop, gen_fec_ingreso FROM ficha_generador WHERE gen_form_id = '" . $numIO . "'";


$consultaIO = pg_query(conector::conex(), $conPerIO);

if ($reg = pg_fetch_array($consultaIO)) {
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

                <form id="form" method="post" action="Controler/admin-control9.php?numFor=<?php echo $numIO; ?>">
                    <center>

                        <center><h3 id="tuid"><?php
                                if ($reg = pg_fetch_array($conNombre)) {
                                    echo $reg['per_nombre'];
                                    echo $reg['per_apepat'];
                                    echo $reg['per_apemat'];
                                }
                                ?><br><br>
                                Modifique solo los campos a corregir de la Ficha Generador <input id="input01" type="text" name="idUnico2" value="<?php echo $numPer; ?>"><br>
                            </h3></center>


                        <p class="flip">Perfil del Agresor</p>
                        <div class="panel">

                            <h3 id="titulosInput">Fecha de Ingreso:</h3>
                            <input id="input01" type="date" name="fecha" onChange="conMayusculas(this)" value="<?php echo $reg['gen_fec_ingreso'] ?>"><br>
                            <h3 id="titulosInput">Credencial IJDF:</h3>
                            <input id="input01" type="text" name="ijdf" onChange="conMayusculas(this)" value="<?php echo $reg['gen_credencial_ijdf'] ?>"><br>
                            <h3 id="titulosInput">Expediente:</h3>
                            <input id="input01" type="text" name="expediente" onChange="conMayusculas(this)" value="<?php echo $reg['gen_expediente'] ?>"><br>
                            <h3 id="titulosInput">Relacion de hecho:<?php echo $reg['gen_relacion_hecho'] ?></h3>
                            <select name="relhe" id="select">
                                <option value="<?php echo $reg['gen_relacion_hecho'] ?>"></option>
                                <option value="E">E-NINGUNA</option>
                                <option value="A">B-CONCUBINATO</option>
                                <option value="B">C-AMASIATO</option>
                                <option value="C">D-NOVIAZGO</option>
                                <option value="D">E-DIVERSA</option>
                                <option value="F">F-OTRO</option>
                            </select>
                            <h3 id="titulosInput">Parentesco con el Receptor:<?php echo $reg['gen_parentesco_recep'] ?></h3>
                            <select name="parentesco" id="select">
                                <option value="<?php echo $reg['gen_parentesco_recep'] ?>"></option>
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
                            <h3 id="titulosInput">Nombre Receptor:</h3>
                            <input id="input01" type="text" name="nomRec" onChange="conMayusculas(this)" value="<?php echo $reg['gen_nombre_rec'] ?>"><br>
                            <h3 id="titulosInput">Apellido Paterno Receptor:</h3>
                            <input id="input01" type="text" name="apatRec" onChange="conMayusculas(this)" value="<?php echo $reg['gen_apat_rec'] ?>"><br>
                            <h3 id="titulosInput">Apellido Materno Receptor:</h3>
                            <input id="input01" type="text" name="amatRec" onChange="conMayusculas(this)" value="<?php echo $reg['gen_amat_rec'] ?>"><br>
                            <h3 id="titulosInput">Régimen en que se encuentra casad@:<?php echo $reg['gen_regimen'] ?></h3>
                            <select name="regimen" id="select">
                                <option value="<?php echo $reg['gen_regimen'] ?>"></option>
                                <option value="C">C-SOCIEDAD CON YUGAL</option>
                                <option value="B">B-SEPARACION DE BIENES</option>
                                <option value="D">D-NINGUNO</option>
                            </select>
    <!--                            <h3 id="titulosInput">Actividades Preferenciales:<?php echo $reg['gen_actividades_preferenciales'] ?></h3>
                            <select name="actividades[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_actividades_preferenciales'] ?>"></option>
                                <option value="A">A-NINGUNA</option>
                                <option value="B">B-ESTAR EN LA CALLE</option>
                                <option value="C">C-ESTAR EN CASA ENCERRADO</option>
                                <option value="D">D-DORMIR</option>
                                <option value="E">E-VER TELEVISION</option>
                                <option value="F">F-JUGAR EN LA CALLE</option>
                                <option value="G">G-LEER</option>
                                <option value="H">H-PRACTICAR DEPORTE</option>
                                <option value="I">I-INGERIR BEBIDAS ALCOHOLICAS</option>
                                <option value="J">J-DROGARSE</option>
                                <option value="K">K-ROBAR</option>
                                <option value="L">L-PELEARSE</option>
                                <option value="M">M-ESTAR CON AMIGOS</option>
                                <option value="N">N-TRABAJAR</option>
                                <option value="O">O-ESTAR EN LA COMPUTADORA</option>
                                <option value="P">P-ESCUCHAR/TOCAR MUSICA</option>
                                <option value="Q">Q-OTRO</option>
                            </select>-->

                        </div>


                        <p class="flip2">Adicciones y Viloencia</p>
                        <div class="panel2">


        <!--                            <h3 id="titulosInput">Adicciones:<?php echo $reg['gen_adicciones'] ?></h3>
                                    <select name="adiccion[]" id="select" multiple>
                                        <option value="<?php echo $reg['gen_adicciones'] ?>"></option>
                                        <option value="A">A-NINGUNA</option>
                                        <option value="B">B-ALCOHOL</option>
                                        <option value="C">C-MARIHUANA</option>
                                        <option value="D">D-COCAÍNA</option>
                                        <option value="E">E-INHALANTES</option>
                                        <option value="F">F-PASTILLAS</option>
                                        <option value="G">G-TABACO</option>
                                        <option value="H">H-OTRAS</option>
                                    </select>-->
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
    <!--                            <h3 id="titulosInput">Que situaciones l@ violentan:<?php echo $reg['gen_que_situac_violenta'] ?></h3>
                            <select name="situaciones[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_que_situac_violenta'] ?>"></option>
                                <option value="A">A-PROBLEMAS ECONOMICOS</option>
                                <option value="B">B-CELOS</option>
                                <option value="C">C-DESOBEDIENCIA</option>
                                <option value="D">D-CONDUCTA DE LOS HIJOS</option>
                                <option value="E">E-ADICCION AL ALCOHOL</option>
                                <option value="F">F-ADICCION A LA DROGA</option>
                                <option value="G">G-CUESTIONAMIENTO DE INFIDELIDAD</option>
                                <option value="H">H-OTRO</option>
                            </select>-->

        <!--                            <h3 id="titulosInput">Realiza Actividades Delictivas:<?php echo $reg['gen_activ_delictivas'] ?></h3>
                                    <select name="actDel[]" id="select" multiple>
                                        <option value="<?php echo $reg['gen_activ_delictivas'] ?>"></option>
                                        <option value="J">J-NINGUNA</option>
                                        <option value="A">A-ROBO</option>
                                        <option value="B">B-ABUSO DE CONFIANZA</option>
                                        <option value="C">C-FRAUDE</option>
                                        <option value="D">D-VIOLACION</option>
                                        <option value="E">E-ABUSO SEXUAL</option>
                                        <option value="F">F-LESIONES</option>
                                        <option value="G">G-VIOLENCIA FAMILIAR</option>
                                        <option value="H">H-AMENAZAS</option>
                                        <option value="I">I-HOMICIDIO</option>
                                        <option value="K">K-OTROS</option>
                                    </select>-->
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
    <!--                            <h3 id="titulosInput">Antecedentes Penales:<?php echo $reg['gen_antecedentes_penales'] ?></h3>
                            <select name="antece[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_antecedentes_penales'] ?>"></option>
                                <option value="J">A-NINGUNO</option>
                                <option value="A">B-ROBO</option>
                                <option value="B">C-ABUSO DE CONFIANZA</option>
                                <option value="C">D-FRAUDE</option>
                                <option value="D">E-VIOLACION</option>
                                <option value="E">F-ABUSO SEXUAL</option>
                                <option value="F">G-LESIONES</option>
                                <option value="G">H-VIOLENCIA FAMILIAR</option>
                                <option value="H">H-AMENAZAS</option>
                                <option value="I">H-HOMICIDIO</option>
                                <option value="K">H-OTROS</option>
                            </select>-->
    <!--                            <h3 id="titulosInput">Ha cometido delitos:<?php echo $reg['gen_cometio_delitos'] ?></h3>
                            <select name="comeDel[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_cometio_delitos'] ?>"></option>
                                <option value="J">J-NINGUNO</option>
                                <option value="A">A-ROBO</option>
                                <option value="B">B-ABUSO DE CONFIANZA</option>
                                <option value="C">C-FRAUDE</option>
                                <option value="D">D-VIOLACION</option>
                                <option value="E">E-ABUSO SEXUAL</option>
                                <option value="F">F-LESIONES</option>
                                <option value="G">G-VIOLENCIA FAMILIAR</option>
                                <option value="H">H-AMENAZAS</option>
                                <option value="I">I-HOMICIDIO</option>
                                <option value="K">K-OTROS</option>
                            </select>   -->
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
    <!--                            <h3 id="titulosInput">Atendio:<?php echo $reg['gen_atendio'] ?></h3>
                            <select name="atendio[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_atendio'] ?>"></option>
                                <option value="A">A-TRABAJADOR/A SOCIAL</option>
                                <option value="B">B-PSICOLOGO/A</option>
                                <option value="C">C-CONCILIADOR/A</option>
                                <option value="D">D-AMIGABLE COMPONEDOR/A</option>
                                <option value="E">E-SUBCOORDINADOR/A PSICOSOCIAL</option>
                                <option value="F">F-SUBCOORDINADOR/A JURÍDICO/A</option>
                                <option value="G">G-COORDINADOR/A</option>
                            </select>-->
    <!--                            <h3 id="titulosInput">Servicios Proporcionados:<?php echo $reg['gen_servicios_prop'] ?></h3>
                            <select name="servPro[]" id="select" multiple>
                                <option value="<?php echo $reg['gen_servicios_prop'] ?>"></option>
                                <option value="T">T-TRABAJO SOCIAL</option>
                                <option value="J">J-TRABAJO SOCIAL</option>
                                <option value="P">P-PSICOLOGICO</option>
                                <option value="G">G-GRUPOS ALTERNOS</option>
                            </select>-->
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
    echo '<CENTER><h2>No se encontro el ID del Generador en la Base de Datos</h2></CENTER>';
}
?>