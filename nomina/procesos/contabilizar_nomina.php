<?php 
session_start();
ob_start();
?>
<?
require_once "../lib/common.php";
include("../header.php");
$url="contabilizar_nomina";
$conexion=conexion();
$nomina=$_GET['codigo_nomina'];

$cuenta=$_GET['cod_banco'];
$query333="SELECT Descrip FROM cwconcue WHERE Cuenta='$cuenta'";
$resultado333=query($query333,$conexion);
$fetch_ctacon=fetch_array($resultado333);


$consulta="select * from cwconemp";
$resultado=query($consulta,$conexion);
$fila=fetch_array($resultado);
$ultimo_comprobante=$fila['Numcom']+1;
$resulatdo2=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexion);

$result_upt=query("UPDATE nom_nominas_pago SET contabilizada=1 WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina]",$conexion);


$consulta_nomina="select * from nom_nominas_pago where codnom=$nomina and tipnom=$_SESSION[codigo_nomina]";
$resultado_nomina=query($consulta_nomina,$conexion);
$fila_nomina=fetch_array($resultado_nomina);
	
$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','900','".$fila_nomina['fechapago']."','Contabilizacion de Nomina ".$fila_nomina['descrip']."','1')";
$resultado=query($consulta,$conexion);

$consulta="SELECT codorg,descrip FROM nomnivel4";
$result_ger=query($consulta,$conexion);
$i=1;
$total_asig=0;
while($fetch_ger=fetch_array($result_ger))
{

	$consulta="SELECT DISTINCT(codcon) FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom='$_SESSION[codigo_nomina]' AND codnivel4='$fetch_ger[codorg]' AND tipcon='A' AND (codcon<>4029 or codcon<>2508) ";
	$result_con=query($consulta,$conexion);
	
	
	while($fetch_con=fetch_array($result_con))
	{
		$consulta="SELECT SUM(monto) as suma FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom='$_SESSION[codigo_nomina]' AND codcon=".$fetch_con['codcon']." AND tipcon='A' AND codnivel4='$fetch_ger[codorg]' ";
		$result_suma=query($consulta,$conexion);
		$fetch_suma=fetch_array($result_suma);
		
		$consulta="SELECT ctacon FROM nomconceptos_ctager WHERE codcon=".$fetch_con['codcon']." AND codnivel4='$fetch_ger[codorg]'";
		$result_cta=query($consulta,$conexion);
		$fetch_cta=fetch_array($result_cta);
			
		$consulta="SELECT descrip FROM nomconceptos WHERE codcon=$fetch_con[codcon]";
		$result_descon=query($consulta,$conexion);
		$fetch_descon=fetch_array($result_descon);
		//$descripcion=$descripcion." ".$fila_cheque['concepto'];
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".date("Y-m-d")."','".$fetch_cta['ctacon']."','".$fetch_ger['codorg']."','NO','".$fetch_descon['descrip']."','".$fetch_suma['suma']."','','".$i."','".date("Y-m-d")."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$i++;
		$total_asig+=$fetch_suma['suma'];
	}
}

$consulta="SELECT DISTINCT(codcon) FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom='$_SESSION[codigo_nomina]' AND tipcon='D' ORDER BY tipcon";
$result_cond=query($consulta,$conexion);

$total_deduc;
while($fetch_cond=fetch_array($result_cond))
{
	$consulta="SELECT SUM(monto) as suma FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom='$_SESSION[codigo_nomina]' AND codcon=".$fetch_cond['codcon']." ";
	$result_suma2=query($consulta,$conexion);
	$fetch_suma2=fetch_array($result_suma2);
		
	$consulta="SELECT ctacon FROM nomconceptos_ctager WHERE codcon=".$fetch_cond['codcon']." AND codnivel4='101'";
	$result_cta2=query($consulta,$conexion);
	$fetch_cta2=fetch_array($result_cta2);
			
	$consulta="SELECT descrip FROM nomconceptos WHERE codcon=$fetch_cond[codcon]";
	$result_descon2=query($consulta,$conexion);
	$fetch_descon2=fetch_array($result_descon2);
		//$descripcion=$descripcion." ".$fila_cheque['concepto'];
	$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".date("Y-m-d")."','".$fetch_cta2['ctacon']."','','NO','".$fetch_descon2['descrip']."','','".$fetch_suma2['suma']."','".$i."','".date("Y-m-d")."')";
	$resultado_cwcondco=query($consulta_cwcondco,$conexion);
	$i++;
	$total_deduc+=$fetch_suma2['suma'];
}
$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".date("Y-m-d")."','".$cuenta."','','NO','".$fetch_ctacon['Descrip']."','','".($total_asig-$total_deduc)."','".$i."','".date("Y-m-d")."')";
$resultado_cwcondco33=query($consulta_cwcondco,$conexion);

cerrar_conexion($conexion);
echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
alert(\"NOMINA CONTABILIZADA\")
parent.cont.location.href=\"../paginas/menu_procesos.php\"
</SCRIPT>";