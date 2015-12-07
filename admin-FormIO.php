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

$conPerIO = "SELECT io_form_id, io_credencial_ijdf, io_edad, io_motivos, io_institucion, io_atendio, io_observaciones, io_servicios_prop FROM ficha_io WHERE io_form_id = '" . $numIO . "'";
$consultaIO = pg_query(conector::conex(), $conPerIO);

if ($reg = pg_fetch_array($consultaIO)) { ?>
    
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


    </head>
    <body>
        <section>

            <form id="form" method="post" action="Controler/admin-control8.php">
                <center><table cellpadding="5" border="0" id="tablaInsertar">
                        <tr>
                            <td colspan="2" id="campo"><center><h3 id="tuid">Modifique solo los campos a corregir de la Ficha IO <input id="input01" type="text" name="idUnico2" value="<?php echo $numPer; ?>"></h3></center></td>
                        </tr>

                        <tr>      
                            <td>


                                <h3 id="titulosInput">Credencial IJDF:</h3>
                                <input id="input01" type="text" name="ijdf" onChange="conMayusculas(this)" value="<?php echo $reg['io_credencial_ijdf'] ?>"><br>
                                <h3 id="titulosInput">Edad:</h3>
                                <input id="input01" type="text" name="edad" onChange="conMayusculas(this)" value="<?php echo $reg['io_edad'] ?>"><br>
                                <h3 id="titulosInput">Motivos:<?php echo $reg['io_motivos'] ?></h3>
                                <select name="motivos" id="select">
                                    <option value="<?php echo $reg['io_motivos'] ?>"></option>
                                    <option value="A">A-Violencia Familiar</option>
                                    <option value="B">B-Servicios de la Unidad</option>
                                    <option value="C">C-Pensión Alimenticia</option>
                                    <option value="D">D-Divorcio</option>
                                    <option value="E">E-Guarda y Custodía</option>
                                    <option value="F">F-Apoyo Psicológico</option>
                                    <option value="G">G-Información Gral</option>
                                    <option value="H">H-Adicciones</option>
                                    <option value="I">I-Investigaciones</option>
                                    <option value="K">K-Inform. de asuntos Civiles/Familiares</option>
                                    <option value="J">J-Otro--</option>
                                </select>
                                <h3 id="titulosInput">Institución:<?php echo $reg['io_institucion'] ?></h3>
                                <select name="inst" id="select">
                                    <option value="<?php echo $reg['io_institucion'] ?>"></option>
                                    <option value="A">A-UAPVIF</option>
                                    <option value="B">B-Albergue</option>
                                    <option value="C">C-INMUJRES</option>
                                    <option value="D">D-DIF DF</option>
                                    <option value="E">E-MP</option>
                                    <option value="F">F-Fiscalía para menores</option>
                                    <option value="G">G-Fiscalía de delitos sexuales</option>
                                    <option value="H">H-Fiscalía de lo familiar</option>
                                    <option value="I">I-TSJ DF</option>
                                    <option value="J">J-Juez Civico</option>
                                    <option value="K">K-Defensoría de Oficio</option>
                                    <option value="L">L-Bufete Jurídico</option>
                                    <option value="M">M-UAVD</option>
                                    <option value="O">O-Hospitales Psiquiatricos</option>
                                    <option value="P">P-ONG´S</option>
                                    <option value="Q">Q-Grupos Alternativos</option>
                                    <option value="R">R-Ningunos</option>
                                    <option value="S">S-Otros</option>
                                </select>
                            </td>                                
                            <td id="campos">
                                <h3 id="titulosInput">Atendio:<?php echo $reg['io_atendio'] ?></h3>
                                <select name="atendio[]" id="select" multiple>
                                    <option value="<?php echo $reg['io_atendio']?>"></option>
                                    <option value="A">A.-Trabajador/A Social</option>
                                    <option value="B">B.-Psicologo/A</option>
                                    <option value="C">C.-Conciliador/A</option>
                                    <option value="D">D.-Amigable Componedor/A</option>
                                    <option value="E">E.-Subcoordinador/A Psicosocial</option>
                                    <option value="F">F.Subcoordinador/A Juridico/A</option>
                                    <option value="G">G.-Coordinador/A</option>
                                </select>
                                
                                <h3 id="titulosInput">Observaciones:</h3>
                                <textarea name="obser"><?php echo $reg['io_observaciones'] ?></textarea>
                                
                                <h3 id="titulosInput">Servicios:<?php echo $reg['io_servicios_prop'] ?></h3>
                                <select name="servicio[]" id="select" multiple>
                                    <option value="<?php echo $reg['io_servicios_prop'] ?>"></option>
                                    <option value="T">T.-Trabajo Social</option>
                                    <option value="J">J.-Juridico</option>
                                    <option value="P">P.-Psicologico</option>
                                    <option value="G">G.-UGrupos Alternos</option>
                                </select>
                               
                            </td>
                           </tr> 
                        <tr><td colspan="3"><center>
                            Para cualquier cambio que hagas, elegir tambien los espacios en blanco de Atendio y Servicios
                            <input type="submit"  name="login" class="button" value="Modificar" required=""></center></td></tr>



                    </table></center>
            </form>

        </section>
    </body>
</html>

<?php    
} else {
    echo '<CENTER><h2>No se encontro el ID en la Base de Datos</h2></CENTER>';
}
?>
