<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>


<script type="text/javascript">


function Aceptar(variable)
{
	//opener.document.forms[0].textfield.value=variable;
	//window.opener.SumarCampoFormula();
	opener.document.location.href="movimientos_nomina_liquidaciones.php?codigo_nomina="+document.frmPrincipal.codnomm.value+"&codt="+document.frmPrincipal.codtt.value+"&pag="+document.frmPrincipal.numpagg.value+"&ficha="+variable
	CerrarVentana();
}

function MarcarTodos()
{
	if (document.frmPrincipal.marcar_todos.value==1)
		{Opcion=true;document.frmPrincipal.marcar_todos.value=0;}
	else
		{Opcion=false;document.frmPrincipal.marcar_todos.value=1;}

	for(i=0; ele=document.frmPrincipal.elements[i]; i++){  		
		if (ele.name=='chkCodigo[]')
			{ele.checked =Opcion;}			
	}	
}

function CerrarVentana(){
	javascript:window.close();
}

function enviar(op)
{
	document.frmPrincipal.enviarr.value=op;
	document.frmPrincipal.submit();
}
</script>


<?
include ("../header.php");
include("../lib/common.php");
include ("func_bd.php");
?>
<p>
<font size="2" face="Arial, Helvetica, sans-serif">
<?php 
$conexion=conexion();

if($_POST['enviarr']==1)
{
	$consulta = "UPDATE nompersonal SET cod_tli='".$_POST['tipoliq']."',fecharetiro='".fecha_sql($_POST['fechaD'])."',motivo_liq='$_POST[motivoliq]', preaviso='$_POST[preaviso]' WHERE ficha = '".$_POST['ficha']."' AND tipnom = '".$_POST['tiponom']."' ";
	$resulta2 = query($consulta,$conexion);
	?>
	<script>
	alert ("DATOS AGREGADOS CON EXITO!!")
	window.close();
	</script>
	<?php
}


$tiponom = $_GET['tipo_nomina'];
$ficha = $_GET['ficha'];

$conexion=conexion();
$consulta = "SELECT * FROM nomliquidaciones";
$resultado = query($consulta,$conexion);



?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
  <table width="100%" class="tb-tit">
    <tr>
      <td class="row-br">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%">
		<strong><font color="#000066">
			 Datos de liquidaci&oacute;n </font></strong></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('cancel','CerrarVentana();',2,'Salir') ?>
				    </div></td>
        </tr>
        </table>
	</td>
        </tr>
      </table>


<TABLE width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">

<tr bgcolor="#CCCCCC"  class="ewTableHeader">
<TD>
<br/>
</TD>
<td></td>
</tr>
<tr bgcolor="#CCCCCC" class="ewTableHeader"> 
<td width="150" height="21" align="right" class="phpmakerlist"> 
<div align="left" class="tb-head"><font size="2" face="Arial, Helvetica, sans-serif">Fecha de liquidaci&oacute;n</font></div>	  </td>
<TD><INPUT type="text" name="fechaD" id="fechaD" size="15" maxlength="12" value="<? echo date("d/m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif">
<script type="text/javascript">Calendar.setup({inputField:"fechaD",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></TD>
</tr>	
<tr bgcolor="#CCCCCC" class="ewTableHeader"> 
<td width="150" height="21" align="right" class="phpmakerlist"> 
<div align="left" class="tb-head">
<font size="2" face="Arial, Helvetica, sans-serif">Tipo de liquidaci&oacute;n</font>
</div>
</td>
<TD>
<select name="tipoliq" id="tipoliq" >
<?php 
while($fetch = fetch_array($resultado))
{
?>
<OPTION value="<?php echo $fetch['cod_tli'];?>"><?php echo $fetch['des_tli'];?></OPTION>
<?php
}
?>
</select>
</TD>
</tr>	

<tr bgcolor="#CCCCCC" class="ewTableHeader"> 
<td width="150" height="21" align="right" class="phpmakerlist"> 
<div align="left" class="tb-head">
<font size="2" face="Arial, Helvetica, sans-serif">Motivo de liquidaci&oacute;n</font>
</div>
</td>
<TD>
<select name="motivoliq" id="motivoliq" >
<option>Seleccione motivo</option>
<OPTION value="Renuncia">Renuncia</OPTION>
<OPTION value="Despido">Despido</OPTION>
</select>
</TD>
</tr>	

<tr bgcolor="#CCCCCC" class="ewTableHeader"> 
<td width="150" height="21" align="right" class="phpmakerlist"> 
<div align="left" class="tb-head">
<font size="2" face="Arial, Helvetica, sans-serif">Cumplio Preaviso?</font>
</div>
</td>
<TD>
<select name="preaviso" id="preaviso" >
<option>Seleccione</option>
<OPTION value="Si">Si</OPTION>
<OPTION value="No">No</OPTION>
</select>
</TD>
</tr>

<tr bgcolor="#CCCCCC" class="ewTableHeader" border="0"> 
<td colspan="2" align="center" width="150" height="21" align="right" >
<input type="hidden" name="enviarr">
<input type="hidden" name="tiponom" value="<?php echo $tiponom;?>">
<input type="hidden" name="ficha" value="<?php echo $ficha;?>">
<?php btn('ok','enviar(1);',2); ?>
</td>
</tr>	
</table>
</form>
</body>
</html>
