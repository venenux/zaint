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

$id = $_GET['id'];
$reg = $_GET['reg'];

$select = "select * from control_acceso where conse=" . $id;
$result = sql_ejecutar($select);
$fila = fetch_array($result);

if ($_POST["guardar"]) {
    if ($_POST['cod_trabajador'] != "" && $_POST['fecha'] != "" && $_POST['concepto'] != "" && $_POST['valor'] != "") {
        $cod = $_POST['cod'];
        $mod = "update control_acceso set cod_trabajador='" . $_POST['cod_trabajador'] . "', fecha='" . fecha_sql($_POST['fecha']) . "', concepto='" . $_POST['concepto'] . "', valor='" . $_POST['valor'] . "'  where conse=" . $cod;
        $result = sql_ejecutar($mod);
        header("Location: control_acceso_detalle.php?reg=$reg");
    } else {
        ?>
        <script type="text/javascript">
            alert("ALERTA:  \n Debe introducir todos los datos para guardar.");
        </script>
        <?php
    }
}
?>
<form action="control_acceso_editar.php?reg=<?php echo $reg ?>&id=<?php echo $id ?>" method="post" name="frmAgregar" id="frmAgregar" enctype="multipart/form-data">
    <?php titulo("Editar Control de Acceso", "", "control_acceso_detalle.php", "acceso"); ?>
    <br><br><br><br><br><br><br><br>
    <div id="content">
        <table  width="400" align=center border="0" >
            <tr class="tb-fila">
                <td  ><font size="2" face="Arial, Helvetica, sans-serif">  </font></td>
                <td>
                    <input name="cod" type="hidden" id="cod" style="width:100px" value="<?php echo $fila['conse'] ?>" maxlength="60" />
                </td>
            </tr>
            <tr>
                <td  ><font size="2" face="Arial, Helvetica, sans-serif">Ficha Trabajador:</font></td>
                <td>
                    <input name="cod_trabajador" type="text" id="cod_trabajador" style="width:100px" value="<?= $fila['cod_trabajador'] ?>" maxlength="60" >

                </td>
            </tr>
            <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha:</font></td>
                <td>
                    <input name="fecha" type="text" id="fecha" style="width:100px" value="<?php echo fecha($fila['fecha']); ?>" maxlength="60" >
                </td>
            </tr>
            <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Concepto:</font></td>
                <td>
                    <input name="concepto" type="text" id="concepto" style="width:100px" value="<?= $fila['concepto']; ?>" maxlength="60" >
                </td>
            </tr>
            <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Valor:</font></td>
                <td>
                    <input name="valor" type="text" id="valor" style="width:100px" value="<?= $fila['valor']; ?>" maxlength="60" >
                </td>
            </tr>
        </table>
        <table align=center>
            <tr>
            <tr class="tb-fila">
                <td width="400"><div align="center">
                        <input type="submit" name="guardar" id="guardar"  value="Guardar">
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