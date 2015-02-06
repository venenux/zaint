<?php 
session_start();
ob_start();
?>


<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php 
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php");
include ("funciones_nomina.php");

$anio=$_GET['anio'];

$var_sql = "SELECT nom_emp, imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);

$pagina=1;

?>
<table align="center" width="600">
<tbody>
<tr>
<td align="right"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
</tr>
<tr>
<td align="right"><hr></td>
</tr>
</tbody>
</table>

<div id="area_impresion">
<?
//echo $encabezado;
$date1=date('d/m/Y');
$date2=date('h:i a');	
$datos="<TABLE width='800' align='center' border='0'>
<TR>
<TD align='LEFT'>$row_rs[nom_emp]</TD>
<TD align='right'>Fecha: $date1</TD>
</TR>
<TR>
<TD align='LEFT'>$_SESSION[nomina]</TD>
<TD align='right'>Hora: $date2</TD>
</TR>
<TR>
<TD></TD>
<TD align='right'>P&#225;g.: &nbsp;$pagina</TD>
</TR>
</TABLE>";
echo $datos;

$fecha1=($anio-1)."-11-01";
$fecha2=$anio."-10-30";
?>

<table width="800" border="0"  align="center">
<tr>
<td align="center" style="font-size : 14px;">DIAS DE REPOSO P/UTILIDADES DE <?echo fecha($fecha1)." AL ".fecha($fecha2);?></td>
</tr>
</table>


<table width="800" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC"  >
<td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
<td width="380" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">APELLIDOS Y NOMBRES</font></div></td>
<td width="100" align="center"><font size="2" face="Arial, Helvetica, sans-serif">DIAS</font></td>
<td width="100"><font size="2" face="Arial, Helvetica, sans-serif">FECHA SALIDA</font></td>
<td width="120"><font size="2" face="Arial, Helvetica, sans-serif">FECHA RETORNO</font></td>
</tr>

<?php 
	//operaciones para paginaciones
	//per.estado = '$estado' and
$query="select ficha, apenom, cedula from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' AND estado<>'Egresado' order by ficha";
$result=sql_ejecutar($query);
//$fila = mysql_fetch_array ($result);	
$fecha1=($anio-1)."-11-01";
$fecha2=$anio."-10-30";
$contador=0;
$total_ps=$total_ap=$total_to=0;
while ($fila = fetch_array($result))
{
	$consulta="SELECT dias, fecha_retorno, fecha_salida FROM nomexpediente WHERE cedula=$fila[cedula] AND tipo_registro='Permisos' AND tipo_tiporegistro='4' AND fecha_salida BETWEEN '".$fecha1."' AND '".$fecha2."'";
	$resultado2=sql_ejecutar($consulta);
	while($fetch3=fetch_array($resultado2))
	{
		?>
		<tr>
		<td width="50" height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
		<?php echo $fila['ficha'];?></font></div></td>
		<td width="380"><font size="2" face="Arial, Helvetica, sans-serif">
		<?php echo $fila['apenom'];?>
		</font></td>
		<td width="100" align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
		<?php echo $fetch3['dias'];?>
		</font></td>
		<td width="100" ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
		<?php echo fecha($fetch3['fecha_salida']);?>
		</font></div></td>
		<td width="120" ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
		<?php echo fecha($fetch3['fecha_retorno']);?>
		</font></div></td>
		</tr>
		<?
		$contador+=1;
	}
	
	if($contador >= 40)
	{
		echo "</table>";
		echo "<br class=\"saltopagina\">";

		$date1=date('d/m/Y');
		$date2=date('h:i a');	
		$datos="<TABLE width='800' align='center' border='0'>
		<TR>
		<TD align='LEFT'>$row_rs[nom_emp]</TD>
		<TD align='right'>Fecha: $date1</TD>
		</TR>
		<TR>
		<TD align='LEFT'>$_SESSION[nomina]</TD>
		<TD align='right'>Hora: $date2</TD>
		</TR>
		<TR>
		<TD></TD>
		<TD align='right'>P&#225;g.: &nbsp;'".($pagina+1)."'</TD>
		</TR>
		</TABLE>";
		echo $datos;
		$contador=0;
		?>
	
		<table width="800" border="0"  align="center">
		<tr>
		<td align="center" style="font-size : 14px;">DIAS DE REPOSO P/UTILIDADES DEL <?echo date('d/m/Y')?></td>
		</tr>
		</table>
		
		
		<table width="800" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
		<tr bgcolor="#CCCCCC"  >
		<td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
		<td width="380" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">APELLIDOS Y NOMBRES</font></div></td>
		<td width="100" align="center"><font size="2" face="Arial, Helvetica, sans-serif">DIAS</font></td>
		<td width="100"><font size="2" face="Arial, Helvetica, sans-serif">FECHA SALIDA</font></td>
		<td width="120"><font size="2" face="Arial, Helvetica, sans-serif">FECHA RETORNO</font></td>
		</tr>
		<?
	}
	$i++;
}//fin del ciclo while
//operaciones de paginacion
$num_fila++;
$in++;
?>
	
<p align="center"></p></td>
</tr>
</table>
<font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</div>
</body>
</html>

