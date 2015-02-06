<?php 
session_start();
ob_start();
?>

<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>
<SCRIPT src="../lib/common.js" type=text/javascript></SCRIPT>
<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
-->
</style>

<BODY>
<?php 
 $accion  = $_GET['accion'];
 $Asiento = $_GET['Asiento'];
 $pagina= @$_GET['pagina'];
$feccom  = $_GET['feccom'];
if($_POST['feccom'])
	$feccom=$_POST['feccom'];
 //$Diferencia = $_GET['diferencia'];

 include("config_bd.php"); // archivo que llama a la base de datos 

 
 $Numcom_get = $_GET['Numcom'];
 
 $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom'  and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
 $Debito_total_array  = mysql_fetch_array($result_sum);

 $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom'  and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
 $Credito_total_array = mysql_fetch_array($result_sum);

 $Debito_total  = $Debito_total_array["suma_Debito"];
 $Credito_total = $Credito_total_array["suma_Credito"]; 

 $Total = $Debito_total - $Credito_total;

 if ($accion=='agregar')
 {
	//echo $Numcom_get;
    $result_max = mysql_query("SELECT MAX(Numlim) FROM cwcondco WHERE Numcom ='$Numcom_get'  and Fecha='$feccom'", $conectar); 
    $Numlim_max = mysql_result($result_max,0,0);    
    $Numlim = $Numlim_max + 1.0;
 } else if ($accion=='agregar_sub')
 {
    $Numlim = $_GET['Numlim'];
   	$Findebucle = 1;
    do {
         $result_do = mysql_query("SELECT COUNT(*) FROM cwcondco WHERE Numlim ='$Numlim' and Fecha='$feccom'", $conectar); 
         $row_do    = mysql_fetch_row($result_do);    
    $fecha=date('d/m/Y');
	$var = explode('-',$fecha);
//echo "$var[2]-$var[1]-$var[0]";  
         $Findebucle = $row_do[0];
         if ($Findebucle>0)		
         {
		   $Numlim = $Numlim + 0.0001;  
		 } 	  		
		
       } while ($Findebucle>0);
   
   $accion='agregar';
 }

 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'cwcondcoedit_sql.php?RecNo='.$Asiento.'&pagina='.$pagina.'&Accion=Modificar&feccom='.$feccom;
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = "cwcondcoedit_sql.php?Accion=Agregar&RecNo=".$Asiento.'&pagina='.$pagina.'&feccom='.$feccom;
 }

 if ($accion=='modificar')
 {
   $Numcom  = $_GET['Numcom'];
   $Asiento = $_GET['Asiento'];

   $result = mysql_query("SELECT * FROM cwcondco WHERE RecNo ='$Asiento' and Fecha='$feccom'", $conectar);
   $row = mysql_fetch_row($result);

   //$Fecha_bd = "$row[2]";

   $Cuenta   = "$row[3]";
	$consulta = "SELECT Descrip FROM cwconcue WHERE Cuenta='".$Cuenta."' ";
	$resultado = mysql_query($consulta);
	$fetch = mysql_fetch_array($resultado);
	$descrip=$fetch['Descrip'];
   $Referen  = "$row[4]";
   $Tiporef  = "$row[5]";
   $Descrip  = "$row[6]";
   $Debito   = "$row[7]";
   $Credito  = "$row[8]";
	$fechaD   = "$row[17]";
   $fch = explode("-",$fechaD);
   $FechaD = $fch[2]."/".$fch[1]."/".$fch[0];

 }
if ($accion=='agregar')
 {
 $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom_get'  and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
 $Debito_total_array  = mysql_fetch_array($result_sum);

 $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom_get'  and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
 $Credito_total_array = mysql_fetch_array($result_sum);

 $Debito_total  = $Debito_total_array["suma_Debito"];
 $Credito_total = $Credito_total_array["suma_Credito"]; 

 $Total = $Debito_total - $Credito_total;
 if($Total<0)
 {
	$Total=$Total*-1;
 }
//echo "<br>".$Debito_total." ".$Credito_total;
 
   $Numcom  = $_GET['Numcom'];
   $result_max = mysql_query("SELECT MAX(RecNo) FROM cwcondco WHERE Numcom ='$Numcom_get' and Fecha='$feccom'", $conectar); 
   $Asi = mysql_result($result_max,0,0);

   $result = mysql_query("SELECT * FROM cwcondco WHERE RecNo ='$Asi' and Fecha='$feccom'", $conectar);
   $row = mysql_fetch_row($result);

   //$Fecha_bd = "$row[2]";

   $Cuenta   = "$row[3]";

	$consulta = "SELECT Descrip FROM cwconcue WHERE Cuenta='".$Cuenta."' ";
	$resultado = mysql_query($consulta);
	$fetch = mysql_fetch_array($resultado);
	$descrip=$fetch['Descrip'];

   $Referen  = "$row[4]";
   $Tiporef  = "$row[5]";
   $Descrip  = "$row[6]";
   $Debito   = "$Total";
   $Credito  = "$Total";
	$fechaD   = "$row[17]";
   $fch = explode("-",$fechaD);
   $FechaD = $fch[2]."/".$fch[1]."/".$fch[0];

 }

