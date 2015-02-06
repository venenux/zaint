<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0046)http://asys.no-ip.org/asysadmin/parametros.php -->
<HTML xmlns="http://www.w3.org/1999/xhtml" xmlns:spry = 
"http://ns.adobe.com/spry"><HEAD><TITLE>SELECTRA</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="parametros_archivos/estilos.css" type=text/css rel=stylesheet>


<SCRIPT src="configuracion_archivos/common.js" type=text/javascript></SCRIPT>

<SCRIPT src="configuracion_archivos/xpath.js" type=text/javascript></SCRIPT>

<SCRIPT src="parametros_archivos/xpath.js" type="text/javascript"></SCRIPT>
<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-blue.css" title="win2k-cold-1" /> 
<script type="text/javascript" src="jscalendar/calendar.js"></script> 
<script type="text/javascript" src="jscalendar/lang/calendar-es.js"></script> 
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script> 


<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</HEAD>
<BODY>

<?php 
  $Cuenta_inicio = $_GET['Cuenta_inicio'];
  $Cuenta_fin    = $_GET['Cuenta_fin'];


 $Fecha = date("d/m/Y",time());

 include("config_bd.php"); // archivo que llama a la base de datos 

 
 
?>

<TABLE width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <DIV class=tb-tit>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD><SPAN style="FLOAT: left"><IMG class=icon height=32 src="menu_archivos/5.png" 
            width=32>Diario Legal</SPAN></TD>
          <TD align=right>
            <TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='menu_rep.php';" 
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
          <TD colspan="6"><form action="rep_dialeglist_num.php" method="post" name="Editar" target="_blank">
            <pre>

<span class="Estilo4"><span class="ewGroupAggregate">Reporte entre fechas</span>  
Desde: <input name="fecha11" id="fecha11" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fecha"?>" > <input name="image3" type="image" id="fechadesde" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha11",ifFormat:"%d/%m/%Y",button:"fechadesde"}); 
			</script>
Hasta <input name="fecha22" id="fecha22" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fecha"?>" > <input name="image3" type="image" id="fechahasta" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha22",ifFormat:"%d/%m/%Y",button:"fechahasta"}); 
			</script>
<!--Desde:<input      <?php 
                     $Retornador = 'http://selectra.asys.com.ve/contabilidad/frame_archivos/rep_dialeg_pre.php#';
				   ?>
                   name="fecha11" id="fecha11" tabindex=2 onBlur=ValidDate(this) onChange=ValidDate(this) 
                   onKeyPress=FormatoFecha(this); value='<?php echo "$Fecha"?>' maxlength=10 readonly> <a  onClick="javascript:window.dateField = fecha11; calendar = window.open('http://selectra.asys.com.ve/contabilidad/frame_archivos/calendario.htm','cal1','width=180,height=210','x=500,y=500')" href="<?php echo $Retornador?>"><img id=p_calend height=20 alt=Calendario src="parametros_archivos/calendario.gif" align=absMiddle border=0 name=calendario2></a>    

Hasta: <input 
                   name="fecha22" id="fecha22" tabindex=3 onBlur=ValidDate(this) onChange=ValidDate(this) 
                   onKeyPress=FormatoFecha(this); value='<?php echo "$Fecha"?>' maxlength=10 readonly> <a  onClick="javascript:window.dateField = fecha22; calendar = window.open('http://selectra.asys.com.ve/contabilidad/frame_archivos/calendario.htm','cal1','width=180,height=210','x=500,y=500')" href="<?php echo $Retornador?>"><img id=p_calend height=20 alt=Calendario src="parametros_archivos/calendario.gif" align=absMiddle border=0 name=calendario2></a> -->

</span><input name="Aceptar" type="submit" id="Aceptar" value='Aceptar'>
            </pre>
            
              </form>
            <form action="rep_analitico_cwconcuelist2.php" method="get" name="Regreso" ><input name="Cuenta_inicio" type="hidden" value="<?php echo $Cuenta_inicio ?>"> </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


