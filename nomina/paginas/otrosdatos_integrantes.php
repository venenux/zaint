<?php 
session_start();
ob_start();
?>


<script language="JavaScript" type="text/javascript">
	function CerrarVentana(){
		javascript:window.close();
	}

	function Enviar(op)
	{
	document.frmPrincipal.opcion.value=op;
	document.frmPrincipal.submit();
	}
	function Enviar2(op,ficha)
	{
	document.frmPrincipal.opcion.value=op;
	document.frmPrincipal.txtficha.value=ficha;
	document.frmPrincipal.submit();
	}

</script>

<?php
include("../lib/common.php");
include("func_bd.php");
include("../header.php");
$opcion=$_POST[opcion];
$fichasss=$_GET['txtficha'];
$registro_id=$_GET['txtficha'];
$fichass=$_POST['txtficha'];
//msgbox($registro_id);

if ($opcion==1)
{
	$txtarray_2=$_POST['txtid'];
	foreach($_POST['txtCampo'] as $key => $value)
	{
		$valor_id=$txtarray_2[$key];			
		$strsql1="update nomcampos_adic_personal set valor = '$value' where ficha='$registro_id' and id=$valor_id and tiponom=$_SESSION[codigo_nomina]";
		$result1=sql_ejecutar($strsql1);
		$strsql1="";
	}
	$consulta="INSERT INTO log_transacciones VALUES ('', 'modificacion de campos adicionales', '".date("Y-m-d H:i:s")."', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '$registro_id', '$_SESSION[nombre]')";
	$result2=sql_ejecutar($consulta);
	
	?>
	<script>
	CerrarVentana();
	</script>
	<?PHP
}
elseif ($opcion==2)
{
	
	$url="DEMONIO_CAMPOS_ADICIONALES";
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	parent.cont.location.href=\"".$url.".php?ficha=".$fichass."\"
	</SCRIPT>";
	
}
?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <p>
    	<input type="hidden" name="txtficha" id="txtficha" value="">
	<input type="hidden" name="opcion" id="opcion" value="">

  </p>
<?
titulo_mejorada("Campos adicionales Ficha Nº".$registro_id,"","btn_mejorada('Generar','Enviar2(2,$fichasss); document.frmPrincipal.submit();','list.gif'); | btn_mejorada('Actualizar Datos','Enviar(1); document.frmPrincipal.submit();','ok.gif');","maestro_personal.php")

//|btn_mejorada('Insertar  Nuevo','otrosdatos_integrantes_agregar.php','add.gif');

?>
<br>

<table width="100%" height="50" border="0"  id="lst">
    
    <tr class="tb-head" >
<!--		<td><INPUT type="checkbox" name="marcar_todos" id="marcar_todos"  ></td>-->
      <td width="25%" height="18"   ><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Descripci&oacute;n</font></strong></div></td>
      <td width="75%"   ><div align="left"> <strong> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2">Valor</font></font></strong></div></td>
    </tr>
    
      <?php 	
	$strsql= "select nomcampos_adic_personal.id,nomcampos_adic_personal.tipo,nomcampos_adicionales.descrip,nomcampos_adic_personal.valor from nomcampos_adic_personal inner join nomcampos_adicionales on nomcampos_adic_personal.id =  nomcampos_adicionales.id where nomcampos_adic_personal.ficha = '$registro_id' and nomcampos_adic_personal.tiponom='".$_SESSION['codigo_nomina']."'";
	
	$result =sql_ejecutar($strsql);		
	$i=0;
  	while ($fila = fetch_array($result))
  	{ 
	if($i%2==0){
  	?><tr>
<?}else{?>
	<tr class="tb-fila">
<?}$i++;?>
	
		<!--<td><INPUT type="checkbox" name="checkopcion[]" id="checkopcion[]"></td>-->
      <td height="24"   ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <?php 
		  echo $fila[descrip].":"; 	// descripcion de la constante
		  ?>
      </font><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2">
<input name="txtid[]" type="hidden" id="" style="width:100px" value="<?php echo $fila[id];?>">
      </font></font></strong></td>
      <td   ><div align="left"   ><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font size="2">
      <label>
		  <input name="txtCampo[]" type="text" id="txt<?php echo $fila[id]; ?>" style="width:200px" value="<?php echo $fila[valor];?>" maxlength="60" <?php if ($fila[tipo]=='N') { ?>  <?php } if ($fila[tipo]=='F') { ?> readonly="true" <?php }?>/>
	  <?php if ($fila[tipo]=='F'){?>
	   <input name="image3" type="image" id="dis_<?php echo $fila[id]; ?>" src="lib/jscalendar/cal.gif" />
	   	 	<script type="text/javascript"> 
		Calendar.setup({inputField:"txt<?php echo $fila[id]; ?>",ifFormat:"%d/%m/%Y",button:"dis_<?php echo $fila[id]; ?>"}); 
		</script>

	   <?php } ?>
      </label>
      </font></font></strong></div></td>
    </tr>
    <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
  	?>
  </table>
  <!--<table width="85" border="0">
    <tr>
      <td width="39"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <?php btn('cancel','CerrarVentana();',2,'Cerrar') ?>
      </font></div></td>
      <td width="36"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <?php btn('ok','Enviar(1); document.frmPrincipal.submit();',2) ?>
      </font></div></td>
    </tr>
  </table>-->
</form>
</body>
</html>
