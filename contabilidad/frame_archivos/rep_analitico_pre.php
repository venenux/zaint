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

			echo "Ant: ".$Salantu." Debi: ".$row_ant[''];
			$fD = explode('/',$_POST['fecha_ini']);
			$fecha_inicio = $fD[2]."-".$fD[1]."-".$fD[0];
			$fH = explode('/',$_POST['fecha_fin']);
			$fecha_final = $fH[2]."-".$fH[1]."-".$fH[0];

			//header("http://localhost:8080/selectra/mostrar_reportes.jsp?cuenta_inicio=".$_POST['cuenta_inicio']."&cuenta_fin=".$_POST['cuenta_fin']."&fecha_inicial=".$fecha_inicio."&fecha_final=".$fecha_final."&saldo_anterior=0"); 
			//Esta es la llamada para el Ireport
			//192.168.1.2:8080/selectra/mostrar_reportes.jsp?cuentadesde=".$_POST['cuenta_inicio']."&cuentahasta=".$_POST['cuenta_fin']."&fechadesde=".$fecha_inicio."&fechahasta=".$fecha_final."&saldoanterior=".$Salantu."
			echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			location.href=\"reporte_analitico.php?cuentadesde=".$_POST['cuenta_inicio']."&cuentahasta=".$_POST['cuenta_fin']."&fechadesde=".$fecha_inicio."&fechahasta=".$fecha_final."&saldoanterior=".$Salantu."\"</SCRIPT>";
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
	<?titulo("Seleccione Datos del Reporte","","menu_rep.php?","70");?>
	<BR>
	<TABLE width="100%" border="0">
		<tr><TD width="100" class="tb-head"><strong>Rango entre Cuentas</strong></TD><td class="tb-head"></td></tr>
		<TR>
			<TD class="tb-fila" width="150">Desde Cuenta Contable: </td>
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
			<TD class="tb-fila" width="150">Hasta Cuenta Contable: </TD>
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
		<tr><TD width="100" class="tb-head"><strong>Rango de Fechas:</strong></TD><td class="tb-head"></td></tr>
		<TR>
			<INPUT type="hidden" value="<?echo $reporte?>" name="reporte">
			<TD width="150" class="tb-fila"> Fecha Desde: </TD>
			<TD><INPUT type="text" name="fecha_ini" id="fecha_ini" size="15" maxlength="12" value="<?echo date("d/m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="fecha_inicio" src="jscalendar/cal.gif">
		<script type="text/javascript">Calendar.setup({inputField:"fecha_ini",ifFormat:"%d/%m/%Y",button:"fecha_inicio"});</script></TD>
		</TR>
		<TR>
			<TD class="tb-fila" width="150"> Fecha Hasta: </TD>
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