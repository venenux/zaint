<?php
session_start();
ob_start();
$termino = $_SESSION['termino'];
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<link rel="stylesheet" type="text/css" href="dialog_box.css" />

<?php
include ("../header.php");
include("../lib/common.php");
include("func_bd.php");

if ($_POST["procesar"]) {
    if ($_POST['txtFechaFin'] != "" && $_POST['txtFechaInicio'] != "") {
        define(DIAS_TRABAJADOS, 102);
        define(HORAS_EXTRAS_DIURNAS, 103);
        define(DIAS_FERIADOS_TRABAJADOS, 104);
        define(HORAS_EXTRAS_NOCTURNAS, 105);
        define(DIAS_NO_TRABAJADOS, 206);
        $conceptos = array(
            DIAS_TRABAJADOS,
            HORAS_EXTRAS_DIURNAS,
            DIAS_FERIADOS_TRABAJADOS,
            HORAS_EXTRAS_NOCTURNAS,
            DIAS_NO_TRABAJADOS);
        $fechaInicio = new DateTime($_POST['txtFechaInicio']);
#$fechaInicio = $fechaInicio->format('Y-m-d h:i:s');
        $fechaFin = new DateTime($_POST['txtFechaFin']);
#$fechaFin = $fechaFin->format('Y-m-d h:i:s');

        $connection = odbc_connect('MSAccessDriver4Biometric', '', '') or die(odbc_error_msg());

# Obtener los empleados que trabajaron en el intervalo de fechas proporcionado
        $sql = "SELECT DISTINCT USERID FROM CHECKINOUT";
        $result = odbc_exec($connection, $sql);

        $id_empleados_intervalo = array();
        while ($checkinout = odbc_fetch_object($result)) {
            $id_empleados_intervalo[] = $checkinout;
        }

        $sql = "SELECT * FROM CHECKINOUT WHERE CHECKTIME BETWEEN #{$fechaInicio->format('Y-m-d h:i:s')}# AND #{$fechaFin->format('Y-m-d h:i:s')}# AND (CHECKTYPE='I' OR CHECKTYPE='O') ORDER BY USERID, CHECKTIME";
        $result = odbc_exec($connection, $sql);
        $array_checkinout = array();
        while ($checkinout = odbc_fetch_object($result)) {
            #echo $checkinout->USERID, ' - ', $checkinout->CHECKTIME, ' - ', $checkinout->CHECKTYPE, '<br/>';
            $array_checkinout[] = $checkinout;
        }

        $insert = "INSERT INTO control_encabezado
          VALUES('', '" . date("Y-m-d") . "' ,'{$fechaInicio->format('Y-m-d')}', '{$fechaFin->format('Y-m-d')}')";
        $result = sql_ejecutar($insert);

        $select = "SELECT MAX(cod_enca) FROM control_encabezado";
        $result = sql_ejecutar($select);
        $row = mysql_fetch_row($result);

        ### Obtener los días feriados del calendario en el intervalo dado para el case DIAS_FERIADOS_TRABAJADOS
        $select = "SELECT fecha FROM nomcalendarios_tiposnomina WHERE dia_fiesta = 3 AND fecha BETWEEN '{$fechaInicio->format('Y-m-d')}' AND '{$fechaFin->format('Y-m-d')}' AND cod_empresa = {$_SESSION['cod_empresa']} AND cod_tiponomina = {$_SESSION['codigo_nomina']}";
        $result = sql_ejecutar($select);

        $array_feriados = array();
        while ($feriados = mysql_fetch_object($result)) {
            $array_feriados[] = $feriados;
            #echo $feriados->fecha,'<br>';
        }
        #echo $select, '<br>', mysql_num_rows($result), '<br>';

        foreach ($id_empleados_intervalo as $empleado) {
            $i = 0;
            foreach ($conceptos as $concepto) {
                $valor = 0;
                switch ($concepto) {
                    #echo $fechaux->format('Y-m-d h:i:s'),' | ', $fechaFin->format('Y-m-d h:i:s'),'<br>';
                    #echo $array_checkinout[$i]->USERID ,' - ', $id_empleado->USERID,'<br>';
                    ### Calcular los días trabajados
                    case DIAS_TRABAJADOS:
                        $fechaux = new DateTime($_POST['txtFechaInicio']);
                        do {
                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaux->format('m')}
                                AND Day(CHECKTIME) = {$fechaux->format('d')}
                                AND CHECKTYPE = 'I'";
                            $checkin = odbc_exec($connection, $sql);
                            $rcheckin = odbc_fetch_object($checkin);

                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaux->format('m')}
                                AND Day(CHECKTIME) = {$fechaux->format('d')}
                                AND CHECKTYPE = 'O'";
                            $checkout = odbc_exec($connection, $sql);
                            $rcheckout = odbc_fetch_object($checkout);

                            if (!empty($rcheckin) && !empty($rcheckout)) {
                                $valor++;
                            }
                            unset($rcheckin, $rcheckout);
                            $fechaux->add(new DateInterval('P1D'));
                            #echo $fechaux->format('Y-m-d h:i:s'),' | ', $fechaFin->format('Y-m-d h:i:s'), '<br>';
                        } while ($fechaux->format('Y-m-d h:i:s') != $fechaFin->format('Y-m-d h:i:s'));
                        break;
                    case HORAS_EXTRAS_DIURNAS:
                        break;

                    case DIAS_FERIADOS_TRABAJADOS:

                        #while ($checkin = odbc_fetch_object($result_checkin)) {
                        #$checkout = odbc_fetch_object($result_checkout);
                        foreach ($array_feriados as $feriado) {

                            $fecha = new DateTime($feriado->fecha);
                            #echo $fecha->format('Y-m-d'),'<br>';
                            #$fecha_checkout = new DateTime($checkout->CHECKTIME);
                            $sql = "SELECT CHECKTYPE, CHECKTIME
                                    FROM CHECKINOUT
                                    WHERE USERID = {$empleado->USERID}
                                    AND Year(CHECKTIME) = {$fecha->format('Y')}
                                    AND Month(CHECKTIME) = {$fecha->format('m')}
                                    AND Day(CHECKTIME) = {$fecha->format('d')}
                                    AND CHECKTYPE = 'I' ORDER BY CHECKTIME";
                            $result_checkin = odbc_exec($connection, $sql);
                            $checkin = odbc_fetch_object($result_checkin);

                            $sql = "SELECT CHECKTYPE, CHECKTIME
                                    FROM CHECKINOUT
                                    WHERE USERID = {$empleado->USERID}
                                    AND Year(CHECKTIME) = {$fecha->format('Y')}
                                    AND Month(CHECKTIME) = {$fecha->format('m')}
                                    AND Day(CHECKTIME) = {$fecha->format('d')}
                                    AND CHECKTYPE = 'O' ORDER BY CHECKTIME";
                            $result_checkout = odbc_exec($connection, $sql);
                            $checkout = odbc_fetch_object($result_checkout);

                            /*  $fecha_feriado = new DateTime($feriado->fecha); */

                            #echo $fecha_checkin->format('Y-m-d'), '----', $fecha_checkout->format('Y-m-d'), '----', $fecha_feriado->format('Y-m-d'), '<br>';
                            #if ($fecha_checkout->format('Y-m-d') == $fecha_feriado->format('Y-m-d') && $fecha_checkin->format('Y-m-d') == $fecha_feriado->format('Y-m-d')) {
                            if ($checkin->CHECKTYPE == 'I' && $checkout->CHECKTYPE == 'O') {
                                $valor++;
                            }
                        }
                        #}
                        break;

                    case HORAS_EXTRAS_NOCTURNAS:
                        break;

                    case DIAS_NO_TRABAJADOS:
                        $trabajados = 0;
                        $fechaux = new DateTime($_POST['txtFechaInicio']);
                        do {
                            /* $sql = "SELECT CHECKTYPE, CHECKTIME FROM CHECKINOUT
                              WHERE USERID = {$empleado->USERID}
                              AND Year(CHECKTIME) = {$fechaux->format('Y')}
                              AND Month(CHECKTIME) = {$fechaux->format('m')}
                              AND Day(CHECKTIME) = {$fechaux->format('d')}
                              AND CHECKTYPE = 'I'";
                              $checkin = odbc_exec($connection, $sql);
                              $rcheckin = odbc_fetch_object($checkin);

                              $sql = "SELECT CHECKTYPE, CHECKTIME FROM CHECKINOUT
                              WHERE USERID = {$empleado->USERID}
                              AND Year(CHECKTIME) = {$fechaux->format('Y')}
                              AND Month(CHECKTIME) = {$fechaux->format('m')}
                              AND Day(CHECKTIME) = {$fechaux->format('d')}
                              AND CHECKTYPE = 'O'";
                              $checkout = odbc_exec($connection, $sql);
                              $rcheckout = odbc_fetch_object($checkout);
                              echo "USERID: $empleado->USERID \$rcheckin->CHECKTYPE: $rcheckin->CHECKTYPE \$rcheckout->CHECKTYPE: $rcheckout->CHECKTYPE<br>";

                              if ($rcheckin->CHECKTYPE != 'I' && $rcheckout->CHECKTYPE != 'O') {
                              $valor++;
                              } */
                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaux->format('m')}
                                AND Day(CHECKTIME) = {$fechaux->format('d')}
                                AND CHECKTYPE = 'I'";
                            $checkin = odbc_exec($connection, $sql);
                            $rcheckin = odbc_fetch_object($checkin);

                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaux->format('m')}
                                AND Day(CHECKTIME) = {$fechaux->format('d')}
                                AND CHECKTYPE = 'O'";
                            $checkout = odbc_exec($connection, $sql);
                            $rcheckout = odbc_fetch_object($checkout);

                            if (!empty($rcheckin) && !empty($rcheckout)) {
                                $trabajados++;
                            }
                            $fechaux->add(new DateInterval('P1D'));
                            unset($rcheckin, $rcheckout);
                        } while ($fechaux->format('Y-m-d h:i:s') != $fechaFin->format('Y-m-d h:i:s'));
                        $intervalo = $fechaInicio->diff($fechaFin);
                        $valor = $intervalo->format('%d') + 1 - $trabajados;
                        break;
                }
