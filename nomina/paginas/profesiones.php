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
include("../lib/common.php");

include ("func_bd.php") ;
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


<script>

function enviar(op,id){

	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		document.frmAgregar.op.value=op;
		document.frmAgregar.action="ag_profesiones.php";
		document.frmAgregar.submit();	
	}
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		document.frmProfesiones.registro_id.value=id;		
		document.frmProfesiones.op.value=op;
		document.frmProfesiones.action="ag_profesiones.php";
		document.frmProfesiones.submit();		
	}
	if (op==3){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea eliminar el registro ?"))
		{					
			document.frmProfesiones.registro_id.value=id;
			document.frmProfesiones.op.value=op;
  			document.frmProfesiones.submit();
		}		
	}
}
</script>
<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 



//$opcion=$_POST['opcion'];

//$opcion=$_POST['optOpcion'];
$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];

$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];


if ($op==3) //Se presiono el boton de Eliminar
	{	
	
	$query="delete from nomprofesiones where codorg=$registro_id";	
		
	$result=sql_ejecutar($query);
	activar_pagina("profesiones.php");		 
	}     
elseif ($cadena <> "") 		// Condicion para filtrado
	{   
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from nomprofesiones";
		$strsql=filtrado($criterio,$cadena,$strsql,"codorg","descrip");		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
		/////
	
		$strsql="select * from nomprofesiones";
		$strsql=filtrado($criterio,$cadena,$strsql,"codorg","descrip");		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
		 // para paginacion
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
	
     }
else					// No se filtra y se muestran todos los datos
{
	
	
	$strsql= "select COUNT(*) from nomprofesiones";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	
	$strsql= "select * from nomprofesiones order by codorg,descrip LIMIT $TAMANO_PAGINA  OFFSET $limit";
	$result =sql_ejecutar($strsql);		
	
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
		
}
?>
</font></p>
<form action="" method="post" name="frmProfesiones" id="frmProfesiones">
  <table width="100%" class="tb-tit">
    <tr>
      <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="96%">
			<strong>
			<font color="#000066">
			Profesiones u Ocupaciones </font></strong></td>
            <td width="2%"><?php btn('back','menu_configuracion.php') ?></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('add','ag_profesiones.php') ?>				        
		            </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="100%" border="0" class="ewTableHeader">
    <tr class="">
      <td width="162"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="textfield" type="text" class="boton-text" style="width:150px" size="20"
		value="<?php if (isset($_POST[textfield])){echo $_POST[textfield];}?>">
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('search','frmProfesiones',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('show_all','profesiones.php?cmd=reset') ?>
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
			  <?php 
			if ($criterio=='Contenga'){
				 echo 'checked="checked"';
			 } else {
				if (($criterio!='Sea Igual a') && ($criterio!='Todas las Palabras')){ 			echo 'checked="checked"';
				}
			}?>>
            Cualquier palabra</label>
      </font></td>
    </tr>
</table>
  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="20%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head">
	  <font size="2" face="Arial, Helvetica, sans-serif"> C&oacute;digo  </font></div>	  </td>
		
      <td width="72%" class="phpmakerlist">
	  	<div align="left">
	  		<font size="2" face="Arial, Helvetica, sans-serif">
	  Descripci&oacute;n de la profesi&oacute;n	  			  </font></div>	  </td>
	  
      <td width="4%" class="phpmakerlist">&nbsp;</td>
      <td width="4%" class="phpmakerlist">&nbsp;</td>
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
          <?php 
		  echo $fila[codorg]; 	// codigo de la profesion
		  ?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
          
          <?php 
	  		echo $fila[descrip];  	// descripcion de la profesion
	  	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[codorg]); ?>);"><img src="img_sis/ico_edit.gif" width="16" height="16" border="0" align="absmiddle" ></a>
        <label></label>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[codorg]); ?>);"><img src="../imagenes/delete.gif" width="16" height="16" border="0" align="absmiddle" ></a></font></div></td>
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
          <td><a href="profesiones.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="profesiones.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="profesiones.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="profesiones.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>
		  "><img src="images/last.gif" alt="Ultima" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <td><span class="phpmaker">&nbsp;de <?php echo intval(($num_total_registros-1)/$TAMANO_PAGINA+1);?></span></td>
        </tr>
      </table>
      </td>
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
  
  <font size="2" face="Arial, Helvetica, sans-serif">
  
  </font>
</form>
<p>&nbsp;</p>
</body>
</html>
