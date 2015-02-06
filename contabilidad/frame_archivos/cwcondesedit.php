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
 
 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'cwcondesedit_sql.php?Accion=Modificar';  
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = 'cwcondesedit_sql.php?Accion=Agregar';
 } 

 include("config_bd.php"); // archivo que llama a la base de datos 

 
 
 if ($accion=='modificar')
 {
   $codigo= $_GET['Codtipo'];
   
   $result = mysql_query("SELECT * FROM cwcondes WHERE Codtipo ='$codigo'", $conectar); 
   $row = mysql_fetch_row($result);    
   
   $Codtipo  = "$row[0]";
   $Descrip  = "$row[1]";

 }
?>
<?
titulo_mejorada("Descripciones por grupo de comprobante","","cwcondeslist.php","Imagenes/condes_jpg");
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
Grupo: <?php
			   if ($accion=='modificar')
               {
                 echo "<input name=Codtipo id='Codtipo' value='$codigo' readonly size=10 onBlur='javascript:this.value=this.value.toUpperCase()'>";
               } else if($accion=='agregar')
               {
                 echo '<input name=Codtipo id="Codtipo" value="# NUEVO" readonly size=10 onBlur="javascript:this.value=this.value.toUpperCase()">';
               }        			
			?>           Descripci&oacute;n:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Descrip"?>"> </span><span class="Estilo4">					               
            <input  align="middle" name="Codigo" type="hidden" id="Codigo" value='<?php echo "$codigo"?>'></span></pre>
            
	<input   align="middle" name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


