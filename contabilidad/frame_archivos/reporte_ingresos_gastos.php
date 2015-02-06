<?php 

require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
	$cantidad_registros=40;

	$conectar=conexion();
	$fecha1 = (empty($_REQUEST['fechadesde'])) ? '' : $_REQUEST['fechadesde'];//$_POST['fechadesde'];
	$fecha2 = (empty($_REQUEST['fechahasta'])) ? '' : $_REQUEST['fechahasta'];//$_POST['fechahasta'];
	$Nivcue = (empty($_REQUEST['nivel_cuenta'])) ? '' : $_REQUEST['nivel_cuenta'];
	$mes = (empty($_REQUEST['mes'])) ? '' : $_REQUEST['mes'];
        $ano = (empty($_REQUEST['ano'])) ? '' : $_REQUEST['ano'];
	
	$con_emp="SELECT * FROM cwconemp ";
	$result_emp = query($con_emp, $conectar); 
	$row_emp    = @mysql_fetch_array($result_emp);
	$Fecini     = $row_emp["Fecini"];
	
	$result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
   	$array_config  = @mysql_fetch_array($result_config);
   	$Balpas_fin    = $array_config["Baling"];
   	$Balact_fin    = $array_config["Baleng"];

   	$Sepacta       = $array_config["Sepacta"];
   	$Sepacta_len   = strlen($Sepacta);
	
	$del_aux="DELETE FROM cwconaux WHERE Cuenta<>'Z'";
	$result = query($del_aux, $conectar); 

for($i=4;$i<=5;$i++)
{
	$Balact_pas    = $i.$Sepacta; 
	 
   	$result = mysql_query("SELECT * FROM cwconcue WHERE Cuenta LIKE '$Balact_pas%' ORDER BY Cuenta DESC", $conectar); 
   	//$pag = mysql_num_rows($result);
   	//echo $pag."ASPA";

   	while ($row = @mysql_fetch_array($result)) 
   	{  	
     	$Cuenta  = $row["Cuenta"];
		$Descrip = $row["Descrip"];
		$Nivel   = $row["Nivel"];  
		$Tipo    = $row["Tipo"];     
		//QUERY PARA EL SALDO ANTERIOR
		
		$result_sum = mysql_query("SELECT * FROM cwconhis WHERE Cuenta LIKE '$Cuenta%' AND mes='$mes' and Anio=$ano", $conectar); 
		$row_sum = @mysql_fetch_array($result_sum);
		$Credito = $row_sum["Creditou"];
		$Debito  = $row_sum["Debitou"];
		if ($i==4 || $i==7){
			$Salmes  = $Credito-$Debito ;
			$Salactu = $Salantu + $Salmes;
		}else{
			$Salmes  = ($Debito - $Credito)*(-1);
			$Salactu = $Salantu + $Salmes;
		}
		if ($Salmes <> 0)
		{
		$result_insert = mysql_query("INSERT INTO cwconaux (Cuenta, Descrip, Debito, Credito, Salmes, Salant, Salactu, Nivel, Tipo) VALUES ('$Cuenta','$Descrip','$Debito','$Credito','$Salmes','$Salantu','$Salactu', $Nivel, '$Tipo')", $conectar);
		} 
		//echo $result_insert;
   	} //exit(0); 
}
	$consulta_pag="select * from cwconaux";
 	$rs = query($consulta_pag,$conectar);
	
	$num_paginas=obtener_num_paginas($consulta_pag,$cantidad_registros);
	$pagina=obtener_pagina_actual($pagina,$num_paginas);
	//echo $num_paginas;
