<?php 
session_start();
ob_start();
?>
<?php 

//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
include ("../header.php");

function agregar_fila(){?>

   <tr id="actual0">
		<TD ><INPUT  type="text" name="desde" id="desde" size="50"></TD>
		<TD><INPUT type="text" name="hasta" id="hasta" size="50"></TD>
		<TD><INPUT type="text" name="monto" id="resultado" size="50" onblur="javascript:guardar('0','agregar')"></TD>
		<TD colspan="3"></TD>
	</tr>

<?
}
$url="baremos";
$modulo="Baremos";
$tabla="nomtarifas";
$titulos=array("Desde","Hasta","Resultado");
$indices=array("0","1","2");

$conexion=conexion();
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
$codigo=@$_GET['codigo'];
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
$consulta="select * from ".$tabla." where codigo='".$codigo."' order by codigo";
}
//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);

$resultado=query($consulta,$conexion);


?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo("Detalles de baremos","",$url.".php");
?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina); ?></td>
	<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
	<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
	<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
	<td colspan="3" width="386"><input id="codigo" type="hidden" name="codigo" value="<?echo $codigo?>"></td>
  </tr>
</table>
<BR>
<table width="100%" id="tabla_detalles" cellspacing="0" border="0" cellpadding="1" align="center">
<TBODY id="tabla_cuerpo">
    <tr class="tb-head" >
<?
	
	$i=0;
foreach($titulos as $nombre){
	echo "<td width=\"25%\"><STRONG>$nombre</STRONG></td>";
}
?>
	<td colspan="3" width="25%"></td>

    </tr>
<? 
 if($num_paginas!=0){
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila" <?echo "id=\"actual".$i."\""?>>
<?
	}else{
		echo "<tr id=\"actual".$i."\">";
	}
	foreach($indices as $campo){
		$nom_tabla=mysql_field_name($resultado,$campo);
		
		$var=$fila[$nom_tabla];
		
			echo"<td>$var</td>";
	}
	$codigo=$fila["codigo"];
	$hasta=$fila["limite_mayor"];
	icono("javascript:agregar_despues('$i','agregar')", "Agregar despues de este registro", "add.gif");
	icono("javascript:editar('$i','$codigo','$hasta')", "Editar", "edit.gif");
	icono("javascript:eliminar('$codigo','$hasta')", "Eliminar", "delete.gif");
	
    echo"</tr>";
	}
}else{
	agregar_fila();
}
cerrar_conexion($conexion);
?>
</TBODY>
</table>

</FORM>
</BODY>
</html>
