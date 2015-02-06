<?php
session_start();
ob_start();
$termino = $_SESSION['termino'];
include("../header.php");
include("../lib/common.php");
include("func_bd.php");
?>

<script>
    function ActivarNivel(chkNivel,txtNivel){
	
        if (chkNivel.checked==false)
        {
            txtNivel.disabled="disabled"
        }
        else
        {
            txtNivel.disabled=""
        }
    }
    function Enviar(){					

        //var fecha=new Date();
        //var ano_actual=fecha.getYear();								
	
        //alert(document.frmAgregarIntegrantes.registro_id.value);			
        if (document.frmEmpresas.txtnombre.value==0)
        {
            document.frmEmpresas.op_tp.value=-1
            alert("Debe ingresar un nombre valido. Verifique...");				
        }	
        else
        {
            document.frmEmpresas.op_tp.value=2
        }
    }
</script>
<script language="javascript" type="text/javascript" src="datetimepicker.js">
    //Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
    //Script featured on JavaScript Kit (http://www.javascriptkit.com)
    //For this script, visit http://www.javascriptkit.com
</script>

<?php
//$registro_id=$_POST[registro_id];
$op_tp = $_POST['op_tp'];
//$fecha_actual=date("Y-m-d");
//$validacion=0;

if ($op_tp == 2) {

    if (isset($_POST['chkReportoNetosNevativos'])) {
        $NetosNevativos = "1";
    } else {
        $NetosNevativos = "0";
    }
    if (isset($_POST['chkSueldosCero'])) {
        $SueldosCero = "1";
    } else {
        $SueldosCero = "0";
    }
    if (isset($_POST['chkMediaJornada'])) {
        $MediaJornada = "1";
    } else {
        $MediaJornada = "0";
    }
    if (isset($_POST['chkIncluirNuevasSit'])) {
        $NuevasSituaciones = "1";
    } else {
        $NuevasSituaciones = "0";
    }
    if (isset($_POST['chkContratos'])) {
        $Contratos = "1";
    } else {
        $Contratos = "0";
    }
    if (isset($_POST['chkValidadPorcDeduccion'])) {
        $ValidarPorcDeducc = "1";
    } else {
        $ValidarPorcDeducc = "0";
    }

    if (isset($_POST['chkNivel1'])) {
        $nivel1 = 1;
    } else {
        $nivel1 = 0;
    }
    if (isset($_POST['chkNivel2'])) {
        $nivel2 = 1;
    } else {
        $nivel2 = 0;
    }
    if (isset($_POST['chkNivel3'])) {
        $nivel3 = 1;
    } else {
        $nivel3 = 0;
    }
    if (isset($_POST['chkNivel4'])) {
        $nivel4 = 1;
    } else {
        $nivel4 = 0;
    }
    if (isset($_POST['chkNivel5'])) {
        $nivel5 = 1;
    } else {
        $nivel5 = 0;
    }
    if (isset($_POST['chkNivel6'])) {
        $nivel6 = 1;
    } else {
        $nivel6 = 0;
    }
    if (isset($_POST['chkNivel7'])) {
        $nivel7 = 1;
    } else {
        $nivel7 = 0;
    }
    $archivo = $_FILES['imagen_izq']['name']; #HTTP_POST_FILES

    #echo "nombre de archivo:" . $archivo;
    //exit(0);
    if ($archivo != "" || $archivo != " ") {
        $nombre_archivo1 = $_FILES['imagen_izq']['name']; #HTTP_POST_FILES
        $tipo_archivo = $_FILES['imagen_izq']['type']; #HTTP_POST_FILES
        $tamano_archivo = $_FILES['imagen_izq']['size']; #HTTP_POST_FILES
        ##HTTP_POST_FILES
        if (copy($_FILES['imagen_izq']['tmp_name'], "../imagenes/" . $nombre_archivo1)) {

            chmod("../imagenes/" . $nombre_archivo1, 0777);
        } else {
            echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo 1</div>";
        }
    }

    $archivo = $_FILES['imagen_der']['name']; #HTTP_POST_FILES
    if ($archivo != "") {
        $nombre_archivo2 = $_FILES['imagen_der']['name']; #HTTP_POST_FILES
        $tipo_archivo = $_FILES['imagen_der']['type']; #HTTP_POST_FILES
        $tamano_archivo = $_FILES['imagen_der']['size']; #HTTP_POST_FILES

        if (copy($_FILES['imagen_der']['tmp_name'], "../imagenes/" . $nombre_archivo2)) {

            chmod("../imagenes/" . $nombre_archivo2, 0777);
        } else {
            echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo 2</div>";
        }
    }
    $query = "UPDATE nomempresa set 
				nom_emp='$_POST[txtnombre]',
				rif='$_POST[txtidentificador1]',
				nit='$_POST[txtidentificador2]',
				dir_emp='$_POST[txtdireccion]',
				ciu_emp='$_POST[txtciudad]',
				edo_emp='$_POST[txtestado]',
				zon_emp='$_POST[txtzonapostal]',
				tel_emp='$_POST[txttelefonos]',
				pre_sid='$_POST[txtrepresentante]',
				ger_rrhh='$_POST[txtencargadoRRHH]',
				edadmax='$_POST[txtedadguarderia]',
				nosueldocero='$SueldosCero',
				netoneg='$NetosNevativos',
				mediajornada='$MediaJornada',
				nuevassituaciones='$NuevasSituaciones',
				tipoficha='$_POST[optTipoFicha]',
				contratos='$Contratos',
				porcdiff='$_POST[txtPorcentaje]',
				reportdiff='$ValidarPorcDeducc',
				nivel1='$nivel1',
				nivel2='$nivel2',
				nivel3='$nivel3',
				nivel4='$nivel4',
				nivel5='$nivel5',
				nivel6='$nivel6',
				nivel7='$nivel7',				
				nomniv1='$_POST[txtnivel1]',
				nomniv2='$_POST[txtnivel2]',
				nomniv3='$_POST[txtnivel3]',
				nomniv4='$_POST[txtnivel4]',
				nomniv5='$_POST[txtnivel5]',
				nomniv6='$_POST[txtnivel6]',
				nomniv7='$_POST[txtnivel7]',
				imagen_izq='$nombre_archivo1',
				imagen_der='$nombre_archivo2',
				monsalmin='$_POST[salariominimo]',
				recibonom='$_POST[recibonom]',
				cod_material='$_POST[material]',
				unidad='$_POST[unidad]',
				ccosto='$_POST[ccosto]',
				proveedor='$_POST[proveedor]'";


    $result = sql_ejecutar($query);

    echo '<font color="#FF0000"><strong> Se actualizo correctamente el registro. </strong></font>';
}

