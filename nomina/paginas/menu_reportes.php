<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
include "../header.php";
?>


<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" class="">
    <tr class="tb-tit">
      <td height="32" class=""><font color="#000066"><strong>&nbsp;Reportes</strong></font></td>
    </tr>
    <tr>
      <td width="489" class="ewTableAltRow"><table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="submenu_reportes_integrantes.php"><img src="img_sis/icons/3.png" alt="Permite modificar los datos de su empresa" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" ><div align="center"><a href="submenu_reportes_nomina.php"><img src="../img_sis/icons/3.png" alt="Niveles funcionales que posee su empresa" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1"><div align="center"><a href="submenu_reportes_configuracion.php"><img src="../img_sis/icons/3.png" alt="Niveles funcionales que posee su empresa" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Integrantes (Personal) </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1"><?echo $termino?></div></td>
          <td class="Estilo1" align="center">Reportes de Configuraci&oacute;n</td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="34" class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="32" class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        
        
      </table>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>
