<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>

<?php
include ("../header.php");
include("../lib/common.php");

include("func_bd.php");	
?>


<SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js"></SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript"></script>

<script>



function VerRecibo()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('rpt_reporte_de_nomina.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}


function ver_recibos_pago()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('recibos_por_lote.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}
function resumen_conceptos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('resumen_conceptos.php?nomina='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}

function listado_cargos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_cargos.php?nomina_id='+document.form1.cboTipoNomina.value,660,800,0);
}
function listado_habitacional()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_politica_habitacional.php?nomina='+document.form1.cboTipoNomina.value,660,800,0);
}
function listado_habitacional2()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_politica_habitacional_ire.php?mes='+document.form1.fechaD.value,660,850,0);
}
function relacion_aporte_spf()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_paro_forzoso_ire.php?mes='+document.form1.fechaD.value,660,850,0);
}
function relacion_aporte_sso()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_sso_ire.php?mes='+document.form1.fechaD.value,660,850,0);
}
function relacion_aporte_fejp()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_fejp_ire.php?mes='+document.form1.fechaD.value,660,850,0);
}
function aportes_patronales_emp_obr()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_aportes_pat_emp_obr_ire.php?quincena='+document.form1.quincena.value+'&mes='+document.form1.fechaD.value,800,850,0);
}
function listado_basico()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_basico.php?nomina='+document.form1.cboTipoNomina.value,660,800,0);
}

function analisis_conceptos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_analisis_concepto.php?nomina='+document.form1.cboTipoNomina.value+'&concepto='+document.form1.seleccion_concepto.value,660,800,0);
}

function AbrirListPersonal()
{
AbrirVentana('list_personal.php',660,800,0);
}



</script>

<form id="form1" name="form1" method="post" action="">
  <table width="807" height="229" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="789" border="0">
          <tr>
            <td width="762"><div align="left"><font color="#000066"><strong>Parametros del Reporte</strong></font></div></td>
            <td width="17"><div align="center">
              <?php btn('back','submenu_reportes_nomina.php')  ?>
            </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" height="190" class="ewTableAltRow">
      <table width="520" border="0">
        
		<TR>
			<TD class="tb-fila" width="200">Seleccione mes de la nomina: </TD>
			<TD><INPUT type="text" name="fechaD" id="fechaD" size="15" maxlength="12" value="<? echo date("m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif">
			<script type="text/javascript">Calendar.setup({inputField:"fechaD",ifFormat:"%m/%Y",button:"d_fecha"});</script></TD>
		</TR>
		<tr><td class="tb-fila" width="200">Seleccione Quincena:&nbsp;&nbsp;</TD>
        <TD><select name="quincena" id="quincena">
		<option>Quincena </option>
        <option value="2">1era Quincena</option>
        <option value="3">2da Quincena</option>
        </select></td></tr>

		
	
	<input type="hidden" name="codt" id="codt" value="<? echo $codt; ?>" >
          </font></div> </td>
          </tr>
<?
$valor=$_GET['opcion']; 

switch($valor){
	case "analisis":

$consulta="select * from nomconceptos";
$resultado=sql_ejecutar($consulta);


	?>

<tr><td colspan="4">Concepto:&nbsp;&nbsp;<select name="seleccion_concepto" id="seleccion_concepto">
<option>Seleccione un Concepto</option>
<?
while($fila=mysql_fetch_array($resultado)){

?>
          <option value="<? echo $fila['codcon']?>"><? echo $fila['descrip']?></option>

<?}?>
        </select></td></tr>
        


<?
	break;

}
?>
        
        
        
        
      </table>
        <p>&nbsp;</p>
        <table width="467" border="0">
          <tr>
            <td width="466"><div align="right">
              <?php 
				

				switch($valor){
					case "resumen_conceptos":
						btn('ok','resumen_conceptos();',2);
						break;
					case "habitacional":
						btn('ok','listado_habitacional();',2);
						break;
					case "habitacional2":
						btn('ok','listado_habitacional2();',2);
						break;
					case "basico":
						btn('ok','listado_basico();',2);
						break;
					case "recibos":
						btn('ok','ver_recibos_pago();',2);
						break;
					case "general":
						btn('ok','VerRecibo();',2);
						break;
					case "cargos":
						btn('ok','listado_cargos();',2);
						break;
					case "analisis":
						btn('ok','analisis_conceptos();',2);
						break;
					case "spf":
						btn('ok','relacion_aporte_spf();',2);
						break;
					case "sso":
						btn('ok','relacion_aporte_sso();',2);
						break;
					case "fejp":
						btn('ok','relacion_aporte_fejp();',2);
						break;
					case "patronalQ":
						btn('ok','aportes_patronales_emp_obr();',2);
						break;
				}
  ?>
            </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
