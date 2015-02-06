<?php
session_start();
ob_start();
$termino = $_SESSION['termino'];
include ("../header.php");
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php
//codigo para pagina;
$TAMANO_PAGINA = 20;
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 1;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA + 1;
}
$limit = $inicio - 1;
?>
<script type="text/javascript">
    function enviar(op,id){
        if (op==1){		// Opcion de Agregar
            //document.frmAgregar.registro_id.value=id;
            document.frmAgregar.op.value=op;
            document.frmAgregar.action="ag_maestro_integrantes.php";
            document.frmAgregar.submit();	
        }
        if (op==2){	 	// Opcion de Modificar
            //alert($op);		
            document.frmIntegrantes.registro_id.value=id;		
            document.frmIntegrantes.op.value=op;
            document.frmIntegrantes.action="ag_maestro_integrantes.php";
            document.frmIntegrantes.submit();		
        }
        if (op==3){		// Opcion de Eliminar
            if (confirm("Esta seguro que desea eliminar el registro ?"))
            {					
                document.frmIntegrantes.registro_id.value=id;
                document.frmIntegrantes.op.value=op;
                document.frmIntegrantes.submit();
            }		
        }
    }
    function VerFoto(foto)
    {
        AbrirVentana('mostrar_foto_empleado.php?foto='+foto,360,390,0);
    }
</script>

<p>
    <font size="2" face="Arial, Helvetica, sans-serif">
    <?php
    include ("func_bd.php");
    include ("../lib/common.php");

    $criterio = $_POST['optOpcion'];
    $cadena = $_POST['textfield'];

    $registro_id = $_POST['registro_id'];
    $op = $_POST['op'];


    if ($op == 3) { //Se presiono el boton de Eliminar
        $consulta = "select * from nom_movimientos_nomina mov join nompersonal per on (mov.ficha=per.ficha) where per.cedula='" . $registro_id . "'";
        $resultado = sql_ejecutar($consulta);

        if (num_rows($resultado) == 0) {
            $query = "delete from nompersonal where cedula=$registro_id";

            $result = sql_ejecutar($query);
        } else {
            mensaje("Esta persona se encuentra posee nominas asociadas por lo cual no se puede eliminar");
        }
        activar_pagina("maestro_personal.php");
    } elseif ($cadena <> "") {   // Condicion para filtrado
        // para obtener la cantidad de registros
        $strsql = "select COUNT(*) from nomvis_integrantes ";
        $strsql = filtrado($criterio, $cadena, $strsql, "cedula", "nombres", "apellidos", "ficha", "descrip", '', '', '', '', '', "'" . $_SESSION[nomina] . "'", 'descrip');

        //msgbox($strsql);

        $result = sql_ejecutar($strsql);
        $fila = fetch_array($result);
        $num_total_registros = $fila[0];
        $strsql = "select * from nomvis_integrantes ";
        $strsql = filtrado($criterio, $cadena, $strsql, "cedula", "nombres", "apellidos", "ficha", "descrip", '', '', '', '', '', "'" . $_SESSION[nomina] . "'", 'descrip');

        $strsql = "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
        $result = sql_ejecutar($strsql);
        // para paginacion		 
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    } else {     // No se filtra y se muestran todos los datos
        $strsql = "select COUNT(*) from nomvis_integrantes where descrip='" . $_SESSION['nomina'] . "'";
        $result = sql_ejecutar($strsql);
        $fila = fetch_array($result);
        $num_total_registros = $fila[0];

        $strsql = "select * from nomvis_integrantes where descrip='" . $_SESSION['nomina'] . "' order by ficha,apellidos,nombres,cedula LIMIT $TAMANO_PAGINA  OFFSET $limit";
        $result = sql_ejecutar($strsql);

        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    }
    ?>
    </font></p>
