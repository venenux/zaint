<?php 
session_start();
ob_start();
include ("../header.php");
include("../lib/common.php") ;
include("func_bd.php");	
?>
<script>
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
<script language="javascript" type="text/javascript" src="datetimepicker.js">

</script>


<?php
	$registro_id=$_POST['registro_id'];
	$op_tp=$_POST['op_tp'];
	$validacion=0;
	$nivel=$_POST['nivel'];
	$tabla_nivel = "nomnivel$nivel";
	if ($registro_id==0) // Si el registro_id es 0 se va a agregar un registro nuevo
	{			
		
		if ($op_tp==1)
		{
			$codigo_nuevo=AgregarCodigo("$tabla_nivel","codorg");
			$query="insert into $tabla_nivel values ($_POST[txtcodigo], '$_POST[txtdescripcion]',0,0,0)";
			$result=sql_ejecutar($query);
			activar_pagina("subniveles.php?nivel=$nivel");
		}
	}
	else // Si el registro_id es mayor a 0 se va a editar el registro actual
	{	
		$query="select * from $tabla_nivel where codorg=$registro_id";		
		$result=sql_ejecutar($query);	
		$row = fetch_array ($result);	
		$codigo=$row[codorg];	
		$nombre=$row[descrip];
	}
	
	if ($op_tp==2)
		{
			$query="UPDATE $tabla_nivel set codorg=$_POST[txtcodigo], descrip='$_POST[txtdescripcion]' where codorg=$registro_id";
			$result=sql_ejecutar($query);	
// 			$consulta="DELETE FROM nomconceptos_ctager WHERE codnivel4=$registro_id";
// 			$result3=sql_ejecutar($consulta);
// 			$j=1;
// 			While($j<=$_POST['cantidad'])
// 			{
// 				$codcon="codcon".$j;
// 				$ctacon="ctacon".$j;
// 				$consulta="INSERT INTO nomconceptos_ctager SET codcon='".$_POST[$codcon]."', ctacon='".$_POST[$ctacon]."', codnivel4=$_POST[txtcodigo] ";
// 				$result4=sql_ejecutar($consulta);
// 				$j+=1;
// 			}
			activar_pagina("subniveles.php?nivel=$nivel");
		{
		
	}
}

$consulta="SELECT codcon, descrip, tipcon, ctacon FROM nomconceptos";
$result2=sql_ejecutar($consulta);


?>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<p>
<input name="op_tp" type="Hidden" id="op_tp" value="-1">
<input name="nivel" type="Hidden" id="nivel" value="<?php echo $_POST[nivel]; ?>">
<input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">
</p>
<table width="780" height="125" border="0" class="row-br">
<tr>
<td height="31" class="row-br"><font color="#000066"><strong>&nbsp;<font color="#000066">
<?php
	if ($registro_id==0)
	{
		echo "Agregar Sub Nivel";
	}
	else
	{
		echo "Modificar Sub Nivel";
	}
?>
</font></strong></font></td>
</tr>
<tr>
<td width="489" height="86" class="ewTableAltRow"><table width="790" border="0" bordercolor="#0066FF">
<tr bgcolor="#FFFFFF">
<td width="217" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo:</font></td>
<td width="390" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
<input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if ($registro_id!=0){ echo $codigo; }  ?>" maxlength="10">
</font></td>
<td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
</tr>
<tr valign="middle" bgcolor="#FFFFFF">
<td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:&nbsp;</font></td>
<td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
<input name="txtdescripcion" type="text" id="txtdescripcion" size="50" value="<?php if ($registro_id!=0){ echo $nombre; }  ?>">
</font></td>
<td width="169" colspan="-1" bgcolor="#FFFFFF" class="ewTableAltRow" >&nbsp;</td>
</tr>
<?php
if(($nivel==4)&&($registro_id!=0))
{
	$i=1;
	while($fetch=fetch_array($result2))
	{
		$des=$fetch['descrip'];
		if($des[0]=="*")
		{
			?>
			<tr>
			<TD>Cod. Con.: <?php echo $fetch['codcon'];?></TD>
			<input type="hidden" name="<?php echo "codcon".$i;?>" id="<?php echo "codcon".$i;?>" value="<?php echo $fetch['codcon'];?>">
			<TD>Concepto: <strong><?php echo "---".str_replace("*","",$fetch['descrip'])."---";?></strong></TD>
			<?
		}
		else
		{
			?>
			<tr>
			<TD>Cod. Con.: <?php echo $fetch['codcon'];?></TD>
			<input type="hidden" name="<?php echo "codcon".$i;?>" id="<?php echo "codcon".$i;?>" value="<?php echo $fetch['codcon'];?>">
			<TD>Concepto: <?php echo str_replace("*","",$fetch['descrip']);?></TD>
			<?
		}
		$consulta="SELECT ctacon FROM nomconceptos_ctager WHERE codnivel4=$registro_id AND codcon=$fetch[codcon]";
		$result_cta=sql_ejecutar($consulta);
		$fetch_cta=fetch_array($result_cta);
		?>
		<TD>Cta. cont.: </TD>
		<td><input type="text" name="<?php echo "ctacon".$i;?>" id="<?php echo "ctacon".$i;?>" value="<? echo $fetch_cta['ctacon']?>">
		</td>
		</tr>	
		<?
		$i+=1;
	}
}
?>
<input type="hidden" name="cantidad" id="cantidad" value="<?php echo $i;?>">
<tr bgcolor="#FFFFFF">
<td height="24" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
<td colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font>
<table width="85" border="0">
<tr>
<td width="39"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
<?php btn('cancel',"parent.cont.location.href='subniveles.php?nivel=$nivel'",2) ?>
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

