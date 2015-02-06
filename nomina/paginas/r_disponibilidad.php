<?
	include('../header.php');
	require_once '../lib/common.php';

	

?>

<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
	<div id="impresion">
	
<?


$pagina=1;

function imprimir_datos($pagina,$num_paginas,$fDesde,$fHasta)
{
	$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='762' align='center' border='0'>
		<TR>	
			<TD align='left'><img src='../imagenes/logo_inzuvi.jpg'/></TD>
			<TD align='right'>
			<table>
			<tr>
			<td><strong>Fecha: </strong>$date1</td>	
			</TR>
			<tr>
			<td><strong>Hora: </strong>$date2</td>	
			</TR>
			<tr>
			<td><strong>Pág.: &nbsp;$pagina</strong></td>	
			</TR>
			</table>
			</TD>
		</TR>
		</TABLE>
		<TABLE width='762' align='center' border='0'>
		<TR><br>
			<TD align='center'><strong><h3>DISPONIBILIDAD DE LAS CUENTAS BANCARIAS</h3></strong></TD>
		</TR>
	</TABLE>";
	echo $datos;
}

imprimir_datos($pagina++,$num_paginas,$fDesde,$fHasta);

?>

<table width="762" align="center"  border="1">
  <thead>
    <tr height="30">
      <th width="250" align="left" style="border-right-style : hidden;">BANCO</th>
      <th align="left" style="border-right-style : hidden;">No. DE CUENTA</th>
      <th width="228">MONTO EN LIBRO BANCO</th>
    </tr>
  </thead>
</table>
<br>
<table width="762" align="center"  border="0">
  <tbody>

	<?
		$consulta="SELECT descripcion, cuenta, saldo FROM bancos";	
		$resultado=mysql_query($consulta,conexion());
		while($datos=mysql_fetch_array($resultado))
		{
			echo "<tr>
			<td align='left' width='250' >$datos[descripcion]</td><td align='left'>$datos[cuenta]</td><td width='228' align='center'>".number_format($datos['saldo'], 2, ',', '.')."</td>
			</tr>";		
		}
	?>

  </tbody>
</table>

<br>
<br>
<br>
<br>
<table width="762" align="center"  border="1">
	<TR>
	<TD colspan="3" align="right"><strong>TOTAL GENERAL Bs.:</strong></TD>
	</TR>	
	<TR height="60">
	<TD valign="top"><strong>Elaborado Por:</strong></TD>
	<TD valign="top"><strong>Revisado Por:</strong></TD>
	<TD valign="top"><strong>Recibido Por:</strong></TD>
	</TR>
</table>

</div>