function imprimir_datos($pagina,$num_paginas,$Nivcue,$mes,$ano)
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
	
	if ($Nivcue==1)
	{
		$Nivcue_str = $array_config["Nomniv1"];
	}	else if ($Nivcue==2)
	{
		$Nivcue_str = $array_config["Nomniv2"];  
	}	else if ($Nivcue==3)
	{
		$Nivcue_str = $array_config["Nomniv3"];  
	}	else if ($Nivcue==4)
	{
		$Nivcue_str = $array_config["Nomniv4"];  
	}	else if ($Nivcue==5)
	{
		$Nivcue_str = $array_config["Nomniv5"];  
	}	else if ($Nivcue==6)
	{
		$Nivcue_str = $array_config["Nomniv6"];  
	}	else if ($Nivcue==7)
	{
		$Nivcue_str = $array_config["Nomniv7"];  
	}	else if ($Nivcue==8)
	{
		$Nivcue_str = $array_config["Nomniv8"];  
	}	else if ($Nivcue==9)
	{
		$Nivcue_str = $array_config["Nomniv9"];  
	}
	
	$datos_orden='<br>
	<table width="800" border="0" align="center">
		<tr>
			<td rowspan="4" align="center" valign="top"><img src="../../SiSalud.bmp" width="100" height="60"></td>
			<td width="200" class="texto8" align="left">'.$Nomemp.'</td>
			<td width="300" align="right" class="texto10"></td>
			<td width="200" class="texto10" align="right"><strong>Pág.: '.$pagina.'</strong></td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Sistema de Contabilidad</td>
			<td width="300" align="center" class="texto10"><strong>ESTADO DE GANANCIAS Y PERDIDAS</strong></td>
			<td width="200" class="texto10" align="right">Fecha: '.$Fecha.'</td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Expresado en: Bolivares Fuertes</td>
			<td width="300" align="center" class="texto10">Mes: '.mesaletras($mes).'</td>
                        <td width="300" align="center" class="texto10">A&#241;o: '.$ano.'</td>
			<td width="200" class="texto10" align="right">Hora: '.$Hora.'</td>
		</tr>
		<tr>
			<td width="200" class="texto8" align="left">Nivel: '.$Nivcue_str.'</td>
			<td width="300" align="center" class="texto10"></td>
			<td width="200" class="texto10" align="right"></td>
		</tr>
	</table>
