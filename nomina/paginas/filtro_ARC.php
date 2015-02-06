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
		AbrirVentana('reporte_ARC.php?anio='+document.form1.anio.value,660,800,0);
	else
	if(opcion.value==2)
		AbrirVentana('reporte_reposos.php?anio='+document.form1.anio.value,660,800,0);
}
</script>
<form id="form1" name="form1" method="post" action="">
<?titulo_mejorada("Parametros del reporte","","","submenu_reportes_integrantes.php")?>

<?
if(($opcion==1)||($opcion==2))
{
?>
	<table width="100%" height="229" align="center" border="0">
	<tr>
	<td  height="190" align="center" >
	<input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
	<table width="100%" align="center" border="0">
	<tr>
	<td height="40" colspan="4" align="center" valign="middle">
	<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
	A&#241;o: <input type="text" maxlength="4" size="4" name="anio" id="anio">
	</font></div></td>
	</tr>
	</table>
<?
}
?>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
<tr>
<td><div align="center">
<?btn('ok','direccionar();',2); ?>
</div></td>
</tr>
</table>
</td>
</tr>
</table>
</form>