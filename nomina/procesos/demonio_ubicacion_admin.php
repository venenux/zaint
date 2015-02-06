<?php 
session_start();
ob_start();
?>
<?
include "../lib/common.php";
$conexion=conexion();

$consulta="SELECT * FROM nompersonal";
$result=query($consulta,$conexion);

while($fetch=fetch_array($result))
{
	$consulta="UPDATE nom_movimientos_nomina SET codnivel1='$fetch[codnivel1]', codnivel2='$fetch[codnivel2]', codnivel3='$fetch[codnivel3]', codnivel4='$fetch[codnivel4]', codnivel5='$fetch[codnivel5]', codnivel6='$fetch[codnivel6]', codnivel7='$fetch[codnivel7]' WHERE ficha=$fetch[ficha] AND tipnom=3";
	$result2=query($consulta,$conexion);
}
?>