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
-->
</style>

<BODY>
<?php 
 $Fecha = date("d/m/Y",time());

 include("config_bd.php"); // archivo que llama a la base de datos 

 
 
?>
<?
titulo_mejorada("Reporte de Comprobantes",'',"menu_rep.php","Imagenes/asientosjpg");
?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="6"><form action="rep_cwconhcolist_num.php" method="post" name="Editar" target="_blank">
            <pre><span class="Estilo4">
Buscar por:  <select name="Buscar" id="Buscar"><option value="0">TODOS</option><option value="1">FECHA</option><option value="2">CODIGO</option></select>         Filtrar por estado: <select name="Filtro_Estado" id="Filtro_Estado"><option value="0">TODOS</option><option value="1">TRANSITO</option><option value="2">CONTABILIZADOS</option><option value="3">DESCUADRADOS</option></select></span><span class="Estilo4">

<span class="ewGroupAggregate">Para reportes al buscar por Fecha</span>
Desde: <input name="fecha11" id="fecha11" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fecha"?>" > <input name="image3" type="image" id="fechadesde" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha11",ifFormat:"%d/%m/%Y",button:"fechadesde"}); 
			</script>
Hasta <input name="fecha22" id="fecha22" type="text" style="width:100px"  maxlength="60" value="<?php echo "$Fecha"?>" > <input name="image3" type="image" id="fechahasta" src="jscalendar/cal.gif" />
		   	<script type="text/javascript"> 
   			Calendar.setup({inputField:"fecha22",ifFormat:"%d/%m/%Y",button:"fechahasta"}); 
			</script>
<!--Desde:<input 
                   name=fecha11 id="fecha12" tabindex=2 onBlur=ValidDate(this) onChange=ValidDate(this) 
                   onKeyPress=FormatoFecha(this); value='<?php echo "$Fecha"?>' maxlength=10 readonly> <a  onClick="javascript:window.dateField = fecha11; calendar = window.open('http://selectra.asys.com.ve/contabilidad/frame_archivos/calendario.htm','cal1','width=180,height=210','x=500,y=500')" href="http://selectra.asys.com.ve/contabilidad/frame_archivos/rep_cwconhco_pre.php#"><img id=p_calend height=20 alt=Calendario src="parametros_archivos/calendario.gif" align=absMiddle border=0 name=calendario2></a>    

Hasta: <input 
                   name=fecha22 id="fecha22" tabindex=3 onBlur=ValidDate(this) onChange=ValidDate(this) 
                   onKeyPress=FormatoFecha(this); value='<?php echo "$Fecha"?>' maxlength=10 readonly> <a  onClick="javascript:window.dateField = fecha22; calendar = window.open('http://selectra.asys.com.ve/contabilidad/frame_archivos/calendario.htm','cal1','width=180,height=210','x=500,y=500')" href="http://selectra.asys.com.ve/contabilidad/frame_archivos/rep_cwconhco_pre.php#"><img id=p_calend height=20 alt=Calendario src="parametros_archivos/calendario.gif" align=absMiddle border=0 name=calendario2></a> 
-->
<span class="ewGroupAggregate">Para reportes al buscar por C&oacute;digo</span>

Desde:<input name="Desde_cod" type="text" id="Desde_cod" onKeyPress="validarEntero(this)" value="1">             

Hasta: <input name="Hasta_cod" type="text" id="Hasta_cod" onKeyPress="validarEntero(this)" value="1"></span></pre>
            
              <input name="Aceptar" type="submit" id="Aceptar" value='Aceptar'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


