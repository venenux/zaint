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
include("../header.php");
include("../lib/common.php");
include("func_bd.php");

if ($_POST["procesar"]) {
    if ($_POST['txtFechaFin'] != "" && $_POST['txtFechaInicio'] != "") {
        $filesize = $_FILES['mifichero']['size'];
        $filetype = $_FILES['mifichero']['type'];
        $archivo = $_FILES['mifichero']['name'];
        if ($archivo != "") {
            $nombre_archivo1 = $_FILES['mifichero']['name'];
            $tipo_archivo = $_FILES['mifichero']['type'];
            $tamano_archivo = $_FILES['mifichero']['size'];
            if (copy($_FILES['mifichero']['tmp_name'], "archivo/" . $nombre_archivo1)) {
                $insert = "insert into control_encabezado values('','" . date("Y-m-d") . "','" . fecha_sql($_POST['txtFechaFin']) . "','" . fecha_sql($_POST['txtFechaInicio']) . "')";
                $result = sql_ejecutar($insert);

                $select = "select MAX(cod_enca) from control_encabezado";
                $result = sql_ejecutar($select);
                $row = mysql_fetch_array($result);
                $id = $row[0];
                $archivo = file($_FILES['mifichero']['tmp_name']);
                $lineas = count($archivo);
                for ($i = 0; $i < $lineas; $i++) {
                    $entrada = explode("	", $archivo[$i]);
                    $dia = substr($entrada[3], 0, 2);
                    $mes = substr($entrada[3], 2, 2);
                    $ano = substr($entrada[3], 4, 7);
                    $fecha_dato = $ano . '-' . $mes . '-' . $dia;
                    $insert_ind = "insert into control_acceso values('" . $entrada[0] . "', '" . $entrada[1] . "','" . $entrada[2] . "','" . $fecha_dato . "','" . $entrada[4] . "','" . $entrada[5] . "','" . $id . "','')";
                    $result = sql_ejecutar($insert_ind);
                }

                echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">EL archivo fue cargado exitosamente</div>";
                chmod("archivo/" . $nombre_archivo1, 0777);
            } else {
                echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo</div>";
            }
        } else {
            ?>
            <script languaje="javascript">
                alert("ALERTA:  \n Debe introducir todos los datos para realizar la carga del archivo.");
            				
            </script> 	
            <?php
        }
    } else {
        ?>
        <script languaje="javascript">
            alert("ALERTA:  \n Debe introducir todos los datos para realizar la carga del archivo.");
        			
        </script> 	
        <?php
    }
}
?>

<form action="cargar_control_acceso.php" method="post" name="frmAgregar" id="frmAgregar" enctype="multipart/form-data">
<?php
titulo("Parametros Control de Acceso", "", "control_acceso.php", "acceso");
?><br><br><br><br><br><br><br><br>
    <div id="content">
        <table  width="400" align=center border="0" >
            <tr class="tb-fila">
                <td  ><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Inicio:</font></td>
                <td>
                    <input name="txtFechaInicio" type="text" id="txtFechaInicio" style="width:100px" value="" maxlength="60" onblur="javascript:actualizar('txtFechaInicio','fila_edad');">
                    <input name="image2" type="image" id="d_fechainicio" src="../lib/jscalendar/cal.gif" />
                    <script type="text/javascript">Calendar.setup({inputField:"txtFechaInicio",ifFormat:"%d/%m/%Y",button:"d_fechainicio"});</script>
                </td>
            </tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Fin:</font></td>
            <td>
                <input name="txtFechaFin" type="text" id="txtFechaFin" style="width:100px" value="" maxlength="60" onblur="javascript:actualizar('txtFechaFin','fila_edad');">
                <input name="image2" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif" />
                <script type="text/javascript">Calendar.setup({inputField:"txtFechaFin",ifFormat:"%d/%m/%Y",button:"d_fechafin"});</script>
            </td>
            </tr>

            <tr class="tb_fila">
                <td>Archivo de Foto:</td>
                <td><input type="file" name="mifichero" id="mifichero"  style="width:320px" ><input name="txtrutafoto" type="hidden" id="txtrutafoto" value="" maxlength="30"></td>
            </tr>

        </table>
        <table align=center>
            <tr>
            <tr class="tb-fila">
                <td width="400"><div align="center">
                        <input type="submit" name="procesar" id="procesar"  value="Procesar">
                    </div></td>

            </tr>

            </tr>
        </table>
        </td>
        </tr>
        </table>
    </div>
</form>
</body>
</html>