<?php 
session_start();
ob_start();
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");	
	ini_set("memory_limit","16M");
?>

<script>

function Enviar(){					
	
	if (document.frmAgregarProfesion.registro_id.value==0){ 
		document.frmAgregarProfesion.op_tp.value=1
	}
	else{ 	
		document.frmAgregarProfesion.op_tp.value=2}		
	
	if (document.frmAgregarProfesion.txtdescripcion.value==0)
	{
		document.frmAgregarProfesion.op_tp.value=-1
		alert("Debe ingresar una descripción valida. Verifique...");			
	}				
	
}


</script>
<script language="javascript" type="text/javascript" src="datetimepicker.js">
//Date Time Picker script- by TengYong Ng of http://www.rainforestnet.com
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 

</script>


<?php 
	
	
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	$validacion=0;
	
	if ($registro_id==0) // Si el registro_id es 0 se va a agregar un registro nuevo
	{			
		
		if ($op_tp==1)
		{
		
		$codigo_nuevo=AgregarCodigo("nomprofesiones","codorg");
		
		$query="insert into nomprofesiones values 
		($codigo_nuevo,
		'$_POST[txtdescripcion]',0)";
				 
		$result=sql_ejecutar($query);	
		activar_pagina("profesiones.php");				
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
		$query="select * from nomprofesiones where codorg=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		$codigo=$row[codorg];	
		$nombre=$row[descrip];		
	}	
		
		
	if ($op_tp==2)
		{					
					
				$query="UPDATE nomprofesiones set codorg=$registro_id,
				descrip='$_POST[txtdescripcion]'
				where codorg=$registro_id";				
				
				$result=sql_ejecutar($query);				
				activar_pagina("profesiones.php");										
		{			
	}
}	

?>
<form action="" method="post" name="frmAgregarProfesion" id="frmAgregarProfesion" enctype="multipart/form-data">
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
		echo "Agregar Profesion";
		}
		else
		{
		echo "Modificar Profesion";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="217" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo:</font></td>
          <td width="390" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" disabled="disabled" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n de la profesi&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:300px" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>" maxlength="60">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
          <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font>
                  <table width="85" border="0">
                    <tr>
                      <td width="39"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                          <?php btn('cancel','history.back();',2) ?>
                      </font></div></td>
                      <td width="36"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                          <?php btn('ok','Enviar(); document.frmAgregarProfesion.submit();',2) ?>
					
                      </font></div></td>
                    </tr>
                  </table>
            <font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
        </tr>
      </table>      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>  
</form>
<p>&nbsp;</p>
</body>
</html>

