<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];

include("../lib/common.php") ;
include("../header.php");
?>
<body>
<form id="form1" name="form1" method="post" action="">

<table width="100%" class="tb-tit">
    <tr>
      <td class="row-br">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="96%">
		<strong><font color="#000066">Vacaciones </font></strong></td>
            <td width="2%"><?php btn('back','menu_transacciones.php') ?></td>
           
          </tr>
      </table></td>
    </tr>
</table>


  <table width="100%" height="189" border="0">
   <!-- <tr class="tb-tit">
      <td height="31" class=""><font color="#000066"><strong>&nbsp;Vacaciones</strong></font></td>
    </tr>-->
    <tr>
      <td width="489" height="150">
<table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="vacaciones_generar.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
	<td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="vacaciones_generar.php?opcion=1"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="vacaciones_mantenimiento.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="nomina_de_vacaciones.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Generar vacaciones</div></td>
	<td height="32" class="Estilo1"><div align="center" class="Estilo1">Generar vacaciones por trabajador</div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Mantenimiento de vacaciones</div></td></td>
          <td class="Estilo1"><div align="center" class="Estilo1">N&oacute;mina de vacaciones</div></td></td>
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
