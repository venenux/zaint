<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?php
include ("../header.php");
include("../lib/common.php");
include ("../paginas/func_bd.php") ;
$conexion=conexion();

if(isset($_GET['cod_editar']))
{
	echo $consulta="update nomprestamos_detalles set estadopre='Cancelada', ee='1' WHERE numpre='$_GET[cod_editar]' AND numcuo='$_GET[cuota]'";
	if($resultadoCon=query($consulta,$conexion))	
	{
		
		echo "<script type='text/javascript'>";
		//alert("PRESTAMO TIENE CUOTAS CANCELADAS NO PUEDE ELIMINAR!!!")
		echo "parent.cont.location.href='prestamos_edit.php?numpre=$_GET[cod_editar]'";
 		echo "</script>";

	}
	else
	{
		?>
		<script type="text/javascript">
		alert("NO SE PUEDE CANCELAR!!!")
		//parent.cont.location.href="prestamos_edit.php?numpre=$_GET[cod_editar]"
 		</script>
		<?php	
	}
}

// if(isset($_POST['numcuo1']))
// {
// 	$consulta="INSERT INTO nomprestamos_cabecera SET numpre=$_POST[numpre], ficha=$_POST[ficha], fechaapro='".fecha_sql($_POST[fechaap])."', fecpricup='".fecha_sql($_POST[fecha1])."', monto=$_POST[montopre], estadopre='Pendiente', detalle='$_POST[descrip]', codigopr='$_POST[tipo]', codnom=$_SESSION[codigo_nomina], totpres=$_POST[montopre]";
// 	if($resultado=query($consulta,$conexion))
// 	{
// 	$i=1;
// 	while($i<=$_POST['numcuota'])
// 	{
// 		$numcuo="numcuo".$i;
// 		$vence="vence".$i;
// 		$cad=split("/",$_POST[$vence]);
// 		$salini="salini".$i;
// 		$mtocuo="mtocuo".$i;
// 		$salfin="salfin".$i;
// 		$consulta="INSERT INTO nomprestamos_detalles SET numpre=$_POST[numpre], ficha=$_POST[ficha], numcuo='".$_POST[$numcuo]."', fechaven='".fecha_sql($_POST[$vence])."', anioven=$cad[2], mesven=$cad[1], salinicial=".$_POST[$salini].", montocuo=".$_POST[$mtocuo].", salfinal=".$_POST[$salfin].", estadopre='Pendiente', codnom=$_SESSION[codigo_nomina]";
// 		$resultado2=query($consulta,$conexion);
// 		$i+=1;
// 	}
// 	if($resultado2)
// 	{
// 		?>
 		<script type="text/javascript">
// 		alert("PRESTAMO GUARDADO EXITOSAMENTE!!!")
// 		parent.cont.location.href="prestamos_list.php"
//  		</script>
 		<?php	
// 	}
// 	else
// 	{
// 		?>
 		<script type="text/javascript">
// 		alert("PRESTAMO NO GUARDADO !!!")
//  		</script>
 		<?php	
// 	}
// 	}
// 	else
// 	{
// 		?>
 		<script type="text/javascript">
// 		alert("PRESTAMO NO GUARDADO !!!")
//  		</script>
 		<?php	
// 	}
// }



?>

<script>
function confirmar2(numpre,cuota)
{
	if (confirm("Seguro desea cancelar esta cuota") == true) 
		window.location.href="prestamos_edit.php?cod_editar="+numpre+"&cuota="+cuota
}
function generar_cuotas()
{
	var numpre=document.getElementById('numpre')
	var ficha=document.getElementById('ficha')
	var monto=document.getElementById('montopre')
	var cuota=document.getElementById('montocuota')
	var numcuota=document.getElementById('numcuota')
	var fecha1=document.getElementById('fecha1')
	var division=document.getElementById('divcuo')
	if((monto.value=='')||(monto.value==0)||(cuota.value=='')||(cuota.value==0)||(numcuota.value=='')||(numcuota.value==0)||(fecha1.value=='')||(ficha.value=='')||(tipo.value==''))
	{
		alert("Complete los campos marcados con asterisco (*)")
		return
	}

	var contenido_division=abrirAjax()
	contenido_division.open("GET", "prestamos_calc_cuotas.php?numpre="+numpre.value+"&ficha="+ficha.value+"&montopre="+monto.value+"&montocuota="+cuota.value+"&numcuota="+numcuota.value+"&fecha1="+fecha1.value, true)
   	contenido_division.onreadystatechange=function() 
	{
		if (contenido_division.readyState==4)
		{
			division.parentNode.innerHTML = contenido_division.responseText;
		}
	}
	contenido_division.send(null);
	
}


