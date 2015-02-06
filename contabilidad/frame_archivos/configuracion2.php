<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");?>
<BODY>
<?php 
 $accion= $_GET['accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT Nivacca, Nivaccp, Nivaccc, Nivacci, Codigo, Balact, Balpas, Balgan, Baling, Baleng, Balord, Nromaximo, Nroauto FROM cwconfig", $conectar); 
 $row = mysql_fetch_row($result);    
 $Nivacca   = "$row[0]";
 $Nivaccp   = "$row[1]";
 $Nivaccc   = "$row[2]";
 $Nivacci   = "$row[3]";
 $Codigo    = "$row[4]";
 $Balact    = "$row[5]"; 
 $Balpas    = "$row[6]"; 
 $Balgan    = "$row[7]"; 
 $Baling    = "$row[8]"; 
 $Baleng    = "$row[9]"; 
 $Balord    = "$row[10]"; 
 $Nromaximo = "$row[11]"; 
 $Nroauto   = "$row[12]";
?>
<?
	titulo_mejorada("Configuración / Par&aacute;metros de Contabilidad (2)","","menu_int.php","configuracion_archivos/11");
?>
<TABLE width="100%">
  <TBODY>

  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="5"><pre><form action="configuracion_aux.php?Accion=Modificar&Configuracion=Config2" method="post" name="Modificar"><span class="Estilo4">
C&oacute;digo: <input 
            name=Codigo id="Codigo" readonly size=4 value='<?php echo "$Codigo"?>'>  <span class="ewGroupAggregate"><strong>  Nota: Recuerde que si ya existen Cuentas y/o Movimientos no debe cambiar los Par&aacute;metros</strong> </span></span><span class="ewGroupAggregate Estilo4">

<strong>BALANCE GENERAL:</strong>
</span><span class="Estilo4">N&uacute;mero para cuentas de activo: <input  name=Balact id="Balact2" size=8     value='<?php echo "$Balact"?>'>    N&uacute;mero para cuentas de pasivo: <INPUT 
		       name=Balpas id="Balpas" size=8     value='<?php echo "$Balpas"?>'>   N&uacute;mero para cuentas de patrimonio: <INPUT 
		       name=Balgan id="Balgan" size=8     value='<?php echo "$Balgan"?>'>            
<span class="ewGroupAggregate">
<strong>GANANCIAS Y/O PERDIDAS:</strong>
</span>N&uacute;mero para cuenta gan. per desde:  <INPUT  name=Baling id="Baling" size=2     value='<?php echo "$Baling"?>'>     N&uacute;mero para cuenta gan. per hasta:   <INPUT 
		       name=Baleng id="Baleng" size=2     value='<?php echo "$Baleng"?>'>           

<span class="ewGroupAggregate"><strong>CUENTAS DE ORDEN :</strong>
</span>N&uacute;mero para cuentas de orden desde: <INPUT 
		       name=balord id="balord" size=2     value='<?php echo "$Balord"?>'>           

 <!--<span class="ewGroupAggregate">NIVELES DE ACCESO A CUENTAS DE: </span>
Activo usuarios con nivel mayor o igual:   <SELECT name=Nivacca id="Nivacca" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana; HEIGHT: 18px"> 			<?php   
			    switch($Nivacca)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  ?>             </SELECT>       Patrimonio usuarios con nivel mayor o igual:  <SELECT name=Nivaccc id="Nivaccc" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana; HEIGHT: 18px">               <?php   
			    switch($Nivaccc)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  ?>             </SELECT> 
           
Pasivo usuarios con nivel mayor o igual: <SELECT name=Nivaccp id="Nivaccp" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana; HEIGHT: 18px">               <?php   
			    switch($Nivaccp)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  ?>             </SELECT>       Gan. per.usuarios con nivel mayor o igual:      <SELECT name=Nivacci id="Nivacci" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana; HEIGHT: 18px">               <?php   
			    switch($Nivacci)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  ?>			               </SELECT>             
</span><span class="ewGroupAggregate Estilo4">
Nro. m&aacute;ximo l&iacute;neas por comprobante:   </span><span class="Estilo4"><INPUT 
		       name=Nromaximo id="Nromaximo" size=8     value='<?php echo "$Nromaximo"?>'>      <span class="ewGroupAggregate">Numeraci&oacute;n autom&aacute;tica de comprobantes: </span></span><span class="letrasSmall Estilo4">  <SELECT name=Nroauto id="Nroauto" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana; HEIGHT: 18px">               <?php   
			    switch($Nroauto)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  ?>             </SELECT>
-->

</span><span class="letrasSmall Estilo5">
                                                            <input type="submit" name="Submit" value="Guardar">             </span>            <form/></pre>
<div align="right"></div></TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


