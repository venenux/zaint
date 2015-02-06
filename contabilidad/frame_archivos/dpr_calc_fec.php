<?php	include('header.php');
	require_once 'lib/common.php';
	
	$conexion = conexion();
	
	function ultimodia($anho,$mes){
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   }
   if ($mes == 09) 
   {
   		return 30; 
		break;
   }
   elseif ($mes == 08)
   {
		return 31; 
		break;   	
   }
   switch($mes) {
       case 01: return 31; break;
       case 02: return $dias_febrero; break;
       case 03: return 31; break;
       case 04: return 30; break;
       case 05: return 31; break;
       case 06: return 30; break;
       case 07: return 31; break;
       case 8: return 31; break;
       case 9: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
} 
	
	if(isset($_POST['enviar']))
	{
	
		$fd = $_POST['fechaD'];
		
	
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
		
		
		function movimiento($codigo,$tipo,$monto,$dpracum,$costo,$valresi,$anio,$mes,$conexion)
		{
			$fd = $_POST['fechaD'];
			$d = ultimodia($anio,$mes);
			$fd1 = $d."/".$fd;
			$fd2 = fecha_sql($fd1);
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
			$consulta2 = "INSERT INTO activosfijos_movimientos (CODACT,TIPOACT,TIPOMOV,FECMOV,MONMOV) VALUES ('".$codigo."','".$tipo."','Depreciacion','".$fd2."','".$monmov."')";
			$resultado2  = query($consulta2,$conexion);

			actualizaractivo($codigo,$saldo,$monto,$dpracum,$costo,$conexion);
		}
		
		$fecm = substr($fd,0,2);
		$feca = substr($fd,3,4);
		$di = ultimodia($feca,$fecm);
		$fe = $feca."-".$fecm."-".$di;
		$consulta1 = "SELECT CODACT, TIPO, FECINIDPR, DPRMENSUAL, VIDAUTIL, DPRACUM, VALRESI, COSTOCOMPRA FROM activosfijos WHERE ESTADOAF = 'Activo' AND SEDEPRECIA = 'SI' AND FECINIDPR<='".$fe."' ";
		//exit(0);
		$resultado1 = query($consulta1,$conexion);			
			
		
		while($fetch1 = fetch_array($resultado1))
		{
			$fec1 = substr($fetch1['FECINIDPR'],0,4);
			$fec2 = substr($fetch1['FECINIDPR'],5,2);
			$fec3 = substr($fetch1['FECINIDPR'],8,2);
				
			
			$anos = $fec1 + $fetch1['VIDAUTIL'];
			
			if ($anos > $feca)
			{
				movimiento($fetch1['CODACT'],$fetch1['TIPO'],$fetch1['DPRMENSUAL'],$fetch1['DPRACUM'],$fetch1['COSTOCOMPRA'],$fetch1['VALRESI'],$feca,$fecm,$conexion);
			}
			elseif ($anos == $feca)
			{
				if($fec2 >= $fecm)
				{
					movimiento($fetch1['CODACT'],$fetch1['TIPO'],$fetch1['DPRMENSUAL'],$fetch1['DPRACUM'],$fetch1['COSTOCOMPRA'],$fetch1['VALRESI'],$feca,$fecm,$conexion);
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
		location.href="menu_activos.php"
		</script>
		
	<? }?>
<SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js"></SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript"></script>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<TABLE width="100%">
		<TR class="row-br">
			<TD colspan="2"><? titulo("Seleccione Datos del Calculo","","menu_activos.php","12");?></TD>
		</TR>
		

		<TR>
			<TD class="tb-fila" width="150"> Fecha: </TD>
			<TD><INPUT type="text" name="fechaD" id="fechaD" size="15" maxlength="12" value="<? echo date("m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif">
			<script type="text/javascript">Calendar.setup({inputField:"fechaD",ifFormat:"%m/%Y",button:"d_fecha"});</script></TD>
		</TR>
		
		
		<TR class="tb-tit">
			<TD colspan="2" align="right"><INPUT type="submit" name="enviar" value="Aceptar"></TD>
		</TR>
		
	</TABLE>
</FORM>
</BODY>
</HTML>
