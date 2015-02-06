<?php 

require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
	$cantidad_registros=40;

	$conectar=conexion();
	$fecha1 = (empty($_REQUEST['fechadesde'])) ? '' : $_REQUEST['fechadesde'];//$_POST['fechadesde'];
	$fecha2 = (empty($_REQUEST['fechahasta'])) ? '' : $_REQUEST['fechahasta'];//$_POST['fechahasta'];
	//$fechadesde = $_POST['fecha11'];
	//$fechahasta = $_POST['fecha22'];
	//$Desde_cod = (empty($_REQUEST['cuentadesde'])) ? '' : $_REQUEST['cuentadesde'];//$_POST['cuentadesde'];
	//$Hasta_cod = (empty($_REQUEST['cuentahasta'])) ? '' : $_REQUEST['cuentahasta'];//$_POST['cuentahasta'];
	$con_emp="SELECT * FROM cwconemp ";
	$result_emp = query($con_emp, $conectar); 
	$row_emp    = @mysql_fetch_array($result_emp);
	$Fecini     = $row_emp["Fecini"];
	$result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
	$array_config  = @mysql_fetch_array($result_config);
	$Sepacta       = $array_config["Sepacta"];
	$Sepacta_len   = strlen($Sepacta);
	
	$del_aux="DELETE FROM cwconaux WHERE Cuenta<>'Z'";
	$result = query($del_aux, $conectar);  
	//echo $result;
   	$result = mysql_query("SELECT * FROM cwconcue ORDER BY Cuenta DESC", $conectar); 
   	//$pag = mysql_num_rows($result);
   	//echo $pag."ASPA";

   	while ($row = @mysql_fetch_array($result)) 
   	{  	
     	$Cuenta  = $row["Cuenta"];
		$Descrip = $row["Descrip"];
		$Nivel   = $row["Nivel"];  
		$Tipo    = $row["Tipo"];     
		//QUERY PARA EL SALDO ANTERIOR
		$temp=split('-',$fecha1);
		$dia=$temp[2];
		$mes=$temp[1];
		$anio=$temp[0];
		if($dia==1&&$mes==1&&$anio==2009)
		{
			$Salantu=0;
		}else
		{
		$result_ant = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta%' AND Fecha BETWEEN '$Fecini' AND '$fecha1'", $conectar); 
		$row_ant = @mysql_fetch_array($result_ant); 
		$Credito = $row_ant["Credsum"];
		$Debito  = $row_ant["Debsum"];
		$Salantu = $Debito - $Credito; //SALDO ANTERIOR HASTA LA FECHA
		}
		$result_sum = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta%' AND Fecha BETWEEN '$fecha1' AND '$fecha2'", $conectar); 
		$row_sum = @mysql_fetch_array($result_sum);
		$Credito = $row_sum["Credsum"];
		$Debito  = $row_sum["Debsum"];
		$Salmes  =  $Debito - $Credito;
		$Salactu = $Salantu + $Salmes;
		$result_insert = mysql_query("INSERT INTO cwconaux (Cuenta, Descrip, Debito, Credito, Salmes, Salant, Salactu, Nivel, Tipo) VALUES ('$Cuenta','$Descrip','$Debito','$Credito','$Salmes','$Salantu','$Salactu', $Nivel, '$Tipo')", $conectar); 
		//echo $result_insert;
   	} //exit(0); 
 /*
	$consulta_pag="select cue.Cuenta,cue.Descrip as Descripcion, dco.Numcom,dco.Fecha,dco.Referen,
	dco.Tiporef,dco.Descrip,dco.Debito,dco.Credito from cwconcue as cue
	left join cwcondco as dco on cue.Cuenta=dco.Cuenta  where cue.Tipo='p' 
	and dco.FechaD >='".$fecha1."' and dco.FechaD <='".$fecha2."' and 
	cue.Cuenta between '".$Desde_cod."'and'".$Hasta_cod."'";
*/
	$consulta_pag="select * from cwconaux";
 	$rs = query($consulta_pag,$conectar);
	
	$num_paginas=obtener_num_paginas($consulta_pag,$cantidad_registros);
	$pagina=obtener_pagina_actual($pagina,$num_paginas);
	//echo $num_paginas;
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
	
	$datos_orden='<br>
	<table width="800" border="0" align="center">
		<tr>
			<td rowspan="3" align="center" valign="top"><img src="Imagenes/ventel.png" width="100" height="60"></td>
			<td width="200" class="texto8" align="left">'.$Nomemp.'</td>
			<td width="300" align="center" class="texto10"><strong>BALANCE DE COMPROBACIÓN</strong></td>
			<td width="200" class="texto10" align="right"><strong>Pág.: '.$pagina.'</strong></td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Sistema de Contabilidad</td>
			<td width="300" align="center" class="texto10">Desde: '.fecha($fecha1).' Hasta: '.fecha($fecha2).'</td>
			<td width="200" class="texto10" align="right">Fecha: '.$Fecha.'</td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Expresado en: Bolivares Fuertes</td>
			<td width="300" align="center" class="texto10"></td>
			<td width="200" class="texto10" align="right">Hora: '.$Hora.'</td>
		</tr>
	</table>
 