$query = "select * from nomempresa";
$result = sql_ejecutar($query);
$row = mysql_fetch_array($result);
$nompre_empresa = $row[nom_emp];
$codigo_empresa = $row[cod_emp];
$direccion = $row[dir_emp];
$ciudad = $row[ciu_emp];
$estado = $row[edo_emp];
$zona_postal = $row[zon_emp];
$telefono = $row[tel_emp];
$rif = $row[rif];
$nit = $row[nit];
$edad_guarderia = $row[edadmax];
$representante = $row[pre_sid];
$encargadoRRHH = $row[ger_rrhh];
$contratos = $row[contratos];
$serial = $row[serial];
$nosueldocero = $row[nosueldocero];
$netonegativo = $row[netoneg];
$MediaJornada = $row[mediajornada];
$NuevasSituaciones = $row[nuevassituaciones];
$TipoFicha = $row[tipoficha];
$for_recibo_vac = $row[recibovac];
$for_recibo_liq = $row[reciboliq];
$for_recibo_pago = $row[recibopago];
$por_diff = $row[porcdiff];
$validar_porc_deducc = $row[reportdiff];
$monsalmin = $row[monsalmin];
$recibonom = $row[recibonom];
$material = $row[cod_material];
$unidad = $row[unidad];
$ccosto = $row[ccosto];
$proveedor = $row[proveedor];

