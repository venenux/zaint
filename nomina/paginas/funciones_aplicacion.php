<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>

<?php
include ("../header.php");
include ("../lib/common.php");

include ("func_bd.php") ;

//codigo para pagina;
$TAMANO_PAGINA = 100;
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 1;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA+1;
} 
$limit=$inicio-1;

/////////////////////////////
$nombre_modulo='Campos del Personal';
$nombre_tabla='nom_variables_personal';
//campos en orden segun listado
$campo_1='nombre';
$campo_2='descripcion';
$campo_3='parametros';
$campo_4='';
$campo_5='';
$campo_6='';
$campo_7='';
$campo_8='';
$campo_9='';
$campo_10='';
$documento_list='campos_personal.php';
$documento_edit='campos_personal.php';
//$documento_atras='submenu_tipos.php';
///////////////////////////////

?>

<script type="text/javascript">
var rows = document.getElementsByTagName('tr');
for (var i = 0; i < rows.length; i++) {
rows[i].onmouseover = function() {
this.className += ' hilite';
}
rows[i].onmouseout = function() {
this.className = this.className.replace('hilite', '');
}
}
</script>
<script type="text/javascript">
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
</script>

<script>
function Aceptar(variable)
{
	window.opener.document.forms[0].txtformula_aux.value=variable+";";
	window.opener.SumarCampoFormula();
	CerrarVentana();
}

function MarcarTodos()
{
	if (document.frmPrincipal.marcar_todos.value==1)
		{Opcion=true;document.frmPrincipal.marcar_todos.value=0;}
	else
		{Opcion=false;document.frmPrincipal.marcar_todos.value=1;}

	for(i=0; ele=document.frmPrincipal.elements[i]; i++){  		
		if (ele.name=='chkCodigo[]')
			{ele.checked =Opcion;}			
	}	
}

function CerrarVentana(){
	javascript:window.close();
}

function enviar(op){
	
	document.frmPrincipal.op.value=op;
	document.frmPrincipal.submit();
}
</script>

<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 


$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];
$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==1) //Se presiono el boton de Aceptar
{		
	
}     
if ($cadena <> "") 		// Condicion para filtrado
	{   
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from $nombre_tabla";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_1,$campo_2,$campo_3,
		$campo_4,$campo_5,$campo_6,$campo_7,$campo_8,$campo_9,$campo_10);		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
	
		$strsql="select * from $nombre_tabla";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_1,$campo_2,$campo_3,
		$campo_4,$campo_5,$campo_6,$campo_7,$campo_8,$campo_9,$campo_10);		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
		 // para paginacion
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

     }
else					// No se filtra y se muestran todos los datos
{	
	
	$strsql= "select COUNT(*) from $nombre_tabla";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select * from $nombre_tabla  WHERE indicador='F' order by $campo_1,$campo_2";
	$result =sql_ejecutar($strsql);		
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
$conexion=conexion();
$num_paginas=obtener_num_paginas($strsql);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $strsql);

?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <table width="100%" class="tb-tit">
    <tr>
      <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="98%">
			<strong>
			<font color="#000066">
			Funciones de la Aplicaci&oacute;n</font></strong></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('cancel','CerrarVentana();',2,'Salir') ?>
				    </div></td>
                </tr>
            </table>




