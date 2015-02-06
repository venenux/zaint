<?php

include("../../libs/php/clases/proveedores.php");
include("../../libs/php/clases/correlativos.php");
include("../../../menu_sistemas/lib/common.php");

$proveedores = new Proveedores();
$correlativos = new Correlativos();

if (isset($_POST["aceptar"])) {

    $proveedores->BeginTrans();
    $nro_proveedor = $correlativos->getUltimoCorrelativo("cod_proveedor", 1, "si");

    $instruccion = "INSERT INTO `proveedores` (
                    `id_proveedor`, `cod_proveedor`, `compania`, `descripcion`,
                    `direccion`, `telefonos`, `fax`, `email`, `rif`,
                    `nit`, `estatus`, `cod_entidad`, `cod_especialidad`,
                    `cod_tipo_proveedor`, `clase_proveedor`, `fecha_creacion`,
                    `usuario_creacion`, `cuenta_contable`, `cod_impuesto_proveedor`
                    )
                    VALUES (
                    NULL , '" . $nro_proveedor . "', '" . $_POST["compania"] . "', '" . $_POST["descripcion"] . "',
                    '" . $_POST["direccion"] . "', '" . $_POST["telefonos"] . "', '" . $_POST["fax"] . "',
                    '" . $_POST["email"] . "', '" . $_POST["rif"] . "',
                    '" . $_POST["nit"] . "',  '" . $_POST["estatus"] . "', '" . $_POST["cod_entidad"] . "', '" . $_POST["cod_especialidad"] . "',
                    '" . $_POST["cod_tipo_proveedor"] . "', '" . $_POST["id_pclasif"] . "', 'CURRENT_TIMESTAMP',
                    '" . $login->getUsuario() . "', '" . $_POST["cuenta_contable"] . "', '" . $_POST["cod_impuesto_proveedor"] . "');";

    $proveedores->ExecuteTrans($instruccion);
    if ($proveedores->errorTransaccion == 1) {
        Msg::setMessage("<span style=\"color:#62875f;\">Proveedor Registrado exitosamente con en Nro. " . $nro_proveedor . "</span>");
    }
    elseif ($proveedores->errorTransaccion == 0) {
        Msg::setMessage("<span style=\"color:red;\">Error al tratar de crear el Proveedor.</span>");
    }
    $nro_producto = $correlativos->getUltimoCorrelativo("cod_proveedor", 1, "no", "");
    $proveedores->ExecuteTrans("update correlativos set contador = '" . $nro_proveedor . "' where campo = 'cod_proveedor'");
    $proveedores->CommitTrans($proveedores->errorTransaccion);
    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&opt_seccion=" . $_POST["opt_seccion"]);
    exit;
}

$smarty->assign("cod_proveedor", $correlativos->getUltimoCorrelativo("cod_proveedor", 1, "si"));

//CONSULTA DE ID FISCAL EN PARAMETROS
$valueSELECT = "";
$outputSELECT = "";
$data_parametros = $proveedores->ObtenerFilasBySqlSelect("select * from parametros_generales");
foreach ($data_parametros as $key => $item) {
    $valueSELECT[] = $item["cod_empresa"];
    $outputidfiscalSELECT[] = $item["id_fiscal"];
    $outputidfiscal2SELECT[] = $item["id_fiscal2"];
}
$smarty->assign("option_values_parametros", $valueSELECT);
$smarty->assign("option_output_idfiscal", $outputidfiscalSELECT);
$smarty->assign("option_output_idfiscal2", $outputidfiscal2SELECT);

