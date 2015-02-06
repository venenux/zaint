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
          VALUES('', {$_SESSION['codigo_nomina']}, '" . date("Y-m-d") . "' ,'{$fechaInicio->format('Y-m-d')}', '{$fechaFin->format('Y-m-d')}')";
        $result = sql_ejecutar($insert);

        $select = "SELECT MAX(cod_enca) FROM control_encabezado";
        $result = sql_ejecutar($select);
        $row = mysql_fetch_row($result);

        #Obtener los dias feriados del calendario (configurados) en el intervalo dado para el case DIAS_FERIADOS_TRABAJADOS
        $select = "SELECT fecha FROM nomcalendarios_tiposnomina WHERE dia_fiesta = 3 AND fecha BETWEEN '{$fechaInicio->format('Y-m-d')}' AND '{$fechaFin->format('Y-m-d')}' AND cod_empresa = {$_SESSION['cod_empresa']} AND cod_tiponomina = {$_SESSION['codigo_nomina']}";
        $result = sql_ejecutar($select);
        $array_feriados = array();
        while ($feriados = mysql_fetch_object($result)) {
            $array_feriados[] = $feriados;
            #echo $feriados->fecha,'<br>';
        }
        #echo $select, '<br>', mysql_num_rows($result), '<br>';

        foreach ($id_empleados_intervalo as $empleado) {
            #$i = 0;
            foreach ($conceptos as $concepto) {
                $valor = 0;
                switch ($concepto) {
                    #echo $fechaAux->format('Y-m-d h:i:s'),' | ', $fechaFin->format('Y-m-d h:i:s'),'<br>';
                    #echo $array_checkinout[$i]->USERID ,' - ', $id_empleado->USERID,'<br>';
                    # Calcular los dias trabajados
                    case DIAS_TRABAJADOS:
                        $fechaAux = clone $fechaInicio; #new DateTime($_POST['txtFechaInicio']);
                        $flag = FALSE;
                        do {
                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaAux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaAux->format('m')}
                                AND Day(CHECKTIME) = {$fechaAux->format('d')}
                                AND CHECKTYPE = 'I'";
                            $checkin = odbc_exec($connection, $sql);
                            $rcheckin = odbc_fetch_object($checkin);

                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaAux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaAux->format('m')}
                                AND Day(CHECKTIME) = {$fechaAux->format('d')}
                                AND CHECKTYPE = 'O'";
                            $checkout = odbc_exec($connection, $sql);
                            $rcheckout = odbc_fetch_object($checkout);

                            if (!empty($rcheckin) /* && !empty($rcheckout) */) {
                                $valor++;
                            } elseif ($fechaAux->format('l') == 'Sunday') {#Se cuentan los Domingos como trabajados
                                #echo $fechaAux->format('l'), '<br>';
                                $valor++;
                            }
                            unset($rcheckin, $rcheckout);
                            if ($fechaAux->format('Y-m-d h:i:s') == $fechaFin->format('Y-m-d h:i:s')) {
                                $flag = TRUE;
                            }
                            $fechaAux->add(new DateInterval('P1D'));
                            #echo $fechaAux->format('Y-m-d h:i:s'),' | ', $fechaFin->format('Y-m-d h:i:s'), '<br>';
                        } while (!$flag);
                        unset($flag, $fechaAux);
                        break;
                    case HORAS_EXTRAS_DIURNAS:
                        $fecha_ini = clone $fechaInicio; #new DateTime($_POST['txtFechaInicio']);
                        $fecha_fin = clone $fechaFin; #new DateTime($_POST['txtFechaFin']);
                        $hora_fin1 = new DateTime('12:00:00');
                        $hora_fin2 = new DateTime('18:00:00');
                        $flag = FALSE;
                        $fecha_aux = $fecha_ini;
                        do {
                            $sql = "SELECT DISTINCT (CHECKTIME) FROM CHECKINOUT
                                    WHERE USERID = {$empleado->USERID}
                                    AND YEAR(CHECKTIME) = {$fecha_aux->format('Y')}
                                    AND MONTH(CHECKTIME) = {$fecha_aux->format('m')}
                                    AND DAY(CHECKTIME) = {$fecha_aux->format('d')}
                                    AND CHECKTYPE='0'";
                            $inoutrest = odbc_exec($connection, $sql);
                            $inoutrest_list = array();
                            while ($rinoutrest = odbc_fetch_object($inoutrest)) {
                                $temp_checktime = new DateTime($rinoutrest->CHECKTIME);
                                $inoutrest_list[] = $temp_checktime->format('Y-m-d');
                            }

                            $sql = "SELECT CHECKTIME, CHECKTYPE FROM CHECKINOUT
                                    WHERE USERID = {$empleado->USERID}
                                    AND YEAR(CHECKTIME) = {$fecha_aux->format('Y')}
                                    AND MONTH(CHECKTIME) = {$fecha_aux->format('m')}
                                    AND DAY(CHECKTIME) = {$fecha_aux->format('d')}";
                            $checkin = odbc_exec($connection, $sql);

                            while ($rcheckin = odbc_fetch_object($checkin)) {
                                $rest = FALSE;
                                $hora_aux = new DateTime($rcheckin->CHECKTIME); # Y-m-d h:m:s
                                foreach ($inoutrest_list as $inoutrest_date) {
                                    if (strcmp($hora_aux->format('Y-m-d'), $inoutrest_date) == 0) {
                                        $rest = TRUE;
                                    }
                                }
                                if (!$rest/* $rcheckin->CHECKTYPE != '0' && $rcheckin->CHECKTYPE != '1' */) {
                                    #No hay descanso. Calcular HED si la salida fue despues de las 12:00:00
                                    #El calculo es realizado en formato 24h. De lo contrario, p.ej. las 12:00:00 seria mayor a las 06:00:00
                                    if ($rcheckin->CHECKTYPE == 'O' && strcmp($hora_aux->format('H:i:s'), $hora_fin1->format('H:i:s')) > 0) {
                                        #echo $hora_aux->format('Y-m-d H:i:s'), ' | ';
                                        if (strcmp($hora_aux->format('H:i:s'), '14:00:00') >= 0) {
                                            $cant = 2; #echo $cant, 'HED<br>';
                                        } else {
                                            $h = $hora_fin1->diff($hora_aux);
                                            $cant = abs($h->format('%H') - 23);
                                            #echo $cant, 'HED<br>';
                                        }
                                        $valor+=$cant;
                                        #echo "valor=$valor<br>";
                                    }
                                }
                                if ($rcheckin->CHECKTYPE == 'O' && strcmp($hora_aux->format('H:i:s'), $hora_fin2->format('H:i:s')) > 0) {
                                    if (strcmp($hora_aux->format('H:i:s'), '19:00:00') >= 0) {
                                        $valor+=1;
                                    }
                                }
                            }
                            #echo '------------------------------------<br>';
                            if ($fecha_aux->format('Y-m-d h:i:s') == $fecha_fin->format('Y-m-d h:i:s')) {
                                $flag = TRUE;
                            }
                            $fecha_aux->add(new DateInterval('P1D'));
                        } while (!$flag);
                        unset($rcheckin, $rcheckout, $fecha_ini, $fecha_fin, $fecha_aux, $hora_aux, $hora_fin1, $hora_fin2, $cant, $rest, $flag);
                        #exit;
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
                            if ($checkin->CHECKTYPE == 'I' /* && $checkout->CHECKTYPE == 'O' */) {
                                $valor++;
                            }
                        }
                        break;
                    case HORAS_EXTRAS_NOCTURNAS:
                        $fecha_ini = clone $fechaInicio; #new DateTime($_POST['txtFechaInicio']);
                        $fecha_fin = clone $fechaFin; #new DateTime($_POST['txtFechaFin']);
                        $hora_fin1 = new DateTime('19:00:00');
                        $flag = FALSE;
                        $fecha_aux = $fecha_ini;
                        do {
                            $sql = "SELECT CHECKTIME, CHECKTYPE FROM CHECKINOUT
                                    WHERE USERID = {$empleado->USERID}
                                    AND YEAR(CHECKTIME) = {$fecha_aux->format('Y')}
                                    AND MONTH(CHECKTIME) = {$fecha_aux->format('m')}
                                    AND DAY(CHECKTIME) = {$fecha_aux->format('d')}";
                            $checkin = odbc_exec($connection, $sql);

                            while ($rcheckin = odbc_fetch_object($checkin)) {
                                $rest = FALSE;
                                $hora_aux = new DateTime($rcheckin->CHECKTIME); # Y-m-d h:m:s

                                if ($rcheckin->CHECKTYPE == 'O' && strcmp($hora_aux->format('H:i:s'), $hora_fin1->format('H:i:s')) > 0) {
                                    #echo $hora_aux->format('Y-m-d H:i:s'), ' | ';
                                    if (strcmp($hora_aux->format('H:i:s'), '20:00:00') >= 0) {
                                        $h = $hora_fin1->diff($hora_aux);
                                        $cant = abs($h->format('%H') - 23);
                                    }
                                    $valor+=$cant;
                                }
                            }
                            if ($fecha_aux->format('Y-m-d h:i:s') == $fecha_fin->format('Y-m-d h:i:s')) {
                                $flag = TRUE;
                            }
                            $fecha_aux->add(new DateInterval('P1D'));
                        } while (!$flag);
                        unset($rcheckin, $fecha_ini, $fecha_fin, $fecha_aux, $hora_aux, $hora_fin1, $cant, $flag);
                        break;
                    case DIAS_NO_TRABAJADOS:
                        $trabajados = 0;
                        $fechaAux = clone $fechaInicio; #new DateTime($_POST['txtFechaInicio']);
                        $flag = false;
                        do {
                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaAux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaAux->format('m')}
                                AND Day(CHECKTIME) = {$fechaAux->format('d')}
                                AND CHECKTYPE = 'I'";
                            $checkin = odbc_exec($connection, $sql);
                            $rcheckin = odbc_fetch_object($checkin);

                            $sql = "SELECT USERID FROM CHECKINOUT
                                WHERE USERID = {$empleado->USERID}
                                AND Year(CHECKTIME) = {$fechaAux->format('Y')}
                                AND Month(CHECKTIME) = {$fechaAux->format('m')}
                                AND Day(CHECKTIME) = {$fechaAux->format('d')}
                                AND CHECKTYPE = 'O'";
                            $checkout = odbc_exec($connection, $sql);
                            $rcheckout = odbc_fetch_object($checkout);

                            if (!empty($rcheckin) /* && !empty($rcheckout) */) {
                                $trabajados++;
                                #echo 'Empleado ', $empleado->USERID, ': ', $fechaAux->format('l'), ' ', $fechaAux->format('Y-m-d h:i:s'), '->', $trabajados, ' dias<br>';
                            } elseif ($fechaAux->format('l') == 'Sunday') {#Se cuentan los Domingos
                                $trabajados++;
                                #echo 'Empleado ', $empleado->USERID, ': ', $fechaAux->format('l'), ' ', $fechaAux->format('Y-m-d h:i:s'), '->', $trabajados, ' dias<br>';
                            }
                            if ($fechaAux->format('Y-m-d h:i:s') == $fechaFin->format('Y-m-d h:i:s')) {
                                $flag = true;
                            }
