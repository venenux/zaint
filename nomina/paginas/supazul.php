<?php 
session_start();
ob_start();
$termino= $_SESSION['termino'];
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>

<html>
<head>
<title>SEIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="600">
<link href="../estilos.css" rel="stylesheet" type="text/css">
<SCRIPT language="JavaScript" type="text/javascript">
function principal(){
	parent.cont.location.href="home.php"
}
</SCRIPT>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
//include("func_bd.php");
include("lib/common.php");

//msgbox($_SESSION[nomina]);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="270" height="60"><img src="../imagenes/azul/logo.png" width="270" height="60" border="0" onclick="javascript:principal()" style="cursor : pointer;"></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="../imagenes/azul/sup_2.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="../imagenes/azul/sup_1.png" width="260" height="38"></td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../imagenes/azul/asys.png" width="88" height="38"></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="sup-help"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="sup-ico-c2" width="20" height="22"><!--<img src="../imagenes/azul/sub_c2.png" width="20" height="22">--></td>
                <td class="sup-help-text"><span>Usuario:
                  <?php   echo ($_SESSION[nombre]); ?>
				  &nbsp;
				  &nbsp;
				  &nbsp;<?echo $termino?>
				   <?php    echo ($_SESSION[nomina]); ?>
                </span></td>
              </tr>
            </table></td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr class="sup-help-text">
                <td class="sup-ico-help" width="20" height="22"><!--<img src="../imagenes/azul/sup_help.png" width="22" height="22" align="absmiddle">--></td>
					<td  >Ayuda&nbsp;</td>
                <td class="sup-ico-about" width="20" height="22"><!--&nbsp;<img src="imagenes/stock_about.png" width="22" height="22" align="absmiddle">--></td>
					 <td >Acerca de...&nbsp;</td>
                <td class="sup-ico-exit" width="20" height="22" onclick="javascript:parent.location.href='logout.php'"></td>
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
