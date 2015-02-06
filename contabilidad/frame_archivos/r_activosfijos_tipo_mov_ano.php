<?
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');

/*
	$Conn=conexion_conf();
	$var_sql = "SELECT * FROM parametros";
	$rs = query($var_sql, $Conn);
	$row_rs = fetch_array($rs);
	$var_encabezado1 = $row_rs['encabezado1'];
	$var_encabezado2 = $row_rs['encabezado2'];
	$var_encabezado3 = $row_rs['encabezado3'];
	$var_encabezado4 = $row_rs['encabezado4'];
	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	cerrar_conexion($Conn);
*/

	$lineas = 25;
	
	$fecha1 = $_GET['mes'];
	
	$conexion = conexion();
	
	
function ultimodia($anho,$mes)
{
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) 
   {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   }
   if ($mes == 09) 
   {
   		return 30; 
		break;
   }
   elseif ($mes == 08)
   {
		return 31; 
		break;   	
   }
   switch($mes) {
       case 01: return 31; break;
       case 02: return $dias_febrero; break;
       case 03: return 31; break;
       case 04: return 30; break;
       case 05: return 31; break;
       case 06: return 30; break;
       case 07: return 31; break;
       case 8: return 31; break;
       case 9: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
} 

		$fecm = substr($fecha1,0,2);
		$feca = substr($fecha1,3,4);
	
	$d = ultimodia($feca,$fecm);	
	$fecha = $feca."-".$fecm."-".$d;
	$consultac = "SELECT * FROM activosfijos_tipos ";
	$resultado = query($consultac, $conexion);
	$resultado66 = query($consultac, $conexion);
	if(!$resultado66)
	{	
		?>
		<script type="text/javascript">
		alert("Ud. no tiene activos fijos registrados!!!")
		</script>
		<?
	}
	$paginas = 1;
?>



	<br />

	<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
	<div id="impresion">
	<BR>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td rowspan="4" valign="middle"><img src="../../SiSalud.bmp" width="255" height="104"></td>
      <td><p align="center"><strong><? echo $var_encabezado1?></strong></p></td>
      </tr>
    <tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado2?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado3?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado4?></strong></p></td>
    </tr>
  </tbody>
</table>
	
	<TABLE width="100%" align="center" border="0">
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan="3"><strong>Fecha:</strong> <? echo date('d/m/Y');?></TD>
		</TR>
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan=""><strong></TD>
		</TR>
		<TR>
			<TD align="right" colspan="3"><strong>P&aacute;gina: 1</strong> </TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>ACTIVOS FIJOS </strong></TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>(movimientos totales por tipo)</strong></TD>
		</TR>
		

	</TABLE>
	<BR>
    
     
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;">
    	<TR>
			<TD align=center style="font-size:11px;"><strong>Tipo activo</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Tipo de movimiento</strong></TD>
		  	<!--<TD align=center style="font-size:11px;"><strong>Total compra</strong></TD>-->
			<TD align=right style="font-size:11px;"><strong>Total Dpr.</strong></TD>
			<!--<TD align=center style="font-size:11px;"><strong>CCO</strong></TD>-->
			
			
         </TR>
			<?
				
				$cont = 1;
				$totaldpr=$i=0;
				while ($fila = fetch_array($resultado))
				{	
					$consulta = "SELECT SUM(MONMOV) AS monto FROM activosfijos_movimientos WHERE TIPOACT='".$fila['CODIGOTA']."' and year(FECMOV)='2008'";
					$resultado33=query($consulta,$conexion);
					$fetch33 = fetch_array($resultado33);
					echo '<tr>
					<td align=center style="font-size:10px;"><strong>'.$fila['DESCRIP'].'</strong></td>
					<td align=center style="font-size:10px;"><strong>Depreciacion</strong></td>
					<td align=right style="font-size:10px;"><strong>'.number_format($fetch33['monto'],2,',','.').'</strong></td>
					</tr>';
					$totaldpr+=$fetch33['monto'];
					$i+=1;
				//	
					if ($cont>=$lineas) 
					{						
						echo "</table> ";
						echo "<br class=\"saltopagina\">";
						++$paginas;
?>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td rowspan="4" valign="middle"><img src="<?echo $var_imagen_izq?>" width="75" height="80"></td>
      <td><p align="center"><strong><? echo $var_encabezado1?></strong></p></td>
      <td rowspan="4" valign="middle" align="right"><img src="<? echo $var_imagen_der?>" width="100" height="70"></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado2;?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado3;?></strong></p></td>
    </tr>
    <tr>
      <td><p align="center"><strong><? echo $var_encabezado4;?></strong></p></td>
    </tr>
  </tbody>
</table>
	
	<TABLE width="100%" align="center" border="0">
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan="3"><strong>Fecha:</strong> <? echo date('d/m/Y');?></TD>
		</TR>
		<TR>
			<TD align="left" colspan=""><strong></strong></TD><TD align="right" colspan=""><strong></TD>
		</TR>
		<TR>
			<TD align="right" colspan="3"><strong>P&aacute;gina: <? echo ++$paginas?></strong> </TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>ACTIVOS FIJOS </strong></TD>
		</TR>
		<TR>
			<TD colspan="3" align="center"><strong>(movimientos totales por tipo)</strong></TD>
		</TR>
		

	</TABLE>
	<BR>
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;"> 
		<TR>
			<TD align=center style="font-size:11px;"><strong>Tipo activo</strong></TD>
			<TD align=center style="font-size:11px;"><strong>Tipo de movimiento</strong></TD>
		  	<!--<TD align=center style="font-size:11px;"><strong>Total compra</strong></TD>-->
			<TD align=right style="font-size:11px;"><strong>Total Dpr.</strong></TD>
	</TR>	
			<?
				
					$cont = 1;	
					}
				$cont=$cont + 1;
				}
			 ?>
		</TR>
	</TABLE>
	</TABLE>
	</TABLE>
	<TABLE width="100%" border="0" style="border-style:solid; border-color:#333333;">
	<TR>
	<TD colspan="2" align=center style="font-size:11px;"> Cantidad= <?php echo $i;?></TD>
	
	<td colspan="2" align=center style="font-size:11px;"> Total Dpr= <?php echo number_format($totaldpr,2,',','.')?></td>
	</TR>
	</TABLE>
    <?
   // echo $pie = pie_irem();
	?>
</BODY>
</HTML>