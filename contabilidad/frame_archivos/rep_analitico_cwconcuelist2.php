
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="usuarioslist_archivos/Asys_Maker.css" type=text/css rel=stylesheet><LINK 
href="usuarioslist_archivos/estilos.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
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
  $Cuenta_inicio = $_GET['Cuenta_inicio'];
?>
<TABLE class=tb-tit width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="37%"><SPAN style="FLOAT: left"><IMG class=icon height=32 src="menu_archivos/2.png" 
            width=32>Seleccione la cuenta final </SPAN></TD>
          <TD width="24%" align=right>Cuenta inicial: 
            <input type="text" name="textfield" value="<?php echo $Cuenta_inicio?>"></TD>
          <TD width="39%" align=right><TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='rep_analitico_cwconcuelist1.php';" 
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
    <TD>      <table width="690">
      <tbody>
        <tr>
          <form id=fusuarioslistsrch method="get" name=fusuarioslistsrch action='rep_analitico_cwconcuelist2.php?unico=SI'>
            <td width="134"><input name=psearch></td>
            <td width="76">
              <table class=btn_bg style="CURSOR: pointer" 
            onClick=javascript:window.document.fusuarioslistsrch.submit() 
            cellspacing=0 cellpadding=0 border=0>
                <tbody>
                  <tr>
                    <td 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                  width=4></td>
                    <td class=btn_bg><img height=16 
                  src="usuarioslist_archivos/search.gif" width=16></td>
                    <td class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                nowrap>Buscar</td>
                    <td 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_right.gif" 
                  width=4></td>
                  </tr>
                </tbody>
            </table></td>
            <td width="109">
              <table class=btn_bg style="CURSOR: pointer" 
            onClick="javascript:window.document.fusuarioslistsrch.submit()" 
            cellspacing=0 cellpadding=0 border=0>
                <tbody>
                  <tr>
                    <td 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                  width=4></td>
                    <td class=btn_bg><img height=16 
                  src="usuarioslist_archivos/list.gif" width=16></td>
                    <td class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                nowrap>Mostrar todo</td>
                    <td 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_right.gif" 
                  width=4></td>
                  </tr>
                </tbody>
            </table></td>

            <td width="7"><input name="Cuenta_inicio" type="hidden" id="Cuenta_inicio" value="<?php echo $Cuenta_inicio?>"> </td>
            <td width="89">Filtrar por nivel:</td>
            <td width="42"><select name="criterio" id="criterio">
              <option value="0"> </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                                                </select></td>
            <td width="201"><table width="157" border=0 cellpadding=0 
            cellspacing=0 
            onClick=javascript:window.document.fusuarioslistsrch.submit() class=btn_bg style="CURSOR: pointer">
                <tbody>
                  <tr>
                    <td width="4" height="32" 
                align=right 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px"><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                  width=4></td>
                    <td width="35" class=btn_bg><img height=32 
                  src="Imagenes/MARK.GIF" width=32></td>
                    <td width="111" 
                nowrap class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Buscar por nivel </td>
                    <td width="10" 
                align=left 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px"><img 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_right.gif" 
                  width=4></td>
                  </tr>
                </tbody>
            </table></td>
          </form>
        </tr>
      </tbody>
    </table></TD>
  </TR></TBODY></TABLE>  
  

<?php 
/******************************************************/
/* Funcion paginar
 * actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
 */
