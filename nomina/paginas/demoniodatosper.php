<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

include ("../header.php");
include("../lib/common.php");
include("func_bd.php");	

$conexion=conexion();

$consulta="select * from datosper";
$resultado=query($consulta,$conexion);

while($fetch=fetch_array($resultado))
{
	$consulta="update nompersonal set codnivel4='$fetch[codnivel4]', estado='$fetch[estado]', fecing='$fetch[fecing]' where ficha='$fetch[ficha]'";
	$resultado2=query($consulta,$conexion);
	echo $fetch[ficha].'  '.$fetch[codnivel4].'<br>';
}


?>

