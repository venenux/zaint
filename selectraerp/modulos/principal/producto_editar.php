<?php

include("../../libs/php/clases/producto.php");
include("../../../menu_sistemas/lib/common.php");

$productos = new Producto();

$campos_almacen = $productos->ObtenerFilasBySqlSelect("SELECT * FROM almacen");
$smarty->assign("campos_almacen", $campos_almacen);

$almacenes2 = $productos->ObtenerFilasBySqlSelect("SELECT descripcion, cantidad, id_item FROM almacen al RIGHT JOIN item_existencia_almacen it ON (it.cod_almacen = al.cod_almacen) WHERE it.id_item = '{$_GET["cod"]}';");

$datos_item = $productos->ObtenerFilasBySqlSelect("SELECT iva, tipo_prod FROM item WHERE id_item = '{$_GET["cod"]}';");
$smarty->assign("valor_iva", $datos_item[0]["iva"]);

if (isset($_POST["aceptar"])) {
    $_POST["iva"] = $_POST["monto_exento"] == 0 ? $_POST["iva"] : 0;
    $instruccion = "UPDATE item SET cod_item = '" . $_POST["cod_item"] . "', codigo_barras = '" . $_POST["cod_barras"] . "',
            costo_actual = '" . $_POST["costo_actual"] . "', descripcion1 = '" . $_POST["descripcion1"] . "',
            descripcion2 = '" . $_POST["descripcion2"] . "', descripcion3 = '" . $_POST["descripcion3"] . "',
            referencia = '" . $_POST["referencia"] . "', codigo_fabricante = '" . $_POST["codigo_fabricante"] . "',
            precio1 = '" . $_POST["precio_1"] . "', utilidad1 = '" . $_POST["utilidad1"] . "',
            coniva1 = '" . $_POST["coniva1"] . "', precio2 = '" . $_POST["precio_2"] . "',
            utilidad2 = '" . $_POST["utilidad2"] . "', coniva2 = '" . $_POST["coniva2"] . "',
            precio3 = '" . $_POST["precio_3"] . "', utilidad3 = '" . $_POST["utilidad3"] . "',
            coniva3 = '" . $_POST["coniva3"] . "', monto_exento = '" . $_POST["monto_exento"] . "',
            iva = '" . $_POST["iva"] . "', cod_departamento = '" . $_POST["cod_departamento"] . "',
            cod_grupo = '" . $_POST["cod_grupo"] . "', cod_linea = '" . $_POST["cod_linea"] . "',
            estatus = '" . $_POST["estatus"] . "', existencia_min = '" . $_POST["existencia_min"] . "',
            existencia_max = '" . $_POST["existencia_max"] . "', unidad_empaque = '" . $_POST["empaque"] . "',
            cantidad = '" . $_POST["unidad_empaque"] . "', seriales = '" . $_POST["serial"] . "',
            garantia = '" . $_POST["garantia"] . "', tipo_item = '" . $_POST["tipo_producto"] . "', tipo_prod = '" . $_POST["tipo"] . "',
            costo_promedio = '" . $_POST["costo_promedio"] . "', costo_anterior = '" . $_POST["costo_anterior"] . "',
            cuenta_contable1 = '" . $_POST["cuenta_contable1"] . "', cuenta_contable2 = '" . $_POST["cuenta_contable2"] . "'
        WHERE id_item = '" . $_GET["cod"] . "'";
    // Originalmente: WHERE cod_item = '" . $_POST["cod_item"] . "'";
    // Modificado para permitir edita el codigo del item.
    // echo $instruccion;exit;
    $productos->Execute2($instruccion);

    $i = 1;
    $codigo = $_POST['id' . $i];

    $query = "DELETE FROM productos_kit
    WHERE id_item_padre = (SELECT id_item FROM item WHERE cod_item = '{$_POST['cod_item']}');";

    $productos->ExecuteTrans($query);

    while ($codigo != '') {

        if ($_POST['id' . $i] != '') {
            $query = "insert into productos_kit  values ((select id_item from item where cod_item= '" . $_POST['cod_item'] . "'),'" . $_POST['item' . $i] . "','" . $_POST['cantidad' . $i] . "' );";
            $productos->ExecuteTrans($query);
        }
        $codigo = $_POST['id' . $i];
        $i++;
    }

    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&opt_seccion=" . $_POST["opt_seccion"]);
}

$campos_item = $productos->ObtenerFilasBySqlSelect("SELECT *, round(precio1 / (1 + (utilidad1/100)),2) AS p1, round(precio2 / (1 + (utilidad2/100)),2) AS p2 , round(precio3 / (1 + (utilidad3/100)),2) AS p3 FROM item WHERE id_item = {$_GET["cod"]};");
$smarty->assign("campos_item", $campos_item);

$campos_kit = $productos->ObtenerFilasBySqlSelect("SELECT * FROM productos_kit p, item i WHERE p.id_item_hijo = i.id_item AND p.id_item_padre = '{$_GET['cod']}';");

// Cargando departamentos en combo select
$campos_comunes = $productos->ObtenerFilasBySqlSelect("SELECT * FROM departamentos");
$arraySelectOption = "";
$arraySelectoutPut = "";
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["descripcion"];
    $arraySelectoutPut[] = $item["cod_departamento"];
}
$smarty->assign("option_values_departamentos", $arraySelectOption);
$smarty->assign("option_output_departamentos", $arraySelectoutPut);
$smarty->assign("option_selected_departamentos", $campos_item[0]["cod_departamento"]);

