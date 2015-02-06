<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

?>
<?

require_once '../lib/common.php';

$conexion=conexion();
$codigo=$_GET['codigo'];

$desde=$_GET['desde'];

$hasta=$_GET['hasta'];

$monto=$_GET['resultado'];

$accion=$_GET['accion'];
switch($accion){
	case "consultar":
		$consulta="SELECT * FROM nomtarifas WHERE codigo='".$codigo."' and limite_mayor='".$hasta."'";
		$resultado=query($consulta,$conexion);
		$fila=fetch_array($resultado);
		
		echo $fila['limite_menor']."-".$fila['limite_mayor']."-".$fila['monto'];
		break;
	case "agregar":
		$consulta="SELECT * FROM nomtarifas WHERE codigo='".$codigo."' and limite_mayor='".$hasta."'";
		$resultado=query($consulta,$conexion);
		if(num_rows($resultado)>0){
			echo "1";
		
		}else{
			$consulta="insert into nomtarifas (limite_menor,limite_mayor,monto,codigo) values ('".$desde."','".$hasta."','".$monto."','".$codigo."')";
			$resultado=query($consulta,$conexion);
			echo "0";
		}
		break;
	case "editar":

		$hastaviejo=$_GET['hastaviejo'];
		$consulta="update nomtarifas set limite_menor='".$desde."', limite_mayor='".$hasta."',monto='".$monto."' where codigo='".$codigo."' and limite_mayor='".$hastaviejo."'";
		$resultado=query($consulta,$conexion);
		echo "0";
		break;
	case "eliminar":
		$consulta="delete from nomtarifas where codigo='".$codigo."' and limite_mayor='".$hasta."'";
		$resultado=query($consulta,$conexion);
		echo "0";
		break;
}
?>
