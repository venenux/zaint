<?php 
session_start();
ob_start();
?>
<?php 
$url="vacaciones_mantenimiento";
$modulo="Mantenimiento de vacaciones";
$tabla="nompersonal";
$titulos=array("Usuario","Nombre");
$indices=array("23","1");

//DECLARACION DE LIBRERIAS

include("../lib/common.php");
include("func_bd.php");

$conexion=conexion();
//$anio=$_GET['anio'];
//if(isset($_POST['anio']))
//	$anio=$_POST['anio'];
$tipob=$_GET['tipo'];
$des=$_GET['des'];
$pagina=$_GET['pagina'];
if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob)
	{
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob)
	{
		case "exacta": 
			$consulta="SELECT pe.apenom as apenom, pe.cedula as cedula, pe.ficha as ficha, pe.fecing as fecing, pe.suesal as suesal, car.des_car as cargo from nompersonal pe LEFT JOIN nomcargos car on (pe.codcargo=car.cod_car) WHERE tipnom=$_SESSION[codigo_nomina] AND (pe.ficha='$des' OR pe.cedula='$des' OR pe.apenom LIKE '%$des%')";
			break;
		case "todas":
			$consulta="SELECT pe.apenom as apenom, pe.cedula as cedula, pe.ficha as ficha, pe.fecing as fecing, pe.suesal as suesal, car.des_car as cargo from nompersonal pe LEFT JOIN nomcargos car on (pe.codcargo=car.cod_car) WHERE tipnom=$_SESSION[codigo_nomina] AND (pe.ficha='$des' OR pe.cedula='$des' OR pe.apenom LIKE '%$des%')";
			break;
		case "cualquiera":
			$consulta="SELECT pe.apenom as apenom, pe.cedula as cedula, pe.ficha as ficha, pe.fecing as fecing, pe.suesal as suesal, car.des_car as cargo from nompersonal pe LEFT JOIN nomcargos car on (pe.codcargo=car.cod_car) WHERE tipnom=$_SESSION[codigo_nomina] AND (pe.ficha='$des' OR pe.cedula='$des' OR pe.apenom LIKE '%$des%')";
			break;
	}
}
else
{
	$consulta="SELECT pe.apenom as apenom, pe.cedula as cedula, pe.ficha as ficha, pe.fecing as fecing, pe.suesal as suesal, car.des_car as cargo from nompersonal pe LEFT JOIN nomcargos car on (pe.codcargo=car.cod_car) WHERE tipnom=$_SESSION[codigo_nomina]";
	
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas2($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
if(isset($_POST['buscar']) || $tipob!=NULL)
	$resultado=query($consulta,$conexion);
else
	$resultado=paginacion2($pagina, $consulta);
$fetch=fetch_array($resultado);

include ("../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,'',"submenu_vacaciones.php","70",'../fpdf/vacaciones_nomina.php');
	//titulo_mejorada($modulo,'','../fpdf/vacaciones_nomina.php',"submenu_vacaciones.php");
?>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?anio=".$anio); ?></td>
<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
<td colspan="3" width="386"></td>
</tr>
</table>

<BR>

<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class="tb-head">
<td><strong>Ficha: <?php echo $fetch['ficha']?></strong><input type="hidden" name="anio" id="anio" value="<?php echo $anio?>"></td>
<td><strong>Cedula: <?php echo $fetch['cedula']?></strong></td>
<td><strong>Nombres: <?php echo $fetch['apenom']?></strong></td>
</tr>
<tr class="tb-head">
<td><strong>Fecha de ingreso: <?php echo fecha($fetch['fecing'])?></strong></td>
<td><strong>Sueldo mensual: <?php echo $fetch['suesal']?></strong></td>
<td><div><strong>Cargo: <?php echo $fetch['cargo']?></strong></td>
</tr>
</tbody>
</table>

<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr class="tb-fila" height=25>
<TD><strong>A&#241;o</strong></TD>
<TD><strong>Operaci&#243;n</strong></TD>
<TD><strong>D&#237;as Vac.</strong></TD>
<TD><strong>Fecha venc.</strong></TD>
<TD><strong>Fecha ini. </strong></TD>
<TD><strong>Fecha fin.</strong></TD>
<TD><strong>D&#237;as de bono</strong></TD>
<TD><strong>Mto. bono</strong></TD>
<TD><strong>Estado</strong></TD>
</tr>
<?php
$consulta="SELECT * FROM nom_progvacaciones WHERE ficha='$fetch[ficha]' AND ceduda='$fetch[cedula]' AND estado<>'Pagado' ORDER BY periodo,tipooper DESC";
$result2=query($consulta,$conexion);
$total=0;
$i=0;
$anio2=0;
while($fetch2=fetch_array($result2))
{
	$anio=$fetch2['periodo'];
	if($i==1)
		$anio2=$anio;
	if(($anio!=$anio2)&&($i!=0))
	{
		?>
		<tr><TD colspan="5">
		<?
		icono("vacaciones_mantenimiento_editar.php?pagina=".$pagina."&anio=".$anio2."&ficha=".$fetch['ficha']."&cedula=".$fetch['cedula'], "Editar", "edit.gif");
		//icono(".php?codigo=", "Imprimir", "ico_print.gif");
		?>
		</TD></tr>
		<?
		$anio2=$anio;
	}
	$anio2=$anio;
	$i++;
	if($i%2==0)
	{
		?>
    		<tr class="tb-fila">
		<?
	}
	else
	{
	?>
		<tr>
	<?php
	}
	?>
	<TD><?php echo $fetch2['periodo']?></TD>
	<TD><?php echo $fetch2['desoper']?></TD>
	<TD><?php if($fetch2['ddisfrute']!=0) echo $fetch2['ddisfrute'];?></TD>
	<TD><?php if($fetch2['fecha_venc']!=0) echo fecha($fetch2['fecha_venc'])?></TD>
	<TD><?php if($fetch2['fechavac']!=0) echo fecha($fetch2['fechavac'])?></TD>
	<TD><?php if($fetch2['fechareivac']!=0) echo fecha($fetch2['fechareivac'])?></TD>
	<TD><?php if(($fetch2['dpagob']!=0)&&($fetch2['tipooper']!="DV")) echo $fetch2['dpagob']?></TD>
	<TD><?php if(($fetch2['dpago']!=0)&&($fetch2['tipooper']=="DB")) echo $fetch2['dpago']?></TD>
	<TD><?php echo $fetch2['estado']?></TD>
	</tr>
	<?
	if($fetch2['tipooper']=="DA")
		$total+=$fetch2['ddisfrute'];
	elseif($fetch2['tipooper']=="DV")
	{
		$total+=$fetch2['ddisfrute'];
		$diasdisfrutados+=$fetch2['dpagob'];
	}
	
}
?>
</table>

<table width="100%" cellspacing="0" border="0" cellpadding="0" align="center">
<tr>
<TD align="center" colspan="9"><strong>Total dias de vacaciones: <?php echo $total;?></strong></TD>
<TD align="center" colspan="9"><strong>Total de dias disfrutados: <?php if($diasdisfrutados=='') echo $diasdisfrutados=0; else echo $diasdisfrutados;?></strong></TD>
<? icono("vacaciones_mantenimiento_editar.php?pagina=".$pagina."&anio=".$anio."&ficha=".$fetch['ficha']."&cedula=".$fetch['cedula'], "Editar", "edit.gif");?>
<? icono("../fpdf/vacaciones_persona.php?ficha=".$fetch['ficha']."&cedula=".$fetch['cedula'], "Imprimir Persona", "ico_print.gif");?>
</tr>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&anio=".$anio,$num_paginas);
?>
</FORM>
</BODY>
</html>