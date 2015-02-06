<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

include ("../header.php");
include("../lib/common.php");
include("func_bd.php");	

$conexion=conexion();

$consulta="select * from zona";
$resultado=query($consulta,$conexion);

while($fetch=fetch_array($resultado))
{
	$consulta="update nompersonal set codnivel5='$fetch[zona]' where ficha='$fetch[ficha]'";
	$resultado2=query($consulta,$conexion);
	echo $fetch[ficha].'  '.$fetch[zona].'<br>';
}


?>

