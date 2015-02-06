<?php
include("../../libs/php/clases/almacen.php");
$almacen = new Almacen();
if(isset($_POST["aceptar"])){


$instruccion = "
INSERT INTO grupo (
`cod_grupo` ,
`descripcion`
)
VALUES (
NULL , '".$_POST["descripcion_grupo"]."'
);
";
$almacen->Execute2($instruccion);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
}


?>