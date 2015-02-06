<?php
	
	require_once 'lib/common.php';
	include('header.php');
	$conexion = conexion();
	
	$fd = $_GET['fechaD'];
	
	function actualizaractivo($codigo,$saldo,$dprmensual,$dpracum,$costo,$conexion)
	{
		$estado = "Activo";
		if($saldo < $dprmensual)
		{
			$dpracum += $saldo; 
		}
		elseif(($saldo - $dprmensual) <= 3)
		{
			$dpracum += $saldo;
		}
		else
		{
			$dpracum += $dprmensual;
		}
		if($dpracum >= $costo)
		{
			$dpracum = $costo;
			$estado = "Depreciado";
		}
		
		$consulta2 = "UPDATE activosfijos SET DPRACUM = '".$dpracum."', ESTADOAF = '".$estado."' WHERE CODACT = '".$codigo."'";
		$resultado3  = query($consulta2,$conexion);
	}
	
	
	function movimiento($codigo,$monto,$dpracum,$costo,$valresi,$conexion)
	{
		$saldo = $costo - $dpracum - $valresi;
		if($saldo < $monto)
		{
			$monmov = $saldo;
		}
		elseif(($saldo-$monto) <= 3)
		{
			$monmov = $saldo;
		}
		else
		{
			$monmov = $monto;
		}
		$consulta2 = "INSERT INTO activosfijos_movimientos (CODACT,TIPOMOV,FECMOV,MONMOV) VALUES ('".$codigo."','Depreciacion','".date("Y-m-d")."','".$monmov."')";
		$resultado2  = query($consulta2,$conexion);
		
		
		actualizaractivo($codigo,$saldo,$monto,$dpracum,$costo,$conexion);
	}
	
	
	$consulta1 = "SELECT CODACT, FECINIDPR, DPRMENSUAL, VIDAUTIL, DPRACUM, VALRESI, COSTOCOMPRA FROM activosfijos WHERE ESTADOAF = 'Activo' AND SEDEPRECIA = 'SI'";
	$resultado1 = query($consulta1,$conexion);	
	
	while($fetch1 = fetch_array($resultado1))
	{
		$fec1 = substr($fetch1['FECINIDPR'],0,4);
		$fec2 = substr($fetch1['FECINIDPR'],5,2);
		$fec3 = substr($fetch1['FECINIDPR'],8,2);
		
		$fecm = substr($fd,0,2);
		$feca = substr($fd,3,4);		
		
		$anos = $fec1 + $fetch1['VIDAUTIL'];
		
		if ($anos > $feca)
		{
			movimiento($fetch1['CODACT'],$fetch1['DPRMENSUAL'],$fetch1['DPRACUM'],$fetch1['COSTOCOMPRA'],$fetch1['VALRESI'],$conexion);
		}
		elseif ($anos == $feca)
		{
			if($fec2 >= $fecm)
			{
				movimiento($fetch1['CODACT'],$fetch1['DPRMENSUAL'],$fetch1['DPRACUM'],$fetch1['COSTOCOMPRA'],$fetch1['VALRESI'],$conexion);
			}
			else
			{
				$consulta2 = "UPDATE activosfijos SET DPRACUM = '".$fetch1['COSTOCOMPRA']."', ESTADOAF = 'Depreciado' WHERE CODACT = '".$fetch1['CODACT']."'";
				$resultado4  = query($consulta2,$conexion);
			}
		}
		else
		{
			$consulta2 = "UPDATE activosfijos SET DPRACUM = '".$fetch1['COSTOCOMPRA']."', ESTADOAF = 'Depreciado' WHERE CODACT = '".$fetch1['CODACT']."'";
			$resultado4  = query($consulta2,$conexion);
		}
	}
?>	
	<script language="javascript">
	alert("CALCULOS REALIZADOS CON EXITO!!!")
	</script>

 
</BODY>
</HTML>