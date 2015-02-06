<?php 
session_start();
ob_start();
?>
<?
include("../lib/common.php");
include("../header.php");
include("func_bd.php");



$nomina_id=$_GET['nomina'];
$concepto_id=$_GET['concepto'];
$pagina=1;

$var_sql = "SELECT imagen_izq FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = $row_rs['imagen_izq'];
$var_imagen_der = $row_rs['imagen_der'];
$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);


$consulta="select * from nomconceptos where codcon='".$concepto_id."'";
$resultado=sql_ejecutar($consulta);
$fila_concepto=fetch_array($resultado);



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

<?php 
$consulta_nomina="select * from nom_nominas_pago where codnom='".$nomina_id."' and codtip='".$_SESSION['codigo_nomina']."'";
$resultado_nomina=sql_ejecutar($consulta_nomina);
$fila_nomina=fetch_array($resultado_nomina);
?>

<table align="center">
  <tbody>
    <tr>
      <td align="center" style="font-size : 16px;"><strong>AN&Aacute;LISIS POR CONCEPTO</strong></td>
    </tr>
    <tr>
      <td align="center" style="font-size : 14px;"><strong>CONCEPTO:&nbsp;[<?echo $fila_concepto['codcon']?>]-<?echo $fila_concepto['descrip']?></strong></td>
    </tr>
	<tr>
      <td align="center" style="font-size : 14px;"><strong><?echo $fila_nomina['descrip']?></strong></td>
    </tr>
	<tr>
      <td align="center" style="font-size : 14px;"></td>
    </tr>
  </tbody>
</table>


<table align="center" width="700" >
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
      <td align="left" width="50">Ficha</td>
      <td align="left" width="100">C&eacute;dula</td>
      <td align="center" width="350">Apellidos y Nombres</td>
	  <?PHP if ($fila_concepto['codcon']!=3001){?>
	  <td align="center" width="100">D&iacute;as</td>
	  <?php } else{ ?>
	 <td align="center" width="100">%</td>
	 <?php } ?>
      <td align="center" width="150">Importe</td>
      <td align="center" width="150">Estado</td>
    </tr>
<?
$consulta="select * from nom_movimientos_nomina where codcon='".$concepto_id."' and codnom='".$nomina_id."' and tipnom='".$_SESSION['codigo_nomina']."' order by ficha+0";
$resultado=sql_ejecutar($consulta);
$i=1;
$cuenta=0;

while($fila=fetch_array($resultado)){

	$consulta="select * from nompersonal where ficha='".$fila['ficha']."'";
	$resultado_personal=sql_ejecutar($consulta);
	$fila_personal=mysql_fetch_array($resultado_personal);

	$consulta2="select * from nom_movimientos_nomina where codnom='".$nomina_id."' and tipnom='".$_SESSION['codigo_nomina']."' and ficha='".$fila['ficha']."'";
	$resultado_personal2=sql_ejecutar($consulta2);
	$fila_personal2=mysql_fetch_array($resultado_personal2);
?>
  <tr>
      <td><?echo $fila_personal['ficha'];?></td>
      <td><?echo $fila_personal['cedula']?></td>
      <td><?echo $fila_personal['apenom']?></td>
	  <td align="center"><?echo $fila['valor']?></td>
      <td align="center" ><?echo number_format($fila_personal2['monto'],2,',','.')?></td>
      <td align="center"><?echo $fila_personal['estado']?></td>
    </tr>
<?
$cuenta+=$fila['monto'];
$i++;
$cuenta2=$cuenta2+1;

if($cuenta2>=30)
{
?>
	</tbody>
	</table>
	<br style="page-break-after : always;">
	<?
$cuenta2=0;
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


<table align="center">
  <tbody>
    <tr>
      <td align="center" style="font-size : 16px;"><strong>AN&Aacute;LISIS POR CONCEPTO</strong></td>
    </tr>
    <tr>
      <td align="center" style="font-size : 14px;"><strong>CONCEPTO:&nbsp;[<?echo $fila_concepto['codcon']?>]-<?echo $fila_concepto['descrip']?></strong></td>
    </tr>
  </tbody>
</table>



<table align="center" width="700" >
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
      <td align="center" width="50">#</td>
      <td align="center" width="100">C&eacute;dula</td>
      <td align="center" width="350">Apellidos y Nombres</td>
	  <?PHP if ($fila_concepto['codcon']!=3001){?>
	  <td align="center" width="100">D&iacute;as</td>
	  <?php } else{ ?>
	 <td align="center" width="100">%</td>
	 <?php } ?>
      <td align="center" width="150">Importe</td>
      <td align="center" width="150">Estado</td>
    </tr>

<?
}
}

?>

</tbody>
</table>

<table align="center" width="700"  style="border-bottom-style : double;">
  <tbody>
    <tr >
      <td align="center" width="50"></td>
      <td align="center" width="100"></td>
      <td align="center" width="350"></td>
      <td align="center" width="150"></td>
      <td align="center" width="150"></td>
    </tr>

   <tr>
      <td colspan="5"> <hr  style="border-bottom-style : dotted; border-left-style : dotted; border-right-style : dotted; border-top-style : dotted;"></td>
   </tr>

<tr style="font-weight : bold;">
      
      <td align="right" colspan="3">Total General ----------></td>
      <td align="center"><?echo number_format($cuenta,2,',','.')?></td>
		<td></td>
    </tr>

  </tbody>
</table>
<br>
<br>
<table align="center" width="700" border="1" >
<tbody>
<tr>
<td align="center" height="80" valign="bottom">R.R.H.H.</td>
<td align="center" valign="bottom">FIRMA AUTORIZADA</td>
<td align="center" valign="bottom">FIRMA AUTORIZADA</td>
</tr>
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