function buscar_empleado()
{
	AbrirVentana('buscar_empleado.php',660,700,0);
}
function buscar_concepto()
{
	AbrirVentana('buscar_tipo_prestamo.php',660,700,0);
}

function CerrarVentana()
{
	javascript:window.close();
}
function cuotas()
{
	var monto=document.getElementById('montopre')
	var cuota=document.getElementById('montocuota')
	var numcuota=document.getElementById('numcuota')
	var resultado=0
	var mto=0
	var a=b=0
	if((cuota.value==0)||(cuota.value==''))
	{
		resultado=monto.value/numcuota.value
		resultado=resultado.toFixed(2)
		//alert(resultado)
		document.form1.montocuota.value=resultado
		document.form1.mcuota.value=resultado
	}
	else if((numcuota.value==0)||(numcuota.value==''))
	{
		resultado=monto.value/cuota.value
		mto=cuota.value/1
		//mto=mto.toFixed(2)
		//alert(resultado)
		a=resultado.toFixed(2)
		b=resultado.toFixed(0)
		if(a>b)
		{
			b=parseInt(b)+1
		}	
		document.form1.numcuota.value=b
		document.form1.mcuota.value=mto.toFixed(2)
	}
	else
		alert("Cuotas a monto fijo o el Número de cuotas debe ser cero(0) o en blanco")
	
}
/*
function Aceptar()
{
	var ficha=document.getElementById('ficha')
	var concepto=document.getElementById('concepto')
	var anio=document.getElementById('anio')
	var division=document.getElementById('acum')
	var contenido_division=abrirAjax()
	contenido_division.open("GET", "mostrar_acumulados.php?ficha="+ficha.value+"&opcion=1&concepto="+concepto.value+"&anio="+anio.value, true)
   	contenido_division.onreadystatechange=function() 
	{
		if (contenido_division.readyState==4)
		{
			division.parentNode.innerHTML = contenido_division.responseText;
		}
	}
	contenido_division.send(null);	
}*/
</script>

<script type="text/javascript" src="../tabber.js"></script>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<form action="" method="post" name="form1" id="form1">
<table width="100%" class="tb-tit">
<tr>
<td class=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="100%"><strong> <font color="#000066"> Agregar prestamo </font></strong></td>
<td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><div align="right">
<?php btn('back','prestamos_list.php') ?>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<? 

$consulta="SELECT * FROM nomprestamos_cabecera where numpre=$_GET[numpre]";
$resultado=query($consulta,$conexion);
$fetch=fetch_array($resultado);

$consulta="SELECT * FROM nomprestamos_detalles where numpre=$_GET[numpre]";
$resultado2=query($consulta,$conexion);
?>

<table width="100%" border="0"  id="lst"  cellspacing="0" cellpadding="0">
<tr class="tb-head"  style="font-weight : bold;"><td width="30%">Numero de prestamo:   <? echo $fetch[numpre];?><input type="hidden" name="numpre" id="numpre" value="<? echo $numpre;?>"></td>
<td height="26" width="30%"  >Ficha: <input type="text" name="ficha" align="right" id="ficha" value="<? echo $fetch[ficha] ?>" maxlength="6" size="8"/>&nbsp;
<a href="javascript:buscar_empleado();"><img src="../imagenes/search.gif" name="buscar" id="buscar" border="0"/></a> <font color="Red">&nbsp;*</font></td>
<td width="40%" >Tipo: <input type="text" name="tipo" id="tipo" align="right" maxlength="5" value="<? echo $fetch[codigopr]?>" size="8"/>&nbsp;
<a href="javascript:buscar_concepto();"> <img src="../imagenes/search.gif" name="buscar" id="buscar" border="0" /></a> <font color="Red">&nbsp;*</font></td>
<!--<td width="9%" >A&#241;o: <input type="text" name="anio" id="anio" align="right" maxlength="4"  size="8"/></td>-->
</tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<TR>
<TR>
<strong>Monto del prestamo:</strong> <input type="text" name="montopre" align="right" id="montopre" value="<? echo $fetch[monto]?>" maxlength="8" size="10"/><font color="Red">&nbsp;*</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Cuotas a monto fijo:</strong> <input type="text" name="montocuota" align="right" id="montocuota" maxlength="8" value="<? echo $fetch[mtocuota]?>" size="10"/><font color="Red">&nbsp;*</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Número de cuotas:</strong> <input type="text" name="numcuota" align="right" onblur="javascript:cuotas();" value="<? echo $fetch[cuotas]?>" id="numcuota" maxlength="8" size="10"/><font color="Red">&nbsp;*</font>
</TD>
</tr>
<tr><TD>&nbsp;</TD></tr>
<tr>
<td>
<strong>Descripción del prestamo:</strong> <input type="text" name="descrip" align="right" id="descrip" value="<? echo $fetch[detalle]?>" maxlength="300" size="50"/>
</td>
</TR>
<tr><TD>&nbsp;</TD></tr>
<tr>
<TD>
<strong>Frecuencia de deducción:</strong> &nbsp;&nbsp;Semanal <input type="radio" name="frededu" value="1"/>&nbsp;&nbsp;&nbsp;&nbsp;Quincenal <input type="radio" name="frededu" value="2" checked="true"/>&nbsp;&nbsp;&nbsp;&nbsp;Mensual <input type="radio" name="frededu" value="3"/>&nbsp;&nbsp;&nbsp;&nbsp;Trimestral <input type="radio" name="frededu" value="4"/>&nbsp;&nbsp;&nbsp;&nbsp;Semestral <input type="radio" name="frededu" value="5"/>&nbsp;&nbsp;&nbsp;&nbsp;Anual <input type="radio" name="frededu" value="6"/><font color="Red">&nbsp;*</font>
</TD>
</tr>

