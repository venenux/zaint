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
 include("config_bd.php"); // archivo que llama a la base de datos 
 $pagina=@$_GET['pagina'];
 $RecNo_Ant = $_GET['RecNo'];
//echo $RecNo_Ant."<br>";
 $Numcom  = $_GET['Numcom'];
$feccom  = $_GET['feccom'];
if($_POST['feccom'])
	$feccom=$_POST['feccom'];

 $result_estado_contabilizado = mysql_query("SELECT * FROM cwconhco WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar); //VALIDA SI ESTA CONTABILIZADO
 $Total_estado_contabilizado  = mysql_fetch_array($result_estado_contabilizado);
 $Estado_array_valida         = $Total_estado_contabilizado["Estado"];

 if ($Estado_array_valida<>2)
 {
   if ($Numcom == '') {$Numcom ='0';}
   $Link    = "javascript:window.location='cwcondcoedit.php?Numcom=".$Numcom."&pagina=".$pagina."&accion=agregar'";
 } else if ($Estado_array_valida==2)
 {
   $Link    = "javascript:window.location='regrese.php'";
 }
?> 
<?
if(($Estado_array_valida==1)||($Estado_array_valida==3))
titulo_mejorada("Asientos",'cwcondcoedit.php?Numlim='.$Numlim.'&Numcom='.$Numcom.'&Asiento='.$row["RecNo"].'&pagina='.$pagina.'&accion=agregar&feccom='.$feccom,"cwconhcolist.php?pagina=$pagina","Imagenes/asientosjpg");
else
titulo_mejorada("Asientos",'',"cwconhcolist.php?pagina=$pagina","Imagenes/asientosjpg");
?>
<table class=tb-head width="100%">
	<TR> <TD >N&uacute;mero de comprobante: </TD>
          <TD  align="left"><input name="Comprobante" type="text" id="Comprobante" readonly value="<?php  echo $Numcom; ?> "></TD>
	</TR>
</table>


<TABLE  width="100%">
  <TBODY>
  <TR>
    <TD>&nbsp;      </TD>
  </TR></TBODY></TABLE>  

<?php 
  
  
  $result = mysql_query("SELECT RecNo, Cuenta, Referen, Tiporef, Descrip, Debito, Credito, Numlim FROM cwcondco WHERE Numcom='$Numcom' and Fecha='$feccom' ORDER BY Numlim ASC ", $conectar); //LISTA DE ASIENTOS
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '0' width='100%'> \n"; 
      echo "<tr class='tb-head' >";  

        echo '<td vAlign=top><SPAN>Cuenta</SPAN></td>';
        echo '<td vAlign=top><SPAN>Referencia</SPAN></td>';
		echo '<td vAlign=top><SPAN>T</SPAN></td>';
        echo '<td vAlign=top><SPAN>Decripción Asiento</SPAN></td>';
        echo '<td vAlign=top><SPAN>Débito</SPAN></td>';
        echo '<td vAlign=top><SPAN>Crédito</SPAN></td>';

		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
	  echo "</tr> \n"; 
	
	  $i=0; 
      while ($row = @mysql_fetch_array($result)) 
      {  	
	 
	$i++;
	if($i%2==0){
		?>
		<tr class="tb-fila" >
		<?
	}else{
		echo "<tr >";
	}
        $Cuenta_query  = $row["Cuenta"]; 
        $result_cuenta = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_query'", $conectar);
		$row_cuenta    = mysql_fetch_array($result_cuenta);
		$Cuenta_bucle  = $row_cuenta["Descrip"]; 
		$grupo_asiento= $row_cuenta["Terceros"]; 
		$centro_asiento= $row_cuenta["Ccostos"]; 

        $Numlim  = $row["Numlim"];
		
	    $Debito  = $row["Debito"];
	    $Credito = $row["Credito"];
		

	    $Debito_float  = ((real) $Debito);
	    $Credito_float = ((real) $Credito);
		
		$Debito_float_format  = number_format($Debito_float,2,',','.');
		$Credito_float_format = number_format($Credito_float,2,',','.');
		
		$Debito_float_format  = ((string)$Debito_float_format);
		$Credito_float_format = ((string)$Credito_float_format);
  	if($Cuenta_bucle!='')
	{
		if ($RecNo_Ant==$row['RecNo'])
		{
        	echo "<td  title= \".$Cuenta_bucle.\">".$row["Cuenta"]."</td><td>".$row["Referen"]."</td><td>".$row["Tiporef"]."</td><td>".$row["Descrip"]."</td><td align=\"right\">".$Debito_float_format."</td><td align=\"right\">".$Credito_float_format."</td>"; 
		}
		else
		{
		//echo $Cuenta_bucle;
		
		echo "<td title= \".$Cuenta_bucle.\" >".$row["Cuenta"]."</td><td>".$row["Referen"]."</td><td>".$row["Tiporef"]."</td><td>".$row["Descrip"]."</td><td align=\"right\">".$Debito_float_format."</td><td align=\"right\">".$Credito_float_format."</td>"; 
		}
	}else
	{
		if ($RecNo_Ant==$row['RecNo'])
		{
        	echo "<td  style='background-color:blue;' title= \".Cuenta no Existe en el Catalogo.\">".$row["Cuenta"]."</td><td>".$row["Referen"]."</td><td>".$row["Tiporef"]."</td><td>".$row["Descrip"]."</td><td align=\"right\">".$Debito_float_format."</td><td align=\"right\">".$Credito_float_format."</td>"; 
		}
		else
		{
		//echo $Cuenta_bucle;
		
		echo "<td  style='background-color:blue;' title= \".Cuenta no Existe en el Catalogo.\" >".$row["Cuenta"]."</td><td>".$row["Referen"]."</td><td>".$row["Tiporef"]."</td><td>".$row["Descrip"]."</td><td align=\"right\">".$Debito_float_format."</td><td align=\"right\">".$Credito_float_format."</td>"; 
		}
	}
	$RecNo=$row["RecNo"];		
	if(($Estado_array_valida==1)||($Estado_array_valida==3))
	{ // Iconos
		icono("cwcondcoedit.php?Numlim=$Numlim&Numcom=$Numcom&Asiento=$RecNo&pagina=$pagina&accion=agregar_sub&feccom=$feccom" , 			"Agregar asiento hijo","add.gif");
		icono("cwcondcoedit.php?Numcom=$Numcom&Asiento=$RecNo&pagina=$pagina&accion=modificar&feccom=$feccom" , "Editar","edit.gif");
		icono("javascript:confirmar('Desea Borrar el asiento?','cwcondcoedit_sql.php?Numcom=$Numcom&Asiento=$row[RecNo]&pagina=$pagina&Accion=Borrar&feccom=$feccom')" , "Borrar Asiento","delete.gif");
		if($grupo_asiento==1){
			icono("cwconterlist_asiento.php?Numcom=$Numcom&Asiento=$row[RecNo]&pagina=$pagina&feccom=$feccom" , "Agregar Grupo","Terceros.jpg");
		}else { echo "<TD>&nbsp;</TD>";}
		if($centro_asiento==1){
			icono("cwconccolist_asiento.php?Numcom=$Numcom&Asiento=$row[RecNo]&pagina=$pagina&feccom=$feccom" , "Agregar Centro de Costo","Centros_de_Costos.jpg");
		}else{ echo "<TD>&nbsp;</TD>";}
	}
	else
	{
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
	}
	
        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún asiento para este comprobante !";
  } 

 

 
  $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Debito_total_array  = mysql_fetch_array($result_sum);

  $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Credito_total_array = mysql_fetch_array($result_sum);

  $Debito_total  = $Debito_total_array["suma_Debito"];
  $Credito_total = $Credito_total_array["suma_Credito"]; 

  $Total = $Debito_total - $Credito_total;
  
  $result_lineas = mysql_query("SELECT COUNT(*) FROM cwcondco WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Total_lineas_row = mysql_fetch_row($result_lineas);
    
  $Total_lineas = $Total_lineas_row[0];

  $result_estado_contabilizado = mysql_query("SELECT * FROM cwconhco WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar); //VALIDA SI ESTA CONTABILIZADO
  $Total_estado_contabilizado = mysql_fetch_array($result_estado_contabilizado);
  $Estado_array_valida = $Total_estado_contabilizado["Estado"];
  if (($Estado_array_valida==1) || ($Estado_array_valida==3))
  {
    if ($Total<>0)
    {
      $descuadrado = mysql_query("UPDATE cwconhco SET Estado='3' WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar);	 //DESCUADRADO	 
    } else if ($Total==0)
    {
      $descuadrado = mysql_query("UPDATE cwconhco SET Estado='1' WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar);	 //EN TRANSITO	 
    }
  }
?> 

<form name="form1" method="post" action="">
  <pre style=" font-size : 14px;" class="tb-head" >                              <span><strong>Total D&eacute;bito:</strong> <?php echo number_format($Debito_total, 2, ',', '.')?> <strong>  Total Cr&eacute;dito: </strong><?php echo number_format($Credito_total, 2, ',', '.')?>
<?if($Total!=0){?>
		<p align="center" style="color : #d30004; font-size : 14px;"><strong>Diferencia: </strong><?php if ($Total<0){ echo number_format(($Total * -1), 2, ',', '.');}else{echo number_format($Total, 2, ',', '.');} ?></p>       </span><span>   
<?}?></span></pre>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body> 
</html>

<?php  mysql_close($conectar); ?>