<br><br>
	<table width="800" border="0" align="center">
		<tr style="border-bottom-style : outset; border-left-style : outset; border-right-style : outset; border-top-style : outset;">
          	<td width="100" align="left" class="texto10"><strong>Cuenta</strong></td>
			<td width="200" align="left" class="texto10"><strong>Nombre</strong></td>
			<td width="100" align="right" class="texto10"><strong>Saldo Anterior</strong></td>
			<td width="100" align="right" class="texto10"><strong>Debitos</strong></td>
			<td width="100" align="right" class="texto10"><strong>Creditos</strong></td>
			<td width="100" align="right" class="texto10"><strong>Saldo Mes</strong></td>
			<td width="100" align="right" class="texto10"><strong>Saldo Actual</strong></td>
		</tr>
	</table>';
echo $datos_orden;
//cerrar_conexion($conexion);
return $fechaini;
//$pie=pie_inzuvi();
}
function datos_cuenta_t($codigo,$descripcion)
{
	$datos_cuenta='<table width="800" border="0" align="center">
		<tr>
          	<td width="100" align="left" class="texto10"><strong>'.$codigo.'</strong></td>
			<td width="300" align="left" class="texto10"><strong>'.$descripcion.'</strong></td>
			<td width="400" align="right" class="texto10" colspan="5"></td>
   		</tr>
	</table>';
echo $datos_cuenta;
}
function datos_cuenta_p($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{
	$datos_cuenta='<table width="800" border="0" align="center">
		<tr>
          	<td width="100" align="left" class="texto8">'.$codigo.'</td>
			<td width="200" align="left" class="texto8">'.$descripcion.'</td>
			<td width="100" align="right" class="texto8">'.$saldoanterior.'</td>
			<td width="100" align="right" class="texto8">'.$debito.'</td>
			<td width="100" align="right" class="texto8">'.$credito.'</td>
			<td width="100" align="right" class="texto8">'.$saldomes.'</td>
			<td width="100" align="right" class="texto8">'.$saldoactual.'</td>
   		</tr>
	</table>';
echo $datos_cuenta;
}

function datos_cuenta_pt($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
			<td width="100" align="right" colspan="7">___________________________________________________________________________</td>
	</tr>	

	<tr>
			<td width="100" align="left" class="texto8"><strong>TOTAL</strong>
          	<td width="200" align="left" class="texto8"><strong>'.$descripcion.'</strong></td>
			<td width="100" align="right" class="texto8"><strong>'.$saldoanterior.'</strong></td>
			<td width="100" align="right" class="texto8"><strong>'.$debito.'</strong></td>
			<td width="100" align="right" class="texto8"><strong>'.$credito.'</strong></td>
			<td width="100" align="right" class="texto8"><strong>'.$saldomes.'</strong></td>
			<td width="100" align="right" class="texto8"><strong>'.$saldoactual.'</strong></td>
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

$result_niv1 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='1' ORDER BY Cuenta ASC", $conectar); 
$niv1=mysql_num_rows($result_niv1);

while ($row_niv1 = @mysql_fetch_array($result_niv1)) //NIVEL 1
{ 
  $Debito_niv1  = $row_niv1["Debito"];
  $Credito_niv1 = $row_niv1["Credito"];
  $Descrip_niv1 = $row_niv1["Descrip"];
  $Cuenta_niv1 = $row_niv1["Cuenta"]; 

  $Debito_float  = ((real) $Debito_niv1);
  $Credito_float = ((real) $Credito_niv1);
  $Debito_float_format  = number_format($Debito_float,2,',','.');
  $Credito_float_format = number_format($Credito_float,2,',','.');
  $Debito_float_format_niv1  = ((string)$Debito_float_format);
  $Credito_float_format_niv1 = ((string)$Credito_float_format);

  $Salactu_niv1  = $row_niv1["Salactu"];
  $Salantu_niv1  = $row_niv1["Salant"];
		
  $Salactu_float  = ((real) $Salactu_niv1);
  $Salantu_float = ((real) $Salantu_niv1);
  $Salactu_float_format  = number_format($Salactu_float,2,',','.');
  $Salantu_float_format = number_format($Salantu_float,2,',','.');
  $Salactu_float_format_niv1  = ((string)$Salactu_float_format);
  $Salantu_float_format_niv1 = ((string)$Salantu_float_format);
	  
  $Salmes_niv1  = $row_niv1["Salmes"];
  $Salmes_float  = ((real) $Salmes_niv1);
  $Salmes_float_format  = number_format($Salmes_float,2,',','.');
  $Salmes_float_format_niv1  = ((string)$Salmes_float_format);   
   
  if($cont==$cantidad_registros)
  {
   echo "</table><br class=\"saltopagina\">";		
   $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
	echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	$cont=1;	
  }else{$cont++;}
  if($cont<=$cantidad_registros){
	echo "</table>";
  }
  datos_cuenta_t($Cuenta_niv1,$Descrip_niv1);

  $result_niv2 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='2' AND Cuenta LIKE '$Cuenta_niv1%' ORDER BY Cuenta ASC", $conectar); 
  $niv2=mysql_num_rows($result_niv2);
  while ($row_niv2 = @mysql_fetch_array($result_niv2)) //NIVEL 2
  {  	
    $Debito_niv2  = $row_niv2["Debito"];
	$Credito_niv2 = $row_niv2["Credito"];
	$Descrip_niv2 = $row_niv2["Descrip"];
	$Cuenta_niv2  = $row_niv2["Cuenta"];    	
	$Tipo_niv2    = $row_niv2["Tipo"]; 
	
	$Debito_float  = ((real) $Debito_niv2);
	$Credito_float = ((real) $Credito_niv2);
	$Debito_float_format  = number_format($Debito_float,2,',','.');
	$Credito_float_format = number_format($Credito_float,2,',','.');
	$Debito_float_format_niv2  = ((string)$Debito_float_format);
	$Credito_float_format_niv2 = ((string)$Credito_float_format);
	
	$Salactu_niv2  = $row_niv2["Salactu"];
	$Salantu_niv2  = $row_niv2["Salant"];
			
	$Salactu_float  = ((real) $Salactu_niv2);
	$Salantu_float = ((real) $Salantu_niv2);
	$Salactu_float_format  = number_format($Salactu_float,2,',','.');
	$Salantu_float_format = number_format($Salantu_float,2,',','.');
	$Salactu_float_format_niv2  = ((string)$Salactu_float_format);
	$Salantu_float_format_niv2 = ((string)$Salantu_float_format);
		
	$Salmes_niv2  = $row_niv2["Salmes"];
	$Salmes_float  = ((real) $Salmes_niv2);
	$Salmes_float_format  = number_format($Salmes_float,2,',','.');
	$Salmes_float_format_niv2  = ((string)$Salmes_float_format);   
	if ($Tipo_niv2 == 'T')
   	{
	  datos_cuenta_t($Cuenta_niv2,$Descrip_niv2);
	} else if ($Tipo_niv2 == 'P')
   	{
	  datos_cuenta_p($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_float_format_niv2); 
	  $nro_lineas=contar_lineas($Descrip_niv2,25);
	  $cont=$cont+$nro_lineas-1;	
    }

	if($cont==$cantidad_registros)
	{
	  echo "</table><br class=\"saltopagina\">";
	  $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
	  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	  $cont=1;
	}else{$cont++;}
	if($cont<=$cantidad_registros)
	{
	  echo "</table>";
	}	 

    $result_niv3 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='3' AND Cuenta LIKE '$Cuenta_niv2%' ORDER BY Cuenta ASC", $conectar); 
    $niv3=mysql_num_rows($result_niv3);
    while ($row_niv3 = @mysql_fetch_array($result_niv3)) //NIVEL 3
    {  	
	  $Debito_niv3  = $row_niv3["Debito"];
	  $Credito_niv3 = $row_niv3["Credito"];
	  $Descrip_niv3 = $row_niv3["Descrip"];
	  $Cuenta_niv3  = $row_niv3["Cuenta"];    	
	  $Tipo_niv3    = $row_niv3["Tipo"]; 
	
	  $Debito_float  = ((real) $Debito_niv3);
	  $Credito_float = ((real) $Credito_niv3);
	  $Debito_float_format  = number_format($Debito_float,2,',','.');
	  $Credito_float_format = number_format($Credito_float,2,',','.');
	  $Debito_float_format_niv3  = ((string)$Debito_float_format);
	  $Credito_float_format_niv3 = ((string)$Credito_float_format);
	
	  $Salactu_niv3  = $row_niv3["Salactu"];
	  $Salantu_niv3  = $row_niv3["Salant"];
			
	  $Salactu_float  = ((real) $Salactu_niv3);
	  $Salantu_float = ((real) $Salantu_niv3);
	  $Salactu_float_format  = number_format($Salactu_float,2,',','.');
	  $Salantu_float_format = number_format($Salantu_float,2,',','.');
	  $Salactu_float_format_niv3  = ((string)$Salactu_float_format);
	  $Salantu_float_format_niv3 = ((string)$Salantu_float_format);
		
	  $Salmes_niv3  = $row_niv3["Salmes"];
	  $Salmes_float  = ((real) $Salmes_niv3);
	  $Salmes_float_format  = number_format($Salmes_float,2,',','.');
	  $Salmes_float_format_niv3  = ((string)$Salmes_float_format);   
	  if($cont==$cantidad_registros)
	  {
	   echo "</table><br class=\"saltopagina\">";
	   $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);	
	   echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	   $cont=1;
	  }else{$cont++;}
	  if($cont<=$cantidad_registros)
	  {
		echo "</table>";
	  }
	  if ($Tipo_niv3 == 'T')
	  {
	    datos_cuenta_t($Cuenta_niv3,$Descrip_niv3);
	  } else if ($Tipo_niv3 == 'P')
	  {
		datos_cuenta_p($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_float_format_niv3); 
		$nro_lineas=contar_lineas($Descrip_niv3,25);
		$cont=$cont+$nro_lineas-1;
	  } 
	   
      $result_niv4 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='4' AND Cuenta LIKE '$Cuenta_niv3%' ORDER BY Cuenta ASC", $conectar); 
      $niv4=mysql_num_rows($result_niv4);
	  while ($row_niv4 = @mysql_fetch_array($result_niv4)) //NIVEL 4
      {  	
	   $Debito_niv4  = $row_niv4["Debito"];
	   $Credito_niv4 = $row_niv4["Credito"];
	   $Descrip_niv4 = $row_niv4["Descrip"];
	   $Cuenta_niv4  = $row_niv4["Cuenta"];    	
	   $Tipo_niv4    = $row_niv4["Tipo"]; 
		
	   $Debito_float  = ((real) $Debito_niv4);
	   $Credito_float = ((real) $Credito_niv4);
	   $Debito_float_format  = number_format($Debito_float,2,',','.');
	   $Credito_float_format = number_format($Credito_float,2,',','.');
	   $Debito_float_format_niv4  = ((string)$Debito_float_format);
	   $Credito_float_format_niv4 = ((string)$Credito_float_format);
		
	   $Salactu_niv4  = $row_niv4["Salactu"];
	   $Salantu_niv4  = $row_niv4["Salant"];
				
	   $Salactu_float  = ((real) $Salactu_niv4);
	   $Salantu_float = ((real) $Salantu_niv4);
	   $Salactu_float_format  = number_format($Salactu_float,2,',','.');
       $Salantu_float_format = number_format($Salantu_float,2,',','.');
	   $Salactu_float_format_niv4  = ((string)$Salactu_float_format);
	   $Salantu_float_format_niv4 = ((string)$Salantu_float_format);
			
	   $Salmes_niv4  = $row_niv4["Salmes"];
	   $Salmes_float  = ((real) $Salmes_niv4);
	   $Salmes_float_format  = number_format($Salmes_float,2,',','.');
	   $Salmes_float_format_niv4  = ((string)$Salmes_float_format);   
			
	   if($cont==$cantidad_registros)
	   {
	    echo "</table><br class=\"saltopagina\">";
		$Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
		echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
		$cont=1;
 	   }else{$cont++;}
	   if($cont<=$cantidad_registros)
	   {
		echo "</table>";
	   }
       if ($Tipo_niv4 == 'T')
       {
		 datos_cuenta_t($Cuenta_niv4,$Descrip_niv4);	
       } else if ($Tipo_niv4 == 'P')
	   {
	     datos_cuenta_p($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_float_format_niv4); 
		 $nro_lineas=contar_lineas($Descrip_niv4,40);
		 $cont=$cont+$nro_lineas-1;
	   } 

       $result_niv5 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='5' AND Cuenta LIKE '$Cuenta_niv4%' ORDER BY Cuenta ASC", $conectar); 
		$niv5=mysql_num_rows($result_niv5);
        while ($row_niv5 = @mysql_fetch_array($result_niv5)) //NIVEL 5
        {  	
         $Debito_niv5  = $row_niv5["Debito"];
         $Credito_niv5 = $row_niv5["Credito"];
		 $Descrip_niv5 = $row_niv5["Descrip"];
		 $Cuenta_niv5  = $row_niv5["Cuenta"];    	
		 $Tipo_niv5    = $row_niv5["Tipo"]; 
	
		 $Debito_float  = ((real) $Debito_niv5);
		 $Credito_float = ((real) $Credito_niv5);
		 $Debito_float_format  = number_format($Debito_float,2,',','.');
		 $Credito_float_format = number_format($Credito_float,2,',','.');
		 $Debito_float_format_niv5  = ((string)$Debito_float_format);
		 $Credito_float_format_niv5 = ((string)$Credito_float_format);
	
		 $Salactu_niv5  = $row_niv5["Salactu"];
		 $Salantu_niv5  = $row_niv5["Salant"];
			
		 $Salactu_float  = ((real) $Salactu_niv5);
		 $Salantu_float = ((real) $Salantu_niv5);
		 $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		 $Salantu_float_format = number_format($Salantu_float,2,',','.');
		 $Salactu_float_format_niv5  = ((string)$Salactu_float_format);
		 $Salantu_float_format_niv5 = ((string)$Salantu_float_format);
		
		 $Salmes_niv5  = $row_niv5["Salmes"];
		 $Salmes_float  = ((real) $Salmes_niv5);
		 $Salmes_float_format  = number_format($Salmes_float,2,',','.');
		 $Salmes_float_format_niv5  = ((string)$Salmes_float_format);   
		 if($cont==$cantidad_registros)
		 {
		  echo "</table><br class=\"saltopagina\">";
		  $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
		  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
		  $cont=1;
		 }else{$cont++;}
		 if($cont<=$cantidad_registros)
		 {
		  echo "</table>";
		 }
		 if ($Tipo_niv5 == 'T')
		 {
		  datos_cuenta_t($Cuenta_niv5,$Descrip_niv5);
		 } else if ($Tipo_niv5 == 'P')
		 {
		  datos_cuenta_p($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_float_format_niv5); 
		  $nro_lineas=contar_lineas($Descrip_niv5,40);
		  $cont=$cont+$nro_lineas-1;
		 } 
		   
		 $result_niv6 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='6' AND Cuenta LIKE '$Cuenta_niv5%' ORDER BY Cuenta ASC", $conectar); 
		 $niv6=mysql_num_rows($result_niv6);
		 while ($row_niv6 = @mysql_fetch_array($result_niv6)) //NIVEL 6
		 {    	
		 $Debito_niv6  = $row_niv6["Debito"];
		 $Credito_niv6 = $row_niv6["Credito"];
		 $Descrip_niv6 = $row_niv6["Descrip"];
	     $Cuenta_niv6  = $row_niv6["Cuenta"]; 			   
		 $Tipo_niv6    = $row_niv6["Tipo"]; 
				
		 $Debito_float  = ((real) $Debito_niv6);
		 $Credito_float = ((real) $Credito_niv6);
		 $Debito_float_format  = number_format($Debito_float,2,',','.');
		 $Credito_float_format = number_format($Credito_float,2,',','.');
		 $Debito_float_format_niv6  = ((string)$Debito_float_format);
		 $Credito_float_format_niv6 = ((string)$Credito_float_format);
	
		 $Salactu_niv6  = $row_niv6["Salactu"];
		 $Salantu_niv6  = $row_niv6["Salant"];
			
		 $Salactu_float  = ((real) $Salactu_niv6);
		 $Salantu_float = ((real) $Salantu_niv6);
		 $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		 $Salantu_float_format = number_format($Salantu_float,2,',','.');
		 $Salactu_float_format_niv6  = ((string)$Salactu_float_format);
		 $Salantu_float_format_niv6 = ((string)$Salantu_float_format);
		
		 $Salmes_niv6  = $row_niv6["Salmes"];
		 $Salmes_float  = ((real) $Salmes_niv6);
		 $Salmes_float_format  = number_format($Salmes_float,2,',','.');
		 $Salmes_float_format_niv6  = ((string)$Salmes_float_format);   
		 if($cont==$cantidad_registros)
		 {
		  echo "</table><br class=\"saltopagina\">";
		  $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
		  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
		  $cont=1;		
		  }else{$cont++;}
		  if($cont<=$cantidad_registros)
		  {
		    echo "</table>";
		  }
		  if ($Tipo_niv6 == 'T')
		  {
			datos_cuenta_t($Cuenta_niv6,$Descrip_niv6);
		  } else if ($Tipo_niv6 == 'P') 
		  {
		    datos_cuenta_p($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_float_format_niv6); 
			$nro_lineas=contar_lineas($Descrip_niv6,40);
			$cont=$cont+$nro_lineas-1;
		  } 
				
		  $result_niv7 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='7' AND Cuenta LIKE '$Cuenta_niv6%' ORDER BY Cuenta ASC", $conectar); 
		  $niv7=mysql_num_rows($result_niv7);
		  while ($row_niv7 = @mysql_fetch_array($result_niv7)) //NIVEL 7
		  {    	
		  $Debito_niv7  = $row_niv7["Debito"];
		  $Credito_niv7 = $row_niv7["Credito"];
		  $Descrip_niv7 = $row_niv7["Descrip"];
		  $Cuenta_niv7  = $row_niv7["Cuenta"];    	
		  $Tipo_niv7    = $row_niv7["Tipo"]; 
	
		  $Debito_float  = ((real) $Debito_niv7);
		  $Credito_float = ((real) $Credito_niv7);
		  $Debito_float_format  = number_format($Debito_float,2,',','.');
		  $Credito_float_format = number_format($Credito_float,2,',','.');
		  $Debito_float_format_niv7  = ((string)$Debito_float_format);
		  $Credito_float_format_niv7 = ((string)$Credito_float_format);
	
		  $Salactu_niv7  = $row_niv7["Salactu"];
		  $Salantu_niv7  = $row_niv7["Salant"];
			
		  $Salactu_float  = ((real) $Salactu_niv7);
		  $Salantu_float = ((real) $Salantu_niv7);
		  $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		  $Salantu_float_format = number_format($Salantu_float,2,',','.');
		  $Salactu_float_format_niv7  = ((string)$Salactu_float_format);
		  $Salantu_float_format_niv7 = ((string)$Salantu_float_format);
		
		  $Salmes_niv7  = $row_niv7["Salmes"];
		  $Salmes_float  = ((real) $Salmes_niv7);
		  $Salmes_float_format  = number_format($Salmes_float,2,',','.');
		  $Salmes_float_format_niv7  = ((string)$Salmes_float_format);   
		  if($cont==$cantidad_registros)
		  {
		    echo "</table><br class=\"saltopagina\">";
			$Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
			echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
			$cont=1;			
		  }else{$cont++;}
		  if($cont<=$cantidad_registros)
		  {
		  echo "</table>";
		  }
		  if ($Tipo_niv7 == 'T')
		  {
		  datos_cuenta_t($Cuenta_niv7,$Descrip_niv7);
		  } else if ($Tipo_niv7 == 'P')
		  {
		    datos_cuenta_p($Cuenta_niv7,$Descrip_niv7,$Salantu_float_format_niv7,$Debito_float_format_niv7,$Credito_float_format_niv7,$Salmes_float_format_niv7,$Salactu_float_format_niv7); 
			$nro_lineas=contar_lineas($Descrip_niv7,40);
			$cont=$cont+$nro_lineas-1;
		  }     
		
		  $result_niv8 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='8' AND Cuenta LIKE '$Cuenta_niv7%' ORDER BY Cuenta ASC", $conectar);
		  $niv8=mysql_num_rows($result_niv8); 
		  while ($row_niv8 = @mysql_fetch_array($result_niv8)) //NIVEL 8
		  {    	
		  $Debito_niv8  = $row_niv8["Debito"];
		  $Credito_niv8 = $row_niv8["Credito"];
		  $Descrip_niv8 = $row_niv8["Descrip"];
		  $Cuenta_niv8  = $row_niv8["Cuenta"];    	
		  $Tipo_niv8    = $row_niv8["Tipo"]; 
	
		  $Debito_float  = ((real) $Debito_niv8);
		  $Credito_float = ((real) $Credito_niv8);
		  $Debito_float_format  = number_format($Debito_float,2,',','.');
		  $Credito_float_format = number_format($Credito_float,2,',','.');
		  $Debito_float_format_niv8  = ((string)$Debito_float_format);
		  $Credito_float_format_niv8 = ((string)$Credito_float_format);
	
		  $Salactu_niv8  = $row_niv8["Salactu"];
		  $Salantu_niv8  = $row_niv8["Salant"];
			
		  $Salactu_float  = ((real) $Salactu_niv8);
		  $Salantu_float = ((real) $Salantu_niv8);
		  $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		  $Salantu_float_format = number_format($Salantu_float,2,',','.');
		  $Salactu_float_format_niv8  = ((string)$Salactu_float_format);
		  $Salantu_float_format_niv8 = ((string)$Salantu_float_format);
		
		  $Salmes_niv8  = $row_niv8["Salmes"];
		  $Salmes_float  = ((real) $Salmes_niv8);
		  $Salmes_float_format  = number_format($Salmes_float,2,',','.');
		  $Salmes_float_format_niv8  = ((string)$Salmes_float_format);   
		  if($cont==$cantidad_registros)
		  {
		    echo "</table><br class=\"saltopagina\">";
			$Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
			echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
			$cont=1;
		  }else{$cont++;}
		  if($cont<=$cantidad_registros)
		  {
		    echo "</table>";
		  }
		  if ($Tipo_niv8 == 'T')
		  {
		    datos_cuenta_t($Cuenta_niv8,$Descrip_niv8);
		  } else if ($Tipo_niv8 == 'P')
		  {
		    datos_cuenta_p($Cuenta_niv8,$Descrip_niv8,$Salantu_float_format_niv8,$Debito_float_format_niv8,$Credito_float_format_niv8,$Salmes_float_format_niv8,$Salactu_float_format_niv8); 
			$nro_lineas=contar_lineas($Descrip_niv8,25);
			$cont=$cont+$nro_lineas-1;
		  }

		  $result_niv9 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='9' AND Cuenta LIKE '$Cuenta_niv8%' ORDER BY Cuenta ASC", $conectar); 
		  $niv9=mysql_num_rows($result_niv9);
		  while ($row_niv9 = @mysql_fetch_array($result_niv9)) //NIVEL 9
		  {    	
		    $Debito_niv9  = $row_niv9["Debito"];
			$Credito_niv9 = $row_niv9["Credito"];
			$Descrip_niv9 = $row_niv9["Descrip"];
			$Cuenta_niv9  = $row_niv9["Cuenta"];    	
			$Tipo_niv9    = $row_niv9["Tipo"]; 
	
			$Debito_float  = ((real) $Debito_niv9);
			$Credito_float = ((real) $Credito_niv9);
			$Debito_float_format  = number_format($Debito_float,2,',','.');
			$Credito_float_format = number_format($Credito_float,2,',','.');
			$Debito_float_format_niv9  = ((string)$Debito_float_format);
			$Credito_float_format_niv9 = ((string)$Credito_float_format);
	
			$Salactu_niv9  = $row_niv9["Salactu"];
			$Salantu_niv9  = $row_niv9["Salant"];
			
			$Salactu_float  = ((real) $Salactu_niv9);
			$Salantu_float = ((real) $Salantu_niv9);
			$Salactu_float_format  = number_format($Salactu_float,2,',','.');
			$Salantu_float_format = number_format($Salantu_float,2,',','.');
			$Salactu_float_format_niv9  = ((string)$Salactu_float_format);
			$Salantu_float_format_niv9 = ((string)$Salantu_float_format);
		
			$Salmes_niv9  = $row_niv9["Salmes"];
			$Salmes_float  = ((real) $Salmes_niv9);
			$Salmes_float_format  = number_format($Salmes_float,2,',','.');
			$Salmes_float_format_niv9  = ((string)$Salmes_float_format);   
			if($cont==$cantidad_registros)
			{
			  echo "</table><br class=\"saltopagina\">";
			  $Fecini=imprimir_datos($pagina++,$num_paginas,$fecha1,$fecha2,$Desde_cod,$Hasta_cod);
			  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
			  $cont=1;
			}else{$cont++;}
			if($cont<=$cantidad_registros)
			{
			  echo "</table>";
			}
			if ($Tipo_niv9 == 'T')
			{
			  datos_cuenta_t($Cuenta_niv9,$Descrip_niv9);
			} else if ($Tipo_niv9 == 'P')
			{
			  datos_cuenta_p($Cuenta_niv9,$Descrip_niv9,$Salantu_float_format_niv9,$Debito_float_format_niv9,$Credito_float_format_niv9,$Salmes_float_format_niv9,$Salactu_float_format_niv9); 
			  $nro_lineas=contar_lineas($Descrip_niv9,40);
			  $cont=$cont+$nro_lineas-1;
			} 

            $res_posteo_niv9 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv9'", $conectar); 
            $row_posteo_niv9 = @mysql_fetch_array($res_posteo_niv9);
            $Tipo_niv9       = $row_posteo_niv9["Tipo"];
			if ($Tipo_niv9=='T')
			{datos_cuenta_pt($Cuenta_niv9,$Descrip_niv9,$Salantu_float_format_niv9,$Debito_float_format_niv9,$Credito_float_format_niv9,$Salmes_float_format_niv9,$Salactu_float_format_niv9); } 
		  } //FINAL NIVEL 9 
					 
          $res_posteo_niv8 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv8'", $conectar); 
          $row_posteo_niv8 = @mysql_fetch_array($res_posteo_niv8);
          $Tipo_niv8       = $row_posteo_niv8["Tipo"];
          if ($Tipo_niv8=='T') 
		  {datos_cuenta_pt($Cuenta_niv8,$Descrip_niv8,$Salantu_float_format_niv8,$Debito_float_format_niv8,$Credito_float_format_niv8,$Salmes_float_format_niv8,$Salactu_float_format_niv8); } 
		  } //FINAL NIVEL 8  
				
		  $res_posteo_niv7 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv7'", $conectar); 
		  $row_posteo_niv7 = @mysql_fetch_array($res_posteo_niv7);
		  $Tipo_niv7       = $row_posteo_niv7["Tipo"];
		  if ($Tipo_niv7=='T')
		  {datos_cuenta_pt($Cuenta_niv7,$Descrip_niv7,$Salantu_float_format_niv7,$Debito_float_format_niv7,$Credito_float_format_niv7,$Salmes_float_format_niv7,$Salactu_float_format_niv7);}  
		  } //FINAL NIVEL 7  

      	$res_posteo_niv6 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv6'", $conectar); 
      	$row_posteo_niv6 = @mysql_fetch_array($res_posteo_niv6);
      	$Tipo_niv6       = $row_posteo_niv6["Tipo"];
      	if ($Tipo_niv6=='T') 
	  	{datos_cuenta_pt($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_float_format_niv6); } 
	    } //FINAL NIVEL 6  
			
      $res_posteo_niv5 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv5'", $conectar); 
      $row_posteo_niv5 = @mysql_fetch_array($res_posteo_niv5);
      $Tipo_niv5       = $row_posteo_niv5["Tipo"];
      if ($Tipo_niv5=='T') 
	  {datos_cuenta_pt($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_float_format_niv5); } 
      } //FINAL NIVEL 5 
			
    $res_posteo_niv4 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv4'", $conectar); 
    $row_posteo_niv4 = @mysql_fetch_array($res_posteo_niv4);
    $Tipo_niv4       = $row_posteo_niv4["Tipo"];
    //echo "<strong>";
	if ($Tipo_niv4=='T') {datos_cuenta_pt($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_float_format_niv4); } 
	} //FINAL NIVEL 4 
		
    $res_posteo_niv3 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv3'", $conectar); 
    $row_posteo_niv3 = @mysql_fetch_array($res_posteo_niv3);
    $Tipo_niv3       = $row_posteo_niv3["Tipo"];
    if ($Tipo_niv3=='T') 
	{datos_cuenta_pt($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_float_format_niv3); } 
	} //FINAL NIVEL 3 
		
       $res_posteo_niv2 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv2'", $conectar); 
       $row_posteo_niv2 = @mysql_fetch_array($res_posteo_niv2);
       $Tipo_niv2       = $row_posteo_niv2["Tipo"];
       //echo "<strong>";  
	   if ($Tipo_niv2=='T') 
		{datos_cuenta_pt($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_float_format_niv2); } 
     } //FINAL NIVEL 2 
	
     $res_posteo_niv1 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv1'", $conectar); 
     $row_posteo_niv1 = @mysql_fetch_array($res_posteo_niv1);
	 $Tipo_niv1       = $row_posteo_niv1["Tipo"];
     //echo "<strong>";
	 if ($Tipo_niv1=='T') 
	{datos_cuenta_pt($Cuenta_niv1,$Descrip_niv1,$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Salactu_float_format_niv1); } 
	} //FINAL NIVEL 1 
 //QUERY PARA EL SALDO ANTERIOR TOTAL
	$temp=split('-',$fecha1);
	$dia=$temp[2];
	$mes=$temp[1];
	$anio=$temp[0];
	if($dia==1&&$mes==1&&$anio==2009)
	{
		$Salantu_tot=0;
	}else
	{
   $result_ant_tot = mysql_query("SELECT SUM( `Salant` ) AS Antsum FROM cwconaux where Tipo='p'", $conectar); 
   $row_ant_tot = @mysql_fetch_array($result_ant_tot); 
   //$Credito = $row_ant_tot["Credsum"];
   //$Debito  = $row_ant_tot["Debsum"];
   $Salantu_tot = $row_ant_tot["Antsum"]; //$Debito - $Credito; //SALDO ANTERIOR HASTA LA FECHA TOTAL
	}
   $result_sum_tot = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwconaux where Tipo='p'", $conectar); 
   $row_sum_tot = @mysql_fetch_array($result_sum_tot);
   $Credito_tot = $row_sum_tot["Credsum"];
   $Debito_tot  = $row_sum_tot["Debsum"];
   $Salmes_tot  = $Debito_tot - $Credito_tot;
   $Salactu_tot = $Salantu_tot  + $Salmes_tot ;

   $Descrip_tot = 'TOTAL GENERAL';

   $Debito_float  = ((real) $Debito_tot);
   $Credito_float = ((real) $Credito_tot);
   $Debito_float_format  = number_format($Debito_float,2,',','.');
   $Credito_float_format = number_format($Credito_float,2,',','.');
   $Debito_float_format_tot  = ((string)$Debito_float_format);
   $Credito_float_format_tot = ((string)$Credito_float_format);

   $Salactu_float  = ((real) $Salactu_tot);
   $Salantu_float = ((real) $Salantu_tot);
   $Salactu_float_format  = number_format($Salactu_float,2,',','.');
   $Salantu_float_format = number_format($Salantu_float,2,',','.');
   $Salactu_float_format_tot  = ((string)$Salactu_float_format);
   $Salantu_float_format_tot = ((string)$Salantu_float_format);
	  
   $Salmes_float  = ((real) $Salmes_tot);
   $Salmes_float_format  = number_format($Salmes_float,2,',','.');
   $Salmes_float_format_tot  = ((string)$Salmes_float_format);   

{datos_cuenta_pt($Descrip_tot,$Descrip_tot,$Salantu_float_format_tot,$Debito_float_format_tot,$Credito_float_format_tot,$Salmes_float_format_tot,$Salactu_float_format_tot); } 

?>
<?  cerrar_conexion($conectar);?>

</div>

</body>
</html>

<?
//De aqui pa bajo arreglar...
?>


