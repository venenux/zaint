<?php 
session_start();
ob_start();
?>
<?php 
$url="aumento_agregar";
$modulo="Agregar aumento";
//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
require_once 'func_bd.php';
include ("../header.php");
$conexion=conexion();
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

<?

if($_POST['opcion']==1)
{
	if($_POST['ejecutar']==1)
		$estatus="Ejecutado";
	else
		$estatus="Pendiente";
	if($_POST['editar']!=1)
	{
		$consulta="INSERT INTO nomaumentos_det VALUES ('','$_POST[tipo_aumento]', '$estatus', '".date("Y-m-d")."', '".fecha_sql($_POST['fecha_aplica'])."', $_POST[monto], '$_POST[nomina]', '$_POST[categoria]', '$_POST[cargo]', '$_POST[ficha]', '$_SESSION[nombre]', '$_POST[descripcion]')";
		$resultado=query($consulta,$conexion);
	}
	else
	{
		$consulta="UPDATE nomaumentos_det SET tipo='$_POST[tipo_aumento]', estatus='$estatus', fecha='".date("Y-m-d")."', fecha_aplica='".fecha_sql($_POST['fecha_aplica'])."', monto=$_POST[monto], cod_nomina='$_POST[nomina]', cod_categoria='$_POST[categoria]', cod_cargo='$_POST[cargo]', ficha='$_POST[ficha]', usuario='$_SESSION[nombre]', descripcion='$_POST[descripcion]'";
		$resultado=query($consulta,$conexion);
	}
	if($_POST['nomina']!='')
	{
		if($_POST['nomina']=="Todas")
			$condicion="";
		else
			$condicion=" tipnom=$_POST[nomina]";
	}
	if($_POST['categoria']!='')
	{
		if($_POST['categoria']=="Todas")
			$condicion="";
		else
		{
			if($condicion!='')
				$condicion.=" AND codcat='$_POST[categoria]'";
			else
				$condicion="codcat='$_POST[categoria]'";
		}
	}
	if($_POST['cargo']!='')
	{
		if($_POST['cargo']=="Todas")
			$condicion="";
		else
		{
			if($condicion!='')
				$condicion.=" AND codcargo='$_POST[cargo]'";
			else
				$condicion="codcargo='$_POST[cargo]'";
		}
	}
	if($_POST['ficha']!='')
	{
		if($condicion=='')
			$condicion="ficha=$_POST[ficha]";
		else
			$condicion.=" AND ficha='$_POST[ficha]'";
	}
	if($condicion!='')
		$condicion=" WHERE ".$condicion;
	$consulta="SELECT * FROM nompersonal ".$condicion;
	$resultado2=query($consulta,$conexion);
	
	while($fetch=fetch_array($resultado2))
	{
		if($_POST['tipo_aumento']=="Porcentaje")
			$sueldo=$fetch['suesal']+($fetch['suesal']*$_POST['monto'])/100;
		elseif($_POST['tipo_aumento']=="Monto")
			$sueldo=$fetch['suesal']+$_POST['monto'];

		if($_POST['ejecutar']==1)
		{
			$consulta="UPDATE nompersonal SET suesal='$sueldo' WHERE tipnom=$fetch[tipnom] AND ficha=$fetch[ficha] AND cedula=$fetch[cedula]";
			$resultado3=query($consulta,$conexion);

			$consulta="INSERT INTO nomexpediente SET cedula=$fetch[cedula], tipo_registro='Logros', tipo_tiporegistro=1, descripcion='$_POST[descripcion]', monto='$fetch[suesal]', monto_nuevo='$sueldo', fecha_retorno='".fecha_sql($_POST['fecha_aplica'])."', fecha='".date("Y-m-d")."', usuario='$_SESSION[nombre]'";
			$resultado5=query($consulta,$conexion);
		}
		else
		{
			$consulta="UPDATE nompersonal SET sueldopro='$sueldo' WHERE tipnom=$fetch[tipnom] AND ficha=$fetch[ficha] AND cedula=$fetch[cedula]";
			$resultado3=query($consulta,$conexion);
		}
		
	}

	activar_pagina("aumento_list.php");
	
}
$editar="";
if(isset($_GET['cod_modificar']))
{
	$consulta="SELECT * FROM nomaumentos_det WHERE cod_aumento=$_GET[cod_modificar]";
	$resultado=query($consulta,$conexion);
	$fetch33=fetch_array($resultado);
	$editar=1;
}
?>





