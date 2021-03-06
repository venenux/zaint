<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="autor" content="Charli Vivenes" />
        <title></title>
        {include file="snippets/inclusiones_reportes.tpl"}
    </head>
    <body>
        <form name="formulario" id="formulario" method="post">
            <div id="datosGral">
                {include file = "snippets/regresar_boton.tpl"}
                <input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}"/>
                <input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}"/>
                <input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}"/>
                <input type="hidden" name="cant_fechas" id="cant_fechas" value="1"/>
                <table style="width:100%; background-color: white;">
                    <thead>
                        <tr>
                            <th colspan="6" class="tb-head" style="text-align:center;">
                                LOS CAMPOS MARCADOS CON&nbsp;** SON OBLIGATORIOS
                            </th>
                        <tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label">Fecha **</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <input type="text" name="fecha" id="fecha" size="20" value="{$smarty.now|date_format:"%Y-%m-%d"}" class="form-text" readonly />
                                <!--button id="boton_fecha">...</button-->
                                {literal}
                                    <script type="text/javascript">//<![CDATA[
                                        $("#fecha").datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            showOtherMonths:true,
                                            selectOtherMonths: true,
                                            numberOfMonths: 1,
                                            //yearRange: "-100:+100",
                                            dateFormat: "yy-mm-dd",
                                            showOn: "both"//button
                                        });
                                        /*var cal = Calendar.setup({
                                            onSelect: function(cal) { cal.hide() }
                                        });
                                        cal.manageFields("boton_fecha", "fecha", "%Y-%m-%d");//%d/%m/%Y
                                        */
                                    //]]>
                                    </script>
                                {/literal}
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Formato Reporte</td>
                            <td colspan="5" style="padding-top:2px; padding-bottom: 2px;">
                                <div id="formato">
                                    <input type="radio" id="radio1" name="radio" value="0" /><label for="radio1">Hoja de C&aacute;lculo</label>
                                    <input type="radio" id="radio2" name="radio" value="1" checked /><label for="radio2">Formato PDF</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="tb-tit">
                            <!--td colspan="3" style="text-align:left">
                                <input type="radio" name="radio" value="0" /> Hoja de C&aacute;lculo
                                <input type="radio" name="radio" value="1" checked /> Formato PDF
                            </td-->
                            <td colspan="6">
                                <input type="submit" id="aceptar" name="aceptar" value="Enviar" onclick="javascript:valida_envia('rpt_ventas_diarias.php','');" />
                                <input type="button" name="cancelar" onclick="javascript:document.location.href='?opt_menu=7';" value="Cancelar" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>
</html>