<?php
session_start();
ob_start();
?>
<?php 
$url="expediente_agregar";
$modulo="Agregar registro";
	
//DECLARACION DE LIBRERIAS
require_once '../../lib/common.php';
require_once '../func_bd.php';
include ("../../header.php");
$conexion=conexion();
$cedula=$_GET['cedula'];
if(isset($_POST['cedula']))
	$cedula=$_POST['cedula'];
$codigo=$_GET['codigo'];
?>

<script type="text/javascript">

function confirmar2(msg)
{
	if (confirm(msg) == true) 
	{
		document.formulario1.opcion.value=1
		document.formulario1.submit()
	}
}

</script>
<link href="../../estilos.css" rel="stylesheet" type="text/css" />
<?

if($_POST['opcion']==1)
{
	if($_POST['editar']!=1)
	{
		if($_POST['fecha_reintegro']=='')
			$fecha_reintegro='';	
		else
			$fecha_reintegro=fecha_sql($_POST['fecha_reintegro']);
		
		if($_POST['fecha_salida']=='')
			$fecha_salida='';
		else
			$fecha_salida=fecha_sql($_POST['fecha_salida']);
	
		$consulta="INSERT INTO nomexpediente VALUES ('','$cedula','$_POST[tipo_registro]','$_POST[tipo_tiporegistro]','$_POST[descripcion]','$_POST[monto]','$_POST[monto_nuevo]','$_POST[dias]','".$fecha_reintegro."','".$fecha_salida."','$_POST[cod_cargo]','$_POST[cod_cargo_nuevo]','".date("Y-m-d")."','$_SESSION[nombre]','$_POST[pagado_por_emp]','','','','','','','','','','','','','','')";
		$resultado=query($consulta,$conexion);
	}
	else
	{
		if($_POST['fecha_reintegro']=='')
			$fecha_reintegro='';	
		else
			$fecha_reintegro=fecha_sql($_POST['fecha_reintegro']);
		
		if($_POST['fecha_salida']=='')
			$fecha_salida='';
		else
			$fecha_salida=fecha_sql($_POST['fecha_salida']);
		
		$consulta="UPDATE nomexpediente SET tipo_registro='$_POST[tipo_registro]', tipo_tiporegistro='$_POST[tipo_tiporegistro]',monto='$_POST[monto]', monto_nuevo='$_POST[monto_nuevo]', dias=$_POST[dias], fecha='".date("Y-m-d")."', fecha_salida='$fecha_salida', fecha_retorno='$fecha_reintegro', cod_cargo='$_POST[cargo]', cod_cargo_nuevo='$_POST[cod_cargo_nuevo]', usuario='$_SESSION[nombre]', descripcion='$_POST[descripcion]', pagado_por_emp='$_POST[pagado_por_emp]' WHERE cod_expediente_det=$_POST[codigo]";
		$resultado=query($consulta,$conexion);
	}
	activar_pagina("expediente_list.php?cedula=$cedula");
}


	

$editar="";
if(isset($_GET['codigo']))
{
	$modulo="Editar registro";
	$consulta="SELECT * FROM nomexpediente WHERE cedula=$_GET[cedula] AND cod_expediente_det=$_GET[codigo]";
	$resultado=query($consulta,$conexion);
	$fetch33=fetch_array($resultado);
	$editar=1;
}
?>


<FORM name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo_mejorada($modulo,"","","");
?>

<table width="100%" border="1">
<BR>
<tr>
<!--<TD height="25" class="tb-head" align="left"><strong> TIPO DE REGISTRO </strong>-->
<input type="hidden" name="editar" id="editar" value="<? echo $editar;?>">
<input type="hidden" name="cedula" id="cedula" value="<? echo $cedula;?>">
<input type="hidden" name="codigo" id="codigo" value="<? echo $_GET['codigo'];?>">
</TD>
</tr>

<TR>
<TD height="50">Tipo:
<select onchange="javascript:cargar_tipo();" name="tipo_registro" id="tipo_registro">
<option value="">Seleccione</option>
<option <?if($fetch33['tipo_registro']=="Logros")echo "selected='true'"?> value="Logros">Logros</option>
<!--<option <?//if($fetch33['tipo_registro']=="Amonestaciones")echo "selected='true'"?> value="Amonestaciones">Amonestaciones</option>-->
<option <?if($fetch33['tipo_registro']=="Permisos")echo "selected='true'"?> value="Permisos">Permisos</option>
<option <?if($fetch33['tipo_registro']=="Estudios/Cursos")echo "selected='true'"?> value="Estudios/Cursos">Estudios/Cursos</option>
<option <?if($fetch33['tipo_registro']=="Antic. prestaciones")echo "selected='true'"?> value="Antic. prestaciones">Antic. prestaciones</option>
<option <?if($fetch33['tipo_registro']=="Uniforme")echo "selected='true'"?> value="Uniforme">Uniforme</option>
</select>
</td>
<td>

