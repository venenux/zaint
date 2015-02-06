<?php 
session_start();
ob_start();
?>
<?php 
$url="facturas_list";
$modulo="Facturas";
$tabla="nomfacturas_cabecera";
$titulos=array("Numero","Ficha","Nombre","Monto","Tipo","Estado");
$indices=array("numpre","ficha","apenom","monto","codigopr","estadopre");

//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
include ("../paginas/funciones_nomina.php");

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
		window.location.href="facturas_list.php?cod_eliminar="+valor+"&cedula="+cedula
}

</script>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?

if(isset($_GET['cod_eliminar']))
{
	$consulta="SELECT * FROM nomfacturas_detalles WHERE numpre=$_GET[cod_eliminar] AND estadopre='Cancelada'";
	$resultadoCon=query($consulta,$conexion);
	if($fetchCon=fetch_array($resultadoCon,$conexion))
	{
		?>
		<script type="text/javascript">
		alert("FACTURA TIENE CUOTAS CANCELADAS NO PUEDE ELIMINAR!!!")
		parent.cont.location.href="facturas_list.php"
 		</script>
		<?php	
	}
	else
	{
		$consulta="DELETE FROM nomfacturas_cabecera WHERE numpre=$_GET[cod_eliminar]";
		$resultado=query($consulta,$conexion);
		
		$consulta="DELETE FROM nomfacturas_detalles WHERE numpre=$_GET[cod_eliminar]";
		$resultado=query($consulta,$conexion);
	}
}

if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob)
	{
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob){
		case "cualquiera": 
			$consulta="select * from $tabla as pre, nompersonal as pe where pre.ficha=pe.ficha and (pre.ficha='$des' OR detalle LIKE '%$des%' OR estadopre LIKE '%$des%' OR pe.apenom LIKE '%$des%')";
			break;

	}
}
else
{
	$consulta="select * from ".$tabla." as pre, nompersonal as pe where pre.ficha=pe.ficha and pre.codnom=".$_SESSION['codigo_nomina'];
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

include ("../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo($modulo,"facturas_agregar.php?cedula=$cedula","menu_prestamos.php","21");
?>
<table class="tb-head" width="100%">
<tr>
<td><input type="text" name="buscar" size="20"></td>
<td><? btn('search',$url,1); ?></td>
<td><? btn('show_all',$url.".php?cedula=".$cedula,0); ?></td>
<td ><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
<td colspan="3" width="686"></td>
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
		$codigo=$fila['numpre'];
		
		icono("facturas_edit.php?numpre=".$codigo, "Editar", "edit.gif");
		icono("javascript:confirmar2('$codigo')", "Eliminar", "delete.gif");
	
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