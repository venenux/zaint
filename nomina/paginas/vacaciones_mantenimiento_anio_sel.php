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
		parent.cont.location.href="vacaciones_mantenimiento.php?&anio="+document.form1.anio.value
}
</script>
<form id="form1" name="form1" method="post" action="">
<?titulo_mejorada("Parametros del reporte","","","submenu_vacaciones.php")?>

<?
if($opcion==1)
{
?>
	<table width="100%" height="229" align="center" border="0">
	<tr>
	<td width="520" height="" >
	<input type="hidden" name="opcion" id="opcion" value="<?php echo $opcion;?>">
	<table width="520" align="center" border="0">
	<tr>
	<td width="520" height="40" colspan="4" align="center" valign="middle">
	<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">A&#241;o a consultar:
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