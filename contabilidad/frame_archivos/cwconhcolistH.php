<?php
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
$conexion = conexion();
//echo $conexion;
$url = "cwconhcolistH";
$modulo = "Asientos";
$tabla = "cwconhcohis";
$titulos = array("Numero", "Fecha", "Grupo", "Descripcion", "Estado");
$indices = array("0", "2", "1", "3", "4");

$conexion = conexion();
//$cod_unidad=@$_GET['codigo'];
//$cod_centro=@$_GET['cod_centro'];
//$id=@$_GET['id'];
$rsac = @$_GET['rsac'];
$tipob = @$_GET['tipo'];
$des = @$_GET['des'];
$pagina = @$_GET['pagina'];
if (isset($_POST['buscar']) || $tipob != NULL) {
    if (!$tipob) {
        $tipob = $_POST['palabra'];
        $des = $_POST['buscar'];
        $busqueda = $_POST['busqueda'];
    }
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
} else {
    //echo "cod: ".$id;
    $consulta = "select * from " . $tabla;
    //echo $consulta;
    $consulta.=" ORDER BY numcom DESC";
}
//echo $consulta." este es el valor que muestra ";
$num_paginas = obtener_num_paginas($consulta);
$pagina = obtener_pagina_actual($pagina, $num_paginas);
$resultado = paginacion($pagina, $consulta);
?>

<script type="text/javascript" src="lib/common.js"></script>
<FORM name="<?php echo $url ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
    <?php
    titulo($modulo, "", "menu_his.php", "46");
    ?>
    <table class="tb-head" width="100%">
        <tr>
            <td>
                <input type="text" name="buscar" size="20">
            </td>
            <td>
                <select name="busqueda" id="busqueda">
                    <option value="Numcom">Comprobante</option>
                    <option value="Fecha">Fecha</option>
                    <option value="Descrip">Descripcion</option>
                </select>
            </td>
            <td><? btn('search', $url, 1); ?></td>
            <td><? btn('show_all', $url . ".php?pagina=" . $pagina); ?></td>
            <td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
            <td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
            <td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
            <td colspan="3" width="386"></td>
        </tr>
    </table>
    <BR>
    <table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
        <tbody>
            <tr class="tb-head" >
                <?
                foreach ($titulos as $nombre) {
                    echo "<td><STRONG>$nombre</STRONG></td>";
                }
                ?>
                <td></td><td></td><td></td><td></td><td></td><td></td>


            </tr>
            <?
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
                            $nom_tabla = mysql_field_name($resultado, $campo);
                            if ($nom_tabla == "Fecha") {
                                $fech = $fila[$nom_tabla];
                                $fecha = fecha($fech);
                                echo"<td width=\"150\">$fecha</td>";
                            } else if ($nom_tabla == "Codtipo") {
                                $var = $fila[$nom_tabla];
                                $cosul = "select * FROM cwcontco where Codtipo=" . $var;
                                $resul = query($cosul, $conexion);
                                $fila_des = fetch_array($resul);
                                $Descripcion = $fila_des['Descrip'];
                                echo"<td width=\"150\">$Descripcion</td>";
                            } else if ($nom_tabla == "Descrip") {
                                $var = $fila[$nom_tabla];
                                echo "<td width=\"600\">$var</td>";
                            } else if ($nom_tabla == "Estado") {
                                $var = $fila[$nom_tabla];
                                switch ($var) {
                                    case 1:
                                        $Var_Tipoestado = "EN TRANSITO";
                                        break;
                                    case 2:
                                        $Var_Tipoestado = "EN CONTABILIDAD";
                                        break;
                                    case 3:
                                        $Var_Tipoestado = "DESCUADRADOS";
                                        break;
                                    case 4:
                                        $Var_Tipoestado = "ANULADOS";
                                        break;
                                }
                                echo "<td width=\"150\">$Var_Tipoestado</td>";
                            } else {
                                $var = $fila[$nom_tabla];
                                echo "<td>$var</td>";
                            }
                        }
                        $mes1 = explode("-", $fila['Fecha']);
                        $mes = (real) $mes1[1];
                        $ano = $mes1[0];

                        $consultaMes = "SELECT Estcie" . $mes . " from cwconemp WHERE year(Mescie" . $mes . ")=$ano";
                        $resultMes = query($consultaMes, $conexion);
                        $filaMes = fetch_array($resultMes);

                        $Numcom = $fila["Numcom"];
                        $Estado = $fila["Estado"];

                        $campo = "Estcie" . $mes;
                        //echo $filaMes[$campo];
                        if ($Estado <> "4") {
                            if ($Estado == 1) {
                                echo "<td></td>";
                                if ($filaMes[$campo] == 'CERRADO')
                                    echo "<td></td>";
                                else
                                    echo "<td></td>";
                                //icono("javascript:confirmar('Desea Contabilizar El Comprobante ?','contab_trans.php?Numcom=".$Numcom."&Estado=".$Estado."&pagina=".$pagina."&Accion=Contabilizar')", "Contabilizar","Contabilizar.png");
                            }
                            if ($Estado == 2) {
                                echo "<td></td>";
                                if ($filaMes[$campo] == 'CERRADO')
                                    echo "<td></td>";
                                else
                                    echo "<td></td>";
                                //icono("javascript:confirmar('Desea Regresar a Transito El Comprobante ?','contab_trans.php?Numcom=".$Numcom."&Estado=".$Estado."&pagina=".$pagina."&Accion=Transito')", "Regresar a Transito","Transito.png");
                            }
                            icono("cwcondcolistH.php?Numcom=" . $Numcom . "&pagina=" . $pagina, "Asientos", "asientogif.png");
                            iconoNuevo("reporte_cwdcolistH.php?Numcom=" . $Numcom, "Reporte de Comprobante", "70.png");
                            if ($filaMes[$campo] == 'CERRADO')
                                echo "<td></td>";
                            else
                                echo "<td></td>";
                            //icono("cwconhcoedit.php?Numcom=".$Numcom."&pagina=".$pagina."&accion=modificar", "Editar","ico_edit.gif");
                            if ($Estado == 1) {
                                if ($filaMes[$campo] == 'CERRADO')
                                    echo "<td></td>";
                                else
                                    echo "<td></td>";
                                //icono("javascript:confirmar('Desea Anular El Comprobante y Borrar Todos sus Asientos?','cwconhcoedit_sql.php?Numcom=".$Numcom."&pagina=".$pagina."&Accion=Borrar')", "Anular comprobante","ico_basket.gif");
                            }
                            else {
                                ?><td></td><?
            }
        } else {
                            ?>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
                            <?
                        }
                        echo"</tr>";
                    }
                } else {
                    echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
                }
                cerrar_conexion($conexion);
                ?>
        </tbody>
    </table>
                <?
                pie_pagina($url, $pagina, "&tipo=" . $tipob . "&des=" . $des, $num_paginas);
                ?>
</FORM>
</BODY>
</html>
