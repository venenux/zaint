<?php

include("../../libs/php/clases/almacen.php");

$almacen = new Almacen();


if (isset($_POST["input_cantidad_items"])) { // si el usuario iso post
    $kardex_almacen_instruccion = "
INSERT INTO kardex_almacen (
`id_transaccion` ,
`tipo_movimiento_almacen` ,
`autorizado_por` ,
`observacion` ,
`fecha` ,
`usuario_creacion`,
`fecha_creacion`
)
VALUES (
NULL ,
'5',
'" . $_POST["autorizado_por"] . "',
'" . $_POST["observaciones"] . "',
'" . $_POST["input_fechacompra"] . "',
'" . $login->getUsuario() . "',
CURRENT_TIMESTAMP
);";

    $almacen->ExecuteTrans($kardex_almacen_instruccion);

    $id_transaccion = $almacen->getInsertID();

    for ($i = 0; $i < (int) $_POST["input_cantidad_items"]; $i++) {

        $kardex_almacen_detalle_instruccion = "
    INSERT INTO kardex_almacen_detalle (
    `id_transaccion_detalle` ,
    `id_transaccion` ,
    `id_almacen_entrada` ,
    `id_almacen_salida` ,
    `id_item` ,
    `cantidad`
    )
    VALUES (
    NULL ,
    '" . $id_transaccion . "',
    '" . $_POST["almacen_entrada"] . "',
    '" . $_POST["_id_almacen"][$i] . "',
    '" . $_POST["_id_item"][$i] . "',
    '" . $_POST["_cantidad"][$i] . "'
    );";

        $almacen->ExecuteTrans($kardex_almacen_detalle_instruccion);

        //Registro de salidas de almacen.
        $campos = $almacen->ObtenerFilasBySqlSelect("
                        select * from item_existencia_almacen
                                where
                        id_item  = '" . $_POST["_id_item"][$i] . "' and
                        cod_almacen = '" . $_POST["_id_almacen"][$i] . "'");
        #echo "select * from item_existencia_almacen where id_item  = '".$_POST["_id_item"][$i]."' and cod_almacen = '".$_POST["_id_almacen"][$i]."'<br>";
        if (count($campos) > 0) {
            $cantidadExistente = $campos[0]["cantidad"];
            #echo "update item_existencia_almacen set cantidad = '" . ($cantidadExistente - $_POST["_cantidad"][$i]) . "' where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["_id_almacen"][$i] . "'<br>";
            $almacen->ExecuteTrans("update item_existencia_almacen set cantidad = '" . ($cantidadExistente - $_POST["_cantidad"][$i]) . "'
                        where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["_id_almacen"][$i] . "'");
        } else {
            
        }

        //Entrada de Items en almacen seleccionado...

        $campos = $almacen->ObtenerFilasBySqlSelect("
                        select * from item_existencia_almacen
                                where
                        id_item  = '" . $_POST["_id_item"][$i] . "' and
                        cod_almacen = '" . $_POST["almacen_entrada"][$i] . "'");

        #echo "select * from item_existencia_almacen where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["almacen_entrada"][$i] . "'<br>";
        if (count($campos) > 0) {
            $cantidadExistente = $campos[0]["cantidad"];
            #echo "update item_existencia_almacen set cantidad = '" . ($cantidadExistente - $_POST["_cantidad"][$i]) . "' where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["almacen_entrada"] . "'<br>";
            $almacen->ExecuteTrans("update item_existencia_almacen set cantidad = '" . ($cantidadExistente - $_POST["_cantidad"][$i]) . "'
                where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["almacen_entrada"] . "'");
        } else {
            /*echo $instruccion = "
                    INSERT INTO item_existencia_almacen(
                    `cod_almacen` ,
                    `id_item` ,
                    `cantidad`
                    )
                    VALUES (
                        '" . $_POST["almacen_entrada"] . "',
                        '" . $_POST["_id_item"][$i] . "',
                        '" . $_POST["_cantidad"][$i] . "'
                    );<br>";*/
            $almacen->ExecuteTrans($instruccion);
        }
    } // Fin del For 
    exit(0);
    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&opt_seccion=" . $_POST["opt_seccion"]);
}

$datos_almacen = $almacen->ObtenerFilasBySqlSelect("select * from almacen");
$valueSELECT = "";
$outputSELECT = "";
foreach ($datos_almacen as $key => $item) {
    $valueSELECT[] = $item["cod_almacen"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_almacen", $valueSELECT);
$smarty->assign("option_output_almacen", $outputSELECT);
?>
