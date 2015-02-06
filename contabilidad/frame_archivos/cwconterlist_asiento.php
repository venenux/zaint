<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");

$Numcom=$_GET['Numcom'];
$Asiento=$_GET['Asiento'];
$pagina=$_GET['pagina'];
$feccom=$_GET['feccom'];

$accion=$_GET['accion'];
if($accion=="guardar"){
	$Codtipo=$_GET['Codtipo'];
	$grupo=$_GET['grupo'];
	$result = mysql_query("INSERT INTO cwconasigrup VALUES ($Asiento, $grupo, $Codtipo,$Numcom)", $conectar);
}

if($accion=="Borrar"){
	$Codtipo=$_GET['Codtipo'];
	$result = mysql_query("DELETE FROM cwconasigrup WHERE codasi=$Asiento and codaux=$Codtipo and codcomp=$Numcom", $conectar);
}
?>
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
<?
titulo("Auxiliares: Asiento - $Asiento","cwconterlist_asiento_guardar.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$feccom."&Asiento=".$Asiento,"cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$feccom,"12");
?>

<!--
<TABLE class=tb-tit width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD><SPAN style="FLOAT: left"><IMG class=icon height=36 src="Imagenes/Terceros.jpg" 
            width=34>Tipos de auxiliares</SPAN></TD>
          <TD align=right>
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE class=btn_bg style="CURSOR: pointer" 
                  onclick="javascript:window.location='cwconteredit.php?accion=agregar'" 
                  cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                      align=right><IMG 
                        style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                        height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                        width=4></TD>
                      <TD class=btn_bg><IMG height=16 
                        src="usuarioslist_archivos/add.gif" width=16></TD>
                      <TD class=btn_bg 
                      style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                      noWrap>Agregar</TD>
                      <TD 
                      style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                      align=left><IMG 
                        style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                        height=21 alt="" 
                        src="usuarioslist_archivos/bt_right.gif" 
                    width=4></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD align=right><TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='menu_int.php';" 
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
      
      -->
<TABLE class=ewBasicSearch width="100%">
  
  <TBODY></TBODY></TABLE>
<TABLE class=tb-head width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE>
        <TBODY>
        <TR>
		<FORM id=fusuarioslistsrch method="post" name=fusuarioslistsrch action='cwconterlist.php?unico=SI'>
          <TD><INPUT name=psearch></TD>
          <TD>
            <TABLE class=btn_bg style="CURSOR: pointer" 
            onclick=javascript:window.document.fusuarioslistsrch.submit() 
            cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                  width=4></TD>
                <TD class=btn_bg><IMG height=16 
                  src="usuarioslist_archivos/search.gif" width=16></TD>
                <TD class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                noWrap>Buscar</TD>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_right.gif" 
                  width=4></TD></TR></TBODY></TABLE></TD>
          <TD>
            <TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='cwconterlist.php'" 
            cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_left.gif" 
                  width=4></TD>
                <TD class=btn_bg><IMG height=16 
                  src="usuarioslist_archivos/list.gif" width=16></TD>
                <TD class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                noWrap>Mostrar todo</TD>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=21 alt="" src="usuarioslist_archivos/bt_right.gif" 
                  width=4></TD></TR></TBODY></TABLE></TD>
          </FORM> </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>  
  <table><TR><TD  height="10"></TD></TR></table>

<?php 
/******************************************************/
/* Funcion paginar
 * actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
 */
function paginar($actual, $total, $por_pagina, $enlace){
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
  $psearch = $_POST['psearch'];
 
  if (($unico=='SI')&&($psearch == ''))
  {  
    $unico ='NO';
	$order = 'Codtipo_ASC';
  }
  
  include("config_bd.php"); // archivo que llama a la base de datos 

  if (!isset($pag)) $pag = 1; // Por defecto, pagina 1
  
  $result = mysql_query("select Codtipo, Descrip, grupo FROM cwconter as TER ,cwconasigrup as RE WHERE TER.CodTipo=RE.codaux and RE.codasi=$Asiento and RE.codcomp=$Nomcom", $conectar);
  $row = mysql_fetch_row($result);  
  $num_tot = "$row[0]";
  
  list($total) = mysql_fetch_row($result);
  $tampag = 10;
  $reg1 = ($pag-1) * $tampag;
  
  $result = mysql_query("select Codtipo, Descrip, grupo FROM cwconter as TER ,cwconasigrup as RE WHERE TER.CodTipo=RE.codaux and RE.codasi=$Asiento and RE.codcomp=$Numcom", $conectar);

  if (mysql_num_rows($result)){ 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '1' width=100%> \n"; 
      echo "<tr class=ewTableHeader >";  
	    echo '<td vAlign=top><SPAN><A href="cwconterlist.php?order=Codtipo_ASC">Código tipo</A></SPAN>';
        echo '<SPAN><A href="cwconterlist.php?order=Codtipo_DESC"></A></SPAN></td>';
		
	    echo '<td vAlign=top><SPAN><A href="cwconterlist.php?order=Descrip_ASC">Descripción</A></SPAN>';
        echo '<SPAN><A href="cwconterlist.php?order=Descrip_DESC"></A></SPAN></td>';

	    
	    echo '<td vAlign=top><SPAN><A href="cwconterlist.php?order=Grupo_ASC">Grupo</A></SPAN>';
        echo '<SPAN><A href="cwconterlist.php?order=Grupo_DESC"></A></SPAN></td>';
		
		
		echo "<TD>&nbsp;</TD>";
	  echo "</tr> \n"; 
      while ($row = @mysql_fetch_array($result)){  
        echo "<tr class=ewTableAltRow onmouseover=ew_mouseover(this); onclick=ew_click(this); onmouseout=ew_mouseout(this);><td>".$row["Codtipo"]."</td><td>".$row["Descrip"]."</td><td>".$row["grupo"]."</td>"; 
          
          echo '<TD width=16><SPAN class=phpmaker><A href="cwconterlist_asiento.php?Codtipo='.$row["Codtipo"].'&accion=Borrar&Numcom='.$Numcom.'&pagina='.$pagina.'&feccom='.$feccom.'&Asiento='.$Asiento.'">';
		    echo '<IMG height=15 alt=Eliminar src="usuarioslist_archivos/delete.gif" width=15'; 
            echo "border=0></A></SPAN></TD>";
        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún registro !";
  } 


?> 
 
</body> 
</html>