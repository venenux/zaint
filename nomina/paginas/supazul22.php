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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SEIC</title>
<meta http-equiv="refresh" content="600">
<link href="../estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {color: #FFFFFF}
</style>
<SCRIPT language="JavaScript" type="text/javascript">
function principal(){
	parent.cont.location.href="home.php"
}
</SCRIPT>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
include("func_bd.php");

//msgbox($_SESSION[nomina]);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="270" height="60"><img src="img_sis/logo.png" width="270" height="60" border="0" onclick="javascript:principal()" style="cursor : pointer;"></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="img_sis/sup_2.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="img_sis/sup_1.png" width="260" height="38"></td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="img_sis/asys.png" width="88" height="38"></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#CC6600"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="img_sis/sup_c2.png" width="20" height="22"></td>
                <td class="style1"><span>Usuario:
                  <?php   echo ($_SESSION[nombre]); ?>
				  &nbsp;
				  &nbsp;
				  &nbsp;<?echo $termino.":"?>
				   <?php    echo ($_SESSION[nomina]); ?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php    echo "Empresa: ".($_SESSION[empresa]); ?>
                </span></td>
              </tr>
            </table></td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="img_sis/sup_help.png" width="22" height="22" align="absmiddle"> <span class="style1">Ayuda</span> </td>
                <td width="10">&nbsp;</td>
                <td><a href="logout.php" target="_top"><img src="img_sis/sup_exit.png" width="22" height="22" border="0" align="absmiddle" class="icon"></a><span class="style1">Salir</span></td>
                <td width="10">&nbsp;</td>
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
