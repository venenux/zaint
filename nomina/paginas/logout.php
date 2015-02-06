<?php
session_start();
ob_start();
$config=parse_ini_file("../lib/selectra.ini");
$logout = $config['logout'];

?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php //include ("ewconfig.php") ?>
<?php include ("func_bd.php") ?>
<?php //include ("advsecu.php") ?>
<?php

if (@$_COOKIE[ewCookieAutoLogin] == "") {
	$_SESSION[] = "";
}

@session_unset();
@session_destroy();

#header("Location:../seleccionar_empresa.php?tabla=nomempresa");
header("Location:../../");
exit();

//../../selectra_prosol/login.php
?>
