<?php
//
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
        <link rel="stylesheet" href="../CSS/InsertarForm.css" type="text/css" media="all">
        <script language="JavaScript">
            function conMayusculas(field) {
                field.value = field.value.toUpperCase()
            }
            
        </script>


    </head>
    <body>
        <section>

            <form id="form" method="get" action="admin-control6.php">
            <center><table cellpadding="5" border="0" id="tablaInsertar">
                    <tr>
                        <td colspan="3" id="campo"><center><h3 id="tuid">Modifique solo los campos a corregir del id <input id="input01" type="text" name="idUnico" value="<?php echo $numunic; ?>"</h3></center></td>
                    </tr>

                    <tr>      
                        <td>
                            
                                <h3 id="titulosInput">Nombre:</h3>
                                <input id="input01" type="text" name="nombreP" onChange="conMayusculas(this)" value="<?php echo $reg['per_nombre'] ?>"><br>
                                <h3 id="titulosInput">Ape.Paterno:</h3>
                                <input id="input01" type="text" name="apePatPer" onChange="conMayusculas(this)" value="<?php echo $reg['per_apepat'] ?>"><br>
                                <h3 id="titulosInput">Ape.Materno:</h3>
                                <input id="input01" type="text" name="apeMatPer" onChange="conMayusculas(this)" value="<?php echo $reg['per_apemat'] ?>"><br>
                                <h3 id="titulosInput">Género:<?php echo $reg['per_sexo'] ?></h3>
                                <select name="genero" id="select">
                                    <option value="<?php echo $reg['per_sexo'] ?>"></option>
                                    <option value="H">HOMBRE</option>
                                    <option value="M">MUJER</option>
                                </select>
                        </td>                                
                        <td id="campos">
                            <h3 id="titulosInput">Fecha de Nacimiento:</h3>
                            <input id="input01" type="date" name="fechaNac" value="<?php echo $reg['per_fecha_nac'] ?>"><br>
                            <h3 id="titulosInput">Estado Civil:<?php echo $reg['per_estado_civil'] ?></h3>
                            <select name="edoCiv" id="select">
                                <option value="<?php echo $reg['per_estado_civil'] ?>"></option>
                                <option value="D">D.-DIVORCIAD@</option>
                                <option value="C">C.-CASAD@</option>
                                <option value="S">S.-SOLTER@</option>
                                <option value="U">U.-UNION LIBRE</option>
                                <option value="V">V.-VIUD@</option>
                                <option value="A">A.-AMASIATO</option>
                                <option value="O">O.-RELACION DE HECHO</option>
                            </select>
                            <h3 id="titulosInput">Lugar de Nacimiento:<?php echo $reg['per_lugar_nac'] ?></h3>
                            <select name="lugNac" id="select">
                                <option value="<?php echo $reg['per_lugar_nac'] ?>"></option>
                                <option value="1">1.-AGUASCALIENTES</option>
                                <option value="2">2.-BAJA CALIFORNIA NORTE</option>
                                <option value="3">3.-BAJA CALIFORNIA SUR</option>
                                <option value="4">4.-CAMPECHE</option>
                                <option value="5">5.-COAHUILA</option>
                                <option value="6">6.-COLIMA</option>
                                <option value="7">7.-CHIAPAS</option>
                                <option value="8">8.-CHIHUAHUA</option>
                                <option value="9">9.-DISTRITO FEDERAL</option>
                                <option value="10">10.-DURANGO</option>
                                <option value="11">11.-GUANAJUATO</option>
                                <option value="12">12.-GUERRERO</option>
                                <option value="13">13.-HIDALGO</option>
                                <option value="14">14.-JALISCO</option>
                                <option value="15">15.-ESTADO DE MEXICO</option>
                                <option value="16">16.-MICHOACAN</option>
                                <option value="17">17.-MORELOS</option>
                                <option value="18">18.-NAYARIT</option>
                                <option value="19">19.-NUEVO LEON</option>
                                <option value="20">20.-OAXACA</option>
                                <option value="21">21.-PUEBLA</option>
                                <option value="22">22.-QUERETARO</option>
                                <option value="23">23.-QUINTANA ROO</option>
                                <option value="24">24.-SAN LUIS POTOSI</option>
                                <option value="25">25.-SINALOA</option>
                                <option value="26">26.-SONORA</option>
                                <option value="27">27.-TABASCO</option>
                                <option value="28">28.-TAMAULIPAS</option>
                                <option value="29">29.-TLAXCALA</option>
                                <option value="30">30.-VERACRUZ</option>
                                <option value="31">31.-YUCATAN</option>
                                <option value="32">32.-ZACATECAS</option>
                                <option value="33">33.-OTRO PAIS</option>
                                <option value="34">34.-ESTADOS UNIDOS</option>
                                <option value="35">35.-NO SE CONOCE</option>
                            </select>

                            <h3 id="titulosInput">Sabe Leer:<?php echo $reg['per_sabe_leer'] ?></h3>
                            <select name="leer" id="select">
                                <option value="<?php echo $reg['per_sabe_leer'] ?>"></option>
                                <option value="N">N.-Ninguno</option>
                                <option value="L">L.- Leer</option>
                                <option value="E">E.-Leer y escribir</option>
                            </select>
                        </td>
                        <td id="campos2">
                            <h3 id="titulosInput">Grado de estudios:<?php echo $reg['per_grado_estudios'] ?></h3>
                            <select name="gradEst" id="select">
                                <option value="<?php echo $reg['per_grado_estudios'] ?>"></option>
                                <option value="1">1.-PRIMARIA INCOMPLETA</option>
                                <option value="2">2.-PRIMARIA COMPLETA</option>
                                <option value="3">3.-SECUNDARIA INCOMPLETA</option>
                                <option value="4">4.-SECUNDARIA COMPLETA</option>
                                <option value="5">5.-TECNICA INCOMPLETA</option>
                                <option value="6">6.-TECNICA COMPLETA</option>
                                <option value="7">7.-CARRERA COMERCIAL</option>
                                <option value="8">8.-MEDIA SUPERIOR INCOMPLETA</option>
                                <option value="9">9.-MEDIA SUPERIOR COMPLETA</option>
                                <option value="10">10.-SUPERIOR INCOMPLETA</option>
                                <option value="11">11.-SUPERIOR COMPLETA</option>
                                <option value="12">12.-POSTGRADO</option>
                                <option value="13">13.-ANALFABETA</option>
                                <option value="14">14.-ALFABETA</option>
                            </select>
                            <h3 id="titulosInput">Ocupacion:<?php echo $reg['per_ocupacion'] ?></h3>
                            <select name="ocupa" id="select">
                                <option value="<?php echo $reg['per_ocupacion'] ?>"></option>
                                <option value="1">1.-DESEMPLEADO</option>
                                <option value="2">2.-ESTUDIANTE</option>
                                <option value="3">3.-HOGAR</option>
                                <option value="4">4.-JUBILADO/PENSIONADO</option>
                                <option value="5">5.-PROFESIONISTA</option>
                                <option value="6">6.-TECNICO</option>
                                <option value="7">7.-MAESTRO</option>
                                <option value="8">8.-SERVIDOR PUBLICO</option>
                                <option value="9">9.-COMERCIANTE ESTABLECIDO</option>
                                <option value="10">10.-COMERCIANTE NO ESTABLECIDO</option>
                                <option value="11">11.-TRABAJADOR DOMESTICO</option>
                                <option value="12">12.-CHOFER</option>
                                <option value="13">13.-POLICIA</option>
                                <option value="14">14.-MILITAR</option>
                                <option value="15">15.-SECRETARIA</option>
                                <option value="16">16.-OBRERO</option>
                                <option value="17">17.-COSTURERA</option>
                                <option value="18">18.-OFICIOS</option>
                                <option value="19">19.-HOGAR Y EMPLEADO</option>
                                <option value="20">20.-OTRO</option>
                                <option value="21">21.-TRABAJADOR ASALARIADO</option>
                                <option value="22">22.-SUBEMPLEADO</option>
                                <option value="23">23.-AGRICULTOR</option>
                                <option value="24">24.-TRABAJADORA SEXUAL</option>
                                <option value="25">25.-DEPENDIENTE ECONOMICO</option>
                            </select>
                            <h3 id="titulosInput">Discapacidad:<?php echo $reg['per_discapacidad'] ?></h3>
                            <select name="disca" id="select">
                                <option value="<?php echo $reg['per_discapacidad'] ?>"></option>
                                <option value="1">1.-AUDITIVA</option>
                                <option value="2">2.-VISUAL</option>
                                <option value="3">3.-MOTRIZ</option>
                                <option value="4">4.-MENTAL</option>
                                <option value="5">5.-NINGUNA</option>
                            </select>
                            <h3 id="titulosInput">Procedencia:<?php echo $reg['per_lugar_nac'] ?></h3>
                            <select name="proce" id="select">
                                <option value="<?php echo $reg['per_lugar_nac'] ?>"></option>
                                <option value="1">1.-ALBERGUE</option>
                                <option value="2">2.-UAPVIF</option>
                                <option value="3">3.-LOCATEL</option>
                                <option value="4">4.-INICIATIVA PROPIA</option>
                                <option value="5">5.-CARTEL</option>
                                <option value="6">6.-FOLLETO</option>
                                <option value="7">7.-PERIODICO MURAL</option>
                                <option value="8">8.-EVENTO</option>
                                <option value="9">9.-RADIO</option>
                                <option value="10">10.-TELEVISION</option>
                                <option value="11">11.-FAMILIAR</option>
                                <option value="12">12.-AMISTAD</option>
                                <option value="13">13.-DELEGACION</option>
                                <option value="14">14.-INMUJERES</option>
                                <option value="15">15.-DIF DF</option>
                                <option value="16">16.-INSTITUCION EDUCATIVA</option>
                                <option value="17">17.-SECRETARIA DE SALUD</option>
                                <option value="18">18.-MINISTERIO PUBLICO</option>
                                <option value="19">19.-FISCALIA PARA MENORES</option>
                                <option value="20">20.-FISCALIA PARA DELITOS SEXUALES</option>
                                <option value="21">21.-FISCALIA DE LO FAMILIAR</option>
                                <option value="22">22.-TSJ DF</option>
                                <option value="23">23.-UAVD</option>
                                <option value="24">24.-AMPEVIS</option>
                                <option value="25">25.-ONG'S</option>
                                <option value="26">26.-PJSR</option>
                                <option value="27">27.-PDVA</option>
                                <option value="28">28.-DEFENSORIA DE OFICIO</option>
                                <option value="29">29.-INSTITUTO DE LA JUVENTUD</option>
                                <option value="30">30.-OTRO</option>
                            </select><br><br>
                        </td></tr> 
                    <tr><td colspan="3"><center><input type="submit"  name="login" class="button" value="Modificar" required=""></center></td></tr>
                    
                   

                </table></center>
</form>

        </section>
    </body>
</html>
