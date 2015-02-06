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
        $conceptos = array(
            define(DIAS_TRABAJADOS, 102),
            define(HORAS_EXTRAS_DIURNAS, 103),
            define(DIAS_FERIADOS_TRABAJADOS, 104),
            define(HORAS_EXTRAS_NOCTURNAS, 105),
            define(DIAS_NO_TRABAJADOS, 206));
        $fechaInicio = new DateTime($_POST['txtFechaInicio']);
        $fechaInicio = $fechaInicio->format('Y-m-d h:i:s');
        $fechaFin = new DateTime($_POST['txtFechaFin']);
        $fechaFin = $fechaFin->format('Y-m-d h:i:s');

        $conexion = odbc_connect('MSAccessDriver4Biometric', '', '') or die(odbc_error_msg());

        # Obtener los empleados que trabajaron en el intervalo de fechas proporcionado
        $sql = "SELECT DISTINCT USERID FROM CHECKINOUT WHERE CHECKTIME BETWEEN #{$fechaInicio}# AND #{$fechaFin}# AND (CHECKTYPE='I' OR CHECKTYPE='O')";
        $result = odbc_exec($conexion, $sql);

        while ($checkinout = odbc_fetch_object($result)) {
            $empleados_intervalo[] = $checkinout;
        }

        $sql = "SELECT * FROM CHECKINOUT
                    WHERE CHECKTIME BETWEEN #{$fechaInicio}# AND #{$fechaFin}#
                    AND (CHECKTYPE = 'I' OR CHECKTYPE = 'O')
                    ORDER BY USERID, CHECKTIME";
        $result = odbc_exec($conexion, $sql);

        while ($checkinout = odbc_fetch_object($result)) {
            #echo $checkinout->USERID, ' - ', $checkinout->CHECKTIME, ' - ', $checkinout->CHECKTYPE, '<br/>';
            $array_checkinout[] = $checkinout;
        }

        $insert = "INSERT INTO control_encabezado
                        VALUES('', '" . date("Y-m-d") . "', '{$_POST['txtFechaInicio']}', '{$_POST['txtFechaFin']}')";
        $result = sql_ejecutar($insert);

        $result = sql_ejecutar("SELECT MAX(cod_enca) FROM control_encabezado");
        $row = mysql_fetch_row($result);

        foreach ($empleados_intervalo as $empleado) {
            $workingdays = $i = 0;
            foreach ($conceptos as $concepto) {
                #while ($array_checkinout[$i]->USERID == $id_empleado) {
                $fechaux = new DateTime($fechaInicio);
                #echo $fechaux->format('Y-m-d'), '<br>';
                #Contar los dias trabajos por un empleado en el inertvalo de tiempo dado
                do {

                    $ckeckin = odbc_exec($conexion, "SELECT USERID FROM CHECKINOUT WHERE USERID = '{$empleado->USERID}' AND CHECKTIME = #{$fechaux->format('Y-m-d')}# AND CHECKTYPE = 'I'");
                    $ckeckout = odbc_exec($conexion, "SELECT USERID FROM CHECKINOUT WHERE USERID = '{$empleado->USERID}' AND CHECKTIME = #{$fechaux->format('Y-m-d')}# AND CHECKTYPE = 'O'");

                    if (!empty($checkin) && !empty($checkout)) {
                        $rcheckin = odbc_fetch_row($checkin);
                        $rcheckout = odbc_fetch_row($checkout);

                        if (!empty($rcheckin) && !empty($rcheckout)) {
                            $workingdays++;
                        }
                    }
                    unset($ckeckin, $ckeckout);

                    $fechaux->add(new DateInterval('P1D'));
                    #echo $fechaux->format('Y-m-d'), '<br>';
                } while ($fechaux->format('Y-m-d') != $fechaFin->format('Y-m-d'));
                $i++;
                #}
                # $_SESSION['codigo_nomina'] viene de paginas/seleccionar_nomina.php
                # $_SESSION['cod_empresa'] viene de seleccionar_empresa.php
                $insert_ind = "INSERT INTO control_acceso
                                    VALUES('{$_SESSION['cod_empresa']}', '{$_SESSION['codigo_nomina']}', '{$id_empleado}', '0000-00-00', ' {$concepto}', '{$workingdays}', '{$row[0]}','')";
                $result = sql_ejecutar($insert_ind);
            }
        }
        unset($id_empleados_intervalo, $id_empleado);

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