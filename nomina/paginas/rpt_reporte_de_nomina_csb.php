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
include ("../header.php");
include("../lib/common.php");

include ("func_bd.php") ;
?>


<?php 



$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = mysql_fetch_array($rs);

	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);

$tipo=$_GET['tipo'];
$nomina_id=$_GET['nomina_id'];
$codt = $_SESSION['codigo_nomina'];//$_GET['codt'];



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
$result3=sql_ejecutar($query);	
$row = mysql_fetch_array ($result3);	
$nompre_empresa=$row['nom_emp'];
$gerente=$row['ger_rrhh'];

$consulta_vac="SELECT ficha, apenom FROM nompersonal WHERE tipnom =".$codt." and estado='Vacaciones' ORDER BY ficha";
$resultado_vac=sql_ejecutar($consulta_vac);


$query="select per.*,car.* from nompersonal as per join 
nom_movimientos_nomina as nom on (per.ficha = nom.ficha)
left join nomcargos as car on per.codcargo = car.cod_car
where  nom.codnom = '$nomina_id' and nom.tipnom = ".$codt." and per.tipnom =".$codt." group by per.ficha order by per.codnivel4, per.apenom";	

// per.estado = '$estado' and

//echo $query;
$result=sql_ejecutar($query);	
$resultn4=sql_ejecutar($query);

$fetchg=fetch_array($resultn4);

$gertmp=$fetchg['codnivel4'];
$cant_personal=mysql_num_rows($result);

//include ("lib/common.php");
	//$conexion = conexion();
	$var_sql = "SELECT imagen_izq FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = mysql_fetch_array($rs);

	$var_imagen_izq = $row_rs['imagen_izq'];

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
// echo " <table align='left'>	<TR>	<TD> $var_imagen_izq</TD	</TR>	</TABLE>";

// encabezado_general($nomina_id,$pagina,"Nomina General");
$query="select * from nom_nominas_pago where codnom = '".$nomina_id."' AND codtip= '".$codt."' ";		
			$result2=sql_ejecutar($query);	
			$fila2 = fetch_array($result2);
			
?>


<? //echo $encabezado;
$date1=date('d/m/Y'); 
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='right' colspan='2'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right' colspan='2'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD width='600' align='left'><strong>$termino: $nomina_id - $_SESSION[nomina]<strong></TD><TD align='right'><strong>P&#225;g.: &nbsp;</strong>$pagina</TD>
		</TR>
	</TABLE>";
	echo $datos;	

?>
<?if($nomina_id!=""){?>
<table align="center" width="743">
  <tbody>
    <tr>
      <td align="center" colspan="2"><h2>Reporte de <?echo $termino?></h2></td>
    </tr>
    <tr>
	
      <td align="center">Desde: <?echo fecha($fila2['periodo_ini']);?> &nbsp;Hasta: <?echo fecha($fila2['periodo_fin']);?>&nbsp;&nbsp;&nbsp;&nbsp;  Pago: <?echo fecha($fila2['fechapago']); if($fila2['periodo']!=0){echo "&nbsp;&nbsp;&nbsp;SEMANA ".$fila2['periodo'];}?></td>
    </tr>
  </tbody>
</table>
<?}?>




