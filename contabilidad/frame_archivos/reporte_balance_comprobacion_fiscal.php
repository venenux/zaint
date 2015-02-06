<?php 

require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
	$cantidad_registros=40;

	$conectar=conexion();
	$fecha1 = (empty($_REQUEST['fechadesde'])) ? '' : $_REQUEST['fechadesde'];//$_POST['fechadesde'];
	$fecha2 = (empty($_REQUEST['fechahasta'])) ? '' : $_REQUEST['fechahasta'];//$_POST['fechahasta'];
	
	$mes= substr($fecha2,5,2);
	$anio= substr($fecha2,0,4);
	
	$con_emp="SELECT * FROM cwconemp ";
	$result_emp = query($con_emp, $conectar); 
	$row_emp    = @mysql_fetch_array($result_emp);
	$Fecini     = $row_emp["Fecini"];
	
	$result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
   	$array_config  = @mysql_fetch_array($result_config);
   	$Balpas_fin    = $array_config["Balpas"];
   	$Balact_fin    = $array_config["Balact"];

   	$Sepacta       = $array_config["Sepacta"];
   	$Sepacta_len   = strlen($Sepacta);
	
	$del_aux="DELETE FROM cwconaux WHERE Cuenta<>'Z'";
	$result = query($del_aux, $conectar); 

//for($i=1;$i<2;$i++)
//{
//	$Balact_pas    = $i.$Sepacta; 
	 
   	$result = mysql_query("SELECT * FROM cwconcue WHERE Nivel =1 ORDER BY Fiscaltipo ASC", $conectar); 
   	//$pag = mysql_num_rows($result);
   	//echo $Balact_pas."ASPA";

   	while ($row = @mysql_fetch_array($result)) 
   	{  	
     		$Cuenta  = $row["Cuenta"];
		$Descrip = $row["Descrip"];
		$Nivel   = $row["Nivel"];  
		$Tipo    = $row["Tipo"];     
		//QUERY PARA EL SALDO ANTERIOR
		
		$result_sum = mysql_query("SELECT * FROM cwconhis WHERE Cuenta LIKE '$Cuenta%' AND mes='$mes' and anio='$anio'", $conectar); 
		$row_sum = @mysql_fetch_array($result_sum);
		$Credito = $row_sum["Creditou"];
		$Debito  = $row_sum["Debitou"];
		$Salmes  =  $Debito - $Credito;
		$Salactu = $Salantu + $Salmes;
		if ($Salmes <> 0)
		{
		$result_insert = mysql_query("INSERT INTO cwconaux (Cuenta, Descrip, Debito, Credito, Salmes, Salant, Salactu, Nivel, Tipo) VALUES ('$Cuenta','$Descrip','$Debito','$Credito','$Salmes','$Salantu','$Salactu', $Nivel, '$Tipo')", $conectar);
		} 
		//echo $result_insert;
   	} //exit(0); 
//}
	$consulta_pag="select * from cwconaux";
 	$rs = query($consulta_pag,$conectar);
	
	$num_paginas=obtener_num_paginas($consulta_pag,$cantidad_registros);
	$pagina=obtener_pagina_actual($pagina,$num_paginas);
	//echo $num_paginas;
