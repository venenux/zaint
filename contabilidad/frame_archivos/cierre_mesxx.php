<?
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include("header.php");
	$conexion = conexion();
	$consulta="select * from cwconcue where Tipo='P'";
	$resultado1=query($consulta, $conexion);
	$resultado2=query($consulta, $conexion);

	$consulta="SELECT cuenta_cierre_mes FROM cwconfig";
	$resultado_cm=query($consulta,$conexion);
	$fetch_cm=fetch_array($resultado_cm);
	$ccm=$fetch_cm['cuenta_cierre_mes'];
       // echo $ccm;
       // exit(0);
	if(isset($_POST['enviar']))
	{

		$ano=$_POST['anio'];
		$mes=$_POST['mes'];
		$consul="SELECT * FROM cwconemp";
		$result_cuenta = query($consul, $conexion);
		$fila=fetch_array($result_cuenta);
		$Debito_total  = 0; 
  		$Credito_total = 0;

		$cierre="Estcie".$mes;
		if ($fila[$cierre]=='ABIERTO')
   		{ 
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='".substr($ccm,0,12)."' and Mes=".($mes-1)." AND Anio=$ano" ;
       				$result_ant1 = query($consulta_his, $conexion);
				$row_ant1 = fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_ant="SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum FROM cwcondco WHERE Cuenta LIKE '5%' and month(Fecha)='".$mes."' and year(Fecha)='".$ano."' ";
       		$result_ant = query($consulta_ant, $conexion); 
       		while ($row_ant = fetch_array($result_ant))
			{ 
				$deb= $row_ant['Debsum'];
				$cre= $row_ant['Credsum'];
				$Total_ingresos = $row_ant["Debsum"] - $row_ant["Credsum"];
			}
			$consulta_ant="SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '6%' and month(Fecha)='".$mes."' and year(Fecha)='".$ano."' ";
       		$result_ant = query($consulta_ant, $conexion); 
       		while ($row_ant = fetch_array($result_ant))
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
	
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='".substr($ccm,0,12)."' and Mes=".$mes." and Anio=$ano ";
			$resul_hist2=query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='".substr($ccm,0,12)."' and Mes='".($i)."'  and Anio=$ano ";
				$resultado2=query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='".substr($ccm,0,9)."' and Mes=".($mes-1)."  and Anio=$ano";
				$result_ant1 = query($consulta_his, $conexion);
				$row_ant1 = fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='".substr($ccm,0,9)."' and Mes=".$mes." and Anio=$ano";
			$resultado_hist=query($consulta_hist,$conexion);
			$fila1 = fetch_array($resultado_hist);
			$debitou1 = $fila1['Debitou'];
			$creditou1 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou1;
			$Total_gastos=$Total_gastos+$debitou1;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='".substr($ccm,0,9)."'and Mes=".$mes." and Anio=$ano";
			$resul_hist2=query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='".substr($ccm,0,9)."' and Mes='".($i)."' and Anio=$ano";
				$resultado2=query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='".substr($ccm,0,6)."' and Mes=".($mes-1)."  and Anio=$ano";
				$result_ant1 = query($consulta_his, $conexion);
				$row_ant1 = fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='".substr($ccm,0,6)."' and Mes=".$mes." and Anio=$ano";
			$resultado_hist=query($consulta_hist,$conexion);
			$fila1 = fetch_array($resultado_hist);
			$debitou2 = $fila1['Debitou'];
			$creditou2 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou2;
			$Total_gastos=$Total_gastos+$debitou2;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='".substr($ccm,0,6)."'and Mes=".$mes." and Anio=$ano";
			$resul_hist2=query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='".substr($ccm,0,6)."' and Mes='".($i)."' and Anio=$ano";
				$resultado2=query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
		
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='".substr($ccm,0,4)."' and Mes=".($mes-1)." and Anio=$ano";
				$result_ant1 = query($consulta_his, $conexion);
				$row_ant1 = fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='".substr($ccm,0,4)."' and Mes=".$mes." and Anio=$ano";
			$resultado_hist=query($consulta_hist,$conexion);
			$fila1 = fetch_array($resultado_hist);
			$debitou3 = $fila1['Debitou'];
			$creditou3 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos+$creditou3;
			$Total_gastos=$Total_gastos+$debitou3;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='".substr($ccm,0,4)."'and Mes=".$mes." and Anio=$ano";
			$resul_hist2=query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='".substr($ccm,0,4)."' and Mes='".($i)."' and Anio=$ano";
				$resultado2=query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
	
			if($mes==1)
			{
				$salantu=0;
			}else
			{
				$consulta_his="SELECT * FROM cwconhis WHERE Cuenta ='".substr($ccm,0,2)."' and Mes=".($mes-1)." and Anio=$ano";
				$result_ant1 = query($consulta_his, $conexion);
				$row_ant1 = fetch_array($result_ant1);
				$salantu = $row_ant1['Salactu'];
			}
			$consulta_hist="select * from cwconhis where Cuenta='".substr($ccm,0,2)."' and Mes=".$mes." and Anio=$ano";
			$resultado_hist=query($consulta_hist,$conexion);
			$fila1 = fetch_array($resultado_hist);
			$debitou4 = $fila1['Debitou'];
			$creditou4 = $fila1['Creditou'];
			$Total_ingresos=$Total_ingresos;
			$Total_gastos=$Total_gastos;
			$saldo_actual=($salantu+$Total_gastos)-($Total_ingresos);
			
			$consul_hist2="update cwconhis set Creditou=".$Total_ingresos.",Debitou=".$Total_gastos.",Salantu=".$salantu.",Salactu=".$saldo_actual." where Cuenta='".substr($ccm,0,2)."'and Mes=".$mes." and Anio=$ano";
			$resul_hist2=query($consul_hist2,$conexion);
			
			$cont=$mes+1;
			for($i=$cont; $i<=12; $i++)
			{
				$consulta2="update cwconhis set salantu='".$saldo_actual."', salactu='".$saldo_actual."' where Cuenta='".substr($ccm,0,2)."' and Mes='".($i)."' and Anio=$ano";
				$resultado2=query($consulta2,$conexion);
				//echo "<br>Consul2: ".$consulta2;
			}
			$consulta_emp="update cwconemp set Estcie$mes='CERRADO'";
			//echo $consulta_emp;
			//exit(0);
			$resultado_emp=query($consulta_emp,$conexion);

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
	<TABLE width="100%" border="">
		<TR class="row-br">
			<TD><?titulo("Cierre de Mes","","menu_procesos.php","70");?></TD>
		</TR>
	</TABLE>
	<BR>
	<TABLE width="100%" border="0">
		
		<TR>
		<TD  class="tb-fila" width="150">Seleccione el Año: </TD>
		<TD >
		<input type="text" size="10" readonly="true" name="anio" id="anio"
		<?$result_combo=query("SELECT  year(Fecfin) as anio FROM cwconemp", $conexion);
		$row_combo=fetch_array($result_combo);
		$anio=$row_combo['anio']?> value="<? echo $anio;?>">
		</TD>
		</TR>

		<TR>
			<TD class="tb-fila" width="150">Seleccione el Mes: </TD>
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
			<TD colspan="2" align="right"><INPUT type="submit" name="enviar" value="Aceptar"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>