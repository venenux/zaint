<?php

include("../../libs/php/clases/DevolucionFactura.php");
include("../../libs/php/clases/correlativos.php");
include("../../libs/php/clases/clientes.php");
include("../../libs/php/clases/factura.php");
include("../../libs/php/clases/almacen.php");
include("../../libs/php/clases/spooler/SpoolerConfDB.php");
include("txt.php");

$parametros = new ParametrosGenerales();
$factura_devolucion = new DevolucionFactura();
$correlativos = new Correlativos();
$clientes = new Clientes();
$factura = new Factura();
$almacen = new Almacen();
$obj_txt = new txt();

$consulta = "
SELECT * FROM factura f inner join factura_detalle_formapago fdet_formapago on
 fdet_formapago.id_factura = f.id_factura inner join clientes c on
 c.id_cliente = f.id_cliente
 where f.cod_factura = '" . $_GET["codigo"] . "'";
#echo $_GET["codigo"];exit;

$dataDevolucion = $factura_devolucion->ObtenerFilasBySqlSelect($consulta);

/* $consulta = "select * from factura_detalle fdet
  inner join item i on i.id_item = fdet.id_item
  where  fdet.id_factura = '" . $dataDevolucion[0]["id_factura"] . "'"; */
$consulta = "SELECT * FROM factura_detalle fdet
  inner join factura_detalle_formapago fdet_formapago on
  fdet_formapago.id_factura = fdet.id_factura inner join item i on i.id_item = fdet.id_item
  where  fdet.id_factura = '" . $dataDevolucion[0]["id_factura"] . "'";

$dataDetalleFactura = $factura_devolucion->ObtenerFilasBySqlSelect($consulta);

$smarty->assign("dataDetalleFactura", $dataDetalleFactura);

$parametros_generales = $parametros->ObtenerFilasBySqlSelect("SELECT tipo_facturacion, impresora_serial, nombre_impuesto_principal FROM parametros_generales;");

#$smarty->assign("cabecera",array("Seleccion","Codigo","Descripcion","Cantidad","Precio","Descuento","%","Total Sin IVA","I.V.A","Total con I.V.A"));
$smarty->assign("cabecera", array("C&oacute;digo", "Descripci&oacute;n", "Cantidad", "Precio", "Descuento", "%", "Total Neto", $parametros_generales[0]["nombre_impuesto_principal"], "Monto Total"));
$smarty->assign("dataDevolucion", $dataDevolucion);

$campos = $menu->ObtenerFilasBySqlSelect("SELECT * FROM modulos WHERE cod_modulo = {$_GET["opt_seccion"]};");
$smarty->assign("campo_seccion", $campos);

$smarty->assign("name_form", "devolucion_venta");

