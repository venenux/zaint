<?php

require_once 'lib/common.php';
include ("header.php");
$conexion=conexion();
//echo $conexion;

$pag = $_GET['pagina'];

$url="activo_fijo";
$modulo="Activos Fijos";
$tabla="activosfijos";
$titulos=array("C&oacute;digo","Tipo","Centro de Costo","Descripci&oacute;n","Serial 1","Serial 2","Serial 3","Depreciable","Fecha de Compra","Fecha Inicio Depreciaci&oacute;n","Costo Compra","Vida Util (A&ntilde;os)","Valor Residual","Depreciaci&oacute;n Mensual","Depreciaci&oacute;n Acumulada","Estado Activo Fijo");
$indices=array("0","1","23","3","20","21","22","4","7","10","6","9","12","13","14","18","15","16","19");

if(isset($_POST['aceptar'])) 
{
	
	$consulta="select * from ".$tabla;
	$resultado = query($consulta,$conexion);
		
	$cadena="";
		foreach($indices as $valor)
		{
			$campo=mysql_field_name($resultado,$valor);
			if($cadena=="")
			{
				if(($campo == "FECCOMPRA") || ($campo == "FECINIDPR"))
				{
					$_POST[$campo] = fecha_sql($_POST[$campo]);				
				}
				$cadena=$cadena.$campo."='".$_POST[$campo]."'";
			}
			else
			{
				if(($campo == "FECCOMPRA") || ($campo == "FECINIDPR"))
				{
					$_POST[$campo] = fecha_sql($_POST[$campo]);
				}
				$cadena=$cadena.",".$campo."='".$_POST[$campo]."'";
			}
		}


	$consulta="update ".$tabla." set ".$cadena." where CODACT = '".$_POST["CODACT"]."'";
	$resultado33333=query($consulta,$conexion);
	//echo $consulta;
	//exit(0);
	//cerrar_conexion($conexion);
	$val=$_POST['codigo'];
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	location.href='".$url.".php?pagina=".$pag."'
	</SCRIPT>";
	
}else{
	$consulta="select * from ".$tabla;
	$resultado=query($consulta,$conexion);
	
}
?>
<html class="fondo">
<head>
  <title></title>
  <link href="../estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno,pag){
	location.href= retorno+".php?pagina="+pag
}

function cargar_cuentas()
{
	var cod = document.getElementById('TIPO') 	
	var cuentas = document.getElementById('cuentas')
	var contenido_cuentas=abrirAjax()
	
	contenido_cuentas.open("GET", "proceso.php?tipo="+cod.value, true)
   	contenido_cuentas.onreadystatechange=function() 
	{
		if (contenido_cuentas.readyState==4)
		{
			cuentas.parentNode.innerHTML = contenido_cuentas.responseText;
		}
	}
	contenido_cuentas.send(null);
}

function act_dpr()
{
	var anos = document.getElementById('VIDAUTIL')
	var costo = document.getElementById('COSTOCOMPRA')
	var resi = document.getElementById('VALRESI')
	var meses = (anos.value*12)
	var dpr = (costo.value - resi.value)/meses
	//alert(meses)
	window.document.sampleform.DPRMENSUAL.value = dpr.toFixed(2)
	var meses2 = calc_meses_acum()
	var dpracum = dpr * meses2
	
	if(meses2 >= meses)
	{
		dpracum = costo.value - resi.value
		window.document.sampleform.DPRACUM.value = dpracum.toFixed(2)
		window.document.sampleform.ESTADOAF.value = "Depreciado"
		window.document.sampleform.ESTADOAF = "Depreciado"
	}
	else
	{
		window.document.sampleform.DPRACUM.value = dpracum.toFixed(2)
		window.document.sampleform.ESTADOAF.value = "Activo"
		window.document.sampleform.ESTADOAF = "Activo"
	}
}

function verificar_fechas()
{
	var fecha = document.getElementById('FECCOMPRA')
	var fechad = document.getElementById('FECINIDPR')
	var fecha2 = fecha.value
	var fecha3 = fechad.value
	
    var array_fecha = fecha2.split("/")
	var array_fecha2 = fecha3.split("/")

    if (array_fecha.length!=3)
       return "La fecha introducida es incorrecta"

    var ano = array_fecha[2]
    if (isNaN(ano))
       return "El año es incorrecto"

    var mes = array_fecha[1]
    if (isNaN(mes))
       return "El mes es incorrecto"
	
    if (ano<=99)
	{
       ano +=1900
	}
	
	if (array_fecha2.length!=3)
       return "La fecha introducida es incorrecta"

    var ano2 = array_fecha2[2]
    if (isNaN(ano2))
       return "El año es incorrecto"

    var mes2 = array_fecha2[1]
    if (isNaN(mes2))
       return "El mes es incorrecto"
	
    if (ano2<=99){
       ano2 +=1900
		
	 }
	
	if((ano2 == ano) && (mes2 < mes))
	{
		alert ("LA FECHA DE INICIO DE DEPRECIACION ES INCORRECTA, POR FAVOR VERIFIQUE!!")
		return
	}
}

