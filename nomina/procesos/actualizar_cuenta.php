<?php
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../header.php";


$conexion=conexion();

$consulta="SELECT ficha,cuentacob from nompersonal ";
$result=query($consulta,$conexion);

$cantidad=0;
while($fila=fetch_array($result)){
	
	$update="update nom_nomina_netos set cta_ban='".$fila['cuentacob']."' where ficha='".$fila['ficha']."'";
	$result_up=query($update,$conexion);
	$cantidad++;
}
echo $cantidad;


?>
