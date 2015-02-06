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


<?php 

include ("../header.php");
?>
<script language="JavaScript" type="text/javascript">
function insertAtCursor(myField, myValue) 
{
//IE support
if (document.selection) 
	{
	myField.focus();
	sel = document.selection.createRange();
	sel.text = myValue;
	}
//MOZILLA/NETSCAPE support
else if (typeof(myField.selectionStart) == 'number')
	{
	var startPos = myField.selectionStart;
	var endPos = myField.selectionEnd;
	myField.value = myField.value.substring(0, startPos)+ myValue+ myField.value.substring(endPos, myField.value.length);
	}
// OTHERS	
else 
	{
	myField.value += myValue;
	}	
}

</script>
<?
	include ("func_bd.php");
	include ("../lib/common.php");
	//$conexion = conexion();
	$var_sql = "SELECT imagen_izq, imagen_der, recibonom FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = fetch_array($rs);

	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$observacion = $row_rs['recibonom'];
	//$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);
	//cerrar_conexion($Conn);
	
 $nomina_id=$_GET['nomina_id'];
 $codtp=$_GET['codt'];

$consulta3 = "SELECT periodo_ini, periodo_fin, periodo FROM nom_nominas_pago WHERE codnom = '".$nomina_id."' AND codtip = '".$codtp."'";
$result5 = sql_ejecutar($consulta3);
$fetch5 = fetch_array($result5);



$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$ciudad=$row[ciu_emp];
$gerente=$row[ger_rrhh];


$query="select * from nomvis_per_movimiento where codnom='".$nomina_id."' and tipnom='".$_SESSION['codigo_nomina']."' ";		
$result_lote=sql_ejecutar($query);	


?>
</head>

<BODY>

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
<form name="frmIntegrantes" method="post" style="width:750px" action="">

<div id="area_impresion">
<?
	$contador=1;
