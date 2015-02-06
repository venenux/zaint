<?php 

require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");

	$cantidad_registros=30;

	$conectar=conexion();
	$fecha1 = (empty($_REQUEST['fechadesde'])) ? '' : $_REQUEST['fechadesde'];//$_POST['fechadesde'];
	$fecha2 = (empty($_REQUEST['fechahasta'])) ? '' : $_REQUEST['fechahasta'];//$_POST['fechahasta'];
	//$fechadesde = $_POST['fecha11'];
	//$fechahasta = $_POST['fecha22'];
	$Desde_cod = (empty($_REQUEST['cuentadesde'])) ? '' : $_REQUEST['cuentadesde'];//$_POST['cuentadesde'];
	$Hasta_cod = (empty($_REQUEST['cuentahasta'])) ? '' : $_REQUEST['cuentahasta'];//$_POST['cuentahasta'];
	$Salantu = (empty($_REQUEST['saldoanterior'])) ? '' : $_REQUEST['saldoanterior'];
  	//$cod_centro = (empty($_REQUEST['cod_centro'])) ? '' : $_REQUEST['cod_centro']; 		
  	//$id = (empty($_REQUEST['id'])) ? '' : $_REQUEST['id'];
  	//echo "ID".$id;
	//$var_rows = (empty($_REQUEST['rows'])) ? '' : $_REQUEST['rows'];
			
	$consulta_pag="select cue.Cuenta,cue.Descrip as Descripcion, dco.Numcom,dco.Fecha,dco.Referen,
	dco.Tiporef,dco.Descrip,dco.Debito,dco.Credito from cwconcue as cue
	left join cwcondco as dco on cue.Cuenta=dco.Cuenta  where cue.Tipo='p' 
	and dco.Fecha >='".$fecha1."' and dco.Fecha <='".$fecha2."' and 
	cue.Cuenta between '".$Desde_cod."'and'".$Hasta_cod."'";
	
 	$rs = query($consulta_pag,$conectar);
	
	$num_paginas=obtener_num_paginas($consulta_pag,$cantidad_registros);
	$pagina=obtener_pagina_actual($pagina,$num_paginas);
	
function imprimir_datos($pagina,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod)
{

	$conexion=conexion();
	$Fecha = date("d/m/Y",time());
  	$Hora  = date("h:i");
	$consulta_emp="SELECT * FROM cwconemp";
  	$res_emp = query($consulta_emp, $conexion); 
  	$row_emp = mysql_fetch_array($res_emp);  
  	$Nomemp = $row_emp["Nomemp"];
	$fechaini = $row_emp["Fechaini"];
	if($pagina>$num_paginas)
	{$num_paginas++;}
	$datos_orden='<br>
	<table width="800" border="0" align="center">
		<tr>
			<td rowspan="3" align="center" valign="top"><img src="Imagenes/inzuvi.png" width="100" height="60"></td>
			<td width="200" class="texto8" align="left">'.$Nomemp.'</td>
			<td width="300" align="center" class="texto10"><strong>ANALITICO</strong></td>
			<td width="200" class="texto10" align="right"><strong>Pág.: '.$pagina.'</strong></td>
		</tr>
		<tr>
			<td width=200" class="texto8" align="left">Sistema de Contabilidad</td>
			<td width="300" align="center" class="texto10">Desde: '.fecha($fecha1).' Hasta: '.fecha($fecha2).'</td>
			<td width="200" class="texto10" align="right">Fecha: '.$Fecha.'</td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Expresado en: Bolivares Fuertes</td>
			<td width="300" align="center" class="texto10">Cuenta Inicial:'.$Desde_cod. ' Hasta: '.$Hasta_cod.'</td>
			<td width="200" class="texto10" align="right">Hora: '.$Hora.'</td>
		</tr>
	</table>
 
<br><br>
	<table width="800" border="0" align="center">
		<tr style="border-bottom-style : outset; border-left-style : outset; border-right-style : outset; border-top-style : outset;">
          	<td width="50" align="left" class="texto10"><strong>Fecha</strong></td>
			<td width="50" align="center" class="texto10"><strong>#Comp.</strong></td>
			<td width="50" align="center" class="texto10"><strong>Ref</strong></td>
			<td width="50" align="center" class="texto10"><strong>Tipo Ref.</strong></td>
			<td width="300" align="center" class="texto10"><strong>Movimiento</strong></td>
			<td width="75" align="right" class="texto10"><strong>Saldo Ant.</strong></td>
			<td width="75" align="right" class="texto10"><strong>Debito</strong></td>
			<td width="75" align="right" class="texto10"><strong>Credito</strong></td>
			<td width="75" align="right" class="texto10"><strong>Saldo Act.</strong></td>
   		</tr>
	</table>';
echo $datos_orden;
//cerrar_conexion($conexion);
return $fechaini;
//$pie=pie_inzuvi();
}
function datos_cuenta($codigo,$descripcion,$saldoanterior,$saldoactual)
{
	$datos_cuenta='<table width="800" border="0" align="center">
		<tr>
          	<td width="75" align="left" class="texto8"><strong>'.$codigo.'</strong></td>
			<td width="325" align="left" class="texto8"><strong>'.$descripcion.'</strong></td>
			<td width="100" align="right" class="texto10"><strong>'.$saldoanterior.'</strong></td>
			<td width="100">
			<td width="100">
			<td width="100" align="right" class="texto10"><strong>'.$saldoactual.'</strong></td>
   		</tr>
	</table>';
echo $datos_cuenta;
}
?>
<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
<div id="impresion">
<?

imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);

//datos_de_orden($var_nomemp,$var_direccion,$var_fecha,$var_nom_und,$var_monto_orden,$var_codigo,$var_dias_credito);
?> 
<!--<table width="800" border="1" align="center">-->
<?
$cont=1;

$result_cuenta = mysql_query("SELECT * FROM cwconcue WHERE Tipo='P' AND Cuenta BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Cuenta", $conectar);

$Debito_total  = 0; 
$Credito_total = 0;

if (mysql_num_rows($result_cuenta))
{ 
    while ($row_cuenta = @mysql_fetch_array($result_cuenta)) 
    {  	
     	$Cuenta_bucle  = $row_cuenta["Cuenta"];
		
		$temp=split('-',$fecha1);
		$dia=$temp[2];
		$mes=$temp[1];
		$anio=$temp[0];
		if($dia==1&&$mes==1&&$anio==2008)
		{
			$Salantu=0;
		}else
		{
		$consulta="SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha >='$Fecini' AND Fecha <'$fecha1'";
		//QUERY PARA EL SALDO ANTERIOR
       $result_ant = mysql_query($consulta, $conectar); 
       $row_ant = @mysql_fetch_array($result_ant); 
       $Salantu   = $row_ant["Debsum"] - $row_ant["Credsum"];
		}
		datos_cuenta($row_cuenta["Cuenta"],$row_cuenta["Descrip"],$Salantu,$Salantu);
		$consult="SELECT * FROM cwcondco WHERE Cuenta='$Cuenta_bucle' AND Fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY FechaD,Referen";
		$result = mysql_query($consult, $conectar); 
		//$cont++;//echo $cont;
		//echo $consult;
	  	//echo "Result".$result;
      	//if (mysql_num_rows($result))
       	//{
		while ($row = @mysql_fetch_array($result)) 
        {
			$Fecha_query = $row["FechaD"];
			$Fecha_query = $Fecha_query["8"].$Fecha_query["9"].'/'.$Fecha_query["5"].$Fecha_query["6"].'/'.$Fecha_query["0"].$Fecha_query["1"].$Fecha_query["2"].$Fecha_query["3"];
	
			$Debito  = $row["Debito"];
			$Credito = $row["Credito"];
	
			$Debito_float  = ((real) $Debito);
			$Credito_float = ((real) $Credito);
			$Debito_float_format  = number_format($Debito_float,2,',','.');
			$Credito_float_format = number_format($Credito_float,2,',','.');
			$Debito_float_format  = ((string)$Debito_float_format);
			$Credito_float_format = ((string)$Credito_float_format);
	
			$Salactu = $Salantu + $Debito - $Credito;
			
			$Salactu_float  = ((real) $Salactu);
			$Salantu_float = ((real) $Salantu);
			$Salactu_float_format  = number_format($Salactu_float,2,',','.');
			$Salantu_float_format = number_format($Salantu_float,2,',','.');
			$Salactu_float_format  = ((string)$Salactu_float_format);
			$Salantu_float_format = ((string)$Salantu_float_format);
			
			$Tiporef= $row["Tiporef"];

			echo '<table width="800" border="0" align="center">
			<tr align="center" border="0">
				<td width="40" valign="top" align="left" class="texto8">'.$Fecha_query.'</td>
				<td width="35" valign="top" align="center" class="texto8">'.$row["Numcom"].'</td>
				<td width="70" valign="top" align="left" class="texto8">'.$row["Referen"].'</td>
				<td width="35" valign="top" align="left" class="texto8">'.$Tiporef.'</td>
				<td width="320" valign="top" align="justify" class="texto8" colspan="2">'.$row["Descrip"].'</td>
				<td width="100" valign="top" align="right" class="texto8">'.$Debito_float_format.'</td>
				<td width="100" valign="top" align="right" class="texto8">'.$Credito_float_format.'</td>
				<td width="100" valign="top" align="right" class="texto8">'.$Salactu_float_format.'</td>
			</tr>';
			$nro_lineas=contar_lineas($row["Descrip"],45);
			//echo $nro_lineas;
			$cont=$cont+$nro_lineas-1;
			$Salantu = $Salactu;
			//echo $cont;
			if($cont>=$cantidad_registros)
			{
			echo "</table><br class=\"saltopagina\">";
			if($pagina>$num_paginas)
			{$num_paginas++;	}
			
			//echo $encabezado.'<br><br>';
			$Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
			
			echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
			$cont=1;
		
			}else{$cont++;}
			//echo "Cont: ".$cont;
			if($cont<=$cantidad_registros){
				echo "</table>";
			}
		}
		if($dia==1&&$mes==1&&$anio==2008)
		{
			$Salantu_tot=0;
		}else
		{
		$result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha BETWEEN '$Fecini' AND '$fecha1'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 
         $Salantu_tot   = $row_subtotal["Debsum"] - $row_subtotal["Credsum"];
		}
         $result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha BETWEEN '$fecha1' AND '$fecha2'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 

         $Debito  = $row_subtotal["Debsum"];
         $Credito = $row_subtotal["Credsum"];
	 $saldoactual =	$Debito-$Credito;
         
         $Debito_total  = $Debito_total + $Debito; 
         $Credito_total = $Credito_total + $Credito;

	     //$Debito_float  = ((real) $Debito);
	     //$Credito_float = ((real) $Credito);
	 $Debito_format  = number_format($Debito,2,',','.');
       	 $Credito_format = number_format($Credito,2,',','.');
         $saldoactual_format = number_format($saldoactual,2,',','.');

	 $Debito_float_format  = number_format($Debito_total,2,',','.');
       	 $Credito_float_format = number_format($Credito_total,2,',','.');
      
         
	 $Debito_float_format  = ((string)$Debito_float_format);
	 $Credito_float_format = ((string)$Credito_float_format);

         $result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha BETWEEN '$Fecini' AND '$fecha2'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 
         $Salactu_tot   = $row_subtotal["Debsum"] - $row_subtotal["Credsum"];

         $Salactu_float  = ((real) $Salactu_tot);
         $Salantu_float = ((real) $Salantu_tot);
		 $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		 $Salantu_float_format = number_format($Salantu_float,2,',','.');
		 $Salactu_float_format  = ((string)$Salactu_float_format);
		 $Salantu_float_format = ((string)$Salantu_float_format);
		
		echo '<table width="800" border="0" align="center">
				<tr><td width="200">
					<td width="200" colspan="4" align="right">________________________________________________</td></tr>
				<tr>
					<td width="400" aling="left"><strong>TOTAL DE CUENTA: </strong></td>
					<td width="100" align="right" class="texto8">'.$Salantu_float_format.'</td>
					<td width="100" align="right" class="texto8">'.$Debito_format.'</td>
					<td width="100" align="right" class="texto8">'.$Credito_format.'</td>
					<td width="100" align="right" class="texto8">'.$saldoactual_format.'</td>
                                       
				</tr>
			  </table>'; 
		echo "<br>";
		$cont=$cont+1;
		//echo $cont;
		if($cont>=$cantidad_registros)
		{
			echo "</table><br class=\"saltopagina\">";
			if($pagina>$num_paginas)
			{$num_paginas++;	}
			//echo $encabezado.'<br><br>';
			$Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
			
			echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
			$cont=1;
		
		}else{$cont++;}
			//echo "Cont: ".$cont;
		if($cont<=$cantidad_registros){
			echo "</table>";
		}
	}
}
	echo '<table width="800" border="0" align="center">
				<tr>
					<td width="200">
					<td width="150" colspan="4" align="right">________________________________________________</td></tr>
				<tr>
					<td width="400" aling="left"><strong>TOTAL DE GENERAL: </strong></td>
					<td width="100" aling="left"></td>
					<td width="100" align="right" class="texto8">'.$Debito_float_format.'</td>
					<td width="100" align="right" class="texto8">'.$Credito_float_format.'</td>
					<td width="100" aling="left"></td>
				</tr>
			  </table>'; 
	echo "<br>";

?>
<?  cerrar_conexion($conectar);?>

</div>

</body>
</html>

<?
//De aqui pa bajo arreglar...
?>


