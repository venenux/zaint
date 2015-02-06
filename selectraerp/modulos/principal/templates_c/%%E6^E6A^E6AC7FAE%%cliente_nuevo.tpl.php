<?php /* Smarty version 2.6.21, created on 2013-07-31 19:03:36
         compiled from cliente_nuevo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'cliente_nuevo.tpl', 251, false),)), $this); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php echo '
            <script type="text/javascript">
                //<![CDATA[
    $(document).ready(function(){
        $("#cod_cliente").focus();
        $("#formulario").submit(function(){
                if($("#cod_cliente").val()==""||$("#nombre").val()==""||$("#direccion").val()==""||$("#telefonos").val()==""||$("#rif").val()==""){
                    alert("Debe llenar todos los campos obligatorios (**)!");
                    return false;
                }
        });

                $("#cod_cliente").blur(function(){
                    return false;
                        valor = $(this).val();
                        if(valor!=\'\'){
                                $.ajax({
                        type: "GET",
                        url:  "../../libs/php/ajax/ajax.php",
                        data: "opt=ValidarCodigoCliente&v1="+valor,
                        beforeSend: function(){
                            $("#notificacionVCodCliente").html(MensajeEspera("<b>Veficando Cod. Cliente..<b>"));
                        },
                        success: function(data){
                            resultado = data
                        if(resultado=="-1"){
                                $("#cod_cliente").val("").focus();
                                $("#notificacionVCodCliente").html("<img align=\\"absmiddle\\"  src=\\"../../libs/imagenes/ico_note.gif\\"><span style=\\"color:red;\\"> <b>Disculpe, este codigo ya existe.</b></span>");
                        }
                            if(resultado=="1"){//cod de item disponble
                                                        $("#rif").val($("#cod_cliente").val());
                                $("#notificacionVCodCliente").html("<img align=\\"absmiddle\\"  src=\\"../../libs/imagenes/ok.gif\\"><span style=\\"color:#0c880c;\\"><b> Codigo Disponible</b></span>");
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
">
            <input type="hidden" name="opt_menu" value="<?php echo $_GET['opt_menu']; ?>
">
            <input type="hidden" name="opt_seccion" value="<?php echo $_GET['opt_seccion']; ?>
">
            <input type="hidden" name="opt_subseccion" value="<?php echo $_GET['opt_subseccion']; ?>
">
            <table width="100%">
                <tr class="row-br">
                    <td>
                        <table class="tb-tit" cellspacing="0" cellpadding="1" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td width="900"><span style="float:left"><img src="<?php echo $this->_tpl_vars['subseccion'][0]['img_ruta']; ?>
" width="22" height="22" class="icon" /><?php echo $this->_tpl_vars['subseccion'][0]['descripcion']; ?>
</span></td>
                                    <td width="75">
                                        <table style="cursor: pointer;" class="btn_bg" onClick="javascript:window.location='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&opt_seccion=<?php echo $_GET['opt_seccion']; ?>
'" name="buscar" border="0" cellpadding="0" cellspacing="0">
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
            <table   width="100%" border="0" >
                <tr>
                    <td colspan="4" class="tb-head" align="center">
                        LOS CAMPOS CON ** SON OBLIGATORIOS&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Codigo**
                    </td>
                    <td >
                        <input type="text" name="cod_cliente" value="#" readonly id="cod_cliente" >
                        <div id="notificacionVCodCliente"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="tb-head" align="center">
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Nombre **
                    </td>
                    <td >
                        <input type="text" name="nombre" size="60" value="" id="nombre" >

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Fecha de Nacimiento
                    </td>
                    <td>
                        <input type="text" name="fnacimiento" value="aaaa-mm-dd" id="fnacimiento" size="15" maxlength="12" />
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
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Representante
                    </td>
                    <td >
                        <input type="text" name="representante" size="60" id="representante" >
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Dirección **
                    </td>
                    <td >
                        <input type="text" name="direccion" size="60" id="direccion" >
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Alterna
                    </td>
                    <td >
                        <input type="text" name="altena" size="60" id="altena" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Alterna 2
                    </td>
                    <td >
                        <input type="text" name="alterna2" size="60" id="alterna2" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Telefonos **
                    </td>
                    <td >
                        <input type="text" name="telefonos" size="60" id="telefonos" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Fax
                    </td>
                    <td >
                        <input type="text" name="fax" size="60" id="fax" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        E-Mail
                    </td>
                    <td >
                        <input type="text" name="email" size="60" id="email" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Permite Creditos
                    </td>
                    <td>
                        <select name="permitecredito" id="permitecredito">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Limite
                    </td>
                    <td >
                        <input type="text" name="limite" class="validadDecimales" value="0.00" size="60" id="limite" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Días
                    </td>
                    <td >
                        <input type="text" name="dias" class="validadDecimales" value="0.00" size="60" id="dias" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Tolerancia
                    </td>
                    <td >
                        <input type="text" name="tolerancia" class="validadDecimales" value="0.00" size="60" id="tolerancia" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        % Descuento Parcial
                    </td>
                    <td >
                        <input type="text" name="porc_parcial"  class="validadDecimales" value="0.00" size="60" id="porc_parcial" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        % Descuento Global
                    </td>
                    <td >
                        <input type="text" name="porc_descuento_global"  class="validadDecimales" value="0.00" size="60" id="porc_descuento_global" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Vendedor
                    </td>
                    <td >
                        <select name="cod_vendedor" id="cod_vendedor">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_vendedor'],'output' => $this->_tpl_vars['option_output_vendedor']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Zona
                    </td>
                    <td>
                        <select name="cod_zona" id="cod_zona">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_zona'],'output' => $this->_tpl_vars['option_output_zona']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_parametros'],'output' => $this->_tpl_vars['option_output_idfiscal']), $this);?>
**
                    </td>
                    <td >
                        <input type="text" name="rif" size="60" id="rif" >
                        <span id="rif_error" class="error" name="rif_error"><i>Formato Inv&aacute;lido...</i></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_parametros'],'output' => $this->_tpl_vars['option_output_idfiscal2']), $this);?>

                    </td>
                    <td >
                        <input type="text" name="nit" size="60" id="nit" >
                        <span id="nit_error" class="error" name="nit_error"   >Formato Invalido..</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Constribuyente Especial
                    </td>
                    <td>
                        <select name="contribuyente_especial" id="contribuyente_especial">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Retencion por Cliente
                    </td>
                    <td>
                        <input type="text" name="retenido_por_cliente" class="validadDecimales" value="0.00" size="60" id="retenido_por_cliente" >
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Tipo de Entidad
                    </td>
                    <td >
                        <select name="cod_entidad" id="cod_entidad">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_entidad'],'output' => $this->_tpl_vars['option_output_entidad'],'selected' => $this->_tpl_vars['option_selected_entidad']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Tipo de Precio
                    </td>
                    <td>
                        <select name="cod_tipo_precio" id="cod_tipo_precio">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_tipo_precio'],'output' => $this->_tpl_vars['option_output_tipo_precio']), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Clase
                    </td>
                    <td >
                        <input type="text" name="clase" size="60" id="clase" >
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Tipo de Cliente
                    </td>
                    <td>
                        <select name="cod_tipo_cliente" id="cod_tipo_cliente">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values'],'output' => $this->_tpl_vars['option_output']), $this);?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Estado Cliente
                    </td>
                    <td>
                        <select name="estado" id="estado">
                            <option value="A">Activo</option>
                            <option value="B">Bloqueado</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="width:30%; vertical-align: top;" class="tb-head" >
                        Cuenta Contable
                    </td>
                    <td >
                        <select name="cuenta_contable" id="cuenta_contable">
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['option_values_cuenta'],'output' => $this->_tpl_vars['option_output_cuenta']), $this);?>

                        </select>
                    </td>
                </tr>


            </table>

            <table width="100%" border="0">
                <tbody>
                    <tr class="tb-tit" align="right">
                        <td>
                            <input type="submit" name="aceptar" id="aceptar" value="Guardar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>