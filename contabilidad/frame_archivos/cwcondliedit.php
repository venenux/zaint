<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0046)http://asys.no-ip.org/asysadmin/parametros.php -->
<HTML xmlns="http://www.w3.org/1999/xhtml" xmlns:spry = 
"http://ns.adobe.com/spry"><HEAD><TITLE>SELECTRA</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="parametros_archivos/estilos.css" type=text/css rel=stylesheet>


<SCRIPT src="configuracion_archivos/common.js" type=text/javascript></SCRIPT>

<SCRIPT src="configuracion_archivos/xpath.js" type=text/javascript></SCRIPT>



<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
-->
</style>
</HEAD>
<BODY>
<?php 
 $accion= $_GET['accion'];
 
 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'cwcondliedit_sql.php?Accion=Modificar';  
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = 'cwcondliedit_sql.php?Accion=Agregar';
 } 

 include("config_bd.php"); // archivo que llama a la base de datos 

 
 
 if ($accion=='modificar')
 {
   $codigo= $_GET['RecNo'];
   
   $result = mysql_query("SELECT * FROM cwcondli WHERE RecNo ='$codigo'", $conectar); 
   $row = mysql_fetch_row($result);    
   
   $RecNo  = "$row[0]";
   $Descrip  = "$row[1]";

 }
?>

<TABLE width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <DIV class=tb-tit>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD><SPAN style="FLOAT: left"><IMG class=icon height=38 src="Imagenes/descripciones_asientos_libres.jpg" 
            width=35>Descripciones asientos libres</SPAN></TD>
          <TD align=right>
            <TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='cwcondlilist.php';" 
            cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=20 alt="" src="parametros_archivos/bt_left.gif" 
                width=5></TD>
                <TD class=btn_bg><IMG height=16 
                  src="parametros_archivos/ico_up.gif" width=16></TD>
                <TD class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Regresar</TD>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=20 alt="" src="parametros_archivos/bt_right.gif" 
                  width=5></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></TD></TR>
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="6"><form name="Editar" method="post" action="<?php echo $url_dinamico?>">
            <pre><span class="Estilo4">
C&oacute;digo asientos libres: <?php
			   if ($accion=='modificar')
               {
                 echo "<input name=RecNo id='RecNo' value='$codigo' readonly size=10 onBlur='javascript:this.value=this.value.toUpperCase()'>";
               } else if($accion=='agregar')
               {
                 echo '<input name=RecNo id="RecNo" value="# NUEVO" readonly size=10 onBlur="javascript:this.value=this.value.toUpperCase()">';
               }        			
			?>           Descripci&oacute;n:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Descrip"?>"> </span><span class="Estilo4"><input name="Codigo" type="hidden" id="Codigo" value='<?php echo "$codigo"?>'></span></pre>
            
              <input name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