<form name="frmIntegrantes" method="post" action="">
    <table width="100%" class="tb-tit">
        <tr>
            <td class="row-br">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="96%">
                            <strong>
                                <font color="#000066">&nbsp;Personal</font>
                            </strong>
                        </td>
                        <td width="2%"><?php
    if ($_GET['bandera'] == 1)
        btn('back', 'menu_consultas.php'); else
        btn('back', 'menu_personal.php');
    ?></td>
                        <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <div align="right">
                                            <?php if ($_GET['bandera'] != 1)
                                                btn('add', 'ag_maestro_integrantes.php') ?>				        
                                        </div></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <table width="100%" border="0" class="tb-head">
        <tr class="">
            <td width="162"><font size="2" face="Arial, Helvetica, sans-serif" class="tb-head">
                <input name="textfield" type="text" class="boton-text" style="width:150px" size="20" 
                       value="<?php
                                        if (isset($_POST[textfield])) {
                                            echo $_POST[textfield];
                                        }
                                            ?>">
                </font></td>
            <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="tb-head">
                <?php btn('search', 'frmIntegrantes', 1) ?>
                </font></td>
            <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="tb-head">
                <?php btn('show_all', 'maestro_personal.php?cmd=reset') ?>
                </font></td>
            <td width="579"><font size="2" face="Arial, Helvetica, sans-serif" class="ewBasicSearch">
                <label>        </label>
                </font><font size="2" face="Arial, Helvetica, sans-serif">
                <label>
                    <input name="optOpcion"  type="radio" id="Sea Igual a"  value="Sea Igual a"
                           <?php if ($criterio == 'Sea Igual a') { ?> checked="checked"<?php } ?>>
                    Frase exacta&nbsp;</label>
                <label>
                    <input name="optOpcion" type="radio" id="Contenga"  value="Contenga" checked="true"
                           <?php if ($criterio == 'Contenga') { ?> checked="checked"<?php } ?>>
                    Cualquier palabra</label>
                </font></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF"  id="lst"  cellspacing="0" cellpadding="0">
        <tr bgcolor="#CCCCCC" class="tb-head"> 
            <td width="11%" class="tb-head">
                <div align="left">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <strong>Ficha</strong>	  			  
                    </font>
                </div>	  
            </td>
            <td width="9%" height="21" align="right" class="tb-head"> 
                <div align="left" class="tb-head">
                    <font size="2" face="Arial, Helvetica, sans-serif"><strong> C&eacute;dula </strong> </font>
                </div>
            </td>
            <td width="50%" class="tb-head">
                <div align="left">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <strong>	  Apellidos y Nombres	</strong>  			  
                    </font>
                </div>	  
            </td>
            <td width="10%" class="tb-head">
                <div align="left">
                    <font size="2" face="Arial, Helvetica, sans-serif"> <strong>Situaci&oacute;n</strong></font>
                </div>	  
            </td>
            <td width="24%" class="tb-head">
                <div align="center">
                    <div align="left" class="phpmakerlist">
                        <font size="2" face="Arial, Helvetica, sans-serif"><strong>Tipo de <? echo $termino ?></strong></font>
                    </div>
                </div>
            </td>
            <td width="3%" class="tb-head">&nbsp;</td>
            <td width="3%" class="tb-head">&nbsp;</td>
            <td width="3%" class="tb-head">&nbsp;</td>
            <?php if ($_GET['bandera'] != 1): ?>
                <td width="3%" class="tb-head">&nbsp;</td>
                <td width="3%" class="tb-head">&nbsp;</td>
                <td width="3%" class="tb-head">&nbsp;</td>
                <td width="3%" class="phpmakerlist">&nbsp;</td>
            <?php endif; ?>
        </tr>
        <?php
        //operaciones para paginaciones
        $num_fila = 0;
        $in = 1 + (($pagina - 1) * 5);

        $i = 0;
        //ciclo para mostrar los datos 
        while ($fila = fetch_array($result)) {
            $strsql1 = "select foto from nompersonal where cedula='" . $fila['cedula'] . "'";

            $fila_foto = sql_ejecutar($strsql1);
            $fila_foto = fetch_array($fila_foto);

            $i++;
            $color = '';
            if ($fila[estado] == "Vacaciones" || $fila[estado] == "Inactivo" || $fila[estado] == "Egresado de nomina de pago")
                $color = "bgcolor='lightgreen'";
            if ($fila[estado] == "Egresado")
                $color = "bgcolor='red'";
            if ($i % 2 == 0) {
                if ($color == '')
                    $color = "class='tb-fila'";
                ?>
                <tr <?php echo $color ?> >
                    <?
                }
                Else {
                    echo "<tr $color>";
                }
                ?>
                <td>
                    <div align="left">
                        <font size="2" face="Arial, Helvetica, sans-serif">
                        <?php echo $fila['ficha'] ?>
                        </font>
                    </div>
                </td>      
                <td height="20"> <div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">	
                        <?php echo $fila['cedula'] ?>
                        </font>
                    </div>
                </td>
                <td>
                    <div align="left">
                        <font size="2" face="Arial, Helvetica, sans-serif">
                        <?php echo $fila['apellidos'] . ', ' . $fila['nombres'] ?>
                        </font>
                    </div>
                </td>
                <td>
                    <div align="left">
                        <font size="2" face="Arial, Helvetica, sans-serif">  
                        <?php echo $fila['estado'] ?>
                        </font>
                    </div>
                </td>
                <td>
                    <div align="left" >
                        <font size="2" face="Arial, Helvetica, sans-serif">
                        <?php echo $fila['descrip'] ?>
                        </font>
                    </div>
                </td>
                <td>
                    <div align="left" >
                        <font size="2" face="Arial, Helvetica, sans-serif">
                        <img src="img_sis/ico_search.gif" title="Ver Foto" width="16" height="16" border="0" align="absmiddle" id="imgFoto" name="imgFoto" onClick="VerFoto('<?php echo $fila_foto['foto']; ?>');"/>
                        <!--input type="button" id="imgFoto" name="imgFoto" onClick="VerFoto('<?php echo $fila_foto['foto']; ?>');" /-->
                        </font>
                    </div>
                </td>
                <?php if ($_GET['bandera'] == 1): ?>
                    <td>
                        <div align="center">
                            <font size="2" face="Arial, Helvetica, sans-serif">
                            <a href="ed_maestro_integrantes.php?cedula=<? echo $fila['cedula'] ?>&bandera=1&ficha=<? echo $fila['ficha'] ?>">
                                <img src="img_sis/ico_view.gif" title="Editar" width="16" height="16" border="0" align="absmiddle">
                            </a>
                            <label></label>
                            </font>
                        </div>
                    </td>
                <?php else: ?>
                    <td>
                        <div align="center">
                            <font size="2" face="Arial, Helvetica, sans-serif">
                            <a href="ed_maestro_integrantes.php?cedula=<? echo $fila['cedula'] ?>&ficha=<? echo $fila['ficha'] ?>">
                                <img src="img_sis/ico_edit.gif" title="Editar" width="16" height="16" border="0" align="absmiddle"/>
                            </a>
                            <label></label>
                            </font>
                        </div>
                    </td>
                <?php endif; ?>
                <?php
                if ($_GET['bandera'] == 1)
                    icono("familiares.php?txtficha=" . $fila[ficha] . "&cedula=" . $fila[cedula] . "&bandera=1", "Cargas Familiares", "familiares.png");
                else
                    icono("familiares.php?txtficha=" . $fila[ficha] . "&cedula=" . $fila[cedula], "Cargas Familiares", "familiares.png");
                if ($_GET['bandera'] != 1)
                    icono("otrosdatos_integrantes.php?txtficha=" . $fila[ficha], "Campos Adicionales", "list.gif");
                ?>
                <td>
                    <div align="center">
                        <font size="2" face="Arial, Helvetica, sans-serif">
                        <a href="../fpdf/datos_personal.php?cedula=<? echo $fila['cedula'] . "&ficha=$fila[ficha]" ?>">
                            <img src="../imagenes/ico_print.gif" title="Imprimir" width="16" height="16" border="0" align="absmiddle">
                        </a>
                        </font>
                    </div>
                </td>
                <?php if ($_GET['bandera'] != 1): ?>
                    <td>
                        <div align="center">
                            <font size="2" face="Arial, Helvetica, sans-serif">
                            <a href="../expediente/expediente_list.php?cedula=<? echo $fila['cedula'] ?>">
                                <img src="img_sis/icons/59.png" title="Expediente de <? echo $fila[apellidos] . ', ' . $fila[nombres] ?>" width="16" height="16" border="0" align="absmiddle">
                            </a>
                            </font>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <font size="2" face="Arial, Helvetica, sans-serif">
                            <a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila['cedula']); ?>);">
                                <img src="../imagenes/delete.gif" title="Eliminar" width="16" height="16" border="0" align="absmiddle">
                            </a>
                            </font>
                        </div>
                    </td>
                    <!--<label></label>-->
                    </font></div></td>
                <?php endif; ?>
            </tr>
            <?php
            $bandera = $_GET['bandera'];
        }//fin del ciclo while
        //operaciones de paginacion
        $num_fila++;
        $in++;
        ?>
        <input name="registro_id" type="hidden" value="">
        <input name="op" type="hidden" value="">	
    </table>
    <table width="100%"  class="tb-head">
        <tr>
            <td width="61%"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo1">
                    <?php
                    if ($num_total_registros > 0) {
                        $rsEof = ($num_total_registros < ($inicio + $TAMANO_PAGINA));
                        $PrevStart = $inicio - $TAMANO_PAGINA;
                        if ($PrevStart < 1) {
                            $PrevStart = 1;
                        }
                        $NextStart = $inicio + $TAMANO_PAGINA;

                        if ($NextStart > $num_total_registros) {
                            $NextStart = $inicio;
                        }
                        $LastStart = intval(($num_total_registros - 1) / $TAMANO_PAGINA + 1);
                        ?>
                    </span></font>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><span class="phpmaker">P&aacute;gina&nbsp;</span></td>
                            <!--first page button-->
                            <?php if ($inicio == 1) { ?>
                                <td><img src="images/firstdisab.gif" title="Primera" width="16" height="16" border="0"></td>
                            <?php } else { ?>
                                <td><a href="maestro_personal.php?pagina=1&criterio=<?php $criterio; ?>&bandera=<?php echo $bandera; ?>"><img src="images/first.gif" title="Primera" width="16" height="16" border="0"></a></td>
                            <?php } ?>
                            <!--previous page button-->
                            <?php if ($PrevStart == $inicio) { ?>
                                <td><img src="images/prevdisab.gif" title="Anterior" width="16" height="16" border="0"></td>
                            <?php } else { ?>
                                <td><a href="maestro_personal.php?pagina=<?php echo $pagina - 1; ?>&criterio=<?php $criterio; ?>&bandera=<?php echo $bandera; ?>"><img src="images/prev.gif" title="Anterior" width="16" height="16" border="0"></a></td>
                            <?php } ?>
                            <!--current page number-->
                            <td><input type="text" name="pageno" value="<?php echo intval(($inicio - 1) / $TAMANO_PAGINA + 1); ?>" size="4"></td>
                            <!--next page button-->
                            <?php if ($NextStart == $inicio) { ?>
                                <td><img src="images/nextdisab.gif" title="Siguiente" width="16" height="16" border="0"></td>
                            <?php } else { ?>
                                <td><a href="maestro_personal.php?pagina=<?php echo $pagina + 1; ?>&criterio=<?php $criterio; ?>&bandera=<?php echo $bandera; ?>"><img src="images/next.gif" title="Siguiente" width="16" height="16" border="0"></a></td>
                            <?php } ?>
                            <!--last page button-->
                            <?php if ($NextStart == $inicio) { ?>
                                <td><img src="images/lastdisab.gif" title="Ultima" width="16" height="16" border="0"></td>
                            <?php } else { ?>
                                <td><a href="maestro_personal.php?pagina=<?php echo $LastStart; ?>&criterio=<?php $criterio; ?>&bandera=<?php echo $bandera; ?>"><img src="images/last.gif" title="Ultima" width="16" height="16" border="0"></a></td>
                            <?php } ?>
                            <td><span class="phpmaker">&nbsp;de <?php echo intval(($num_total_registros - 1) / $TAMANO_PAGINA + 1); ?></span></td>
                        </tr>
                    </table>
                </td>
                <td width="39%">
                    <?php
                    if ($inicio > $num_total_registros) {
                        $inicio = $num_total_registros;
                    }
                    $nStopRec = $inicio + $TAMANO_PAGINA - 1;
                    $nRecCount = $num_total_registros - 1;
                    if ($rsEof) {
                        $nRecCount = $num_total_registros;
                    }
                    if ($nStopRec > $nRecCount) {
                        $nStopRec = $nRecCount;
                    }
                    ?>
                    Registro <?php echo $inicio; ?> a <?php echo $nStopRec; ?> de <?php echo $num_total_registros; ?>
                </td>
            </tr>
        </table>
        <?php
    }
    ?>
    <p align="center">&nbsp;</p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></a></font></p>
    <font size="2" face="Arial, Helvetica, sans-serif">
    </font>
</form>
<p>&nbsp;</p>
</body>
</html>
