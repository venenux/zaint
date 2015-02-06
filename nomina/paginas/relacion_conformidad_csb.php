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

$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);


$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$pagina=1;

$consulta="SELECT periodo_ini, periodo_fin FROM nom_nominas_pago WHERE tipnom=$_SESSION[codigo_nomina] AND codnom=$_GET[nomina_id]";
$resultper=sql_ejecutar($consulta);
$fetch_per=fetch_array($resultper);	


?>
<table align="center" width="800">
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
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='LEFT'><strong>CENTRO SIMON BOLIVAR</strong></TD>
			<TD align='right'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='LEFT'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
			<TD align='right'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD></TD>
			<TD align='right'><strong>P&#225;g.: &nbsp;$pagina</strong></TD>
		</TR>
	</TABLE>";
	echo $datos;	
?>

<table width="800" border="0"  align="center">
<tr>
<td align="center" style="font-size : 14px;"><strong>RELACION DE CONFORMIDAD DE PAGO</strong></td>
</tr>
<tr>
<td align="center" style="font-size : 14px;"><strong>LAPSO DEL <?echo fecha($fetch_per['periodo_ini'])?> AL <?echo fecha($fetch_per['periodo_fin'])?></strong></td>
</tr>
</table>

<table width="800" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC" >
<td width="50" height="21" align="right"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div></td>
<td width="70" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">Ced&uacute;la</font></div></td>
<td width="330"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos y Nombres</font></td>
<td width=""><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Firma</font></div>
</div></td>
</tr>

<?php
//operaciones para paginaciones

$query="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' AND estado<>'Egresado' OR estado<>'Vacaciones' order by apenom";		
$result=sql_ejecutar($query);	

//ciclo para mostrar los datos 
$contador=1;
while ($fila = fetch_array($result))
{ 
	
	?>
	<tr>
	<td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	echo $fila['ficha'];
	?>
        </font></div></td>
        <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php
	if(strlen($fila[cedula])==6)
	{
		echo "V-00".$fila[cedula];	
	}
	elseif(strlen($fila[cedula])==7)
	{
		echo "V-0".$fila[cedula];	
	}
	elseif(strlen($fila[cedula])==8)
	{
		echo "V-".$fila[cedula];	
	} 
	 	// cedula de identidad
	?>
        </font></div></td>
        <td ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	echo $fila[apellidos].', '.$fila[nombres];  	// apellidos y nombres
	?>
        </font></td>
        <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">________________________</font></td>
        </tr>
        <?php
		if($contador >= 35)
		{
		
		echo "</table>";
		echo "<br class=\"saltopagina\">";
		
		//echo $encabezado;
		$date1=date('d/m/Y');
		$date2=date('h:i a');	
		$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='LEFT'><strong>CENTRO SIMON BOLIVAR</strong></TD>
			<TD align='right'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='LEFT'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
			<TD align='right'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD></TD>
			<TD align='right'><strong>P&#225;g.: &nbsp;".++$pagina."</strong></TD>
		</TR>
		</TABLE>";
		echo $datos;	
		$contador=1;
		?>
	
		<table width="800" border="0"  align="center">
		<tr>
		<td align="center" style="font-size : 14px;"><strong>RELACION DE CONFORMIDAD DE PAGO</strong></td>
		</tr>
		<tr>
		<td align="center" style="font-size : 14px;"><strong>LAPSO DEL <?echo $fetch_per['periodo_ini']?> AL <?echo $fetch_per['periodo_fin']?></strong></td>
		</tr>
		</table>
		<table width="800" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
		<tr bgcolor="#CCCCCC" >
		<td width="50" height="21" align="right"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div></td>
		<td width="70" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">Ced&uacute;la</font></div></td>
		<td width="330"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos y Nombres</font></td>
		<td width=""><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Firma</font></div>
		</div></td>
		</tr>
		<?
	}
	$contador+=1;
}//fin del ciclo while
  	
?>
          <input name="registro_id" type="hidden" value="">
          <input name="op" type="hidden" value="">
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

