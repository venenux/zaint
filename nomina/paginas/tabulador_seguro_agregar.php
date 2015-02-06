<?php
session_start();
ob_start();
?>
<?php 
$url="tabulador_seguro_agregar";
$modulo="Agregar condicion asegurado";
	
//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
require_once '../paginas/func_bd.php';
include ("../header.php");
$conexion=conexion();
//$codigo=$_GET['codigo'];
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
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?

if($_POST['opcion']==1)
{
	if($_POST['editar']!=1)
	{
		$consulta="INSERT INTO nomseguro VALUES ('','$_POST[desde]','$_POST[hasta]','$_POST[monto]')";
		$resultado=query($consulta,$conexion);
	}
	else
	{
		$consulta="UPDATE nomseguro set desde_seg='$_POST[desde]', hasta_seg='$_POST[hasta]', monto_seg='$_POST[monto]' where id_seguro='$_GET[id_seguro]'";
		$resultado=query($consulta,$conexion);
	}
	activar_pagina("tabulador_seguro_list.php");
}

$editar="";
if(isset($_GET['id_seguro']))
{
	$modulo="Editar registro de Tabulador";
	$consulta="SELECT * FROM nomseguro WHERE id_seguro=$_GET[id_seguro]";
	$resultado=query($consulta,$conexion);
	$fetch=fetch_array($resultado);
	$editar=1;
}
//<?php echo $_SERVER['PHP_SELF']; 
?>


<FORM name="formulario1" id="formulario1" action="" method="POST">
<?
titulo_mejorada($modulo,"","","");
?>

<table width="20%" border="0" class="ewTable" align="center">
<BR>

<TR class="ewTableRow">
<TD height="50" >
	<input type="hidden" name="editar" id="editar" value="<? echo $editar;?>">
	<input type="hidden" name="seguro" id="seguro" value="<? echo $_GET['id_seguro'];?>" colspan=2>
<strong>Desde(A&ntilde;os):</strong>
</td>
<td>
<input type="text" name="desde" id="desde" maxlength="2" size="10" value="<? echo $fetch['desde_seg']?>"/>

</td>
<TR height="50" class="tb-fila" >
<TD  >
<strong>Hasta (A&ntilde;os):</strong>
</td>
<td>
<input type="text" name="hasta" id="hasta" maxlength="2" size="10" value="<? echo $fetch['hasta_seg']?>"/>

</td>
</tr>
<tr height="50" class="ewTableRow">
<TD>
<strong>Monto (Bs.):</strong>
</td>
<td><input type="text" name="monto" id="monto" maxlength="7" size="10" value="<? echo $fetch['monto_seg']?>"/>

</td>
</TR>
</table>
<table align="center" width="100%" border="0">
<TR><TD>
<div id="registro">
</div>
</TD></TR>
</table>
<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr align="right">
<td align="right">
<?btn('cancel',"tabulador_seguro_list.php",0); ?>
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