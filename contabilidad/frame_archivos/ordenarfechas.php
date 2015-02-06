<?
require_once "lib/common.php";
include("header.php");
$conexion=conexion();
$consulta="select Fecha,Numcom from cwconhco";
$resultado=query($consulta,$conexion);
while ($fila=fetch_array($resultado))
{
	$consulta2="select Numcom, Fecha, FechaD from cwcondco where Numcom=".$fila['Numcom'];
	$resultado2=query($consulta2,$conexion);
	while ($fila2=fetch_array($resultado2))
	{
	$update="update cwcondco set Fecha='".$fila['Fecha']."' where Numcom=".$fila['Numcom'];
	$resultado3=query($update,$conexion);
	echo $update."<br>";
	}
}
?>