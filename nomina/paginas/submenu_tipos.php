<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>

<style type="text/css">
<!--
.Estilo1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>


<body>
<?php 
include("../lib/common.php") ;
include("../header.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="807" height="389" border="0" class="row-br">
    <tr>
      <td height="28" class="row-br"><table width="795" border="0">
          <tr>
            <td width="768"><font color="#000066"><strong>&nbsp;Tipos</strong></font></td>
            <td width="17"><div align="right">
              <?php btn('back','menu_configuracion.php') ?>
            </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td class="ewTableAltRow"><table width="454" border="0">
        <tr>
          <td width="106" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="tipos_nominas.php"><img src="img_sis/icons/30.png" alt="Permite modificar los datos de su empresa" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="110" align="center" valign="middle" ><div align="center"><a href="frecuencias.php"><img src="../img_sis/icons/12.png" alt="Niveles funcionales que posee su empresa" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1"><div align="center"><a href="acumulados.php"><img src="../img_sis/icons/sin asignar/emblem-1system.png" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="Estilo1"><div align="center"><a href="liquidaciones.php"><img src="img_sis/icons/sin asignar/vcalendar.png" width="32" height="32" border="0" align="absmiddle" class="icon" /></a>
                  <label> </label>
          </div></td>
        </tr>
        <tr>
          <td height="32" class="Estilo1"><div align="center" class="Estilo1">Tipos de <?echo $termino?> </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Frecuencias de Pago </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Acumulados  </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Liquidaciones </div></td>
        </tr>
        <tr>
          <td height="34" class="Estilo1"><div align="center"><a href="suspenciones.php"><img src="images/hsi_ac02.gif" alt="Permite modificar el registro de bancos" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="aumentos.php"><img src="img_sis/icons/8.png" alt="Permite modificar el registro de profesiones" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="prestamos.php"><img src="img_sis/icons/8.png" alt="Permite modificar el registro de cargos" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="parentescos.php"><img src="img_sis/icons/8.png" alt="Permite modificar el registro de categorias" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td height="47" class="Estilo1"><div align="center" class="Estilo1">Tipos de Suspensiones y Permisos  </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Aumentos </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Prestamos  </div></td>
          <td class="Estilo1"><div align="center" class="Estilo1">Tipos de Parentescos </div></td>
        </tr>
        <tr>
          <td height="34" class="Estilo1"><div align="center"><a href="motivos_retiros.php"><img src="img_sis/icons/sin asignar/document.png" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="situaciones.php"><img src="../img_sis/icons/7.png" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="guarderias.php"><img src="img_sis/icons/sin asignar/document.png" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="29" class="Estilo1"><div align="center">Motivos de Retiros </div></td>
          <td class="Estilo1"><div align="center">Situaciones</div></td>
          <td class="Estilo1"><div align="center">Tipos de Guarderias </div></td>
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
