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
//codigo para pagina;
$TAMANO_PAGINA = 20;
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 1;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA+1;
} 
$limit=$inicio-1;
?>


<script type="text/javascript" src="ewp.js"></script>

<script>

function enviar(op,id){
	
	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_suspenciones.php";
		document.frmPrincipal.submit();	
	}
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_suspenciones.php";
		document.frmPrincipal.submit();		
	}
	if (op==3){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea eliminar el registro ?"))
		{					
			document.frmPrincipal.registro_id.value=id;
			document.frmPrincipal.op.value=op;
  			document.frmPrincipal.submit();
		}		
	}
}
</script>

<?
include ("../header.php");
include("../lib/common.php");
include ("func_bd.php") ;

?>
<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 

$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];

$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==3) {//Se presiono el boton de Eliminar			
	$query="delete from nomsuspenciones where codigo=$registro_id";			
	$result=sql_ejecutar($query);
	activar_pagina("suspenciones.php");		 
	}     
elseif ($cadena <> ""){ // Condicion para filtrado
	  
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from nomsuspenciones";
		$strsql=filtrado($criterio,$cadena,$strsql,"codigo","descrip");		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
	
		$strsql="select * from nomsuspenciones";
		$strsql=filtrado($criterio,$cadena,$strsql,"codigo","descrip");		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);	
     }
else{// No se filtra y se muestran todos los datos

	$strsql= "select COUNT(*) from nomsuspenciones";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select * from nomsuspenciones order by codigo,descrip LIMIT $TAMANO_PAGINA OFFSET $limit";
	$result =sql_ejecutar($strsql);		
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <table width="100%" class="tb-tit">
    <tr>
      <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="96%">
			<strong>
			<font color="#000066">
			 Tipos de Suspenciones y Permisos </font></strong></td>
            <td width="2%"><?php btn('back','submenu_tipos.php') ?></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('add','ag_suspenciones.php') ?>				        
		            </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="100%" border="0">
    <tr class="">
      <td width="162"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <input name="textfield" type="text" class="boton-text" style="width:150px" size="20"
		value="<?php if (isset($_POST[textfield])){echo $_POST[textfield];}?>">
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <?php btn('search','frmPrincipal',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <?php btn('show_all','suspenciones.php?cmd=reset') ?>
      </font></td>
      <td width="579"><font size="2" face="Arial, Helvetica, sans-serif" class="ewBasicSearch">
        <label>        </label>
      </font><font size="2" face="Arial, Helvetica, sans-serif">
<label>
            <input name="optOpcion" type="radio" id="Sea Igual a"  value="Sea Igual a"
			<?php if ($criterio=='Sea Igual a'){?> checked="checked"<?php }?>>
            Frase exacta&nbsp;</label>
          <input name="optOpcion" type="radio"  id="Todas las Palabras" value="Todas las Palabras"
		  <?php if ($criterio=='Todas las Palabras'){?> checked="checked"<?php }?>>
          <label> Todas las palabras&nbsp;&nbsp;
            <input name="optOpcion" type="radio" id="Contenga"  value="Contenga"
			 <?php if ($criterio=='Contenga'){?> checked="checked"<?php }?>>
            Cualquier palabra</label>
      </font></td>
    </tr>
</table>
  <table width="100%" border="0" bordercolor="#0066FF" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr  class="tb-head"> 
    	<td width="23%" height="21" align="right"   > 
			<div align="left">
	  <font size="2" face="Arial, Helvetica, sans-serif"> Tipo  </font></div>	  </td>
		
        <td width="71%"   ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n</font></div></td>
      <td width="3%"   >&nbsp;</td>
      <td width="3%"   >&nbsp;</td>
    </tr>
	<?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>
     
	
      <?php 
  	//operaciones para paginaciones
  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);

  	//ciclo para mostrar los datos 
	$i=0;
  	while ($fila = mysql_fetch_array($result))
  	{ 
	if($i%2==0){
  	?><tr>
<?}else{?>
	<tr class="tb-fila">
<?}$i++;?>

      <td height="20"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">	
          <?php 
		  echo $fila[codigo]; 	
		  ?>
      </font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  		echo $fila[descrip];  	
	  	?>
      </font></div></td>
      <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[codigo]); ?>);"><img src="img_sis/ico_edit.gif" alt="Modificar el Registro Actual" width="16" height="16" border="0" align="absmiddle"></a>
        <label></label>
      </font></div></td>
      <td    ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[codigo]); ?>);"><img src="../imagenes/delete.gif" alt="Eliminar el Registro Actual" width="16" height="16" border="0" align="absmiddle" ></a></font></div></td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
    <input name="registro_id" type="hidden" value="">
    <input name="op" type="hidden" value="">	
</table>
  <table width="100%"  class="tb-head">
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
          <td><span >P&aacute;gina&nbsp;</span></td>
          <!--first page button-->
          <?php if ($inicio == 1) { ?>
          <td><img src="images/firstdisab.gif" alt="Primera" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="suspenciones.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="suspenciones.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="suspenciones.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="suspenciones.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>
		  "><img src="images/last.gif" alt="Ultima" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <td><span class="phpmaker">&nbsp;de <?php echo intval(($num_total_registros-1)/$TAMANO_PAGINA+1);?></span></td>
        </tr>
      </table>      </td>
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

  <p align="center">&nbsp;</p>

  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></a></font></p>
  
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</body>
</html>

