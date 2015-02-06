<?php 
session_start();
ob_start();
?>
<?php 
$modulo="Modificacion de vacaciones";

//DECLARACION DE LIBRERIAS
include("../lib/common.php");
include("func_bd.php");

$pagina=$_GET['pagina'];
$anio=$_GET['anio'];
$ficha=$_GET['ficha'];
$cedula=$_GET['cedula'];

$url="vacaciones_mantenimiento.php?pagina=".$pagina."&anio=".$anio;
$conexion=conexion();

if(isset($_POST['opcion'])==1)
{
	$consulta="SELECT ddisfrute FROM nom_progvacaciones WHERE tipooper='DV' AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result5=query($consulta,$conexion);
	$fetch5=fetch_array($result5);

	$consulta="SELECT ddisfrute FROM nom_progvacaciones WHERE tipooper='DA' AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result6=query($consulta,$conexion);
	$fetch6=fetch_array($result6);
	
	if(($fetch5['ddisfrute']+$fetch6['ddisfrute'])==$_POST['ddisfrutados'])
		$estado='Pagado';
	else
		$estado='Pendiente';

	$result=query($consulta,$conexion);
	$consulta="UPDATE nom_progvacaciones SET fechavac='".fecha_sql($_POST['fechavac'])."', fechareivac='".fecha_sql($_POST['fechareivac'])."', dpagob=$_POST[ddisfrutados], ddisfrute=$_POST[diasvac], estado='$estado' WHERE (tipooper='DV' OR tipooper='DA') AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result=query($consulta,$conexion);
	if(isset($_POST['fechavac']))
	{
		$consulta="UPDATE nompersonal SET fechavac='".fecha_sql($_POST['fechavac'])."', fechareivac='".fecha_sql($_POST['fechareivac'])."' WHERE ficha=$_POST[ficha] AND cedula=$_POST[cedula]";
		$result33=query($consulta,$conexion);
	}

	$consulta="UPDATE nom_progvacaciones SET ddisfrute=$_POST[diasvacad], estado='$estado' WHERE tipooper='DA' AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result4=query($consulta,$conexion);

	if($_POST['bono']==1)
		$estado='Pagado';
	else
		$estado='Pendiente';
	
	$consulta="UPDATE nom_progvacaciones SET dpagob=$_POST[diasbono], estado='$estado' WHERE tipooper='DB' AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result2=query($consulta,$conexion);
	$consulta="UPDATE nom_progvacaciones SET dpagob=$_POST[diasbonoin], estado='$estado' WHERE tipooper='DI' AND periodo=$_POST[anio] AND ficha=$_POST[ficha] AND ceduda=$_POST[cedula]";
	$result3=query($consulta,$conexion);
	
	activar_pagina("vacaciones_mantenimiento.php?anio=".$_POST['anio']."&pagina=".$_POST['pagina']);
}

include ("../header.php");
?>
<FORM name="frmPrincipal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo_mejorada($modulo,'','','');
?>
<BR>


<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<?php
$consulta="SELECT * FROM nom_progvacaciones WHERE ficha=$ficha AND ceduda=$cedula AND periodo=$anio ORDER BY tipooper DESC";
$result2=query($consulta,$conexion);
$total=0;
$i=0;
while($fetch2=fetch_array($result2))
{
	$i++;
	if($i%2==0)
	{
		?><tr class="tb-fila"><?
	}
	else
	{
	?><tr><?php
	}
	
	if($fetch2['tipooper']=="DV")
	{
		$diaspag=$fetch2['dpagob'];
		$total+=$fetch2['ddisfrute'];
		?>
		<td>Fecha de salida de vacaciones: </td><td> <input size="10" type="text" name="fechavac" id="fechavac" value="<?php echo fecha($fetch2['fechavac'])?>">
		<input name="image2" type="image" id="d_fechainicio" src="lib/jscalendar/cal.gif" />
            	<script type="text/javascript">Calendar.setup({inputField:"fechavac",ifFormat:"%d/%m/%Y",button:"d_fechainicio"});</script>
            	</a>
		</td>
		<tr>
		<td>Fecha de Finalizacion: </td> <td><input size="10" type="text" name="fechareivac" id="fechareivac" value="<?php echo fecha($fetch2['fechareivac'])?>">
		<input name="image2" type="image" id="d_fechafin" src="lib/jscalendar/cal.gif" />
            	<script type="text/javascript">Calendar.setup({inputField:"fechareivac",ifFormat:"%d/%m/%Y",button:"d_fechafin"});</script>
            	</a>
		</td>
		</tr>
		<td>Dias de vacaciones: </td> <td><input size="13" type="text" name="diasvac" id="diasvac" value="<?php echo $fetch2['ddisfrute']?>"></td>
		</tr>
		<?
	}
	elseif($fetch2['tipooper']=="DA")
	{
		?>
		</tr>
		<td>Dias de vacaciones adicionales: </td> <td><input size="13" type="text" name="diasvacad" id="diasvacad" value="<?php echo $fetch2['ddisfrute']?>"></td>
		</tr>
		<?
		$total+=$fetch2['ddisfrute'];
	}
	elseif($fetch2['tipooper']=="DB")
	{
		?>
		</tr>
		<td>Dias de bono: </td> <td><input size="13" type="text" name="diasbono" id="diasbono" value="<?php echo $fetch2['dpagob']?>"></td>
		</tr>
		<?
		$estadobono=$fetch2['estado'];
	}
	elseif($fetch2['tipooper']=="DI")
	{
		?>
		</tr>
		<td>Dias de incremento de bono: </td> <td><input size="13" type="text" name="diasbonoin" id="diasbonoin" value="<?php echo $fetch2['dpagob']?>"></td>
		</tr>
		<?
		
	}
}
?>
<tr>
<td>Dias disfrutados: </td><td><input  size="13" type="text" name="ddisfrutados" id="ddisfrutados" value="<?php echo $diaspag?>"></td>
</tr>
<tr>
<td>Bono vacacional cancelado?: </td>
<td><select name="bono" id="bono">
<?
if($estadobono=='Pagado')
{
	?><option value="1">Si</option><?
}
else
{
	?>
	<option value="9">Seleccione una opcion</option>
	<option value="1">Si</option>
	<?
}
?>
<option value="0">No</option>
</select>
</td>
</tr>
<tr><td colspan="2" align="center"><strong>Total dias de vacaciones: <?echo $total;?></strong></TD></tr>
</table>
<br>
<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr align="right">
<td align="right">
<?btn('cancel',$url,0); ?>
</td>
<td align="left">
<?btn('ok','document.frmPrincipal.submit();',2); ?>
</td>
<td>
<input type="hidden" name="anio" id="anio" value="<?php echo $anio?>">
<input type="hidden" name="pagina" id="pagina" value="<?php echo $pagina?>">
<input type="hidden" name="ficha" id="ficha" value="<?php echo $ficha?>">
<input type="hidden" name="cedula" id="cedula" value="<?php echo $cedula?>">
<input type="hidden" name="opcion" id="opcion" value="1">
</td>
</tr>
</table>

</FORM>
</BODY>
</html>