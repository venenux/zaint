<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");?>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<?php 
/******************************************************/
/* Funcion retorna_mes
 * $Mes:  aqui se introduce la fecha de inicio
 * Devuelve mes en letras
 */
function retorna_mes($Mes) 
{
  $Mes = $Mes[5].$Mes[6];
  switch($Mes)
  {
    case "01":
	  $Mes_letra = "ENERO";
	  return $Mes_letra; 
    break; 
    case "02":
      $Mes_letra = "FEBRERO";
	  return $Mes_letra;
    break;
    case "03":
      $Mes_letra = "MARZO";
	  return $Mes_letra;
    break;
    case "04":
      $Mes_letra = "ABRIL";
	  return $Mes_letra;
    break;	    
	case "05":
      $Mes_letra = "MAYO";
	  return $Mes_letra;
    break;	
    case "06":
      $Mes_letra = "JUNIO";
	  return $Mes_letra;
    break;	
     case "07":
      $Mes_letra = "JULIO";
	  return $Mes_letra;
    break;	
     case "08":
      $Mes_letra = "AGOSTO";
	  return $Mes_letra;
    break;	
     case "09":
      $Mes_letra = "SEPTIEMBRE";
	  return $Mes_letra;
    break;	
     case "10":
      $Mes_letra = "OCTUBRE";
	  return $Mes_letra;
    break;	
     case "11":
      $Mes_letra = "NOVIEMBRE";
	  return $Mes_letra;
    break;	
     case "12":
      $Mes_letra = "DICIEMBRE";
	  return $Mes_letra;
    break;	
  }
}

/******************************************************/
/* Funcion retorna_ano
 * $Mes:  aqui se introduce la fecha de inicio
 * Devuelve ano de la fecha en numeros
  */
function retorna_ano($Ano) 
{
  $Ano = $Ano[0].$Ano[1].$Ano[2].$Ano[3];
  return $Ano;
}


 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT Codemp, Mescie1, Mescie2, Mescie3, Mescie4, Mescie5, Mescie6, Mescie7, Mescie8, Mescie9, Mescie10, Mescie11, Mescie12, Estcie1, Estcie2, Estcie3, Estcie4, Estcie5, Estcie6, Estcie7, Estcie8, Estcie9, Estcie10, Estcie11, Estcie12, Estcie1, Estcie2, Estcie3, Estcie4, Estcie5, Estcie6, Estcie7, Estcie8, Estcie9, Estcie10, Estcie11, Estcie12 FROM cwconemp", $conectar); 
 $row = mysql_fetch_row($result);    
 $Codemp   = "$row[0]"; 
 $Mescie1  = "$row[1]";
 $Mescie2  = "$row[2]";
 $Mescie3  = "$row[3]";
 $Mescie4  = "$row[4]";
 $Mescie5  = "$row[5]";
 $Mescie6  = "$row[6]";
 $Mescie7  = "$row[7]";
 $Mescie8  = "$row[8]";
 $Mescie9  = "$row[9]";
 $Mescie10 = "$row[10]";
 $Mescie11 = "$row[11]";
 $Mescie12 = "$row[12]";

 $Estcie1  = "$row[13]";
 $Estcie2  = "$row[14]";
 $Estcie3  = "$row[15]";
 $Estcie4  = "$row[16]";
 $Estcie5  = "$row[17]";
 $Estcie6  = "$row[18]";
 $Estcie7  = "$row[19]";
 $Estcie8  = "$row[20]";
 $Estcie9  = "$row[21]";
 $Estcie10 = "$row[22]";
 $Estcie11 = "$row[23]";
 $Estcie12 = "$row[24]";
 
 
?>

<BODY>
<?
	titulo_mejorada("Configuración / Per&iacute;odos","","menu_int.php","parametros_archivos/13");
?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="4"><pre class="Estilo1"><form method="post" name="Modificar" action="parametros_sql.php?Periodo=SI">
C&oacute;digo de Empresa: <input 
            name=Codigo id="Codigo" readonly size=4 value='<?php echo "$Codemp"?>'>                              <span class="ewGroupAggregate">Mes                        A&ntilde;o                 Estado</span>
