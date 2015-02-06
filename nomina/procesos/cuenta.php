<?php
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../header.php";


$conexion=conexion();

$consulta="SELECT cuenta.cuenta,cuenta.cedula from cuenta inner join nompersonal on nompersonal.cedula=cuenta.cedula";
$result=query($consulta,$conexion);

$cantidad=0;
while($fila=fetch_array($result)){
	$cuenta_final=str_replace("-","",$fila["cuenta"]);
	$update="update nompersonal set cuentacob='1105".$cuenta_final."' where cedula='".$fila['cedula']."'";
	$result_up=query($update,$conexion);
	$cantidad++;
}
echo $cantidad;


?>
