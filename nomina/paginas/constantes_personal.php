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

$modulo="Campos Adicionales (Trabajador)";
$tabla="nomcampos_adicionales";

?>

<?php
include ("../header.php");
include ("../lib/common.php");
include ("func_bd.php") ;

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
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_constantes_personal.php";
		document.frmPrincipal.submit();	
	}
	if (op==2){	 	// Opcion de Modificar	
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="ag_constantes_personal.php";
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
	if (op==4){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea restablecer al valor predefinido de este campo adicional a todo el personal de esta nomina?"))
		{
			document.frmPrincipal.registro_id.value=id;		
			document.frmPrincipal.op.value=op;
			document.frmPrincipal.action="constantes_personal_restablecer.php";
			document.frmPrincipal.submit();		
		}
	}
	if (op==5){		// Opcion de Eliminar
		if (confirm("Esta seguro que desear agregar el este campo adicional al personal de este tipo de nomina que no lo posee?"))
		{
			document.frmPrincipal.registro_id.value=id;		
			document.frmPrincipal.op.value=op;
			document.frmPrincipal.action="constantes_personal_restablecer.php";
			document.frmPrincipal.submit();		
		}
	}
}
</script>

<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 

$tabla_modulo="nomcampos_adicionales";
$campo_clave="id";
$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];
$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==3) //Se presiono el boton de Eliminar
	{	
	
	$query="delete from $tabla_modulo where $campo_clave=$registro_id";			
	$result=sql_ejecutar($query);
	activar_pagina("constantes_personal.php?nivel=$nivel");		 
	}     
elseif ($cadena <> "") 		// Condicion para filtrado
	{   
		
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from $tabla_modulo ";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_clave,"descrip");		
		$result =sql_ejecutar($strsql);			
		$fila = mysql_fetch_array($result);	
		$num_total_registros = $fila[0];	
		/////
		
		$strsql="select * from $tabla_modulo";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_clave,"descrip");		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		
		$result =sql_ejecutar($strsql);			
		 // para paginacion
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
	
     }
