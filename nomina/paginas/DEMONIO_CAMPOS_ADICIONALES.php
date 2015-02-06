<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

include("../lib/common.php");
include ("func_bd.php") ;
?>


<?php 

$ficha = $_GET['ficha'];

$consulta="SELECT * FROM nomcampos_adic_personal WHERE ficha='$ficha' AND tiponom='$_SESSION[codigo_nomina]'";
$resultado3=sql_ejecutar($consulta);
if(num_rows($resultado3)!=0)
{
	
	echo "<SCRIPT type='text/javascript'>
	alert('ESTA PERSONA YA TIENE GENERADO LOS CAMPOS ADICIONALES!!')
	</SCRIPT>";
	
}	
else
{
$consulta = "SELECT id,tipo,valdefecto1 FROM nomcampos_adicionales";
$rs = sql_ejecutar($consulta);
while($fetch = fetch_array($rs))
{
	
	$consulta="insert into nomcampos_adic_personal set ficha=$ficha,id=$fetch[id],valor='$fetch[valdefecto1]',tipo='$fetch[tipo]',tiponom=$_SESSION[codigo_nomina]";
	$rs1 = sql_ejecutar($consulta);
	
}

$consulta="INSERT INTO log_transacciones VALUES ('', 'generacion de campos adicionales', '".date("Y-m-d H:i:s")."', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '$ficha', '$_SESSION[nombre]')";
$result2=sql_ejecutar($consulta);
}
header("Location: otrosdatos_integrantes.php?txtficha=".$ficha);

?>
