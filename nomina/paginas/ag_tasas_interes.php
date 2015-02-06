<?php 
session_start();
ob_start();
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");	

?>

<script>

function Enviar(){					
			
	if (document.frmPrincipal.ano.value==0){ 

		document.frmPrincipal.op_tp.value=1}
	else{ 	

		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtano.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar un año valido. Verifique...");}	
	else if (document.frmPrincipal.txttasa.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una tasa de interes valida. Verifique...");}	

}

</script>


<?php 
	
	
	$ano=$_POST[ano];
	$mes=$_POST[mes];
	
	$op_tp=$_POST[op_tp];
	$validacion=0;
	
	if ($ano==0) {// Si el registro_id es 0 se va a agregar un registro nuevo
				
		if ($op_tp==1){
		
		$query="insert into nomtasas_interes 
		(anio,mes,tasa,ee)
		values ($_POST[txtano],$_POST[cboMes],$_POST[txttasa],
		0)";
		
		$result=sql_ejecutar($query);	
		activar_pagina("tasas_interes.php");				
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual		
	
		$query="select * from nomtasas_interes where anio=$ano and mes=$mes";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		
		$ano_tasa=$row[anio];	
		$mes=$row[mes];
		$tasa=$row[tasa];			
		
	}	
		
	if ($op_tp==2){					
					
		$query="UPDATE nomtasas_interes set anio=$_POST[txtano],
		mes=$_POST[cboMes],
		tasa=$_POST[txttasa],
		ee=0
		where anio=$ano and mes = $mes";	
		
		$result=sql_ejecutar($query);				
		activar_pagina("tasas_interes.php");										
		{			
	}
}	

?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <p>
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
  <input name="ano" type="Hidden" id="registro_id" value="<?php echo $_POST[ano]; ?>">
  <input name="mes" type="Hidden" id="registro_id" value="<?php echo $_POST[mes]; ?>">
  </p>
  <table width="780" height="125" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
        <?php
		if ($ano==0)
		{
		echo "Agregar Tasa de Interes";
		}
		else
		{
		echo "Modificar Tasa de Interes";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="207" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">A&ntilde;o:</font></td>
          <td width="573" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtano" type="text" id="txtano" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($ano!=0){ echo $ano_tasa; }  ?>" maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Mes:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboMes" id="cboMes" style="width:200px" >
              <option value="1" <?php  if ($mes==1){?> selected  <?php }?>> Enero </option>
			  <option value="2" <?php  if ($mes==2){?> selected  <?php }?>> Febrero </option>
			  <option value="3" <?php  if ($mes==3){?> selected  <?php }?>> Marzo </option>
			  <option value="4" <?php  if ($mes==4){?> selected  <?php }?>> Abril </option>
			  <option value="5" <?php  if ($mes==5){?> selected  <?php }?>> Mayo </option>
			  <option value="6" <?php  if ($mes==6){?> selected  <?php }?>> Junio </option>
			  <option value="7" <?php  if ($mes==7){?> selected  <?php }?>> Julio </option>
			  <option value="8" <?php  if ($mes==8){?> selected  <?php }?>> Agosto </option>
			  <option value="9" <?php  if ($mes==9){?> selected  <?php }?>> Septiembre </option>
			  <option value="10" <?php  if ($mes==10){?> selected  <?php }?>> Octubre </option>
			  <option value="11" <?php  if ($mes==11){?> selected  <?php }?>> Noviembre </option>
			  <option value="12" <?php  if ($mes==12){?> selected  <?php }?>> Diciembre </option>
            </select>
          </font></td>
          </tr>
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Tasa:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txttasa" type="text" id="txttasa" style="width:100px" value="<?php if ($ano!=0){ echo $tasa; }  ?>"
			onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </font>          </font></td>
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

