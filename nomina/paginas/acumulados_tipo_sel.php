<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?php
include ("../header.php");
include("../lib/common.php");

include ("func_bd.php") ;

$conexion=conexion();
$consulta="SELECT cod_tac, des_tac FROM nomacumulados";
$resultado=query($consulta,$conexion);

?>
<script>

function buscar_empleado()
{
	AbrirVentana('buscar_empleado_acumulados.php',660,700,0);
}

function buscar_concepto()
{
	AbrirVentana('buscar_concepto_acumulados.php',660,700,0);
}


function CerrarVentana(){
	javascript:window.close();
}

function Aceptar()
{
	var ficha=document.getElementById('ficha')
	var concepto=document.getElementById('concepto')
	var anio=document.getElementById('anio')
	var division=document.getElementById('acum')
	var contenido_division=abrirAjax()
	contenido_division.open("GET", "mostrar_acumulados.php?ficha="+ficha.value+"&opcion=2&concepto="+concepto.value+"&anio="+anio.value, true)
   	contenido_division.onreadystatechange=function() 
	{
		if (contenido_division.readyState==4)
		{
			division.parentNode.innerHTML = contenido_division.responseText;
		}
	}
	contenido_division.send(null);	
}


</script>

<script type="text/javascript" src="tabber.js"></script>
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="example-print.css" TYPE="text/css" MEDIA="print">



<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<table width="100%" class="tb-tit">
<tr>
<td class=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="100%"><strong> <font color="#000066"> Acumulados por concepto </font></strong></td>
<td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div align="right">
<?php btn('back','menu_personal.php') ?>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>

<br>
<table width="100%" border="0"  id="lst"  cellspacing="0" cellpadding="0">
<tr class="tb-head"  style="font-weight : bold;">
<td height="26" width="9%"  >Ficha: <input type="text" name="ficha" align="right" id="ficha" maxlength="6" size="8"/>&nbsp;
<a href="javascript:buscar_empleado();"><img src="images/search.gif" name="buscar" id="buscar" border="0"/></a> </td>
<td width="15%" >Tipo: 
<select name="concepto" id="concepto" align="right">
<option>Seleccione tipo de acumulado</option>
<?php
while($fetch=fetch_array($resultado))
{
?>
<option value="<?php echo $fetch['cod_tac']?>"><?php echo $fetch['des_tac']?></option>
<?
}
?>
</select>
</td>
<td width="9%" >A&#241;o: <input type="text" name="anio" id="anio" align="right" maxlength="4"  size="8"/></td>
</tr>	
</table>

<br>

<table width="100%"  class="tb-head">
<tr>
<td width="7%"><label></label></td>
<td width="10%">&nbsp;</td>
<td width="9%">&nbsp;</td>
<td>&nbsp;</td>
<td width="2%"></td>
<td width="2%"></td>
<td width="2%"><?php btn('ok','Aceptar();',2,'Enviar') ?></td>
</tr>
</table>

<table align="center" border="0">
<TR>
<TD>
<div id="acum">
</div>
</TD>
</TR>
</table>

<p>&nbsp;</p>
<p>
</p>
<p>&nbsp; </p>
</form>
</body>
</html>
