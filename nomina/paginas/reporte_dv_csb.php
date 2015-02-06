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

if(strlen($_GET['mes'])==1)
	$MES.="0".$_GET['mes'];
else
	$MES=$_GET['mes'];
$ANIO=$_GET['anio'];


if($_SESSION['codigo_nomina']=='1')
{
	$codcon=2067;
	//$codcon_pat=3542;
}
elseif($_SESSION['codigo_nomina']=='2')
{
	$codcon=2009;
	//$codcon_pat=3504;
}
elseif($_SESSION['codigo_nomina']=='3')
{
	$codcon=2037;
	//$codcon_pat=2035;
}
elseif($_SESSION['codigo_nomina']=='5')
{
	$codcon=2205;
	//$codcon_pat=3523;
}
elseif($_SESSION['codigo_nomina']=='6')
{
	$codcon=2305;
	//$codcon_pat=3523;
}
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
$date1=date('d/m/Y');
$date2=date('h:i a');	
$datos="<TABLE width='750' align='center' border='0'>
<TR>
<TD align='left'><strong>INVERSIONES SISALUD, C.A.</strong></TD>
<TD align='right'><strong>Fecha: </strong>$date1</TD>
</TR>
<TR>
<TD align='left'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
<TD align='right'><strong>Hora: </strong>$date2</TD>
</TR>
<TR>
<TD align='left'><strong>DESCUENTO VIVIENDA</strong></TD></TD>
<TD align='right'><strong>P&#225;g.: &nbsp;$pagina</strong></TD>
</TR>
</TABLE>";
echo $datos;	
?>

<table width="750" border="0"  align="center">
<tr>
<td align="center" style="font-size : 14px;"><strong>RELACION DE APORTES DEL <?echo $MES."/".$ANIO;?></strong></td>
</tr>
<tr>
<td align="center" style="font-size : 14px;"><strong>NOMINA DE <?echo $_SESSION['nomina']?> </strong></td>
</tr>
</table>


<table align="center" width="750" cellpadding="3">
<tbody>
<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
<td></td>
<td align="center" width="20">CEDULA</td>
<td align="center">APELLIDOS Y NOMBRES</td>
<td align="center">MONTO</td>
<td align="center">EMPRESA</td>
<td align="center">TOTAL</td>
</tr>
<?
$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' order by apenom";
$resultado=sql_ejecutar($consulta);
$numero_reg=num_rows($resultado);
$i=0;
$contador=$total_mov=$total_mov_pat=0;
while($fila=fetch_array($resultado))
{
	
	$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=$_GET[mes] and anio=$_GET[anio] and ficha=$fila[ficha] and tipnom='".$_SESSION['codigo_nomina']."' and codcon='$codcon'";
	$resultado_mov=sql_ejecutar($consulta);
	$fila_mov=fetch_array($resultado_mov);
	
	/*$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=$_GET[mes] and anio=$_GET[anio] and ficha=$fila[ficha] and tipnom='".$_SESSION['codigo_nomina']."' and codcon='$codcon_pat'";
	$resultado_mov_pat=sql_ejecutar($consulta);
	$fila_mov2=fetch_array($resultado_mov_pat);*/
	
	if($fila_mov['monto']!=0)
	{
		$cedula="";
		if($fila['nacionalidad']==0)
			$cedula.="V-";
		else
			$cedula.="E-";
		
		if(strlen($fila['cedula'])==6)
		{
			$cedula.="00";
		}
		elseif(strlen($fila['cedula'])==7)
		{
			$cedula.="0";
		}
		
		$cedula.=$fila['cedula'];
		$fila_mov['monto']+=$fila_mov2['monto'];
		?>
		<tr>
		<td align="center" width="20"><?echo $fila['ficha'];?></td>
		<td align="center"><?echo $cedula?></td>
		<td><?echo $fila['apenom'];?></td>		
		<td align="right"><?echo number_format($fila_mov['monto'],2,',','.')?></td>
		<td align="right"><?echo number_format($fila_mov_pat['monto'],2,',','.')?></td>
		<td align="right"><?echo number_format($fila_mov['monto']+$fila_mov_pat['monto'],2,',','.')?></td>
		</tr>
		<?
		$total_mov+=$fila_mov['monto'];
		$total_mov_pat+=$fila_mov_pat['monto'];
		$i++;
		
	
		if(($contador>=35)&&($i!=$numero_reg))
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
			$datos="<TABLE width='750' align='center' border='0'>
				<TR>
					<TD align='left'><strong>CENTRO SIMON BOLIVAR C.A.</strong></TD>
					<TD align='right'><strong>Fecha: </strong>$date1</TD>
				</TR>
				<TR>
					<TD align='left'><strong>GERENCIA GENERAL DE RECURSOS HUMANOS</strong></TD>
					<TD align='right'><strong>Hora: </strong>$date2</TD>
				</TR>
				<TR>
					<TD align='left'><strong>DESCUENTO VIVIENDA</strong></TD></TD>
					<TD align='right'><strong>P&#225;g.: &nbsp;".++$pagina."</strong></TD>
				</TR>
				</TABLE>";
			echo $datos;	
			?>
			
			<table width="750" border="0"   align="center">
			<tr>
			<td align="center" style="font-size : 14px;"><strong>RELACION DE APORTES DEL <?echo $MES."/".$ANIO;?></strong></td>
			</tr>
			<tr>
			<td align="center" style="font-size : 14px;"><strong>NOMINA DE <?echo $_SESSION['nomina']?> </strong></td>
			</tr>
			</table>
			<table align="center" width="750" cellpadding="3">
			<tbody>
			<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
			<td></td>
			<td align="center" width="20">CEDULA</td>
			<td align="center">APELLIDOS Y NOMBRES</td>
			<td align="center">MONTO</td>
			<td align="center">EMPRESA</td>
			<td align="center">TOTAL</td>
			</tr>
			
			<?
		}
		++$contador;
	}
}
?>
</tbody>
</table>

<table  align="center" width="750" cellpadding="3">
<tbody>
<TR>
<TD align="center"><strong>CANTIDAD DE PERSONAS: <?echo $i;?></strong></TD><td align="center"><strong>TOTAL TRABAJADOR: <?echo number_format($total_mov,2,',','.')?></strong></td><td align="center"><strong>TOTAL EMPRESA: <?echo number_format($total_mov_pat,2,',','.')?></strong></td><td align="center"><strong>TOTAL MONTO: <?echo number_format($total_mov+$total_mov_pat,2,',','.')?></strong></td>
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