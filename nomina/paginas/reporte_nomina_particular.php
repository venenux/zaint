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

include("../lib/common.php");
include ("../header.php");
include ("func_bd.php") ;

?>

<SCRIPT language="JavaScript" type="text/javascript">
function imprimir(nombre){
	var ficha = document.getElementById(nombre)
	var ventimp = window.open(' ', 'popimpr','width=10, height=10, TOOLBAR=NO, LOCATION=NO, MENUBAR=NO, SCROLLBARS=NO, RESIZABLE=NO')
	ventimp.document.write( "<LINK href=\"estilos.css\" rel=\"stylesheet\" type=\"text/css\">")
	ventimp.document.write( ficha.innerHTML )
	ventimp.document.close()
ventimp.print()
ventimp.close()
}
</SCRIPT>

<?php 



$tipo=$_GET[tipo];

$ficha=$_GET['ficha'];

$consulta="select * from nom_movimientos_nomina where ficha='".$ficha."'";
$resultado=sql_ejecutar($consulta);
$fila=mysql_fetch_array($resultado);
$nomina_id=$fila['codnom'];
// si el id del la nomina es 0 se procesan todas
// si es mayor solo se proceso la seleccionada
//$nomina_id=0;

$tipo=1;

if ($tipo==1)
{$estado='Activo';}
elseif ($tipo==2)
{$estado='Inactivo';}
elseif ($tipo==3)
{$estado='Jubilado';}
elseif ($tipo==4)
{$estado='Nuevo';}
elseif ($tipo==5)
{$estado='Suspendido';}
elseif ($tipo==6)
{$estado='Vacaciones';}

$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = mysql_fetch_array ($result);	
$nompre_empresa=$row[nom_emp];

$query="select * from 
nompersonal as per
inner join 
nom_movimientos_nomina as nom on per.ficha = nom.ficha
inner join
nomcargos as car on per.codcargo = car.cod_car
where per.estado = '$estado'
and nom.codnom = '$nomina_id'
and per.ficha='$ficha'
group by nom.ficha
order by per.estado,per.apenom,per.tipnom";		

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

encabezado_particular($nomina_id,$pagina);?>


           <?php
$contador=1;
$num=1;
  	while ($fila = mysql_fetch_array($result))
  	{
	?>
         </p>
         <table width="743" border="1" align="center">
           <tr>
             <td width="732"><table width="732"  border="0">
               <tr>
                 <td height="22"><span class="Estilo7"><strong>Trab.: </strong> <font face="Arial, Helvetica, sans-serif">
                   <?echo $fila[cedula]." - ".$fila[apellidos].', '.$fila[nombres];?>
                 </font></span>
					  </td>
					<td width="150" align="right">Num&nbsp;<?=$num?></td>
</tr>
<tr>
<td><span class="Estilo7"><font face="Arial, Helvetica, sans-serif"><strong>Cargo:</strong>
                         <?php 
	  		echo $fila[des_car];
	  	?>
                 </font></span></td>
                 <td width="150" align="right">Fecha Ing.:&nbsp;<?echo fecha($fila['fecing'])?></td>
                 
               </tr>
             </table></td>
           </tr>
         </table>



      

         <table width="743" border="1" align="center">
 <tr style="font-weight : bold;">
		<td height="22" align="center">Cod.</td>
      <td align="center" >Nombre del Concepto</td>
		<td align="center">Unidad</td>
     	<td align="center">Referencia</td>
      <td align="center">Asignaci&oacute;n</td>
		<td align="center" >Deduccion</td>
    </tr>
    <tr>
	<?php 
	
	$sficha = $fila[ficha];
	
	$query="select * from nom_movimientos_nomina as mn
	inner join
	nompersonal as pe on mn.ficha = pe.ficha
	inner join
	nomconceptos as c on c.codcon = mn.codcon
	where pe.ficha = '$sficha' and
	mn.codnom = $nomina_id
	group by pe.apenom,pe.ficha,c.formula,c.codcon order by pe.apenom";	
	
	$result1=sql_ejecutar($query);	
	$sub_total_asig=0;
	$sub_total_dedu=0;
	
  	while ($row = mysql_fetch_array($result1))
  	{
	$contador++;
	?>
      <td width="76" height="22"><?php echo $row[codcon];?></td>
      <td width="314"><?php echo $row[descrip]; ?></td>
      <td width="18"><?php echo $row[unidad]; ?></td>
      <td width="108"><?php echo $row[referencia]; ?></td>
      <td width="98"><?php
			if ($row[tipcon]=='A')
			{
			echo number_format($row[monto],2,',','.');
			$sub_total_asig=$row[monto]+$sub_total_asig;
			$total_asig=$row[monto]+$total_asig;
			}
	  		?></td>
      <td width="103"><?php 
			if ($row[tipcon]=='D')
			{
			echo number_format($row[monto],2,',','.');
			$sub_total_dedu=$row[monto]+$sub_total_dedu;
			$total_dedu=$row[monto]+$total_dedu;
			}
	  		?></td>
    </tr>
		  <?php 
		}	  
	  ?>

  </table>
  <table width="743" border="0" align="center">
    <tr>
      <td width="733" height="17"></td>
    </tr>
  </table>
  <table width="743" border="0" align="center">
    <tr>
      <td width="523"><div align="right"><strong>Total Por Trabajador:</strong></div></td>
      <td width="98"><?php echo number_format($sub_total_asig,2,',','.'); ?></td>
      <td width="100"><?php echo number_format($sub_total_dedu,2,',','.'); ?></td>
    </tr>
	

  </table>
  <table width="743" border="0" align="center">
    <tr>
      <td width="516"><div align="right"><strong>Neto:</strong></div></td>
      <td width="10">&nbsp;</td>
      <td width="203"><?php echo number_format($sub_total_asig-$sub_total_dedu,2,',','.'); ?></td>
    </tr>
  </table>

<hr  style="border-bottom-style : dotted; border-left-style : dotted; border-right-style : dotted; border-top-style : dotted;">

<?
$num++;
if($contador>15){?>

<br  style="page-break-after : always;">  

    <?

encabezado_particular($nomina_id,++$pagina);
$contador=1;
}else{
	$contador+=1;
}
  }

  ?>


  <p>&nbsp;</p>
  <table width="743" border="0" align="center">
    <tr>
      <td width="356" align="right"><p align="center">________________________________</p>
      <p align="center">RECIBI CONFORME </p></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
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

</form>
<p>&nbsp;</p>
</body>
</html>