</td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="100%" border="0" class="ewTableHeader">
    <tr class="">
      <td width="155"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="textfield" type="text" class="boton-text" style="width:150px" size="20"
		value="<?php if (isset($_POST[textfield])){echo $_POST[textfield];}?>">
      </font></td>
      <td width="18"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('search','frmPrincipal',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('show_all',"$documento_list?cmd=reset") ?>
      </font></td>
      <td width="703"><font size="2" face="Arial, Helvetica, sans-serif" class="ewBasicSearch">
        <label>        </label>
      </font><font size="2" face="Arial, Helvetica, sans-serif">
<label>
            <input name="optOpcion" type="radio" id="Sea Igual a"  value="Sea Igual a"
			<?php if ($criterio=='Sea Igual a'){?> checked="checked"<?php }?>>
            Frase exacta&nbsp;</label>
<label>&nbsp;&nbsp;
          <input name="optOpcion" type="radio" id="Contenga"  value="Contenga"
			 <?php if ($criterio=='Contenga'){?> checked="checked"<?php }?>>
        Cualquier palabra</label>
      </font></td>
    </tr>
</table>
  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="20%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head">
	  <font size="2" face="Arial, Helvetica, sans-serif"><font size="2">Variable</font>   </font></div>	  </td>
		
      <td width="50%" class="phpmakerlist"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Descripci&oacute;n</font></div></td>
<td width="30%" class="phpmakerlist"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Parametros</font></div></td>
    </tr>	
     <?php 
  	//operaciones para paginaciones
  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);
	
  	//ciclo para mostrar los datos 
  	while ($fila = mysql_fetch_array($result))
  	{ 
  	?>
		<tr style="cursor:pointer" onMouseOver="ew_mouseover(this);" onMouseOut="ew_mouseout(this);"
		onClick="Aceptar('<?php echo $fila[$campo_3]; ?>')">
      <td> 
      <?php echo $fila[$campo_1]; ?>      </td>
	  
      <td>
	  
        <?php 
	  		echo $fila[$campo_2];  	// descripcion
	  	?>      </td>
 <td>
	  
        <?php 
	  		echo $fila[$campo_3];  	// descripcion
	  	?>      </td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
    <input name="registro_id" type="hidden" value="">
    <input name="op" type="hidden" value="">	
	<input name="marcar_todos" type="hidden" value="1">
</table>

<!--
  <table width="100%" height="31" class="tb-footer">
    <tr>
      <td width="61%"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo1">
        <?php
	if ($num_total_registros > 0) 
	{
	$rsEof = ($num_total_registros < ($inicio + $TAMANO_PAGINA));
	$PrevStart = $inicio - $TAMANO_PAGINA;	
	if ($PrevStart < 1) 
	{ 
	$PrevStart = 1; 
	}
	$NextStart = $inicio + $TAMANO_PAGINA;
	
	if ($NextStart > $num_total_registros) 
	{$NextStart = $inicio ; }	
	$LastStart = intval(($num_total_registros-1)/$TAMANO_PAGINA+1);
	?>
        </span></font>
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><span class="phpmaker">P&aacute;gina&nbsp;</span></td>
              <!--first page button-->
              <?php if ($inicio == 1) { ?>
              <td><img src="images/firstdisab.gif" alt="Primera" width="16" height="16" border="0"></td>
              <?php } else { ?>
              <td><a href="buscar_tipos_situaciones.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
              <?php } ?>
              <!--previous page button-->
              <?php if ($PrevStart == $inicio) { ?>
              <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
              <?php } else { ?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
              <?php } ?>
              <!--current page number-->
              <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
              <!--next page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
              <?php } else { ?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
              <?php  } ?>
              <!--last page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
              <?php } else {?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>"><img src="images/last.gif" alt="Ultima" width="16" height="16" border="0"></a></td>
              <?php } ?>
              <td><span class="phpmaker">&nbsp;de <?php echo intval(($num_total_registros-1)/$TAMANO_PAGINA+1);?></span></td>
            </tr>
        </table></td>
      <td width="39%"><?php if ($inicio > $num_total_registros) { $inicio = $num_total_registros; }
	$nStopRec = $inicio + $TAMANO_PAGINA - 1;
	$nRecCount = $num_total_registros - 1;
	if ($rsEof) { $nRecCount = $num_total_registros; }
	if ($nStopRec > $nRecCount) { $nStopRec = $nRecCount; } ?>
        Registro <?php echo $inicio; ?> a <?php echo $nStopRec; ?> de <?php echo $num_total_registros; ?> </td>
    </tr>
  </table>

  <?php
	  }
	 ?>
</form>
</body>
</html>
