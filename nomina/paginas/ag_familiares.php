<?php 
session_start();
ob_start();
	include("func_bd.php");	
	include ("../header.php");
	include ("../lib/common.php");
?>

<script>
function Enviar(){					
	if (document.frmPrincipal.registro_id.value==0){ 

		document.frmPrincipal.op_tp.value=1}
	else{ 	

		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtnombre.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar un nombre valido. Verifique...");}
}

</script>

<?php 
	
	
$registro_id=$_POST[registro_id];
$bandera=$_POST['bandera'];
if (isset($HTTP_GET_VARS[txtficha]))
{
	$ficha=$HTTP_GET_VARS[txtficha];
	$cedula=$HTTP_GET_VARS[cedula];	
}
else
{
	$ficha=$_POST[txtficha];
	$cedulatrab=$_POST[cedula];
}
	
	$op_tp=$_POST[op_tp];
	$validacion=0;
	
	if ($registro_id==0) 
	{// Si el registro_id es 0 se va a agregar un registro nuevo
		if ($op_tp==1)
		{
		
		if(isset($_POST['chkAfiliado']))
			$afiliado=1;
		else
			$afiliado=0;

		/*$consulta="select * from nomfamiliares where cedula_beneficiario='".$_POST[txtcedula]."'";
		$resultado=sql_ejecutar($consulta);	
		if(num_rows($resultado)==0)
		{*/
		$query="insert into nomfamiliares 
		(cedula,ficha,nombre,sexo,costo,nacionalidad,afiliado,fecha_nac,codpar,tipnom,cedula_beneficiario,apellido,niveledu,institucion,tallafranela,tallamono,codgua,fecha_beca)
		values ('$cedulatrab','$ficha','$_POST[txtnombre]','$_POST[optSexo]',
		'$_POST[txtcosto]','$_POST[optNacionalidad]','$afiliado','".fecha_sql($_POST['txtFechaNac'])."','".$_POST['parentesco']."','".$_SESSION['codigo_nomina']."','$_POST[txtcedula]','$_POST[txtapellido]','$_POST[niveledu]','$_POST[txtinstitucion]','$_POST[tallafranela]','$_POST[tallamono]','$_POST[cboGuarderia]','".fecha_sql($_POST['txtFechaBeca'])."')";
		
		$result=sql_ejecutar($query);	
		activar_pagina("familiares.php?txtficha=$ficha&cedula=$cedulatrab&bandera=$bandera");
		/*}
		else
		{
		mensaje("La cedula introducida ya esta siendo usada por otra persona. Por favor verifique los datos");
		}*/
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual		
	
		$query="select * from nomfamiliares where correl='$registro_id'";		
		$result=sql_ejecutar($query);	
		$row = fetch_array ($result);	
		$cedulatrab=$row[cedula];	
		$cedula=$row[cedula_beneficiario];	
		$nombre=$row[nombre];
		$apellido=$row[apellido];
		$nacionalidad=$row[nacionalidad];		
		$sexo=$row[sexo];
		$guarderia=$row[codgua];
		$costo=$row[costo];
		$afiliado=$row[afiliado];
		$fecha_nacimiento=fecha($row[fecha_nac]);
		$parentesco=$row[codpar];
		$correl=$row[correl];
		$nivel=$row[niveledu];
		$institucion=$row[institucion];
		$franela=$row[tallafranela];
		$mono=$row[tallamono];
		$promedionota=$row[promedionota];
		$beca=$row[beca];
		$fecha_beca=fecha($row[fecha_beca]);

	}	
		
	if ($op_tp==2){					
		
		if (isset($_POST['chkAfiliado'])){$afiliado=1;}else{$afiliado=0;}
		if (isset($_POST['chkBeca'])){$beca=1;}else{$beca=0;}
		$query="UPDATE nomfamiliares set cedula_beneficiario='$_POST[txtcedula]',
		nombre='$_POST[txtnombre]',
		cedula='$_POST[cedula]',
		ficha='$_POST[txtficha]',
		apellido='$_POST[txtapellido]',
		nacionalidad='$_POST[optNacionalidad]',
		sexo='$_POST[optSexo]',
		costo='$_POST[txtcosto]',
		afiliado='$afiliado',
		fecha_nac='".fecha_sql($_POST['txtFechaNac'])."',
		codpar='".$_POST['parentesco']."',
		niveledu='".$_POST['niveledu']."',
		institucion='".$_POST['txtinstitucion']."',
		tallafranela='$_POST[tallafranela]',
		tallamono='$_POST[tallamono]',
		promedionota='$_POST[promedionota]',
		beca='$beca',
		codgua='$_POST[cboGuarderia]',
		fecha_beca='".fecha_sql($_POST['txtFechaBeca'])."'
		where correl='$_POST[correl]'";	
		//exit(0);
		$result=sql_ejecutar($query);				
		activar_pagina("familiares.php?txtficha=$ficha&bandera=$bandera");							
		{			
	}
}	
?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <p>
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
<input name="cedula" type="Hidden" id="cedula" value="<?php echo $cedulatrab; ?>">
  <input name="registro_id" type="hidden" id="registro_id" value="<?php echo $registro_id; ?>">
  <input name="txtficha" type="hidden" id="txtficha" value="<?php echo $ficha; ?>">
<input name="bandera" type="hidden" id="bandera" value="<?php echo $bandera; ?>">
  </p>
  <table width="683" height="125" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
        <?php if ($registro_id==0){echo "Agregar Familiar";}else{echo "Modificar Familiar";}?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="675" height="86" class="ewTableAltRow"><table width="675" border="0" bordercolor="#0066FF">
      <tr bgcolor="#FFFFFF">
          <td width="136" height="23" bgcolor="#FFFFFF" class="ewTableAltRow">Parentesco</td>
          <td width="529" bgcolor="#FFFFFF" class="ewTableAltRow" ><SELECT name="parentesco">
<?$consulta="select * from nomparentescos";
	$resultado_parentesco=sql_ejecutar($consulta);
	while($fila_parentesco=fetch_array($resultado_parentesco)){
?>
<option <?if($parentesco==$fila_parentesco['codorg']){?> selected="true" <?}?> value="<?echo $fila_parentesco['codorg']?>"><?echo $fila_parentesco['descrip']; ?></option>
	  		

<?}?></SELECT></td>
          </tr>
        <tr bgcolor="#FFFFFF">
          <td width="136" height="23" bgcolor="#FFFFFF" class="ewTableAltRow">C&eacute;dula</td>
          <td width="529" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <label></label>
<input name="txtcedula" type="text" id="txtcedula" style="width:100px"  value="<?php if ($registro_id!=0){ echo $cedula; }  ?>" maxlength="10"><INPUT type="hidden" name="correl" value="<?echo $correl; ?>">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Nacionalidad:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <label>
            <input name="optNacionalidad" type="radio" value="V"
			<?php if ($nacionalidad=='V'){?> checked="checked"<?php	}?>
			>
            </label>
Venezolano
<label>
<input name="optNacionalidad" type="radio" value="E"
			<?php if ($nacionalidad=='E'){?> checked="checked"<?php	}?>
>
</label>
Extranjero </font></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Nombre:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtnombre" type="text" id="txtnombre" style="width:200px" value="<?php if ($registro_id!=0){ echo utf8_encode($nombre); }  ?>">
          </font></td>
          </tr>
	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Apellido:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtapellido" type="text" id="txtapellido" style="width:200px" value="<?php if ($registro_id!=0){ echo utf8_encode($apellido); }  ?>">
          </font></td>
          </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Sexo:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <label>
            <input name="optSexo" type="radio" value="Masculino"
			
			<?php  if ($sexo=="Masculino"){?> checked="checked"<?php }?>>
            Masculino</label>
            <label>
<input name="optSexo" type="radio" value="Femenino"
			<?php if ($sexo=="Femenino"){?> checked="checked"<?php }
			?>
>
</label>
            Femenino          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Afiliado</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <label>
            <input name="chkAfiliado" type="checkbox" id="chkAfiliado" value="checkbox"
			<?php if ($afiliado==1){?> checked="checked"<?php }?>>
            </label>
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Fecha de Nacimiento :</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtFechaNac" type="text" id="txtFechaNac" style="width:100px" value="<?php if ($registro_id!=0){ echo $fecha_nacimiento; }  ?>" maxlength="60" >
            </font>
            <input name="image2" type="image" id="d_fechanac" src="lib/jscalendar/cal.gif" />
            <script type="text/javascript">Calendar.setup({inputField:"txtFechaNac",ifFormat:"%d/%m/%Y",button:"d_fechanac"});</script>
            </a></font></td>
        </tr>
     
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Guarderia </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboGuarderia" style="width:200px" >
              <?php
		  
	 	$query="select codorg,descrip from nomguarderias";
		$result=sql_ejecutar($query);
		
	 	  //ciclo para mostrar los datos
  		while ($row = fetch_array($result))
  		{ 		
		// Opcion de modificar, se selecciona la situacion del registro a modificar		
  		if ($row[codorg]==$guarderia){ ?>
              <option value="<?php echo $row[codorg];?>" selected > <?php echo $row[descrip];?> </option>
              <?php 
		}
		else // opcion de agregar
		{ 
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
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Costo de Guarderia </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcosto" type="text" id="txtcosto" style="width:100px" value="<?php if ($registro_id!=0){ echo $costo; }  ?>" maxlength="60" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
          </font></td>
        </tr>
	<tr bgcolor="#FFFFFF">
          <td width="136" height="23" bgcolor="#FFFFFF" class="ewTableAltRow">Nivel Educativo</td>
          <td width="529" bgcolor="#FFFFFF" class="ewTableAltRow" >
	<SELECT name="niveledu">
		<option <?if($nivel=='Prescolar'){?> selected="true" <?}?> value="<?echo 'Prescolar'?>"><?echo 'Prescolar'?></option>
		<option <?if($nivel=='Primaria'){?> selected="true" <?}?> value="<?echo 'Primaria'?>"><?echo 'Primaria'?></option>
		<option <?if($nivel=='Basico'){?> selected="true" <?}?> value="<?echo 'Basico'?>"><?echo 'Basico'?></option>
		<option <?if($nivel=='Diversificado'){?> selected="true" <?}?> value="<?echo 'Diversificado'?>"><?echo 'Diversificado'?></option>
		<option <?if($nivel=='Universitario'){?> selected="true" <?}?> value="<?echo 'Universitario'?>"><?echo 'Universitario'?></option>
		
		</SELECT></td>
	</tr>
	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Institución:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtinstitucion" type="text" id="txtinstitucion" style="width:300px" value="<?php if ($registro_id!=0){ echo $institucion; }  ?>">
          </font></td>
          </tr>
	 <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Beca:</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <label>
            <input name="chkBeca" type="checkbox" id="chkBeca" value="checkbox"
			<?php if ($beca==1){?> checked="checked"<?php }?>>
            </label>
          </font></td>
        </tr>

	 <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Fecha  Nota :</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtFechaBeca" type="text" id="txtFechaBeca" style="width:100px" value="<?php if ($registro_id!=0){ echo $fecha_beca; }  ?>" maxlength="60" >
            </font>
            <input name="image2" type="image" id="d_fechabec" src="lib/jscalendar/cal.gif" />
            <script type="text/javascript">Calendar.setup({inputField:"txtFechaBeca",ifFormat:"%d/%m/%Y",button:"d_fechabec"});</script>
            </a></font></td>
        </tr>



	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Promedio de Notas:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="promedionota" type="text" id="promedionota" style="width:100px" value="<?php if ($registro_id!=0){ echo $promedionota; }  ?>">
          </font></td>
          </tr>

	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Talla Franela:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="tallafranela" type="text" id="tallafranela" style="width:200px" value="<?php if ($registro_id!=0){ echo $franela; }  ?>">
          </font></td>
          </tr>

	<tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Talla Mono:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="tallamono" type="text" id="tallamono" style="width:200px" value="<?php if ($registro_id!=0){ echo $mono; }  ?>">
          </font></td>
          </tr>

        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
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