while($fila=fetch_array($result_lote))
{

$registro_id=$fila['ficha'];
$query="select * from nompersonal where ficha = '$registro_id' and tipnom=$_SESSION[codigo_nomina]";
$result=sql_ejecutar($query);	
$fila = fetch_array ($result);	
$cargo_id=$fila['codcargo'];
$ingreso=$fila['fecing'];

$query="select des_car from nomcargos where cod_car = '$cargo_id'";		
$result=sql_ejecutar($query);	
$row = fetch_array ($result);	
$nompre_cargo=$row[des_car];
$sub_total_dedu=0;


?>
<br>


<? 
	//echo $encabezado;
	$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='754' align='center' border='0'>
		<TR>
			<TD align='right'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD align='right'><strong>P&#225;g.: &nbsp;$contador</strong></TD>
		</TR>
	</TABLE>";
	echo $datos;	
 ?>

  <table width="754" height="106" border="0">
    <tr>
      <td>
        <p align="center" class="Estilo7">RECIBO DE PAGO </p>
        <table width="754" style="border-bottom-style : solid; border-left-style : solid; border-right-style : solid; border-top-style : solid;" border="0">
          <tr>
            <td align="center"  width="150" >Cedula:</td>
		<td align="center" colspan="3">Nombre y Apellido:</td>
		
            <td align="center" width="">Ficha:</td>
          </tr>
          <tr>
            <td align="center"><strong><?php echo number_format($fila[cedula]); ?></strong></td>
            <td align="center" colspan="3"><strong><?php echo $fila[apenom];  ?></strong></td>
		
            <td align="center"><strong><?php echo $fila[ficha];  ?></strong></td>
          </tr>
         </table>
<table width="754" style="border-top-style : none;" border="0">
		 <tr>
            <td align="center" width="150">Fecha Ingreso:</td>
            <td align="center" width="120">Sueldo/Salario:</td>
            <td align="center" colspan="3" >Cargo:</td>
          </tr>
          <tr>
            <td align="center"><strong><?php 
			
			echo date("d/m/Y",strtotime($ingreso)); 
			?>
			</strong></td>
	<td align="center" ><strong><?php echo number_format($fila[suesal],2,',','.'); ?></strong></td>
            <td align="center" colspan="3"><strong><?php 
			
			$query="select cod_car,des_car from nomcargos where cod_car='".$fila[codcargo]."'";
			$result=sql_ejecutar($query);
  			$row = mysql_fetch_array($result);

			echo $row[des_car]; 
			?>

            </strong></td>
          </tr>
	</table>
	<br>
<table width="754" border="0">
          <tr>
            
            <td align="center"><strong>Periodo de Pago de <?echo $termino?> </strong></td> 
	<td align="center" ><strong>Banco/Cuenta:</strong></td>
          </tr>
          <tr>
            <td align="center" ><strong><?echo $_SESSION['nomina'];?> -- DESDE:&nbsp;<?echo fecha($fetch5['periodo_ini'])?> HASTA:&nbsp;<?echo fecha($fetch5['periodo_fin']); if($fetch5['periodo']!=0){echo " SEMANA ".$fetch5['periodo'];}?></strong></td>
            <td align="center" ><strong><?php 
			
			$query="select cod_ban,des_ban from nombancos where cod_ban='".$fila[codbancob]."'";
			$resultado=sql_ejecutar($query);
			$row = mysql_fetch_array($resultado);
			echo $row[des_ban] . ' - ' . $fila[cuentacob];
			
			?></strong></td>
            
          </tr>
          
                  </table>
	<br>
        <table width="754" border="0">
          <tr>
            <td width="396" colspan="2"><div align="center"><strong>Codigo y Descripci&oacute;n de Concepto </strong></div></td>
      
            <td width="89"><div align="center"><strong>Asignacion</strong></div></td>
            <td width="87" colspan="2"><div align="center"><strong>Deduccion</strong></div></td>
		<!--<td width="87" colspan="2"><div align="center"><strong>Patronales</strong></div></td>-->
            
          </tr>
          

		  	<?php 
			
			$query="select * from nom_movimientos_nomina as mn
			inner join
			nompersonal as pe on mn.ficha = pe.ficha
			inner join
			nomconceptos as c on c.codcon = mn.codcon
			where pe.ficha = '$registro_id' and pe.tipnom =".$_SESSION['codigo_nomina']." and mn.codnom= '".$nomina_id."' and mn.tipnom='".$codtp."' and mn.tipcon<>'P'
			group by pe.apenom,pe.ficha,c.formula,c.codcon order by pe.apenom, mn.tipcon";

			$result =sql_ejecutar($query);			
			
			while ($row = mysql_fetch_array($result))
			{
			?>
			          <tr><td width="396" colspan="2"><?php echo $row[codcon] . ' - ' . $row[descrip] ; ?></td>
            
            <td align="right"><?php
			if ($row[tipcon]=='A')
			{
			echo number_format($row[monto],2,',','.');
			$sub_total_asig=$row[monto]+$sub_total_asig;
			}
	  		?>			</td>
            <td width="87" align="right" colspan="2"><?php 
			if ($row[tipcon]=='D')
			{
			echo number_format($row[monto],2,',','.');
			$sub_total_dedu=$row[monto]+$sub_total_dedu;
			}
	  		?>			</td>
           <!--  <td width="87" align="right" colspan="2">--><?/*php 
			if (($row[tipcon]=='P')&&($row['impdet']=='S'))
			{
			echo number_format($row['monto'],2,',','.');
			$sub_total_pat=$row['monto']+$sub_total_pat;
			}
	  		?>			</td>
			</tr>
			<?php*/
			}		
			?>
          
          <tr>
            <td colspan="2"><div align="center"><strong>Subtotales</strong></div></td>
            <td><div align="right"><?php echo number_format($sub_total_asig,2,',','.'); ?></div></td>
            <td width="87" colspan="2"><div align="right"><?php echo number_format($sub_total_dedu,2,',','.'); ?></div></td>
         <!--<td width="87" colspan="2"><div align="right"><?//php echo number_format($sub_total_pat,2,',','.'); ?></div></td>-->
          </tr>
          <tr>
            <td height="22" colspan="2"><div align="center"><strong>Neto a Depositar Bs.:</strong></div></td>
            <td colspan="4"><div align="center"><?php echo number_format($sub_total_asig-$sub_total_dedu,2,',','.'); ?></div></td>
            
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="754" border="1">
          
          <tr>
            <td align="center"><?echo $observacion;?></td>
          </tr>
        </table>

	<table width="754" border="0">
          
          <tr align="center" ><BR><BR>
            <td>__________________</td>
          </tr>
	<tr align="center">
            <td>RECIBIDO CONFORME</td>
          </tr>
        </table>	

        <p><strong><?php // echo $nompre_empresa; ?></strong></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center"> </p></td>
    </tr>
  </table>

<?php echo "<br class=\"saltopagina\">";?>
<br>
<? $contador=$contador+1; $sub_total_asig=0;}?>
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
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</body>
</html>