<div id="tipo_tipo">
Tipo registro: <select name="tipo_tiporegistro" id="tipo_tiporegistro">
<option value="<? echo $fetch33['tipo_tiporegistro']?>"><? echo $fetch33['tipo_tiporegistro']?></option>
</select>
</div>
</td>
<td>
Pagado por la instituci&oacute;n?:
<select name="pagado_por_emp" id="pagado_por_emp">
<option value="">Seleccione</option>
<option <?if($fetch33['tipo']=="Si")echo "selected='true'"?> value="Si">Si</option>
<option <?if($fetch33['tipo']=="No")echo "selected='true'"?> value="No">No</option>
</select>

</TD>
</tr>
</table>
<table width="100%" border="0">
<TR height="50">
<TD colspan="2">Descripcion: <input type="text" name="descripcion" id="descripcion" <? if (isset($fetch33['descripcion'])) echo "value='$fetch33[descripcion]'"?> size="70"/>
</TD>
</TR>

<tr height="50">
<TD colspan="2">D&iacute;as: 
<input type="text" size="3" name="dias" id="dias" maxlength="2" <? if (isset($fetch33['dias'])) echo "value='$fetch33[dias]'"?>/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Fecha de Salida:
<input size="10" type="text" name="fecha_salida" id="fecha_salida" value="<?if(isset($fetch33['fecha_salida'])) echo fecha($fetch33['fecha_salida']);?>">
<a>
<input name="image2" type="image" id="d_fechainicio" src="../lib/jscalendar/cal.gif"/>
<script type="text/javascript">
Calendar.setup({inputField:"fecha_salida",ifFormat:"%d/%m/%Y",button:"d_fechainicio"})
</script>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Reintegro:
<input size="10" type="text" name="fecha_reintegro" id="fecha_reintegro" value="<?if(isset($fetch33['fecha_retorno'])) echo fecha($fetch33['fecha_retorno']);?>">
<a>
<input name="image2" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif"/>
<script type="text/javascript">
Calendar.setup({inputField:"fecha_reintegro",ifFormat:"%d/%m/%Y",button:"d_fechafin"})
</script>
</TD>
</tr>

<tr height="50">
<TD colspan="2">Cargo Anterior: 
<select name="cod_cargo" id="cod_cargo">
<option value="">Ninguna</option>
<?
$consulta="SELECT cod_car, des_car FROM nomcargos";
$resultado2=query($consulta,$conexion);
while($fetch2=fetch_array($resultado2))
{
	?>
	<option <?if($fetch33['cod_cargo']==$fetch2['cod_car']) echo "selected='true'" ?>  value="<?echo $fetch2['cod_car']?>"><?echo $fetch2['des_car']?></option>
	<?
}
?>
<option value="Todas">Todas</option>
</select>
</TD>
</tr>
<tr height="50">
<TD colspan="2">
Cargo Nuevo:
<select name="cod_cargo_nuevo" id="cod_cargo_nuevo">
<option value="">Ninguna</option>
<?
$consulta="SELECT cod_car, des_car FROM nomcargos";
$resultado2=query($consulta,$conexion);
while($fetch2=fetch_array($resultado2))
{
	?>
	<option <?if($fetch33['cod_cargo_nuevo']==$fetch2['cod_car']) echo "selected='true'" ?>  value="<?echo $fetch2['cod_car']?>"><?echo $fetch2['des_car']?></option>
	<?
}
?>
<option value="Todas">Todas</option>
</select>
</td>
</tr>

<tr height="50">
<TD colspan="2">
Monto Anterior: <input type="text" name="monto" id="monto" value="<? if(isset($fetch33['monto'])) echo $fetch33['monto']; else echo "";?>" size="8"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Monto Nuevo: <input type="text" name="monto_nuevo" id="monto_nuevo" value="<? if(isset($fetch33['monto_nuevo'])) echo $fetch33['monto_nuevo']; else echo "";?>" size="8"/>

</TD>
</tr>
</table>

<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr align="right">
<td align="right">
<?btn('cancel',"expediente_list.php?cedula=$cedula",0); ?>
</td>
<td align="left">
<?btn('ok',"confirmar2('Seguro desea registrar estos datos?');",2); ?>
<input type="hidden" name="opcion" id="opcion"/>
</td>
</tr>
</table>


<?
cerrar_conexion($conexion);
?>


</FORM>
</BODY>
</html>