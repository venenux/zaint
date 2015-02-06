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
	
	if (document.frmPrincipal.txtsalario.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar un salario valido. Verifique...");}

				
}

</script>



<?php 
	
	
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	$validacion=0;
	
	if ($registro_id==0) {// Si el registro_id es 0 se va a agregar un registro nuevo
				
		if ($op_tp==1){
		
		$codigo_nuevo=AgregarCodigo("nomgrupos_categorias","gr");
	
		$query="insert into nomgrupos_categorias 
		(gr,salario,bonomes,bonodia)
		values ('$codigo_nuevo','$_POST[txtsalario]','$_POST[txtbonomes]',
		'$_POST[txtbonodia]')";
		
		$result=sql_ejecutar($query);	
		activar_pagina("tabulador_categorias.php");				
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual		
	
		$query="select * from nomgrupos_categorias where gr=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		
		$codigo=$row[gr];	
		$salario=$row[salario];
		$bono_mes=$row[bonomes];	
		$bono_dia=$row[bonodia];
	}	
		
	if ($op_tp==2){							
					
		$query="UPDATE nomgrupos_categorias set gr=$registro_id,
		salario='$_POST[txtsalario]',
		bonomes='$_POST[txtbonomes]',
		bonodia='$_POST[txtbonodia]'				
		where gr='$registro_id'";	
					
		$result=sql_ejecutar($query);				
		activar_pagina("tabulador_categorias.php");										
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
		echo "Agregar Grupo de Categorias";
		}
		else
		{
		echo "Modificar Grupo de Categorias";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="207" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Grupo:</font></td>
          <td width="573" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" disabled="disabled" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Salario:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtsalario" type="text" id="txtsalario" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $salario; }  ?>" maxlength="10">
          </font></td>
          </tr>
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Bono Mes:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtbonomes" type="text" id="txtbonomes" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $bono_mes; }  ?>" maxlength="10">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Bono D&iacute;a : </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtbonodia" type="text" id="txtbonodia" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $bono_dia; }  ?>" maxlength="10">
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

