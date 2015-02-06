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
	$codcc=$_GET['Codccos'];
	$result = mysql_query("INSERT INTO cwconasicc VALUES ($codcc, $Numcom, $Asiento)", $conectar);  


}
if($accion=="borrar"){
	$codcc=$_GET['Codccos'];
	$result = mysql_query("DELETE FROM cwconasicc WHERE codcc=$codcc and codcomp= $Numcom and codasi= $Asiento)", $conectar);
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
titulo("Centros de costo: Asiento - ".$Asiento,"cwconccolist_asiento_guardar.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$feccom."&Asiento=".$Asiento,"cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$feccom,"6");
?>


  
<TABLE class=ewBasicSearch width="100%">
  
  <TBODY></TBODY></TABLE>
<TABLE class=tb-head width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE>
        <TBODY>
        <TR>
		<FORM id=fusuarioslistsrch method="post" name=fusuarioslistsrch action='cwconccolist.php?unico=SI'>
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
            onclick="javascript:window.location='cwconccolist.php'" 
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
  $psearch = $_POST['psearch'];
 

  include("config_bd.php"); // archivo que llama a la base de datos 

  if (!isset($pag)) $pag = 1; // Por defecto, pagina 1
  $result = mysql_query("SELECT Codccos, Descrip FROM cwconcco as CC,cwconasicc as RE WHERE CC.Codccos=RE.codcc and RE.codasi=$Asiento and RE.codcomp=$Numcom", $conectar);  
  
  $row = mysql_fetch_row($result);  
  $num_tot = "$row[0]";
  
  list($total) = mysql_fetch_row($result);
  $tampag = 10;
  $reg1 = ($pag-1) * $tampag;

 
  $result = mysql_query("SELECT Codccos, Descrip FROM cwconcco as CC,cwconasicc as RE WHERE CC.Codccos=RE.codcc and RE.codasi=$Asiento and RE.codcomp=$Numcom", $conectar);  
  
  


  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '1' width='100%'> \n"; 
      echo "<tr class=ewTableHeader >";  
	    echo '<td vAlign=top align=center ><SPAN><A href="cwconccolist.php?order=Codccos_ASC">Código centro de costo</A></SPAN>';
        echo '<SPAN><A href="cwconccolist.php?order=Codccos_DESC"></A></SPAN></td>';
	    echo '<td vAlign=top align=center><SPAN><A href="cwconccolist.php?order=Descrip_ASC">Descripción</A></SPAN>';
        echo '<SPAN><A href="cwconccolist.php?order=Descrip_DESC"></A></SPAN></td>';
		
	  echo "</tr> \n"; 
	$i=0; 
      while ($row = @mysql_fetch_array($result)) 
      {  
	$i++;
	if($i%2==0){
		?>
				<tr class="tb-fila">
		<?
	}else{
		echo"<tr>";
	}
        echo "<td>".$row["Codccos"]."</td><td>".$row["Descrip"]."</td>"; 
        echo '<TD width=16><SPAN class=phpmaker><A href="cwconccolist_asiento.php?Codccos='.$row["Codccos"].'&accion=borrar&Numcom='.$Numcom.'&Asiento='.$Asiento.'&pagina='.$pagina.'&feccom='.$feccom.'">';
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

if (($order == '')&&($unico<>'SI')&&($psearch==''))
{
  echo paginar($pag, $num_tot, $tampag, "cwconccolist.php?pag=");
} else
{
  if ($order == 'Codccos_ASC')
  {
    echo paginar($pag, $num_tot, $tampag, 'cwconccolist.php?order=Codccos_ASC&pag=');
  } else  if ($order == 'Codccos_DESC')
  {
    echo paginar($pag, $num_tot, $tampag, 'cwconccolist.php?order=Codccos_DESC&pag=');
  } else  if ($order == 'Descrip_ASC')
  {
    echo paginar($pag, $num_tot, $tampag, 'cwconccolist.php?order=Nomusu_ASC&pag=');
  } else  if ($order == 'Descrip_DESC')
  {
    echo paginar($pag, $num_tot, $tampag, 'cwconccolist.php?order=Nomusu_DESC&pag=');
  }
  
}


?> 
 
</body> 
</html>