function paginar($actual, $total, $por_pagina, $enlace) {
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  if ($actual>1)
    $texto = "<a href=\"$enlace$anterior\">&laquo;</a> ";
  else
    $texto = "<b>&laquo;</b> ";
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  $texto .= "<b>$actual</b> ";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  if ($actual<$total_paginas)
    $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
  else
    $texto .= "<b>&raquo;</b>";
  return $texto;
}
  

  $pag= $_GET['pag'];
  $order= $_GET['order'];
  $unico= $_GET['unico'];
  $psearch = $_GET['psearch'];
  
  $criterio = $_GET['criterio'];

  if (($criterio == '') || ($criterio == '0')) 
  {
    $criterio = '0';  
	if ($psearch=='')
	{
	  $unico    = 'NO';
	} else
	{
	  $unico    = 'SI';
	}
  } 
  
  if (($unico=='SI')&&($psearch == ''))
  {  
    $unico ='NO';
	$order = 'Cuenta_ASC';	
  }
  
  include("config_bd.php"); // archivo que llama a la base de datos 

  if (!isset($pag)) $pag = 1; // Por defecto, pagina 1

  if (($criterio == '') || ($criterio == '0')) 
  {
    $result = mysql_query("SELECT COUNT(*) FROM cwconcue", $conectar); 
  } else if (($criterio == '1') || ($criterio == '2') || ($criterio == '3') || ($criterio == '4') || ($criterio == '5') || ($criterio == '6') || ($criterio == '7') || ($criterio == '8') || ($criterio == '9')   ) 
  {
    $result = mysql_query("SELECT COUNT(*) FROM cwconcue WHERE Nivel='$criterio'", $conectar); 
  }

  $row = mysql_fetch_row($result);  
  $num_tot = "$row[0]";
  
  list($total) = mysql_fetch_row($result);
  $tampag = 10;
  $reg1 = ($pag-1) * $tampag;
 
  if ($unico=='SI')
  {
    if ($psearch<>'') 
	{
      $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Cuenta='$psearch'", $conectar); 
      //$result = mysql_query("SELECT Cuenta, Nivel, Tipo, Descrip, Bancos, MonPre, MonModif, FechaNuevo, CtaNueva, Auxunico, Monetaria, Ctaajuste, Marca, MonPreu, MonModify, Ccostos, Terceros, Cuentalt, Descripalt, Fiscaltipo, Tipocosto FROM cwconcue WHERE Cuenta='$psearch'", $conectar); 
	}	
  } else
  {
    if (($criterio=='0') || ($criterio==''))
    {  
      switch($order)
      {
        case "":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue ORDER BY Cuenta ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Cuenta_ASC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue ORDER BY Cuenta ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Cuenta_DESC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue ORDER BY Cuenta DESC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Descrip_ASC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue ORDER BY Descrip ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Descrip_DESC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue ORDER BY Descrip DESC LIMIT $reg1, $tampag", $conectar); 
        break;
      } 
	} else if (($criterio=='1') || ($criterio=='2') || ($criterio=='3') || ($criterio=='4') || ($criterio=='5') || ($criterio=='6') || ($criterio=='7') || ($criterio=='8') || ($criterio=='9'))
    {
      switch($order)
      {
        case "":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Nivel='$criterio' ORDER BY Cuenta ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Cuenta_ASC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Nivel='$criterio' ORDER BY Cuenta ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Cuenta_DESC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Nivel='$criterio' ORDER BY Cuenta DESC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Descrip_ASC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Nivel='$criterio' ORDER BY Descrip ASC LIMIT $reg1, $tampag", $conectar); 
        break;
        case "Descrip_DESC":
          $result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto FROM cwconcue WHERE Nivel='$criterio' ORDER BY Descrip DESC LIMIT $reg1, $tampag", $conectar); 
        break;		
	    
      }
    }
  } 

  //$result = mysql_query("SELECT Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto  FROM cwconcue ORDER BY Cuenta ASC LIMIT $reg1, $tampag", $conectar); 
  
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '1'> \n"; 
      echo "<tr class=ewTableHeader >";  
	    echo '<td vAlign=top><SPAN>Nivel</SPAN></td>';

        if (($criterio=='0') || ($criterio==''))
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&Cuenta_inicio='.$Cuenta_inicio.'&criterio=">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&Cuenta_inicio='.$Cuenta_inicio.'&criterio="><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&Cuenta_inicio='.$Cuenta_inicio.'&criterio=">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&Cuenta_inicio='.$Cuenta_inicio.'&criterio="><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='1')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=1">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=1"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=1">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=1"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='2')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=2">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=2"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=2">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=2"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='3')    
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=3">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=3"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=3">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=3"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='4')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=4">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=4"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=4">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=4"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='5')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=5">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=5"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=5">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=5"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='6')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=6">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=6"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=6">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=6"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='7')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=7">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=7"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=7">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=7"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='8')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=8">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=8"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=8">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=8"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }

        if ($criterio=='9')
		{
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_ASC&criterio=9">Cuenta<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Cuenta_DESC&criterio=9"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
          echo '<td vAlign=top><SPAN>CC</SPAN></td>';
		  echo '<td vAlign=top><SPAN>T</SPAN></td>';
	      echo '<td vAlign=top><SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_ASC&criterio=9">Descripción<img src="usuarioslist_archivos/sortup.gif" width="10" height="9" border="0"></A></SPAN>';
          echo '<SPAN><A href="rep_analitico_cwconcuelist2.php?order=Descrip_DESC&criterio=9"><img src="usuarioslist_archivos/sortdown.gif" width="10" height="9" border="0"></A></SPAN></td>';
        }



        echo '<td vAlign=top><SPAN>Cuenta alterna</SPAN></td>';
		echo '<td vAlign=top><SPAN>Descripción cuenta alterna</SPAN></td>';
        echo '<td vAlign=top><SPAN>Tipo Fiscal</SPAN></td>';
		echo '<td vAlign=top><SPAN>Tipo costo</SPAN></td>';

		echo "<TD>&nbsp;</TD>";
	  echo "</tr> \n"; 
	
	//echo "HOLA AQUIIIIIII";
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
	  
        $res_bucle = mysql_query("SELECT Nomniv1, Nomniv2, Nomniv3, Nomniv4, Nomniv5, Nomniv6, Nomniv7, Nomniv8, Nomniv9 FROM cwconfig", $conectar); 
        $row_bucle = mysql_fetch_row($res_bucle);  
        
	    $Nivel_bucle = $row["Nivel"];
		switch($Nivel_bucle)
        {
          case 1:
		    $Var_Niv = "$row_bucle[0]";		  
		  break;
          case 2:
		    $Var_Niv = "$row_bucle[1]";		  
		  break;
          case 3:
		    $Var_Niv = "$row_bucle[2]";		  
		  break;
          case 4:
		    $Var_Niv = "$row_bucle[3]";		  
		  break;
          case 5:
		    $Var_Niv = "$row_bucle[4]";		  
		  break;
          case 6:
		    $Var_Niv = "$row_bucle[5]";		  
		  break;
          case 7:
		    $Var_Niv = "$row_bucle[6]";		  
		  break;	
          case 8:
		    $Var_Niv = "$row_bucle[7]";		  
		  break;
          case 9:
		    $Var_Niv = "$row_bucle[8]";		  
		  break;		  		  		
		}  
	      		
	    $Ficaltipo = $row["Fiscaltipo"];
		switch($Ficaltipo)
        {
          case 0:
		    $Var_Ficaltipo = "NINGUNO";		  
		  break;
          case 1:
		    $Var_Ficaltipo = "FIJO";		  
		  break;
          case 2:
		    $Var_Ficaltipo = "VARIABLE";		  
		  break;
		}  		  		  		
		
	    $Tipocosto = $row["Tipocosto"];
		switch($Tipocosto)
        {
          case 0:
		    $Var_Tipocosto = "ACTIVO";		  
		  break;
          case 1:
		    $Var_Tipocosto = "PASIVO";		  
		  break;
          case 2:
		    $Var_Tipocosto = "RESULTADO";		  
		  break;
		}  	
	  
	    $Ccostos = $row["Ccostos"];
		switch($Ccostos)
        {
          case 0:
		    $Var_Ccostos = "NO";		  
		  break;
          case 1:
		    $Var_Ccostos = "SI";		  
		  break;
		}	  
	
	    $Terceros = $row["Terceros"];
		switch($Terceros)
        {
          case 0:
		    $Var_Terceros = "NO";		  
		  break;
          case 1:
		    $Var_Terceros = "SI";		  
		  break;
		}	  
	  
        echo "<tr class=ewTableAltRow onmouseover=ew_mouseover(this); onclick=ew_click(this); onmouseout=ew_mouseout(this);><td>".$Var_Niv."</td><td>".$row["Cuenta"]."</td><td>".$Var_Ccostos."</td><td>".$Var_Terceros."</td><td>".$row["Descrip"]."</td><td>".$row["Cuentalt"]."</td><td>".$row["Descripalt"]."</td><td>".$Var_Ficaltipo."</td><td>".$Var_Tipocosto."</td>"; 

        $Tipo_valida   = $row["Tipo"]; 

        if ($Tipo_valida=='P')
        {    
          echo '<TD noWrap width="1%"><A href="rep_analitico_pre.php?Cuenta_fin='.$row["Cuenta"].'&Cuenta_inicio='.$Cuenta_inicio.'">';
		    echo '<IMG height=15 alt="Selección de cuenta" src="usuarioslist_archivos/Historico.gif" width=15 border=0></A> </TD>';
        } else
		{
          echo '<TD noWrap width="1%">';
		    echo '<IMG height=15 alt="No es de posteo" src="usuarioslist_archivos/tieneasiento.gif" width=15 border=0></A> </TD>';
		}


        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún registro !";
  } 

