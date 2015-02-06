<?php
session_start();
ob_start();
$termino = $_SESSION['termino'];
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?
require_once '../lib/config.php';
require_once '../lib/common.php';
/*
  $Conn = conexion_conf();

  $var_sql="select nomemp,version from parametros";
  $rs = query($var_sql,$Conn);
  $fetch = fetch_array($rs);

  cerrar_conexion($Conn);

 */
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SEIC</title>
        <meta http-equiv="refresh" content="600">
        <link href="../estilos.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .style1 {color: #FFFFFF}
        </style>
        <script language="JavaScript" type="text/javascript">
            function principal(){
                parent.cont.location.href="home.php"
            }

            function Abrir_Ventana2()
            {
                AbrirVentana('licencia.php',500,600,0);
            }
        </script>
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <?php
        include("func_bd.php");

//msgbox($_SESSION[nomina]);
        ?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="60" background="img_sis/sup_33.png" align="center">
                    <img src="../img_sis/selectra2.png" width="170" height="60" border="0" onClick="javascript:principal()" style="cursor : pointer;">
                </td>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td background="../img_sis/sup_22.png">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td><img src="../img_sis/sup_33.png" width="260" height="38"></td>
                                        <td>
                                            <table border="0" align="right" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td><img src="../img_sis/asys.png" width="55" height="32"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="sup-help"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td><table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td class="sup-ico-c2" width="20" height="22"><!--<img src="../imagenes/azul/sub_c2.png" width="20" height="22">--></td>
                                                    <td class="sup-help-text"><span style="font-size:10px;">Usuario:
                                                            <?php echo ($_SESSION[nombre]); ?>
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;<? echo $termino . ":" ?>
                                                            <?php echo ($_SESSION[nomina]); ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Empresa: " . ($_SESSION[empresa]); ?>
                                                        </span></td>
                                                </tr>
                                            </table></td>
                                        <td><table border="0" align="right" cellpadding="0" cellspacing="0">
                                                <tr class="sup-help-text">
                                                  <td class="" width="20" height="22"><!--<img src="../imagenes/azul/sup_help.png" width="22" height="22" align="absmiddle">--></td>
                                                    <td></td>
                                    <td class="" width="20" height="22"><!--&nbsp;<img src="imagenes/stock_about.png" width="22" height="22" align="absmiddle">--></td>
                                                    <td onClick="javascript:Abrir_Ventana2()" ><a style="cursor:pointer; color:white;" target="_top" style="color:#FFFFFF"><img src="../img_sis/licencia.png"  width="22" height="22" align="absmiddle" class="icon">Licencia</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td class="sup-ico-exit" width="20" height="22" onClick="javascript:parent.location.href='logout.php'"></td>
                                                    <td width="10">Salir</td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                </table></td>
                        </tr>
                    </table></td>
            </tr>
        </table>
    </body>
</html>
