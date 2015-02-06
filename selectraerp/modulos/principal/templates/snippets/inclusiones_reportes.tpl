<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title></title>
        <link type="text/css" href="../../../includes/js/jquery-ui-1.10.0/css/redmond/jquery-ui-1.10.0.custom.min.css" rel="Stylesheet"/>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-ui-1.10.0.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos_basicos.css" />
        {*if $campo_seccion neq NULL}
            {assign var=nom_menu value=$campo_seccion[0].nom_menu}
        {else}
            {assign var=nom_menu value=$cabeceraSeccionesByOptMenu[0].nom_menu}
        {/if}
        {if $cabeceraSeccionesByOptMenu[0].cod_modulo eq 54}
            {assign var=valcolap value=0}
        {else}
            {assign var=valcolap value=1}
        {/if*}
        {literal}
            <script type="text/javascript">//<![CDATA[
            Ext.onReady(function(){
                var formpanel = new Ext.Panel({
                    //title:' <img src='+$("#imagen").val()+' width="22" height="22" class="icon" /> {/literal}{*$nom_menu*}{literal}',
                    title:' <img src='+$("#imagen").val()+' width="22" height="22" class="icon" /> {/literal}{$campo_seccion[0].nom_menu}{literal}',
                    autoHeight: 600,
                    width: '100%',
                    collapsible: true,// {/literal}{*$valcolap*}{literal} ? true : false,
                    titleCollapse: true,
                    contentEl:'datosGral',
                    frame:true
                });
                formpanel.render("formulario");
                $("input[name='aceptar'], input[name='cancelar']").button();//Coloca estilo JQuery
                $("#formato").buttonset();
            });
            function valida_envia(rpt1, rpt2){
                if (document.formulario.fecha.value.length == 0){
                   alert("Debe seleccionar una fecha para el documento.");
                   document.formulario.fecha.focus();
                   return false;
                }
                var inputs =document.getElementsByTagName("input");
                var flag_fecha = false;
                for(var i=0;i<inputs.length;i++){
                    if(inputs[i].getAttribute("name") == "cant_fechas"){
                        var v = inputs[i].getAttribute("value");
                            i = inputs.length;
                            flag_fecha = true;
                    }
                }
                var flag_filtro = false;
                for(var i=0;i<inputs.length;i++){
                    if(inputs[i].getAttribute("name") == "tiene_filtro"){
                        var filtro = inputs[i].getAttribute("value");
                            i = inputs.length;
                            flag_filtro = true;
                    }
                }
                var ini = document.formulario.fecha.value;
                var fin = flag_fecha ? ( v == "2" ? document.formulario.fecha2.value : null) : null;
                var report = document.formulario.radio[1].checked ? rpt1 : rpt2;
                var params = !fin ? '?fecha='+ini : '?fecha='+ini+'&fecha2='+fin;
                    params = flag_filtro ? params + '&filtrado_por='+filtro : params;
                //window.open('../../reportes/'+report+'?fecha='+ini+'&fecha2='+fin+'&filtrado='+document.formulario.filtrado.value);
                window.open('../../reportes/'+report+params);
                //document.formulario.submit();
            }
            //]]>
            </script>
        {/literal}
    </head>
    <body>
    </body>
</html>