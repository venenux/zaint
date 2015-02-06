<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>


<?php include("../header.php"); ?>
<?php include("../lib/common.php"); ?>


<body>
<form id="form1" name="form1" method="post" action="">
  <table width="807" height="292" border="0" class="row-br">
    <tr class="tb-tit">
      <td height="28" class="row-br"><table width="795" border="0">
          <tr>
            <td width="768" height="20"><font color="#000066"><strong>&nbsp;Formulaci&oacute;n de Conceptos</strong></font></td>
            <td width="17"><?php btn('back','menu_configuracion.php') ?></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" class="ewTableAltRow"><table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="conceptos_nomina_pago.php"><img src="img_sis/icons/sin asignar/document.png"  width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" ><div align="center"><a href="constantes_personal.php"><img src="../img_sis/cons_personal.png"  width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="baremos.php"><img src="img_sis/icons/sin asignar/document.png"  width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" ></td>
          
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center">Conceptos de <?echo $termino?> de Pago</div></td>
          <td class="Estilo1"><div align="center">Campos Adicionales (Trabajador)</div></td>
          <td class="Estilo1"><div align="center">Baremos (Tablas Escalares)</div></td>
          <td class="Estilo1"><div align="center"></div></td>
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
