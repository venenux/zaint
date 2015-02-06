<?php
session_start();
ob_start();
include ("../lib/common.php");
include ("../header.php");
$ruta_foto= $_GET[foto];
?>
<body>
    <form id="form1" name="form1" method="post" action="">
        <p>
            <label>
                <font size="2" face="Arial, Helvetica, sans-serif">
                <img border="1" src="<?php echo $ruta_foto?>" name="imgFoto" id="imgFoto"
                     width="344" height="278" align="middle" class="ewTableAltRow" id="12" style="top:0px" />
                </font>
            </label>
        </p>
        <table width="350" border="0">
            <tr>
                <td width="133">&nbsp;</td>
                <td width="74">
                    <div align="center">
                        <font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
                        <?php btn('cancel', 'window.close();', 2, 'Cerrar Ventana') ?>
                        </font>
                    </div>
                </td>
                <td width="129">&nbsp;</td>
            </tr>
        </table>
    </form>
</body>
</html>