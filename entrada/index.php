<?php
session_start();
session_destroy();
session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>.: SELECTRA :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="../includes/imagenes/logo.ico" />
        <link rel="stylesheet" media="all" type="text/css"
              href="estilos_menu.css" />
        <link rel="stylesheet" media="all" type="text/css"
              href="jquery/ThickBox.css" />
        <script type="text/javascript" src="jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery/thickbox.js"></script>
    </head>
    <body>
        <div id="cont">
            <!--div id="logo2">
                <a class="thickbox"
                   href="info.html?KeepThis=true&TB_iframe=true&height=500&width=900">
                </a>
            </div-->
            <div id="logo">
                <div id="contenedor_botones">
                    <div id="administrativo">
                        <a href="../selectraerp"></a>
                    </div>
                    <div id="contabilidad">
                        <a href="../contabilidad"></a>
                    </div>
                    <div id="rrhh">
                        <a href="../nomina"></a>
                    </div>
                    <!--div id="reportes">
                        <a href="http://192.168.1.10:8080" target="_blank"></a>
                    </div>
                    <div id="manuales">
                        <a href="http://servidor/moodle" target="_blank"></a>
                    </div-->
                </div>
            </div>
            <div align="center"><a href="http://www.selectra.com.ve" target="_blank"><img src="../selectraerp/imagenes/logo.png" title="Selectra en la Web: www.selectra.com.ve"></img></a></div>
        </div>
    </body>
</html>
