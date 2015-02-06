<?php 
session_start();
ob_start();
include ("../header.php");
include("../lib/common.php") ;
include("func_bd.php");	
?>

<script>

function Enviar(){					
	if (document.frmAgregarCargo.registro_id.value==0){ 
		document.frmAgregarCargo.op_tp.value=1
	}
	else{ 	
		document.frmAgregarCargo.op_tp.value=2
	}		
	
	if (document.frmAgregarCargo.txtdescripcion.value==0){
		document.frmAgregarCargo.op_tp.value=-1
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
			$query="select * from nomcargos where cod_car='".$_POST['txtcodigo']."'";
			$result=sql_ejecutar($query);
			$cantidad= num_rows($result);
			if ($cantidad!=0){ // el codigo esta repetido ?>
				<script language="javascript" type="text/javascript" >
				alert('Este código ya existe!!')	
				</script>
				<?php
				activar_pagina("cargos.php");
				
			}
			else{
	
				$query="insert into nomcargos values ('".$_POST['txtcodigo']."','".$_POST[txtdescripcion]."','$_POST[grado]','',0,0)";
					
				$result=sql_ejecutar($query);	?>
				<script language="javascript" type="text/javascript" >
				alert('Su nuevo cargo fue agregado exitosamente!!')	
				</script>
				<?php
				activar_pagina("cargos.php");				
			}
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
		$query="select * from nomcargos where cod_car='$registro_id'";	
		$result=sql_ejecutar($query);	
		$row = fetch_array ($result);	
		$codigo=$row[cod_car];	
		$nombre=$row[des_car];
		$grado=$row[grado];
	}	
		
		
		if ($op_tp==2)
		{							
			$query="UPDATE nomcargos set des_car='$_POST[txtdescripcion]', grado='$_POST[grado]' where cod_car='$registro_id'";
			$result=sql_ejecutar($query);	
			activar_pagina("cargos.php");
		{			
	}
}	

?>
<form action="" method="post" name="frmAgregarCargo" id="frmAgregarCargo" enctype="multipart/form-data">
  <p>
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
  <input name="registro_id" type="Hidden" id="registro_id" value="<?php if (isset($_POST[registro_id])){echo $_POST[registro_id];} else {echo 0;} ?>">
  </p>
  <table width="780" height="125" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
        <?php
		
		if ($registro_id==0)
		{
		echo "Agregar Cargo";
		}
		else
		{
		echo "Modificar Cargo";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="217" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo:</font></td>
          <td width="390" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo"  <?php if($registro_id!=0){ echo 'disabled="disabled"';}  ?> style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n del Cargo:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:300px" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>" maxlength="100">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Grado del Cargo:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
        
	<?
	$consulta="SELECT grado FROM nomgradospasos";
	$resultado=sql_ejecutar($consulta);
	?>
	<select name="grado" id="grado">
	<option value="">Seleccione</option>
	<?php
	while($fetch=fetch_array($resultado))
	{
	?>
		<option value="<? echo $fetch['grado']?>" <? if ($grado==$fetch['grado']) echo "selected='true'"?>><? echo $fetch['grado']?></option>";
	<?
	}
	?>
	</SELECT>
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
                          <?php btn('ok','Enviar(); document.frmAgregarCargo.submit();',2) ?>
					
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