else					// No se filtra y se muestran todos los datos
{
	$strsql= "select COUNT(*) from $tabla_modulo";
	$result =sql_ejecutar($strsql);	
	$fila = mysql_fetch_array($result);	
	$num_total_registros = $fila[0];
	
	$strsql= "select * from $tabla_modulo where tipocamposadic=3 order by $campo_clave,descrip LIMIT $TAMANO_PAGINA OFFSET $limit";
	
	$result =sql_ejecutar($strsql);		
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  
<?

//titulo_mejorada($modulo,"21.png","btn('add','ag_constantes_personal.php');|btn('generar','campos_adicionales_generar.php');","submenu_formulacion_conceptos.php");
titulo_mejorada($modulo,"21.png","btn('add','ag_constantes_personal.php');","submenu_formulacion_conceptos.php");
?>

  <table width="100%" border="0" class="tb-head">
    <tr class="">
      <td width="162"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <input name="textfield" type="text" class="boton-text" style="width:150px" size="20"
	 value="<?php if (isset($_POST[textfield])){echo $_POST[textfield];}?>">
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <?php btn('search','frmPrincipal',1) ?>
      </font></td>
      <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"  >
        <?php btn('show_all','constantes_personal.php?cmd=reset') ?>                         
      </font></td>
      <td width="579"><font size="2" face="Arial, Helvetica, sans-serif" class="ewBasicSearch">
        <label> </label>
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
<br>
  <table width="100%" border="0"   id="lst"  cellspacing="0" cellpadding="0">
    <tr  class="tb-head" >
      <td width="14%" height="21" align="right"  ><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif"> <strong>No. de Constante</strong> </font></div></td>
      <td width="30%"  ><font size="2" face="Arial, Helvetica, sans-serif"><strong>Descripci&oacute;n</strong> </font></td>
     <!-- <td width="30%"  ><strong>Etiqueta</strong></td>-->
      <td width="20%"  ><div align="left"><strong>Tipo</strong></div></td>
      <td width="2%"  >&nbsp;</td>
      <td width="2%"  >&nbsp;</td>
	<td width="2%"  >&nbsp;</td>
	<td width="2%"  >&nbsp;</td>
    </tr>
    <?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>

      <?php 
  	//operaciones para paginaciones
  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);
	$i=0;
  	//ciclo para mostrar los datos 
  	while ($fila = mysql_fetch_array($result))
  	{
	$i++;
	if($i%2==0){
		?>
    		<tr class="tb-fila">
		<?
	}else{
		echo"<tr>";
	}
  	?>
      <td height="20"   ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		  echo $fila[$campo_clave]; 	// codigo del sub nivel
		  ?>
      </font></div></td>
      <td   ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		  echo $fila[descrip]; 	// codigo del sub nivel
		  ?>
      </font></td>
     <!-- <td  ><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
// 		  echo $fila[etiqueta]; 	// codigo del sub nivel
		  ?>
      </font></td>-->
      <td  ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
			if ($fila[tipo]=='N'){echo "Numerico";}
			
			if ($fila[tipo]=='F'){echo "Fecha";}
			
			if ($fila[tipo]=='A'){echo "Alfa Numerico";}
			
			if ($fila[tipo]=='T'){echo "Tablas";}?>
			
      </font></div></td>
      <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[$campo_clave]); ?>);"><img src="img_sis/ico_edit.gif" title="Modifica el Registro Actual" width="16"   border="0" align="absmiddle" ></a>
                <label></label>
      </font></div></td>
	<td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(4); ?>,<?php echo($fila[$campo_clave]); ?>);"><img src="img_sis/ico_up.gif" title="Restablece al valor predefinido de este campo adicional a cada persona" width="16"   border="0" align="absmiddle" ></a>
       <label></label>
      </font></div></td>
	<td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(5); ?>,<?php echo($fila[$campo_clave]); ?>);"><img src="img_sis/ico_add.gif" title="Agrega este campo adicional a la persona que no lo tenga en el tipo de nomina actual" width="16"   border="0" align="absmiddle" ></a>
       <label></label>
      </font></div></td>
      <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[$campo_clave]); ?>);"><img src="../imagenes/delete.gif" title="Elimina el Registro Actual" width="16"   border="0" align="absmiddle" ></a></font></div></td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
	<input name="nivel" type="hidden" value="<?php echo $nivel; ?>">
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
              <td><img src="images/firstdisab.gif" alt="Primera" width="16"   border="0"></td>
              <?php } else { ?>
              <td><a href="constantes_personal.php?pagina=1&criterio=<?php $criterio;?>"><img src="images/first.gif" alt="Primera" width="16"   border="0"></a></td>
              <?php } ?>
              <!--previous page button-->
              <?php if ($PrevStart == $inicio) { ?>
              <td><img src="images/prevdisab.gif" alt="Anterior" width="16"   border="0"></td>
              <?php } else { ?>
              <td><a href="constantes_personal.php?pagina=<?php echo $pagina-1; ?>&criterio=<?php echo $criterio;?>"><img src="images/prev.gif" alt="Anterior" width="16"   border="0"></a></td>
              <?php } ?>
              <!--current page number-->
              <td><input type="text" name="pageno" value="<?php echo intval(($inicio-1)/$TAMANO_PAGINA+1); ?>" size="4"></td>
              <!--next page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/nextdisab.gif" alt="Siguiente" width="16"   border="0"></td>
              <?php } else { ?>
              <td><a href="constantes_personal.php?pagina=<?php echo $pagina+1; ?>&criterio=Contenga" ><img src="images/next.gif" alt="Siguiente" width="16"   border="0"></a></td>
              <?php  } ?>
              <!--last page button-->
              <?php if ($NextStart == $inicio) { ?>
              <td><img src="images/lastdisab.gif" alt="Ultima" width="16"   border="0"></td>
              <?php } else {?>
              <td><a href="constantes_personal.php?pagina=<?php  echo $LastStart; ?>&criterio=<?php echo $criterio;?>
		  "><img src="images/last.gif" alt="Ultima" width="16"   border="0"></a></td>
              <?php } ?>
              <td><span >&nbsp;de <?php echo intval(($num_total_registros-1)/$TAMANO_PAGINA+1);?></span></td>
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
  <p align="center">&nbsp;</p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
  <font size="2" face="Arial, Helvetica, sans-serif"> </font>
</form>
<p>&nbsp;</p>
</body>
</html>
