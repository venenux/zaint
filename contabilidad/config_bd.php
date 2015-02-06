<?php

if (!isset($_SESSION)) {
    session_start();
    ob_start();
}

include('../generalp.config.inc.php');
$host = DB_HOST;
$usuario = DB_USUARIO; //Aqui se coloca el nombre de usuario
$contrasena = DB_CLAVE; //Aqui se coloca el password
$conectar = mysql_connect($host, $usuario, $contrasena); //Aqui se pasan datos conexion bd
mysql_select_db($_SESSION['EmpresaContabilidad'], $conectar); //Aqui se conecta la bd
?>
