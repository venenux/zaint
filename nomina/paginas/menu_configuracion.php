<?php
session_start();
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" class="fondo">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" height="210" border="0">
    <tr class="tb-tit">
      <td height="31" colspan="4" class=""><font color="#000066"><strong >&nbsp;Configuraci&oacute;n</strong></font></td>
    </tr>
   <!-- <tr>-->
      <!--<td><table width="100%" border="0">-->
        <tr>
          <td  height="50" align="center" valign="middle" class="Estilo1"><div align="center"><a href="empresa.php" target="_self"><img src="img_sis/icons/30.png" alt="Permite modificar los datos de su empresa"  height="32" border="0" align="absmiddle" /></a></div></td>
          <td  align="center" valign="middle" ><div align="center"><a href="niveles_funcionales.php"><img src="../img_sis/icons/12.png" alt="Niveles funcionales que posee su empresa"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td  align="center" valign="middle" class="Estilo1"><div align="center"><a href="submenu_tipos.php"><img src="../img_sis/icons/sin asignar/emblem-1system.png"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td  align="center" valign="middle" class="Estilo1"><div align="center"><a href="submenu_calendarios.php"><img src="img_sis/icons/sin asignar/vcalendar.png" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Datos de Empresa</div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Niveles Funcionales </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Calendiarios</div></td>
        </tr>
        <tr>
          <td height="34" class="Estilo1"><div align="center"><a href="submenu_bancos.php"><img src="images/hsi_ac02.gif" alt="Permite modificar el registro de bancos"  height="32" border="0" align="absmiddle" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="profesiones.php"><img src="img_sis/icons/8.png" alt="Permite modificar el registro de profesiones"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="cargos.php"><img src="img_sis/icons/9.png" alt="Permite modificar el registro de cargos"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="tabulador_categorias.php"><img src="img_sis/icons/sin asignar/edit-paste.png" alt="Permite modificar el registro de cargos"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Bancos </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Profesiones u Ocupaciones </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Cargos </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tabulador Salarial</div></td>
        </tr>
        <tr>
          <td height="34" class="Estilo1"><div align="center"><a href="categorias.php"><img src="img_sis/icons/8.png" alt="Permite modificar el registro de categorias"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="submenu_formulacion_conceptos.php"><img src="img_sis/icons/sin asignar/document.png"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="usuarios_list.php"><img src="img_sis/icons/9.png" alt="Permite modificar el registro de cargos"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="instruccion.php"><img src="img_sis/icons/9.png" alt="Permite modificar el registro de grado de instruccion"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Categorias</div></td>
          <td class="Estilo1"><div align="center">Formulaci&oacute;n de Conceptos </div></td>
          <td class="Estilo1"><div align="center">Usuarios</div></td>
          <td class="Estilo1"><div align="center">Grado de instrucci&oacute;n</div></td>
        </tr>
			<tr>
          <td class="Estilo1"><div align="center"><a href="desempeno.php"><img src="img_sis/icons/9.png" alt="Permite modificar el registro de area de desempeno"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
				<td class="Estilo1"><div align="center"><a href="gradospasos_list.php"><img src="img_sis/icons/sin asignar/edit-paste.png" alt="Permite modificar el registro de grados y pasos"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>	
	<!--<td class="Estilo1"><div align="center"><a href="../configuracion/firmas_list.php"><img src="../img_sis/icons/37.png" alt="Permite modificar las firmas en los Reportes"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>-->
			<td class="Estilo1"><div align="center"><a href="tabulador_seguro_list.php"><img src="img_sis/icons/zuma.jpg" alt="Cargar Tabulador Seguro"  height="32" border="0" align="absmiddle" class="icon" /></a></div></td>	
			<td class="Estilo1"><div align="center"></div></td>
        </tr>
			<tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Area de desempe&#241;o</div></td>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Grados y Pasos</div></td>
		  <td height="32" class="Estilo1"><div align="center" class="Estilo1">Tabulador</div></td>
           <!--<td class="Estilo1"><div align="center">Firmas Reportes</div></td>-->
          <td class="Estilo1"><div align="center">&nbsp;</div></td>
        </tr>

      </table>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>
