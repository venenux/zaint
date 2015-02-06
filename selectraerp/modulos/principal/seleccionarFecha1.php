<?php

include("../../../menu_sistemas/lib/common.php");
include("../../libs/php/clases/almacen.php");
include("../../libs/php/clases/proveedores.php");

$almacen = new Almacen();
$campos = $almacen->ObtenerFilasBySqlSelect("SELECT * FROM almacen;");
foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["cod_almacen"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("name_form", "reporte");
$smarty->assign("option_values_almacen", $arraySelectOption);
$smarty->assign("option_output_almacen", $arraySelectoutPut);

$arraySelectOption = "";
$arraySelectoutPut = "";
$provee = new Proveedores();
$campos = $provee->ObtenerFilasBySqlSelect("SELECT * FROM proveedores;");

foreach ($campos as $key => $item) {
    $arraySelectOption[] = $item["id_proveedor"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_provee", $arraySelectOption);
$smarty->assign("option_output_provee", $arraySelectoutPut);

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = {$_GET["opt_seccion"]};");
$smarty->assign("campo_seccion", $campos);

$fecha = new DateTime();
$fecha->modify('first day of this month');
$smarty->assign("fecha", $fecha->format('Y-m-d'));
?>