<?php
$contador=1;
$num=1;
while ($fila = fetch_array($result))
{
	$consulta_n4="SELECT descrip FROM nomnivel4 WHERE codorg='".$fila['codnivel4']."'";
	$resultado_n4=sql_ejecutar($consulta_n4);
	$fetchn4=fetch_array($resultado_n4);	
	if($gertmp!=$fila['codnivel4'])
{
?>
	<table width="743" border="0" align="center">
	<TR>
	<TD><strong>Total Gerencia:</strong></TD>
	<td><strong>Total Asignaciones: <?echo number_format($total_asig_gerencia,2,',','.');?></strong></td>
	<td><strong>Total Deducciones: <?echo number_format($total_deduc_gerencia,2,',','.');?></strong></td>
	<td><strong>Total :<?echo number_format(($total_asig_gerencia-$total_deduc_gerencia),2,',','.');?></strong></td>
	</TR>
	</table>	
		
<?
	$gertmp=$fila['codnivel4'];
	$total_asig_gerencia=0;
	$total_deduc_gerencia=0;
	echo "<br class=\"saltopagina\">";
	
	$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='right' colspan='2'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right' colspan='2'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD width='600' align='left'><strong>N&oacute;mina: $nomina_id - $_SESSION[nomina]<strong></TD><TD align='right'><strong>P&#225;g.: &nbsp;</strong>".++$pagina."</TD>
		</TR>
	</TABLE>";
	echo $datos;	

?>

<?if($nomina_id!=""){?>
<table align="center">
  <tbody>
    <tr>
      <td align="center"><h2>Reporte&nbsp;de&nbsp;N&oacute;mina&nbsp;</h2></td>
    </tr>
    
    <tr>
      <td align="center">Desde: <?echo fecha($fila2['periodo_ini'])?> &nbsp;Hasta: <?echo fecha($fila2['periodo_fin'])?>&nbsp;&nbsp;&nbsp;&nbsp;  Pago: <?echo fecha($fila2['fechapago'])?></td>
    </tr>
  </tbody>
</table>
<?}
$contador=1;


}
?>

<TABLE align="center" width="743" border="1">

<tr style="font-weight : bold;">
		
      <td align="center" style="border-right-style : hidden;">
              Concepto
            </td>
		<td align="center" width="18" style="border-left-style : hidden; border-right-style : hidden;">Tipo&nbsp;</td>
     	
      <td align="center" width="98" style="border-left-style : hidden; border-right-style : hidden;" >
              Asignaciones
            </td>
		<td align="center" width="103" style="border-left-style : hidden;" >
              Deducciones
            </td>

		<!--<td align="center" width="103" style="border-left-style : hidden;" >
              Patronales
            </td>-->
    </tr>

</TABLE>
         <table width="743" border="1" align="center">
           <tr>
             <td width="732">
	<table width="732"  border="0">
	<tr><td align="left"><strong>Gerencia: </strong><?echo $fila['codnivel4']."  ".$fetchn4['descrip'];?> </td></tr>
        <tr>
                <td height="22"><span class="Estilo7"><strong>Nombre: </strong> <font face="Arial,Helvetica, sans-serif"><?echo $fila['apellidos'].', '.$fila['nombres'];?>
                </font></span></td>
		<td><span class="Estilo7"><strong>Ficha: </strong> <font face="Arial,Helvetica, sans-serif"><strong><?echo $fila['ficha'];?></strong>
                </font></span></td>
		<!--<td width="200" align="left">Fecha Ingreso: <?//echo fecha($fila['fecing']);?></td>-->
		</tr>
		<TR><td><span class="Estilo7"><font face="Arial, Helvetica, sans-serif"><strong>Cedula:</strong>
                <?echo number_format($fila['cedula'],0,',','.');  ?>
                 </font></span>
		</td></TR>

		<!--<TR><td><span class="Estilo7"><font face="Arial, Helvetica, sans-serif"><strong>Sueldo:</strong>
                <?//echo number_format($fila['suesal'],2,',','.');  ?>
                 </font></span>
		</td></TR>-->

		<tr>
		
		<td><span class="Estilo7"><font face="Arial, Helvetica, sans-serif"><strong>Cargo:</strong>
                <?echo $fila['des_car'];  ?>
                 </font></span>
		</td>
                 
                 
        </tr>
             </table></td>
           </tr>
         </table>



      

         <table width="743" border="1" align="center">
 
    <tr>
	<?php 
	
	$sficha = $fila['ficha'];
	
	$query="select * from nom_movimientos_nomina as mn
	inner join nompersonal as pe on mn.ficha = pe.ficha
	inner join nomconceptos as c on c.codcon = mn.codcon
	where pe.ficha = '".$sficha."' and pe.tipnom='".$codt."' and mn.codnom = '".$nomina_id."' and mn.tipnom = '".$codt."' and mn.tipcon<>'P' order by mn.tipcon,c.codcon";	
	//exit(0); 

	$result1=sql_ejecutar($query);	
	$sub_total_asig=0;
	$sub_total_dedu=0;
	$sub_total_pat=0;
	
  	while ($row = fetch_array($result1))
  	{
	$contador++;
	?>
	<td  style="border-right-style : hidden;" height="22"><?php echo $row[codcon];?></td>
	<td  style="border-left-style : hidden; border-right-style : hidden;"><?php echo $row[descrip];?></td>
	<td width="35" align="center" style="border-left-style : hidden; border-right-style : hidden;"> <?php echo $row[tipcon]; ?></td>
	
	<td width="98" align="right" style="border-left-style : hidden; border-right-style : hidden;"><?php
				if ($row['tipcon']=='A')
				{
				echo number_format($row['monto'],2,',','.');
				$sub_total_asig=$row['monto']+$sub_total_asig;
				$total_asig=$row['monto']+$total_asig;
				$total_asig_gerencia=$row['monto']+$total_asig_gerencia;
				}
				?></td>
	<td width="103" align="right" style="border-left-style : hidden;"><?php 
				if ($row['tipcon']=='D')
				{
				echo number_format($row['monto'],2,',','.');
				$sub_total_dedu=$row['monto']+$sub_total_dedu;
				$total_dedu=$row['monto']+$total_dedu;
				$total_deduc_gerencia=$row['monto']+$total_deduc_gerencia;
				}
				?></td>
			<!--<td width="103" align="right" style="border-left-style : hidden;"><?php 
			/*	if (($row['tipcon']=='P')&&($row['impdet']=='S'))
				{
				echo number_format($row[monto],2,',','.');
				$sub_total_pat=$row[monto]+$sub_total_pat;
				$total_pat=$row[monto]+$total_pat;
				} */
				?></td>-->
	
	
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
      <td width="523"><div align="right"><strong>Total Empleado:</strong></div></td>
      <td width="98" align="right"><?php echo number_format($sub_total_asig,2,',','.'); ?></td>
      <td width="100" align="right"><?php echo number_format($sub_total_dedu,2,',','.'); ?></td>
<!--	<td width="100" align="right"><?php // echo number_format($sub_total_pat,2,',','.'); ?></td>-->
    </tr>
	

  </table>
  <table width="743" border="0" align="center">
    <tr>
      <td width="610" align="right"><div ><strong>Total a cancelar:</strong></div></td>
      <td width="10">&nbsp;</td>
      <td width="203" align="center"><?php echo number_format($sub_total_asig-$sub_total_dedu,2,',','.'); ?></td>
    </tr>
  </table>

<hr  style="border-bottom-style : dotted; border-left-style : dotted; border-right-style : dotted; border-top-style : dotted;">

<?



$salto=0;
if($num==$cant_personal)
{
?>
	<table width="743" border="0" align="center">
	<TR>
	<TD><strong>Total Gerencia:</strong></TD>
	<td><strong>Total Asignaciones: <?echo number_format($total_asig_gerencia,2,',','.');?></strong></td>
	<td><strong>Total Deducciones: <?echo number_format($total_deduc_gerencia,2,',','.');?></strong></td>
	<td><strong>Total :<?echo number_format(($total_asig_gerencia-$total_deduc_gerencia),2,',','.');?></strong></td>
	</TR>
	</table>	
		
<?
	$gertmp=$fila['codnivel4'];
	$total_asig_gerencia=0;
	$total_deduc_gerencia=0;
	echo "<br class=\"saltopagina\">";
	$salto=1;
}
$num++;
if($contador>10)
{
	if($salto!=1)
{
?>

<br  style="page-break-after : always;">  

<?
} //echo $encabezado;
$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='right' colspan='2'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right' colspan='2'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD width='600' align='left'><strong>N&oacute;mina: $nomina_id - $_SESSION[nomina]<strong></TD><TD align='right'><strong>P&#225;g.: &nbsp;</strong>".++$pagina."</TD>
		</TR>
	</TABLE>";
	echo $datos;	

?>

<?if($nomina_id!=""){?>
<table align="center">
  <tbody>
    <tr>
      <td align="center"><h2>Reporte&nbsp;de&nbsp;N&oacute;mina&nbsp;</h2></td>
    </tr>
    
    <tr>
      <td align="center">Desde: <?echo fecha($fila2['periodo_ini'])?> &nbsp;Hasta: <?echo fecha($fila2['periodo_fin'])?>&nbsp;&nbsp;&nbsp;&nbsp;  Pago: <?echo fecha($fila2['fechapago'])?></td>
    </tr>
  </tbody>
</table>
<?}
$contador=1;
}
else
{
	$contador+=1;
}
  }

  ?>

  <table width="743" border="1" align="center">
    <tr>
      <td width="508" height="50"><table width="743" border="0">
          <tr>
            <td width="356"><div align="left"><strong>Cant. de Personas: <?php echo $cant_personal; ?></strong></div></td>
            <td width="169"><div align="right"><strong>Total Generales:</strong></div></td>
            <td width="98"><?php echo number_format($total_asig,2,',','.'); ?></td>
            <td width="102"><?php echo number_format($total_dedu,2,',','.'); ?></td>
          </tr>
        </table>
        <table width="743" border="0">
          <tr>
            <td width="531"><div align="right"><strong>Neto:</strong></div></td>
            <td width="26"><?php echo number_format($total_asig-$total_dedu,2,',','.'); ?></td>
            <td width="172">&nbsp;</td>
          </tr>
		
        </table>
      </td>
    </tr>
	
  </table>

<table align="center" width="743" border="0">
<br>
<br>
<br>
<tr><TD>PREPARADO:<BR><BR><BR></TD><TD>REVISADO:<BR><BR><BR></TD><TD>CONFORMADO:<BR><BR><BR></TD><TD>CONFORMADO:<BR><BR><BR></TD></tr>
<TR><TD>_______________________</TD><TD>_______________________</TD><TD>_______________________</TD><TD>_______________________</TD></TR>
<TR><td align="LEFT">ANALISTA DE NOMINA</td><td align="LEFT">JEFE DPTO. NOMINAS</td><td align="LEFT">GCIA. ADMON. PERSONAL</td><td align="LEFT">GCIA. GRAL. DE RR.HH</td></TR>

<tr><TD><BR><BR><BR><BR><BR><BR>CONFORMADO:<BR><BR><BR></TD><TD><BR><BR><BR><BR><BR><BR>CONFORMADO:<BR><BR><BR></TD><TD><BR><BR><BR><BR><BR><BR>CONFORMADO:<BR><BR><BR></TD><TD><BR><BR><BR><BR><BR><BR>APROBADO:<BR><BR><BR></TD></tr>
<TR><TD>_______________________</TD><TD>_______________________</TD><TD>_______________________</TD><TD>_______________________</TD></TR>
<TR><td align="LEFT">ANALISTA CONTRALORIA</td><td align="LEFT">CONTRALORIA GRAL. INTERNA</td><td align="LEFT">GERENTE GRAL. DE ADMINISTRACION</td><td align="LEFT">PRESIDENTE</td></TR>


</table>

<?php
echo "<br class=\"saltopagina\">";
$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<td align=left>CENTRO SIMON BOLIVAR C.A.</TD>
			<TD align='right' colspan='2'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<td align=left>GERENCIA GENERAL DE RECURSOS HUMANOS</TD>
			<TD align='right' colspan='2'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD width='600' align='left'><strong>N&oacute;mina: $nomina_id - $_SESSION[nomina]<strong></TD><TD align='right'><strong>P&#225;g.: &nbsp;</strong>".++$pagina."</TD>
		</TR>
	</TABLE>";
	echo $datos;
?>
<table align="center" width="743" border="0">
<TR>
<TD align="center"><strong>PERSONAL DE VACACIONES</strong>
</TD>
</TR>
</table>

<table align="center" width="743" border="0">

<?
while($fetchvac=fetch_array($resultado_vac))
{
	?>
	<TR>
	<TD><?echo $fetchvac['ficha']?></TD>
	<TD><?echo $fetchvac['apenom']?></TD>
	</TR>
	<?
}
?>

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

</form>
<p>&nbsp;</p>
</body>
</html>

