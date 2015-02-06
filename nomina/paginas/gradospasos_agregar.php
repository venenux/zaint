<?php
session_start();
ob_start();
?>
<?php 
$url="gradospasos_agregar";
$modulo="Agregar registro de Grados y Pasos";
	
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
		$consulta="INSERT INTO nomgradospasos VALUES ('$_POST[grado]','$_POST[p1]','$_POST[p2]','$_POST[p3]','$_POST[p4]','$_POST[p5]','$_POST[p6]','$_POST[p7]','$_POST[p8]','$_POST[p9]','$_POST[p10]','$_POST[p11]','$_POST[p12]','$_POST[p13]','$_POST[p14]','$_POST[p15]')";
		$resultado=query($consulta,$conexion);
	}
	else
	{
		$consulta="UPDATE nomgradospasos set grado='$_POST[grado]', p1='$_POST[p1]', p2='$_POST[p2]', p3='$_POST[p3]', p4='$_POST[p4]', p5='$_POST[p5]', p6='$_POST[p6]', p7='$_POST[p7]', p8='$_POST[p8]', p9='$_POST[p9]', p10='$_POST[p10]', p11='$_POST[p11]', p12='$_POST[p12]', p13='$_POST[p13]', p14='$_POST[p14]', p15='$_POST[p15]' WHERE grado='$_POST[gradoi]'";
		$resultado=query($consulta,$conexion);
	}
	activar_pagina("gradospasos_list.php");
}

$editar="";
if(isset($_GET['grado']))
{
	$modulo="Editar registro de Grados y Pasos";
	$consulta="SELECT * FROM nomgradospasos WHERE grado=$_GET[grado]";
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

<table width="100%" border="0">
<BR>

<TR>
<TD height="50" width="20">
<input type="hidden" name="editar" id="editar" value="<? echo $editar;?>">
<input type="hidden" name="gradoi" id="gradoi" value="<? echo $_GET['grado'];?>">
Grado:&nbsp;&nbsp;<input type="text" name="grado" id="grado" maxlength="2" size="3" value="<? echo $fetch['grado']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 1:&nbsp;&nbsp;<input type="text" name="p1" id="p1" maxlength="13" size="13" value="<? echo $fetch['p1']?>"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 2:&nbsp;&nbsp;<input type="text" name="p2" id="p2" maxlength="7" size="7" value="<? echo $fetch['p2']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 3:&nbsp;&nbsp;<input type="text" name="p3" id="p3" maxlength="7" size="7" value="<? echo $fetch['p3']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 4:&nbsp;&nbsp;<input type="text" name="p4" id="p4" maxlength="7" size="7" value="<? echo $fetch['p4']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 5:&nbsp;&nbsp;<input type="text" name="p5" id="p5" maxlength="7" size="7" value="<? echo $fetch['p5']?>"/>
</td>
<TR height="50">
<TD width="40">
Paso 6:&nbsp;&nbsp;<input type="text" name="p6" id="p6" maxlength="7" size="7" value="<? echo $fetch['p6']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 7:&nbsp;&nbsp;<input type="text" name="p7" id="p7" maxlength="7" size="7" value="<? echo $fetch['p7']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 8:&nbsp;&nbsp;<input type="text" name="p8" id="p8" maxlength="7" size="7" value="<? echo $fetch['p8']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 9:&nbsp;&nbsp;<input type="text" name="p9" id="p9" maxlength="7" size="7" value="<? echo $fetch['p9']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 10:&nbsp;&nbsp;<input type="text" name="p10" id="p10" maxlength="7" size="7" value="<? echo $fetch['p10']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 11:&nbsp;&nbsp;<input type="text" name="p11" id="p11" maxlength="7" size="7" value="<? echo $fetch['p11']?>"/>
</td>
</tr>
<tr height="50">
<TD>
Paso 12:&nbsp;&nbsp;<input type="text" name="p12" id="p12" maxlength="7" size="7" value="<? echo $fetch['p12']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 13:&nbsp;&nbsp;<input type="text" name="p13" id="p13" maxlength="7" size="7" value="<? echo $fetch['p13']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 14:&nbsp;&nbsp;<input type="text" name="p14" id="p14" maxlength="7" size="7" value="<? echo $fetch['p14']?>"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Paso 15:&nbsp;&nbsp;<input type="text" name="p15" id="p15" maxlength="7" size="7" value="<? echo $fetch['p15']?>"/>
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
<?btn('cancel',"gradospasos_list.php",0); ?>
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