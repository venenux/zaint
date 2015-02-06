<?php 
session_start();
ob_start();
?>

<script>

function Enviar(){					
			
	if (document.frmPrincipal.registro_id.value==0){ 
		document.frmPrincipal.op_tp.value=1}
	else{ 
		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtcodigo.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar un codigo valido. Verifique...");}
	else if (document.frmPrincipal.txtdescripcion.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripci�n valida. Verifique...");}
}

</script>


<?php 
	include ("../header.php");
	include("../lib/common.php") ;
	include("func_bd.php");	
	
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	

	
	if ($registro_id=='') {// Si el registro_id es 0 se va a agregar un registro nuevo
				
		if ($op_tp==1){
		
				
		$query="insert into nomacumulados 
		(cod_tac,des_tac,markar,ee)
		values ('$_POST[txtcodigo]','$_POST[txtdescripcion]',0,0)";
		
		$result=sql_ejecutar($query);	
		activar_pagina("acumulados.php");				
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual		
		
		$query="select * from nomacumulados where cod_tac='$registro_id'";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		
		$codigo=$row[cod_tac];	
		$nombre=$row[des_tac];
	}	
		
	if ($op_tp==2){					
		
		$query="UPDATE nomacumulados set cod_tac='$_POST[txtcodigo]',
		des_tac='$_POST[txtdescripcion]'
		where cod_tac='$registro_id'";	
		
		$result=sql_ejecutar($query);				
		activar_pagina("acumulados.php");										
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
		if ($registro_id=='')
		{
		echo "Agregar Tipo de Acumulados";
		}
		else
		{
		echo "Modificar Tipos de Acumulados";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="207" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Codigo:</font></td>
          <td width="573" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" value="<?php if ($registro_id!=''){ echo $codigo; }  ?>"  maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:300px" value="<?php if ($registro_id!=''){ echo $nombre; }  ?>">
            <label></label>
            <label></label>
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

