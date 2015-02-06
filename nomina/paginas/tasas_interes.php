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

function enviar(op,ano,mes){
	
	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_tasas_interes.php";
		document.frmPrincipal.submit();	
	}
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		
		document.frmPrincipal.ano.value=ano;		
		document.frmPrincipal.mes.value=mes;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_tasas_interes.php";
		document.frmPrincipal.submit();		
	}
	if (op==3){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea eliminar el registro ?"))
		{					
			document.frmPrincipal.ano.value=ano;		
			document.frmPrincipal.mes.value=mes;		
			document.frmPrincipal.op.value=op;			
  			document.frmPrincipal.submit();
		}		
	}
}
</script>
<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 

//$criterio=$_POST['optOpcion'];
//$cadena=$_POST['textfield'];

$ano=$_POST['ano'];	
$mes=$_POST['mes'];	
$op=$_POST['op'];

if ($op==3) {//Se presiono el boton de Eliminar			
	$query="delete from nomtasas_interes where anio=$ano and mes=$mes";			
	$result=sql_ejecutar($query);
	activar_pagina("tasas_interes.php");		 
	}     
/*elseif ($cadena <> ""){ // Condicion para filtrado
	  
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from nomcategorias";
		$strsql=filtrado($criterio,$cadena,$strsql,"codorg","descrip");		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
	
		$strsql="select * from nomcategorias";
		$strsql=filtrado($criterio,$cadena,$strsql,"codorg","descrip");		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);	
     }
	 */
else{// No se filtra y se muestran todos los datos

	$strsql= "select COUNT(*) from nomtasas_interes";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select * from nomtasas_interes order by anio DESC,mes LIMIT $TAMANO_PAGINA OFFSET $limit";
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
			 Tasas de Interes </font></strong></td>
            <td width="2%"><?php btn('back','submenu_bancos.php') ?></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('add','ag_tasas_interes.php') ?>				        
		            </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="14%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head">
	  <font size="2" face="Arial, Helvetica, sans-serif">   </font>A&ntilde;o</div>	  </td>
		
        <td width="32%" class="phpmakerlist"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Mes</font></div></td>
        <td width="49%" class="phpmakerlist"><div align="left">Tasa</div></td>
      <td width="2%" class="phpmakerlist">&nbsp;</td>
      <td width="3%" class="phpmakerlist">&nbsp;</td>
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
		  echo $fila[anio]; 	// codigo de la categoria
		  ?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
			if ($fila[mes]==1)
			{echo "Enero";}
			else if ($fila[mes]==2)
			{echo "Febrero";}
			else if ($fila[mes]==3)
			{echo "Marzo";}
			else if ($fila[mes]==4)
			{echo "Abril";}
			else if ($fila[mes]==5)
			{echo "Mayo";}
			else if ($fila[mes]==6)
			{echo "Junio";}
			else if ($fila[mes]==7)
			{echo "Julio";}			
			else if ($fila[mes]==8)			
			{echo "Agosto";}
			else if ($fila[mes]==9)
			{echo "Septiembre";}
			else if ($fila[mes]==10)
			{echo "Octubre";}
			else if ($fila[mes]==11)
			{echo "Noviembre";}
			else if ($fila[mes]==12)
			{echo "Diciembre";}
	  	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  		echo $fila[tasa];  	// salario de la categoria
	  	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[anio]); ?>,<?php echo($fila[mes]); ?>);"><img src="img_sis/ico_edit.gif" alt="Modificar el Registro Actual" width="16" height="16" border="0" align="absmiddle"></a>
        <label></label>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[anio]); ?>,<?php echo($fila[mes]); ?>);"><img src="../imagenes/delete.gif" alt="Eliminar el Registro Actual" width="16" height="16" border="0" align="absmiddle" ></a></font></div></td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
    <input name="ano" type="hidden" value="">
	<input name="mes" type="hidden" value="">
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
          <td><a href="tasas_interes.php?pagina=1"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="tasas_interes.php?pagina=<?php echo $pagina-1; ?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="tasas_interes.php?pagina=<?php echo $pagina+1; ?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="tasas_interes.php?pagina=<?php  echo $LastStart; ?>"><img src="images/last.gif" alt="Ultima" width="16" height="16" border="0"></a></td>
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

