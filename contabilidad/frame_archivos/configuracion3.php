<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");?>
<BODY>
<?php 
 $accion= $_GET['accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT Codigo, Sepacta, Niv1af, Niv2af, Niv3af, Niv4af, Niv5af, Niv6af, Niv7af, Niv8af, Niv9af, Nromaxaf FROM cwconfig", $conectar); 
 $row = mysql_fetch_row($result);    
 $Codigo   = "$row[0]";
 $Sepacta  = "$row[1]";
 $Niv1af   = "$row[2]";
 $Niv2af   = "$row[3]";
 $Niv3af   = "$row[4]";
 $Niv4af   = "$row[5]"; 
 $Niv5af   = "$row[6]"; 
 $Niv6af   = "$row[7]"; 
 $Niv7af   = "$row[8]"; 
 $Niv8af   = "$row[9]"; 
 $Niv9af   = "$row[10]";
 $Nromaxaf = "$row[11]";
 
 $Formato    = "";
 
 $Niv1   = $Niv1af;
 $Niv2   = $Niv2af;
 $Niv3   = $Niv3af;
 $Niv4   = $Niv4af; 
 $Niv5   = $Niv5af; 
 $Niv6   = $Niv6af; 
 $Niv7   = $Niv7af; 
 $Niv8   = $Niv8af; 
 $Niv9   = $Niv9af;
 $Nromax = $Nromaxaf; 

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
   for ($i = 1; $i <= $Niv1; $i++)
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

<?
	titulo_mejorada("Configuración / Par&aacute;metros de Activos Fijos","","menu_int.php","configuracion_archivos/12");
?>
<TABLE width="100%">
  <TBODY>
 
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="5"><pre class="Estilo4"><form action="configuracion_aux.php?Accion=Previa&Configuracion=Config1" method="post" name="Previa" target="_blank">
C&oacute;digo: <input 
            name=Codigo id="Codigo" readonly size=4 value='<?php echo "$Codigo"?>'>  <span class="ewGroupAggregate"><strong>Nota: Recuerde que si ya existen Cuentas y/o Movimientos no debe cambiar los Par&aacute;metros 

CARACTERISTICAS DEL FORMATO  A.F.</strong></span>    

M&aacute;ximo N&uacute;mero de Niveles: <INPUT 
		       name=Nromax id="Nromax" size=8     value='<?php echo "$Nromaxaf"?>'>   Separador de nivel:    <INPUT 
		       name=Sepacta id="Sepacta" size=8 value='<?php echo "$Sepacta"?>'>  

(1) N&uacute;mero de D&iacute;gitos:    <INPUT 
		       name=Niv1 id="Niv1" size=8     value='<?php echo "$Niv1af"?>'>   (6) N&uacute;mero de D&iacute;gitos: <INPUT 
		       name=Niv6 id="Niv6" size=8     value='<?php echo "$Niv6af"?>'>  
           
(2) N&uacute;mero de D&iacute;gitos:    <INPUT 
		       name=Niv2 id="Niv2" size=8     value='<?php echo "$Niv2af"?>'>   (7) N&uacute;mero de D&iacute;gitos: <INPUT 
		       name=Niv7 id="Niv7" size=8     value='<?php echo "$Niv7af"?>'>                      

(3) N&uacute;mero de D&iacute;gitos:    <INPUT 
		       name=Niv3 id="Niv3" size=8     value='<?php echo "$Niv3af"?>'>   (8) N&uacute;mero de D&iacute;gitos: <INPUT 
		       name=Niv8 id="Niv8" size=8     value='<?php echo "$Niv8af"?>'>          

(4) N&uacute;mero de D&iacute;gitos:    <INPUT 
		       name=Niv4 id="Niv4" size=8     value='<?php echo "$Niv4af"?>'>   (9) N&uacute;mero de D&iacute;gitos: <INPUT 
		       name=Niv9 id="Niv9" size=8     value='<?php echo "$Niv9af"?>'>         

(5) N&uacute;mero de D&iacute;gitos:    <INPUT 
		       name=Niv5 id="Niv5" size=8     value='<?php echo "$Niv5af"?>'>            
           
                <span class="ewGroupAggregate">M&aacute;scara de los activos fijos: </span><input 
            name=Formato id="Formato" readonly size=40 value='<?php echo "$Formato"?>'> <input type="submit" name="Submit" value="Vista previa de formato de A.F">		  
            </form><form action="configuracion_aux.php?Accion=Modificar&Configuracion=Config3" method="post" name="Editar"><input name="Nromaxaf" type="hidden" id="Nromaxaf" value=""><input name="Niv1af" type="hidden" id="Niv1af" value=""><input name="Niv2af" type="hidden" id="Niv2af" value=""><input name="Niv3af" type="hidden" id="Niv3af" value=""><input name="Niv4af" type="hidden" id="Niv4af" value=""><input name="Niv5af" type="hidden" id="Niv5af" value=""><input name="Niv6af" type="hidden" id="Niv6af" value=""><input name="Niv7af" type="hidden" id="Niv7af" value=""><input name="Niv8af" type="hidden" id="Niv8af" value=""><input name="Niv9af" type="hidden" id="Niv9af" value=""><input name="Sepacta" type="hidden" id="Sepacta" value=""><input name="Codigo" type="hidden" id="Codigo" value="">
							<input name="Modificar" type="Submit" value="Guardar" 
			          onFocus='javascript:Editar.Codigo.value=Previa.Codigo.value;
							              Editar.Nromaxaf.value=Previa.Nromax.value
                                          Editar.Niv1af.value=Previa.Niv1.value;				
                                          Editar.Niv2af.value=Previa.Niv2.value;				
                                          Editar.Niv3af.value=Previa.Niv3.value;				
                                          Editar.Niv4af.value=Previa.Niv4.value;				
                                          Editar.Niv5af.value=Previa.Niv5.value;				
                                          Editar.Niv6af.value=Previa.Niv6.value;				
                                          Editar.Niv7af.value=Previa.Niv7.value;				
                                          Editar.Niv8af.value=Previa.Niv8.value;				
                                          Editar.Niv9af.value=Previa.Niv9.value;	
										  Editar.Sepacta.value=Previa.Sepacta.value;
							
							'>
</form></pre></TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>