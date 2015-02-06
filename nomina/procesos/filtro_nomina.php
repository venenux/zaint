<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../header.php";
$conexion=conexion();

$opcion=$_GET['opcion'];
?>

<script>
function direccionar_txt()
{
    var opcion=document.getElementById('opcion')
    if(opcion.value==1)
        parent.cont.location.href="txt_provincial.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==2)
        parent.cont.location.href="txt_LPH_mens.php?mes="+document.form1.mes.value+"&anio="+document.form1.anio.value   
    else if(opcion.value==3)
        parent.cont.location.href="txt_APP_mens.php?mes="+document.form1.mes.value+"&anio="+document.form1.anio.value+"&tipo="+document.form1.tipo.value
    else if(opcion.value==4)
        parent.cont.location.href="txt_mercantil.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==5)
        parent.cont.location.href="orden_nomina.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==6)
        parent.cont.location.href="contabilizar_nomina.php?codigo_nomina="+document.form1.cboTipoNomina.value+"&cod_banco="+document.form1.banco.value
    else if(opcion.value==7)
        parent.cont.location.href="txt_venezuela.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==8)
        parent.cont.location.href="txt_BFC.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==9)
        parent.cont.location.href="txt_BOD.php?codigo_nomina="+document.form1.cboTipoNomina.value
    else if(opcion.value==10)
        parent.cont.location.href="txt_CA.php?mes="+document.form1.mes.value+"&anio="+document.form1.anio.value+"&tipo="+document.form1.tipo.value
    else if(opcion.value==11)
        parent.cont.location.href="rpt_recibo_pago_correo.php?codigo_nomina="+document.form1.cboTipoNomina.value
	else if(opcion.value==12)
        parent.cont.location.href="txt_BICENTENARIO.php?codigo_nomina="+document.form1.cboTipoNomina.value
}
</script>
<form id="form1" name="form1" method="post" action="">
<?titulo_mejorada("Parametros","","","../paginas/home.php")?>

<?
if(($opcion==2)||($opcion==3))
{
?>
    <table width="100%" height="229" align="center" border="0">
    <tr>
    <td width="489" height="190" >
    <input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
    <table width="520" align="right" border="0">
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle">
    <div align="left">Mes: <font size="2" face="Arial, Helvetica, sans-serif">
    <input type="text" maxlength="4" size="4" name="mes" id="mes"> A&#241;o:
    <input type="text" maxlength="4" size="4" name="anio" id="anio">
    </font></div></td>
    </tr>
    <?
    if($opcion==3)
    {
    ?>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left">Tipo:<font size="2" face="Arial, Helvetica, sans-serif">
    <select name="tipo" id="tipo" style="width:200px">
    <option>Seleccione tipo</option>
    <option value="APORTE">APORTE</option>
    <option value="INGRESO">INGRESO</option>
    </select>
    </font></div></td>
    <?
    }
    ?>
    </table>
<?
}
elseif(($opcion==1)||($opcion==4)||($opcion==7)||($opcion==8)||($opcion==9)||($opcion==11)||($opcion==12))
{
?>
    <table width="100%" height="229" border="0">
    <tr>
    <td width="489" height="190" ><table width="520" border="0">
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left"><?echo $termino?>:<font size="2" face="Arial, Helvetica, sans-serif">
    <input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
    <select name="cboTipoNomina" id="select2" style="width:400px">
    <option>Seleccione una <?echo $termino?></option>
    <?php
    $query="select codnom,descrip,codtip from nom_nominas_pago where codtip='".$_SESSION['codigo_nomina']."' and status='C'";
    $result=query($query,$conexion);
    //ciclo para mostrar los datos
    while ($row = fetch_array($result))
    {       
    // Opcion de modificar, se selecciona la situacion del registro a modificar             
    ?>
    <option value="<?php echo $row['codnom'];?>"><?php echo $row['descrip'];?></option>
    <?
    }//fin del ciclo while
    ?>      
    </select>
    <input type="hidden" name="codt" id="codt" value="<? echo $fila['codtip']; ?>" >
    </font></div></td>
    </tr>
    </table>
<?
}
elseif($opcion==5)
{
?>
    <table width="100%" height="229" border="0">
    <tr>
    <td width="489" height="190" ><table width="520" border="0">
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left"><?echo $termino?>:<font size="2" face="Arial, Helvetica, sans-serif">
    <input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
    <select name="cboTipoNomina" id="select2" style="width:400px">
    <option>Seleccione una <?echo $termino?></option>
    <?php
    $query="select codnom,descrip,codtip from nom_nominas_pago where codtip='".$_SESSION['codigo_nomina']."' and status='C' AND comprometida<>1";
    $result=query($query,$conexion);
    //ciclo para mostrar los datos
    while ($row = fetch_array($result))
    {       
    // Opcion de modificar, se selecciona la situacion del registro a modificar             
    ?>
    <option value="<?php echo $row['codnom'];?>"><?php echo $row['descrip'];?></option>
    <?
    }//fin del ciclo while
    ?>      
    </select>
    <input type="hidden" name="codt" id="codt" value="<? echo $fila['codtip']; ?>" >
    </font></div></td>
    </tr>
    </table>
<?
}

