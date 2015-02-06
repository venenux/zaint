<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>
<BODY>
<?
titulo_mejorada("Cuentas",'',"menu_rep.php","Imagenes/cuentas2");
?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <TD >
      <DIV >
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>
            <DIV class=box>
            <TABLE class=boton  
            style="CURSOR: pointer" 
            onclick="javascript:window.open('rep_cwconcuelist_num.php?criterio=0');" 
             height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="Imagenes/cuentas2.jpg" width="35" height="33" class=icon>1</DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text align=center>Ordenadas por Cuenta</DIV></TD></TR></TBODY></TABLE></DIV>
            <DIV class=box>
            <TABLE class=boton   
            style="CURSOR: pointer" 
            onclick="javascript:window.open('rep_cwconcuelist_num.php?criterio=1');" 
              height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="Imagenes/cuentas2.jpg" width="35" height="33" class=icon>2</DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text 
            align=center>Ordenadas por Descripci&oacute;n</DIV></TD></TR></TBODY></TABLE></DIV>
            <DIV class=box>
            <TABLE class=boton   
            style="CURSOR: pointer" 
            onclick="javascript:window.location='rep_cwconcue_pre.php';" 
              height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="Imagenes/cuentas2.jpg" width="35" height="33" class=icon>3</DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text align=center>Ordenadas por Niveles</DIV></TD></TR></TBODY></TABLE></DIV>

		  <DIV class=box>
            <TABLE class=boton   
            style="CURSOR: pointer" 
            onclick="javascript:window.open('rep_cwconcuelist_num_excel.php?criterio=0');" 
              height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="Imagenes/excel.jpg" width="35" height="33" class=icon>4</DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text 
            align=center>Listado de cuentas</DIV></TD></TR></TBODY></TABLE></DIV>
            <DIV class=box></DIV>
            <DIV class=box>            </DIV>
            <DIV class=box>            </DIV>
            <DIV class=box>            </DIV>
            </TD>
        </TR>
        <TR>
          <TD>&nbsp;</TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></BODY></HTML>
