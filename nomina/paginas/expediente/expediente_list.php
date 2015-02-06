<?php 
session_start();
ob_start();
?>
<?php 
$url="expediente_list";
$modulo="Expediente";
$tabla="nomexpediente";
$titulos=array("Codigo","Tipo","Descripcion","Fecha");
$indices=array("cod_expediente_det","tipo_registro","descripcion","fecha");

//DECLARACION DE LIBRERIAS
require_once '../../lib/common.php';

$conexion=conexion();
$cedula=$_GET['cedula'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
?>
<script type="text/javascript">
function confirmar2(valor,cedula)
{
	if (confirm("seguro desea eliminar este registro") == true) 
		window.location.href="expediente_list.php?cod_eliminar="+valor+"&cedula="+cedula
}

</script>
<link href="../../estilos.css" rel="stylesheet" type="text/css" />
<?

if(isset($_GET['cod_eliminar']))
{
	$consulta="DELETE FROM nomexpediente WHERE cod_expediente_det=$_GET[cod_eliminar] AND cedula=$_GET[cedula]";
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
			$consulta=buscar_exacta($tabla,$des,"tipo_registro");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"tipo_registro");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"tipo_registro");
			break;
	}
}
else
{
	$consulta="select * from ".$tabla." WHERE cedula=$cedula ";
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

include ("../../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo($modulo,"expediente_agregar.php?cedula=$cedula","../maestro_personal.php","21");
?>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?cedula=".$cedula,0); ?></td>
<td width="120"><input onclick="javascript:actualizar(this);"  type="radio" name="palabra" value="exacta">Palabra exacta</td>
<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
<td width="150"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
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
			<tr class="tb-fila">
			<?
		}
		else
		{
			echo"<tr>";
		}
		foreach($indices as $campo)
		{
			$var=$fila[$campo];
			echo"<td>$var</td>";
		}
		$cedula=$fila['cedula'];
		$codigo=$fila['cod_expediente_det'];
		icono("expediente_agregar.php?cedula=".$cedula."&codigo=".$codigo, "Editar", "edit.gif");
		icono("javascript:confirmar2('$codigo','$cedula')", "Eliminar", "delete.gif");
	
		echo "</tr>";
	}
}
else
{
	echo "<tr><td>No existen registro con la busqueda especificada</td></tr>";
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