<?php
include("../../libs/php/clases/almacen.php");
$almacen = new Almacen();

if(isset($_POST["aceptar"])){


$instruccion = "UPDATE almacen set
`descripcion` = '".$_POST["descripcion_almacen"]."' WHERE cod_almacen = ".$_POST["cod_almacen"];
$almacen->Execute2($instruccion);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
}


if(isset($_GET["cod"])){
$campos = $almacen->ObtenerFilasBySqlSelect("select * from almacen where cod_almacen = ".$_GET["cod"]);
$smarty->assign("datos_almacen",$campos);
}

?>