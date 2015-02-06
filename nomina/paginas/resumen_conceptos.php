<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>

<?

include("../lib/common.php");
include("../header.php");
include("func_bd.php");

$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = fetch_array($rs);

	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);

$nomina_id=$_GET['nomina'];
$codtip = $_GET['codt'];


$pagina=1;

$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = fetch_array ($result);	
$gerente=$row['ger_rrhh'];

$consulta="select * from nomconceptos where codcon='".$concepto_id."'";
$resultado=sql_ejecutar($consulta);
$fila_concepto=mysql_fetch_array($resultado);



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
$consulta4="SELECT * FROM nom_nominas_pago WHERE codnom='".$nomina_id."' AND tipnom='".$codtip."' ";
$resultado4 = sql_ejecutar($consulta4);
$fetch4 = fetch_array($resultado4);



//encabezado_particular($nomina_id, $pagina);
//echo $encabezado;
$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='right'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD align='right'><strong>P&#225;g.: &nbsp;$pagina</strong></TD>
		</TR>
	</TABLE>";
	echo $datos;	




?>


<table align="center" width="743"  border="0">
  <tbody>
    <tr>
      <td align="center" style="font-size : 16px;"><strong>Resumen de Conceptos por <?echo $termino?></strong></td>
    </tr>
	<tr><TD align="left"><? echo $fetch4[descrip]; ?></TD></tr>
  </tbody>
</table>



<table align="center" width="743" border="1">
<tbody height="30">
	<tr style="font-weight : bold;">
		<td align="center" style="border-right-style : hidden;"> Codigo y Descripcion del Concepto</td>
		<td align="center" style="border-right-style : hidden;"> Cod. Presup.</td>
		<td align="center" width="98" style="border-left-style : hidden; border-right-style : hidden;" >     Asignaciones</td>
		<td align="center" width="103" style="border-left-style : hidden;" >Deducciones</td>
		<td align="center" width="103" style="border-left-style : hidden;" >Patronales</td>
    	</tr>
</tbody>
</table>
<table align="center" width="743" border="1">
<tbody>
<?
//$consulta="select * from nom_movimientos_nomina where codnom='".$nomina_id."' and tipcon='A'";

$consulta3="SELECT DISTINCT(codcon) FROM nom_movimientos_nomina WHERE codnom='".$nomina_id."' AND tipnom='".$codtip."' ";	
$resultado=sql_ejecutar($consulta3);
$i=1;
$totalA=0;
$totalD=0;
$totalP=0;
while($fila=fetch_array($resultado))
{
	$consulta6 = "SELECT SUM(monto) as suma FROM nom_movimientos_nomina WHERE codnom='".$nomina_id."' AND tipnom='".$codtip."' AND codcon = '".$fila['codcon']."' ";
	$resultado6 = sql_ejecutar($consulta6);
	$fetch6 = fetch_array($resultado6);
	$consulta7 = "SELECT descrip,tipcon FROM nom_movimientos_nomina WHERE codnom='".$nomina_id."' AND tipnom='".$codtip."' AND codcon = '".$fila['codcon']."' ";	
	$resultado7 = sql_ejecutar($consulta7);
	$fetch7 = fetch_array($resultado7);
	$consulta8 = "SELECT ctacon1 FROM nomconceptos WHERE codcon = '".$fila['codcon']."' ";	
	$resultado8 = sql_ejecutar($consulta8);
	$fetch8 = fetch_array($resultado8);
	if($fetch7['tipcon']=='A')
	{
		echo "<tr>
			<td width='370' style='border-right-style : hidden; border-top-style : hidden;'>$fila[codcon] - $fetch7[descrip]</td><td align='right' style='border-right-style : hidden; border-top-style : hidden;'>$fetch8[ctacon1]</td><td width='103' align='right' style='border-right-style : hidden; border-top-style : hidden;'>".number_format($fetch6['suma'],2,',','.')."</td><td align='right'  width='103' style='border-right-style : hidden; border-top-style : hidden;'></td><td width='103' align='right' style='border-top-style : hidden;'></td></tr>";		
			$totalA=$totalA+$fetch6['suma'];
	}
	elseif($fetch7['tipcon']=='D')
	{
		echo "<tr>
			<td width='370' style='border-right-style : hidden; border-top-style : hidden;'>$fila[codcon] - $fetch7[descrip]</td><td align='right' style='border-right-style : hidden; border-top-style : hidden;'>$fetch8[ctacon1]</td><td align='right' width='103' style='border-right-style : hidden; border-top-style : hidden;'></td><td  width='103' align='right' style='border-right-style : hidden; border-top-style : hidden;'>".number_format($fetch6['suma'],2,',','.')."</td><td width='103' align='right' style='border-top-style : hidden;'></td></tr>";		
			$totalD=$totalD+$fetch6['suma'];
	}
	elseif($fetch7['tipcon']=='P')
	{
		echo "<tr>
			<td width='370' style='border-right-style : hidden; border-top-style : hidden;'>$fila[codcon] - $fetch7[descrip]</td><td align='right' style='border-right-style : hidden; border-top-style : hidden;'>$fetch8[ctacon1]</td><td width='103' align='right' style='border-right-style : hidden; border-top-style : hidden;'></td><td width='103' align='right' style='border-right-style : hidden; border-top-style : hidden;'></td><td width='103' align='right' style='border-top-style : hidden; border-top-style : hidden;'>".number_format($fetch6['suma'],2,',','.')."</td></tr>";		
			$totalP=$totalP+$fetch6['suma'];
	}
	
}
?>

</tbody>
</table>


<table align="center" width="743" border="1">
<tbody height="50">
	<tr style="font-weight : bold;">
		<td align="center" style="border-right-style : hidden;  border-top-style : hidden;"></td>
		<td align="right" style="border-right-style : hidden;  border-top-style : hidden;"> Totales:</td>
		<td align="right" width="98" style="border-left-style : hidden; border-right-style : hidden;  border-top-style : hidden;" > <? echo number_format($totalA,2,',','.');?></td>
		<td align="right" width="103" style="border-left-style : hidden;  border-top-style : hidden;" > <? echo number_format($totalD,2,',','.');?></td>
		<td align="right" width="103" style="border-left-style : hidden;  border-top-style : hidden;" > <? echo number_format($totalP,2,',','.');?></td>
    	</tr>
	<tr style="font-weight : bold;">
		<td align="center" style="border-right-style : hidden; border-top-style : hidden;"></td>
		<td align="right" style="border-right-style : hidden;  border-top-style : hidden;"></td>
		<td align="right" width="98" style="border-left-style : hidden; border-right-style : hidden;  border-top-style : hidden;" >Neto:</td>
		<td align="right" width="103" style="border-left-style : hidden;  border-top-style : hidden;" ><? echo number_format($totalA-$totalD,2,',','.');?></td>
		<td align="right" width="103" style="border-left-style : hidden;  border-top-style : hidden;" ></td>
    	</tr>
</tbody>
</table>


<table align="center" border="0">
<br>
<br>
<br>
<TR><TD>_____________________________________</TD></TR>
<TR><td align="center">JEFE. RECURSOS HUMANOS</td></TR>
<tr><TD align="center"><? echo $gerente; ?></TD></tr>
</table>


</div>




</body>
</html>