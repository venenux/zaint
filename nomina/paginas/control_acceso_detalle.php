<?php
session_start();
ob_start();
?>
<?php
require_once '../lib/config.php';
require_once '../lib/common.php';
include ("../header.php");
include ("func_bd.php");
$conexion = conexion();

//echo $conexion;
$url = "control_acceso_detalle";
$modulo = "Control de Acceso";
$tabla = "control_acceso";
$titulos = array("Trabajador", "Nombre", "Fecha", "Concepto", "Valor");
$indices = array("cod_trabajador", "apenom", "fecha", "concepto", "valor");

$conexion = conexion();
$cedula = @$_GET['cedula'];
$eliminar = @$_GET['eliminar'];
$tipob = @$_GET['tipo'];
$des = @$_GET['des'];
$pagina = @$_GET['pagina'];
$busqueda = @$_GET['busqueda'];
$reg = $_GET['reg'];

if (isset($_POST['buscar']) || $tipob != NULL) {

    if (!$tipob) {
        $tipob = $_POST['palabra'];
        $des = $_POST['buscar'];
        $busqueda = $_POST['busqueda'];
        $reg = $_POST['reg'];
    }

    if ($busqueda == 'ficha') {
        $consulta = "select *, nompersonal.apenom from " . $tabla . " inner join nompersonal on " . $tabla . ".cod_trabajador=nompersonal.ficha where cod_enca=" . $reg . " and nompersonal.ficha=" . $des;
    } else {
        switch ($tipob) {
            case "exacta":
                $consulta = buscar_exacta($tabla, $des, $busqueda);
                break;
            case "todas":
                $consulta = buscar_todas($tabla, $des, $busqueda);
                break;
            case "cualquiera":
                $consulta = buscar_cualquiera($tabla, $des, $busqueda);
                break;
        }
    }
    //echo $consulta;
} else {
    $consulta = "select *,nompersonal.apenom from " . $tabla . " inner join nompersonal on " . $tabla . ".cod_trabajador=nompersonal.ficha where cod_enca=" . $reg;
    #echo $consulta;
}

if ($_GET['accion'] == 'eliminar') {
    $id = $_GET['id'];
    $var_sql = "delete from " . $tabla . " WHERE conse ='" . $id . "'";
    $rs = query($var_sql, $conexion);
}
#echo $consulta . " este es el valor que muestra ";
$num_paginas = obtener_num_paginas($consulta);
$pagina = obtener_pagina_actual($pagina, $num_paginas);

$resultado = paginacion($pagina, $consulta);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
        <form name="<?php echo $url ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="_self">
            <?php titulo($modulo, "", "control_acceso.php", "acceso"); ?>
            <table class="tb-head" width="100%">
                <tr>
                    <td><input type="text" name="buscar" size="20"></td>
                    <TD>
                        <SELECT name="busqueda">
                            <option value="ficha">Ficha</option>
                            <option value="concepto">Concepto</option>
                            <option value="cod_trabajador">C&eacute;dula</option>
                        </SELECT>
                    </TD>
                    <td><?php btn('search', $url, 1); ?></td>
                    <td><?php btn('show_all', $url . ".php?pagina=" . $pagina . "&reg=" . $reg); ?></td>
                    <td width="120"><input onclick="javascript:actualizar(this);" checked="checked" type="radio" name="palabra" value="exacta"/>Palabra exacta</td>
                    <td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas"/>Todas las palabras</td>
                    <td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera"/>Cualquier palabra</td>
                    <td colspan="3" width="386"></td>
                </tr>
            </table>
            <input type="hidden" id="reg" name="reg" value="<?php echo $reg ?>"/>
            <br />
            <table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
                <tbody>
                    <tr class="tb-head" >
                        <?php
                        foreach ($titulos as $nombre) {
                            echo "<td><STRONG>$nombre</STRONG></td>";
                        }
                        ?>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    if ($num_paginas != 0) {
                        $i = 0;
                        while ($fila = mysql_fetch_array($resultado)) {
                            $i++;
                            if ($i % 2 == 0) {
                                ?>
                                <tr class="tb-fila">
                                    <?
                                } else {
                                    echo"<tr>";
                                }
                                foreach ($indices as $campo) {
                                    //$nom_tabla=mysql_field_name($resultado,$campo);
                                    switch ($campo) {

                                        default:
                                            $var = $fila[$campo];
                                            ?>
                                            <td><? echo $var ?></td>
                                            <?
                                            break;
                                    }
                                }
                                $id = $fila["conse"];

                                icono("control_acceso_editar.php?id=" . $id . "&pagina=" . $pagina . "&reg=" . $reg, "Editar Control", "edit.gif");
                                icono("javascript:if(confirm('Esta seguro que desea eliminar el registro ?')){document.location.href='control_acceso_detalle.php?id=" . $id . "&pagina=" . $pagina . "&accion=eliminar&reg=" . $reg . "';}", "Eliminar Control", "delete.gif");


                                echo"</tr>";
                            }
                        } else {
                            echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
                        }
                        cerrar_conexion($conexion);
                        ?>
                </tbody>
            </table>
            <?php pie_pagina($url, $pagina, "&tipo=" . $tipob . "&des=" . $des . "&busqueda=" . $busqueda."&reg=".$reg, $num_paginas); ?>
        </form>
    </body>
</html>