if (($order == '')&&($unico<>'SI')&&($psearch==''))
{
  echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&pag=');
} else
{  
  if ($criterio=='')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&pag=');
    } 
  }
  
  if ($criterio=='0')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=0&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=0&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=0&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=0&pag=');
    } 
  }  
  
  if ($criterio=='1')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=1&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=1&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=1&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=1&pag=');
    } 
  }

  if ($criterio=='2')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=2&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=2&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=2&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=2&pag=');
    } 
  }

  if ($criterio=='3')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=3&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=3&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=3&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=3&pag=');
    } 
  }

  if ($criterio=='4')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=4&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=4&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=4&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=4&pag=');
    } 
  }  
  
  if ($criterio=='5')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=5&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=5&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=5&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=5&pag=');
    } 
  }  
  
  if ($criterio=='6')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=6&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=6&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=6&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=6&pag=');
    } 
  }  
  
  if ($criterio=='7')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=7&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=7&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=7&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=7&pag=');
    } 
  }  
  
  if ($criterio=='8')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=8&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=8&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=8&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=8&pag=');
    } 
  }  
  
  if ($criterio=='9')
  {
    if ($order == 'Cuenta_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_ASC&criterio=9&pag=');
    } else  if ($order == 'Cuenta_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Cuenta_DESC&criterio=9&pag=');
    } else  if ($order == 'Descrip_ASC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_ASC&criterio=9&pag=');
    } else  if ($order == 'Descrip_DESC')
    {
      echo paginar($pag, $num_tot, $tampag, 'rep_analitico_cwconcuelist2.php?Cuenta_inicio='.$Cuenta_inicio.'&order=Descrip_DESC&criterio=9&pag=');
    } 
  }  
  
  
}


?> 
 
</body> 
</html>