<tr><TD>&nbsp;</TD></tr>

<tr>
<TD>
<strong>Fecha de Aprobación:</strong> <font size="2" face="Arial, Helvetica, sans-serif">
<font size="2" face="Arial, Helvetica, sans-serif">
<input name="fechaap" type="text" id="fechaap" size="8" value="<?php echo fecha($fetch[fechaapro]) ?>" maxlength="60">
</font>
<input name="image2" type="image" id="d_fechaap" src="../lib/jscalendar/cal.gif" />
<script type="text/javascript">Calendar.setup({inputField:"fechaap",ifFormat:"%d/%m/%Y",button:"d_fechaap"});</script>
</a>
</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Fecha de vencimiento 1era cuota:</strong> <font size="2" face="Arial, Helvetica, sans-serif">
<font size="2" face="Arial, Helvetica, sans-serif">
<input name="fecha1" type="text" id="fecha1" size="8" value="<?php echo fecha($fetch[fecpricup])  ?>" maxlength="60">
</font>
<input name="image2" type="image" id="d_fecha1" src="../lib/jscalendar/cal.gif" /> <font color="Red">&nbsp;*</font>
<script type="text/javascript">Calendar.setup({inputField:"fecha1",ifFormat:"%d/%m/%Y",button:"d_fecha1"});</script>
</a>
</font>

</td>
</tr>
<tr>
<td>
&nbsp;
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="40%">
<strong>Monto de cuotas:</strong> &nbsp;&nbsp;&nbsp;<input type="text" name="mcuota" id="mcuota" value="<?echo $fetch[mtocuota]?>" readonly="true" size="10" style="color : #000099; font-size : 14pt; text-align : right;" value="0.0" align="left">
</TD>
<TD width="60%">
<?php btn('ok','generar_cuotas();',2,'Generar cuotas') ?>
</TD>
</tr>
</table>
</br>

<table width="100%" border="0">
<TR class="tb-head"  style="font-weight : bold;">
<TD># Cuota</TD><TD>Vence</TD><TD>Saldo inicio</TD><TD>Amortizado</TD><TD>Cuota</TD><TD>Saldo fin</TD><TD>Status</TD><TD>&nbsp;</TD><TD>&nbsp;</TD>
</TR>
<?
while($fetch2=fetch_array($resultado2))
{
?>
<tr><TD><?echo $fetch2[numcuo]?></TD><TD><? echo $fetch2[fechaven]?></TD><TD><?echo $fetch2[salinicial]?></TD><TD><?echo $fetch2[montocuo]?></TD><TD><?echo $fetch2[montocuo]?></TD><TD><?echo $fetch2[salfinal]?></TD><TD><?echo $fetch2[estadopre]?></TD>
<TD><?if($fetch2[estadopre]=='Pendiente')icono("javascript:confirmar2('$fetch[numpre]','$fetch2[numcuo]')", "Cancelar", "29.png");?></TD></tr>
<?}?>
</table>

<table width="100%"  class="tb-head">
<tr>
<td width="7%"><label></label></td>
<td width="10%">&nbsp;</td>
<td width="9%">&nbsp;</td>
<td>&nbsp;</td>
<td width="2%"></td>
<td width="2%"></td>
<td width="2%"><?php btn('ok','document.form1.submit();',2,'Enviar') ?></td>
</tr>
</table>

<table align="center" border="0">
<TR>
<TD>
<div id="acum">
</div>
</tr>
</TR>
</table>
<p>&nbsp;</p>
<p>
</p>
<p>&nbsp; </p>
</form>
</body>
</html>
