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

//generar netos
$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);

while($fila=$resultado->fetch_assoc()){
	$consulta="select * from nom_movimientos_nomina where ficha='".$fila['ficha']."' and codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
	
	$resultado_mov=$selectra->query($consulta);
	$asignaciones=0;
	$deducciones=0;
	
	if($resultado_mov->num_rows!=0)
	{
		while($fila_mov=$resultado_mov->fetch_assoc())
		{
			if($fila_mov['tipcon']=="A")
			{
				$asignaciones+=$fila_mov['monto'];
			}
			elseif($fila_mov['tipcon']=="D")
			{
				$deducciones+=$fila_mov['monto'];
			}
			if(($fila_mov['codcon']==515)||($fila_mov['codcon']==1014))
			{
				$consulta_upd="UPDATE nompersonal SET estado='Activo' WHERE ficha='".$fila['ficha']."' and tipnom=".$_SESSION['codigo_nomina']."";
				$resultado_upd=$selectra->query($consulta_upd);
			}
			if(($fila_mov['codcon']==1465)||($fila_mov['codcon']==1463))
			{
				$consulta_upd="UPDATE nompersonal SET estado='Vacaciones' WHERE ficha='".$fila['ficha']."' and tipnom=".$_SESSION['codigo_nomina']."";
				$resultado_upd=$selectra->query($consulta_upd);
			}
			if(($fila_mov['codcon']==2007)||($fila_mov['codcon']==2023))
			{
				$consulta_upd="UPDATE nomprestamos_detalles SET estadopre='Cancelada' WHERE ficha='".$fila['ficha']."' and codnom=".$_SESSION['codigo_nomina']." and estadopre='Pendiente' and fechaven between '$fetch33[periodo_ini]' and '$fetch33[periodo_fin]'";
				$resultado_upd=$selectra->query($consulta_upd);
			}

			if(($fila_mov['codcon']==29))
			{
				$consulta_upd="UPDATE nom_progvacaciones SET estado='Pagada' WHERE ficha='".$fila['ficha']."' and ceduda=".$fila['cedula']."  and (tipooper='DB' or tipooper='DI') and periodo=year('$fetch33[periodo_ini]')";
				$resultado_upd=$selectra->query($consulta_upd);
			}

			$consulta_acum="SELECT cod_tac,operacion FROM nomconceptos_acumulados WHERE codcon='".$fila_mov['codcon']."'";
			$resultado_acum=$selectra->query($consulta_acum);
		
			while($fetch=$resultado_acum->fetch_assoc())
			{
				
				$consulta_isr_acum="INSERT INTO nomacumulados_det (ficha,ceduda,anioa,mesa,fecha,cod_tac,montototal,codcon,codnom,tipnom,operacion,refer) VALUES ('".$fila['ficha']."', '".$fila['cedula']."', '".$fetch33['anio']."', '".$fetch33['mes']."', '".date('Y-m-d')."', '".$fetch['cod_tac']."', '".$fila_mov['monto']."', '".$fila_mov['codcon']."', '".$_GET['codigo_nomina']."', '".$_SESSION['codigo_nomina']."', '".$fetch['operacion']."','".$fila_mov['valor']."') ";
				$result_isracum=$selectra->query($consulta_isr_acum);
			}
		}	
		$neto=$asignaciones-$deducciones;
		if($neto!=0)
		{
			$sentencia="insert into nom_nomina_netos (codnom,tipnom,ficha,cedula,cta_ban,neto) values ('".$_GET['codigo_nomina']."','".$_SESSION['codigo_nomina']."','".$fila['ficha']."','".$fila['cedula']."','".$fila['cuentacob']."','".$neto."')";
			$insercion=$selectra->query($sentencia);
		}
		
		
		
	}
}

$consulta2="SELECT periodo,anio,frecuencia FROM nom_nominas_pago WHERE codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado33=$selectra->query($consulta2);
$fetch333=$resultado33->fetch_assoc();

$consulta3="update nomperiodos set status='Cerrado' WHERE nper=$fetch333[periodo] AND anio=$fetch333[anio] AND codfre=$fetch333[frecuencia]";
$resultado333=$selectra->query($consulta3);

$consulta="update nom_nominas_pago set status='C' where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$selectra->query($consulta);


?>
