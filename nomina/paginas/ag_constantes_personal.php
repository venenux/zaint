<?php 
session_start();
ob_start();

	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");	
?>


<script>
/*function Actualizar_Foto(img,obj) { 
         //alert(obj.value); 
		 //alert(img); 
		 
		img.src =obj.value;	
		//document.frmAgregarIntegrantes.imgFoto.value=obj.value;
		document.frmAgregarProfesion.txtrutafoto.value=obj.value;					
} 
*/
function Enviar(){					
	
	if (document.frmPrincipal.registro_id.value==0) 
	{ 
		document.frmPrincipal.op_tp.value=1
	}
	else
	{ 	

		document.frmPrincipal.op_tp.value=2
	}		
	if (document.frmPrincipal.txtdescripcion.value==0)
	{
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripción valida. Verifique...");			
	}		
}


</script>

<?php 
	
	
	
	$registro_id=$_POST['registro_id'];
	$op_tp=$_POST['op_tp'];
	
	if ($registro_id==0) // Si el registro_id es 0 se va a agregar un registro nuevo
	{			
		
		if ($op_tp==1)
		{
		
		if (isset($_POST[chkCampoBusqueda])){$campo_busqueda=1;}else{$campo_busqueda=0;}
		
		$codigo_nuevo=AgregarCodigo("nomcampos_adicionales","id");
		
		$query="insert into nomcampos_adicionales 
		(archivo,id,descrip,etiqueta,tipo,valdefecto1,particular,ee,busca,tipocamposadic) values ('nompersonal','$codigo_nuevo','$_POST[txtdescripcion]','$_POST[txtetiqueta]','$_POST[optTipoDatos]','$_POST[txtvalor]','0','0','$campo_busqueda','3')";
		
		$result=sql_ejecutar($query);	
		
		// actualizar los nuevos campos adicionales en la tabla nomcampos_adic_personal
		// para la relacion campos adicionales*empleados		
		$query="select ficha from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
		$result=sql_ejecutar($query);
		
		/*while ($row = mysql_fetch_array($result))
		{
		$sentencia="insert into nomcampos_adic_personal 	
		values('$row[ficha]',$codigo_nuevo,'$_POST[txtvalor]','','$_POST[optTipoDatos]','','',0,'".$_SESSION['codigo_nomina']."')";
		$resultado=sql_ejecutar($sentencia);
		}*/
		activar_pagina("constantes_personal.php");				
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
		$query="select * from nomcampos_adicionales where id=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		$codigo=$row[id];	
		$nombre=$row[descrip];		
		$etiqueta=$row[etiqueta];
		$tipo_dato=$row[tipo];
		$valor_defecto=$row[valdefecto1];
		$parabusqueda=$row[busca];
	}	
		
	if ($op_tp==2)
		{									
			
			if (isset($_POST[chkCampoBusqueda])){$campo_busqueda=1;}else{$campo_busqueda=0;}
			
			$query="UPDATE nomcampos_adicionales set id=$registro_id,
			descrip='$_POST[txtdescripcion]',			
			etiqueta='$_POST[txtetiqueta]',
			tipo='$_POST[optTipoDatos]',
			valdefecto1='$_POST[txtvalor]',
			busca='$campo_busqueda'
			where id=$registro_id";
			
			$result=sql_ejecutar($query);				
			
			// para la relacion campos adicionales*empleados		
			//$query="select ficha from nompersonal";
			//$result=sql_ejecutar($query);
			
			//while ($row = mysql_fetch_array($result))
			//{
			//$conexion=conexion();
// 			$sentencia="select ficha from nomcampos_adic_personal WHERE tiponom='".$_SESSION['codigo_nomina']."' AND id=".$registro_id." ";
// 			$resultado33=sql_ejecutar($sentencia);
// 			$fetch33 = fetch_array($resultado33);
// 			//echo "1111111";
// 			if($fetch33=="")
// 			{
// 				$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
// 				$resultado=sql_ejecutar($consulta);
// 			
// 			//mientras existan integrantes asociar los campos adicionales que tengan que ver con nom personal
// 				//echo "2222222";
// 				while($fila=fetch_array($resultado))
// 				{
// 				$consulta_ca="select id,tipo,codorgh,valdefecto1 from nomcampos_adicionales where archivo='nompersonal' and id='".$registro_id."' ";
// 				$resultado_ca=sql_ejecutar($consulta_ca);
// 					//echo "333333";
// 					while($fila_ca=fetch_array($resultado_ca))
// {
// 						$consulta_temp="select * from nomcampos_adic_personal where ficha='".$fila['ficha']."' and id='".$fila_ca['id']."' and tiponom='".$_SESSION['codigo_nomina']."'";
// 						$resultado_temp=sql_ejecutar($consulta_temp);
// 						//echo "44444";
// 						if(num_rows($resultado_temp)==0){	
// 					
// 						$valor=$fila_ca['valdefecto1'];
// 						switch($fila_ca['tipo']){
// 							case "N":
// 								if($fila_ca['valdefecto1']!=null and is_numeric($fila_ca['valdefecto1'])){
// 									$valor=number_format($fila_ca['valdefecto1'],2,",",".");
// 								}else{
// 									$valor="0";
// 								}
// 								break;
// 							
// 							case "F":
// 								
// 								if(strtotime(fecha_sql($fila_ca['valdefecto1']))==null){
// 									$valor="00/00/0000";
// 								}else{
// 									$valor=date("d/m/Y",strtotime(fecha_sql($fila_ca['valdefecto1'])));
// 								}
// 								break;
// 							case "A":
// 								
// 								$valor=$fila_ca['valdefecto1'];
// 								break;
// 						}
// 				
// 						$consulta_cap="insert into nomcampos_adic_personal (ficha,id,valor,tipo,codorgh,tiponom) values ('".$fila['ficha']."','".$fila_ca['id']."','".$valor."','".$fila_ca['tipo']."','".$fila_ca['codorgh']."','".$_SESSION['codigo_nomina']."')";
// 						$resultado_cap=sql_ejecutar($consulta_cap);
// 						//echo "555555";
// 						}
// 					}
// 				
// 				}
// 			}
// 			else
// 			{
// 				$sentencia="update nomcampos_adic_personal set tipo = '".$_POST['optTipoDatos']."', valor='".$_POST['txtvalor']."' WHERE tiponom='".$_SESSION['codigo_nomina']."' AND id=".$registro_id." ";
// 				$resultado=sql_ejecutar($sentencia);
// 			}
			?>
			<SCRIPT type="text/javascript">
			alert("CAMPO ADICIONAL EDITADO SATISFACTORIAMENTE!!")
			</SCRIPT>
			<?
			
			//}
			activar_pagina("constantes_personal.php");										
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
        <?php if ($registro_id==0){echo "Agregar Campo Adicional (Trabajador)";}else{echo "Modificar Campo Adicional (Trabajador)";}?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td width="217" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo:</font></td>
          <td width="390" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" disabled="disabled" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; } ?>" maxlength="10">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:300px" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>" maxlength="30">
          </font></td>
          <td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
        </tr>
        
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Etiqueta:</td>
          <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtetiqueta" type="text" id="txtetiqueta" style="width:300px" value="<?php if ($registro_id!=0){ echo $etiqueta; }  ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Tipo de Dato: </td>
          <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow">
            <input name="optTipoDatos" type="radio" value="A"
			<?php if ($tipo_dato=='A'){?> checked="checked"<?php }?>>
          Alfanum&eacute;rico 
          <input name="optTipoDatos" type="radio" value="N"
		  <?php if ($tipo_dato=='N'){?> checked="checked"<?php }?>>
			Num&eacute;rico 
			<input name="optTipoDatos" type="radio" value="F"
			<?php if ($tipo_dato=='F'){?> checked="checked"<?php }?>> 
			Fecha 
			<input name="optTipoDatos" type="radio" value="T"
			<?php if ($tipo_dato=='T'){?> checked="checked"<?php }?>> 
			Tablas
</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Valor por Defecto:</td>
          <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtvalor" type="text" id="txtvalor" style="width:300px" value="<?php if ($registro_id!=0){ echo $valor_defecto; }  ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Utilizara el Campo para B&uacute;squedas? </td>
          <td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><label>
            <input name="chkCampoBusqueda" type="checkbox" id="chkCampoBusqueda" value="checkbox"
			<?php if ($parabusqueda==1){?> checked="checked"<?php }?>>
          </label></td>
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
                          <?php btn('ok','Enviar(); document.frmPrincipal.submit();',2) ?>
					
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

