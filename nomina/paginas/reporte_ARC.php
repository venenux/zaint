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

$anio=$_GET[anio];

$var_sql = "SELECT nom_emp, dir_emp, ger_rrhh, tel_emp, rif, imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/SiSalud.bmp'.$var_imagen_izq,'../imagenes/SiSalud.bmp'.$var_imagen_der);

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
$datos="<TABLE width='800' align='center' border='0'>
<TR>
<TD align='center'><strong>COMPROBANTE DE RETENCION</strong></TD>
</tr>
<tr>
<TD align='center'><strong>( AR-C )</strong></TD>
</TR>
<TR>
<TD align='center'><strong>PERIODO: 01/01/$anio AL 31/12/$anio</strong></TD>
</TR>
</TABLE>";
echo $datos;

if($_SESSION['codigo_nomina']==1)
	$codcon=109;
elseif($_SESSION['codigo_nomina']==2)
	$codcon=514;
elseif($_SESSION['codigo_nomina']==3)
	$codcon=607;
elseif($_SESSION['codigo_nomina']==5)
	$codcon=1101;
elseif($_SESSION['codigo_nomina']==6)
	$codcon=1203;

$query="select apenom, cedula, ficha from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' order by  apenom";
$result=sql_ejecutar($query);	

while ($fetch = fetch_array($result))
{
	
	?>
	<table border="0" width="800">
	<TR>
	<TD>BENEFICIARIO DE LA REMUNERACION:</TD>
	</TR>
	<TR>
	<TD>--------------------------------------------------------------</TD>
	</TR>
	<TR>
	<TD><? echo $fetch['apenom']."   V-".$fetch['cedula']?></TD>
	</TR>
	<TR>
	<TD>
	<br>
	AGENTE DE RETENCION:</TD>
	</TR>
	<TR>
	<TD>-------------------------------------</TD>
	</TD>
	<TR>
	<TD><? echo $row_rs['nom_emp']."     ".$row_rs['rif']?></TD>
	</TR>
	<TR>
	<TD><? echo $row_rs['ger_rrhh']?></TD>
	</TR>
	<TR>
	<TD>
	<br>
	DIRECCION DEL AGENTE DE RETENCION:</TD>
	</TR>
	<TR>
	<TD>-----------------------------------------------------------------</TD>
	</TR>
	<TR>
	<TD><? echo $row_rs['dir_emp']?></TD>
	</TR>
	<TR>
	<TD><? echo $row_rs['tel_emp']?></TD>
	</TR>
	</table>

	<table border="0" align="center" width="800">
	<TR>
	<TD align="center">
	<br>
	<br>
	INFORMACION SEGUN AR-I
	</TD>
	</TR>
	<TR>
	<TD align="center">-----------------------------------------------------------------</TD>
	</TR>
	<TR>
	<TD align="center">REMUNERACION&nbsp;&nbsp;&nbsp;&nbsp;DESGRAVAMEN&nbsp;&nbsp;&nbsp;&nbsp;C.FAM.</TD>
	</TR>
	<TR>
	<TD align="center">-----------------------------------------------------------------</TD>
	</TR>
	</table>
	<table border="0" width="800" align="center">
	<TR>
	<TD align="center" width="30">MES</TD>
	<TD align="center" width="100">REMUNERACION</TD>
	<TD align="center" width="30">PORC.</TD>
	<TD align="center" width="100">RETENCION</TD>
	<TD align="center" width="100">TOTAL REMUN.</TD>
	<TD align="center" width="100">RETEN. ACUM.</TD>
	</TR>
	<TR>
	<TD align="left" colspan="6">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</TD>
	</TR>
	<?
	$total_rem=0;
	for($i=1;$i<=12;$i++)
	{
		if($i==1)
			$mes="ENE";
		elseif($i==2)
			$mes="FEB";
		elseif($i==3)
			$mes="MAR";
		elseif($i==4)
			$mes="ABR";
		elseif($i==5)
			$mes="MAY";
		elseif($i==6)
			$mes="JUN";
		elseif($i==7)
			$mes="JUL";
		elseif($i==8)
			$mes="AGO";
		elseif($i==9)
			$mes="SEP";
		elseif($i==10)
			$mes="OCT";
		elseif($i==11)
			$mes="NOV";
		elseif($i==12)
			$mes="DIC";

		$consulta="SELECT SUM(monto) as monto FROM nom_movimientos_nomina WHERE ficha=$fetch[ficha] and codcon<>$codcon and tipnom=$_SESSION[codigo_nomina] and mes=$i and tipcon='A' and anio=$anio";
		$resultado1=sql_ejecutar($consulta);
		$fetch1=fetch_array($resultado1);		
		?>
		<tr>
		<TD align="center"><?echo $mes;?></TD>
		<td align="right"><? if($fetch1['monto']=='') echo "00.0"; else echo $fetch1['monto']; $total_rem+=$fetch1['monto'];?></td>
		<td align="center">00.0</td>
		<td align="center">00.0</td>
		<td align="right"><?echo $total_rem;?></td>
		<td align="center">00.0</td>
		</tr>
		<?
	}
	?>
	<table border="0" width="800" align="center"><TR>
	<TD align="center">
	<br>
	<br>
	<br>
	FIRMA DEL AGENTE DE RETENCION:</TD>
	</TR>
	<TR>
	<TD align="center">-----------------------------------------------------------------</TD>
	</TR>
	</table>
	<?

	echo "<br class=\"saltopagina\">";
	$datos="<TABLE width='800' align='center' border='0'>
	<TR>
	<TD align='center'><strong>COMPROBANTE DE RETENCION</strong></TD>
	</tr>
	<tr>
	<TD align='center'><strong>( AR-C )</strong></TD>
	</TR>
	<TR>
	<TD align='center'><strong>PERIODO: 01/01/$anio AL 31/12/$anio</strong></TD>
	</TR>
	</TABLE>";
	echo $datos;
}//fin del ciclo while
?>
</div>
</body>
</html>