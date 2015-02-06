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


$var_sql = "SELECT imagen_izq FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/SiSalud.bmp'.$var_imagen_izq,'../imagenes/dot.JPG'.$var_imagen_der);


$nomina_id=$_GET['nomina'];

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

//encabezado_configuracion($pagina,"Listado de Conceptos de la Nomina");

echo $encabezado;
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

<table width="743" border="0"  align="center">
<tr>
	<td align="center" style="font-size : 14px;"><strong>LISTADO B&#193;SICO</strong></td>
</tr>
</table>





<table align="center" width="1200" cellpadding="3">
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
      <td align="left" width="15">C&oacute;digo</td>
      <td align="left" width="50">C&eacute;dula</td>
      <td align="center" width="600">Apellidos y Nombres</td>
      <td align="center" width="60">Fec. Ingreso</td>
      <td align="center" width="60">Sueldo</td>
	<td align="center" width="400">Cargo</td>
	<td align="center" width="60">Fec. Nac.</td>
	<td align="center" width="50">Compensacion</td>
	<td align="center" width="50">Grado</td>
	<td align="center" width="50">Paso</td>
       </tr>
<?
$consulta="select * from nomvis_per_movimiento where codnom='".$nomina_id."'";
$resultado=sql_ejecutar($consulta);
$i=1;
$contador=0;
while($fila=mysql_fetch_array($resultado)){

	$consulta="select * from nompersonal where ficha='".$fila['ficha']."'";
	$resultado_personal=sql_ejecutar($consulta);
	$fila_personal=mysql_fetch_array($resultado_personal);
// Consulta para General la Compensacion
    $consulta="select valor from nomcampos_adic_personal where ficha='".$fila['ficha']."' and id=7";
	$resultado_adicionalg=sql_ejecutar($consulta);
	$fila_adicional=mysql_fetch_array($resultado_adicionalg);
	
// Consulta para General el Grado
$consulta="select valor from nomcampos_adic_personal where ficha='".$fila['ficha']."' and id=8";
	$resultado_adicionalp=sql_ejecutar($consulta);
	$fila_adicionalg=mysql_fetch_array($resultado_adicionalp);

// Consulta para General el Paso
$consulta="select valor from nomcampos_adic_personal where ficha='".$fila['ficha']."' and id=9";
	$resultado_adicional=sql_ejecutar($consulta);
	$fila_adicionalp=mysql_fetch_array($resultado_adicional);
	
?>
  <tr>
   
      <td><?echo $fila_personal['ficha']?></td>
      <td><?echo $fila_personal['cedula']?></td>
      <td><?echo $fila_personal['apenom']?></td>
		<td><?echo fecha($fila_personal['fecing'])?></td>
		<td><?echo number_format($fila_personal['suesal'],2,',','.')?></td>
		<td><?
$consulta="select * from nomcargos where cod_car='".$fila_personal['codcargo']."'";
$resultado_cargo=sql_ejecutar($consulta);
$fila_cargo=mysql_fetch_array($resultado_cargo);
echo $fila_cargo['des_car']?></td>
      <td align="center" ><?echo fecha($fila_personal['fecnac'])?></td>
     <td align="center"><?echo $fila_adicional['valor']?></td>
	 <td align="center"><?echo $fila_adicionalg['valor']?></td>
	 <td align="center"><?echo $fila_adicionalp['valor']?></td>
    </tr>
<?

$i++;


if($contador>=25)
{
?>
</tbody>
</table>
<br style="page-break-after : always;">
<?
$contador=1;
echo $encabezado;
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
			<TD align='right'><strong>P&#225;g.: &nbsp;".++$pagina."</strong></TD>
		</TR>
	</TABLE>";
	echo $datos;	
?>

<table width="743" border="0"   align="center">
<tr>
	<td align="center" style="font-size : 14px;"><strong>LISTADO B&#193;SICO</strong></td>
</tr>
</table>
<table align="center" width="800" cellpadding="3">
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
	<td align="left" width="15">#</td>
	<td align="center" width="50">C&eacute;dula</td>
	<td align="center" width="250">Apellidos y Nombres</td>
	<td align="center" width="60">Fec. Ingreso</td>
	<td align="center" width="60">Sueldo</td>
	<td align="center" width="200">Cargo</td>
	<td align="center" width="60">Fec. Nac.</td>
	<td align="center" width="50">Conpensacion</td>
	<td align="center" width="50">Grado</td>
	<td align="center" width="50">Paso</td>
    </tr>

<?
}
++$contador;
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