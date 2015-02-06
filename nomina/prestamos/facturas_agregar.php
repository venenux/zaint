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

if(isset($_POST['numcuo1']))
{
	$consulta="INSERT INTO nomfacturas_cabecera SET numpre=$_POST[numpre], ficha=$_POST[ficha], fechaapro='".fecha_sql($_POST[fechaap])."', fecpricup='".fecha_sql($_POST[fecha1])."', monto=$_POST[montopre], estadopre='Pendiente', detalle='$_POST[descrip]', codigopr='$_POST[tipo]', codnom=$_SESSION[codigo_nomina], totpres=$_POST[montopre], cuotas=$_POST[numcuota], mtocuota=$_POST[montocuota]";
	if($resultado=query($consulta,$conexion))
	{
	$i=1;
	while($i<=$_POST['numcuota'])
	{
		$numcuo="numcuo".$i;
		$vence="vence".$i;
		$cad=split("/",$_POST[$vence]);
		$salini="salini".$i;
		$mtocuo="mtocuo".$i;
		$salfin="salfin".$i;
		$consulta="INSERT INTO nomfacturas_detalles SET numpre=$_POST[numpre], ficha=$_POST[ficha], numcuo='".$_POST[$numcuo]."', fechaven='".fecha_sql($_POST[$vence])."', anioven=$cad[2], mesven=$cad[1], salinicial=".$_POST[$salini].", montocuo=".$_POST[$mtocuo].", salfinal=".$_POST[$salfin].", estadopre='Pendiente', codnom=$_SESSION[codigo_nomina]";
		$resultado2=query($consulta,$conexion);
		$i+=1;
	}
	if($resultado2)
	{
		?>
		<script type="text/javascript">
		alert("FACTURA GUARDADO EXITOSAMENTE!!!")
		parent.cont.location.href="facturas_list.php"
 		</script>
		<?php	
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("FACTURA NO GUARDADO !!!")
 		</script>
		<?php	
	}
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("FACTURA NO GUARDADO !!!")
 		</script>
		<?php	
	}
}



?>

<script>
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
	contenido_division.open("GET", "facturas_calc_cuotas.php?numpre="+numpre.value+"&ficha="+ficha.value+"&montopre="+monto.value+"&montocuota="+cuota.value+"&numcuota="+numcuota.value+"&fecha1="+fecha1.value, true)
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
	AbrirVentana('buscar_tipo_facturas.php',660,700,0);
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
		
		b=parseInt(b)
		if(a==b)
		{
			b=parseInt(b)
		}
		else if(a>b)
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
<td width="100%"><strong> <font color="#000066"> Agregar FActuras </font></strong></td>
<td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><div align="right">
<?php btn('back','facturas_list.php') ?>
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
$consulta="SELECT MAX(numpre) as numpre FROM nomfacturas_cabecera";
$resultado=query($consulta,$conexion);
$fetch=fetch_array($resultado);
$numpre=$fetch['numpre']+1;
?>

<table width="100%" border="0"  id="lst"  cellspacing="0" cellpadding="0">
<tr class="tb-head"  style="font-weight : bold;"><td width="30%">Numero de factura:   <? echo $numpre;?><input type="hidden" name="numpre" id="numpre" value="<? echo $numpre;?>"></td>
<td height="26" width="30%"  >Ficha: <input type="text" name="ficha" align="right" id="ficha"  maxlength="6" size="8"/>&nbsp;
<a href="javascript:buscar_empleado();"><img src="../imagenes/search.gif" name="buscar" id="buscar" border="0"/></a> <font color="Red">&nbsp;*</font></td>
<td width="40%" >Tipo: <input type="text" name="tipo" id="tipo" align="right" maxlength="5"  size="8"/>&nbsp;
<a href="javascript:buscar_concepto();"> <img src="../imagenes/search.gif" name="buscar" id="buscar" border="0" /></a> <font color="Red">&nbsp;*</font></td>
<!--<td width="9%" >A&#241;o: <input type="text" name="anio" id="anio" align="right" maxlength="4"  size="8"/></td>-->
</tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<TR>
<TR>
<strong>Monto del Factura:</strong> <input type="text" name="montopre" align="right" id="montopre"  maxlength="8" size="10"/><font color="Red">&nbsp;*</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Cuotas a monto fijo:</strong> <input type="text" name="montocuota" align="right" id="montocuota" maxlength="8" size="10"/><font color="Red">&nbsp;*</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Número de cuotas:</strong> <input type="text" name="numcuota" align="right" onblur="javascript:cuotas();" id="numcuota" maxlength="8" size="10"/><font color="Red">&nbsp;*</font>
</TD>
</tr>
<tr><TD>&nbsp;</TD></tr>
<tr>
<td>
<strong>Descripción del FActura:</strong> <input type="text" name="descrip" align="right" id="descrip" maxlength="300" size="50"/>
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
<input name="fechaap" type="text" id="fechaap" size="8" value="<?php if ($registro_id!=0){ echo $periodo_ini; }  ?>" maxlength="60">
</font>
<input name="image2" type="image" id="d_fechaap" src="../lib/jscalendar/cal.gif" />
<script type="text/javascript">Calendar.setup({inputField:"fechaap",ifFormat:"%d/%m/%Y",button:"d_fechaap"});</script>
</a>
</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Fecha de vencimiento 1era cuota:</strong> <font size="2" face="Arial, Helvetica, sans-serif">
<font size="2" face="Arial, Helvetica, sans-serif">
<input name="fecha1" type="text" id="fecha1" size="8" value="<?php if ($registro_id!=0){ echo $periodo_ini; }  ?>" maxlength="60">
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
<strong>Monto de cuotas:</strong> &nbsp;&nbsp;&nbsp;<input type="text" name="mcuota" id="mcuota" readonly="true" size="10" style="color : #000099; font-size : 14pt; text-align : right;" value="0.0" align="left">
</TD>
<TD width="60%">
<?php btn('ok','generar_cuotas();',2,'Generar cuotas') ?>
</TD>
</tr>
</table>
</br>

<table width="100%" border="0">
<TR>
<TD>
<div id="divcuo"></div>
</TD>
</TR>
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
