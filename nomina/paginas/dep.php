<?php 
session_start();
ob_start();
?>
<?
require_once '../lib/common.php';
//require_once 'funciones_nomina.php';
include ("../header.php");

$conexion=conexion();

$consulta="SELECT * FROM dep_tmp";
$resultado=query($consulta,$conexion);
$i=0;
while($fetch=fetch_array($resultado))
{
	$consulta="UPDATE nompersonal SET  codcargo=$fetch[dep] where ficha=$fetch[ficha]";
	$resultado2=query($consulta,$conexion);
	echo $i++;
	echo "<br>";
}
?>