elseif($opcion==6)
{
?>
    <table width="100%" height="229" border="0">
    <tr>
    <td width="489" height="190" ><table width="520" border="0">
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left"><?echo $termino?>:<font size="2" face="Arial, Helvetica, sans-serif">
    <input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
    <select name="cboTipoNomina" id="select2" style="width:400px">
    <option>Seleccione una <?echo $termino?></option>
    <?php
    $query="SELECT codnom,descrip,codtip FROM nom_nominas_pago WHERE codtip='".$_SESSION['codigo_nomina']."' AND status='C' AND comprometida=1 AND contabilizada<>1 ";
    $result=query($query,$conexion);
    //ciclo para mostrar los datos
    while ($row = fetch_array($result))
    {       
    // Opcion de modificar, se selecciona la situacion del registro a modificar             
    ?>
    <option value="<?php echo $row['codnom'];?>"><?php echo $row['descrip'];?></option>
    <?
    }//fin del ciclo while
    ?>      
    </select>
    <input type="hidden" name="codt" id="codt" value="<? echo $fila['codtip']; ?>" >
    </font></div></td>
    </tr>
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left">Banco:<font size="2" face="Arial, Helvetica, sans-serif">
    <select name="banco" id="banco" style="width:200px">
    <option>Seleccione un banco</option>
    <?php
    $query="SELECT des_ban, ctacon FROM nombancos";
    $resultado33=query($query,$conexion);
    //ciclo para mostrar los datos
    while ($fetch = fetch_array($resultado33))
    {       
    // Opcion de modificar, se selecciona la situacion del registro a modificar             
    ?>
    <option value="<?php echo $fetch['ctacon'];?>"><?php echo $fetch['des_ban'];?></option>
    <?
    }//fin del ciclo while
    ?>      
    </select>
    </font></div></td>
    </tr>
    </table>
<?
}
elseif($opcion==10)
{
?>
    <table width="100%" height="229" align="center" border="0">
    <tr>
    <td width="489" height="190" >
    <input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
    <table width="520" align="right" border="0">
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle">
    <div align="left">Mes: <font size="2" face="Arial, Helvetica, sans-serif">
    <input type="text" maxlength="4" size="4" name="mes" id="mes"> A&#241;o:
    <input type="text" maxlength="4" size="4" name="anio" id="anio">
    </font></div></td>
    </tr>
    <tr>
    <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left">Tipo:<font size="2" face="Arial, Helvetica, sans-serif">
    <select name="tipo" id="tipo" style="width:200px">
    <option>Seleccione tipo</option>
    <option value="APORTE">APORTE</option>
    <option value="INGRESO">INGRESO</option>
    <option value="PRESTAMO">PRESTAMO</option>
    </select>
    </font></div></td>
    </tr>
    </table>
<?
}

?>
<p>&nbsp;</p>
<table width="467" border="0">
<tr>
<td width="466"><div align="right">
<?btn('ok','direccionar_txt();',2); ?>
</div></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
