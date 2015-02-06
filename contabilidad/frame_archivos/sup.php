<?
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
require_once 'lib/config.php';
require_once 'lib/common.php';

$Conn = conexion_conf();

$var_sql = "select Nomemp  from cwconemp";
$rs = query($var_sql, $Conn);
$fetch = fetch_array($rs);

cerrar_conexion($Conn);
?>

<html>
    <head>
        <title>SEIC</title>
        <meta http-equiv="refresh" content="600">
        <link href="sup_archivos/estilos.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            <!--
            .style1 {color: #FFFFFF}
            -->
        </style>
        <script type="text/javascript">
            function AbrirVentana(Ventana,Largo,Alto,Modal)
            {
                if (Modal==1)
                {
                    mainWindow = showModalDialog(Ventana,'mainWindow','dialogWidth:'+Alto+'px;dialogHeight:'+Largo+'px;resizable:yes;toolbar:no;menubar:no;scrollbars:yes;help: no');
                }
                else
                {

                    mainWindow = window.open(Ventana,'mainWindow','menub ar=no,resizable=no,width='+Alto+',height='+Largo+',left=400,top=200,titlebar=yes,alwaysraised=yes,status=no,scrollbars=yes');
                }


            }
            function principal(){
                parent.cont.location.href="home.php"
            }
            function Abrir_Ventana2()
            {
                AbrirVentana('licencia.php',500,600,0);
            }
            function Abrir_Diagrama()
            {
                AbrirVentana('diagrama.php',500,600,0);
            }
        </script>
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="200" height="60" onClick="javascript:principal()" bgcolor="#a3cce2" style="cursor : pointer;">
                    <img src="sup_archivos/selectra.png" width="170" height="60">
                </td>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td background="sup_archivos/sup_22.png">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td><img src="sup_archivos/sup_33.png" width="260" height="38"></td>
                                        <td>
                                            <table border="0" align="right" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td><img src="sup_archivos/logo_asys.png" width="55" height="32"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#517D96">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="sup_archivos/sup_c22.png" width="20" height="22"></td>
                                                    <td>
                                                        <span style="font-size:11px; color:#FFFFFF;">Usuario: <?= $_SESSION['nombre_usuario'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empresa: <?= $_SESSION['empresa'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; codigo: <?= $_SESSION['codigo'] ?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table border="0" align="right" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td></td>
            <!--    <td onClick="javascript:Abrir_Ventana2()" ><a style="cursor:pointer; color:white;" target="_top" style="color:#FFFFFF"><img src="sup_archivos/licencia.png"  width="22" height="22" align="absmiddle" class="icon">Licencia</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                                                    <td>
                                                        <a href="../../entrada/index.php" target="_top" style="color:#FFFFFF"><img src="sup_archivos/exit.png" width="22" height="22" align="absmiddle" class="icon">Salir</a>
                                                    </td>
                                                    <td width="10">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
