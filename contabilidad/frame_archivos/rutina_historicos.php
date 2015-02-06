<?php
include("config_bd.php");

$con = "SELECT * FROM cwconcue";
$res = mysql_query($con, $conectar);

$Mes_num = array("01","02", "03", "04","05", "06","07", "08","09", "10","11","12");

$Mes_letra = array ("ENERO", "FEBRERO", "MARZO", "ABRIL",  "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
while($fila=mysql_fetch_array($res))
{
	for($j=0; $j<12; $j++)
	{
		$cons = "INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES (2012, '".$Mes_num[$j]."', '".$fila['Cuenta']."','".$Mes_letra[$j]."')";
		$resu = mysql_query($cons, $conectar);
	}
	//echo "guardando cuenta..";
}
?>