function imprimir_datos($pagina,$num_paginas,$Nivcue,$mes)
{
	$conexion=conexion();
	$Fecha = date("d/m/Y",time());
  	$Hora  = date("h:i");
	$consulta_emp="SELECT * FROM cwconemp";
  	$res_emp = query($consulta_emp, $conexion); 
  	$row_emp = mysql_fetch_array($res_emp);  
  	$Nomemp = $row_emp["Nomemp"];
	$fechaini = $row_emp["Fechaini"];

	$result_config = mysql_query("SELECT * FROM cwconfig", $conexion);
	$array_config  = @mysql_fetch_array($result_config);
	
	$datos_orden='<br>
	<table width="800" border="0" align="center">
		<tr>
			<td rowspan="4" align="center" valign="top"><img src="../../SiSalud.bmp" width="100" height="60"></td>
			<td width="250" class="texto8" align="left" colspan="2">'.$Nomemp.'</td>
			<td width="200" class="texto10" align="right"><strong>Pág.: '.$pagina.'</strong></td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Sistema de Contabilidad</td>
			<td width="300" align="center" class="texto10"><strong>BALANCE DE COMPROBACIÓN</strong></td>
			<td width="200" class="texto10" align="right">Fecha: '.$Fecha.'</td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Expresado en: Bolivares Fuertes</td>
			<td width="300" align="center" class="texto10">Mes: '.mesaletras($mes).'</td>
			<td width="200" class="texto10" align="right">Hora: '.$Hora.'</td>
		</tr>
	</table>
<br><br>';
echo $datos_orden;
//cerrar_conexion($conexion);
return $fechaini;
//$pie=pie_inzuvi();
}
function datos_cuenta_a($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{
 if($saldoactual<0)
	{$saldoactual=-1*$saldoactual;
	$saldoactual = ((real) $saldoactual);
  	$saldoactual  = number_format($saldoactual,2,',','.');
	$saldoactual="(".$saldoactual.")";
  	}else
	{$saldoactual = ((real) $saldoactual);
  	$saldoactual  = number_format($saldoactual,2,',','.');
  	}
//$saldoactual  = number_format($saldoactual,2,',','.');
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
	<td width="600" align="left" class="texto8"><strong>'.$codigo." ".$descripcion.'</strong></td>
	<td width="100" align="right" class="texto8"><strong>'.$saldoactual.'</strong></td>
	<td width="100" align="right" class="texto8"></td>
	</tr>
	</table>';
	
echo $datos_cuenta;
}
function datos_cuenta_p($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{
	if($saldoactual<0)
	{
		$saldoactual=$saldoactual*-1;
	}	
	$saldoactual  = number_format($saldoactual,2,',','.');
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
	<td width="600" align="left" class="texto8"><strong>'.$codigo." ".$descripcion.'</strong></td>
	<td width="100" align="right" class="texto8"></td>
	<td width="100" align="right" class="texto8"><strong>'.$saldoactual.'</strong></td>
	</tr>
	</table>';
	
echo $datos_cuenta;
}
/*function datos_cuenta_p($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{	if($saldoactual<0)
	{$saldoactual=-1*$saldoactual;
	$saldoactual = ((real) $saldoactual);
  	$saldoactual  = number_format($saldoactual,2,',','.');
	$saldoactual="(".$saldoactual.")";
  	}else
	{$saldoactual = ((real) $saldoactual);
  	$saldoactual  = number_format($saldoactual,2,',','.');
  	}
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
	<td width="50" align="right" class="texto8"></td>
        <td width="550" align="left" class="texto8">'.$descripcion.'</td>
	<td width="100" align="right" class="texto8">'.$saldoactual.'</td>
	<td width="100" align="right" class="texto8"></td>
   	</tr>
	</table>';
echo $datos_cuenta;
}*/
function datos_cuenta_pt($totalDebe,$totalHaber)
{       if($totalHaber<0)
	{$totalHaber=-1*$totalHaber;
	$totalHaber = ((real) $totalHaber);
  	$totalHaber  = number_format($totalHaber,2,',','.');
	$totalHaber="(".$totalHaber.")";
  	}else
	{$totalHaber = ((real) $totalHaber);
  	$totalHaber  = number_format($totalHaber,2,',','.');
  	}
	$totalDebe = ((real) $totalDebe);
  	$totalDebe  = number_format($totalDebe,2,',','.');
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
		<td width="600" align="right"></td>
		<td width="100" align="right" colspan="2">_______________________________</td>
	</tr>	

	<tr>
		<td width="600" align="left" class="texto8"><strong>TOTALES</strong></td>
		<td width="100" align="right" class="texto8"><strong>'.$totalDebe.'</strong></td>
		<td width="100" align="right" class="texto8"><strong>'.$totalHaber.'</strong></td>
   	</tr>
	<tr>
		<td width="600" align="right"></td>
		<td width="100" align="right" colspan="2">==============================</td>
	</tr>
	</table>
	<br>';
echo $datos_cuenta;
}


?>
<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
<div id="impresion">
<?
$pagina=1;
imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes);

//datos_de_orden($var_nomemp,$var_direccion,$var_fecha,$var_nom_und,$var_monto_orden,$var_codigo,$var_dias_credito);
?> 
<!--<table width="800" border="1" align="center">-->
<?
$cont=1;
$result = mysql_query("SELECT * FROM cwconcue WHERE Nivel =1 ORDER BY Fiscaltipo ASC, Cuenta ASC", $conectar); 
   	//$pag = mysql_num_rows($result);
   	//echo $Balact_pas."ASPA";

   	while ($row = @mysql_fetch_array($result)) 
   	{  	
     		$Cuenta  = $row["Cuenta"];
		$Descrip = $row["Descrip"];
		$Nivel   = $row["Nivel"];  
		$Tipo    = $row["Tipo"];     
		$Fiscaltipo    = $row["Fiscaltipo"];
		//QUERY PARA EL SALDO ANTERIOR
		
		$result_sum = mysql_query("SELECT * FROM cwconhis WHERE Cuenta LIKE '$Cuenta%' AND mes='$mes' and anio='$anio'", $conectar); 
		$row_sum = @mysql_fetch_array($result_sum);
		$Credito = $row_sum["Creditou"];
		$Debito  = $row_sum["Debitou"];
		$Salmes  =  $Debito - $Credito;
		$Salactu = $Salantu + $Salmes;
		if (($Salmes <> 0) && ($Fiscaltipo=='A'))
		{
		datos_cuenta_a($Cuenta,$Descrip,$saldoanterior,$Debito,$Credito,$saldomes,$Salactu);
		$totalDebe=$totalDebe+$Salactu;
		} else if (($Salmes <> 0) && ($Fiscaltipo=='P'))
		{
		datos_cuenta_p($Cuenta,$Descrip,$saldoanterior,$Debito,$Credito,$saldomes,$Salactu);
		$totalHaber=$totalHaber+$Salactu;
		}
		//echo $result_insert;
   	}
	datos_cuenta_pt($totalDebe,$totalHaber);


  if($cont>=$cantidad_registros)
  {
    echo "</table><br class=\"saltopagina\">";		
    //echo $encabezado.'<br><br>';
    $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes);	
    echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
    $cont=1;	
  }//echo "Cont: ".$cont;
  if($cont<=$cantidad_registros){
    echo "</table>";
  }

		
	//datos_cuenta_pt($Cuenta_niv1,$Descrip_niv1,$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Salactu_niv1); 
