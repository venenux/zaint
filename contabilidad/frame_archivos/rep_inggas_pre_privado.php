<?
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include("header.php");
	$conexion = conexion();
	//$consulta="select * from cwconcue where Tipo='P'";
	//$resultado1=mysql_query($consulta);
	//$resultado2=mysql_query($consulta);

	
	if(isset($_POST['enviar']))
	{

		//$fecha11=$_POST['fecha_inicio'];
		//$fD = explode('/',$_POST['fecha_ini']);
		//$fecha_inicio = $fD[2]."-".$fD[1]."-".$fD[0];
		$fH = explode('/',$_POST['fecha_fin']);
		$fecha_final = $fH[2]."-".$fH[1]."-".$fH[0];

		$nivel_cuenta=$_POST['nivelcuenta'];
		$mes=$_POST['mes'];
                $ano=$_POST['ano'];
		//$hoja=$_POST['hoja'];
		//header("http://localhost:8080/selectra/mostrar_reportes.jsp?cuenta_inicio=".$_POST['cuenta_inicio']."&cuenta_fin=".$_POST['cuenta_fin']."&fecha_inicial=".$fecha_inicio."&fecha_final=".$fecha_final."&saldo_anterior=0"); 
			//Esta es la llamada para el Ireport
			//192.168.1.2:8080/selectra/mostrar_reportes.jsp?cuentadesde=".$_POST['cuenta_inicio']."&cuentahasta=".$_POST['cuenta_fin']."&fechadesde=".$fecha_inicio."&fechahasta=".$fecha_final."&saldoanterior=".$Salantu."
			echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			location.href=\"reporte_ingresos_gastos_privado.php?nivel_cuenta=".$nivel_cuenta."&mes=".$mes."&ano=".$ano."\"</SCRIPT>";
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
		<tr><TD width="200" class="tb-head"><strong>Seleccione Nivel de Cuentas</strong></TD><td class="tb-head"></td></tr>
		<tr>
			<TD class="tb-fila" width="200">Nivel Cuenta:</TD>
			<TD colspan="2"><SELECT name="nivelcuenta" id="nivelcuenta">
			<?php 
			$result_combo = mysql_query("SELECT * FROM cwconfig", $conexion);  //
			$row_combo    = mysql_fetch_array($result_combo);   
			$Balact = $row_combo["Balact"];
			$Balpas = $row_combo["Balpas"];
			
			if ($row_combo["Nromax"] == 1)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			} if ($row_combo["Nromax"] == 2)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			} if ($row_combo["Nromax"] == 3)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			} if ($row_combo["Nromax"] == 4)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			} if ($row_combo["Nromax"] == 5)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			echo '<option value="5">'.$row_combo["Nomniv5"].'</option>';
			} if ($row_combo["Nromax"] == 6)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			echo '<option value="5">'.$row_combo["Nomniv5"].'</option>';
			echo '<option value="6">'.$row_combo["Nomniv6"].'</option>';
			} if ($row_combo["Nromax"] == 7)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			echo '<option value="5">'.$row_combo["Nomniv5"].'</option>';
			echo '<option value="6">'.$row_combo["Nomniv6"].'</option>';
			echo '<option value="7">'.$row_combo["Nomniv7"].'</option>';
			} if ($row_combo["Nromax"] == 8)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			echo '<option value="5">'.$row_combo["Nomniv5"].'</option>';
			echo '<option value="6">'.$row_combo["Nomniv6"].'</option>';
			echo '<option value="7">'.$row_combo["Nomniv7"].'</option>';
			echo '<option value="8">'.$row_combo["Nomniv8"].'</option>';
			} if ($row_combo["Nromax"] == 9)
			{
			echo '<option value="1">'.$row_combo["Nomniv1"].'</option>';
			echo '<option value="2">'.$row_combo["Nomniv2"].'</option>';
			echo '<option value="3">'.$row_combo["Nomniv3"].'</option>';
			echo '<option value="4">'.$row_combo["Nomniv4"].'</option>';
			echo '<option value="5">'.$row_combo["Nomniv5"].'</option>';
			echo '<option value="6">'.$row_combo["Nomniv6"].'</option>';
			echo '<option value="7">'.$row_combo["Nomniv7"].'</option>';
			echo '<option value="8">'.$row_combo["Nomniv8"].'</option>';
			echo '<option value="9">'.$row_combo["Nomniv9"].'</option>';
			}
?> 
		</select>
		</TD>
		</tr>

		<tr><TD width="200"></TD></tr>
		<TR>
			<INPUT type="hidden" value="<?echo $reporte?>" name="reporte">
		</TR>
			
                        
                  <tr> <TD class="tb-fila" width="40">Introduzca el A&#241;o: </TD> 
                        <TD COLSPAN="2" WIDTH="10"> <INPUT type="text"  name="ano"></td>
                        </tr>      
                        
		<TR>
                        
			<TD class="tb-fila" width="40">Seleccione el Mes: </TD>
			<TD colspan="2"><SELECT name="mes" id="mes">
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
