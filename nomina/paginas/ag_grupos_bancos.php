<?php 
session_start();
ob_start();
?>
<html>
<head>
<script>

function Enviar(){					
		
	if (document.frmPrincipal.registro_id.value==0){ 

		document.frmPrincipal.op_tp.value=1}
	else{ 	

		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtdescripcion.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripcion valida. Verifique...");}				
}

</script>

<title>Tipo de Nomina</title>

<link href="../Asys_Maker.css" rel="stylesheet" type="text/css">
<link href="../estilos.css" rel="stylesheet" type="text/css">
</head>
</html>
<html>
<head>
</head>

<body onLoad="frmPrincipal.txtdescripcion.focus()">

<?php 
include("../lib/common.php");
	include("func_bd.php");	
	include ("header.php");
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	
	if ($registro_id==0) // Si el registro_id es 0 se va a agregar un registro nuevo
	{			
		
		if ($op_tp==1)
		{
		
		$codigo_nuevo=AgregarCodigo("nomgrupo_bancos","cod_gban");
		
		$query="insert into nomgrupo_bancos 
		(cod_gban,des_ban,suc_ban,direccion,gerente,cuentacob,
		tipocuenta,markar,ee,textoinicial,textofinal)
		values ($codigo_nuevo,'$_POST[txtdescripcion]','$_POST[txtsucursal]',
		'$_POST[txtdireccion]','$_POST[txtgerente]','$_POST[txtcuenta]',
		'$_POST[optTipoCuenta]',0,0,'$_POST[txtTextoInicial]','$_POST[txtTextoFinal]')";
		
		$result=sql_ejecutar($query);	
		activar_pagina("grupos_bancos.php");				
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
	
		$query="select * from nomgrupo_bancos where cod_gban=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		$codigo=$row[cod_gban];	
		$nombre=$row[des_ban];
		$sucursal=$row[suc_ban];
		$direccion=$row[direccion];
		$gerente=$row[gerente];
		$cuenta=$row[cuentacob];
		$texto_inicial=trim($row[textoinicial]);
		$texto_final=trim($row[textofinal]);
		$tipo_cuenta=$row[tipocuenta];		
	
	}	
		
	if ($op_tp==2)
		{					

				if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
				
				$query="UPDATE nomgrupo_bancos set cod_gban=$registro_id,
				des_ban='$_POST[txtdescripcion]',
				suc_ban='$_POST[txtsucursal]',
				direccion='$_POST[txtdireccion]',
				gerente='$_POST[txtgerente]',
				cuentacob='$_POST[txtcuenta]',
				tipocuenta='$_POST[optTipoCuenta]',
				textoinicial='$_POST[txtTextoInicial]',
				textofinal='$_POST[txtTextoFinal]'
				where cod_gban=$registro_id";	
							
				$result=sql_ejecutar($query);				
				activar_pagina("grupos_bancos.php");										
		{			
	}
}	

?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <p>
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
  <input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">
  </p>
  <table width="780" height="125" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
        <?php
		if ($registro_id==0)
		{
		echo "Agregar Grupo de Bancos";
		}
		else
		{
		echo "Modificar Grupo de Bancos";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="207" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Codigo del Grupo:</font></td>
          <td width="573" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" disabled="disabled" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>"   size="100">
          </font></td>
          </tr>
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Sucursal:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtsucursal" type="text" id="txtsucursal" style="width:200px" value="<?php if ($registro_id!=0){ echo $sucursal; }  ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Direcci&oacute;n : </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdireccion" type="text" id="txtdireccion" value="<?php if ($registro_id!=0){ echo $direccion; }  ?>" size="100">
          </font></td>
        </tr>
        
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Gerente: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtgerente" type="text" id="txtgerente" style="width:200px" value="<?php if ($registro_id!=0){ echo $gerente; }  ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Cuenta:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcuenta" type="text" id="txtcuenta" style="width:200px" value="<?php if ($registro_id!=0){ echo $cuenta; }  ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Tipo de Cuenta: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><label>
            <input name="optTipoCuenta" type="radio" value="C"
			<?php if ($tipo_cuenta=='C'){?> checked="checked"<?php }?>>
          Corriente 
          <input name="optTipoCuenta" type="radio" value="A"
		  	<?php if ($tipo_cuenta=='A'){?> checked="checked"<?php }?>>
          Ahorros
           <input name="optTipoCuenta" type="radio" value="O"
		   	<?php if ($tipo_cuenta=='O'){?> checked="checked"<?php }?>>
          Otra</label></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="32" bgcolor="#FFFFFF" class="ewTableAltRow">Texto Inicial Carta: </td>
          <td rowspan="4" bgcolor="#FFFFFF" class="ewTableAltRow"><textarea name="txtTextoInicial" id="txtTextoInicial" style=" height:100px;width:500px"><?php echo $texto_inicial; ?></textarea></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="33" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="36" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="12" bgcolor="#FFFFFF" class="ewTableAltRow">Texto Final Carta: </td>
          <td rowspan="4" bgcolor="#FFFFFF" class="ewTableAltRow"><textarea name="txtTextoFinal" id="txtTextoFinal" style=" height:100px;width:500px"><?php echo $texto_final; ?></textarea>
          </td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="12" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
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

