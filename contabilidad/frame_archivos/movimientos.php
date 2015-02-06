<?php
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");

$url="movimientos";
$modulo="activo_fijo";

$titulos1=array("Tipo","Fecha","Monto");
$indices1=array("1","2","3","4");

$codigo=@$_GET["codigo"];

$conexion = conexion();
$consulta1 = "SELECT * FROM activosfijos_movimientos WHERE CODACT='".$codigo."'";
$resultado1 = query($consulta1, $conexion);


if(num_rows($resultado1)<=0){
	echo "<tr><td>No existen registro con la busqueda especificada</td></tr>";
	exit(0);
}
?>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
   <tbody>
	 <tr class="tb-tit"><TD colspan="8" align="center"><strong>MOVIMIENTOS DEPRECIACION MENSUAL (C&oacute;digo <? echo $codigo;?>)</strong></TD><td></td></tr>
	  <tr class="tb-head">
<?
foreach($titulos1 as $nombre1){
	echo "<td><STRONG>$nombre1</STRONG></td>";
}
?>
		
    	 
	 	</tr> 
<?
	$i1=0;
	while($fila1=fetch_array($resultado1)){
   	$i1++;
	if($i1%2==0){
?>
   <tr class="tb-fila">
<?
	}else{
		echo "<tr>";
	}
	foreach($indices1 as $campo1)
	{
		$nom_tabla1=mysql_field_name($resultado1, $campo1);
		$var1 = $fila1[$nom_tabla1];
		if($nom_tabla1=="FECMOV"){
			echo "<td>".fecha($var1)."</td>";
		}elseif($nom_tabla1=="MONMOV"){
			echo "<td>".number_format($var1, 2, ',','.')."</td>";
		}else{
			echo "<td>$var1</td>";
		}
	}
	
   echo "</tr>";
	}
?>
  </tbody>
</table>