function calc_meses_acum()
{
	var fecha = document.getElementById('FECCOMPRA')
	var fechad = document.getElementById('FECINIDPR')
	var fecha2 = fecha.value
	var fecha3 = fechad.value
	
    var array_fecha = fecha2.split("/")
	var array_fecha2 = fecha3.split("/")

    if (array_fecha.length!=3)
       return "La fecha introducida es incorrecta"

    var ano = array_fecha[2]
    if (isNaN(ano))
       return "El año es incorrecto"

    var mes = array_fecha[1]
    if (isNaN(mes))
       return "El mes es incorrecto"
	
    if (ano<=99)
	{
       ano +=1900
	}
	
	if (array_fecha2.length!=3)
       return "La fecha introducida es incorrecta"

    var ano2 = array_fecha2[2]
    if (isNaN(ano2))
       return "El año es incorrecto"

    var mes2 = array_fecha2[1]
    if (isNaN(mes2))
       return "El mes es incorrecto"
	
    if (ano2<=99){
       ano2 +=1900
		
	}
	
    var mesess = (ano2 - ano) * 12 //-1 porque no se si ha cumplido años ya este año 
	var meses= mes2 - mes
	mesess = mesess + meses
	
	return mesess
} 


</SCRIPT>
</head>
<body>
<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">



<TABLE  width="100%" height="100">
<TBODY>

<tr>
      <td colspan="4" height="30" class="tb-tit"><strong>Editar Registro de <? echo $modulo?></strong></td>
    </tr>
<?
	$cod = $_GET['id'];

	$consulta="select * from ".$tabla." WHERE CODACT = '".$cod."'";
	$resultado=query($consulta,$conexion);
	$fetch = fetch_array($resultado); 
	
	$consulta = "SELECT CODIGOTA,DESCRIP FROM activosfijos_tipos";
	$resultado333 = query($consulta,$conexion);
		
	$consulta = "SELECT CODIGOTA,DESCRIP FROM activosfijos_tipos WHERE CODIGOTA = '".$fetch['TIPO']."'";
	$resultado33 = query($consulta,$conexion);
	$fetch66 = fetch_array($resultado33);
	
	$consulta = "SELECT * FROM cwconcco";
	$resultado444 = query($consulta,$conexion);

	$consulta = "SELECT * FROM cwconcco WHERE CODCCOS = '".$fetch['CODCCOS']."'";
	$resultado44 = query($consulta,$conexion);
	$fetch44 = fetch_array($resultado44);
	

	$consulta="select Cuenta, Descrip from cwconcue where Tipo='P'";
	$resultado_cuenta=query($consulta,$conexion);
	$resultado_cuenta1=query($consulta,$conexion);
	$resultado_cuenta2=query($consulta,$conexion);
	
	$consulta="select Descrip from cwconcue WHERE Cuenta = '".$fetch['CTAREAL']."'";
	$result_ctareal = query($consulta,$conexion);
	$fetch_ctareal = fetch_array($result_ctareal);
	
	$consulta="select Descrip from cwconcue WHERE Cuenta = '".$fetch['CTAGASTOS']."'";
	$result_ctagas = query($consulta,$conexion);
	$fetch_ctagas = fetch_array($result_ctagas);
	
	$consulta="select Descrip from cwconcue WHERE Cuenta = '".$fetch['CTADPRACUM']."'";
	$result_ctadpr = query($consulta,$conexion);
	$fetch_ctadpr = fetch_array($result_ctadpr);