#echo $fechaAux->format('Y-m-d h:i:s'), ' | ', $trabajados, '<br>';
                            $fechaAux->add(new DateInterval('P1D'));
                            unset($rcheckin, $rcheckout);
                        } while (!$flag);
                        $intervalo = $fechaInicio->diff($fechaFin);
                        $valor = $intervalo->format('%d') + 1 - $trabajados;
                }
# $_SESSION['codigo_nomina'] viene de paginas/seleccionar_nomina.php
# $_SESSION['cod_empresa'] viene de seleccionar_empresa.php
                $insert = "INSERT INTO control_acceso
                            VALUES('{$_SESSION['cod_empresa']}', '{$_SESSION['codigo_nomina']}', '{$empleado->USERID}', '','{$concepto}', '{$valor}', '{$row[0]}','')";
                $result = sql_ejecutar($insert);
            }
        }
        unset($id_empleados_intervalo, $empleado);
        header("Location:control_acceso.php");
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
                    <input name="image2" type="image" id="d_fechainicio" src="../lib/jscalendar/cal.gif" alt=""/>
                    <script type="text/javascript">Calendar.setup({inputField:"txtFechaInicio",ifFormat:"%Y-%m-%d",button:"d_fechainicio"});</script>
                </td>
            </tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Fin:</font></td>
            <td>
                <input name="txtFechaFin" type="text" id="txtFechaFin" style="width:100px" value="" maxlength="60" onblur="javascript:actualizar('txtFechaFin','fila_edad');">
                <input name="image2" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif" alt=""/>
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