<FORM name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo_mejorada($modulo,"","","");
?>

<table width="100%" border="0">
<BR>
<tr>
<TD height="25" class="tb-head" align="left"><strong> DATOS DEL AUMENTO </strong>
<input type="hidden" name="editar" id="editar" value="<? echo $editar;?>">
<input type="hidden" name="codigo" id="codigo" value="<? echo $_GET['cod_modificar'];?>">
</TD>
</tr>

<TR>
<TD height="50">Tipo de aumento:
<select name="tipo_aumento" id="tipo_aumento">
<option <?if($fetch33['tipo']=="Porcentaje")echo "selected='true'"?> value="Porcentaje">Porcentaje</option>
<option <?if($fetch33['tipo']=="Porcentaje")echo "selected='true'"?> value="Monto">Monto</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto:
<input name="monto" id="monto" size="8" align="right" value="<? if(isset($fetch33['monto'])) echo $fetch33['monto']; else echo "0.00";?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Aplicacion:
<input size="10" type="text" name="fecha_aplica" id="fecha_aplica" value="<?if(isset($fetch33['fecha_aplica'])) echo fecha($fetch33['fecha_aplica']); else echo date("d/m/Y");?>">
<a>
<input name="image2" type="image" id="d_fechainicio" src="lib/jscalendar/cal.gif"/>
<script type="text/javascript">
Calendar.setup({inputField:"fecha_aplica",ifFormat:"%d/%m/%Y",button:"d_fechainicio"})
</script>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicar al aceptar?: <select name="ejecutar" id="ejecutar">
<option value="1">Si</option>
<option <?if(isset($fetch33['estatus'])) echo "selected='true'"?> value="0">No</option>
</select>

</TD>
</tr>

<tr>
<TD height="25" class="tb-head" align="left"><strong> APLICA A </strong>
</TD>
</tr>

<TR height="50">
<TD colspan="2">Descripcion: <input type="text" name="descripcion" id="descripcion" <? if (isset($fetch33['descripcion'])) echo "value='$fetch33[descripcion]'"?> size="70"/>
</TD>
</TR>

<tr height="50">
<TD>Nomina: 
<select name="nomina" id="nomina">
<option value="">Ninguna</option>
<?
$consulta="SELECT codtip, descrip FROM nomtipos_nomina";
$resultado=query($consulta,$conexion);
while($fetch=fetch_array($resultado))
{
	?>
	<option <?if($fetch33['cod_nomina']==$fetch['codtip']) echo "selected='true'" ?> value="<?echo $fetch['codtip']?>"><?echo $fetch['descrip']?></option>
	<?
}
?>
<option value="Todas">Todas</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categoria: 
<select name="categoria" id="categoria">
<option value="">Ninguna</option>
<?
$consulta="SELECT codorg, descrip FROM nomcategorias";
$resultado1=query($consulta,$conexion);
while($fetch1=fetch_array($resultado1))
{
	?>
	<option <?if($fetch33['cod_categoria']==$fetch1['codorg']) echo "selected='true'" ?>  value="<?echo $fetch1['codorg']?>"><?echo $fetch1['descrip']?></option>
	<?
}
?>
<option value="Todas">Todas</option>
</select>
</TD>

</tr>

<tr height="50">
<TD colspan="2">Cargo: 
<select name="cargo" id="cargo">
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ficha: <input type="text" name="ficha" id="ficha" value="<? if(isset($fetch33['ficha'])) echo $fetch33['ficha']; else echo "";?>" size="8"/>
</TD>
</tr>
</table>

<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr align="right">
<td align="right">
<?btn('cancel',"aumento_list.php",0); ?>
</td>
<td align="left">
<?btn('ok',"confirmar2('Seguro desea realizar este aumento?');",2); ?>
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