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



<?
include("../header.php");
include("../lib/common.php");

include("func_bd.php");

$nomina_id=$_GET['nomina'];

$consulta = "SELECT periodo_ini,periodo_fin FROM nom_nominas_pago WHERE codnom=$nomina_id and tipnom=$_SESSION[codigo_nomina]";
$resultado = sql_ejecutar($consulta);
$fetch = fetch_array($resultado);

$fecha_ini = fecha($fetch['periodo_ini']);
$fecha_fin = fecha($fetch['periodo_fin']);





//$pagina=1;






?>

<table align="center" width="100%">
<tbody>
<tr>
<td align="left"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
</tr>
<tr>
<td align="left"><hr></td>
</tr>
</tbody>
</table>

<div id="area_impresion">
<?
$pagina=1;
//$nomina_id=$_GET['nomina_id'];

//encabezado_configuracion($pagina,"Listado de Conceptos de la Nómina");

//echo $encabezado;
$date1=date('d/m/Y');
$date2=date('h:i a');	
$datos="<TABLE width='743' align='center' border='0'>
<TR>
<TD align='left'><strong>CENTRO SIMON BOLIVAR C.A.</strong></TD>
<TD align='right'><strong>Fecha: </strong>$date1</TD>
</TR>
<TR>
<TD align='left'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
<TD align='right'><strong>Hora: </strong>$date2</TD>
</TR>
<TR>
<TD></TD>
<TD align='right'><strong>P&#225;g.: &nbsp;$pagina</strong></TD>
</TR>
</TABLE>";
echo $datos;	
?>

<table width="743" border="0"  align="center">
<tr>
<td align="center" style="font-size : 14px;"><strong>CUENTAS CORRIENTES Y AHORRO DE PROVINCIAL</strong></td>
</tr>
<tr>
<td align="center" style="font-size : 14px;"><strong>LAPSO DEL <?echo $fecha_ini?> AL <?echo $fecha_fin?></strong></td>
</tr>
<tr>
<td align="center" style="font-size : 14px;"><strong>NOMINA DE OBREROS SEMANAL</strong></td>
</tr>
</table>


<table align="center" width="800" cellpadding="3">
<tbody>
<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
<td align="left" width="15"># FICHA</td>
<td align="left" width="50">CEDULA</td>
<td align="center" width="250">APELLIDOS Y NOMBRES</td>
<td align="center" width="60">CUENTA</td>
<td align="center" width="60">MONTO</td>
</tr>
<?
$consulta="select * from nom_nomina_netos where codnom=$nomina_id and tipnom=$_SESSION[codigo_nomina]";
$resultado1=sql_ejecutar($consulta);
$i=0;
$contador=0;
while($fila=fetch_array($resultado1))
{
	$consulta="select apenom from nompersonal where ficha='".$fila['ficha']."' and tipnom=$_SESSION[codigo_nomina]";
	$resultado_personal=sql_ejecutar($consulta);
	$fila_personal=fetch_array($resultado_personal);
	?>
  	<tr>
	<td><?echo $fila['ficha'];?></td>
	<td><?echo $fila['cedula']?></td>
	<td><?echo $fila_personal['apenom']?></td>
	<td><?echo $fila['cta_ban']?></td>
	<td align="right"><?echo number_format($fila['neto'],2,',','.')?></td>	
    	</tr>
	<?
	$total_monto+=$fila['neto'];
	$i++;


	if($contador>=35)
	{
		?>
		</tbody>
		</table>
		<?
		echo "<br class=\"saltopagina\">";
		$contador=1;
		echo $encabezado;
		$date1=date('d/m/Y');
		$date2=date('h:i a');	
		$datos="<TABLE width='743' align='center' border='0'>
			<TR>
				<TD align='left'><strong>CENTRO SIMON BOLIVAR C.A.</strong></TD>
				<TD align='right'><strong>Fecha: </strong>$date1</TD>
			</TR>
			<TR>
				<TD align='left'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
				<TD align='right'><strong>Hora: </strong>$date2</TD>
			</TR>
			<TR>
				<TD></TD>
				<TD align='right'><strong>P&#225;g.: &nbsp;".++$pagina."</strong></TD>
			</TR>
			</TABLE>";
		echo $datos;	
		?>
		
		<table width="743" border="0"   align="center">
		<tr>
		<td align="center" style="font-size : 14px;"><strong>CUENTAS CORRIENTES Y AHORRO DE PROVINCIAL</strong></td>
		</tr>
		<tr>
		<td align="center" style="font-size : 14px;"><strong>LAPSO DEL <?echo $fecha_ini?> AL <?echo $fecha_fin?></strong></td>
		</tr>
		<tr>
		<td align="center" style="font-size : 14px;"><strong>NOMINA DE OBREROS SEMANAL</strong></td>
		</tr>
		</table>
		<table align="center" width="800" cellpadding="3">
		<tbody>
		<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
		<!--<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">-->
		<td align="left" width="15"># FICHA</td>
		<td align="left" width="50">CEDULA</td>
		<td align="center" width="250">APELLIDOS Y NOMBRES</td>
		<td align="center" width="60">CUENTA</td>
		<td align="center" width="60">MONTO</td>
		</tr>
		
		<?
	}
	++$contador;
}
?>
</tbody>
</table>

<table  align="center" width="800" cellpadding="3">
<tbody>
<TR>
<TD align="center"><strong>CANTIDAD DE PERSONAS: <?echo $i;?></strong></TD><td align="center"><strong>TOTAL MONTO: <?echo number_format($total_monto,2,',','.')?></strong></td>
</TR>
</tbody>
</table>


</div>
<table align="center" width="100%">
<tbody>
<tr>
<td align="left"><hr></td>
</tr>
<tr>
<td align="left"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
</tr>
</tbody>
</table>
</body>
</html>