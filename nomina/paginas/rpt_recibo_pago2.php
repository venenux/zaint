


<?php 
	
include ("../header.php");
?>

<script language="JavaScript" type="text/javascript" src="lib/common.js">
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
	$conexion = conexion2();
	$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
	$rs = mysql_query($var_sql,$conexion);
	$row_rs = mysql_fetch_array($rs);
//	$var_encabezado1 = $row_rs['encabezado1'];
//	$var_encabezado2 = $row_rs['encabezado2'];
//	$var_encabezado3 = $row_rs['encabezado3'];
//	$var_encabezado4 = $row_rs['encabezado4'];
	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);
	//cerrar_conexion($Conn);
	echo $encabezado;

$registro_id=$_GET['registro_id']. " ";
$codnomn=$_GET['codigo_nomina'];
$consulta="select * from nom_movimientos_nomina where ficha='".$registro_id."' AND codnom = '".$codnomn."'";
$resultado=mysql_query($consulta,$conexion);
$fila=mysql_fetch_array($resultado);
$nomina_id=$fila['codnom'];
$codti = $_GET['codt'];
$query="select * from nom_nominas_pago where codnom = '".$nomina_id."' AND codtip = '".$codti."' ";	
$result2=mysql_query($query,$conexion);	
$fila2 = mysql_fetch_array($result2);



$query="select * from nomempresa";		
$result=mysql_query($query,$conexion);	
$row = mysql_fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$ciudad=$row[ciu_emp];
$gerente=$row[ger_rrhh];


$query="select * from nompersonal where ficha = '".$registro_id."'";

$result=mysql_query($query,$conexion);	
$fila = mysql_fetch_array ($result);	
$cargo_id=$fila['codcargo'];
$ingreso=$fila['fecing'];

$query="select des_car from nomcargos where cod_car = '".$cargo_id."'";		
$result=mysql_query($query,$conexion);	
$row = mysql_fetch_array ($result);	
$nompre_cargo=$row[des_car];
?>
</head>

<BODY>

<form name="frmIntegrantes" method="post" style="width:750px" action="">

<div id="area_impresion">

  <table width="754" height="106" border="0">
    <tr>
      <td><p align="center" class="Estilo1">&nbsp;</p>
        <p align="center" class="Estilo7">RECIBO DE PAGO </p>
        <table width="754" border="1">
          <tr>
            <td align="center"  width="100" >Cedula:</td>
		<td align="center" colspan="3">Nombre y Apellido:</td>
		
            <td align="center" width="">Ficha:</td>
          </tr>
          <tr>
            <td align="center"><strong><?php echo number_format($fila['cedula']); ?></strong></td>
            <td align="center" colspan="3"><strong><?php echo $fila['apenom'];  ?></strong></td>
		
            <td align="center"><strong><?php echo $fila[ficha];  ?></strong></td>
          </tr>
         </table>
<table width="754" style="border-top-style : none;" border="1">
		 <tr>
            <td align="center" width="100">Fecha Ingreso:</td>
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
			
			$query="select cod_car,des_car from nomcargos where cod_car='".$fila['codcargo']."'";
			$result=mysql_query($query,$conexion);	
  			$row = mysql_fetch_array($result);

			echo $row[des_car]; 
			?>

            </strong></td>
          </tr>
	</table>
	<br>
<table width="754" border="1">
          <tr>
            
            <td align="center"><strong>Periodo de Pago de <?echo $termino?> </strong></td> 
	<td align="center" ><strong>Banco/Cuenta:</strong></td>
          </tr>
          <tr>
            <td align="center" ><strong><?echo $_SESSION['nomina'];?> - DESDE:&nbsp;<?echo fecha($fila2['periodo_ini'])?> HASTA:&nbsp;<?echo fecha($fila2['periodo_fin'])?></strong></td>
            <td align="center" ><strong><?php 
			
			$query="select cod_ban,des_ban from nombancos where cod_ban='".$fila['codbancob']."'";
			$resultado=mysql_query($query,$conexion);	
			$row = mysql_fetch_array($resultado);
			echo $row[des_ban] . ' - ' . $fila[cuentacob];
			
			?></strong></td>
            
          </tr>
          
                  </table>
	<br>
        <table width="754" border="1">
          <tr>
            <td width="396" colspan="2"><div align="center"><strong>Codigo y Descripci&oacute;n de Concepto </strong></div></td>
      
            <td width="89"><div align="center"><strong>Asignacion</strong></div></td>
            <td width="87" colspan="2"><div align="center"><strong>Deduccion</strong></div></td>
            
          </tr>
          

		  	<?php 
			
			$query="select * from nom_movimientos_nomina as mn
			inner join
			nompersonal as pe on mn.ficha = pe.ficha
			inner join
			nomconceptos as c on c.codcon = mn.codcon
			
			where pe.ficha = '$registro_id' and mn.codnom= '".$nomina_id."' and mn.tipnom='".$codti."'
			group by pe.apenom,pe.ficha,c.formula,c.codcon order by pe.apenom, mn.tipcon";

			$result = mysql_query($query,$conexion);	
			
			while ($row = mysql_fetch_array($result))
			{
			?>
			         
				<?if($row['tipcon']!='P'){ ?>
				 <tr><td width="396" colspan="2"><?php echo $row['codcon'] . ' - ' . $row[descrip] ; ?></td>
 				<?}?>           
            <?php
			if (($row['tipcon']=='A')&&($row['impdet']=='S'))
			{
			echo "<td align='right'>";
			echo number_format($row[monto],2,',','.');
			$sub_total_asig=$row[monto]+$sub_total_asig;
			echo "</td>";
			}

	  		?>
			
            
			<?php 
			if (($row['tipcon']=='D')&&($row['impdet']=='S'))
			{
			echo "<td align='right'></td><td align='right' width='87' colspan='2'>";
			echo number_format($row[monto],2,',','.');
			$sub_total_dedu=$row[monto]+$sub_total_dedu;
			echo "</td>";
			}
	  		
            ?>
			</tr>
			<?php
			}		
			?>
          
          <tr>
            <td colspan="2"><div align="center"><strong>Subtotales</strong></div></td>
            <td><div align="right"><?php echo number_format($sub_total_asig,2,',','.'); ?></div></td>
            <td width="87" colspan="2"><div align="right"><?php echo number_format($sub_total_dedu,2,',','.'); ?></div></td>
         
          </tr>
          <tr>
            <td height="22" colspan="2"><div align="center"><strong>Neto a Depositar Bs.:</strong></div></td>
            <td colspan="2"><div align="right"><?php echo number_format($sub_total_asig-$sub_total_dedu,2,',','.'); ?></div></td>
            
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="754" border="1">
          <tr>
            <td width="748"><strong>Observaciones:</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
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

</div>
<table align="center" width="100%">
  <tbody>
    <tr>
      <td align="center"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
    </tr>
  </tbody>
</table>
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</body>
</html>

