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
include ("func_bd.php") ;


$var_sql = "SELECT imagen_izq FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/SiSalud.bmp'.$var_imagen_izq,'../imagenes/dot.JPG'.$var_imagen_der);


$query="select * from nomconceptos";		

$result=sql_ejecutar($query);	
$cant_personal=mysql_num_rows($result);

?>
<form name="frmIntegrantes" method="post" style="width:750px" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"> </font>
  
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
$nomina_id=$_GET['nomina_id'];

//encabezado_configuracion($pagina,"Listado de Conceptos de la Nómina");

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
	<td align="center" style="font-size : 14px;"><strong>LISTADO DE CONCEPTOS</strong></td>
</tr>
</table>

<table width="743"  align="center" border="0">
<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
	<td height="22" >C&oacute;digo</td>
      	<td align="center" >Nombre del Concepto</td>
	<td align="right" width="140">Cta. Contable</td>
	<td align="right" width="145">Cta. Presupuestaria</td>
</tr>
</table>
<table width="743"  align="center" border="0">
<?php
$contador=1;
$num=1;
while ($fila = mysql_fetch_array($result))
{
	++$contador;
	?>
	<tr>
      	<td width="55" height="22" align="center"><?php echo $fila['codcon'];?></td>
      	<td ><?php echo $fila['descrip']; ?></td>
	<td width="140" align="right"><?php echo $fila['ctacon1']; ?></td>
	<td width="145" align="right"><?php echo $fila['ctacon']; ?></td>
	</tr>

<?php 
	if($contador >= 35)
	{
?>

	<br  style="page-break-after : always;">  

<?
		echo "</table> <br><br><br><br>";
		
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
		$contador=1;
		?>
	
		<table width="743" border="0"  align="center">
		<tr>
		<td align="center" style="font-size : 14px;"><strong>LISTADO DE CONCEPTOS</strong></td>
		</tr>
		</table>
		<table width="743"  align="center" border="0">
		<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
		<td height="22" >C&oacute;digo</td>
      		<td align="center" >Nombre del Concepto</td>
		<td align="right" width="140">Cta. Contable</td>
		<td align="right" width="145">Cta. Presupuestaria</td>
		</tr>
		</table>

		<?
		echo "<table width='743'  align='center' border='0'>";
	}
}	  
?>

</table>
  
</div>
<br><br>
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

</form>

</body>
</html>

