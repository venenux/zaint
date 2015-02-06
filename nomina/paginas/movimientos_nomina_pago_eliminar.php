<?php 
session_start();
ob_start();
?>
<?
require_once "../lib/common.php";
$conexion=conexion();
$ficha=$_GET['ficha'];
$concepto=$_GET['concepto'];
$nombre_nomina=$_GET['nomina'];
$pagina=$_GET['pagina'];
$todo=$_GET['todo'];
if($todo==1)
{
	$consulta="delete from nom_movimientos_nomina where ficha='$ficha' and codnom='$nombre_nomina' and tipnom='".$_SESSION['codigo_nomina']."'";
}
else
{
	$consulta="delete from nom_movimientos_nomina where ficha='$ficha' and codcon='$concepto' and codnom='$nombre_nomina' and tipnom='".$_SESSION['codigo_nomina']."'";
}
$resultado=query($consulta,$conexion);
header("Location: movimientos_nomina_pago.php?codigo_nomina=".$nombre_nomina."&flag=1&ficha=".$ficha."&tipo=exacta&palabra=exacta&busqueda=ficha&codt=".$_SESSION['codigo_nomina']."&des=".$ficha);
?>
