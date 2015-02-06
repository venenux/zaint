<?php 
session_start();
ob_start();
?>
<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include("header.php");
$conexion = conexion();

function mes($mes)
{
	switch($mes)
	{
		case "01":
			$Mes_letra = "ENERO";
			return $Mes_letra; 
		break; 
		case "02":
			$Mes_letra = "FEBRERO";
			return $Mes_letra;
		break;
		case "03":
			$Mes_letra = "MARZO";
			return $Mes_letra;
		break;
		case "04":
			$Mes_letra = "ABRIL";
			return $Mes_letra;
		break;	    
			case "05":
			$Mes_letra = "MAYO";
			return $Mes_letra;
		break;	
		case "06":
			$Mes_letra = "JUNIO";
			return $Mes_letra;
		break;	
		case "07":
			$Mes_letra = "JULIO";
			return $Mes_letra;
		break;	
		case "08":
			$Mes_letra = "AGOSTO";
			return $Mes_letra;
		break;	
		case "09":
			$Mes_letra = "SEPTIEMBRE";
			return $Mes_letra;
		break;	
		case "10":
			$Mes_letra = "OCTUBRE";
			return $Mes_letra;
		break;	
		case "11":
			$Mes_letra = "NOVIEMBRE";
			return $Mes_letra;
		break;	
		case "12":
			$Mes_letra = "DICIEMBRE";
			return $Mes_letra;
		break;	
	}
}	
if(isset($_POST['enviar']))
{
	$consulta="UPDATE cwconemp SET Fecini='".fecha_sql($_POST['fecha_ini'])."', Fecfin='".fecha_sql($_POST['fecha_fin'])."', Numcom=".$_POST['num_com']." WHERE Codemp=1";
	$resultado=query($consulta,$conexion);
	
	for ($i=1; $i<=12; $i++)
	{
		$fecha=($_POST['anio']+1)."-".$i."-01";
		$consulta="UPDATE cwconemp SET Mescie$i='".$fecha."', Estcie$i='ABIERTO' WHERE Codemp=1";
		$resultado1=query($consulta,$conexion);
	}	

	$consulta="INSERT INTO cwconhcohis (Numcom, Codtipo, Fecha, Descrip, Estado, Alterno, Enuso) SELECT * FROM cwconhco WHERE YEAR(Fecha)=$_POST[anio]";
	$resultado2=query($consulta,$conexion);

	$consulta="INSERT INTO cwcondcohis (RecNo, Numcom, Fecha, Cuenta, Referen, Tiporef, Descrip, Debito, Credito, Descriplar, Debitou, Creditou, Codccos, Numlim, Control, Codtipo, Concil, FechaD) SELECT * FROM cwcondco WHERE YEAR(Fecha)=$_POST[anio]";
	$resultado3=query($consulta,$conexion);

	$consulta="DELETE FROM cwcondco WHERE YEAR(Fecha)=$_POST[anio]";
	$resultado5=query($consulta,$conexion);
	
	$consulta="DELETE FROM cwconhco WHERE YEAR(Fecha)=$_POST[anio]";
	$resultado4=query($consulta,$conexion);



	$consulta="SELECT MAX(RecNo) AS num FROM cwconhis WHERE Anio=$_POST[anio]";
	$resultado8=query($consulta,$conexion);
	$fetch2=fetch_array($resultado8);
	
	
	$consulta="SELECT * FROM cwconcue";
	$resultado6=query($consulta,$conexion);	
	while($fetch=fetch_array($resultado6))
	{
		$conexion=conexion();
		$consulta="SELECT Salantu, Salactu FROM cwconhis WHERE Anio=$_POST[anio] AND Mes=12 AND Cuenta='$fetch[Cuenta]'";
		$resultado7=query($consulta,$conexion);
		$fetch3=fetch_array($resultado7);
		for ($i=1; $i<=12; $i++)
		{
			$recno=$fetch2['num']+1;
			$ano=$_POST['anio']+1;
			$desmes=mes($i);
			$cuenta=$fetch['Cuenta'];
			$saldoant=$fetch3['Salantu'];
			$saldoact33=$fetch3['Salactu'];
			if((substr($fetch['Cuenta'],0,1)==4)||(substr($fetch['Cuenta'],0,1)==5)||(substr($fetch['Cuenta'],0,1)==6)||(substr($fetch['Cuenta'],0,1)==7))
			{
				$saldoant=0;
				$saldoact33=0;
			}
			$conexion=conexion();
			$consulta="INSERT INTO cwconhis VALUES ('', $ano, $i, '$fetch[Cuenta]', '$desmes', '0.00', '0.00', '0.00', '0.00', '0.00', '$saldoact33', '0.00', '0.00', '0.00', '$saldoact33', '0.00')";
			$resultado9=query($consulta,$conexion);
		}
	}
	$consultaLog="INSERT INTO log_transacciones VALUES ('', 'CERRAR AÑO', '".date("Y-m-d H:i:s")."', 'CERRAR AÑO', 'cierre_anual.php','CERRAR AÑO', '".$ano."', '$_SESSION[nombre]')";
	$resultadoLog=query($consultaLog,$conexion);

	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"$anio CERRADO EXITOSAMENTE\")
	parent.home.location.href=\"menu_procesos.php\"</SCRIPT>";
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
	<?titulo("Cierre Anual","","menu_procesos.php","70");?>
	<BR>
	<TABLE width="100%" border="0">
		<tr><td class="tb-head"><strong>Periodo a Cerrar</strong></TD><td class="tb-head"></td></tr>
		<TR>
		<TD class="tb-fila" >Seleccione el Año: </TD>
		<TD >
		<SELECT name="anio" id="anio">
		<?$result_combo=query("SELECT  year(Fecfin) as anio FROM cwconemp", $conexion);  	
		$row_combo=fetch_array($result_combo);
		$anio=$row_combo['anio']?>
<!-- 		<option value="0">Seleccione..</option> -->
		<option value="<?echo $anio;?>"><?echo $anio;?></option>
		</SELECT></TD>
		</TR>
		<tr><TD class="tb-head"><strong>Nuevo Periodo Contable</strong></TD> <TD class="tb-head"></TD></tr>
		<TR>
		<INPUT type="hidden" value="<?echo $reporte?>" name="reporte">
		<TD class="tb-fila"> Fecha Inicio: </TD>
		<TD><INPUT type="text" name="fecha_ini" id="fecha_ini" size="15" maxlength="12" value="<?echo "01/01/".($anio+1)?>">&nbsp;<input name="d_fecha" type="image" id="fecha_inicio" src="jscalendar/cal.gif">
		<script type="text/javascript">Calendar.setup({inputField:"fecha_ini",ifFormat:"%d/%m/%Y",button:"fecha_inicio"});</script></TD>
		</TR>
		<TR>
		<TD class="tb-fila" > Fecha Fin: </TD>
		<TD> <INPUT type="text" name="fecha_fin" id="fecha_fin" size="15" maxlength="12" value="<?echo "31/12/".($anio+1)?>">&nbsp;<input name="d_fecha" type="image" id="fecha_final" src="jscalendar/cal.gif">
		<script type="text/javascript">Calendar.setup({inputField:"fecha_fin",ifFormat:"%d/%m/%Y",button:"fecha_final"});</script></TD>
		</TR>
 		<TR> 
		<td class=tb-fila >Nro del Primer Comprobante del Nuevo Año Contable</td>
		<td ><INPUT type="text" name="num_com" size="60" value=""></td>
		</tr>
		<TR class="tb-tit" >
		<TD  width="100%"></TD> <td  align="right"><INPUT type="submit" name="enviar" value="Aceptar"></td>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>
