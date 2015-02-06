<?php 
session_start();
ob_start();

//$opcion=$_GET['opcion'];
// echo $opcion;

require_once '../lib/config.php';
require_once '../lib/common.php';


//$conexion=conexion();
$opcion=$_GET['opcion'];
echo $opcion;

?>

	<select name="auxiliar" id="auxiliar">
	<option>Seleccione 1 un Auxiliar</option>
	<option>Seleccione 2 un Auxiliar</option>
	<option>Seleccione 3 un Auxiliar</option>
	
	</select>
