<?php /* Smarty version 2.6.21, created on 2013-07-30 15:02:23
         compiled from cliente_editar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'cliente_editar.tpl', 174, false),)), $this); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php echo '
        <script type="text/javascript">//<![CDATA[
        $(document).ready(function(){
            $("#nombre").focus();
            $("#formulario").submit(function(){
                if($("#cod_cliente").val()==""||$("#nombre").val()==""||$("#direccion").val()==""||$("#telefonos").val()==""||$("#rif").val()==""){
                    alert("Debe llenar todos los campos obligatorios (**)!");
                    return false;
                }
            });

            $("#cod_cliente").change(function(){
                //return false;
                var valor = $(this).val();
                //alert(valor);
                if(valor!=\'\'){
                    $.ajax({
                        type: "GET",
                        url:  "../../libs/php/ajax/ajax.php",
                        data: "opt=ValidarCodigoCliente&v1="+valor,
                        beforeSend: function(){
                            $("#notificacionVCodCliente").html(MensajeEspera("<b>Veficando Cod. Cliente..<b>"));
                        },
                        success: function(data){
                            var resultado = data
                            if(resultado=="-1"){
                                $("#cod_cliente").val("").focus();
                                $("#notificacionVCodCliente").html("<img align=\\"absmiddle\\"  src=\\"../../../includes/imagenes/ico_note.gif\\"><span style=\\"color:red;\\"> <b>Disculpe, este c&oacute;digo ya existe.</b></span>");
                            }
                            if(resultado=="1"){//cod de item disponble
                                $("#notificacionVCodCliente").html("<img align=\\"absmiddle\\"  src=\\"../../../includes/imagenes/ok.gif\\"><span style=\\"color:#0c880c;\\"><b> C&oacute;digo Disponible</b></span>");
                            }
                        }
                    });
                }
            });
            $(".validadDecimales").numeric();
            $(".validadDecimales").blur(function(){
                if($(this).val()!=\'\'&&$(this).val()!=\'.\'){
                    $(this).val(parseFloat($(this).val()));
                }else{
                    $(this).val("0.00");
                }
            });
        });
        //]]>
        </script>
        '; ?>

        <script src="../../libs/js/validar_rif.js" type="text/javascript"></script>
    </head>
    <body>
        <form name="formulario" id="formulario" method="post" action="">
            <input type="hidden" name="codigo_empresa" value="<?php echo $this->_tpl_vars['DatosEmpresa'][0]['codigo']; ?>
"/>
            <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
"/>
            <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
"/>
            <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
"/>
            <table style="width:100%;">
                <tr class="row-br">
                    <td>
                        <table class="tb-tit" style="width:100%; padding: 1px;">
                            <tbody>
                                <tr>
                                    <td width="900"><span style="float:left"><img src="<?php echo $this->_tpl_vars['subseccion'][0]['img_ruta']; ?>
" width="22" height="22" class="icon" /><?php echo $this->_tpl_vars['subseccion'][0]['descripcion']; ?>
</span></td>
                                    <td width="75">
                                        <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&amp;opt_seccion=<?php echo $_GET['opt_seccion']; ?>
'">
                                            <tr>
                                                <td style="padding: 0px; text-align:right;"><img src="../../../includes/imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                                <td class="btn_bg"><img src="../../../includes/imagenes/back.gif" width="16" height="16" /></td>
                                                <td class="btn_bg" style="padding: 0px 1px; white-space: nowrap;">Regresar</td>
                                                <td style="padding: 0px; text-align:left;"><img src="../../../includes/imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr>
                    <td colspan="4" class="tb-head" style="text-align:center;">
                        LOS CAMPOS CON ** SON OBLIGATORIOS&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        C&oacute;digo
                    </td>
                    <td>
                        <input type="text" name="cod_cliente" value="<?php echo $this->_tpl_vars['datacliente'][0]['cod_cliente']; ?>
" id="cod_cliente" />
                        <input type="hidden" name="id_cliente" value="<?php echo $this->_tpl_vars['datacliente'][0]['id_cliente']; ?>
" id="id_cliente" />
                        <div id="notificacionVCodCliente"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="tb-head" align="center">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Nombre **</td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo $this->_tpl_vars['datacliente'][0]['nombre']; ?>
" size="60"  id="nombre" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Fecha de Nacimiento</td>
                    <td>
                        <input type="text" name="fnacimiento" value="<?php echo $this->_tpl_vars['datacliente'][0]['fnacimiento']; ?>
" id="fnacimiento" size="15" maxlength="12" />
                        <?php echo '
                            <script type="text/javascript">
                                //<![CDATA[
                                var cal = Calendar.setup({
                                    onSelect: function(cal) { cal.hide() }
                                });
                                cal.manageFields("fnacimiento", "fnacimiento", "%Y-%m-%d");
                                //]]>
                            </script>
                        '; ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Representante</td>
                    <td>
                        <input type="text" name="representante" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['representante']; ?>
" id="representante" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >Direcci&oacute;n **</td>
                    <td>
                        <input type="text" name="direccion" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['direccion']; ?>
" id="direccion" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >Alterna</td>
                    <td>
                        <input type="text" name="altena" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['altena']; ?>
" id="altena" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >Alterna 2</td>
                    <td>
                        <input type="text" name="alterna2" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['alterna2']; ?>
" id="alterna2" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >Tel&eacute;fonos **</td>
                    <td>
                        <input type="text" name="telefonos" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['telefonos']; ?>
" id="telefonos" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Fax</td>
                    <td>
                        <input type="text" name="fax" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['fax']; ?>
" id="fax" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >E-Mail</td>
                    <td>
                        <input type="text" name="email" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['email']; ?>
" id="email" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Permite Cr&eacute;ditos</td>
                    <td>
                        <select name="permitecredito" id="permitecredito">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_permitecredito'],'output' => $this->_tpl_vars['option_output_permitecredito'],'selected' => $this->_tpl_vars['option_selected_permitecredito']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">L&iacute;mite</td>
                    <td>
                        <input type="text" name="limite" value="<?php echo $this->_tpl_vars['datacliente'][0]['limite']; ?>
" class="validadDecimales" size="60" id="limite" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">D&iacute;as</td>
                    <td>
                        <input type="text" name="dias" class="validadDecimales" value="<?php echo $this->_tpl_vars['datacliente'][0]['dias']; ?>
" size="60" id="dias" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Tolerancia</td>
                    <td>
                        <input type="text" name="tolerancia" class="validadDecimales" value="<?php echo $this->_tpl_vars['datacliente'][0]['tolerancia']; ?>
" size="60" id="tolerancia" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">% Descuento Parcial</td>
                    <td>
                        <input type="text" name="porc_parcial" class="validadDecimales" value="<?php echo $this->_tpl_vars['datacliente'][0]['porc_parcial']; ?>
" size="60" id="porc_parcial"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">% Descuento Global</td>
                    <td>
                        <input type="text" name="porc_descuento_global" class="validadDecimales" value="<?php echo $this->_tpl_vars['datacliente'][0]['porc_descuento_global']; ?>
" size="60" id="porc_descuento_global" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Vendedor</td>
                    <td>
                        <select name="cod_vendedor" id="cod_vendedor">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_vendedor'],'output' => $this->_tpl_vars['option_output_vendedor'],'selected' => $this->_tpl_vars['option_selected_vendedor']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >Zona</td>
                    <td>
                        <select name="cod_zona" id="cod_zona">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_zona'],'output' => $this->_tpl_vars['option_output_zona'],'selected' => $this->_tpl_vars['option_selected_zona']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_parametros'],'output' => $this->_tpl_vars['option_output_idfiscal']), $this);?>

                    </td>
                    <td>
                        <input type="text" name="rif" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['rif']; ?>
" id="rif" />
                        <span id="rif_error" class="error" name="rif_error"><i>Formato Inv&aacute;lido...</i></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_parametros'],'output' => $this->_tpl_vars['option_output_idfiscal2']), $this);?>

                    </td>
                    <td>
                        <input type="text" name="nit" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['nit']; ?>
" id="nit" >
                        <span id="nit_error" class="error" name="nit_error"><i>Formato Inv&aacute;lido...</i></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Constribuyente Especial</td>
                    <td>
                        <select name="contribuyente_especial" id="contribuyente_especial">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_contribuyente_especial'],'output' => $this->_tpl_vars['option_output_contribuyente_especial'],'selected' => $this->_tpl_vars['option_selected_contribuyente_especial']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Retenci&oacute;n por Cliente</td>
                    <td>
                        <input type="text" name="retenido_por_cliente" value="<?php echo $this->_tpl_vars['datacliente'][0]['retenido_por_cliente']; ?>
" class="validadDecimales"  size="60" id="retenido_por_cliente" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Tipo de Entidad</td>
                    <td>
                        <select name="cod_entidad" id="cod_entidad">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_entidad'],'output' => $this->_tpl_vars['option_output_entidad'],'selected' => $this->_tpl_vars['option_selected_entidad']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Tipo de Precio</td>
                    <td>
                        <select name="cod_tipo_precio" id="cod_tipo_precio">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_tipo_precio'],'output' => $this->_tpl_vars['option_output_tipo_precio'],'selected' => $this->_tpl_vars['option_selected_tipo_precio']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Clase</td>
                    <td>
                        <input type="text" name="clase" size="60" value="<?php echo $this->_tpl_vars['datacliente'][0]['clase']; ?>
" id="clase" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Tipo de Cliente</td>
                    <td>
                        <select name="cod_tipo_cliente" id="cod_tipo_cliente">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_tipo_cliente'],'output' => $this->_tpl_vars['option_output_tipo_cliente'],'selected' => $this->_tpl_vars['option_selected_tipo_cliente']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head">Estado Cliente</td>
                    <td>
                        <select name="estado" id="estado">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_estado'],'output' => $this->_tpl_vars['option_output_estado'],'selected' => $this->_tpl_vars['option_selected_estado']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Cuenta Contable
                    </td>
                    <td>
                        <select name="cuenta_contable" style="width:400px;" id="cuenta_contable">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_cuenta'],'output' => $this->_tpl_vars['option_output_cuenta'],'selected' => $this->_tpl_vars['option_selected_cuenta']), $this);?>

                        </select>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr class="tb-tit" style="text-align:right;">
                        <td>
                            <input type="submit" name="aceptar" id="aceptar" value="Guardar Cambios">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>