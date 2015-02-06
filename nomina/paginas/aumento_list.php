<?php 
session_start();
ob_start();
?>
<?php 
$url="aumento_list";
$modulo="Aumentos";
$tabla="nomaumentos_det";
$titulos=array("Codigo","Descripcion","Estatus","Fecha aplica");
$indices=array("cod_aumento","descripcion","estatus","fecha_aplica");

//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
$conexion=conexion();
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
?>
<script type="text/javascript">
function confirmar2(valor)
{
	if (confirm("seguro desea eliminar este registro") == true) 
		window.location.href="aumento_list.php?cod_eliminar="+valor
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
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo($modulo,"aumento_agregar.php","menu_personal.php","21");
?>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?pagina=".$pagina); ?></td>
<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
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
		$codigo=$fila['cod_aumento'];
		if($fila['estatus']=="Pendiente")
		{
			icono("aumento_agregar.php?cod_modificar=".$codigo, "Editar", "edit.gif");
			icono("javascript:confirmar2('$codigo')", "Eliminar", "delete.gif");
		}
		else
		{
			?>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?
		}
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