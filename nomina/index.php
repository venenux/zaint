<?php
session_start();
ob_start();
?>
<html>
<head>
<title>Pagina Inicial</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="estilos.css" rel="StyleSheet" type="text/css">
</head>

<body bgcolor="#FFFFCC">
<?php 
$config=parse_ini_file("lib/selectra.ini");
ob_start();
ob_end_clean();
if($config['multiempresa']){
header("Location: seleccionar_empresa.php?tabla=nomempresa");
}else{
header("Location: login.php");
}
//header("Location: login.php");
exit();

if (IsLoggedIn()) {
	echo "No tiene permisos para consultar esta pagina";
}
else {
	ob_end_clean();
	
	
	if($config['multiempresa']){
	header("Location: seleccionar_empresa.php?tabla=nomempresa");
	}else{
	header("Location: login.php");
	}
	exit();
}
?>
</body>
</html>