# $_SESSION['codigo_nomina'] viene de paginas/seleccionar_nomina.php
# $_SESSION['cod_empresa'] viene de seleccionar_empresa.php
                $insert_ind = "INSERT INTO control_acceso
                  VALUES('{$_SESSION['cod_empresa']}', '{$_SESSION['codigo_nomina']}', '{$empleado->USERID}', '','{$concepto}', '{$valor}', '{$row[0]}','')";
                $result = sql_ejecutar($insert_ind);
            }
        }
        unset($id_empleados_intervalo, $empleado);

#echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo</div>";
    } else {
        ?>
        <script type="text/javascript">
            alert("ALERTA:\nDebe introducir todos los datos.");
        </script>
        <?php
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="frmAgregar" id="frmAgregar" enctype="multipart/form-data">
    <?php
    titulo("Parametros Control de Acceso", "", "control_acceso.php", "acceso");
    ?><br><br><br><br><br><br><br><br>
    <div id="content">
        <table width="400" align=center border="0" >
            <tr class="tb-fila">
                <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Inicio:</font></td>
                <td>
                    <input name="txtFechaInicio" type="text" id="txtFechaInicio" style="width:100px" value="" maxlength="60" onblur="javascript:actualizar('txtFechaInicio','fila_edad');">
                    <input name="image2" type="image" id="d_fechainicio" src="../lib/jscalendar/cal.gif" />
                    <script type="text/javascript">Calendar.setup({inputField:"txtFechaInicio",ifFormat:"%Y-%m-%d",button:"d_fechainicio"});</script>
                </td>
            </tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Fin:</font></td>
            <td>
                <input name="txtFechaFin" type="text" id="txtFechaFin" style="width:100px" value="" maxlength="60" onblur="javascript:actualizar('txtFechaFin','fila_edad');">
                <input name="image2" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif" />
                <script type="text/javascript">Calendar.setup({inputField:"txtFechaFin",ifFormat:"%Y-%m-%d",button:"d_fechafin"});</script>
            </td>
            </tr>
        </table>
        <table align=center>
            <tr class="tb-fila">
                <td width="400">
                    <div align="center">
                        <input type="submit" name="procesar" id="procesar" value="Procesar">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>