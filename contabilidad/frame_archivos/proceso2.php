<?php

require_once 'lib/common.php';
//include ("header.php");
$conexion=conexion();
//echo $conexion;

if($_GET['opcion']==1)
{
	$consulta = "SELECT Descrip FROM cwconcue WHERE Cuenta='".$_GET['cuenta']."' ";
	$resultado = query($consulta,$conexion);
	$fetch = fetch_array($resultado);
	$descrip=$fetch['Descrip'];
	?>
	<!--<div id="nombrec"><TD></td></div>-->
	<table align="left" width="" border="0" >
	<tr>
	<TD><INPUT type="text" size="50" readonly="true" name="nombrec" id="nombrec" value="<?echo $descrip;?>"></td>
	</tr></table>
	<?
}
?>