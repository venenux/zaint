<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>

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
 $accion= $_GET['accion'];
 $pagina= $_GET['pagina'];
 $feccom  = $_GET['feccom'];
if($_POST['feccom'])
	$feccom=$_POST['feccom'];

 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'cwconhcoedit_sql.php?Accion=Modificar&pagina='.$pagina.'&feccom='.$feccom;  
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = 'cwconhcoedit_sql.php?Accion=Agregar&pagina='.$pagina;
 } 

 include("config_bd.php"); // archivo que llama a la base de datos 

 //$result_cifras = mysql_query("SELECT * FROM cwconfig", $conectar); 
 //$row_cifras    = mysql_fetch_row($result_cifras);    
 //$Niv1 = ((integer)$row_cifras[10]);
 
 $Numcom_get = $_GET['Numcom'];
 
 $Fecha = date("d/m/Y",time()); 
 
 if ($accion=='modificar')
 {
   $codigo= $_GET['Numcom'];
   
   $result = mysql_query("SELECT * FROM cwconhco WHERE Numcom ='$codigo' and Fecha='$feccom'", $conectar); 
   $row = mysql_fetch_row($result);    
   
   $Numcom   = "$row[0]";
   $Codtipo  = "$row[1]";
   $Fecha_bd = "$row[2]";
   $Descrip  = "$row[3]";
   $Estado   = "$row[4]";
   
   $Fecha = $Fecha_bd[8].$Fecha_bd[9]."/".$Fecha_bd[5].$Fecha_bd[6]."/".$Fecha_bd[0].$Fecha_bd[1].$Fecha_bd[2].$Fecha_bd[3];

   //$result = mysql_query("SELECT Fiscaltipo FROM cwconhco WHERE Cuenta ='$codigo'", $conectar); 
   //$row = mysql_fetch_row($result);    
   //$Fiscaltipo = "$row[0]"; 
   
 }
?>
<?
titulo_mejorada("Comprobantes","","cwconhcolist.php?pagina=$pagina","Imagenes/asientosjpg");
?>
<TABLE width="100%">
  <TBODY>
 
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="6"><form name="Editar" method="post" action="<?php echo $url_dinamico?>">
            <pre><span class="Estilo4">
Comprobante: <?php
			   if ($accion=='modificar')
               {
                 echo "<input name=Numcom id='Numcom' value='$codigo' readonly size=40>";
               } else if($accion=='agregar')
               {
                 echo '<input name=Numcom id="Numcom" readonly value="" onKeyPress="validarEntero(this)" size=40 onBlur="javascript:this.value=Val_num_cod(echo $Niv1, this.value)">';
               }        			
			?>               

Tipo:  <select name="Codtipo" id="Codtipo">
<?php 
	$consultacod = "SELECT MAX(Numcom) AS maximo FROM cwconhco";
	$resultadocod = mysql_query($consultacod, $conectar);
	$fila = mysql_fetch_array($resultadocod);
	$ncodigo = $fila['maximo'];

 $result_combo = mysql_query("SELECT * FROM cwcontco order by Descrip", $conectar); 
 //$row_combo    = mysql_fetch_row($result_combo);    
 if (mysql_num_rows($result_combo))
 { 
   while ($row_combo = @mysql_fetch_array($result_combo)) 
   {
     if  ($Codtipo==$row_combo["Codtipo"]) {$seleccion = 'selected';} else {$seleccion ='';}
     echo '<option '.$seleccion.' value="'.$row_combo["Codtipo"].'">'.$row_combo["Descrip"].'</option>';
   }
 }  
?>
</select>

Fecha:&nbsp;&nbsp;<input name=fecha id="fecha" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fecha"?>" > <input name="image3" type="image" id="fechad" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha",ifFormat:"%d/%m/%Y",button:"fechad"}); 
			</script>
Descripci&oacute;n de cuenta:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Descrip"?>"> </span></pre>
            
              <input name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


