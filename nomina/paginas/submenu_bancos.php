<?php 
session_start();
ob_start();
include("../header.php");

include("../lib/common.php");




 ?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%"  border="0" class="">
    <tr class="tb-tit">
      <td height="28" class=""><table width="100%" border="0">
          <tr>
            <td  height="20"><font color="#000066"><strong>&nbsp;Bancos</strong></font></td>
            <td width="65"><?php btn('back','menu_configuracion.php') ?></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" class="ewTableAltRow"><table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="grupos_bancos.php"><img src="img_sis/icons/hsi_ac04.gif" alt="Permite modificar el registro de bancos" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" ><div align="center"><a href="niveles_funcionales.php"></a><a href="bancos.php"><img src="images/hsi_ac02.gif" alt="Permite modificar el registro de bancos" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1"><div align="center"><a href="tasas_interes.php"><img src="img_sis/icons/6.png" alt="Permite modificar el registro de bancos" width="32" height="32" border="0" align="absmiddle" /></a><a href="submenu_tipos.php"></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Grupo de Bancos </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Bancos</div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tasas de Interes  </div></td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="34" class="Estilo1"><div align="center"></div></td>
          <td class="Estilo1"><div align="center"><a href="profesiones.php"></a></div></td>
          <td class="Estilo1"><div align="center"><a href="cargos.php"></a></div></td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="32" class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
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
