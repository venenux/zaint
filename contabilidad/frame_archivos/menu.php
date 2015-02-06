<?php
require_once 'lib/config.php';
require_once 'lib/common.php';
$Conn = conexion_conf();
$var_imagen_izq = 10;
$var_imagen_der = 10;
$cadena1 = substr($var_imagen_izq, 3);
$cadena2 = substr($var_imagen_der, 3);
cerrar_conexion($Conn);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0040)http://asys.no-ip.org/asysadmin/menu.php -->
<html>
    <head>
        <title>SELECTRA</title>
        <META http-equiv=Content-Type content="text/html; charset=utf-8">
        <script type="text/javascript" src="menu_archivos/prototype.js"></script>
        <script type="text/javascript" src="menu_archivos/common.js"></script>
        <link type="text/css" href="menu_archivos/estilos.css" rel="stylesheet">
        <style type="text/css">
            body {
                background-color:#B2D2E7;
                background-image:url(menu_archivos/bg_menu.png);
                background-repeat:repeat-y;
            }
            #Layer1 {
                position:absolute;
                width:173px;
                height:36px;
                z-index:1;
                left: 2px;
                top: 591px;
            }
        </style>
        <META content="MSHTML 6.00.2900.2873" name=GENERATOR>
    </head>
    <body leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
            <TBODY>
                <TR>
                    <TD background="menu_archivos/sep_menu.png" colSpan="2"><IMG height=2 src="menu_archivos/sep_menu.png" width=5>
                    </TD>
                </TR>
                <TR class="menu-bg" onMouseOver="over($(this),'menu-bg-hover');" onmouseout="out($(this),'menu-bg-hover');">
                    <TD width=35><A class=menu href="menu_int.php" target="home"><SPAN style="FLOAT: left"><IMG src="menu_archivos/10.png" align=absMiddle border=0></SPAN></A></TD>
                    <TD height=40><A href="menu_int.php" target="home" class=menu>Configuraci&oacute;n</A></TD>
                </TR>
                <TR>
                    <TD background="menu_archivos/sep_menu.png" colSpan=2><IMG height=2 
                                                                             src="menu_archivos/sep_menu.png" width=5></TD></TR>
                <TR class="menu-bg" onMouseOver="over($(this),'menu-bg-hover');" 
                    onmouseout="out($(this),'menu-bg-hover');">
                    <TD width=35><A class=menu href="cwconcuelist.php" target="home" ><SPAN 
                                style="FLOAT: left"><IMG src="Imagenes/cuentas2.png" width="35" height="35" align=absMiddle 
                                                     border=0></SPAN></A></TD>
                    <TD height=40><A href="cwconcuelist.php" target="home" class=menu>Cuentas</A></TD>
                </TR>
                <TR>
                    <TD background="menu_archivos/sep_menu.png" colSpan=2>
                        <IMG height=2 src="menu_archivos/sep_menu.png" width=5>
                    </TD>
                </TR>
                <TR class=menu-bg onMouseOver="over($(this),'menu-bg-hover');" 
                    onmouseout="out($(this),'menu-bg-hover');">
                    <TD width=35><A class=menu href="cwconhcolist.php" target="home" ><SPAN 
                                style="FLOAT: left"><IMG src="menu_archivos/26.png" width="33" height="33"  align=absMiddle 
                                                     border=0></SPAN></A></TD>
                    <TD height=40><A href="cwconhcolist.php" target="home" class=menu>Asientos</A>
                    </TD>
                </TR>
            <TD background="menu_archivos/sep_menu.png" colSpan=2>
                <IMG height=2 src="menu_archivos/sep_menu.png" width=5>
            </TD>
        </TR>
        <TR class=menu-bg onMouseOver="over($(this),'menu-bg-hover');" 
            onmouseout="out($(this),'menu-bg-hover');">
            <TD width=35><A class=menu
                            href="menu_his.php" target="home" ><SPAN 
                        style="FLOAT: left"><IMG src="menu_archivos/38.png" width="33" height="33" 
                                             border=0 align=absMiddle></SPAN></A></TD>
            <TD height=40><A      
                    href="menu_his.php" target="home" class=menu>Hist&oacute;ricos</A></TD>
        </TR>
        <TR>
            <TD background=menu_archivos/sep_menu.png colSpan=2><IMG height=2 
                                                                     src="menu_archivos/sep_menu.png" width=5></TD></TR>
        <TR class=menu-bg onMouseOver="over($(this),'menu-bg-hover');" 
            onmouseout="out($(this),'menu-bg-hover');">
            <TD width=35><A class=menu 
                            href="menu_rep.php"  target="home"><SPAN 
                        style="FLOAT: left"><IMG src="menu_archivos/70.png" align=absMiddle 
                                             border=0></SPAN></A></TD>
            <TD height=40><A  
                    href="menu_rep.php" target="home" class=menu>Reportes</A></TD>

        </TR>
        <TR>
            <TD background=menu_archivos/sep_menu.png colSpan=2><IMG height=2 src="menu_archivos/sep_menu.png" width=5></TD></TR>
        <TR class=menu-bg onMouseOver="over($(this),'menu-bg-hover');" onmouseout="out($(this),'menu-bg-hover');">
            <TD width=35><A class=menu href="menu_procesos.php"  target="home"><SPAN 
                        style="FLOAT: left"><IMG src="menu_archivos/4.png" align=absMiddle border=0></SPAN></A></TD>
            <TD height=40><A  href="menu_procesos.php" target="home" class=menu>Procesos</A></TD>
        <TR>
            <TD background=menu_archivos/sep_menu.png colSpan=2><IMG height=2 src="menu_archivos/sep_menu.png" width=5></TD>
        </TR>
        <TR class=menu-bg onMouseOver="over($(this),'menu-bg-hover');" onmouseout="out($(this),'menu-bg-hover');">
            <TD width=35><A class=menu href="menu_activos.php"  target="home"><SPAN 
                        style="FLOAT: left"><IMG src="menu_archivos/11.png" width="35" height="35" align=absMiddle border=0></SPAN></A></TD>
            <TD height=40><A  href="menu_activos.php" target="home" class=menu>Activos Fijos</A></TD>
        <TR>
            <TD background=menu_archivos/sep_menu.png colSpan=2><IMG height=2 src="menu_archivos/sep_menu.png" width=5></TD>
        </TR>
        <TR>
            <TD colspan="2"><br><br><br></TD>
        </TR>

        <TR> 
                    <!--<TD colspan="2" align="center"><img src="<? echo "../../selectra/" . $cadena1; ?>" align="middle" width="100" height=106" align="middle" border="0"></TD> -->

        </TR> 
        <TR>
            <TD colspan="2" height="15"></TD>
        </TR>
        <TR> 
                <!--<TD colspan="2" align="center"><img src="<? echo "../../selectra/" . $cadena2; ?>" align="middle" width="100" height="106" align="middle" border="0"></TD>--> 
        </TR> 

    </TBODY>
</TABLE>
<!--<DIV width="100%" height="100%" style= "position: fixed; top: 85%;"><IMG src="menu_archivos/libre.png" width="195" height="46" align="middle" border="0"></DIV>-->
</TBODY>
</TABLE>
</BODY>
</HTML>
