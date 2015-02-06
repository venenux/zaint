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
<script>
function VerRecibo()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('rpt_reporte_de_nomina.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}

function VerRecibo_csb()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/rpt_reporte_de_nomina_csbpdf.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}

function VerRecibo_conceptos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/rpt_reporte_de_nomina_2pdf.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}
function utilidades()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/rpt_reporte_de_nomina_utilidadespdf.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}

function ver_recibos_pago()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('recibos_por_lote.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}

function ver_recibos_pago_csb()
{
	//alert(document.form1.cboTipoNomina.value);
	
	AbrirVentana('../fpdf/recibos_por_lote_csbpdf.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value+'&dep='+document.form1.seleccion_departamento.value,660,800,0);
}
function conformidad_csb()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/relacion_conformidad_csbpdf.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
}
function resumen_conceptos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/resumen_conceptospdf.php?nomina='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
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
	AbrirVentana('reporte_politica_habitacional_ire.php?nomina='+document.form1.cboTipoNomina.value,660,850,0);
}
function aportes_patronales_emp_obr()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_aportes_pat_emp_obr_ire.php?nomina='+document.form1.cboTipoNomina.value,660,850,0);
}
function listado_basico()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_basico.php?nomina='+document.form1.cboTipoNomina.value,660,800,0);
}

function deposito_obr_csb()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/reporte_relacion_deposito_csbpdf.php?nomina='+document.form1.cboTipoNomina.value,660,800,0);
}

function analisis_conceptos()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('reporte_analisis_concepto.php?nomina='+document.form1.cboTipoNomina.value+'&concepto='+document.form1.seleccion_concepto.value,660,800,0);
}
function listado_cheque()
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('../fpdf/reporte_personal_cheque.php?nomina_id='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value,660,800,0);
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
      <td width="489" height="190" class="ewTableAltRow"><table width="520" border="0">
        <tr>
          <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left"><? echo $termino?>:<font size="2" face="Arial, Helvetica, sans-serif">

<? /*$consulta="select codtip from nomtipos_nomina where descrip='".$_SESSION['nomina']."'";
$resultado=sql_ejecutar($consulta);
$fila=mysql_fetch_array($resultado);*/
?>



            <select name="cboTipoNomina" id="select2" style="width:400px">
<option>Seleccione una <?echo $termino?></option>
              <?php

	 	$query="select codnom,descrip,codtip from nom_nominas_pago where codtip='".$_SESSION['codigo_nomina']."'";
		$result=sql_ejecutar($query);
	 	  //ciclo para mostrar los datos
  		while ($row = fetch_array($result))
  		{ 		
		// Opcion de modificar, se selecciona la situacion del registro a modifica.		
  		   $codt= $row['codtip'];
			?>
              <option value="<?php echo $row['codnom'];?>"><?php echo $row['descrip'];?></option>
		
              <?
		}//fin del ciclo while
		?>		
            </select>
	<input type="hidden" name="codt" id="codt" value="<? echo $codt; ?>" >
          </font></div></td>
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
	while($fila=fetch_array($resultado)){
	
	?>
		<option value="<? echo $fila['codcon']?>"><? echo $fila['descrip']?></option>
	
	<?}?>
	</select></td></tr>
	
	<?
		break;
	
	}
	
        if($valor=='recibos_csb'){
	?>
	<tr><td colspan="4">Departamento
	<select name="seleccion_departamento" id="seleccion_departamento">
	<option values='Todos' >Todos</option>
	<?
	$consulta_departamento="select * from nomnivel3";
	$query=sql_ejecutar($consulta_departamento);
	while($fila_dep=fetch_array($query)){
	
	?>
		<option value="<? echo $fila_dep['codorg']?>"><? echo $fila_dep['descrip']?></option>
	
	<?}?>
		</select></td></tr>

	<?
	}?>
        
        
        
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
					case "relacion_deposito_obr_csb":
						btn('ok','deposito_obr_csb();',2);
						break;
					case "recibos":
						btn('ok','ver_recibos_pago();',2);
						break;
					case "recibos_csb":
						btn('ok','ver_recibos_pago_csb();',2);
						break;
					case "general":
						btn('ok','VerRecibo();',2);
						break;
					case "general_csb":
						btn('ok','VerRecibo_csb();',2);
						break;
					case "general_conceptos":
						btn('ok','VerRecibo_conceptos();',2);
						break;
					case "cargos":
						btn('ok','listado_cargos();',2);
						break;
					case "analisis":
						btn('ok','analisis_conceptos();',2);
						break;
					case "patronalQ":
						btn('ok','aportes_patronales_emp_obr();',2);
						break;
					case "relacion_conformidad_csb":
						btn('ok','conformidad_csb();',2);
						break;
					case "reporte_utilidades":
						btn('ok','utilidades();',2);
						break;
					case "cheque":
						btn('ok','listado_cheque();',2);
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