<br><br>';
echo $datos_orden;
//cerrar_conexion($conexion);
return $fechaini;
//$pie=pie_inzuvi();
}
function datos_cuenta_t($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
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
	$datos_cuenta='<table width="800" border="0" align="center">
	<tr>
        <td width="600" align="left" class="texto8"><strong>'.$descripcion.'</strong></td>
	<td width="100" align="right" class="texto8"></td>
	<td width="100" align="right" class="texto8"><strong>'.$saldoactual.'</strong></td>
	</tr>
	</table>';
echo $datos_cuenta;
}
function datos_cuenta_p($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{	
	if($saldoactual<0)
	{	
	$saldoactual=$saldoactual*(-1);
	$saldoactual = ((float) $saldoactual);
  	$saldoactual  = number_format($saldoactual,2,',','.');
	$saldoactual="(".$saldoactual.")";
  	}else
	{
	$saldoactual = ((real) $saldoactual);
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
}
function datos_cuenta_pt($codigo,$descripcion,$saldoanterior,$debito,$credito,$saldomes,$saldoactual)
{       if($saldoactual<0)
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
			<td width="100" align="right" colspan="2">__________________________________________________________________________________________________________________</td>
	</tr>	

	<tr>
			<td width="100" align="left" class="texto8"><strong>'.$descripcion.'</strong>
          	<td width="100" align="right" class="texto8"><strong>'.$saldoactual.'</strong></td>
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
imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);

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
  if ($Nivcue>=1)
  {
    datos_cuenta_t($Cuenta_niv1,$Descrip_niv1,$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Salactu_niv1);
    $nro_lineas=contar_lineas($Descrip_niv1,60);
    $cont=$cont+$nro_lineas;
  }
  if($cont>=$cantidad_registros)
  {
    echo "</table><br class=\"saltopagina\">";		
    //echo $encabezado.'<br><br>';
    $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);	
    echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
    $cont=1;	
  }//echo "Cont: ".$cont;
  if($cont<=$cantidad_registros){
    echo "</table>";
  }
        	
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
    //if($Salactu_niv2<0)
    //{$Salactu_niv2=-1*$Salactu_niv2;}		
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
    
    if ($Nivcue>=2) if ($Nivcue==2)
    {
      if($Tipo_niv2=='P')
      {
      datos_cuenta_p($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_niv2);
      $nro_lineas=contar_lineas($Descrip_niv2,60);
      $cont=$cont+$nro_lineas;
      }else if ($Tipo_niv2=='T')
      {
      datos_cuenta_t($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_niv2);
      $nro_lineas=contar_lineas($Descrip_niv2,60);
      $cont=$cont+$nro_lineas;
      }
    }else 
    {
      if($Tipo_niv2=='P')
      {
      datos_cuenta_p($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_niv2);
      $nro_lineas=contar_lineas($Descrip_niv2,60);
      $cont=$cont+$nro_lineas;
      }else if ($Tipo_niv2=='T')
      {
      datos_cuenta_t($Cuenta_niv2,$Descrip_niv2,$Salantu_float_format_niv2,$Debito_float_format_niv2,$Credito_float_format_niv2,$Salmes_float_format_niv2,$Salactu_niv2);
      $nro_lineas=contar_lineas($Descrip_niv2,60);
      $cont=$cont+$nro_lineas;
      }
    }
    if($cont>=$cantidad_registros)
    {
      echo "</table><br class=\"saltopagina\">";		
      //echo $encabezado.'<br><br>';
      $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);		
      echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';  
      $cont=1;
    }
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
      
      if ($Nivcue>=3) if ($Nivcue==3)
      {
	if($Tipo_niv3=='P')
        {  
	datos_cuenta_p($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_niv3); 
	$nro_lineas=contar_lineas($Descrip_niv3,60);
	$cont=$cont+$nro_lineas-1;
	}else if($Tipo_niv3=='T')
	{
	datos_cuenta_t($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_niv3); 
	$nro_lineas=contar_lineas($Descrip_niv3,60);
	$cont=$cont+$nro_lineas-1;
	}
      }else 
      {
	if($Tipo_niv3=='P')
        {  
	datos_cuenta_p($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_niv3); 
	$nro_lineas=contar_lineas($Descrip_niv3,60);
	$cont=$cont+$nro_lineas-1;
	}else if($Tipo_niv3=='T')
	{
	datos_cuenta_t($Cuenta_niv3,$Descrip_niv3,$Salantu_float_format_niv3,$Debito_float_format_niv3,$Credito_float_format_niv3,$Salmes_float_format_niv3,$Salactu_niv3); 
	$nro_lineas=contar_lineas($Descrip_niv3,60);
	$cont=$cont+$nro_lineas-1;
	}
      }
      if($cont>=$cantidad_registros)
      {
	echo "</table><br class=\"saltopagina\">";
	//echo $encabezado.'<br><br>';
	$Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
	echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	$cont=1;
      }
	//echo "Cont: ".$cont;
      if($cont<=$cantidad_registros)
      {
        echo "</table>";
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
	
	if ($Nivcue>=4) if ($Nivcue==4)
	{
	  if($Tipo_niv4=='P')
          {
	  datos_cuenta_p($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_niv4);
	  $nro_lineas=contar_lineas($Descrip_niv4,60);
	  $cont=$cont+$nro_lineas-1;
	  }
	 else if($Tipo_niv4=='T')
	 {
	  datos_cuenta_t($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_niv4); 
	  $nro_lineas=contar_lineas($Descrip_niv4,60);
	  $cont=$cont+$nro_lineas-1;
	 }
	}else
	{
	  if($Tipo_niv4=='P')
          {
	  datos_cuenta_p($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_niv4);
	  $nro_lineas=contar_lineas($Descrip_niv4,60);
	  $cont=$cont+$nro_lineas-1;
	  }else if($Tipo_niv4=='T')
	  {
	  datos_cuenta_t($Cuenta_niv4,$Descrip_niv4,$Salantu_float_format_niv4,$Debito_float_format_niv4,$Credito_float_format_niv4,$Salmes_float_format_niv4,$Salactu_niv4); 
	  $nro_lineas=contar_lineas($Descrip_niv4,60);
	  $cont=$cont+$nro_lineas-1;
	  }
        }
	if($cont>=$cantidad_registros)
	{
	  echo "</table><br class=\"saltopagina\">";
	  //echo $encabezado.'<br><br>';
	  $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
	  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	  $cont=1;
	}
	  //echo "Cont: ".$cont;
	if($cont<=$cantidad_registros)
	{
	  echo "</table>";
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
		/*	
	  $Salactu_float  = ((real) $Salactu_niv5);
	  $Salantu_float = ((real) $Salantu_niv5);
	  $Salactu_float_format  = number_format($Salactu_float,2,',','.');
	  $Salantu_float_format = number_format($Salantu_float,2,',','.');
	  $Salactu_float_format_niv5  = ((string)$Salactu_float_format);
	  $Salantu_float_format_niv5 = ((string)$Salantu_float_format);
		*/
	  $Salmes_niv5  = $row_niv5["Salmes"];
	  $Salmes_float  = ((real) $Salmes_niv5);
	  $Salmes_float_format  = number_format($Salmes_float,2,',','.');
	  $Salmes_float_format_niv5  = ((string)$Salmes_float_format); 
	  
          if ($Nivcue>=5) if($Nivcue==5)
	  {
	    if($Tipo_niv5=='P')
            {
	    datos_cuenta_p($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_niv5); 
	    $nro_lineas=contar_lineas($Descrip_niv5,60);
	    $cont=$cont+$nro_lineas;
	    }else if($Tipo_niv5=='T')
            {
	      datos_cuenta_t($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_niv5); 
	      $nro_lineas=contar_lineas($Descrip_niv5,60);
	      $cont=$cont+$nro_lineas;
		//echo "SI";
	    }
	  }else
	  {
	    if($Tipo_niv5=='P')
            {
	    datos_cuenta_p($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_niv5); 
	    $nro_lineas=contar_lineas($Descrip_niv5,60);
	    $cont=$cont+$nro_lineas;
	    }else if($Tipo_niv5=='T')
            {
	      datos_cuenta_t($Cuenta_niv5,$Descrip_niv5,$Salantu_float_format_niv5,$Debito_float_format_niv5,$Credito_float_format_niv5,$Salmes_float_format_niv5,$Salactu_niv5); 
	      $nro_lineas=contar_lineas($Descrip_niv5,60);
	      $cont=$cont+$nro_lineas;
		//echo "SI";
	    }
	    //echo "NO5: ".$cont." y ".$nro_lineas;
	  }
	  //if ($Nivcue>=5) if($Nivcue==5)
	  //{  
	  if($cont>=$cantidad_registros)
	  {
	    echo "</table><br class=\"saltopagina\">";
	    //echo $encabezado.'<br><br>';
	    $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
	    echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	    $cont=1;
	  }
	  //echo "Cont 5: ".$cont;
	  if($cont<=$cantidad_registros)
	  {
	    echo "</table>";
	  }
	  
	  //}

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
		/*	
	    $Salactu_float  = ((real) $Salactu_niv6);
	    $Salantu_float = ((real) $Salantu_niv6);
	    $Salactu_float_format  = number_format($Salactu_float,2,',','.');
	    $Salantu_float_format = number_format($Salantu_float,2,',','.');
	    $Salactu_float_format_niv6  = ((string)$Salactu_float_format);
	    $Salantu_float_format_niv6 = ((string)$Salantu_float_format);
		*/
	    $Salmes_niv6  = $row_niv6["Salmes"];
	    $Salmes_float  = ((real) $Salmes_niv6);
	    $Salmes_float_format  = number_format($Salmes_float,2,',','.');
	    $Salmes_float_format_niv6  = ((string)$Salmes_float_format);   
	    //if($Nivcue==6)
	    //{
	    if ($Nivcue>=6) if($Nivcue==6)
	    {
	      //echo $Tipo_niv6;
              if($Tipo_niv6=='P')
              {
	      datos_cuenta_P($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_niv6); 
	      $nro_lineas=contar_lineas($Descrip_niv6,60);
	      $cont=$cont+$nro_lineas;
	      }else if($Tipo_niv6=='T')
	      {
	      datos_cuenta_t($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_niv6); 
	      $nro_lineas=contar_lineas($Descrip_niv6,60);
	      $cont=$cont+$nro_lineas;
	      }	
	    }else
	    { echo $Tipo_niv6;
              if($Tipo_niv6=='P')
              {
	      datos_cuenta_P($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_niv6); 
	      $nro_lineas=contar_lineas($Descrip_niv6,60);
	      $cont=$cont+$nro_lineas;
	      }else if($Tipo_niv6=='T')
	      {
	      datos_cuenta_t($Cuenta_niv6,$Descrip_niv6,$Salantu_float_format_niv6,$Debito_float_format_niv6,$Credito_float_format_niv6,$Salmes_float_format_niv6,$Salactu_niv6); 
	      $nro_lineas=contar_lineas($Descrip_niv6,60);
	      $cont=$cont+$nro_lineas;
	      }
	    }
	    if($cont>=$cantidad_registros)
	    {
	      echo "</table><br class=\"saltopagina\">";
	      //echo $encabezado.'<br><br>';
	      $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
	      echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	      $cont=1;
	    }
	    //echo "Cont6: ".$cont;
	    if($cont<=$cantidad_registros)
	    {
	      echo "</table>";
	    }
            //}

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
		//cambios aquii		
		$Salactu_float_format= $Salactu_niv7;	
	    //$Salactu_float  = ((real) $Salactu_niv7);
	    $Salantu_float = ((real) $Salantu_niv7);
	    //$Salactu_float_format  = number_format($Salactu_float,2,',','.');
	    $Salantu_float_format = number_format($Salantu_float,2,',','.');
	    $Salactu_float_format_niv7  = ((string)$Salactu_float_format);
	    $Salantu_float_format_niv7 = ((string)$Salantu_float_format);
		
	    $Salmes_niv7  = $row_niv7["Salmes"];
	    $Salmes_float  = ((real) $Salmes_niv7);
	    $Salmes_float_format  = number_format($Salmes_float,2,',','.');
	    $Salmes_float_format_niv7  = ((string)$Salmes_float_format);   
	    
 	    if ($Nivcue>=7) if($Nivcue==7)
	    {
	      datos_cuenta_p($Cuenta_niv7,$Descrip_niv7,$Salantu_float_format_niv7,$Debito_float_format_niv7,$Credito_float_format_niv7,$Salmes_float_format_niv7,$Salactu_float_format); $nro_lineas=contar_lineas($Descrip_niv7,60);
	      $cont=$cont+$nro_lineas-1;
	    }else
	    {
	      datos_cuenta_t($Cuenta_niv7,$Descrip_niv7,$Salantu_float_format_niv7,$Debito_float_format_niv7,$Credito_float_format_niv7,$Salmes_float_format_niv7,$Salactu_float_format); 
	      $nro_lineas=contar_lineas($Descrip_niv7,60);
	      $cont=$cont+$nro_lineas-1;
	    }
	    if($cont>=$cantidad_registros)
	    {
	      echo "</table><br class=\"saltopagina\">";
	      //echo $encabezado.'<br><br>';
	      $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
	      echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
	      $cont=1;
	    }
		//echo "Cont: ".$cont;
	    if($cont<=$cantidad_registros)
	    {
	      echo "</table>";
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
	      
	      if ($Nivcue>=8) if ($Nivcue==8)
	      {
	        datos_cuenta_p($Cuenta_niv8,$Descrip_niv8,$Salantu_float_format_niv8,$Debito_float_format_niv8,$Credito_float_format_niv8,$Salmes_float_format_niv8,$Salactu_float_format); 
		$nro_lineas=contar_lineas($Descrip_niv8,60);
	 	$cont=$cont+$nro_lineas;
	      }else 
	      {
	      datos_cuenta_t($Cuenta_niv8,$Descrip_niv8,$Salantu_float_format_niv8,$Debito_float_format_niv8,$Credito_float_format_niv8,$Salmes_float_format_niv8,$Salactu_float_format);
	      $nro_lineas=contar_lineas($Descrip_niv8,60);
	      $cont=$cont+$nro_lineas;
	      }
	      if($cont>=$cantidad_registros)
	      {
		echo "</table><br class=\"saltopagina\">";
		$Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
		echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
		$cont=1;
	      }
	      if($cont<=$cantidad_registros)
	      {
		echo "</table>";
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
		if ($Nivcue>=9) if ($Nivcue==9)
		{
		  datos_cuenta_p($Cuenta_niv9,$Descrip_niv9,$Salantu_float_format_niv9,$Debito_float_format_niv9,$Credito_float_format_niv9,$Salmes_float_format_niv9,$Salactu_float_format); 
		  $nro_lineas=contar_lineas($Descrip_niv9,60);
	 	  $cont=$cont+$nro_lineas-1;
		}else 
		{
		  datos_cuenta_p($Cuenta_niv9,$Descrip_niv9,$Salantu_float_format_niv9,$Debito_float_format_niv9,$Credito_float_format_niv9,$Salmes_float_format_niv9,$Salactu_float_format);
		  $nro_lineas=contar_lineas($Descrip_niv9,60);
	 	  $cont=$cont+$nro_lineas-1; 
		}
		if($cont>=$cantidad_registros)
		{
		  echo "</table><br class=\"saltopagina\">";
		  $Fecini=imprimir_datos($pagina++,$num_paginas,$Nivcue,$mes,$ano);
		  echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';
		  $cont=1;
		}
		if($cont<=$cantidad_registros)
		{
		  echo "</table>";
		}
              } //FINAL NIVEL 9 
            } //FINAL NIVEL 8  
           } //FINAL NIVEL 7  
	 } //FINAL NIVEL 6  
       } //FINAL NIVEL 5 
     } //FINAL NIVEL 4 
   } //FINAL NIVEL 3 
  } //FINAL NIVEL 2 

		
	datos_cuenta_pt($Cuenta_niv1,$Descrip_niv1,$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Salactu_niv1); 
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
} //FINAL NIVEL 1 
 	 
