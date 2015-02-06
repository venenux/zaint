<script src="../../libs/js/event_almacen_salida.js" type="text/javascript"></script>
<script src="../../libs/js/eventos_formAlmacen.js" type="text/javascript"></script>
<form name="formulario" id="formulario" method="POST" action="">
    <input type="hidden" name="Datosproveedor" value="">
    <input type="hidden" name="codigo_empresa" value="{$DatosEmpresa[0].codigo}"/>
    <input type="hidden" name="opt_menu" value="{$smarty.get.opt_menu}"/>
    <input type="hidden" name="opt_seccion" value="{$smarty.get.opt_seccion}"/>
    <input type="hidden" name="opt_subseccion" value="{$smarty.get.opt_subseccion}"/>
    <table width="100%">
        <tr class="row-br">
            <td>
                <table class="tb-tit" cellspacing="0" cellpadding="1" border="0" width="100%">
                    <tbody>
                        <tr>
                            <td width="900"><span style="float:left"><img src="{$subseccion[0].img_ruta}" width="22" height="22" class="icon" />{$subseccion[0].descripcion}</span></td>
                            <td width="75">
                                <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu={$smarty.get.opt_menu}&opt_seccion={$smarty.get.opt_seccion}'" name="buscar" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="padding: 0px;" align="right"><img src="../../libs/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                        <td class="btn_bg"><img src="../../libs/imagenes/back.gif" width="16" height="16" /></td>
                                        <td class="btn_bg" nowrap style="padding: 0px 1px;">Regresar</td>
                                        <td  style="padding: 0px;" align="left"><img  src="../../libs/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <!--<Datos del proveedor y vendedor>-->
    <div id="dp" class="x-hide-display">
        <br>
        <table>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/28.png"/-->
                    <span style="font-family:'Verdana';"><b>Autorizado Por (*)</b></span>
                </td>
                <td>
                    <input type="text" maxlength="70" name="autorizado_por" id="autorizado_por" value="{$nombre_usuario}"/>
                </td>
            </tr>
            <tr>
                <td>
                    <!--img align="absmiddle" width="17" height="17" src="../../libs/imagenes/8.png"/-->
                    <span style="font-family:'Verdana';"><b>Observaciones</b></span>
                </td>
                <td>
                    <input type="text" name="observaciones" maxlength="70" id="observaciones"/>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-family:'Verdana';"><b>Fecha</b></span>
                </td>
                <td>
                    <input type="text" name="input_fechacompra" id="input_fechacompra" value='{$smarty.now|date_format:"%Y-%m-%d"}'/>
                    <!--div  style="color:#4e6a48" id="fechacompra">{$smarty.now|date_format:"%d-%m-%Y"}</div-->
                    {literal}
                        <script type="text/javascript">//<![CDATA[
                            var cal = Calendar.setup({onSelect: function(cal) { cal.hide() }});
                            cal.manageFields("input_fechacompra", "input_fechacompra", "%d-%m-%Y");
                        //]]></script>
                    {/literal}
                </td>
            </tr>
        </table>
    </div>
    <!--</Datos del proveedor y vendedor>-->

    <div  id="dcompra" class="x-hide-display" >


    </div>


    <div id="PanelGeneralCompra">
        <div id="tabproducto" class="x-hide-display">
            <div id="contenedorTAB">
                <div id="div_tab1">
                    <div class="grid">
                        <table width="100%" class="lista">
                            <thead>
                                <tr >
                                    <th class="tb-tit">Codigo</th>
                                    <th class="tb-tit">Descripcion</th>
                                    <th class="tb-tit">Cantidad</th>
                                    <th class="tb-tit">Opt</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="sf_admin_row_1">
                                    <td colspan="4">
                                        <div class="span_cantidad_items"><span style="font-size: 10px;">Cantidad de Items: 0</span></div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div id="tabpago" class="x-hide-display">

            <div id="contenedorTAB21">
                <!-- TAB1 -->
                <div class="tabpanel2">
                    <table>
                    </table>

                </div>
            </div>






        </div>
    </div>



    <input type="hidden" title="input_cantidad_items" value="0" name="input_cantidad_items" id="input_cantidad_items">
    <input type="hidden" title="input_tiva" value="0" name="input_tiva" id="input_tiva">
    <input type="hidden" title="input_tsiniva" value="0" name="input_tsiniva" id="input_tsiniva">
    <input type="hidden" title="input_tciniva" value="0" name="input_tciniva" id="input_tciniva">

    <div id="displaytotal"  class="x-hide-display"></div>
    <div id="displaytotal2"  class="x-hide-display"></div>

</form>


<div id="incluirproducto" class="x-hide-display">
    <label>
        <p><b>Almacen</b></p>
        <p><select id="almacen" name="almacen"></select></p>
    </label>

    <label>
        <p><b>Productos</b></p>
        <p><select style="width:100%" id="items" name="items"></select></p>
    </label>

    <label>
        <p><b>Cantidad Unitaria</b></p>
        <p><input type="text" name="cantidadunitaria" id="cantidadunitaria"></p>
    </label>

    <label>
        <p><b>Cantidad Existente en Almacen</b></p>
        <p><input type="text" name="cantidad_existente" id="cantidad_existente"></p>
    </label>

</div>
