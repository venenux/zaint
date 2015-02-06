<?php 
session_start();
ob_start();
?>
<?php
include ("../header.php");
include("../lib/common.php");

include("func_bd.php");	
?>
<script>

function AbrirListPersonal()
{
AbrirVentana('list_personal.php',660,800,0);
}



</script>


<form id="form1" name="form1" method="post" action="">
  <table width="807" height="210" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="789" border="0">
          <tr>
            <td width="762"><div align="left"><font color="#000066"><strong>Reportes de N&oacute;mina </strong></font></div></td>
            <td width="17"><div align="center">
              <?php btn('back','menu_reportes.php')  ?>
            </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" class="ewTableAltRow"><table width="454" border="0">
        <tr>
          <td width="130" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="javascript:AbrirVentana('reporte_cargos.php')"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir recibos de Nómina por Lotes" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="130" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirVentana('reporte_conceptos.php')"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir recibos de Nómina por Lotes" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="130" align="center" valign="middle" class="Estilo1"></td>
 			<td width="130" align="center" valign="middle" class="Estilo1"></td>
          <td width="112" align="center" valign="middle" class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
         <td class="Estilo1"><div align="center" class="Estilo1">Listado de Cargos</div></td> 
			<td height="32" class="Estilo1"><div align="center" class="Estilo1">Listado de Conceptos</div></td>
          <td class="Estilo1"><div align="center" class="Estilo1"></div></td>
          <td class="Estilo1"><div align="center" class="Estilo1"></div></td>
			 
          <td class="Estilo1">&nbsp;</td>
        </tr>
        <tr>
          <td height="34" class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
 <td class="Estilo1">&nbsp;</td>
        </tr>
        
        <tr>
          <td height="32" class="Estilo1">&nbsp;</td>
          <td class="Estilo1">&nbsp;</td>
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
