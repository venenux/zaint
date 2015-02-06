<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>

<?
include("../header.php");
include("../lib/common.php");
include("func_bd.php");


$conexion=conexion();
$consulta = "SELECT ficha, tipnom, fecing FROM nompersonal";
//$consulta = "SELECT ficha, tipnom, estado, suesal, codcargo FROM nompersonal";
$resultado = query($consulta,$conexion);

while($fetch = fetch_array($resultado))
{
	echo "<br/>";
	
	echo $consulta = "UPDATE nompersonal SET fecing=trim('".$fetch['fecing']."') WHERE ficha=".$fetch['ficha']." and tipnom=".$fetch['tipnom'].";";
	//$resultado1 = query($consulta,$conexion);
}

?>
