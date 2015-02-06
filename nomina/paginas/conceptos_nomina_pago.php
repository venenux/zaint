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


/////////////////////////////
$nombre_modulo='Conceptos de Nomina de Pago';
$nombre_tabla='nomconceptos';
//campos en orden segun listado
$campo_1='codcon';
$campo_2='descrip';
$campo_3='';
$campo_4='';
$campo_5='';
$campo_6='';
$campo_7='';
$campo_8='';
$campo_9='';
$campo_10='';
$documento_list='conceptos_nomina_pago.php';
$documento_edit='ag_conceptos_nomina_pago.php';
$documento_atras='submenu_formulacion_conceptos.php';
///////////////////////////////
?>

<script>

function copiar_concepto(codigo)
{
	
	AbrirVentana('copiar_concepto.php?codcon='+codigo,200,400,0);
}

function enviar(op,id){
	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="<?php echo $documento_edit; ?>";
		document.frmPrincipal.submit();	
	}
	
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="<?php echo $documento_edit; ?>";
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
	
	if (op==4){		// Opcion de copiar
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.submit();
	}	
	
}
</script>

<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 
include ("../header.php");
include ("../lib/common.php");
include ("func_bd.php") ;

$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];

$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==4)
{
	$codigo_nuevo=AgregarCodigo("$nombre_tabla","$campo_1");
	$query="CALL sp_copiar_concepto ($registro_id,$codigo_nuevo)";	
	$result=sql_ejecutar($query);
	activar_pagina($documento_list);	
}
if ($op==3) {
	
	//borra los registros relacionados con este concepto
$query="select * from nom_movimientos_nomina where codcon='".$registro_id."'";
$result=sql_ejecutar($query);

if(mysql_num_rows($result)<=0){

	$query="delete from nomconceptos where codcon='".$registro_id."'";//"CALL sp_eliminar_concepto ($registro_id)";	
	$result=sql_ejecutar($query);
$query="delete from nomconceptos_tiponomina where codcon='".$registro_id."'";//"CALL sp_eliminar_concepto ($registro_id)";	
	$result=sql_ejecutar($query);
$query="delete from nomconceptos_situaciones where codcon='".$registro_id."'";//"CALL sp_eliminar_concepto ($registro_id)";	
	$result=sql_ejecutar($query);		
$query="delete from nomconceptos_frecuencias where codcon='".$registro_id."'";//"CALL sp_eliminar_concepto ($registro_id)";	
	$result=sql_ejecutar($query);		
$query="delete from nomconceptos_acumulados where codcon='".$registro_id."'";//"CALL sp_eliminar_concepto ($registro_id)";	
	$result=sql_ejecutar($query);				
	activar_pagina($documento_list);		 

}else{

mensaje("Este concepto se encuentra sociado a una nomina por lo cual no lo puede borrar");
$strsql= "select COUNT(*) from $nombre_tabla";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select codcon,descrip,tipcon from $nombre_tabla order by tipcon,$campo_1,$campo_2 LIMIT $TAMANO_PAGINA OFFSET $limit";
	$result =sql_ejecutar($strsql);		
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
}     
elseif ($cadena <> "") 	{	// Condicion para filtrado	   
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
		
		$strsql= "$strsql order by tipcon LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
		 // para paginacion
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
     }
else	{				// No se filtra y se muestran todos los datos
	$strsql= "select COUNT(*) from $nombre_tabla";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select codcon,descrip,tipcon from $nombre_tabla order by tipcon,$campo_1,$campo_2 LIMIT $TAMANO_PAGINA OFFSET $limit";
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
			 &nbsp;<?php echo $nombre_modulo ?></font></strong></td>
            <td width="2%"><?php btn('back',"$documento_atras") ?></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('add',"enviar(1,0);",2) ?>				        
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
        <?php btn('search','frmPrincipal',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?php btn('show_all',"$documento_list?cmd=reset") ?>
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
  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="9%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head">
	  <font size="2" face="Arial, Helvetica, sans-serif"> C&oacute;digo  </font></div>	  </td>
		
        <td width="59%" class="phpmakerlist"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n</font></div></td>
        <td width="23%" class="phpmakerlist"><div align="left">Tipo</div></td>
      <td width="3%" class="phpmakerlist">&nbsp;</td>
      <td width="3%" class="phpmakerlist">&nbsp;</td>
      <td width="3%" class="phpmakerlist">&nbsp;</td>
    </tr>
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
		  echo $fila[$campo_1]; 	// codigo 
		  ?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  		echo $fila[$campo_2];  	// descripcion
	  	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  		//echo $fila[tipcon];  	// descripcion
			if ($fila[tipcon]=='A') 
			{
			echo "Asignación";
			}
			else if ($fila[tipcon]=='P') 			
			{
			echo "Patronal";
			}
			else if ($fila[tipcon]=='D') 			
			{
			echo "Deducción";
			}
			
			
	  	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
	  <a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[$campo_1]); ?>);"><img src="img_sis/ico_edit.gif" title="Modifica el Registro Actual" width="16" height="16" border="0" align="absmiddle"></a>
        <label></label>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> <a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[$campo_1]); ?>);"><img src="../imagenes/delete.gif" title="Elimina el Registro Actual" width="16" height="16" border="0" align="absmiddle" ></a></font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:copiar_concepto(<? echo $fila[$campo_1];?>)"><img src="../imagenes/list.gif" title="Copiar este Concepto en uno nuevo" width="16" height="16" border="0" align="absmiddle" ></a></font></td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
//enviar(<?php echo(4);?php echo($fila[$campo_1]); );
	$num_fila++;
  	$in++;  
  	?>
    <input name="registro_id" type="hidden" value="">
	<input name="nombre_tabla" type="hidden" value="<?php echo $nombre_tabla; ?>">
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
          <td><img src="images/firstdisab.gif" title="Primera" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="<?php echo $documento_list; ?>?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" title="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" title="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="<?php echo $documento_list; ?>?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" title="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" title="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="<?php echo $documento_list; ?>?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" title="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" title="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="<?php echo $documento_list; ?>?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>
		  "><img src="images/last.gif" title="Ultima" width="16" height="16" border="0"></a></td>
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
<input type="hidden" name="pagina" value="<?echo $pagina?>">
</form>
<p>&nbsp;</p>
</body>
</html>
