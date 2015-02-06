<?php

include("../../libs/php/clases/banco.php");

$banco = new Banco();

if (isset($_POST["aceptar"])) {
    if ($_POST["tipo_facturacion"] != "1") {
        $_POST["impresora_marca"] = $_POST["impresora_modelo"] = $_POST["impresora_serial"] = "";
    }

    $img_izq = ""; //$_FILES['img_izq']['name'];
    if ($_FILES['img_izq']['error'] == UPLOAD_ERR_OK) {
        $uploadfile = "../../../includes/imagenes/" . basename($_FILES["img_izq"]["name"]);
        /* $_FILES["img_izq"]["name"];
          $_FILES["img_izq"]["type"];
          $_FILES["img_izq"]["tmp_name"];
          $_FILES["img_izq"]["size"]; */
        if (copy($_FILES['img_izq']['tmp_name'], $uploadfile)) {
            chmod($uploadfile, 0777);
        }
        $img_izq = basename($_FILES["img_izq"]["name"]);
    }
    $instruccion = "UPDATE parametros_generales SET
        nombre_empresa = '{$_POST["nombre_empresa"]}',
        direccion = '{$_POST["direccion"]}',
        telefonos = '{$_POST["telefonos"]}',
        id_fiscal = '{$_POST["id_fiscal"]}',
        rif = '{$_POST["rif"]}',
        id_fiscal2 = '{$_POST["id_fiscal2"]}',
        nit = '{$_POST["nit"]}',
        ciudad = '{$_POST["ciudad"]}',
        moneda_base = '{$_POST["moneda_base"]}',
        moneda = '{$_POST["moneda"]}',
        titulo_precio1 = '{$_POST["titulo_precio1"]}',
        titulo_precio2 = '{$_POST["titulo_precio2"]}',
        titulo_precio3 = '{$_POST["titulo_precio3"]}',
        precio_menor = '{$_POST["precio_menor"]}',
        unidad_tributaria = '{$_POST["unidad_tributaria"]}',
        nombre_impuesto_principal = '{$_POST["nombre_impuesto_principal"]}',
        porcentaje_impuesto_principal = '{$_POST["porcentaje_impuesto_principal"]}',
        iva_a = '{$_POST["iva_a"]}', iva_b = '{$_POST["iva_b"]}', iva_c = '{$_POST["iva_c"]}',
        string_clasificador_inventario1 = '{$_POST["string_clasificador_inventario1"]}',
        string_clasificador_inventario2 = '{$_POST["string_clasificador_inventario2"]}',
        string_clasificador_inventario3 = '{$_POST["string_clasificador_inventario3"]}',
        tipo_facturacion = '{$_POST["tipo_facturacion"]}',
        impresora_marca = '{$_POST["impresora_marca"]}',
        impresora_modelo = '{$_POST["impresora_modelo"]}',
        impresora_serial = '{$_POST["impresora_serial"]}',
        servicio_fk = '{$_POST["serv"]}'";
    $instruccion .= $img_izq != "" ? ", img_izq = '{$img_izq}', img_der = '{$img_izq}' " : ", img_izq = img_izq, img_der = img_der ";
    $instruccion .= "WHERE cod_empresa = '{$_POST["cod_empresa"]}';";

    $parametrosgenerales->Execute2($instruccion);
    $parametrosgenerales->TriggerActualizarStrintTipoPrecio($_POST["titulo_precio1"], codTipoPrecio1);
    $parametrosgenerales->TriggerActualizarStrintTipoPrecio($_POST["titulo_precio2"], codTipoPrecio2);
    $parametrosgenerales->TriggerActualizarStrintTipoPrecio($_POST["titulo_precio3"], codTipoPrecio3);

    #$fp = fopen($_FILES['img_izq']['tmp_name'], "rb");
    #$contenido = fread($fp, $_FILES['img_izq']['size']);
    #$contenido = addslashes($contenido);
    #fclose($fp);
    #$parametrosgenerales->Execute2("insert into archivos values(NULL,'{$_FILES['img_izq']['name']}','imagen_x','{$contenido}','{$_FILES['img_izq']['type']}')");

    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&msg=¡Modificacion exitosa!");
}
$campos2 = $banco->ObtenerFilasBySqlSelect("SELECT * FROM divisas, parametros_generales WHERE id_divisa = moneda_base;");
$monedaActual = "<option value='" . $campos2[0]['moneda_base'] . "'> " . $campos2[0]['Nombre'] . "</option>";

$divisas = $banco->ObtenerFilasBySqlSelect("SELECT * FROM divisas;");
$smarty->assign("monedaActual", $monedaActual);
$smarty->assign("divisas", $divisas);

$servicios = $banco->ObtenerFilasBySqlSelect("SELECT * FROM item WHERE cod_item_forma = 2;");
$valueSELECT = "";
$outputSELECT = "";
foreach ($servicios as $serv) {
    $valueSELECT[] = $serv["id_item"];
    $outputSELECT[] = $serv["descripcion1"];
}
$smarty->assign("option_values_servicio", $valueSELECT);
$smarty->assign("option_output_servicio", $outputSELECT);
$smarty->assign("option_selected_servicio", $campos2[0]['servicio_fk']);

$params = $banco->ObtenerFilasBySqlSelect("SELECT precio_menor, tipo_facturacion FROM parametros_generales;");
$values = array("1", "2", "3");
$outputs = array("Precio 1", "Precio 2", "Precio 3");

$valueSELECT = "";
$outputSELECT = "";
foreach ($values as $vals) {
    $valueSELECT[] = $vals;
}
foreach ($outputs as $vals) {
    $outputSELECT[] = $vals;
}
$smarty->assign("option_values_precio", $valueSELECT);
$smarty->assign("option_output_precio", $outputSELECT);
$smarty->assign("option_selected_precio", $params[0]['precio_menor']);

$values = array("0", "1", "2");
$outputs = array("Sistema (PDF)", "Impresora Fiscal", "Formato Libre");

$valueSELECT = "";
$outputSELECT = "";
foreach ($values as $vals) {
    $valueSELECT[] = $vals;
}
foreach ($outputs as $vals) {
    $outputSELECT[] = $vals;
}
$smarty->assign("option_values_facturacion", $valueSELECT);
$smarty->assign("option_output_facturacion", $outputSELECT);
$smarty->assign("option_selected_facturacion", $params[0]['tipo_facturacion']);

$smarty->assign("name_form", "parametros_generales");

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = {$_GET["opt_seccion"]};");
$smarty->assign("campo_seccion", $campos);
?>