?>



	<?
	
	$i=0;
	$cont=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
		
		if($i == 0)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" readonly=\"true\" name=\"$campo\" value=\"$cod\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
			
		
		}
		elseif($indices[$i] == 1)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\" onchange=\"javascript:cargar_cuentas()\" >";
			echo "<option value=\"$fetch[TIPO]\">$fetch66[DESCRIP]</option>";
            while($fetch333 = fetch_array($resultado333))
			{
				echo "<option value=\"$fetch333[CODIGOTA]\">$fetch333[DESCRIP]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 4)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			?><option value=<? echo $fetch['SEDEPRECIA']; ?>><? if ($fetch['SEDEPRECIA'] == "SI")echo "Depreciable"; else echo "No Depreciable"; ?> </option><?
            echo "<option value=SI>Depreciable</option>";
			echo "<option value=NO>No Depreciable</option>";
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 7)
		{
			echo "<TR>";?><TD class="tb-head"><? echo "$nombre</TD>";
			echo "<TD colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" id=\"$campo\" size=\"15\" maxlength=\"12\" value=\"".fecha($fetch[$campo])."\">&nbsp;<input name=\"c_fecha\" type=\"image\" id=\"c_fecha\" src=\"lib/jscalendar/cal.gif\">";
			?>
			<script type="text/javascript">Calendar.setup({inputField:"FECCOMPRA",ifFormat:"%d/%m/%Y",button:"c_fecha"});</script></TD>
			</TR><?
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 10)
		{
			echo "<TR>";?><TD class="tb-head"><? echo "$nombre</TD>";
			echo "<TD colspan=\"3\"><INPUT type=\"text\" onchange=\"javascript:verificar_fechas()\" name=\"$campo\" id=\"$campo\" size=\"15\" maxlength=\"12\" value=\"".fecha($fetch[$campo])."\">&nbsp;<input name=\"d_fecha\" type=\"image\" id=\"d_fecha\" src=\"lib/jscalendar/cal.gif\">";
			?>
			<script type="text/javascript">Calendar.setup({inputField:"FECINIDPR",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></TD>
			</TR><?
			$i++;
			$cont++;
		}
		
		elseif($indices[$i] == 18)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
            echo "<option value=$fetch[ESTADOAF]>$fetch[ESTADOAF]</option>";
			echo "<option value=Activo>Activo</option>";
			echo "<option value=Inactivo>Inactivo</option>";
			echo "<option value=Depreciado>Depreciado</option>";
			echo "<option value=Perdido>Perdido</option>";
			echo "<option value=Vendido>Vendido</option>";
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 23)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"$fetch[CODCCOS]\">$fetch44[Descrip]</option>";
            while($fetch444 = fetch_array($resultado444))
			{
				echo "<option value=\"$fetch444[Codccos]\">$fetch444[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 12)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" id=\"$campo\" value='$fetch[$campo]' onBlur=\"javascript:act_dpr()\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($indices[$i] == 9)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" id=\"$campo\" value='$fetch[$campo]' onBlur=\"javascript:act_dpr()\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
		}
		else
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" id=\"$campo\" value='$fetch[$campo]' size=\"80\"></td> </tr>";
			$i++;
			$cont++;
		}
		
		
	}
	?>
	
	</tbody>
	</table>
	
	<TABLE  width="100%" >
	<TBODY id="cuentas">
	
	
	
	<TR><td class=tb-head width="263" >Cuenta Real del Activo</td>
	<td colspan="3"><SELECT name="CTAREAL"  id="CTAREAL">
	<option value="<? echo $fetch['CTAREAL']?>"><? echo $fetch_ctareal['Descrip'];?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta))
	{
		?><option value="<? echo $fetch33['Cuenta']; ?>"><? echo $fetch33['Descrip']; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>	
	
	
	<TR><td class=tb-head >Cuenta Gastos de Depreciaci&oacute;n</td>
	<td colspan="3"><SELECT name="CTAGASTOS" id="CTAGASTOS">
	<option value="<? echo $fetch['CTAGASTOS']?>"><? echo $fetch_ctagas['Descrip'];?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta1))
	{
		?><option value="<? echo $fetch33['Cuenta']; ?>"><? echo $fetch33['Descrip']; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>	
	
	
	<TR><td class=tb-head >Cuenta Depreciaci&oacute;n Acumulada</td>
	<td colspan="3"><SELECT name="CTADPRACUM" id="CTADPRACUM">
	<option value="<? echo $fetch['CTADPRACUM']?>"><? echo $fetch_ctadpr['Descrip'];?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta2))
	{
		?><option value="<? echo $fetch33['Cuenta']; ?>"><? echo $fetch33['Descrip']; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>
	
	</tbody>
	</table>
	
	<TABLE  width="100%" >
	<TBODY>
	
    <tr class="tb-tit">
      
      <td colspan="4" align="right"><INPUT type="submit" name="aceptar" value="Aceptar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<? echo $url?>','<? echo $pag?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);
?>