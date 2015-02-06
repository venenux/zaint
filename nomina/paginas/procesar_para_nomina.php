<?php
session_start();
ob_start();
?>
<?php
require_once '../lib/config.php';
require_once '../lib/common.php';
include ("../header.php");
include ("func_bd.php");
$conexion=conexion();

#$datos="select * from control_acceso where cod_enca=".$_GET['reg'];
$datos="select * from control_acceso ca inner join control_encabezado ce on ca.cod_enca=ce.cod_enca where ce.cod_enca={$_GET['reg']} and fecha_ini LIKE '{$_GET['fecha_ini']}' and fecha_fin LIKE '{$_GET['fecha_fin']}'";
$rs = query($datos,$conexion);

$vaciar="TRUNCATE TABLE procesar";
$query=query($vaciar,$conexion);

while($fila=mysql_fetch_array($rs)){
	$cantidad=0;

	if(($fila[4]=='B001') || ($fila[4]=='E002') ){
		$tiempo=explode(':',$fila[5]);
		$cantidad=$tiempo[0]*60;
		$cantidad+=$tiempo[1];
	}else{
		$cantidad=$fila[5]*1;
	}


	$cedula=$fila[2]*1;
	if($cedula!='ninguno'|| $cedula!=0){
		$insert="insert into procesar values ('".$fila[4]."','".$cantidad."','".$cedula."','')";
		$guardar = query($insert,$conexion);
	}

	header("Location:control_acceso.php?listo=1");
}
?>

