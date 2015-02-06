<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';



$conexion=conexion();
$consulta="SELECT * FROM varcon591";
$resultado_var=query($consulta,$conexion);

while($fila_var=fetch_array($resultado_var))
{
	echo "<br>".$consulta="update nomcampos_adic_personal set valor='SI' where id=32 and ficha='$fila_var[ficha]'";
	$resultado=query($consulta,$conexion);

}
