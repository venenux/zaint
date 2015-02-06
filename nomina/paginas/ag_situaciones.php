<?php 
session_start();
ob_start();
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");	
?>

<script>

function Enviar(){					
		
	if (document.frmPrincipal.registro_id.value==0){ 

		document.frmPrincipal.op_tp.value=1}
	else{ 	

		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtdescripcion.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripción valida. Verifique...");}				
}

</script>
<?php
$campo_clave='codigo';
$documento_list='situaciones.php';
$documento_edit='ag_situaciones.php';
$nombre_modulo='Situacion';
?>


<?php 
	
	
		
	if (isset($HTTP_GET_VARS[nombre_tabla]))
	{$nombre_tabla=$HTTP_GET_VARS[nombre_tabla];}
	else{$nombre_tabla=$_POST[nombre_tabla];}
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	
	if ($registro_id==0){ // Si el registro_id es 0 se va a agregar un registro nuevo
				
		if ($op_tp==1){
		$codigo_nuevo=AgregarCodigo("$nombre_tabla","$campo_clave");
		
		$query="insert into $nombre_tabla 
		(codigo,situacion)
		values ($codigo_nuevo,'$_POST[txtdescripcion]')";
		
		$result=sql_ejecutar($query);	
		
		activar_pagina($documento_list);				
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual
		
		$query="select * from $nombre_tabla where $campo_clave=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		$codigo=$row[$campo_clave];	
		$nombre=$row[situacion];
	}	
		
	if ($op_tp==2){					

			if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
			
			$query="UPDATE $nombre_tabla set $campo_clave=$registro_id,
			situacion='$_POST[txtdescripcion]'
			where $campo_clave=$registro_id";	
					
			$result=sql_ejecutar($query);				
			activar_pagina($documento_list);										
		{			
	}
}	

?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <p>
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
  <input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $registro_id; ?>">
  <input name="nombre_tabla" type="hidden" value="<?php echo $nombre_tabla; ?>">
  </p>
  <table width="780" height="125" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
        <?php if ($registro_id==0){echo "Agregar $nombre_modulo";}else{echo "Modificar $nombre_modulo";}?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        
        <tr bgcolor="#FFFFFF">
          <td width="207" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Codigo:</font></td>
          <td width="573" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" disabled="disabled" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:200px" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>" maxlength="60">
          </font></td>
          </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><div align="right">
            <table width="85" border="0">
              <tr>
                <td width="39"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                    <?php btn('cancel','history.back();',2) ?>
                </font></div></td>
                <td width="36"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                    <?php btn('ok','Enviar(); document.frmPrincipal.submit();',2) ?>
                </font></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
      </table>      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>  
  <p>&nbsp;</p>
</form>
</body>
</html>

