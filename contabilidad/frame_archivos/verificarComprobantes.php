<?
require_once "lib/common.php";
include("header.php");
$conexion=conexion();
$consulta="select Fecha,Numcom from cwconhco where year(Fecha)=2009";
$resultado=query($consulta,$conexion);
while ($fila=fetch_array($resultado))
{
	//echo $fila[Numcom]."<br>";
	
	$consulta2="select SUM(Debito) as deb, SUM(Credito) as cred from cwcondco where Numcom=".$fila['Numcom'];
	$resultado2=query($consulta2,$conexion);
	$fila2=fetch_array($resultado2);
	if($fila2[deb]!=$fila2[cred])
		echo "COMPROBANTE ".$fila[Numcom]." DESCUADRADO VERIFIQUE <br>";
	else
		echo "COMPROBANTE ---> ".$fila[Numcom]."--->BIEN <br>";
	/*
	while ($fila2=fetch_array($resultado2))
	{
	$update="update cwcondco set Fecha='".$fila['Fecha']."' where Numcom=".$fila['Numcom'];
	$resultado3=query($update,$conexion);
	echo $update."<br>";
	}
	*/
}
?>