/*
	$Resultado  = 0;
       $Resultado_float  = ((real) $Resultado);
       $Resultado_float_format  = number_format($Resultado_float,2,',','.');
       $Resultado_float_format_print  = ((string)$Resultado_float_format);   

	   datos_cuenta_pt($Cuenta_niv1,'RESULTADO',$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Resultado_float_format_print);

       $Pasivo_y_Resultado  = $Salactu_niv1 + $Resultado;
       $Pasivo_y_Resultado_float  = ((real) $Pasivo_y_Resultado);
       $Pasivo_y_Resultado_float_format  = number_format($Pasivo_y_Resultado_float,2,',','.');
       $Pasivo_y_Resultado_float_format_print  = ((string)$Pasivo_y_Resultado_float_format);   
	   
	   datos_cuenta_pt($Cuenta_niv1,'PASIVO Y RESULTADOS',$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Pasivo_y_Resultado_float_format_print);

       $Capital = 0;
       $Capital_float  = ((real) $Capital);
       $Capital_float_format  = number_format($Capital_float,2,',','.');
       $Capital_float_format_print  = ((string)$Capital_float_format);   

	   datos_cuenta_pt($Cuenta_niv1,'CAPITAL',$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Capital_float_format_print);

       $Total = $Pasivo_y_Resultado + $Capital;
       $Total_float  = ((real) $Total);
       $Total_float_format  = number_format($Total_float,2,',','.');
       $Total_float_format_print  = ((string)$Total_float_format);	   
	   
	   datos_cuenta_pt($Cuenta_niv1,'TOTAL',$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Total_float_format_print);
*/	//}
//} //FINAL NIVEL 1 
 	 
$result_niv1 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='1' ORDER BY Cuenta ASC", $conectar);
while ($row_niv1 = @mysql_fetch_array($result_niv1))
{
	//echo "Pajuo";exit(0);
	if ($row_niv1['Cuenta']=='5.')
	{
		$Ingresos = $row_niv1["Salactu"];
		//echo "Pajuo";exit(0);
	
	}else if ($row_niv1['Cuenta']=='6.')
	{
		$Gastos  = $row_niv1["Salactu"];
       		
	}
	$Resultado=$Ingresos+$Gastos;
}
/*
$Resultado_float  = ((real) $Resultado);
$Resultado_float_format  = number_format($Resultado_float,2,',','.');
$Resultado_float_format_print  = ((string)$Resultado_float_format);   
*/



?>
<?  cerrar_conexion($conectar);?>

</div>

</body>
</html>

<?
//De aqui pa bajo arreglar...
?>


