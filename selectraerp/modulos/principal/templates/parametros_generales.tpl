<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        {include file="snippets/header_form.tpl"}
        <link type="text/css" href="../../../includes/js/jquery-ui-1.10.0/css/redmond/jquery-ui-1.10.0.custom.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-ui-1.10.0.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css"/>
        <script type="text/javascript" src="../../libs/js/parametros_generales_tabs.js"></script>
        <script type="text/javascript" src="../../libs/js/ajax.js"></script>
        {literal}
            <script type="text/javascript">//<![CDATA[
                $(document).ready(function() {
                    $("input[name='cancelar']").button();//Coloca estilo JQuery
                    $("input[name='aceptar']").button().click(function() {
                        /*var tipo = document.getElementById("tipo_facturacion");
                        if (tipo.options[tipo.selectedIndex].value === "1") {*/
                        if ($('input:radio[name="tipo_facturacion"]:checked').val()==="1") {
                            if ($("#impresora_modelo").val() === "" || $("#impresora_marca").val() === "" || $("#impresora_serial").val() === "") {
                                Ext.Msg.alert("Alerta", "Proporcione Datos de Impresora Fiscal");
                                return false;//Evita que el formulario sea enviado
                            }
                        }
                    });
                    $("#tipofacturacion").buttonset();
                    $("#error_impresora_modelo").hide();
                    $("#impresora_modelo").blur(function() {
                        if ($("#impresora_modelo").val() === "") {
                            $("#error_impresora_modelo").show();
                            $("#error_impresora_modelo").focus();
                            return false;
                        }
                    });
                    $("#porcentaje_impuesto_principal, #iva_a,#iva_b,#iva_c,#porcentaje_impuesto2, #porcentaje_impuesto3, #pprovee_sobr_impu_princ, #pclient_sobr_impu_princ").numeric();
                    $(".validadDecimales").blur(function() {
                        $(this).val(($(this).val() != '' && $(this).val() != '.' && $(this).val() != '0') ? parseFloat($(this).val()) : "0.00");
                    });
                    $("#nombre_impuesto_principal").blur(function() {
                        $(".vstring_nombre_impuesto_principal").html($(this).val());
                    });
                    $("#string_impuesto2").blur(function() {
                        $("#vstring_porcentaje_impuesto2").html($(this).val());
                    });
                    $("#string_impuesto3").blur(function() {
                        $("#vstring_porcentaje_impuesto3").html($(this).val());
                    });
                });
                //]]>
            </script>
        {/literal}
    </head>
    <body>
        <form id="form-{$name_form}" name="form-{$name_form}" action="" method="post" enctype="multipart/form-data">
            <div id="datosGral">
                {include file = "snippets/regresar_boton.tpl"}
                <input type="hidden" name="cod_empresa" value="{$DatosGenerales[0].cod_empresa}"/>
                <input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}"/>
                <input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}"/>
                <div id="contenedorTAB">
                    <!-- TAB1 -->
                    <div id="div_tab1" class="x-hide-display">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th colspan="3" class="tb-head" style="text-align:center;">
                                        COMPLETE LOS CAMPOS MARCADOS CON&nbsp;** OBLIGATORIAMENTE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre Empresa
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="nombre_empresa" id="nombre_empresa" value="{$DatosGenerales[0].nombre_empresa}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Direcci&oacute;n
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <textarea id="direccion" name="direccion" class="form-text" style="width:300px;">{$DatosGenerales[0].direccion}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Ciudad
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" id="ciudad" name="ciudad" value="{$DatosGenerales[0].ciudad}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Tel&eacute;fonos
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="telefonos" id="telefonos" value="{$DatosGenerales[0].telefonos}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre de ID Fiscal 1
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" value="{$DatosGenerales[0].id_fiscal}" name="id_fiscal" id="id_fiscal" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        N&uacute;mero de ID Fiscal 1
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" id="rif" value="{$DatosGenerales[0].rif}" name="rif" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre de ID Fiscal 2
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" value="{$DatosGenerales[0].id_fiscal2}" id="id_fiscal2" name="id_fiscal2" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        N&uacute;mero de ID Fiscal 2
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].nit}" type="text" name="nit" id="nit" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Logo Reportes
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="file" name="img_izq" id="img_izq" class="form-text" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Logo Reportes
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="file" name="img_der" id="img_der" class="form-text"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- TAB2 -->
                    <div id="div_tab2" class="x-hide-display">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="3" class="tb-head" style="text-align:center;">
                                        T&Iacute;TULOS DE PRECIOS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="label">
                                        Precio 1
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" value="{$DatosGenerales[0].titulo_precio1}" name="titulo_precio1" id="titulo_precio1" placeholder="Descripci&oacute;n Precio 1" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Precio 2
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].titulo_precio2}" type="text" id="titulo_precio2" name="titulo_precio2" placeholder="Descripci&oacute;n Precio 2" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Precio 3
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].titulo_precio3}" type="text" id="titulo_precio3" name="titulo_precio3" placeholder="Descripci&oacute;n Precio 3" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Indique Cu&aacute;l es el Precio Menor
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <select name="precio_menor" id="precio_menor" class="form-text">
                                            {html_options values=$option_values_precio selected=$option_selected_precio output=$option_output_precio}
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Unidad Tributaria (UT)
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].unidad_tributaria}" type="text" id="unidad_tributaria" name="unidad_tributaria" placeholder="Valor UT"  class="form-text"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Impuesto
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].nombre_impuesto_principal}" type="text" id="nombre_impuesto_principal" name="nombre_impuesto_principal" placeholder="Descripci&oacute;n (Siglas)" class="form-text"/>
                                        <input value="{$DatosGenerales[0].porcentaje_impuesto_principal}" type="text" id="porcentaje_impuesto_principal" name="porcentaje_impuesto_principal" size="10" placeholder="Valor 1" class="form-text"/>
                                        <input value="{$DatosGenerales[0].iva_a}" type="text" id="iva_a" name="iva_a" size="10" placeholder="Valor 2" class="form-text"/>
                                        <input value="{$DatosGenerales[0].iva_b}" type="text" id="iva_b" name="iva_b" size="10" placeholder="Valor 3" class="form-text"/>
                                        <input value="{$DatosGenerales[0].iva_c}" type="text" id="iva_c" name="iva_c" size="10" placeholder="Valor 4" class="form-text"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Tipo de Facturaci&oacute;n
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <!--select name="tipo_facturacion" id="tipo_facturacion" class="form-text">
                                        {*html_options values=$option_values_facturacion selected=$option_selected_facturacion output=$option_output_facturacion*}
                                        </select-->
                                        <div id="tipofacturacion">
                                            <input type="radio" id="radio1" name="tipo_facturacion" value="0" {if $option_selected_facturacion eq 0}checked{/if} /><label for="radio1">Sistema (PDF)</label>
                                            <input type="radio" id="radio2" name="tipo_facturacion" value="1" {if $option_selected_facturacion eq 1}checked{/if} /><label for="radio2">Impresora Fiscal</label>
                                            <input type="radio" id="radio3" name="tipo_facturacion" value="2" {if $option_selected_facturacion eq 2}checked{/if} /><label for="radio3">Formato Libre</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre Moneda Base
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <select name='moneda_base' onchange="cargarUrl('buscarAbreviatura.php?miId=' + this.value, 'trasparente');" class="form-text">
                                            {$monedaActual}
                                            {foreach from =$divisas key=i item=miItem}
                                                <option value="{$miItem.id_divisa}">
                                                    {$miItem.Nombre}
                                                </option>
                                            {/foreach}
                                        </select>
                                        <a href='?opt_menu=1&amp;opt_seccion=104&amp;agregarMoneda=si' style='color:blue'> Editar Monedas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        S&iacute;mbolo Moneda Base
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input value="{$DatosGenerales[0].moneda}" type="text" readonly name="moneda" id="moneda" size="9" style="background:#dddddd" class="form-text"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- TAB3 -->
                    <div id="div_tab3" class="x-hide-display">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="3" class="tb-head">
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre de Categor&iacute;a 1 de Inventario
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="string_clasificador_inventario1" id="string_clasificador_inventario1" value="{$DatosGenerales[0].string_clasificador_inventario1}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre de Categor&iacute;a 2 de Inventario
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="string_clasificador_inventario2" id="string_clasificador_inventario2" value="{$DatosGenerales[0].string_clasificador_inventario2}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Nombre de Categor&iacute;a 3 de Inventario
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="string_clasificador_inventario3" id="string_clasificador_inventario3" value="{$DatosGenerales[0].string_clasificador_inventario3}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /TAB3 -->
                    <!-- TAB4 -->
                    <div id="div_tab4" class="x-hide-display">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="3" class="tb-head">
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="label">
                                        Modelo
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="impresora_modelo" id="impresora_modelo" value="{$DatosGenerales[0].impresora_modelo}" class="form-text" style="width:300px;"/>
                                        <span id="error_impresora_modelo">No deje vacio</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Marca
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="impresora_marca" id="impresora_marca" value="{$DatosGenerales[0].impresora_marca}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="label">
                                        Serial
                                    </td>
                                    <td style="padding-top:2px; padding-bottom: 2px;">
                                        <input type="text" name="impresora_serial" id="impresora_serial" value="{$DatosGenerales[0].impresora_serial}" class="form-text" style="width:300px;"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <table style="width: 100%">
                    <tbody>
                        <tr class="tb-tit">
                            <td>
                                <input type="submit" name="aceptar" id="aceptar" value="Aceptar" />
                                <input type="button" name="cancelar" value="Cancelar" onclick="javascript:document.location.href='?opt_menu={$smarty.get.opt_menu}';"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>