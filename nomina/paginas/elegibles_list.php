<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/config.php';
require_once '../lib/common.php';
include ("../header.php");
include ("func_bd.php");
$conexion=conexion();

//echo $conexion;
$url="elegibles_list";
$modulo="Elegibles";
$tabla="nomelegibles";
$titulos=array("Cedula","Fecha Registro","Apellidos", "Nombres","Telefono");
$indices=array("cedula","fecha_reg","apellidos","nombres","telefono");

$conexion=conexion();
$cedula=@$_GET['cedula'];
$eliminar=@$_GET['eliminar'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
$busqueda = @$_GET['busqueda'];
if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
		$busqueda = $_POST['busqueda'];
	}
	switch($tipob){
		case "exacta":
			$consulta=buscar_exacta($tabla,$des,$busqueda);
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,$busqueda);
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,$busqueda);
			break;
	}
}else{
	//echo "cod: ".$id;
	if ($eliminar == '1') 
	{
		$var_sql="delete from ".$tabla." WHERE cedula ='".$cedula."'";
		$rs = query($var_sql,$conexion);
	}
	$consulta="select * from ".$tabla;
		//echo $consulta;
}
//echo $consulta." este es el valor que muestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,"ing_curriculum2.php","menu_elegibles.php","46");
?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<TD><SELECT name="busqueda">
       	<option value="concepto">Concepto</option>
	<option value="cod_requisicion">N&uacute;mero</option>
     	</SELECT></TD>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina);?></td>
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
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
      <td></td><td></td><td></td><td></td>
    </tr>
<? 
	if($num_paginas!=0){
	$i=0; 
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila">
<?
	}else{
		echo"<tr>";
	}
	foreach($indices as $campo){
		//$nom_tabla=mysql_field_name($resultado,$campo);
		switch($campo){
		case 'fecha_reg':
			$fecha=$fila[$campo];
			?>
			<td><?echo fecha($fecha);?></td>
			<?
		break;
		default:
			$var=$fila[$campo];
			?>
			<td><?echo $var?></td>
			<?
		break;	
		}
	}
	$id=$fila["cedula"];
	
	//iconoNuevo("elegibles_print.php?id=".$id."&cod_centro=".$cod_centro, "Imprimir Orden","ico_print.gif");
	icono("curriculum_edit.php?id=".$id."&pagina=".$pagina, "Editar Elegible", "edit.gif");
	icono("javascript:confirmar('Desea Eliminar el Registro?','".$url.".php?cedula=".$id."&pagina=".$pagina."&eliminar=1')", "Borrar Elegible", "delete.gif");
	
    echo"</tr>";
	}
}else{
	echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>
  </tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&busqueda=".$busqueda,$num_paginas);
?>
</FORM>
</BODY>
</html>