<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");

?>


<script>
function ActualizarNombre(Nomina)
{

frecuencia=document.frmPrincipal.cboFrecuencia.options[document.frmPrincipal.cboFrecuencia.selectedIndex].text; 
       
document.frmPrincipal.txtdescripcion.value=Nomina + '-' + frecuencia + ' - DEL ' + document.frmPrincipal.txtfechainicio.value + ' - Al '+document.frmPrincipal.txtfechafinal.value;

}

function Enviar(){					
	
	if (document.frmPrincipal.registro_id.value==0)
	{ 
		
		document.frmPrincipal.op_tp.value=1
	}
	else
	{ 	
		document.frmPrincipal.op_tp.value=2
	}		
	
	if (document.frmPrincipal.txtdescripcion.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripcion valida. Verifique...");}				
}

</script>


<?php 
/*function fecha_sql($value) { // fecha de DD/MM/YYYY a YYYYY/MM/DD
 return substr($value,6,4) ."/". substr($value,3,2) ."/". substr($value,0,2);
}*/
	
	
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	$validacion=0;
	
	if ($registro_id==0) // Si el registro_id es 0 se va a agregar un registro nuevo
	{			
		
		if ($op_tp==1)
		{
		
		$mes = substr(fecha_sql($_POST['txtfechainicio']),5,2);
		
		if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
		
		//$codigo_nuevo=AgregarCodigo("nom_nominas_pago","codnom");
		
		
		$codigo_nuevo=$_POST['txtcodigo'];
		
		
		//echo $_POST['txtfechafinal']." ".$_POST['txtfechapago']." ".fecha_sql($_POST['txtfechapago'])." ".date("Y/d/m",$_POST['txtfechafinal']);
		//exit(0);
		$query="insert into nom_nominas_pago 
		(codnom,descrip,fechapago,periodo_ini,periodo_fin,anio,mes,frecuencia,periodo,status,codtip,tipnom)
		values ('$codigo_nuevo','$_POST[txtdescripcion]','".fecha_sql($_POST['txtfechapago'])."',
		'".fecha_sql($_POST['txtfechainicio'])."','".fecha_sql($_POST['txtfechafinal'])."',
		". date("Y").",".$mes.",'$_POST[cboFrecuencia]','0','A','".$_SESSION['codigo_nomina']."','".$_SESSION['codigo_nomina']."')";
		
		$result=sql_ejecutar($query);	
		
		activar_pagina("nomina_de_liquidaciones.php");				
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
	
		$query="select * from nom_nominas_pago where codnom='".$registro_id."' and codtip='".$_SESSION['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";		
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		
		$codigo=$row[codnom];	
		$nombre=$row[descrip];
		
		$fecha_pago = date("d/m/Y",strtotime($row[fechapago]));
		$periodo_ini = date("d/m/Y",strtotime($row[periodo_ini]));
		$periodo_fin = date("d/m/Y",strtotime($row[periodo_fin]));
		$ano=$row[anio];
		$frecuencia=$row[frecuencia];
		$periodo=$row[periodo];
		
	}	
		
	if ($op_tp==2)
		{					
				
				$query="UPDATE nom_nominas_pago set codnom='$registro_id',	descrip='$_POST[txtdescripcion]', fechapago='".fecha_sql($_POST['txtfechapago'])."',
				periodo_ini='".fecha_sql($_POST['txtfechainicio'])."',	periodo_fin='".fecha_sql($_POST['txtfechafinal'])."',	anio='" . date("Y") ."',
				frecuencia='$_POST[cboFrecuencia]',	periodo='$_POST[txtPeriodo]' where codnom='$registro_id' and codtip='".$_SESSION['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";	
				
				$result=sql_ejecutar($query);				
				activar_pagina("nomina_de_liquidaciones.php");										
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
		echo "Agregar $termino de Liquidaciones";
		}
		else
		{
		echo "Modificar $termino de Liquidaciones";
		}
		?>
      </font></strong></font></td>
    </tr>
    <tr>
      <td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
        <tr bgcolor="#FFFFFF">
          <td height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Tipo de <?echo $termino?></font></td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow" ><strong><font color="#000066"><?php echo ($_SESSION[nomina]) ?></font></strong></td>
          </tr>
        <tr bgcolor="#FFFFFF">
          <td width="155" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Codigo:</font></td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php 
			if ($registro_id!=0)
			{ 
				echo $codigo; 
			}  
			else
			{
				
				$codigo_nuevo=AgregarCodigo("nom_nominas_pago","codnom", "where codtip='".$_SESSION['codigo_nomina']."'");
				echo $codigo_nuevo; 
			}
			
			
			?>
			" maxlength="10">
          </font></td>
          </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Frecuencia::</font></td>
          <td colspan="5" valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <select  name="cboFrecuencia" id="cboFrecuencia" style="width:200px">
              <?php
	 	$query="select codfre,descrip from nomfrecuencias WHERE codfre='10'";
		$result=sql_ejecutar($query);
		
	 	  //ciclo para mostrar los datos
  		while ($row = mysql_fetch_array($result))
  		{ 		
		// Opcion de modificar, se selecciona la situacion del registro a modificar		
  		if ($row[codfre]==$frecuencia){ ?>
              <option value="<?php echo $row[codfre];?>" selected > <?php echo $row[descrip];?> </option>
              <?php 
		}
		else // opcion de agregar
		{ 
		   ?>
              <option value="<?php echo $row[codfre];?>"><?php echo $row[descrip];?></option>
              <?php 
		} 
		}//fin del ciclo while
		?>
            </select>
          </font></td>
          </tr>
        
        
        <tr bgcolor="#FFFFFF">
		
        </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Fecha de Inicio: </td>
          <td width="141" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <font size="2" face="Arial, Helvetica, sans-serif">
            <input onChange="ActualizarNombre('<?php echo ($_SESSION[nomina]) ?>');" name="txtfechainicio" type="text" id="txtfechainicio" style="width:100px" value="<?php if ($registro_id!=0){ echo $periodo_ini; }else echo date("d/m/Y");  ?>" maxlength="60" >
            </font>
            <input name="image2" type="image" id="d_fechainicio" src="lib/jscalendar/cal.gif" />
            <script type="text/javascript">Calendar.setup({inputField:"txtfechainicio",ifFormat:"%d/%m/%Y",button:"d_fechainicio"});</script>
            </a></font></td>
          <td width="83" bgcolor="#FFFFFF" class="ewTableAltRow">Fecha Final: </td>
          <td width="137" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input onChange="ActualizarNombre('<?php echo ($_SESSION[nomina]) ?>');" name="txtfechafinal" type="text" id="txtfechafinal" style="width:100px" value="<?php if ($registro_id!=0){ echo $periodo_fin; }else echo date("d/m/Y");  ?>" maxlength="60">
            <input name="image22" type="image" id="d_fechafinal" src="lib/jscalendar/cal.gif" />
            <script type="text/javascript">Calendar.setup({inputField:"txtfechafinal",ifFormat:"%d/%m/%Y",button:"d_fechafinal"});</script>
            </a></font></td>
          <td width="97" bgcolor="#FFFFFF" class="ewTableAltRow">Fecha de Pago: </td>
          <td width="151" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtfechapago" type="text" id="txtfechapago" style="width:100px" value="<?php if ($registro_id!=0){ echo $fecha_pago; }else echo date("d/m/Y");?>" maxlength="60">
            <input name="image222" type="image" id="d_fechapago" src="lib/jscalendar/cal.gif" />
            <script type="text/javascript">Calendar.setup({inputField:"txtfechapago",ifFormat:"%d/%m/%Y",button:"d_fechapago"});</script>
            </a></font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Descripci&oacute;n:</td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:550px" value="<?php
			if ($registro_id==0)
				{echo ($_SESSION[nomina])." - Liquidacion";}
			else
				{echo $nombre;}
			?>" >
          </font></td>
        </tr>
        <!-- <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Hoja de Tiempo Asociada: </td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txthojatiempo1" type="text" id="txthojatiempo1" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="" maxlength="10">
          </font></td>
        </tr> -->
        <!-- <tr bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">Hoja de Tiempo Asociada:</td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txthojatiempo2" type="text" id="txthojatiempo2" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="" maxlength="10">
          </font></td>
        </tr> -->
      <!--  <tr bgcolor="#FFFFFF">
          <td height="24" colspan="6" bgcolor="#FFFFFF" class="ewTableAltRow"><label>
            Seleccionar por Nivel Organizativo (Unidades,Funcionales,Cargosa) 
             <input type="checkbox" name="checkbox" value="checkbox">
          </label></td>
          </tr> -->
        
        
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
          <td colspan="5" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="right">
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