$result_niv1 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='1' ORDER BY Cuenta ASC", $conectar);
while ($row_niv1 = @mysql_fetch_array($result_niv1))
{
	//echo "Pajuo";exit(0);
	if ($row_niv1['Cuenta']=='4.')
	{
		$Ingresos = $row_niv1["Salactu"];
		//echo "Pajuo";exit(0);
	
	}else if ($row_niv1['Cuenta']=='5.')
	{
		$Gastos  = $row_niv1["Salactu"];
       		
	}else if ($row_niv1['Cuenta']=='6.')
	{
		$Ingresos += $row_niv1["Salactu"];
       		
	}else if ($row_niv1['Cuenta']=='7.')
	{
		$Gastos += $row_niv1["Salactu"];
       		
	}
	$Resultado=$Ingresos+$Gastos;
}
/*
$Resultado_float  = ((real) $Resultado);
$Resultado_float_format  = number_format($Resultado_float,2,',','.');
$Resultado_float_format_print  = ((string)$Resultado_float_format);   
*/

datos_cuenta_pt($Cuenta_niv1,'RESULTADO',$Salantu_float_format_niv1,$Debito_float_format_niv1,$Credito_float_format_niv1,$Salmes_float_format_niv1,$Resultado);

?>
<?  cerrar_conexion($conectar);?>

</div>

</body>
</html>

<?
//De aqui pa bajo arreglar...
?>


