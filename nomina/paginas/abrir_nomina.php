<?php 
session_start();
ob_start();
$bd=$_SESSION['bd'];
?>
<?
//cerrar la nomina

require_once '../lib/common.php';

$selectra=new bd($bd);



$consulta33="SELECT * FROM nom_nominas_pago WHERE codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado33=$selectra->query($consulta33);
$fetch33=$resultado33->fetch_assoc();

$consulta3="update nomperiodos set status='Abierto' WHERE nper=$fetch33[periodo] AND anio=$fetch33[anio] AND codfre=$fetch33[frecuencia]";
$resultado333=$selectra->query($consulta3);

$consulta="update nom_nominas_pago set status='A' where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);

$consulta="delete from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);

$consulta="delete from nomacumulados_det where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);

$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);
while($fila=$resultado->fetch_assoc())
{
	$consulta="select * from nom_movimientos_nomina where ficha='".$fila['ficha']."' and codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
	
	$resultado_mov=$selectra->query($consulta);
	$asignaciones=0;
	$deducciones=0;
	
	if($resultado_mov->num_rows!=0)
	{
		while($fila_mov=$resultado_mov->fetch_assoc())
		{
			if($fila_mov['codcon']==610)
			{
				$consulta_upd="UPDATE nompersonal SET estado='Vacaciones' WHERE ficha='".$fila['ficha']."' and tipnom=".$_SESSION['codigo_nomina']."";
				$resultado_upd=$selectra->query($consulta_upd);
			}
			if($fila_mov['codcon']==1432)
			{
				$consulta_upd="UPDATE nompersonal SET estado='Activo' WHERE ficha='".$fila['ficha']."' and tipnom=".$_SESSION['codigo_nomina']."";
				$resultado_upd=$selectra->query($consulta_upd);
			}
			if(($fila_mov['codcon']==2007)||($fila_mov['codcon']==2023))
			{
				$consulta_upd="UPDATE nomprestamos_detalles SET estadopre='Pendiente' WHERE ficha='".$fila['ficha']."' and codnom=".$_SESSION['codigo_nomina']." and estadopre='Cancelada' and fechaven between '$fetch33[periodo_ini]' and '$fetch33[periodo_fin]' and ee<>1";
				$resultado_upd=$selectra->query($consulta_upd);
			}
		}	
	}
}

?>
