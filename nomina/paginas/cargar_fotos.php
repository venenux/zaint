<?php 
session_start();
ob_start();
//$termino=$_SESSION['termino'];
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");
?>

<?
$consulta="SELECT cedula FROM nompersonal";
$resultado_per=sql_ejecutar($consulta);
while($fetch_per=fetch_array($resultado_per))
{
	$foto_dir = "fotos/".$fetch_per['cedula'].".JPG";
	$consulta_fec="UPDATE nompersonal SET foto='".$foto_dir."' WHERE cedula=".$fetch_per['cedula']."";
	$resultado_fec = sql_ejecutar($consulta_fec);
}
?>