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
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_cargos.php";
		document.frmPrincipal.submit();	
	}
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_cargos.php";
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

<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 



//$opcion=$_POST['opcion'];

//$opcion=$_POST['optOpcion'];
//$criterio=$_POST['optOpcion'];
//$cadena=$_POST['textfield'];

$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];


if ($op==3) //Se presiono el boton de Eliminar
	{	
	
	/*$query="delete from selectra.nomcargos where cod_car=$registro_id";	
		
	$result=sql_ejecutar($query);
	activar_pagina("cargos.php");		 
	*/
	}     
elseif ($cadena <> "") 		// Condicion para filtrado
	{   
		// para obtener la cantidad de registros
		/*$strsql="select COUNT(*) from nomcargos";
		$strsql=filtrado($criterio,$cadena,$strsql,"cod_car","des_car");		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
		/////
	
		$strsql="select * from nomcargos";
		$strsql=filtrado($criterio,$cadena,$strsql,"cod_car","des_car");		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
		 // para paginacion
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
		*/
     }
else					// No se filtra y se muestran todos los datos
{
	
	
	/*$strsql= "select COUNT(*) from nomempresa";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	*/
	
	//$num_total_registros=3;
	
	//$strsql= "select * from nomempresa order by cod_car,des_car LIMIT $TAMANO_PAGINA OFFSET $limit";
	$strsql= "select * from nomempresa";
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
			Niveles Funcionales </font></strong></td>
            <td width="2%"><?php btn('back','menu_configuracion.php') ?></td>
          </tr>
      </table></td>
    </tr>
</table>
  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    
	
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
   	  <td width="97%" height="21" class="phpmakerlist">
	  	<div align="left">
	  		<font size="2" face="Arial, Helvetica, sans-serif">
	  Descripci&oacute;n del 	  			  </font>Nivel</div>	  </td>
	  
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
	
  	$fila = mysql_fetch_array($result);
	 
    /// nievel # 1
	if ($fila[nivel1]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv1]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	$num_fila++;
  	$in++;
	}
	?>
	<?php
	/// nievel # 2
	if ($fila[nivel2]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv2]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	
	$num_fila++;
  	$in++;  
  	?>
	
	<?php
	/// nievel # 3
	if ($fila[nivel3]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv3]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	
	$num_fila++;
  	$in++;  
  	?>
	
	<?php
	/// nievel # 4
	if ($fila[nivel4]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv4]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	
	$num_fila++;
  	$in++;  
  	?>
	
	<?php
	/// nievel # 5
	if ($fila[nivel5]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv5]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	$num_fila++;	
  	$in++;  
  	?>
	
	<?php
	/// nievel # 6
	if ($fila[nivel6]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv6]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	
	$num_fila++;
  	$in++;  
  	?>
	
		<?php
	/// nievel # 7
	if ($fila[nivel7]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila[nomniv7]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src= 
	  "img_sis/ico_edit.gif" width="16" align="absmiddle" onClick="enviar(<?php echo(2); ?>,<?php echo($fila[cod_car]); ?>);" height
	  ="16">
      <label></label>
      </font></div></td>
      </tr>
	<?php
	}
	
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
          <td><a href="cargos.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" alt="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" alt="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="cargos.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" alt="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" alt="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="cargos.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" alt="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" alt="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="cargos.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>
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

