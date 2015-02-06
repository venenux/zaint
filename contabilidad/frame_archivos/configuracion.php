<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT Codigo, Nromax, Niv1, Niv2, Niv3, Niv4, Niv5, Niv6, Niv7, Niv8, Niv9, Planunico, Confis, Nomniv1, Nomniv2, Nomniv3, Nomniv4, Nomniv5, Nomniv6, Nomniv7, Nomniv8, Nomniv9, Sepacta, cuenta_cierre_mes FROM cwconfig", $conectar); 
 $row = mysql_fetch_row($result);    
 $Codigo    = "$row[0]";
 $Nromax    = "$row[1]";
 $Niv1      = "$row[2]";
 $Niv2      = "$row[3]";
 $Niv3      = "$row[4]";
 $Niv4      = "$row[5]";
 $Niv5      = "$row[6]";
 $Niv6      = "$row[7]";
 $Niv7      = "$row[8]";
 $Niv8      = "$row[9]";
 $Niv9      = "$row[10]";
 $Planunico = "$row[11]";
 $Confis    = "$row[12]";  
 $Nomniv1   = "$row[13]";
 $Nomniv2   = "$row[14]";
 $Nomniv3   = "$row[15]";
 $Nomniv4   = "$row[16]";
 $Nomniv5   = "$row[17]";
 $Nomniv6   = "$row[18]";
 $Nomniv7   = "$row[19]";
 $Nomniv8   = "$row[20]";
 $Nomniv9   = "$row[21]"; 
 $Sepacta   = "$row[22]";
 $cierre_mes= "$row[23]";
 $Formato    = "";

 if (($Nromax >= 1) && ($Niv1>0))
 {
   for ($i = 1; $i <= $Niv1; $i++) //NIVEL 1
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 }
 if (($Nromax >= 2) && ($Niv2>0)) //NIVEL 2
 {
   for ($i = 1; $i <= $Niv2; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 }
 if (($Nromax >= 3) && ($Niv3>0)) //NIVEL 3
 {
   for ($i = 1; $i <= $Niv3; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 }  
 if (($Nromax >= 4) && ($Niv4>0)) //NIVEL 4
 {
   for ($i = 1; $i <= $Niv4; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 } 
 if (($Nromax >= 5) && ($Niv5>0)) //NIVEL 5
 {
   for ($i = 1; $i <= $Niv5; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 } 
 if (($Nromax >= 6) && ($Niv6>0)) //NIVEL 6
 {
   for ($i = 1; $i <= $Niv6; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 }
 if (($Nromax >= 7) && ($Niv7>0)) //NIVEL 7
 {
   for ($i = 1; $i <= $Niv7; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 } 
 if (($Nromax >= 1) && ($Niv8>0))  //NIVEL 8
 {
   for ($i = 1; $i <= $Niv8; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 }
 if (($Nromax >= 1) && ($Niv9>0)) //NIVEL 9
 {
   for ($i = 1; $i <= $Niv9; $i++)
   {
     $Formato = $Formato.'#'; 
   }
   $Formato = $Formato.$Sepacta;
 } 

   
?>


<BODY>
<?
	titulo_mejorada("Configuración / Par&aacute;metros de Contabilidad (1)","","menu_int.php","configuracion_archivos/11");
?>
<TABLE width="100%">
  <TBODY>
 

  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR valign="baseline">
          <TD colspan="4" nowrap><pre class="Estilo6 Estilo7"><form action="configuracion_aux.php?Accion=Previa&Configuracion=Config1" method="post" name="Previa" target="_blank">
<p>C&oacute;digo: <input name=Codigo id="Codigo" readonly size=4 value='<?php echo "$Codigo"?>'>                                <span class="ewGroupAggregate">Nota: Recuerde que si ya existen Cuentas y/o Movimientos no debe cambiar los Par&aacute;metros </span>

M&aacute;ximo N&uacute;mero de Niveles:  <input name=Nromax id="Nromax" size=8  value='<?php echo "$Nromax"?>' >       Maneja plan &uacute;nico de cuentas:  <SELECT name=Planunico id="select2" style="FONT-SIZE: 10px;  HEIGHT: 18px">                       <?php
                 if ($Planunico=='1')
		  	     {
			       echo '<option selected value="1">SI</option>';
                   echo '<option value="0">NO</option>';
			     } else if ($Planunico=='0')
			     {
			   	   echo '<option value="1">SI</option>';
                   echo '<option selected value="0">NO</option>';
			     } else 
			     {
				   echo '<option value="1">SI</option>';
                   echo '<option value="0">NO</option>';
			     }
			  ?>                   </SELECT>   Conbilidad Fiscal: <SELECT name=Confis id="select8" style="FONT-SIZE: 10px;  HEIGHT: 18px">                               <?php
                 if ($Confis=='1')
			     {
				   echo '<option selected value="1">SI</option>';
                   echo '<option value="0">NO</option>';
			     } else if ($Confis=='0')
			     {  
				   echo '<option value="1">SI</option>';
                   echo '<option selected value="0">NO</option>';
			     } else 
			     {
				   echo '<option value="1">SI</option>';
                   echo '<option value="0">NO</option>';
			     }
			  ?>                             </SELECT>                		        

(1) N&uacute;mero de D&iacute;gitos:            <INPUT name=Niv1 id="Niv124" size=8 value='<?php echo "$Niv1"?>'>   <input name="Nomniv1" type="text" id="Nomniv16" onblur="javascript:this.value=this.value.toUpperCase()"  value='<?php echo "$Nomniv1"?>'>          (6) N&uacute;mero de D&iacute;gitos:     <INPUT name=Niv6 id="Niv62" size=8 value='<?php echo "$Niv6"?>'>   <input name="Nomniv6" type="text" id="Nomniv62" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv6"?>'>                                      		        
            
(2) N&uacute;mero de D&iacute;gitos:            <INPUT name=Niv2 id="Niv2" size=8 value='<?php echo "$Niv2"?>'>   <input name="Nomniv2" type="text" id="Nomniv2" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv2"?>'>          (7) N&uacute;mero de D&iacute;gitos:     <INPUT name=Niv7 id="Niv72" size=8   value='<?php echo "$Niv7"?>'>   <input name="Nomniv7" type="text" id="Nomniv72" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv7"?>'> 
         
(3) N&uacute;mero de D&iacute;gitos:            <INPUT name=Niv3 id="Niv3" size=8    value='<?php echo "$Niv3"?>'>   <input name="Nomniv3" type="text" id="Nomniv3" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv3"?>'>          (8) N&uacute;mero de D&iacute;gitos:     <INPUT name=Niv8 id="Niv83" size=8    value='<?php echo "$Niv8"?>'>   <input name="Nomniv8" type="text" id="Nomniv82" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv8"?>'>             		    

(4) N&uacute;mero de D&iacute;gitos:            <INPUT name=Niv4 id="Niv4" size=8    value='<?php echo "$Niv4"?>'>   <input name="Nomniv4" type="text" id="Nomniv4" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv4"?>'>          (9) N&uacute;mero de D&iacute;gitos:     <INPUT name=Niv9 id="Niv92" size=8    value='<?php echo "$Niv9"?>'>   <input name="Nomniv9" type="text" id="Nomniv92" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv9"?>'>          		        
		          
(5) N&uacute;mero de D&iacute;gitos:            <INPUT name=Niv5 id="Niv5" size=8    value='<?php echo "$Niv5"?>'>   <input name="Nomniv5" type="text" id="Nomniv5" onblur="javascript:this.value=this.value.toUpperCase()" value='<?php echo "$Nomniv5"?>'>         Cuenta de cierre de mes:  <select name="cuenta_cierre_mes" id="cuenta_cierre_mes">
<?
$consulta="SELECT Cuenta, Descrip FROM cwconcue WHERE Tipo='P'";
$resultado=mysql_query($consulta,$conectar);
while($fetch=mysql_fetch_array($resultado))
{
	?>
	<option title="<?echo $fetch['Descrip']?>" <?if($cierre_mes==$fetch['Cuenta']) echo "selected='true'"?> value="<? echo $fetch['Cuenta']?>"><?echo $fetch['Cuenta']?></option>
	<?
}
?>
</select>
<p><span class="ewGroupAggregate">Dise&ntilde;o del formato de cuentas:</span>   <input name=Formato id="Formato2" readonly size=40   value='<?php echo "$Formato"?>'><input type="submit" name="Submit2" value="Vista previa de formato"></p></form></pre><pre class="Estilo6 Estilo7"><form action="configuracion_aux.php?Accion=Modificar&Configuracion=Config1" method="post" name="Modificar">
<input name="Nromax" type="hidden" value=""><input name="cuenta_cierre_mes" type="hidden" value=""><input name="Niv1" type="hidden" value=""><input name="Niv2" type="hidden" value=""><input name="Niv3" type="hidden" value=""><input name="Niv4" type="hidden" value=""><input name="Niv5" type="hidden" value=""><input name="Niv6" type="hidden" value=""><input name="Niv7" type="hidden" value=""><input name="Niv8" type="hidden" value=""><input name="Niv9" type="hidden" id="Niv9" value=""><input name="Planunico" type="hidden" id="Planunico" value=""><input name="Confis" type="hidden" id="Confis" value=""><input name="Nomniv1" type="hidden" id="Nomniv1" value=""><input name="Nomniv2" type="hidden" id="Nomniv2" value=""><input name="Nomniv3" type="hidden" id="Nomniv3" value=""><input name="Nomniv4" type="hidden" id="Nomniv4" value=""><input name="Nomniv5" type="hidden" id="Nomniv5" value=""><input name="Nomniv6" type="hidden" id="Nomniv6" value=""><input name="Nomniv7" type="hidden" id="Nomniv7" value=""><input name="Nomniv8" type="hidden" id="Nomniv8" value=""><input name="Nomniv9" type="hidden" id="Nomniv73" value=""><input name="Codigo" type="hidden" id="Nomniv83" value="">
								<input type="submit" name="Submit" value="Guardar" 
                onFocus="javascript:Modificar.Nromax.value=Previa.Nromax.value;
                                    Modificar.Niv1.value=Previa.Niv1.value;				
                                    Modificar.Niv2.value=Previa.Niv2.value;				
                                    Modificar.Niv3.value=Previa.Niv3.value;				
                                    Modificar.Niv4.value=Previa.Niv4.value;				
                                    Modificar.Niv5.value=Previa.Niv5.value;				
                                    Modificar.Niv6.value=Previa.Niv6.value;				
                                    Modificar.Niv7.value=Previa.Niv7.value;				
                                    Modificar.Niv8.value=Previa.Niv8.value;				
                                    Modificar.Niv9.value=Previa.Niv9.value;									
                                    Modificar.Codigo.value=Previa.Codigo.value;				
                                    Modificar.Nomniv1.value=Previa.Nomniv1.value;				
                                    Modificar.Nomniv2.value=Previa.Nomniv2.value;				
                                    Modificar.Nomniv3.value=Previa.Nomniv3.value;				
                                    Modificar.Nomniv4.value=Previa.Nomniv4.value;				
                                    Modificar.Nomniv5.value=Previa.Nomniv5.value;				
                                    Modificar.Nomniv6.value=Previa.Nomniv6.value;				
                                    Modificar.Nomniv7.value=Previa.Nomniv7.value;				
                                    Modificar.Nomniv8.value=Previa.Nomniv8.value;				
                                    Modificar.Nomniv9.value=Previa.Nomniv9.value; 
				Modificar.Planunico.value=Previa.Planunico.value;
				Modificar.cuenta_cierre_mes.value=Previa.cuenta_cierre_mes.value;					Modificar.Confis.value=Previa.Confis.value;"></p></form></pre>
</TD>
        </TR>
        </TBODY></TABLE>
      </DIV></TD>
  </TR></TBODY></TABLE>
<pre class="boton-text Estilo6">&nbsp; </pre>
</BODY>
</HTML>

