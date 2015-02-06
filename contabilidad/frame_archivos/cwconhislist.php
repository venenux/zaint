<?php


  include("config_bd.php"); 

?>

<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="usuarioslist_archivos/Asys_Maker.css" type=text/css rel=stylesheet><LINK 
href="usuarioslist_archivos/estilos.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
<style type="text/css">
<!--
.Estilo2 {font-size: small}
.Estilo5 {font-size: medium}
-->
</style>
</HEAD>
<BODY>
<SCRIPT type=text/javascript>
<!--
EW_LookupFn = "ewlookup.php"; // ewlookup file name
EW_AddOptFn = "ewaddopt.php"; // ewaddopt.php file name

//-->
</SCRIPT>

<SCRIPT src="usuarioslist_archivos/ewp.js" type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
<!--
EW_dateSep = "/"; // set date separator
EW_UploadAllowedFileExt = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip"; // allowed upload file extension

//-->
</SCRIPT>

<SCRIPT type=text/javascript>
<!--
function EW_checkMyForm(EW_this) {
return true;
}

//-->
</SCRIPT>

<SCRIPT type=text/javascript>
<!--
var firstrowoffset = 1; // first data row start at
var tablename = 'ewlistmain'; // table name
var lastrowoffset = 0; // footer row
var usecss = true; // use css
var rowclass = 'ewTableRow'; // row class
var rowaltclass = 'ewTableAltRow'; // row alternate class
var rowmoverclass = 'ewTableHighlightRow'; // row mouse over class
var rowselectedclass = 'ewTableSelectRow'; // row selected class
var roweditclass = 'ewTableEditRow'; // row edit class
var rowcolor = '#FFFFFF'; // row color
var rowaltcolor = '#EEF2F5'; // row alternate color
var rowmovercolor = '#DDEEFF'; // row mouse over color
var rowselectedcolor = '#DDEEFF'; // row selected color
var roweditcolor = '#DDEEFF'; // row edit color

//-->
</SCRIPT>

<SCRIPT type=text/javascript>
<!--
	var EW_DHTMLEditors = [];

//-->
</SCRIPT>

<?php 
  $Cuenta  = $_GET['Cuenta'];
  $pagina  = $_GET['pagina'];
?>

<TABLE class=tb-tit width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="40%"><SPAN style="FLOAT: left"><IMG class=icon height=47 src="Imagenes/Historicojpg.jpg" 
            width=44>Hist&oacute;ricos</SPAN></TD>
          <TD width="5%">Cuenta:</TD>
          <TD width="14%"><input name="Cuenta" type="text" id="Cuenta" value="<?php echo $Cuenta ?>"></TD>
          <TD width="41%" align=right><TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='cwconcuelist.php?pagina=<?echo $pagina?>';" 
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
                  width=5></TD>
              </TR>
            </TBODY>
          </TABLE></TD>
        </TR></TBODY>
      </TABLE></TD></TR></TBODY></TABLE>
<TABLE class=ewBasicSearch width="100%">
  
  <TBODY></TBODY></TABLE>
<TABLE class=tb-head width="100%">
  <TBODY>
  <TR>
    <TD>&nbsp;      </TD>
  </TR></TBODY></TABLE>  

<?php 
  
 
  $result = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta'", $conectar); //HISTORICOS DE LA CUENTA
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">';
      echo "<table border = '1'> \n"; 
      echo "<tr class=ewTableHeader >";  

        echo '<td vAlign=top><SPAN>Mes</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Año</SPAN></td>';
        echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Saldo Anterior</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Débito</SPAN></td>';
        echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Créditos</SPAN></td>';
        echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Saldo Actual</SPAN></td>';

		echo "<TD>&nbsp;</TD>";
	  echo "</tr> \n"; 
	
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
  	    $Debito  = $row["Debitou"];
	    $Credito = $row["Creditou"];

	    $Debito_float  = ((real) $Debito);
	    $Credito_float = ((real) $Credito);
		
		$Debito_float_format  = number_format($Debito_float,2,',','.');
		$Credito_float_format = number_format($Credito_float,2,',','.');
		
		$Debito_float_format  = ((string)$Debito_float_format);
		$Credito_float_format = ((string)$Credito_float_format);
	  
	    $Salactu = $row["Salactu"];
		$Salantu = $row["Salantu"];
		
	    $Salactu_float  = ((real) $Salactu);
	    $Salantu_float = ((real) $Salantu);
		
		$Salactu_float_format  = number_format($Salactu_float,2,',','.');
		$Salantu_float_format = number_format($Salantu_float,2,',','.');
		
		$Salactu_float_format  = ((string)$Salactu_float_format);
		$Salantu_float_format = ((string)$Salantu_float_format);
			
		
	  
        echo "<tr class=ewTableAltRow onmouseover=ew_mouseover(this); onclick=ew_click(this); onmouseout=ew_mouseout(this);><td>".$row["Desmes"]."</td><td></td><td>".$row["Anio"]."</td><td></td><td>".$Salantu_float_format."</td><td></td><td>".$Debito_float_format."</td><td></td><td>".$Credito_float_format."</td><td></td><td>".$Salactu_float_format."</td>"; 

          //echo '<TD noWrap width="1%"><A href="cwcondcoedit.php?Numlim='.$Numlim.'&Numcom='.$Numcom.'&Asiento='.$row["RecNo"].'&accion=agregar_sub">';
		    //echo '<IMG height=15 alt=Agregar asiento hijo src="usuarioslist_archivos/add.gif" width=15 border=0></A> </TD>';

        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún registro histórico para esta cuenta !";
  } 

 

 
?> 

<form name="form1" method="post" action="">
  <pre>&nbsp;                                                               </pre>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body> 
</html>

<?php  mysql_close($conectar); ?>
