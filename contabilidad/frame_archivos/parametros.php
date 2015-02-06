<?php 
include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';
 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT * FROM cwconemp", $conectar);
 $result2= mysql_query("SELECT * FROM cwconemp", $conectar);  
 $row = mysql_fetch_row($result);    
 $Codemp  = "$row[0]";
 $Nomemp  = "$row[1]";
 $Rifemp  = "$row[2]";
 $Nnitemp = "$row[3]";
 $Direcc1 = "$row[4]"; 
 $Direcc2 = "$row[5]";
 $Fecini  = "$row[6]";
 $Fecfin  = "$row[7]";
 $Numcom  = "$row[8]";
 $row2 = mysql_fetch_array($result2);    

 $Fec_ini = "$Fecini[8]"."$Fecini[9]"."/"."$Fecini[5]"."$Fecini[6]"."/"."$Fecini[0]"."$Fecini[1]"."$Fecini[2]"."$Fecini[3]";
 
 $Fec_fin = "$Fecfin[8]"."$Fecfin[9]"."/"."$Fecfin[5]"."$Fecfin[6]"."/"."$Fecfin[0]"."$Fecfin[1]"."$Fecfin[2]"."$Fecfin[3]";
 
 
?>
<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
<style type="text/css">
<!--
.Estilo2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</HEAD>
<BODY>
<?
titulo("Configuración / Empresa","","menu_int.php","11");
?>

<TABLE width="100%">
  <TBODY>

  <TR>
    <TD class=row-br>
      <DIV class=tb-body>      
        <table cellspacing=0 cellpadding=4 width="100%" border=0>
          <tbody>
            <tr>
              <td colspan="2"><pre class="Estilo2"><form name="Modificar" method="post" action="parametros_sql.php">                     
C&oacute;digo de Empresa:         <input 
            name=Codemp id="Codemp" readonly size=4 value='<?php echo "$Codemp"?>'>    

Nombre de la Empresa:   <input 
            name=Nomemp id="Nomemp" size=100 onBlur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomemp"?>'>             

N&uacute;mero de RIF:                  <input name=Rifemp id="Rifemp" size=30 onBlur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Rifemp"?>'>          N&uacute;mero de NIT:    <input name=Nnitemp id="Nnitemp" size=30 onBlur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nnitemp"?>'>             

Direcci&oacute;n:                             <input name=Direcc1 id="Direcc1" size=80 onBlur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Direcc1"?>'>   
     
         
Fecha inicio del Periodo:   <input name="fecha" id="fecha" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fec_ini"?>" > <input name="image3" type="image" id="fechadesde" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha",ifFormat:"%d/%m/%Y",button:"fechadesde"}); 
			</script>
Fecha fin del periodo:         <input name="fecha_fin" id="fecha_fin" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fec_fin"?>" > <input name="image3" type="image" id="fechahasta" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha_fin",ifFormat:"%d/%m/%Y",button:"fechahasta"}); 
			</script>
</td></tr>
</tbody>
</table>
<TABLE width="100%">
<TBODY>
<?php
for($i=1;$i<=12;$i++)
{
	if($i==1)
	{
		$mesl='Enero';	
		$bd='Comene';
	}	
	elseif($i==2)
	{
		$mesl='Febrero';
		$bd='Comfeb';
	}	
	elseif($i==3)
	{
		$mesl='Marzo';
		$bd='Commar';
	}	
	elseif($i==4)
	{
		$mesl='Abril';
		$bd='Comabr';
	}	
	elseif($i==5)
	{
		$mesl='Mayo';
		$bd='Commay';
	}	
	elseif($i==6)
	{
		$mesl='Junio';
		$bd='Comjun';
	}		
	elseif($i==7)
	{
		$mesl='Julio';
		$bd='Comjul';
	}	
	elseif($i==8)
	{
		$mesl='Agosto';
		$bd='Comago';
	}	
	elseif($i==9)
	{
		$mesl='Septiembre';
		$bd='Comsep';
	}	
	elseif($i==10)
	{
		$mesl='Octubre';
		$bd='Comoct';
	}	
	elseif($i==11)
	{
		$mesl='Noviembre';
		$bd='Comnov';
	}	
	elseif($i==12)
	{
		$mesl='Diciembre';
		$bd='Comdic';
	}	
	?>
	<tr><td width="220px">
	Proximo comprobante mes <?php echo $mesl;?>:</td><td> &nbsp;&nbsp;&nbsp;<input  name="<?php echo $bd;?>" id="<?php echo $bd;?>" size=8 value="<?php echo $row2[$bd];?>"> 
	</td></tr>
	<?	
}
?>
<tr><td colspan="2" align="center">
      <input align="middle" type="submit" name="Submit" value="Guardar">
</form></pre></td></tr>
          </tbody>
        </table>
      </DIV></TD></TR></TBODY></TABLE>
</BODY></HTML>


