<?php 
session_start();
ob_start();
?>
<?
include("../lib/common.php");
include("../header.php");
include("func_bd.php");



$nomina_id=$_GET['nomina'];

$pagina=1;
$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = mysql_fetch_array($rs);
//	$var_encabezado1 = $row_rs['encabezado1'];
//	$var_encabezado2 = $row_rs['encabezado2'];
//	$var_encabezado3 = $row_rs['encabezado3'];
//	$var_encabezado4 = $row_rs['encabezado4'];
	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);
	//cerrar_conexion($Conn);
	






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

echo $encabezado;//encabezado($nomina_id, $pagina);
?>


<table align="center">
  <tbody>
    <tr>
      <td align="center">REPORTE DE LEY DE POL&Iacute;TICA HABITACIONAL</td>
    </tr>
   
  </tbody>
</table>
<br>


<table align="center" width="800" >
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
      <td align="center" width="20">#</td>
      <td align="center" width="50">C&eacute;dula</td>
      <td align="center" width="250">Apellidos y Nombres</td>
      <td align="center" width="80">Fec. Ingreso</td>
		<td align="center" width="80">Fec. Nac.</td>
      <td align="center" width="80">Ap. Empleado</td>
		<td align="center" width="80">Ap. Empresa</td>
		
		<td align="center" width="80">Total General</td>
    </tr>
<?
$consulta="select * from nomvis_per_movimiento where codnom='".$nomina_id."'";
$resultado=sql_ejecutar($consulta);
$i = $cont = 1;
while($fila=mysql_fetch_array($resultado)){

	$consulta="select * from nompersonal where ficha='".$fila['ficha']."'";
	$resultado_personal=sql_ejecutar($consulta);
	$fila_personal=mysql_fetch_array($resultado_personal);
?>
  <tr>
      <td><?echo $i;?></td>
      <td><?echo $fila_personal['cedula']?></td>
      <td><?echo $fila_personal['apenom']?></td>
		<td align="center"><?echo fecha($fila_personal['fecing'])?></td>
		<td align="center"><?echo fecha($fila_personal['fecnac'])?></td>
		<td align="center"><?

$ap_empleado=$fila_personal['suesal']*0.01;
echo number_format($ap_empleado,2,',','.');
?></td>
		<td align="center"><?
$ap_empresa=$fila_personal['suesal']*0.02;
echo number_format($ap_empresa,2,',','.');
?></td>
      
      <td align="center"><?$total=$ap_empleado+$ap_empresa;
echo number_format($total,2,',','.');?></td>
    </tr>
<?

$i++;
$cont++;

if($cont>=35)
{
	$cont = 1;
?>
  </tbody>
</table>
<br style="page-break-after : always;">
<?

echo $encabezado;//encabezado($nomina_id, $pagina);
?>


<table align="center">
  <tbody>
    <tr>
      <td align="center">REPORTE DE LEY DE POL&Iacute;TICA HABITACIONAL</td>
    </tr>
   
  </tbody>
</table>
<br>

<table align="center" width="800" >
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
      <td align="center" width="20">#</td>
      <td align="center" width="50">C&eacute;dula</td>
      <td align="center" width="250">Apellidos y Nombres</td>
      <td align="center" width="80">Fec. Ingreso</td>
		<td align="center" width="80">Fec. Nac.</td>
      <td align="center" width="80">Ap. Empleado</td>
		<td align="center" width="80">Ap. Empresa</td>
		
		<td align="center" width="80">Total General</td>
    </tr>

<?
}
}

?>

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