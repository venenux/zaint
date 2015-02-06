<?php 
session_start();
ob_start();
?>
<?
include("../lib/common.php");
include("../header.php");
include("func_bd.php");


$parametro = $_GET['mes'];

$mes = substr($_GET['mes'],0,2);
if($mes == 1)
	$mesl = "Enero";
elseif($mes == 2)
	$mesl = "Febrero";
elseif($mes == 3)
	$mesl = "Marzo";
elseif($mes == 4)
	$mesl = "Abril";
elseif($mes == 5)
	$mesl = "Mayo";
elseif($mes == 6)
	$mesl = "Junio";
elseif($mes == 7)
	$mesl = "Julio";
elseif($mes == 8)
	$mesl = "Agosto";
elseif($mes == 9)
	$mesl = "Septiembre";
elseif($mes == 10)
	$mesl = "Octubre";
elseif($mes == 11)
	$mesl = "Noviembre";
elseif($mes == 12)
	$mesl = "Diciembre";










$pagina=1;
$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
	$rs = sql_ejecutar($var_sql);
	$row_rs = mysql_fetch_array($rs);

	$var_imagen_izq = $row_rs['imagen_izq'];
	$var_imagen_der = $row_rs['imagen_der'];
	$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);
	//cerrar_conexion($Conn);
	


$consulta11 = "select count(mes)as meses from nom_nominas_pago where mes='".$mes."'";
$resultado11=sql_ejecutar($consulta11);
$meses = fetch_array($resultado11);
if($meses['meses']!=4)
{
?>
<script type="text/javascript">
alert("No ha generado las nominas correspondientes para ese mes!!")
window.close()
</script>
<?

}



?>

<table align="center" width="100%">
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

echo $encabezado;//encabezado($nomina_id, $pagina);
?>


<table align="center">
<tbody>
<tr>
	<td align="center"><strong>RELACI&Oacute;N DE APORTES Y COTIZACIONES </strong></td>
</tr>
<tr>
	<td align="center"><strong>AL SEGURO DE PARO FORZOSO</strong></td>
</tr>
<tr>
	<td align="center">Mes de <? echo $mesl." "; echo date('Y');?></td>
</tr>
</tbody>
</table>
<br />

<table align="center" width="800" >
<tbody>
<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold; border-top-style : solid; border-top-width : 1px;">
<td align="center">Correspondiente a Empleados</td>		
</tr>
</tbody>
</table>


<table align="center" width="800" >
  <tbody>
    <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
          
      <td align="center" width="250">Apellidos y Nombres</td>
       <td align="center" width="50">C&eacute;dula</td>
      <td align="center" width="80">Sueldo Mensual</td>
      <td align="center" width="80">Sueldo Base Mensual SPF</td>
		<td align="center" width="80">Aporte Patronal 2% 4.01.06.04.00</td>
      <td align="center" width="80">Cotizaci&oacute;n Trabajador 0.5%</td>
		<td align="center" width="80">Total </td>
		
		
    </tr>
<?
$consulta12 = "select codnom,tipnom from nom_nominas_pago where mes='".$mes."'";
$resultado12=sql_ejecutar($consulta12);

