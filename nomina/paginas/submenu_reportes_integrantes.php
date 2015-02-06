<?php
session_start();
ob_start();
?>
<script>

function AbrirListPersonal()
{
AbrirVentana('seleccionar_constancia_tipo.php',660,800,0);
}
function AbrirListGeneral()
{
//sueldo promedio
AbrirVentana('list_personal_general.php?tipo=1',660,800,0);
}
function AbrirReporte()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_personal_x.php?tipo='+1,660,800,0);
}
function AbrirAsigDat()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_personal_x_csb.php?tipo='+1,660,800,0);
}
function AbrirPS()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_PS.php',660,800,0);
}
function AbrirAP()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_anticipos.php',660,800,0);
}
function AbrirIVSS(){
   AbrirVentana('list_personalIVSS.php',660,800,0);
}
function AbrirCargaFamiliar(){
   location.href='configurar_carga_familiar.php'
   //AbrirVentana('list_personalIVSS.php',660,800,0);
}
function AbrirPersonal(){
   location.href='configurar_personal.php'
   //AbrirVentana('list_personalIVSS.php',660,800,0);
}
function AbrirExpediente(){
   location.href='configurar_expediente.php'
   //AbrirVentana('list_personalIVSS.php',660,800,0);
}
</script>



<?php
include("../lib/common.php");
include ("../header.php");
include("func_bd.php");	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="807" height="210" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="789" border="0">
          <tr>
            <td width="762"><div align="left"><font color="#000066"><strong>&nbsp;Integrantes (Personal) </strong></font></div></td>
            <td width="17"><div align="center">
              <?php btn('back','menu_reportes.php')  ?>
            </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" class="ewTableAltRow">
	<table width="100%" border="0">
        <tr>
          <td width="20%" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="configurar_reporte_personal.php"><img src="img_sis/icons/3.png" alt="Permite modificar los datos de su empresa" width="32" height="32" border="0" align="absmiddle" /></a></div></td>

          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirListPersonal();"><img src="../img_sis/icons/3.png" alt="Niveles funcionales que posee su empresa" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>

           <td width="20%" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="javascript:AbrirReporte();"  ><img src="img_sis/icons/3.png" alt="Permite modificar los datos de su empresa" width="32" height="32" border="0" align="absmiddle" /></a></div></td>

	   <td width="20%" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="javascript:AbrirIVSS();"  ><img src="img_sis/icons/3.png" alt="Permite sacar los Reportes del Seguro Social" width="32" height="32" border="0" align="absmiddle" /></a></div></td>

          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirListGeneral();"><img src="../img_sis/icons/3.png" alt="sueldo promedio" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Trabajadores Activos/Inactivos </div></td>
          <td width="20%" class="Estilo1"><div align="center" class="Estilo1">Constancias y  Antecedentes </div></td>
          <td width="20%" class="Estilo1"><div align="center" class="Estilo1">Reporte</td></div></td>
	   <td width="20%" class="Estilo1"><div align="center" class="Estilo1">IVSS (Registro/Retiro)</div></td>
          <td  width="20%" class="Estilo1"><div align="center" class="Estilo1">Sueldo Promedio </div></td>
        </tr>
        <tr>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirAsigDat();"><img src="../img_sis/icons/3.png" alt="Asignaciones y datos de personal" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="filtro_ARC.php?opcion=1"><img src="../img_sis/icons/3.png" alt="AR-C" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirPS();"><img src="../img_sis/icons/3.png" alt="AR-C" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
	<td width="20%" align="center" valign="middle" ><div align="center"><a href="filtro_ARC.php?opcion=2"><img src="../img_sis/icons/3.png" alt="AR-C" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirAP();"><img src="../img_sis/icons/3.png" alt="AR-C" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        
        <tr>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Asignaciones y datos del personal</div></td>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">AR-C</div></td>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Prestaciones sociales</div></td>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Reposos</div></td>
	<td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Anticipos de prestaciones</div></td>
        </tr>
	<tr><TD></TD></tr>
        <tr>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirCargaFamiliar();"><img src="../img_sis/icons/9.png" alt="Carga Familiar" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirPersonal();"><img src="../img_sis/icons/28.png" alt="Personal" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
	<td width="20%" align="center" valign="middle" ><div align="center"><a href="javascript:AbrirExpediente();"><img src="../img_sis/icons/10000.png" alt="Expediente" width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
	<td></td>
	<td></td>
        </tr>
	<tr>
          <td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Carga Familiar</div></td>
	<td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Personal</div></td>
	<td  width="20%" height="32" class="Estilo1"><div align="center" class="Estilo1">Expediente Personal</div></td>
	<td></td>
	<td></td>
	</tr>
        
      </table>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>
