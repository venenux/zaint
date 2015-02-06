<?php 
session_start();
ob_start();
?>
<?
require_once '../lib/common.php';
include ("../header.php");

?>

<script type="text/javascript">

function enviar()
{
	//document.frmPrincipal.op.value=1;
	var ano = document.form1.anos.value
	parent.cont.location.href = "calendarios.php?ano="+ano
}

</script>

<?php
$conexion = conexion();

$consulta = "SELECT DISTINCT(YEAR(fecha)) as ano FROM nomcalendarios_tiposnomina WHERE cod_tiponomina=".$_SESSION['codigo_nomina']."";
$resultado = query($consulta,$conexion);
?>
<form id="form1" name="form1" method="post" action="">
<table width="807" height="150" border="0" class="row-br">
<tr>
<td height="31" class="tb-tit">
<table width="789" border="0">
<tr>
<td width="762"><div align="left"><font color="#000066"><strong>Consultar y modificar calendario</strong></font></div></td>
<td width="17"><div align="center"><?php btn('back','submenu_calendarios.php')  ?></div></td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="489" height="150" class="ewTableAltRow">
<table width="520" border="0">
<TR>
<TD class="tb-fila" width="200">Seleccione a&#241;o a consultar: </TD>
<TD>
<select name="anos" id="anos">
<OPTION >Seleccione a&#241;o</OPTION>
<?php
while($fetch = fetch_array($resultado))
{
?>
<option value="<?php echo $fetch['ano'];?>"><?php echo $fetch['ano'];?></option>
<?php
}
?>
</select>
</TD>
</TR>
</table>
</td>
</tr>
<tr><TD>
<table width="100%" border="0">
<tr>
<td width="466">
<div align="center">
<?php 
btn('ok','enviar();',2);
?>
</div></td>
</tr>
</table>
</TD></tr>
</table>



</form>

</body>
</html>