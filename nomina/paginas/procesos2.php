<?php 
session_start();
ob_start();
//$termino=$_SESSION['termino'];
include ("../header.php");
include("../lib/common.php");
//include("func_bd.php");
$conexion=conexion();
$opcion=$_GET['opcion'];
switch ($opcion)
{
	case '1':
		$ficha=$_GET['ficha'];
		$consulta = "SELECT apenom FROM nompersonal WHERE ficha='".$ficha."'";
		$resultado = query($consulta,$conexion);
		$fetch = fetch_array($resultado);
		if($fetch['apenom'])
			echo "<div id='nombre'><font color='green'>".$fetch['apenom']."</font><input type='hidden' id='val1' value='1'></div>";
		else
			echo "<div id='nombre'><font color='red'>CODIGO INCORRECTO... VERIFIQUE!!</font><input type='hidden' id='val1' value='0'></div>";
	break;

	case '2':
		$codcon=$_GET['concepto'];
		$consulta = "SELECT descrip FROM nomconceptos WHERE codcon='".$codcon."'";
		$resultado = query($consulta,$conexion);
		$fetch = fetch_array($resultado);
		if($fetch['descrip'])
			echo "<div id='concepto'><font color='green'>".$fetch['descrip']."</font><input type='hidden' id='val2' value='1'></div>";
		else
			echo "<div id='concepto'><font color='red'>CODIGO INCORRECTO... VERIFIQUE!!</font><input type='hidden' id='val2' value='0'></div>";
	break;
}		

?>
