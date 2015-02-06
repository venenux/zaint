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
  <?php 
include("../lib/common.php") ;
include ("../header.php");
include ("func_bd.php") ;
?>
<script>

function enviar(id){
	
	document.frmPrincipal.nivel.value=id;
	document.frmPrincipal.action="subniveles.php";
	document.frmPrincipal.submit();		

}
</script>

<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 



//$opcion=$_POST['opcion'];

//$opcion=$_POST['optOpcion'];
//$criterio=$_POST['optOpcion'];
//$cadena=$_POST['textfield'];

//$registro_id=$_POST['registro_id'];	
//$descripcion=$_POST['op'];


$strsql= "select * from nomempresa";
$result =sql_ejecutar($strsql);		
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

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
	
	for ( $i = 1 ; $i <= 7 ; $i ++) {
	 
    /// ciclo for para los nieveles
	if ($fila["nivel$i"]){
	$num_total_registros++;
  	 ?> 
      <td height="20" bgcolor="#DFDFDF" class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php   echo $fila["nomniv$i"]; 	?>
      </font></div></td>
      <td bgcolor="#DFDFDF" class="ewTableRow"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo $i; ?>);"><img src= 
	  "img_sis/ico_add.gif" title="Agregar Datos" width="16" height
	  ="16" border="0" align="absmiddle" ></a>
      <label></label>
      </font></div></td>
    </tr>
	<?php
	$num_fila++;
  	$in++;
	}
	}
	?>

	
    <input name="nivel" type="hidden" value="">
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
          <td><a href="niveles_funcionales.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" title="Primera" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--previous page button-->
          <?php if ($PrevStart == $inicio) { ?>
          <td><img src="images/prevdisab.gif" title="Anterior" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="niveles_funcionales.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php $criterio;?>"><img src="images/prev.gif" title="Anterior" width="16" height="16" border="0"></a></td>
          <?php } ?>
          <!--current page number-->
          <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
          <!--next page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/nextdisab.gif" title="Siguiente" width="16" height="16" border="0"></td>
          <?php } else { ?>
          <td><a href="niveles_funcionales.php?pagina=<?php echo $pagina+1; ?>&criterio=<?php $criterio;?>"><img src="images/next.gif" title="Siguiente" width="16" height="16" border="0"></a></td>
          <?php  } ?>
          <!--last page button-->
          <?php if ($NextStart == $inicio) { ?>
          <td><img src="images/lastdisab.gif" title="Ultima" width="16" height="16" border="0"></td>
          <?php } else {?>
          <td><a href="niveles_funcionales.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php $criterio;?>
		  "><img src="images/last.gif" title="Ultima" width="16" height="16" border="0"></a></td>
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