?>
<?
titulo_mejorada("Asientos",'',"cwcondcolist.php?Numcom=$Numcom_get&pagina=$pagina&feccom=$feccom","Imagenes/asientosjpg");
?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <tD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <tr>
          <TD colspan="2"><form name="Editar" method="post" action="<?php echo $url_dinamico?>">
            <pre><span class="Estilo4">
Asiento: <?php
			   if ($accion=='modificar')
               {
                 echo "<input name=Numcom id='Numcom' value='$Asiento' readonly size=40>";
               } else if ($accion=='agregar')
               {
                 echo '<input name=Numcom id="Numcom" readonly value="" onKeyPress="validarEntero(this)" size=40 onBlur="javascript:this.value=Val_num_cod(echo $Niv1, this.value)">';
               }
			?>Comprobante: <input name="Comprobante" readonly type="text" id="Comprobante" value="<?php echo $Numcom_get?>"></TD></tr>
<tr><br><TD width="300">Cuenta:&nbsp;<INPUT type="text" name="Cuenta" id="Cuenta" readonly="true" onchange="javascript:cargar_nombrecue();" value="<?echo $Cuenta;?>">&nbsp;<INPUT type="button" name="buscar_cuenta" value="Buscar" onclick="javascrip:window.open('cuentas_buscar.php','cuentas','width=800')"></TD><TD>
<table align="left" width="" border="0"><tr><TD><INPUT type="text" size="50" readonly="true" name="nombrec" id="nombrec" value="<?echo $descrip;?>"></td></tr></table>
<br><input name="Numlim" type="hidden" id="Numlim" value="<?php echo $Numlim?>"></TD></tr>


<tr><TD colspan="2">
Fecha:&nbsp;&nbsp;<input name=fecha id="fecha" type="text" style="width:100px"  maxlength="60" value="<?php  echo "$FechaD"?>" > <input name="image3" type="image" id="fechad" src="jscalendar/cal.gif" />
<script type="text/javascript"> 
Calendar.setup({inputField:"fecha",ifFormat:"%d/%m/%Y",button:"fechad"}); 
</script>
Referencia:   <input name="Referen" type="text" id="Referen" value="<?php echo "$Referen"?>">

Tipo:  <select name="Tiporef" id="Tiporef">
<option <?php if ($Tiporef == 'SI') echo 'selected' ?> value="SI">SI</option>
<option <?php if ($Tiporef == 'DP') echo 'selected' ?> value="DP">DP</option>
<option <?php if ($Tiporef == 'CH') echo 'selected' ?> value="CH">CH</option>
<option <?php if ($Tiporef == 'NC') echo 'selected' ?> value="NC">NC</option>
<option <?php if ($Tiporef == 'ND') echo 'selected' ?> value="ND">ND</option>
<option <?php if ($Tiporef == 'OT') echo 'selected' ?> value="OT">OT</option>
<option <?php if ($Tiporef == 'RP') echo 'selected' ?> value="RP">RP</option>
<option <?php if ($Tiporef == 'RI') echo 'selected' ?> value="RI">RI</option>
<option <?php if ($Tiporef == 'FC') echo 'selected' ?> value="FC">FC</option>
<option <?php if ($Tiporef == 'AJ') echo 'selected' ?> value="AJ">AJ</option>
<option <?php if ($Tiporef == 'OC') echo 'selected' ?> value="OC">OC</option>
<option <?php if ($Tiporef == 'OE') echo 'selected' ?> value="OE">OE</option>
<option <?php if ($Tiporef == 'OS') echo 'selected' ?> value="OS">OS</option>


</select>
</TD></tr>
<tr><TD colspan="2">Descripci&oacute;n de asiento:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php  echo "$Descrip"?>"> 
</TD></tr>
<tr><TD colspan="2">Debito/Cr&eacute;dito: <input name="Deb_cre" type="text" id="Deb_cre" 
  <?php if ($Debito<>'0') 
        { 
		  echo "value='$Debito'"; 
        } else if ($Credito<>'0') 
		{ 
		  echo "value='$Credito'"; 
        }         
  ?> >  <select name="Deb_cre_menu" id="Deb_cre_menu">
  <?php if ($Debito_total<$Credito_total) 
        { 
		  echo '<option selected value="0">DEBITO</option>'; 
		  echo '<option value="1">CREDITO</option>'; 
        } else if ($Debito_total>$Credito_total) 
		{ 
		  echo '<option value="0">DEBITO</option>'; 
		  echo '<option selected value="1">CREDITO</option>'; 
        } else 
		{ 
		  echo '<option value="0">DEBITO</option>'; 
		  echo '<option value="1">CREDITO</option>'; 
        }         
  ?> </select></span></pre>
</TD></tr>
<tr><TD colspan="2" align="center">            
              <input name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form><form action="cwcondcolist.php?RecNo=<?php echo $RecNo?>" method="get" name="Form_aux"><input name="Numcom" type="hidden" value="<?php echo $Numcom_get?>"><input name="feccom" type="hidden" value="<?php echo $feccom?>"><input name="RecNo" type="hidden" value="<?php echo $RecNo?>"><input name="pagina" type="hidden" value="<?php echo $pagina?>"></form>
            </TD>
          </TR>

        </TBODY></TABLE>
      </DIV></tr></TR>
</TBODY></TABLE></BODY></HTML>
