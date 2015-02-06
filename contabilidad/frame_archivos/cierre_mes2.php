<?
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include("header.php");
	$conexion = conexion();
	$consulta="select * from cwconcue where Tipo='P'";
	$resultado1=mysql_query($consulta);
	$resultado2=mysql_query($consulta);

	
	if(isset($_POST['enviar']))
	{

		$mes=$_POST['mes'];
		$consul="SELECT * FROM cwconemp";
		$result_cuenta = mysql_query($consul, $conexion);
		$fila=mysql_fetch_array($result_cuenta);
		$Debito_total  = 0; 
  		$Credito_total = 0;
                $Total_ingresos = 0;
                $Total_gastos   = 0;
		$cierre="Estcie".$mes;
		if ($fila[$cierre]=='ABIERTO')
   		{ 
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='3.2.5.02.01.' and mes=".($mes-1);
       			$result_ant1 = mysql_query($consulta_his, $conexion);
				$row_ant1 = @mysql_fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_ant="SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum FROM cwcondco WHERE Cuenta LIKE '5%' and month(Fecha)='".$mes."'";
       		$result_ant = mysql_query($consulta_ant, $conexion); 
       		while ($row_ant = @mysql_fetch_array($result_ant))
			{ 
				$deb= $row_ant['Debsum'];
				$cre= $row_ant['Credsum'];
				$Total_ingresos = $row_ant["Debsum"] - $row_ant["Credsum"];
			}
			$consulta_ant="SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '6%' and month(Fecha)='".$mes."'";
       		$result_ant = mysql_query($consulta_ant, $conexion); 
       		while ($row_ant = @mysql_fetch_array($result_ant))
			{ 
				$deb= $row_ant['Debsum'];
				$cre= $row_ant['Credsum'];
				$Total_gastos = $row_ant["Debsum"] - $row_ant["Credsum"];
			}
			
			if($Total_ingresos<0)
			{$Total_ingresos=-1*$Total_ingresos;}

			if($Total_gastos<0)
			{$Total_gastos=-1*$Total_gastos;}

			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
	
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='3.2.5.02.01.'and mes=".$mes;
			$resul_hist2=mysql_query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='3.2.5.02.01.' and mes='".($i)."'";
				$resultado2=mysql_query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='3.2.5.02.' and mes=".($mes-1);
				$result_ant1 = mysql_query($consulta_his, $conexion);
				$row_ant1 = @mysql_fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='3.2.5.02.' and mes=".$mes;
			$resultado_hist=mysql_query($consulta_hist,$conexion);
			$fila1 = @mysql_fetch_array($resultado_hist);
			$debitou1 = $fila1['Debitou'];
			$creditou1 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou1;
			$Total_gastos=$Total_gastos+$debitou1;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='3.2.5.02.'and mes=".$mes;
			$resul_hist2=mysql_query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='3.2.5.02.' and mes='".($i)."'";
				$resultado2=mysql_query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='3.2.5.' and mes=".($mes-1);
				$result_ant1 = mysql_query($consulta_his, $conexion);
				$row_ant1 = @mysql_fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='3.2.5.' and mes=".$mes;
			$resultado_hist=mysql_query($consulta_hist,$conexion);
			$fila1 = @mysql_fetch_array($resultado_hist);
			$debitou2 = $fila1['Debitou'];
			$creditou2 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou2;
			$Total_gastos=$Total_gastos+$debitou2;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='3.2.5.'and mes=".$mes;
			$resul_hist2=mysql_query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='3.2.5.' and mes='".($i)."'";
				$resultado2=mysql_query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
		
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='3.2.' and mes=".($mes-1);
				$result_ant1 = mysql_query($consulta_his, $conexion);
				$row_ant1 = @mysql_fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='3.2.' and mes=".$mes;
			$resultado_hist=mysql_query($consulta_hist,$conexion);
			$fila1 = @mysql_fetch_array($resultado_hist);
			$debitou3 = $fila1['Debitou'];
			$creditou3 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou3;
			$Total_gastos=$Total_gastos+$debitou3;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='3.2.'and mes=".$mes;
			$resul_hist2=mysql_query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='3.2.' and mes='".($i)."'";
				$resultado2=mysql_query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='3.' and mes=".($mes-1);
				$result_ant1 = mysql_query($consulta_his, $conexion);
				$row_ant1 = @mysql_fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='3.' and mes=".$mes;
			$resultado_hist=mysql_query($consulta_hist,$conexion);
			$fila1 = @mysql_fetch_array($resultado_hist);
			$debitou4 = $fila1['Debitou'];
			$creditou4 = $fila1['Creditou'];
			
                        $Total_ingresos=$Total_ingresos;
			$Total_gastos=$Total_gastos;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='3.'and mes=".$mes;
			$resul_hist2=mysql_query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='3.' and mes='".($i)."'";
				$resultado2=mysql_query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
			$consulta_emp="update cwconemp set Estcie$mes='CERRADO'";
			//echo $consulta_emp;
			//exit(0);
			$resultado_emp=mysql_query($consulta_emp,$conexion);

			echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			parent.home.location.href=\"menu_procesos.php\"</SCRIPT>";
		}else
		{
			echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			alert(\"El mes se encuentra cerrado\")
			parent.home.location.href=\"menu_procesos.php\"</SCRIPT>";
		}
	}
?>

<HTML class="fondo">
<HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="estilos.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-blue.css" title="win2k-cold-1" /> 
</HEAD>
<BODY>
<FORM name="sampleform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<?titulo("Cierre de Mes","","menu_procesos.php","70");?>
	
	<BR>
	<TABLE width="100%" border="0">
		<tr ><td class="tb-head"><strong>Rango entre Cuentas</strong></TD><td class="tb-head"></td></tr>
		<TR>
			<TD class="tb-head" width="150">Seleccione el Mes: </TD>
			<TD ><SELECT name="mes" id="mes">
					<option value="0">Seleccione..</option>
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
			
			</SELECT></TD>
		</TR>
		<TR class="tb-tit">
			<TD colspan="3" align="right"><INPUT type="submit" name="enviar" value="Aceptar"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>