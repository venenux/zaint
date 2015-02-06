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

/*
$tipo=$_GET[tipo];

if ($tipo==1)
{$estado='Activo';}

*/

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
$datos="<TABLE width='1400' align='center' border='0'>
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
?>

<table width="1400" border="0"  align="center">
<tr>
<td align="center" style="font-size : 14px;">PRESTACIONES SOCIALES AL <?echo date('d/m/Y')?></td>
</tr>
</table>


<table width="1400" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC"  >
<td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
<td width="400" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">APELLIDOS Y NOMBRES</font></div></td>
<td width="100"><font size="2" face="Arial, Helvetica, sans-serif">INGRESO</font></td>
<td width="100"><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">SUELDOS</font></div>
</div></td>
<td width=""><div align="center">
<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">ANOS</font></div>
</div></td>
<td width=""><div align="center">
<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">MESES</font></div>
</div></td>
<td width=""><div align="center">
<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">PRESTACIONES</font></div>
</div></td>
<td width=""><div align="center">
<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">ANTICIPOS</font></div>
<td width=""><div align="center">
<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">NETO</font></div>
</div></td>
</tr>

<?php 
	//operaciones para paginaciones
	//per.estado = '$estado' and
$query="select ficha, apenom, fecing, cedula, suesal from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' AND estado<>'Egresado' order by ficha";
$result=sql_ejecutar($query);
//$fila = mysql_fetch_array ($result);	


$consulta="SELECT MAX(codnom) AS codnom FROM nom_nominas_pago WHERE tipnom='".$_SESSION['codigo_nomina']."' AND frecuencia=6";
$resultado=sql_ejecutar($consulta);
$fetch2=fetch_array($resultado);


if(($_SESSION['codigo_nomina']==1)||($_SESSION['codigo_nomina']==2)||($_SESSION['codigo_nomina']==3))
	$codcon=5000;
elseif($_SESSION['codigo_nomina']==4)
	$codcon=5000;
//ciclo para mostrar los datos 
$contador=0;
$total_ps=$total_ap=$total_to=0;
while ($fila = fetch_array($result))
{
	$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$fila[cedula] AND ficha=$fila[ficha] AND codcon=5000 AND cod_tac='PS'";
	//$consulta="SELECT monto FROM nom_movimientos_nomina WHERE ficha=$fila[ficha] AND codcon=$codcon  AND tipnom=$_SESSION[codigo_nomina]";
	$resultado2=sql_ejecutar($consulta);
	$fetch3=fetch_array($resultado2);
	
	$consulta="SELECT SUM(monto) AS monto FROM nomexpediente WHERE cedula=$fila[cedula] AND tipo_registro='Antic. prestaciones'";
	$resultado3=sql_ejecutar($consulta);
	$fetch4=fetch_array($resultado3);

	$consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and tiponom='".$_SESSION['codigo_nomina']."' and 	id=7";
	$resultado33=sql_ejecutar($consulta);
	$fetch33=fetch_array($resultado33);

	$anios=antiguedad($fila['fecing'],date("Y-m-d"),"A");
	$meses=antiguedad($fila['fecing'],date("Y-m-d"),"M");
	
	$neto=$fetch3['monto']-$fetch4['monto'];
	
	$total_ps+=$fetch3['monto'];
	$total_ap+=$fetch4['monto'];
	$total_to+=$neto;

	$contador+=1;
	?>
	<tr>
	<td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo $fila['ficha'];?></font></div></td>
        <td ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo $fila[apenom];?>
        </font></td>
        <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo fecha($fila['fecing']);?>
        </font></td>
        <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo number_format(($fila['suesal']+$fetch33['valor']),2,',','.');?>
        </font></div></td>
        <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo $anios?>
        </font></div></td>
        <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo $meses?>
        </font></div></td>
        <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo number_format($fetch3['monto'],2,',','.')?>
        </font></div></td>
	<td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php if($fetch4['monto']=='') echo "00.0"; else echo number_format($fetch4['monto'],2,',','.');?>
        </font></div></td>
	<td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php echo number_format($neto,2,',','.')?>
        </font></div></td>
        </tr>
        <?php
	if($contador >= 40)
	{
		echo "</table>";
		echo "<br class=\"saltopagina\">";

		$date1=date('d/m/Y');
		$date2=date('h:i a');	
		$datos="<TABLE width='1400' align='center' border='0'>
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
	
		<table width="1400" border="0"  align="center">
		<tr>
		<td align="center" style="font-size : 14px;">PRESTACIONES SOCIALES AL <?echo date('d/m/Y')?></td>
		</tr>
		</table>
		
		
		<table width="1400" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
		<tr bgcolor="#CCCCCC"  >
		<td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
		<td width="400" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">APELLIDOS Y NOMBRES</font></div></td>
		<td width="100"><font size="2" face="Arial, Helvetica, sans-serif">INGRESO</font></td>
		<td width="100"><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">SUELDOS</font></div>
		</div></td>
		<td width=""><div align="center">
		<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">ANOS</font></div>
		</div></td>
		<td width=""><div align="center">
		<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">MESES</font></div>
		</div></td>
		<td width=""><div align="center">
		<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">PRESTACIONES</font></div>
		</div></td>
		<td width=""><div align="center">
		<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">ANTICIPOS</font></div>
		<td width=""><div align="center">
		<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">NETO</font></div>
		</div></td>
		</tr>
		<?
	}
	$i++;
}//fin del ciclo while
//operaciones de paginacion
$num_fila++;
$in++;
?>
	
<table width="1400" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr><br>
<TD>Total Prest. soc.: <?echo number_format($total_ps,2,',','.');?></TD>
<td>Total Antic.: <?echo number_format($total_ap,2,',','.');?></td>
<td>Total neto: <?echo number_format($total_to,2,',','.')?></td>
</tr>
</table>
<p align="center"></p></td>
</tr>
</table>
<font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</div>
</body>
</html>

