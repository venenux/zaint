<?php 
session_start();
ob_start();
$bd=$_SESSION['bd'];
?>
<?
//cerrar la nomina

require_once '../lib/common.php';

$selectra=new bd($bd);


//generar netos
$consulta="select * from nompersonal where ficha in (select distinct(ficha) from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom = '".$_GET['codigo_nomina']."')";
$resultado=$selectra->query($consulta);
while($fila=$resultado->fetch_assoc())
{
	$consulta="select * from nom_movimientos_nomina where ficha='".$fila['ficha']."' and codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado_mov=$selectra->query($consulta);
	
	$consulta = "UPDATE nompersonal SET estado = 'Inactivo' WHERE ficha = '".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado_inac=$selectra->query($consulta);
	$asignaciones=0;
	$deducciones=0;
	
	if($resultado_mov->num_rows!=0){
		while($fila_mov=$resultado_mov->fetch_assoc()){
			if($fila_mov['tipcon']=="A"){
				$asignaciones+=$fila_mov['monto'];
			}elseif($fila_mov['tipcon']=="D"){
				$deducciones+=$fila_mov['monto'];
			}	
		}	
		$neto=$asignaciones-$deducciones;
		
		if($neto!=0){
			$sentencia="insert into nom_nomina_netos (codnom,tipnom,ficha,cedula,cta_ban,neto) values ('".$_GET['codigo_nomina']."','".$_SESSION['codigo_nomina']."','".$fila['ficha']."','".$fila['cedula']."','".$fila['cuentacob']."','".$neto."')";
			
			$insercion=$selectra->query($sentencia);
		}
	}
}

$consulta="update nom_nominas_pago set status='C' where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);
?>