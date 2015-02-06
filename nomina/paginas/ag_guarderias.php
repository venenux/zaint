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
	
	if ((document.frmPrincipal.txtdescripcion.value==0) || (document.frmPrincipal.txtidentificador.value==0) || (document.frmPrincipal.txtdireccion.value==0) || (document.frmPrincipal.txttelefonos.value==0) || (document.frmPrincipal.txtregistro.value==0) || (document.frmPrincipal.txtmontobase.value==0) || (document.frmPrincipal.txtmontomensual.value==0))
	{
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripción valida. Verifique...")
		return
	}				
}

</script>
<?php
$campo_clave='codorg';
$documento_list='guarderias.php';
$documento_edit='ag_guarderias.php';
$nombre_modulo='Guarderia';
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
		($campo_clave,codsuc,descrip,rif,dir_emp,tel_emp,montinscr,montmen,codinst)
		values ($codigo_nuevo,$_POST[cboNivel1],'$_POST[txtdescripcion]','$_POST[txtidentificador]',
		'$_POST[txtdireccion]','$_POST[txttelefonos]',$_POST[txtmontobase],$_POST[txtmontomensual],$_POST[txtregistro])";
				
		$result=sql_ejecutar($query);	
		
		activar_pagina($documento_list);				
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual
		
		$query="select * from $nombre_tabla where $campo_clave=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		$codigo=$row[$campo_clave];	
		$registro=$row[codinst];
		$nombre=$row[descrip];
		$codigo_sucursal=$row[codsuc];
		$identificador1=$row[rif];
		$direccion=$row[dir_emp];
		$telefonos=$row[tel_emp];
		$monto_inscripcion=$row[montinscr];
		$monto_mensual=$row[montmen];
	}	
		
	if ($op_tp==2){					

			if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
			
			$query="UPDATE $nombre_tabla set $campo_clave=$registro_id,
			descrip='$_POST[txtdescripcion]',
			codsuc=$_POST[cboNivel1],
			rif='$_POST[txtidentificador]',
			dir_emp='$_POST[txtdireccion]',
			tel_emp='$_POST[txttelefonos]',
			montinscr=$_POST[txtmontobase],
			montmen=$_POST[txtmontomensual],
			codinst=$_POST[txtregistro]
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
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Nombre:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:300px" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>" maxlength="60">
          </font></td>
          </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Ubicaci&oacute;n Nivel 1: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboNivel1" id="select7" style="width:230px">
              <?php
			
			$query="select * from nomnivel1";
			$result=sql_ejecutar($query);
			 //ciclo para mostrar los datos
			 
			while ($row = mysql_fetch_array($result)){				
			// Opcion de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$codigo_sucursal){ ?>
              <option value="<?php echo $row[codorg];?>" selected > <?php echo $row[descrip];?> </option>
              <?php 
			}
			else {// opcion de agregar			 
			   ?>
              <option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option>
              <?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Identificador fiscal: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtidentificador" type="text" id="txtidentificador" style="width:200px" value="<?php if ($registro_id!=0){ echo $identificador1; }  ?>" maxlength="60">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Direcci&oacute;n:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdireccion" type="text" id="txtdireccion" style="width:430px" value="<?php if ($registro_id!=0){ echo $direccion; }  ?>" maxlength="60">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Tel&eacute;fonos:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txttelefonos" type="text" id="txttelefonos" style="width:200px" value="<?php if ($registro_id!=0){ echo $telefonos; }  ?>" maxlength="60">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">No. Registro: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtregistro" type="text" id="txtregistro" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $registro; }  ?>" maxlength="10">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Monto de Inscripc&oacute;n (Base): </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtmontobase" type="text" id="txtmontobase" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $monto_inscripcion; }  ?>" maxlength="10">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Monto Mensual (Base ) : </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtmontomensual" type="text" id="txtmontomensual" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $monto_mensual; }  ?>" maxlength="10">
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