//msgbox($for_recibo_liq);
?>
<form action="" enctype="multipart/form-data" method="post" name="frmEmpresas" id="frmEmpresas">
    <p>
        <input name="op_tp" type="Hidden" id="op_tp" value="-1">
        <input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">
    </p>
    <table width="790" height="210" border="0" class="row-br">
        <tr>
            <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;Empresa</strong></font></td>
        </tr>
        <tr>
            <td width="772" class="ewTableAltRow"><table width="772" border="0" cellpadding="1" cellspacing="1">
                    <tr bgcolor="#FFFFFF">
                        <td width="92" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Codigo:</font></div></td>
                        <td width="178" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" disabled="disabled" value="<?php echo $codigo_empresa; ?>" maxlength="10">
                            </font></td>
                        <td width="128" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">No. de Serial :</font></div></td>
                        <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtserial" type="text" id="txtserial" style="width:170px" disabled="disabled" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $serial; ?>" maxlength="10" >
                            </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre</font>:</div></td>
                        <td colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtnombre" type="text" id="txtnombre" size="100" value="<?php echo $nompre_empresa; ?>">
                            </font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? if ($termino == "Planilla") { ?>RUC:<? } else { ?>RIF:<? } ?></font></div></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtidentificador1" type="text" id="txtidentificador1" style="width:170px" value="<?php echo $rif; ?>" maxlength="30">
                            </font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">NIT:</font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><input name="txtidentificador2" type="text" id="txtidentificador2" style="width:170px" value="<?php echo $nit; ?>" maxlength="30"></font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Direcci&oacute;n:</font></div></td>
                        <td height="23" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtdireccion" type="text" id="txtdireccion" size="100" value="<?php echo $direccion; ?>">
                            </font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="9" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Ciudad:</font></div></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtciudad" type="text" id="txtciudad" style="width:170px" value="<?php echo $ciudad; ?>" maxlength="30">
                            <a href="javascript:NewCal('txtFechaNac','ddmmyyyy')"></a></font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><? if ($termino != "Planilla") { ?>Estado/Departamento:<? } else { ?>Corregimiento<? } ?></td>
                        <td width="194" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtestado" type="text" id="txtestado" style="width:170px" value="<?php echo $estado; ?>" maxlength="30">
                            </font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> </font>Zona Postal:</div></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtzonapostal" type="text" id="txtzonapostal" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $zona_postal; ?>" maxlength="10">
                            </font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">Tel&eacute;fonos:</td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txttelefonos" type="text" id="txttelefonos" style="width:170px" value="<?php echo $telefono; ?>" maxlength="30">
                            </font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left">Representante Legal:</div></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtrepresentante" type="text" id="txtrepresentante" style="width:170px" value="<?php echo $rif; ?>" maxlength="30">
                            </font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">Encargado RRHH:</td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtencargadoRRHH" type="text" id="txtencargadoRRHH" style="width:170px" value="<?php echo $encargadoRRHH; ?>" maxlength="30">
                            </font></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="left">Edad Guarderia: </div></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
                            <input name="txtedadguarderia" type="text" id="txtedadguarderia" style="width:50px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $edad_guarderia; ?>" maxlength="10">
                            </font></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">Maneja Contratos:</td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow"><label>
                                <input name="chkContratos" type="checkbox" id="chkContratos" value="checkbox"
                                <?php
                                if ($contratos) {
                                    ?>
                                           checked="checked"
                                           <?php
                                       }
                                       ?>
                                       >
                            </label></td>
                        <td width="164" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>

                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" rowspan="10" bgcolor="#FFFFFF" class="ewTableAltRow"><fieldset style="width:400px">
                                <legend>Niveles Funcionales que posee su Organizaci&oacute;n </legend>
                                <table width="393" border="0">
                                    <tr>
                                        <td width="75"><label>
                                                <input name="chkNivel1" type="checkbox" id="chkNivel1" value="checkbox" onClick="ActivarNivel(this,document.frmEmpresas.txtnivel1);"
                                                       <?php if ($row[nivel1] == 1) { ?> checked="checked" <?php } ?>>
                                                Nivel 1 </label></td>
                                        <td width="130"><input name="txtnivel1" type="text" style="width:200px" id="txtnivel1"
                                                               value=<?php
                                                       if ($row[nivel1] == 1) {
                                                           echo $row[nomniv1];
                                                       }
                                                       ?>></td>
                                    </tr>
                                    <tr>
                                        <td><input name="chkNivel2" type="checkbox" id="chkNivel2" value="checkbox"
                                                   <?php if ($row[nivel2] == 1) { ?> checked="checked" <?php } ?>
                                                   onClick="ActivarNivel(this,document.frmEmpresas.txtnivel2);">
                                            Nivel 2 </td>
                                        <td><input name="txtnivel2" type="text" style="width:200px" id="txtnivel2"
                                                   value=<?php
                                                   if ($row[nivel2] == 1) {
                                                       echo $row[nomniv2];
                                                   }
                                                   ?>></td>
                                    </tr>
                                    <tr>
                                        <td><input name="chkNivel3" type="checkbox" id="chkNivel3" value="checkbox"
                                                   <?php if ($row[nivel3] == 1) { ?> checked="checked" <?php } ?>
                                                   onClick="ActivarNivel(this,document.frmEmpresas.txtnivel3);">
                                            Nivel 3 </td>
                                        <td><input name="txtnivel3" type="text" style="width:200px" id="txtnivel3"
                                                   value=<?php
                                                   if ($row[nivel3] == 1) {
                                                       echo $row[nomniv3];
                                                   }
                                                   ?>></td>
                                    </tr>
                                    <tr>
                                        <td><input name="chkNivel4" type="checkbox" id="chkNivel4" value="checkbox"
                                                   <?php if ($row[nivel4] == 1) { ?> checked="checked" <?php } ?>
                                                   onClick="ActivarNivel(this,document.frmEmpresas.txtnivel4);">
                                            Nivel 4 </td>
                                        <td><input name="txtnivel4" type="text" style="width:200px" id="txtnivel4"
                                                   value=<?php
                                                   if ($row[nivel4] == 1) {
                                                       echo $row[nomniv4];
                                                   }
                                                   ?>></td>
                                    </tr>
                                    <tr>
                                        <td><input name="chkNivel5" type="checkbox" id="chkNivel5" value="checkbox"
                                                   <?php if ($row[nivel5] == 1) { ?> checked="checked" <?php } ?>
                                                   onClick="ActivarNivel(this,document.frmEmpresas.txtnivel5);">
                                            Nivel 5 </td>
                                        <td><input name="txtnivel5" type="text" style="width:200px" id="txtnivel5"
                                                   value=<?php
                                                   if ($row[nivel5] == 1) {
                                                       echo $row[nomniv5];
                                                   }
                                                   ?>></td>
                                    </tr>
                                    <tr>
                                        <td><input name="chkNivel6" type="checkbox" id="chkNivel6" value="checkbox"
                                                   <?php if ($row[nivel6] == 1) { ?> checked="checked" <?php } ?>
                                                   onClick="ActivarNivel(this,document.frmEmpresas.txtnivel6);">
                                            Nivel 6 </td>
                                        <td><input name="txtnivel6" type="text" style="width:200px" id="txtnivel6"
                                                   value=<?php
                                                   if ($row[nivel6] == 1) {
                                                       echo $row[nomniv6];
                                                   }
                                                   ?>></td>
                                    </tr>
                                    <tr>
                                        <td height="25"><input name="chkNivel7" type="checkbox" id="chkNivel7" value="checkbox"
                                                               <?php if ($row[nivel7] == 1) { ?> checked="checked" <?php } ?>
                                                               onClick="ActivarNivel(this,document.frmEmpresas.txtnivel7);">
                                            Nivel 7 </td>
                                        <td><input name="txtnivel7" type="text" style="width:200px" id="txtnivel7"
                                                   value=<?php
                                                               if ($row[nivel7] == 1) {
                                                                   echo $row[nomniv7];
                                                               }
                                                               ?>></td>
                                    </tr>
                                </table>
                                <label></label>
                            </fieldset> </td>
                        <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="13" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">Formato para recibo de Vacaciones:</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="25" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><span style="top:0px">
                                <input type="file" value="<?php echo $for_recibo_vac; ?>" name="mifichero" style="width:320px" onChange="Actualizar_Foto(document.frmAgregarIntegrantes.imgFoto, this);" >
                            </span></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="17" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="17" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">Formato para recibo de Liquidaciones:</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="17" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><span style="top:0px">
                                <input type="file" value="<?php echo $for_recibo_liq; ?>" name="mifichero2" style="width:320px" onChange="Actualizar_Foto(document.frmAgregarIntegrantes.imgFoto, this);" >
                            </span></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="20" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="9" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">Formato para recibo de Pago:</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="12" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><span style="top:0px">
                                <input type="file" name="mifichero3" style="width:320px"  value="<?php echo $for_recibo_pago; ?>" onChange="Actualizar_Foto(document.frmAgregarIntegrantes.imgFoto, this);">
                            </span></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="12" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>

                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><label>
                                <input name="chkValidadPorcDeduccion" type="checkbox" id="chkValidadPorcDeduccion" value="checkbox"
                                <?php
                                if ($validar_porc_deducc) {
                                    ?>
                                           checked="checked"
                                           <?php
                                       }
                                       ?>
                                       >
                                &iquest; Validar porcentaje de deducciones? </label></td>
                        <td colspan="2" rowspan="4" bgcolor="#FFFFFF" class="ewTableAltRow">
                            <fieldset style="width:300px">
                                <legend>
                                    Numeraci&oacute;n Automatica de Fichas</legend>
                                <table width="274" border="0">
                                    <tr>
                                        <td width="268"><label>
                                                <input name="optTipoFicha" type="radio" value="0"
                                                <?php
                                                if ($TipoFicha == 0) {
                                                    ?>
                                                           checked="checked"
                                                           <?php
                                                       }
                                                       ?>
                                                       >
                                            </label>
                                            Ficha unica para todo tipo de <? echo $termino ?></td>
                                    </tr>
                                    <tr>
                                        <td height="30"><label>
                                                <input name="optTipoFicha" type="radio" value="1"
                                                <?php
                                                if ($TipoFicha == 1) {
                                                    ?>
                                                           checked="checked"
                                                           <?php
                                                       }
                                                       ?>
                                                       >
                                            </label>
                                            Ficha diferente por tipo de <? echo $termino ?> </td>
                                    </tr>
                                </table>
                            </fieldset></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow">Porcentaje &gt; 0 =: 
                            <input name="txtPorcentaje" style="width:50px" type="text" id="txtPorcentaje" value="<?php echo $por_diff; ?>" >&nbsp;&nbsp;
                            <input name="chkReportoNetosNevativos" type="checkbox" id="chkReportoNetosNevativos" value="checkbox" 
                            <?php
                            if ($netonegativo) {
                                ?>
                                       checked="checked"
                                       <?php
                                   }
                                   ?>
                                   >
                            &iquest; Reporto Netos Negativos? </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><input name="chkSueldosCero" type="checkbox" id="chkSueldosCero" value="checkbox" 
                            <?php
                            if ($nosueldocero) {
                                ?>
                                                                                                       checked="checked"
                                                                                                       <?php
                                                                                                   }
                                                                                                   ?>
                                                                                                   >
                            &iquest;No acepto sueldos en cero ? </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><input name="chkMediaJornada" type="checkbox" id="chkMediaJornada" value="checkbox"
                            <?php
                            if ($MediaJornada) {
                                ?>
                                                                                                       checked="checked"
                                                                                                       <?php
                                                                                                   }
                                                                                                   ?>
                                                                                                   >
                            &iquest; Habilitada la media jornada ? </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow"><input name="chkIncluirNuevasSit" type="checkbox" id="chkIncluirNuevasSit" value="checkbox"
                            <?php
                            if ($NuevasSituaciones) {
                                ?>
                                                                                                       checked="checked"
                                                                                                       <?php
                                                                                                   }
                                                                                                   ?>
                                                                                                   >
                            &iquest;Permitir incluir nuevas situaciones de personal ? </td>
                        <?
                        //$consulta="SELECT cod_material, descripcion FROM materiales";
                        //$result=sql_ejecutar($consulta);
                        ?>
                        <td height="26" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">
                            Material a usar en orden tipo nomina: 
                            <select style="width:200px" name="material" id="material">
                                <option value="">Seleccione</option>
                                <?
                                while ($fetch = fetch_array($result)) {
                                    ?>
                                    <option title="<? echo $fetch['descripcion'] ?>" <? if ($material == $fetch['cod_material'])
                                    echo "selected='selected'" ?> value="<? echo $fetch['cod_material'] ?>"><? echo $fetch['descripcion'] ?></option>
                                            <?
                                        }
                                        ?>
                            </select></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>

                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow">Imagen Izquierda&nbsp;&nbsp;<INPUT type="file" name="imagen_izq"></td>
                        <?
