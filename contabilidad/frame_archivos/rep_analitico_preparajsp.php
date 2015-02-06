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

		$fecha11=$_POST['fecha_inicio'];
		$fD = explode('/',$_POST['fecha_ini']);
		$fecha_inicio = $fD[2]."-".$fD[1]."-".$fD[0];
		$fH = explode('/',$_POST['fecha_fin']);
		$fecha_final = $fH[2]."-".$fH[1]."-".$fH[0];

		$consul_cu="SELECT * FROM cwconcue WHERE Tipo='P' AND Cuenta BETWEEN ".$_POST['cuenta_inicio']." AND ".$_POST['cuenta_fin']." ORDER BY Cuenta";
		$result_cuenta = mysql_query($consul_cu, $conexion); 
		
		$Debito_total  = 0; 
  		$Credito_total = 0;

   		if (mysql_num_rows($result_cuenta))
   		{ 
     	while ($row_cuenta = @mysql_fetch_array($result_cuenta)) 
     	{  	
       		//$row_cuenta    = @mysql_fetch_array($result_cuenta))
       		$Cuenta_bucle  = $row_cuenta["Cuenta"];    
   			//QUERY PARA EL SALDO ANTERIOR
       		$result_emp = mysql_query("SELECT * FROM cwconemp ", $conexion); 
       		$row_emp    = @mysql_fetch_array($result_emp);
       		$Fecini     = $row_emp["Fecini"];

       		$result_ant = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND FechaD >='$Fecini' AND FechaD <'$fecha_inicio'", $conectar); 
       		$row_ant = @mysql_fetch_array($result_ant); 
       		$Salantu   = $row_ant["Debsum"] - $row_ant["Credsum"];
		}
		}
			
			$fD = explode('/',$_POST['fecha_ini']);
			$fecha_inicio = $fD[2]."-".$fD[1]."-".$fD[0];
			$fH = explode('/',$_POST['fecha_fin']);
			$fecha_final = $fH[2]."-".$fH[1]."-".$fH[0];

			//header("http://localhost:8080/selectra/mostrar_reportes.jsp?cuenta_inicio=".$_POST['cuenta_inicio']."&cuenta_fin=".$_POST['cuenta_fin']."&fecha_inicial=".$fecha_inicio."&fecha_final=".$fecha_final."&saldo_anterior=0"); 
			echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			location.href=\"//192.168.1.2:8080/selectra/mostrar_reportes.jsp?cuentadesde=".$_POST['cuenta_inicio']."&cuentahasta=".$_POST['cuenta_fin']."&fechadesde=".$fecha_inicio."&fechahasta=".$fecha_final."&saldoanterior=".$Salantu."\"</SCRIPT>";
		//}
		//}
	}//localhost:8080/selectra/mostrar_reportes.jsp?cuenta_inicio=".$_POST['cuenta_inicio']."&cuenta_fin=".$_POST['cuenta_fin']."&fecha_inicial=".$fecha_inicio."&fecha_final=".$fecha_final."&saldo_anterior=0
?>

<HTML class="fondo">
<HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="estilos.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-blue.css" title="win2k-cold-1" /> 
</HEAD>
<BODY>
<FORM name="sampleform" method="POST" target="_blank" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<TABLE width="100%" border="">
		<TR class="row-br">
			<TD><?titulo("Seleccione Datos del Reporte","","menu_rep.php?","70");?></TD>
		</TR>
	</TABLE>
	<BR>
	<TABLE width="100%" border="0">
		<tr><strong><strong>Rango entre Cuentas:</strong></TD></tr>
		<TR>
			<TD class="tb-fila" width="40">Desde Cuenta Contable: </TD>
			<TD colspan="2"><SELECT name="cuenta_inicio" id="cuenta_inicio">
					<option value="0">Seleccione..</option>
					<?while ($fila = fetch_array($resultado1)){
					//$decripcion = $fila['descripcion'];
					$Descripcion = $fila['Descrip'];
					$cuenta = $fila['Cuenta'];
					echo "<option title=\"$Descripcion\" value=\"$cuenta\">".$cuenta."</option>";}
			?>
			</SELECT></TD>
		</TR>
		<TR>
			<TD class="tb-fila" width="40">Hasta Cuenta Contable: </TD>
			<TD colspan="2"><SELECT name="cuenta_fin" id="cuenta_fin">
					<option value="0">Seleccione..</option>
					<?while ($fila = fetch_array($resultado2)){
					//$decripcion = $fila['descripcion'];
					$Descripcion = $fila['Descrip'];
					$cuenta = $fila['Cuenta'];
					echo "<option title=\"$Descripcion\" value=\"$cuenta\">".$cuenta."</option>";}
			?>
			</SELECT></TD>
		</TR>
		<tr><strong><strong> Rango de Fechas:</strong></TD></tr>
		<TR>
			<INPUT type="hidden" value="<?echo $reporte?>" name="reporte">
			<TD width="40" class="tb-fila"> Fecha Desde: </TD>
			<TD><INPUT type="text" name="fecha_ini" id="fecha_ini" size="15" maxlength="12" value="<?echo date("d/m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="fecha_inicio" src="jscalendar/cal.gif">
		<script type="text/javascript">Calendar.setup({inputField:"fecha_ini",ifFormat:"%d/%m/%Y",button:"fecha_inicio"});</script></TD>
		</TR>
		<TR>
			<TD class="tb-fila" width="40"> Fecha Hasta: </TD>
			<TD> <INPUT type="text" name="fecha_fin" id="fecha_fin" size="15" maxlength="12" value="<?echo date("d/m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="fecha_final" src="jscalendar/cal.gif">
		<script type="text/javascript">Calendar.setup({inputField:"fecha_fin",ifFormat:"%d/%m/%Y",button:"fecha_final"});</script></TD>
		</TR>
		<TR>
			<TD colspan="3" height="10"></TD>
		</TR>
		<TR class="tb-tit">
			<TD colspan="3" align="right"><INPUT type="submit" name="enviar" value="Aceptar"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>