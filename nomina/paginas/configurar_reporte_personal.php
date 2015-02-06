<?php 
session_start();
ob_start();
?>
<script>
function AbrirReporteActivos()
{

if (document.form1.optTipoReporte[0].checked==1)
{
	//AbrirVentana('rpt_personal_activos.php?tipo=1',660,800,0);
	tipo_reporte=1;
}
else if (document.form1.optTipoReporte[1].checked==1)
{
	tipo_reporte=2;
}
else if (document.form1.optTipoReporte[2].checked==1)
{
	tipo_reporte=3;
}
else if (document.form1.optTipoReporte[3].checked==1)
{
	tipo_reporte=4;
}
else if (document.form1.optTipoReporte[4].checked==1)
{
	tipo_reporte=5;
}
else if (document.form1.optTipoReporte[5].checked==1)
{
	tipo_reporte=6;
}
else if (document.form1.optTipoReporte[6].checked==1)
{
	tipo_reporte=7;
}

AbrirVentana('reporte_personal_x_csb.php?tipo='+tipo_reporte,660,800,0);

}
</script>
<?php 
include("../lib/common.php");
include("../header.php"); 
include("func_bd.php");	
?>

<form id="form1" name="form1" method="post" action="">
  <table width="807" height="234" border="0" class="row-br">
    <tr>
      <td height="28" class="row-br"><table width="793" border="0">
          <tr>
            <td width="718" height="20"><font color="#000066"><strong>&nbsp;Configurar Reporte de Integrabtes </strong></font></td>
            <td width="65"><?php btn('back','submenu_reportes_integrantes.php') ?></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" height="174" class="ewTableAltRow"><table width="268" border="0">
        
        <tr>
          <td width="262" height="23" class="Estilo1"><label>
            <input name="optTipoReporte" type="radio" value="1" checked="checked" > 
            Personal Activo 
          </label></td>
          </tr>
        <tr>
          <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="2">
Personal Inactivo</td>
        </tr>
        
        <tr>
          <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="3" />
Personal Jubilado </td>
        </tr>
        <tr>
          <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="4" />
Personal Nuevo </td>
        </tr>
        <tr>
          <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="5" />
Personal Suspendido </td>
        </tr>
        <tr>
          <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="6" />
Personal Vacaciones </td>
        </tr>
        <tr>
        <td height="23" class="Estilo1"><input name="optTipoReporte" type="radio" value="7" />
Personal Egresado </td>
		</tr>
        <tr>
  <td height="50" class="Estilo1"><label><?php btn('ok','AbrirReporteActivos();',2)  ?>
          </label></td>
          </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td class="ewTableAltRow">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