// Cargando grupo en combo select
$arraySelectOption = "";
$arraySelectoutPut = "";
$campos_comunes = $productos->ObtenerFilasBySqlSelect("SELECT * FROM grupo");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["descripcion"];
    $arraySelectoutPut[] = $item["cod_grupo"];
}
$smarty->assign("option_values_grupo", $arraySelectOption);
$smarty->assign("option_output_grupo", $arraySelectoutPut);
$smarty->assign("option_selected_grupo", $campos_item[0]["cod_grupo"]);
// Cargando Linea en combo select
$arraySelectOption = "";
$arraySelectoutPut = "";
$campos_comunes = $productos->ObtenerFilasBySqlSelect("SELECT * FROM linea");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["descripcion"];
    $arraySelectoutPut[] = $item["cod_linea"];
}
$smarty->assign("option_values_linea", $arraySelectOption);
$smarty->assign("option_output_linea", $arraySelectoutPut);
$smarty->assign("option_selected_linea", $campos_item[0]["cod_linea"]);

//Cargar % I.V.A de la tabla de parametros generales.
$parametros_generales = $productos->ObtenerFilasBySqlSelect("SELECT * FROM parametros_generales");
$smarty->assign("parametros_generales", $parametros_generales);

$camposKit = ($campos_kit[0]['id_item'] != '') ? 'checked' : '';

$campoSerial = ($campos_item[0]['seriales'] == '1') ? 'checked' : '';

$campoGarantia = ($campos_item[0]['garantia'] == '1') ? 'checked' : '';

if ($campos_item[0]['tipo_item'] == '1')
    $campoImportado = 'checked';
else
    $campoNacional = 'checked';

//Cargar Almacenes
$almacenes = $productos->ObtenerFilasBySqlSelect("SELECT * FROM almacen");
$smarty->assign("almacenes", $almacenes);

$smarty->assign("campoSerial", $campoSerial);
$smarty->assign("campoGarantia", $campoGarantia);
$smarty->assign("campoImportado", $campoImportado);
$smarty->assign("campoNacional", $campoNacional);
$smarty->assign("campos_kit", $camposKit);
$smarty->assign("almacenes2", $almacenes2);

// CONSULTA DE CUENTAS CONTABLES
$global = new bd(SELECTRA_CONF_PYME);
$sentencia = "SELECT * FROM nomempresa WHERE bd='{$_SESSION['EmpresaFacturacion']}';";
$contabilidad = $global->query($sentencia);
$fila = $contabilidad->fetch_assoc();

$valueSELECT = "";
$outputSELECT = "";
$contabilidad = $productos->ObtenerFilasBySqlSelect("SELECT * FROM {$fila['bd_contabilidad']}.cwconcue WHERE Tipo='P';");
foreach ($contabilidad as $cuenta) {
    $valueSELECT[] = $cuenta["Cuenta"];
    $outputSELECT[] = $cuenta["Cuenta"] . " - " . $cuenta["Descrip"];
}
$smarty->assign("option_values_cuenta", $valueSELECT);
$smarty->assign("option_output_cuenta", $outputSELECT);
$smarty->assign("option_selected_cuenta1", $campos_item[0]["cuenta_contable1"]);
$smarty->assign("option_selected_cuenta2", $campos_item[0]["cuenta_contable2"]);

$valueSELECT = "";
$outputSELECT = "";
#$parametros_generales = $productos->ObtenerFilasBySqlSelect("SELECT porcentaje_impuesto_principal, iva_a, iva_b, iva_c, (SELECT iva FROM item WHERE id_item = '{$_GET["cod"]}') AS iva FROM parametros_generales;");
$parametros_generales = $productos->ObtenerFilasBySqlSelect("SELECT porcentaje_impuesto_principal, iva_a, iva_b, iva_c FROM parametros_generales;");
$parametros_generales_array = array($parametros_generales[0]['porcentaje_impuesto_principal'], $parametros_generales[0]['iva_a'], $parametros_generales[0]['iva_b'], $parametros_generales[0]['iva_c']);
foreach ($parametros_generales_array as $params) {
    $outputSELECT[] = $valueSELECT[] = $params;
}
$smarty->assign("option_values_porcentaje_impuesto_principal", $valueSELECT);
$smarty->assign("option_output_porcentaje_impuesto_principal", $outputSELECT);
$smarty->assign("option_selected_porcentaje_impuesto_principal", $datos_item[0]['iva']);
#$smarty->assign("option_selected_porcentaje_impuesto_principal", $datos_item[0]["iva"]);

$valueSELECT = "";
$outputSELECT = "";
$tipo_array = array("Activo Fijo"=>0, "Consumo"=>1, "Venta"=>2, "Otro"=>3);

foreach ($tipo_array as $key => $params) {
    $outputSELECT[] = $key;
    $valueSELECT[] = $params;
}
$smarty->assign("option_values_tipo", $valueSELECT);
$smarty->assign("option_output_tipo", $outputSELECT);
$smarty->assign("option_selected_tipo", $datos_item[0]["tipo_prod"]);

?>
