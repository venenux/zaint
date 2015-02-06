<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>

<?
include "../lib/common.php";
include "../header.php";
include("func_bd.php");	
$conexion=conexion();

$opcion=$_GET['opcion'];
?>

<script>
function direccionar()
{
	var opcion=document.getElementById('opcion')
	if(opcion.value==1)
		AbrirVentana('../fpdf/reporte_deposito_lph_csbpdf.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==2)
		AbrirVentana('../fpdf/reporte_deposito_app_csbpdf.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==3)
		AbrirVentana('reporte_hcm_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==4)
		AbrirVentana('reporte_spf_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==5)
		AbrirVentana('reporte_fpj_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==6)
		AbrirVentana('reporte_ds_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==7)
		AbrirVentana('reporte_dv_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==8)
		AbrirVentana('reporte_pa_csb.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);
	else if(opcion.value==9)
		AbrirVentana('../fpdf/reporte_deposito_PATRONALES_pdf.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value+'&conceptod='+document.form1.conceptod.value+'&conceptop='+document.form1.conceptop.value,660,800,0);
	else if(opcion.value==10)
		AbrirVentana('../fpdf/reporte_deposito_PATRONALES_pdf2.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value+'&conceptod='+document.form1.conceptod.value+'&conceptop='+document.form1.conceptop.value,660,800,0);
	else if(opcion.value==11)
		AbrirVentana('../fpdf/reporte_prestaciones_intereses.php?mes='+document.form1.mes.value+'&anio='+document.form1.anio.value,660,800,0);


}
</script>
<form id="form1" name="form1" method="post" action="">
<?titulo_mejorada("Parametros del reporte","","","submenu_reportes_nomina.php")?>

<?
if(($opcion==1)||($opcion==2)||($opcion==3)||($opcion==4)||($opcion==5)||($opcion==6)||($opcion==7)||($opcion==8)||($opcion==11))
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
	</table>
<?
}
elseif(($opcion==9)||($opcion==10)||($opcion==12))
{
	?>
	<table width="520" border="0" align="center">
        <tr>
	<br><br><br>
	<?
	$consulta="select * from nomconceptos";
	$resultado=sql_ejecutar($consulta);
	?>
	<tr><td colspan="4" height="40">
	<input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
	Concepto deducci&oacute;n:&nbsp;&nbsp;
	<select name="conceptod" id="conceptod">
	<option>Seleccione un Concepto</option>
	<?
	while($fila=fetch_array($resultado))
	{
	?>
		<option value="<? echo $fila['codcon']?>"><? echo $fila['descrip']?></option>
	<?}?>
	</select>
	</td></tr>

	<?
	$consulta="select * from nomconceptos";
	$resultado3=sql_ejecutar($consulta);
	?>
	<tr><td colspan="4" height="40">
	Concepto patronal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="conceptop" id="conceptop">
	<option>Seleccione un Concepto</option>
	<?
	while($fila3=fetch_array($resultado3))
	{
	?>
		<option value="<? echo $fila3['codcon']?>"><? echo $fila3['descrip']?></option>
	<?}?>
	</select>
	</td></tr>
	<tr>
	<td colspan="4" height="40">
	<div align="left">Mes: <font size="2" face="Arial, Helvetica, sans-serif">
	<input type="text" maxlength="4" size="4" name="mes" id="mes"> A&#241;o:
	<input type="text" maxlength="4" size="4" name="anio" id="anio">
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
<?btn('ok','direccionar();',2); ?>
</div></td>
</tr>
</table>
</td>
</tr>
</table>
</form>