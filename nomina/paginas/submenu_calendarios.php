<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

include("../header.php");
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" height="189" border="0">
    <tr class="tb-tit">
      <td height="31" class=""><font color="#000066"><strong>&nbsp;Calendarios</strong></font></td>
    </tr>
    <tr>
      <td width="489" height="150">
<table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="generar_calendarios.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="consultar_calendarios.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href=""><!--<img src="" width="32" height="32" border="0" align="absmiddle" />--></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href=""><!--<img src="" width="32" height="32" border="0" align="absmiddle" />--></a></div></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Generar calendario</div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Ver y modificar calendario</div></td></td>
          <td class="Estilo1"><div align="center" class="Estilo1"></div></td></td>
          <td class="Estilo1"><div align="center" class="Estilo1"></div></td></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1">&nbsp;</td>
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
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