$consulta="select apenom, suesal, ficha, cedula, tipnom from nompersonal ORDER BY ficha, codnivel2";
$resultado=sql_ejecutar($consulta);
$i = $cont = 1;
$j = 0;
while($fila=fetch_array($resultado))
{
	if ($fila['suesal']>3996.10)
		$basespf=3996.10;
	else
		$basespf = $fila['suesal'];
		
	$k=$m1=$m2=0;
	$resultado12=sql_ejecutar($consulta12);
	while($nominas = fetch_array($resultado12))
	{
		//$fila['ficha']." ".$nominas['tipnom']." ".$nominas['codnom']." ";
		$consulta="select monto from nom_movimientos_nomina where cedula='".$fila['cedula']."' and ficha='".$fila['ficha']."'  and codnom='".$nominas['codnom']."' and tipnom = '".$nominas['tipnom']."' and codcon='2002' ";
		$resultado_personal=sql_ejecutar($consulta);
		$fila_personal=fetch_array($resultado_personal);
		if(($fila_personal['monto'])&&($k==0))
		{
			if(($nominas['tipnom'] == 3)&&($j == 0))
			{
				?>                
                <tr>      
                <td colspan="2" align="right"><strong>Total empleados:</strong></td>
                <!--<td></td>-->
                <td align="right"><strong><? echo number_format($totsuel,2,',','.');?></strong></td>
                <td align="right"><strong><? echo number_format($totbasespf,2,',','.');?></strong></td>        
                <td align="right"><strong><? echo number_format($totempr,2,',','.');?></strong></td>        
                <td align="right"><strong><? echo number_format($totempl,2,',','.');?></strong></td>	              
             	<td align="right"><strong><? echo number_format($totaltotal,2,',','.');?></strong></td>
           		</tr>
                
</tbody>
</table><table align="center" width="800" >
<tbody>
<tr style="font-weight : bold; border-top-style : solid; border-top-width : 1px;">
<td align="center">Correspondiente a Obreros</td>		
</tr>
</tbody>
</table>
<table align="center" width="800" >
<tbody>
<tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold; border-top-style : solid; border-top-width : 1px;">
<td align="center" width="250">Apellidos y Nombres</td>
<td align="center" width="50">C&eacute;dula</td>
<td align="center" width="80">Sueldo Mensual</td>
<td align="center" width="80">Sueldo Base Mensual SPF</td>
<td align="center" width="80">Aporte Patronal 2% 4.01.06.12.00</td>
<td align="center" width="80">Cotizaci&oacute;n Trabajador 0.5%</td>
<td align="center" width="80">Total </td>
</tr>
              <?  
                	
				$j++;
				
				$totsuelempl = $totsuel;
				$totbasespfempl = $totbasespf;
				$totemprempl = $totempr;
				$totemplempl = $totempl;
				$totaltotalempl = $totaltotal;	
				
				$totsuel = 0;
				$totbasespf = 0;
				$totempr = 0;
				$totempl = 0;
				$totaltotal = 0;	
			}
			$m1=$fila_personal['monto'];
			$k++;
		}
		elseif($k==1)
		{
			$m2=$m1+$fila_personal['monto'];		
			$k++;
		}
		//echo "<br> ";
	}
	$empresa = $m2*4;
	$empleado = $m1*2;
	
	
?>
  <tr>
      
      
      <td><? echo $fila['apenom']?></td>
      <td><? echo number_format($fila['cedula'],0,',','.');?></td>
		<td align="right"><? echo number_format($fila['suesal'],2,',','.');?></td>
        <td align="right"><? echo number_format($basespf,2,',','.');?></td>
        
        <td align="right"><?
		
		echo number_format($empresa,2,',','.');
		?></td>

		<td align="right"><?
		
		echo number_format($empleado,2,',','.');
		?></td>	
      
      <td align="right"><? $total=$empresa+$empleado;
echo number_format($total,2,',','.');?></td>
    </tr>
	<?
    $totsuel += $fila['suesal'];
	$totbasespf += $basespf;
	$totempr += $empresa;
	$totempl += $empleado;
	$totaltotal += $total; 
		
    $i++;
    $cont++;
    
    if($cont>=24)
    {
        $cont = 1;
    ?>
      </tbody>
    </table>
    
    <?
    echo $pie = pie_irem();
    echo "<br class=\"saltopagina\">";
    echo $encabezado;//encabezado($nomina_id, $pagina);
    ?>
    
    
    <table align="center">
      <tbody>
        <tr>
          <td align="center"><strong>RELACI&Oacute;N DE APORTES Y COTIZACIONES </strong></td>
        </tr>
        <tr>
          <td align="center"><strong>AL SEGURO DE PARO FORZOSO</strong></td>
        </tr>
        <tr>
          <td align="center">Mes de <? echo $mesl." "; echo date('Y');?></td>
        </tr>
       
      </tbody>
    </table>
    <br>
    
    <table align="center" width="800" >
      <tbody>
        <tr style="border-bottom-style : solid; border-bottom-width : 1px; font-weight : bold;">
         
     <td align="center" width="250">Apellidos y Nombres</td>
           <td align="center" width="50">C&eacute;dula</td>
          <td align="center" width="80">Sueldo Mensual</td>
          <td align="center" width="80">Sueldo Base Mensual SPF</td>
          <?
          if($j==0)
          {
          ?>      
            <td align="center" width="80">Aporte Patronal 2% 4.01.06.04.00</td>
           <?
           }
           else
           {
           ?> 
            <td align="center" width="80">Aporte Patronal 2% 4.01.06.12.00</td>		 
            <? 
            }
            ?>
          <td align="center" width="80">Cotizaci&oacute;n Trabajador 0.5%</td>
            <td align="center" width="80">Total </td>
        </tr>
    
    <?
    }
}
?>

<tr>      
<td colspan="2" align="center"><strong>Total obreros:</strong></td>
<!--<td></td>-->
<td align="right"><strong><? echo number_format($totsuel,2,',','.');?></strong></td>      
<td align="right"><strong><? echo number_format($totbasespf,2,',','.');?></strong></td>        
<td align="right"><strong><? echo number_format($totempr,2,',','.');?></strong></td>        
<td align="right"><strong><? echo number_format($totempl,2,',','.');?></strong></td>	              
<td align="right"><strong><? echo number_format($totaltotal,2,',','.');?></strong></td>
</tr>

<tr>      
<td colspan="2" align="center"><strong>Total general:</strong></td>
<!--<td></td>-->
<td align="right"><strong><? echo number_format($totsuel + $totsuelempl,2,',','.');?></strong></td>
<td align="right"><strong><? echo number_format($totbasespf + $totbasespfempl,2,',','.');?></strong></td>        
<td align="right"><strong><? echo number_format($totempr + $totemprempl,2,',','.');?></strong></td>        
<td align="right"><strong><? echo number_format($totempl + $totemplempl,2,',','.');?></strong></td>	              
<td align="right"><strong><? echo number_format($totaltotal + $totaltotalempl,2,',','.');?></strong></td>
</tr>

</tbody>
</table>

<table align="center" width="100%">
  <tbody>
 <tr>
      <td><hr></td>
    </tr>
   
  </tbody>
</table>


<?
echo $pie = pie_irem_rrhh();
?>


</div>


<table align="center" width="100%">
  <tbody>
 <tr>
      <td align="right"></td>
    </tr>
    <tr>
      <td align="right"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
    </tr>

  </tbody>
</table>

</body>
</html>