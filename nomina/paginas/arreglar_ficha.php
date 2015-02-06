<?php
include ("func_bd.php");
include ("../lib/common.php");
//$conexion = conexion ();
$consulta= "select cedula, ficha, fecing from nompersonal order by fecing ASC ";
$resultado=sql_ejecutar($consulta);
$i=1;
while ($fila = fetch_array($resultado)){
	$update = "update nompersonal set ficha=$i where cedula=$fila[cedula]";
       echo $update;
	$resultado_update=sql_ejecutar($update);
	$i++;
}
?>