<span class="Estilo1">                                                                    <input 
            name=mes1 id="mes1" readonly size=18 value='<?php echo retorna_mes($Mescie1)?>'> <input 
            name=ano1 id="ano1" readonly size=10 value='<?php echo retorna_ano($Mescie1)?>'> <SELECT  name=estado1 id="estado1" 
            style="FONT-SIZE: 9px">               			
			<?php    if ($Estcie1=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie1=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                   </SELECT></span>     
                                                                    <input 
            name=mes2 id="mes2" readonly size=18 value='<?php echo retorna_mes($Mescie2)?>'> <input 
            name=ano2 id="ano2" readonly size=10 value='<?php echo retorna_ano($Mescie2)?>'> <SELECT  name=estado2 id="estado2" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie2=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie2=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes3 id="cod_emp242" readonly size=18 value='<?php echo retorna_mes($Mescie3)?>'> <input 
            name=ano3 id="ano3" readonly size=10 value='<?php echo retorna_ano($Mescie3)?>'> <SELECT  name=estado3 id="estado3" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie3=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie3=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes4 id="mes4" readonly size=18 value='<?php echo retorna_mes($Mescie4)?>'> <input 
            name=ano4 id="ano4" readonly size=10 value='<?php echo retorna_ano($Mescie4)?>'> <SELECT  name=estado4 id="estado4" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie4=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie4=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes5 id="mes5" readonly size=18 value='<?php echo retorna_mes($Mescie5)?>'> <input 
            name=ano5 id="ano5" readonly size=10 value='<?php echo retorna_ano($Mescie5)?>'> <SELECT  name=estado5 id="estado5" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie5=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie5=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes6 id="mes6" readonly size=18 value='<?php echo retorna_mes($Mescie6)?>'> <input 
            name=ano6 id="ano6" readonly size=10 value='<?php echo retorna_ano($Mescie6)?>'> <SELECT  name=estado6 id="estado6" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie6=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie6=='CERRADO')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes7 id="mes7" readonly size=18 value='<?php echo retorna_mes($Mescie7)?>'> <input 
            name=ano7 id="ano7" readonly size=10 value='<?php echo retorna_ano($Mescie7)?>'> <SELECT  name=estado7 id="estado7" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie7=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie7=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes8 id="mes8" size=18 readonly value='<?php echo retorna_mes($Mescie8)?>'> <input 
            name=ano8 id="ano8" readonly size=10 value='<?php echo retorna_ano($Mescie8)?>'> <SELECT  name=estado8 id="estado8" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie8=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie8=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes9 id="mes9" readonly size=18 value='<?php echo retorna_mes($Mescie9)?>'> <input 
            name=ano9 id="ano9" readonly size=10 value='<?php echo retorna_ano($Mescie9)?>'> <SELECT  name=estado9 id="estado9" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie9=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie9=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes10 id="mes10" readonly size=18 value='<?php echo retorna_mes($Mescie10)?>'> <input 
            name=ano10 id="ano10" readonly size=10 value='<?php echo retorna_ano($Mescie10)?>'> <SELECT  name=estado10 id="estado10" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie10=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie10=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes11 id="mes11" readonly size=18 value='<?php echo retorna_mes($Mescie11)?>'> <input 
            name=ano11 id="ano11" readonly size=10 value='<?php echo retorna_ano($Mescie11)?>'> <SELECT  name=estado11 id="estado11" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie11=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie11=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                     </SELECT> 
                                                                    <input 
            name=mes12 id="mes12" readonly size=18 value='<?php echo retorna_mes($Mescie12)?>'> <input 
            name=ano12 id="ano12" readonly size=10 value='<?php echo retorna_ano($Mescie12)?>'> <SELECT  name=estado12 id="estado12" 
            style="FONT-SIZE: 9px">               
			<?php    if ($Estcie12=='ABIERTO')
				{
				  echo '<option selected value="1">ABIERTO</option>';
                  echo '<option value="0">CERRADO</option>';
				} else if ($Estcie12=='CERRADO')
			    {
				  echo '<option value="1">ABIERTO</option>';
                  echo '<option selected value="0">CERRADO</option>';
				}  ?>                 
    </SELECT>     
                                                     
							                                              <input type="submit" name="Submit" value="Guardar">

 

</form></pre></TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