//$consulta="SELECT cod_proveedor, compania FROM proveedores";
//$result=sql_ejecutar($consulta);
                        ?>
                        <td height="26" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">
                            Proveedor a usar en orden tipo nomina: 
                            <select style="width:200px" name="proveedor" id="proveedor">
                                <option value="">Seleccione</option>
                                <?
                                while ($fetch = fetch_array($result)) {
                                    ?>
                                    <option title="<? echo $fetch['compania'] ?>" <? if ($proveedor == $fetch['cod_proveedor'])
                                    echo "selected='selected'" ?> value="<? echo $fetch['cod_proveedor'] ?>"><? echo $fetch['compania'] ?></option>
                                            <?
                                        }
                                        ?>
                            </select></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>

                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow">Imagen Derecha&nbsp;&nbsp;<INPUT type="file" name="imagen_der"></td>
                        <?
//$consulta="SELECT cod_unidad, descripcion FROM unidades";
//$result=sql_ejecutar($consulta);
                        ?>
                        <td height="26" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">
                            Unidad a usar en orden tipo nomina: 
                            <select style="width:200px" name="unidad" onchange="javascript:cargar_ccosto();" id="unidad">
                                <option value="">Seleccione</option>
                                <?
                                while ($fetch = fetch_array($result)) {
                                    ?>
                                    <option title="<? echo $fetch['descripcion'] ?>" <? if ($unidad == $fetch['cod_unidad'])
                                    echo "selected='selected'" ?> value="<? echo $fetch['cod_unidad'] ?>"><? echo $fetch['descripcion'] ?></option>
                                            <?
                                        }
                                        ?>
                            </select></td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="26" colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow">Salario M&iacute;nimo&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="text" name="salariominimo" value="<? echo $monsalmin; ?>"></td>
                        <?
