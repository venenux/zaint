<HTML xmlns="http://www.w3.org/1999/xhtml" xmlns:spry = "http://ns.adobe.com/spry" class="fondo">

<HEAD>
<TITLE>SELECTRA</TITLE>

<LINK href="menu_int_archivos/estilos.css" type="text/css" rel="stylesheet">
<SCRIPT src="menu_int_archivos/common.js" type="text/javascript">
</SCRIPT>

<?require_once 'lib/config.php';
	require_once 'lib/common.php';
	include("header.php");?>


<BODY>
<?titulo("Reportes","","menu_rep.php","70");?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <TD>
      <DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>
            <DIV class=box>
            <TABLE class=boton 
            style="CURSOR: pointer" 
            onclick="javascript:window.location='rep_balgen_pre_fiscal.php'" 
             height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="menu_archivos/9.png" width="32" height="32" class=icon></DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text align=center>Balance General </DIV></TD></TR></TBODY></TABLE></DIV>
            <DIV class=box>
            <TABLE class=boton 
            style="CURSOR: pointer" 
            onclick="javascript:window.location='rep_balcom_pre_fiscal.php'" 
             height=90 cellSpacing=0 
            cellPadding=0 width=100 border=0>
              <TBODY>
              <TR>
                <TD vAlign=bottom height=45>
                  <DIV align=center><IMG 
                  src="menu_archivos/6.png" width="47" height="33" class=icon></DIV></TD></TR>
              <TR>
                <TD height=45>
                  <DIV class=boton-text align=center>Balance de Comprobaci&oacute;n</DIV></TD></TR></TBODY></TABLE></DIV>
            </TD>
        </TR>
        <TR>
          <TD>&nbsp;</TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></BODY></HTML>
