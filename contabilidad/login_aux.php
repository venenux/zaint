<?php

if (!isset($_SESSION))
{ session_start();
ob_start(); 
}

include("config_bd.php"); // archivo que llama a la base de datos 

 $consulta = "SELECT * FROM cwconusu WHERE Codusu = '".utf8_encode($_POST['username'])."' AND Claveusu = '".hash("sha256",$_POST['password'])."'";

$usuario = "SELECT Nomusu FROM cwconusu WHERE Codusu = '".utf8_encode($_POST['username'])."' AND Claveusu = '".hash("sha256",$_POST['password'])."'";

$query = mysql_query($consulta, $conectar);

$matriz = mysql_query($usuario, $conectar);
$fila1= mysql_fetch_array($matriz);
$_SESSION['nombre_usuario'] = $fila1[0]; 
 
$reg = 0;

while ($fetch1 = mysql_fetch_array($query))
{
$reg++;
$_SESSION['codigo'] = $fetch1['Codusu']; 

}

if ($reg > 0)
{
	echo $consulta = "SELECT Nomemp FROM cwconemp ";
	$query = mysql_query($consulta, $conectar);
	$fetch = mysql_fetch_array($query); 
	
	$_SESSION['nombre'] = $fetch1['Nomusu']; 
	$_SESSION['empresa'] = $fetch["Nomemp"];
	$_SESSION['inicio'] = 1;
	header("Location: frame.php"); 	
}
else
{ 
	echo "<script type='text/javascript'> alert('Usuario o Clave Invalido'); </script>";
	header("Location: login.php");
}
?>
