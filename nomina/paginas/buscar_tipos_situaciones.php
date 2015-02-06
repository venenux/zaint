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
?>
<?php
include ("../header.php");
include("../lib/common.php");
include ("func_bd.php") ;

//codigo para pagina;
$TAMANO_PAGINA = 10;
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
$nombre_modulo='Situaciones';
$nombre_tabla='nomsituaciones';
//campos en orden segun listado
$campo_1='codigo';
$campo_2='situacion';
$campo_3='';
$campo_4='';
$campo_5='';
$campo_6='';
$campo_7='';
$campo_8='';
$campo_9='';
$campo_10='';
$documento_list='situaciones.php';
$documento_edit='ag_situaciones.php';
$documento_atras='submenu_tipos.php';
///////////////////////////////

?>
<script>
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
$codigo_con=$_GET['txtcodigo'];
$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==1) //Se presiono el boton de Aceptar
	{		
	//$strsql1="delete from nomconceptos_situaciones where codcon = $codigo_con";
	//$result1=sql_ejecutar($strsql1);			
	//$strsql1="";
	
	foreach($_POST['chkCodigo'] as $key => $value)	{	
		$strsql1="select * from nomconceptos_situaciones where codcon='$codigo_con' and estado='$value'";
		$result1=sql_ejecutar($strsql1);			
		if(mysql_num_rows($result1)==0){	
			$strsql1="insert into nomconceptos_situaciones values ($codigo_con,'$value',0)";			
			$result1=sql_ejecutar($strsql1);			
			$strsql1="";
		}
	}
	?>
	<script>
	window.opener.document.forms[0].submit();
	CerrarVentana();
	</script>
	<?php
}     
if ($cadena <> "") 		// Condicion para filtrado
	{   
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from $nomsituaciones";
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
	
	$strsql= "select * from $nombre_tabla order by $campo_1,$campo_2 LIMIT $TAMANO_PAGINA OFFSET $limit";
	$result =sql_ejecutar($strsql);		
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <table width="95%" class="tb-tit">
    <tr>
      <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="95%">
			<strong>
			<font color="#000066">
			Campos deSeleccionar Tipos de Situaciones </font></strong></td>
            <td width="1%"><?php btn('ok','MarcarTodos();',2,'Marcar o Desmarcar Todos') ?></td>
            <td width="2%"><?php btn('back','enviar(1);',2,'Aceptar') ?></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('cancel','CerrarVentana();',2) ?>
				    </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="95%" border="0" class="ewTableHeader">
    <tr class="">
      <td width="155"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="textfield" type="text" class="boton-text" style="width:150px" size="20"
		value="<?php if (isset($_POST[textfield])){echo $_POST[textfield];}?>">
      </font></td>
      <td width="18"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('search','frmPrincipal',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('show_all',"buscar_tipos_situaciones.php?cmd=reset&txtcodigo=$codigo_con") ?>
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
  <table width="95%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="14%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head">
	  <font size="2" face="Arial, Helvetica, sans-serif"> Codigo  </font></div>	  </td>
		
      <td width="86%" class="phpmakerlist">
	  	<div align="left">
	  		<font size="2" face="Arial, Helvetica, sans-serif">
	  Descripci&oacute;n</font></div>	  </td>
    </tr>
	<?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>
    <tr> 
	
      <?php 
  	//operaciones para paginaciones
  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);

  	//ciclo para mostrar los datos 
  	while ($fila = mysql_fetch_array($result))
  	{ 
  	?>
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"> <div align="left" class="row-even"><font size="2" face="Arial, Helvetica, sans-serif">	
          <label>
		  <?php
		  	
			$query="select * from nomvis_conceptos_situacion where codcon=$codigo_con and situacion='$fila[$campo_2]'";					
			$result1=sql_ejecutar($query);			
			$bActivar=0;
			
			//ciclo para mostrar los datos
			while ($row = mysql_fetch_array($result1))
			{$bActivar=1;}
			
		  ?>
          <input type="checkbox" name="chkCodigo[]" id="chkCodigo[]" value="<?php echo $fila[$campo_2]; ?>"<?php
		  if ($bActivar==1)
		  {
		  ?>
		   checked="checked"
		  <?php
		  }
		  ?>
		  >
          </label>
          <?php 
		  echo $fila[$campo_1]; 	// codigo 
		  ?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
          
          <?php 
	  		echo $fila[$campo_2];  	// descripcion
	  	?>
      </font></div></td>
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
	<input name="txtcodigo" type="hidden" value="<?php echo $codigo_con; ?>">	
</table>
  <table width="95%" height="31" class="tb-footer">
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
              <td><a href="buscar_tipos_situaciones.php?pagina=1&criterio=<?php $criterio;?>&txtcodigo=<?php echo $codigo_con; ?>"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
              <?php } ?>
              <!--previous page button-->
              <?php if ($PrevStart == $inicio) { ?>
              <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
              <?php } else { ?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>&txtcodigo=<?php echo $codigo_con; ?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
              <?php } ?>
              <!--current page number-->
              <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
              <!--next page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
              <?php } else { ?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>&txtcodigo=<?php echo $codigo_con; ?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
              <?php  } ?>
              <!--last page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
              <?php } else {?>
              <td><a href="buscar_tipos_situaciones.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>&txtcodigo=<?php echo $codigo_con; ?>
		  "><img src="images/last.gif" alt="Ultima" width="16" height="16" border="0"></a></td>
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
