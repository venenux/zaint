<?php
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../header.php";


$conexion=conexion();

$consulta_="select * from nom_nominas_pago";
$result_=query($consulta_,$conexion);
$i=1;
while($fila_=fetch_array($result_)){
	$consulta="SELECT * from nompersonal order by ficha";
	$result=query($consulta,$conexion);
	$conexion=conexion();
	while($fila=fetch_array($result)){
		$insert="insert into nom_movimientos_historico values ('$i','$fila_[codnom]','".$fila_['tipnom']."','$fila[codnivel1]','$fila[codnivel2]','$fila[codnivel3]','$fila[codnivel4]','$fila[codnivel5]','$fila[codnivel6]','$fila[codnivel7]','$fila[ficha]','$fila[suesal]','$fila[codcargo]','$fila[estado]','$fila[cedula]')";
		$result_insert=query($insert,$conexion);;
		$i++;
	}
}

?>
