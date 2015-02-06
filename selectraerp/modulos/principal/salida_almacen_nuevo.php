<?php

include("../../libs/php/clases/almacen.php");

$almacen = new Almacen();

$login = new Login();
$smarty->assign("nombre_usuario", $login->getNombreApellidoUSuario());

if (isset($_POST["input_cantidad_items"])) { // si el usuario iso post
    $kardex_almacen_instruccion = "
        INSERT INTO kardex_almacen (
        `id_transaccion`, `tipo_movimiento_almacen`, `autorizado_por`, `observacion`,
        `fecha`, `usuario_creacion`, `fecha_creacion`,
        `estado`, `fecha_ejecucion`)
        VALUES (
        NULL, '4', '" . $_POST["autorizado_por"] . "', '" . $_POST["observaciones"] . "',
        '" . $_POST["input_fechacompra"] . "', '" . $login->getUsuario() . "', CURRENT_TIMESTAMP,
        'Entregado', '" . $_POST["input_fechacompra"] . "');";

    $almacen->ExecuteTrans($kardex_almacen_instruccion);

    $id_transaccion = $almacen->getInsertID();

    for ($i = 0; $i < (int) $_POST["input_cantidad_items"]; $i++) {

        $kardex_almacen_detalle_instruccion = "
        INSERT INTO kardex_almacen_detalle (
        `id_transaccion_detalle`, `id_transaccion`, `id_almacen_entrada`, `id_almacen_salida`, `id_item`, `cantidad`)
        VALUES (
        NULL, '" . $id_transaccion . "', '', '" . $_POST["_id_almacen"][$i] . "', '" . $_POST["_id_item"][$i] . "', '" . $_POST["_cantidad"][$i] . "');";

        $almacen->ExecuteTrans($kardex_almacen_detalle_instruccion);

        $campos = $almacen->ObtenerFilasBySqlSelect("
                    select * from item_existencia_almacen
                    where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["_id_almacen"][$i] . "'");

        if (count($campos) > 0) {
            $cantidadExistente = $campos[0]["cantidad"];
            $almacen->ExecuteTrans("update item_existencia_almacen set cantidad = '" . ($cantidadExistente - $_POST["_cantidad"][$i]) . "'
                                    where id_item  = '" . $_POST["_id_item"][$i] . "' and cod_almacen = '" . $_POST["_id_almacen"][$i] . "'");
        } else {
            $instruccion = "
		INSERT INTO item_existencia_almacen(
		`cod_almacen`, `id_item`, `cantidad`)
		VALUES (
                    '" . $_POST["_id_almacen"][$i] . "', '" . $_POST["_id_item"][$i] . "', '" . $_POST["_cantidad"][$i] . "');";
            $almacen->ExecuteTrans($instruccion);
        }
    } // Fin del For

    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&opt_seccion=" . $_POST["opt_seccion"]);
    exit;
}
?>