// Cargando tipo_comercio en combo select
$campos_comunes = $proveedores->ObtenerFilasBySqlSelect("select * from tipo_comercio");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["cod_tipo_comercio"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_comercio", $arraySelectOption);
$smarty->assign("option_output_tipo_comercio", $arraySelectoutPut);

//Clasificicacion
$valueSELECT = "";
$outputSELECT = "";
$tprecio = $proveedores->ObtenerFilasBySqlSelect("select * from tipo_proveedor_clasif order by clasificacion ASC");
foreach ($tprecio as $key => $item) {
    $valueSELECT[] = $item["id_pclasif"];
    $outputSELECT[] = $item["clasificacion"];
}
$smarty->assign("option_values_clasi", $valueSELECT);
$smarty->assign("option_output_clasi", $outputSELECT);
$smarty->assign("option_selected_clasi", $datacliente[0]["id_pclasif"]);

// Cargando tipo_proveedor en combo select
$arraySelectOption = $arraySelectoutPut = "";
$campos_comunes = $proveedores->ObtenerFilasBySqlSelect("select * from tipo_proveedor");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["cod_tipo_proveedor"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_proveedor", $arraySelectOption);
$smarty->assign("option_output_tipo_proveedor", $arraySelectoutPut);

// Cargando tipo_proveedor en combo select
$arraySelectOption = $arraySelectoutPut = "";
$campos_comunes = $proveedores->ObtenerFilasBySqlSelect("select * from tipo_proveedor");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["cod_tipo_proveedor"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_proveedor", $arraySelectoutPut);
$smarty->assign("option_output_tipo_proveedor", $arraySelectoutPut);

// Cargando tipo_comercio en combo select
$arraySelectOption = $arraySelectoutPut = "";
$campos_comunes = $proveedores->ObtenerFilasBySqlSelect("select * from tipo_origen_proveedor");
foreach ($campos_comunes as $key => $item) {
    $arraySelectOption[] = $item["cod_tipo_origen_proveedor"];
    $arraySelectoutPut[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_origen_proveedor", $arraySelectOption);
$smarty->assign("option_output_tipo_origen_proveedor", $arraySelectoutPut);

//TIPO DE ENTIDAD
$valueSELECT = "";
$outputSELECT = "";
$tprecio = $proveedores->ObtenerFilasBySqlSelect("select * from entidades");
foreach ($tprecio as $key => $item) {
    $valueSELECT[] = $item["cod_entidad"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_entidad", $valueSELECT);
$smarty->assign("option_output_entidad", $outputSELECT);
$smarty->assign("option_selected_entidad", $datacliente[0]["cod_entidad"]);

//ESPECIALIDAD
$valueSELECT = "";
$outputSELECT = "";
$tprecio = $proveedores->ObtenerFilasBySqlSelect("select * from especialidades_proveedor order by especialidad ASC");
foreach ($tprecio as $key => $item) {
    $valueSELECT[] = $item["cod_especialidad"];
    $outputSELECT[] = $item["especialidad"];
}
$smarty->assign("option_values_especialidad", $valueSELECT);
$smarty->assign("option_output_especialidad", $outputSELECT);
$smarty->assign("option_selected_especialidad", $datacliente[0]["cod_especialidad"]);

// RETENCION DEL I.V.A.
$valueSELECT = "";
$outputSELECT = "";
$tprecio = $proveedores->ObtenerFilasBySqlSelect("select * from lista_impuestos where cod_tipo_impuesto = 1");
foreach ($tprecio as $key => $item) {
    $valueSELECT[] = $item["cod_impuesto"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_impuesto", $valueSELECT);
$smarty->assign("option_output_impuesto", $outputSELECT);
$smarty->assign("option_selected_impuesto", $datacliente[0]["cod_impuesto_proveedor"]);

//Cargar % I.V.A de la tabla de parametros generales.
$parametros_generales = $proveedores->ObtenerFilasBySqlSelect("select * from parametros_generales");
$smarty->assign("parametros_generales", $parametros_generales);

//Cargar Almacenes
$almacenes = $proveedores->ObtenerFilasBySqlSelect("select * from almacen");
$smarty->assign("almacenes", $almacenes);

// CONSULTA DE CUENTAS CONTABLES
$global = new bd(SELECTRA_CONF_PYME);
$sentencia = "select * from nomempresa where bd='" . $_SESSION['EmpresaFacturacion'] . "'";
$contabilidad = $global->query($sentencia);
$fila = $contabilidad->fetch_assoc();

$valueSELECT = "";
$outputSELECT = "";
$contabilidad = $proveedores->ObtenerFilasBySqlSelect("select * from " . $fila['bd_contabilidad'] . ".cwconcue where Tipo='P'");
foreach ($contabilidad as $key => $cuenta) {
    $valueSELECT[] = $cuenta["Cuenta"];
    $outputSELECT[] = $cuenta["Cuenta"] . " - " . $cuenta["Descrip"];
}
$smarty->assign("option_values_cuenta", $valueSELECT);
$smarty->assign("option_output_cuenta", $outputSELECT);
?>
