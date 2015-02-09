<?php /* Smarty version 2.6.21, created on 2013-08-02 19:43:36
         compiled from snippets/header_form.tpl */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php if ($this->_tpl_vars['campo_seccion'] != null): ?>
                        <?php $this->assign('nom_menu', $this->_tpl_vars['campo_seccion'][0]['nom_menu']); ?>
            <?php $this->assign('imagen', $this->_tpl_vars['campo_seccion'][0]['img_ruta']); ?>
        <?php else: ?>
            <?php $this->assign('nom_menu', $this->_tpl_vars['cabeceraSeccionesByOptMenu'][0]['nom_menu']); ?>
            <?php if ($this->_tpl_vars['subseccion'][0]['descripcion'] != null): ?>
                                <?php $this->assign('nom_menu', $this->_tpl_vars['subseccion'][0]['descripcion']); ?>
                <?php $this->assign('imagen', $this->_tpl_vars['subseccion'][0]['img_ruta']); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cabeceraSeccionesByOptMenu'][0]['cod_modulo'] == 54): ?>
            <?php $this->assign('valcolap', 0); ?>
        <?php else: ?>
            <?php $this->assign('valcolap', 1); ?>
        <?php endif; ?>
        <?php echo '
            <script type="text/javascript">//<![CDATA[
                $(document).ready(function(){
                    $("#buscar").click(function(){
                        /*Envía el data de búsqueda en tb_head.tpl*/
                        $("form").submit();
                    });
                });
                function direccionar(url){
                    window.location.href=url;
                }
                Ext.onReady(function(){
                    var img = $("#imagen").val();//'; ?>
<?php echo $this->_tpl_vars['imagen']; ?>
<?php echo '
                    //var titulo = $("#descripcion").val();
                    var titulo = img != null ? \'<img src=\'+img+\' width="22" height="22" class="icon" /> '; ?>
<?php echo $this->_tpl_vars['nom_menu']; ?>
<?php echo '\' :\'\';
                    var valcolap = '; ?>
<?php echo $this->_tpl_vars['valcolap']; ?>
<?php echo '
                    var panelFormulario = new Ext.Panel({
                        //title:\'<img src=\'+img+\' width="22" height="22" class="icon" /> '; ?>
<?php echo $this->_tpl_vars['nom_menu']; ?>
<?php echo '\',
                        title:titulo,
                        autoHeight:600,
                        width:\'100%\',
                        collapsible:valcolap ? true : false,
                        titleCollapse:true,
                        contentEl:\'datosGral\',
                        frame:true/*,
                        // Pensando colocar una barra aqui que sustituya la que aun esta en html con tabla y agrgarle un boton de regresar
                        tbar:[{
                        //iconCls:\'print-icon\'
                            contentEl:\'boton_regresar\'
                        }]*/
                    });
                    // La variable $name_form viene del *.php correspondiente al *.tpl donde esta plantilla es incluida y asi form-'; ?>
<?php echo $this->_tpl_vars['name_form']; ?>
<?php echo ' es el id del formulario
                    panelFormulario.render("form-'; ?>
<?php echo $this->_tpl_vars['name_form']; ?>
<?php echo '");
                });
            //]]>
            </script>
        '; ?>

    </head>
    <body>
    </body>
</html>