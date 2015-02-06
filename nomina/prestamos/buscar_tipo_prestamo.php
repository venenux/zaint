<?php 
session_start();
ob_start();
?>
<?php 
$url="buscar_tipo_prestamo";
$modulo="Prestamos";
$tabla="nomprestamos";
$titulos=array("Codigo","Descripcion","Estatus","Fecha aplica");
$indices=array("codigopr","descrip");

//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
$conexion=conexion();
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
?>
<script type="text/javascript">
function Aceptar(variable)
{
	//opener.document.forms[0].textfield.value=variable;
	//window.opener.SumarCampoFormula();
	window.opener.document.forms[0].tipo.value=variable;
	window.close();
}

function CerrarVentana(){
	javascript:window.close();
}

</script>
<?

if(isset($_GET['cod_eliminar']))
{
	$consulta="DELETE FROM nomaumentos_det WHERE cod_aumento=$_GET[cod_eliminar]";
	$resultado=query($consulta,$conexion);
}

if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob)
	{
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob){
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"LOG_USR");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"LOG_USR");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"LOG_USR");
			break;
	}
}
else
{
	$consulta="select * from ".$tabla;
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

include ("../header.php");
?>

<link href="../estilos.css" rel="stylesheet" type="text/css" />
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">

<table width="100%" border="0" cellspacing="0" class="tb-tit" cellpadding="0">
<tr>
<td>
<div align="right">
<?php btn('cancel','CerrarVentana();',2,'Salir') ?>
</div>
</td>
</tr>
</table>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?pagina=".$pagina); ?></td>
<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
<!-- <td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td> -->
<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
<td colspan="3" width="386"></td>
</tr>
</table>
<BR>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class="tb-head" >
<?
foreach($titulos as $nombre)
{
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
<td></td>
<td></td>
</tr>
<? 
if($num_paginas!=0)
{
	$i=0; 
	while($fila=fetch_array($resultado))
	{
		$i++;
		if($i%2==0)
		{
			?>
<!-- 			<tr class="tb-fila"> -->
			<tr class="tb-fila" style="cursor:pointer" onMouseOver="ew_mouseover(this);" onMouseOut="ew_mouseout(this);"
		onClick="Aceptar('<?php echo $fila['codigopr']; ?>')">
			<?
		}
		else
		{
			?>
			<tr style="cursor:pointer" onMouseOver="ew_mouseover(this);" onMouseOut="ew_mouseout(this);"
		onClick="Aceptar('<?php echo $fila['codigopr']; ?>')">
			<?
		}
		foreach($indices as $campo)
		{
			$var=$fila[$campo];
			echo"<td>$var</td>";
		}
		?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?
		echo"</tr>";
	}
}
else
{
	echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>
</tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>