//$consulta="SELECT cod_centro, descripcion FROM centros WHERE cod_unidad='$unidad'";
//$result=sql_ejecutar($consulta);
                        ?>
                        <td height="26" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">
                            C. de costo usar en orden tipo nomina: 
                            <select style="width:200px" name="ccosto" id="ccosto">
                                <option value="">Seleccione</option>
                                <?
                                while ($fetch = fetch_array($result)) {
                                    ?>
                                    <option title="<? echo $fetch['descripcion'] ?>" <? if ($ccosto == $fetch['cod_centro'])
                                    echo "selected='selected'" ?> value="<? echo $fetch['cod_centro'] ?>"><? echo $fetch['descripcion'] ?></option>
                                            <?
                                        }
                                        ?>
                            </select>
                        </td>
                        <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                    </tr>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td height="26" colspan="4" bgcolor="#FFFFFF" class="ewTableAltRow">Nota en recibos:&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="text" name="recibonom" size="120" value="<? echo $recibonom ?>"></td>
            <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow"></td>
            <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td height="26" colspan="4" bgcolor="#FFFFFF" class="ewTableAltRow"><table width="85" border="0">
                    <tr>
                        <td width="39"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                                <?php btn('cancel', 'history.back();', 2) ?>
                                </font></div></td>
                        <td width="36"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                                <?php btn('ok', 'Enviar(); document.frmEmpresas.submit();', 2) ?>
                                </font></div></td>
                    </tr>
                </table></td>
            <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
    </table></td>
</tr>
</table>
<p>&nbsp;</p>  
</form>
<p>&nbsp;</p>
</body>
</html>
