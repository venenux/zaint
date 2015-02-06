<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>
<style type="text/css">
<!--
.Estilo2 {font-size: small}
.Estilo5 {font-size: medium}
-->
</style>

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
<?
titulo_mejorada("Hist&oacute;ricos",'',"cwconcuelist2.php?pagina=$pagina","Imagenes/Historicojpg");
?>
<table class=tb-head width="100%">
	<TR> <TD >Cuenta: </TD>
          <TD  align="left"><input name="Cuenta" type="text" id="Cuenta" value="<?php echo $Cuenta ?>"></TD>
	</TR>
</table>


<TABLE class=ewBasicSearch width="100%">
  
  <TBODY></TBODY></TABLE>
<TABLE width="100%">
  <TBODY>
  <TR>
    <TD  >&nbsp;      </TD>
  </TR></TBODY></TABLE>  

<?php 
  
 
  include("config_bd.php"); // archivo que llama a la base de datos 
  
  $result = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta'", $conectar); //HISTORICOS DE LA CUENTA
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE  id=ewlistmain width="100%">';
      echo "<table border = '0' width='100%'> \n"; 
      
	
	  $i=0; 
      while ($row = @mysql_fetch_array($result)) 
      {  	
	if($row["Desmes"]=='ENERO'){
		echo "<tr class='tb-head'>";
		 echo '<td align=left><SPAN>Mes</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td vAlign=top><SPAN>Año</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td align=left><SPAN>Saldo Anterior</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td align=left><SPAN>Débito</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td align=left><SPAN>Créditos</SPAN></td>';
		echo "<TD>&nbsp;</TD>";
		echo '<td align=left><SPAN>Saldo Actual</SPAN></td></tr>';
		
	}


		$i++;
	if($i%2==0){
		?>
		<tr class="tb-fila" >
		<?
	}else{
		echo "<tr >";
	}
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
			
		
	
        echo "<td>".$row["Desmes"]."</td><td></td><td>".$row["Anio"]."</td><td></td><td>".$Salantu_float_format."</td><td></td><td>".$Debito_float_format."</td><td></td><td>".$Credito_float_format."</td><td></td><td>".$Salactu_float_format."</td>"; 

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