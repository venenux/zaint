<?php
include("../../libs/php/clases/almacen.php");
$almacen = new Almacen();
if(isset($_POST["aceptar"])){


$instruccion = "
INSERT INTO `almacen` (
`cod_almacen` ,
`descripcion`
)
VALUES (
NULL , '".$_POST["descripcion_almacen"]."'
);
";
$almacen->Execute2($instruccion);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
}


?>