if (isset($_POST["anularFactura"])) {
    // si el usuario hizo post
    $factura_devolucion->BeginTrans();
    $factura->BeginTrans();
    $cod_estatus = "3";

    # obtenemos el correlativo de la devolucion
    $nro_devolucion = $correlativos->getUltimoCorrelativo("cod_devolucion", 0, "si");
    $formateo_nro_devolucion = $nro_devolucion;

    $consulta_devolucion = "
        INSERT INTO factura_devolucion (`cod_devolucion`,`cod_factura`,`fecha_devolucion`)
            VALUES('" . $nro_devolucion . "','" . $_GET['codigo'] . "',CURRENT_TIMESTAMP);";
    $factura_devolucion->ExecuteTrans($consulta_devolucion);
    $id_facturaTrans = $factura_devolucion->getInsertID();
    $factura->ExecuteTrans("UPDATE factura SET cod_estatus = '3' WHERE cod_factura = " . $_GET['codigo']);

    # Se cambia el status del pedido que se anulará en consecuencia
    $hayPedido = $factura->ObtenerFilasBySqlSelect("SELECT * FROM pedido WHERE id_factura = {$dataDevolucion[0]["id_factura"]};");
    if ($hayPedido) {
        $factura->ExecuteTrans("UPDATE pedido SET cod_estatus = '3' WHERE id_factura = " . $dataDevolucion[0]["id_factura"]);
    }

    #echo "nro. devol: ".$nro_devolucion."/".$detalles." id cliente: ".$_POST["id_cliente"];exit;
    //Eliminar datos de factura_detalle
    #$SQLfactura_detalle = "delete from factura_detalle where id_factura = '" . $dataDevolucion[0]["id_factura"] . "'";
    #$factura_devolucion->ExecuteTrans($SQLfactura_detalle);
    //Eliminar datos de factura_detalle_formapago
    #$SQLfactura_detalle_formapago = "delete from factura_detalle_formapago where id_factura = '" . $dataDevolucion[0]["id_factura"] . "'";
    #$factura_devolucion->ExecuteTrans($SQLfactura_detalle_formapago);
    //Eliminar datos de factura_impuestos
    #$SQLfactura_impuestos = "delete from factura_impuestos where id_factura = '" . $dataDevolucion[0]["id_factura"] . "'";
    #$factura_devolucion->ExecuteTrans($SQLfactura_impuestos);
    //Eliminar datos de cxc_edocuenta
    #$SQLcxc_edocuenta = "delete from cxc_edocuenta where numero = '" . $dataDevolucion[0]["cod_factura"] . "'";
    #$factura_devolucion->ExecuteTrans($SQLcxc_edocuenta);
    #echo "id: ".$dataDevolucion[0]["id_factura"]." cod: ".$dataDevolucion[0]["cod_factura"];exit;
    //Eliminar datos de cxc_edocuenta_detalle
    //$SQLcxc_edocuenta_detalle =  "delete from cxc_edocuenta_detalle  where numero = '".$dataDevolucion[0]["cod_factura"]."'";
    // $factura_devolucion->ExecuteTrans($SQLcxc_edocuenta_detalle);
    //Eliminar datos de cxc_edocuenta_formapago
    //$SQLcxc_edocuenta_formapago =  "delete from cxc_edocuenta_formapago  where numero = '".$dataDevolucion[0]["cod_factura"]."'";
    //$factura_devolucion->ExecuteTrans($SQLcxc_edocuenta_formapago);
    //Eliminar datos de tabla_impuestos
    #$SQLtabla_impuestos = "delete from tabla_impuestos where id_documento = '" . $dataDevolucion[0]["id_factura"] . "'";
    #$factura_devolucion->ExecuteTrans($SQLtabla_impuestos);
    /*
      $kardex_almacen_instruccion = "
      INSERT INTO kardex_almacen (
      `id_transaccion`, `tipo_movimiento_almacen`, `autorizado_por`, `observacion`,
      `fecha`, `usuario_creacion`, `fecha_creacion`, `estado`, `fecha_ejecucion`)
      VALUES (
      NULL, '2', '" . $login->getUsuario() . "', 'Entrada por Devolución', '"
      . $_POST["input_fechaFactura"] . "', '" . $login->getUsuario() . "', CURRENT_TIMESTAMP, '"
      . $_POST["estado_entrega"] . "', '" . $_POST["input_fechaFactura"] . "');";
     */
    $kardex_almacen_instruccion = "
		INSERT INTO kardex_almacen (
			`id_transaccion`, `tipo_movimiento_almacen`, `autorizado_por`, `observacion`,
			`fecha`, `usuario_creacion`, `fecha_creacion`, `estado`, `fecha_ejecucion`)
		VALUES (
			NULL, '3', '" . $login->getUsuario() . "', 'Entrada por Anulación de Factura', CURRENT_TIMESTAMP,
                        '" . $login->getUsuario() . "', CURRENT_TIMESTAMP, 'Entregado', CURRENT_TIMESTAMP);";
    $almacen->ExecuteTrans($kardex_almacen_instruccion);
    $id_transaccion = $almacen->getInsertID();

    $cantItems = $factura_devolucion->getFilas();

    for ($i = 0; $i < $cantItems; $i++) {

        $descrip_producto = strlen($dataDetalleFactura[$i]["_item_descripcion"]) < 39 ? str_pad($dataDetalleFactura[$i]["_item_descripcion"], 39) : substr($dataDetalleFactura[$i]["_item_descripcion"], 0, 39); #$descrip_producto = str_pad($dataDetalleFactura[$i]["_item_descripcion"], 39);
        $item = $factura->ObtenerFilasBySqlSelect("SELECT cod_item, descripcion2 FROM item WHERE id_item = " . $dataDetalleFactura[$i]["id_item"]/* $_POST["_item_codigo"][$i] */);
        $codigo_item = $item[0]['cod_item'];
        $cantidad = number_format($dataDetalleFactura[$i]["_item_cantidad"], 2, ",", "");
        $precio = number_format($dataDetalleFactura[$i]["_item_preciosiniva"], 2, ",", "");
        $iva = number_format($dataDetalleFactura[$i]["_item_piva"], 2, ",", "");

        $espacios = 30 - (strlen($codigo_item) + strlen($cantidad));
        for ($j = 0; $j < $espacios; $j++) {
            $codigo_item .= " ";
        }
        #$codigo_item = str_pad($item[0]['cod_item'], $espacios);
        $linea_producto.=$descrip_producto . " " . $codigo_item . $cantidad . str_pad($precio, 12, ' ', STR_PAD_LEFT) . str_pad($iva, 7, ' ', STR_PAD_LEFT) . "\n";
        #$descrip_producto = $factura->ObtenerFilasBySqlSelect("SELECT descripcion2 FROM item WHERE id_item=" . $_POST["_item_codigo"][$i]);
        if ($item[0]['descripcion2'] != "") {# antes $descrip_producto[0]['descripcion2']
            $linea_producto.=$item[0]['descripcion2'] . "\n"; # antes $descrip_producto[0]['descripcion2']
        }

        #fwrite($archivo_spooler, $linea_producto);

        $kardex_almacen_detalle_instruccion = "
            INSERT INTO kardex_almacen_detalle (
                `id_transaccion_detalle` , `id_transaccion` , `id_almacen_entrada` ,
                `id_almacen_salida` , `id_item` , `cantidad`)
            VALUES (
                NULL , '" . $id_transaccion . "', '" . $dataDetalleFactura[$i]["_item_almacen"] . "','" . $dataDetalleFactura[$i]["_item_almacen"] . "',
                '" . $dataDetalleFactura[$i]["id_item"] . "','" . $dataDetalleFactura[$i]["_item_cantidad"] . "');";
        /* $_POST[""][$i] *//* $_POST[""][$i] *//* $_POST[""][$i] */
        $almacen->ExecuteTrans($kardex_almacen_detalle_instruccion);

        #if ($_POST["estado_entrega"] == 'Entregado') {
        $campos = $factura_devolucion->ObtenerFilasBySqlSelect("
                        select * from item_existencia_almacen
                                where
                        id_item  = '" . $dataDetalleFactura[$i]["id_item"] . "' and
                        cod_almacen = '" . $dataDetalleFactura[$i]["_item_almacen"] . "'");
#$_POST["_item_codigo"][$i] $_POST[""][$i]
        $cantidadExistente = $campos[0]["cantidad"];

        #if (!$hayPedido) {
        $factura_devolucion->ExecuteTrans("update item_existencia_almacen set cantidad = '" . ($cantidadExistente + $dataDetalleFactura[$i]["_item_cantidad"]) . "'
        where id_item  = '" . $dataDetalleFactura[$i]["id_item"] . "' and cod_almacen = '" . $dataDetalleFactura[$i]["_item_almacen"] . "'");
        #$_POST[""][$i]  $_POST["_item_codigo"][$i]  $_POST[""][$i]
        #}
        //$factura_devolucion->ExecuteTrans("delete from item_precompromiso where cod_item_precompromiso = '" . $_POST["_cod_item_precompromiso"][$i] . "'");
        #}
    }

    // Si el tipo de facturación es Fiscal
    if ($parametros_generales[0]['tipo_facturacion'] == 1) {
        /*
         * Comenzar a crear el archivo para el spooler:
         * Directorio para guardar el archivo
         */

        #$directorio = "spooler/"; # directorio de prueba para ver el archivo generado antes de que sea accedido por la impresora fiscal
        $directorio = "C:\FACTURAS\\"; # directorio de produccion en Windows

        $nombre_archivo_spooler = "Selectra.001";
        $ruta = $directorio . $nombre_archivo_spooler;
        $archivo_spooler = fopen($ruta, "w");
        chmod($directorio, 0777);
        chmod($ruta, 0777);

        $datos_cliente = $factura->ObtenerFilasBySqlSelect("SELECT nombre, direccion, telefonos, rif FROM clientes WHERE id_cliente = {$_POST["id_cliente"]};");

        $detalles.="DEVOLUCION: " . str_pad($nro_devolucion, 8, "0", STR_PAD_LEFT) . "\n";
        $detalles.="CLIENTE:    " . str_pad($datos_cliente[0]['nombre'], 35) . "\n";
        $detalles.="DIRECCION1: " . str_pad($datos_cliente[0]['direccion'], 35) . "\n";
        $detalles.="DIRECCION2:\n";
        $detalles.="TELEFONO:   " . $datos_cliente[0]['telefonos'] . "\n";
        $detalles.="RIF/CI:     " . $datos_cliente[0]['rif'] . "\n";
        $detalles.="DESCRIPCION                             CODIGO                    CANT      PRECIO    IVA\n";

        fwrite($archivo_spooler, $detalles);

        #fwrite($archivo_spooler, $linea_producto);

        /* $descuento = number_format(($dataDevolucion[0]["totalizar_pdescuento_global"] > 0 ? $dataDevolucion[0]["totalizar_pdescuento_global"] : 0), 2, ",", "");
          $neto = number_format($dataDevolucion[0]["totalizar_base_imponible"], 2, ",", "");
          $cancelado = number_format($dataDevolucion[0]["totalizar_monto_cancelar"], 2, ",", "");
          $efectivo = number_format($dataDevolucion[0]["totalizar_monto_efectivo"], 2, ",", "");
          $cheque = number_format($dataDevolucion[0]["totalizar_monto_cheque"], 2, ",", "");
          $tarjeta = number_format($dataDevolucion[0]["totalizar_monto_tarjeta"], 2, ",", "");
          $credito = number_format($dataDevolucion[0]["input_totalizar_saldo_pendiente"], 2, ",", "");

          $linea_producto.=str_pad("DESCUENTO:", abs(strlen("DESCUENTO:") + strlen($descuento) - 29)) . "{$descuento} %\n";
          $linea_producto.=str_pad("TOTAL NETO:", abs(strlen("TOTAL NETO:") + strlen($neto) - 29)) . "{$neto}\n";
          $linea_producto.=str_pad("TOTAL CANCELADO:", abs(strlen("TOTAL CANCELADO:") + strlen($cancelado) - 29)) . "{$cancelado}\n";
          $linea_producto.=str_pad("EFECTIVO:", abs(strlen("EFECTIVO:") + strlen($efectivo) - 29)) . "{$efectivo}\n";
          $linea_producto.=str_pad("CHEQUES:", abs(strlen("CHEQUES:") + strlen($cheque) - 29)) . "{$cheque}\n";
          $linea_producto.=str_pad("TARJETA:", abs(strlen("TARJETA:") + strlen($tarjeta) - 29)) . "{$tarjeta}\n";
          $linea_producto.=str_pad("CREDITO:", abs(strlen("CREDITO:") + strlen($credito) - 29)) . "{$credito}\n"; */
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("DESCUENTO:", number_format(($dataDevolucion[0]["totalizar_pdescuento_global"] > 0 ? $dataDevolucion[0]["totalizar_pdescuento_global"] : 0), 2, ",", "")) . " %\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("TOTAL NETO:", number_format($dataDevolucion[0]["totalizar_base_imponible"], 2, ",", "")) . "\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("TOTAL CANCELADO:", number_format($dataDevolucion[0]["totalizar_monto_cancelar"], 2, ",", "")) . "\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("EFECTIVO:", number_format($dataDevolucion[0]["totalizar_monto_efectivo"], 2, ",", "")) . "\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("CHEQUES:", number_format($dataDevolucion[0]["totalizar_monto_cheque"], 2, ",", "")) . "\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("TARJETA:", number_format($dataDevolucion[0]["totalizar_monto_tarjeta"], 2, ",", "")) . "\n";
        $linea_producto.=$obj_txt->formatearLineasDetallesPago("CREDITO:", number_format($dataDevolucion[0]["input_totalizar_saldo_pendiente"], 2, ",", "")) . "\n";
        #$linea_producto.="USUARIOS:         " . $login->getUsuario() . "\n";
        $linea_producto.="COMENTARIO1:      NO SE ACEPTAN DEVOLUCIONES DESPUES DE 24 HORAS \n";
        #$linea_producto.="COMENTARIO2:      <ESCRIBA ALGO AQUI>\n";
        #$linea_producto.="COMENTARIO2:      <ESCRIBA ALGO AQUI>\n";
        $linea_producto.="DATOS PARA LAS  \"D E V O L U C I O N E S\"\n";
        $linea_producto.="FACTDEVOL:        " . $dataDevolucion[0]['cod_factura'] . "\n";
        $linea_producto.="FECHADEVOL:       " . date("d/m/Y") . "\n";
        $linea_producto.="HORADEVOL:        " . date("h:i:s") . "\n";
        $linea_producto.="SERIALIMP:        " . $parametros_generales[0]['impresora_serial'] . "\n";
        $linea_producto.="COO-BEMATECH:     000123\n";

        fwrite($archivo_spooler, $linea_producto);
        fclose($archivo_spooler);

        # En este punto comienza el parseo de la BD (DBF) del Spooler Fiscal
        # para obtener los datos fiscales de la factura y almacenarlos en la tabla
        # factura de la BD de Selectra.
        # Esperar un tiempo prudencial para que el Spooler registre la factura en su DB (BDF)
        #sleep($seconds = 10);
        $dbf = new SpoolerConfDB();
        $dbf->setDirDBF(); #$dirdbf = "/home/asys/Descargas/DBF_R14/"
        #$factura_fiscal = $dbf->obtenerUltimoRegistroDBF();
        #$factura->ExecuteTrans("UPDATE factura SET cod_factura_fiscal = '" . $factura_fiscal[1] . "' WHERE cod_factura = '" . $factura_fiscal[0] . "'");
        $factura->ExecuteTrans($sql = "UPDATE factura_devolucion SET cod_devolucion_fiscal = '{$factura_fiscal['NUMDOC']}', nroz = '{$factura_fiscal['NROZ']}', impresora_serial = '{$factura_fiscal['IMPSERIAL']}' WHERE id_devolucion = '{$id_facturaTrans}';");
        #fwrite($archivo_spooler, $sql);#Puse esto para probar q la consulta anterior era correcta
        #fclose($archivo_spooler);
    }
    $nro_devolucionOLD = $correlativos->getUltimoCorrelativo("cod_devolucion", 1, "no");
    $nro_devolucion = $correlativos->getUltimoCorrelativo("cod_devolucion", 1, "no");
    $factura_devolucion->ExecuteTrans("update correlativos set contador = '" . $nro_devolucion . "' where campo = 'cod_devolucion'");
    $nro_devolucion -= 1;
    if ($factura_devolucion->errorTransaccion == 1) {
        Msg::setMessage("<span style=\"color:#62875f;\"><img src=\"../../libs/imagenes/ico_ok.gif\"> Factura Devuelta Exitosamente con el <b>Nro. " . $formateo_nro_devolucion . "</b></span>");
    }
    if ($factura_devolucion->errorTransaccion == 0) {
        Msg::setMessage("<span style=\"color:red;\">Error al devolver la factura.</span>");
    }
    $factura_devolucion->CommitTrans($factura->errorTransaccion);
    header("Location: ?opt_menu=" . $_POST["opt_menu"] . "&opt_seccion=" . $_POST["opt_seccion"]);
    exit;
}

if (!isset($_GET["codigo"])) {
    header("Location: ?opt_menu=" . $_GET["opt_menu"] . "&opt_seccion=" . $_GET["opt_seccion"]);
    exit;
}
?>