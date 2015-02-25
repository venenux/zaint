<?php 
include ("header.php");
//DECLARACION DE LIBRERIAS
require_once 'lib/common.php';

$url="baremos";
$modulo="Baremos";
$tabla=$_GET['bd'];
$titulos=array("Código","Descripción","Tipo de Dato");
$indices=array("0","1","2");

//$conexion=conexion();
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob){
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"descripcion");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"descripcion");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"descripcion");
			break;
	}
}else{
$consulta="select * from ".$tabla." order by codigo";
}
$global=new bd("selectraconf");

$resultado = $global->query($consulta);
//echo $consulta." este es el valor quemuestra ";
//$num_paginas=obtener_num_paginas($consulta);
//$pagina=obtener_pagina_actual($pagina, $num_paginas);
//$resultado=paginacion($pagina, $consulta);


?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,"baremos_agregar.php","submenu_formulacion_conceptos.php");
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
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
      <td></td>
      <td></td>
	  <td></td>

    </tr>
<? 
	if($num_paginas!=0){
	$i=0; 
	while($fila=$resultado->fetch_assoc()){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila">
<?
	}else{
		echo"<tr>";
	}
	foreach($indices as $campo){
		$nom_tabla=mysql_field_name($resultado,$campo);
		
		$var=$fila[$nom_tabla];
		if($var=="Anios"){
			echo"<td>Años</td>";
		}else{
			echo"<td>$var</td>";
		}
	}
	$codigo=$fila["codigo"];
	icono("baremos_editar.php?codigo=".$codigo."&pagina=".$pagina, "Editar", "edit.gif");
	icono("baremos_eliminar.php?codigo=".$codigo."&pagina=".$pagina, "Eliminar", "delete.gif");
	icono("baremos_detalles.php?codigo=".$codigo, "Detalles del Baremo", "list.gif");

    echo"</tr>";
	}
}else{
	echo"<tr colspan=\"6\"><td>No existen registro con la busqueda especificada</td></tr>";
}

?>
  </tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>
