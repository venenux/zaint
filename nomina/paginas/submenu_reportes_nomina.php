<?php 
session_start();
ob_start();
$termino= $_SESSION['termino'];
include ("../header.php");
?>

<script>

function AbrirListPersonal()
{
AbrirVentana('list_personal.php',660,800,0);
}



</script>


<style type="text/css">
<!--
.Estilo1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>



<body>
<?php
include("../lib/common.php");

include("func_bd.php");	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="807" height="210" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="789" border="0">
          <tr>
            <td width="762"><div align="left"><font color="#000066"><strong>Reportes de <?echo $termino?> </strong></font></div></td>
            <td width="17"><div align="center">
              <?php btn('back','menu_reportes.php')  ?>
            </div></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td class="ewTableAltRow"><table  border="0">
        <tr>
          <td width="130" height="42" align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=general"><img src="img_sis/icons/3.png" title="Reporte de <?echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina.php?opcion=resumen_conceptos"><img src="../img_sis/icons/3.png"  width="32" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="130" align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=recibos"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir recibos de Nómina por Lotes" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
 			<td width="130" align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=analisis"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir recibos de Nómina por Lotes" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="112" align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=basico"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir recibos de Nómina por Lotes" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td class="Estilo1"><div align="center" >Reporte de <?echo $termino?></div></td>
          <td class="Estilo1"><div align="center" >Resumen de <?echo $termino?></div></td>
          <td class="Estilo1"><div align="center" >Recibos de Pago</div></td>
			 <td class="Estilo1"><div align="center" >An&aacute;lisis Por<br />Conceptos</div></td>
          <td class="Estilo1">Listado B&aacute;sico</td>
        </tr>
       
	<!--	<tr >
        <td colspan="5"><br /><br /></td></tr>
        <tr>
          <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=habitacional"><img src="img_sis/icons/3.png" title="Reporte de <?echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          
         <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina_ire.php?opcion=habitacional2"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina_ire.php?opcion=spf"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina_ire.php?opcion=sso"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="config_rpt_nomina_ire.php?opcion=fejp"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 <td class="Estilo1">&nbsp;</td>
        </tr>
        
        <tr>
        <td class="Estilo1" align="center">Listado de Pol&iacute;tica<br>Habitacional</td>
        <td class="Estilo1" align="center">Relacion del aporte patronal al F.A.H.</td>
       	<td class="Estilo1" align="center">Relaci&oacute;n de aportes al S.P.F.</td>
 		<td class="Estilo1" align="center">Relaci&oacute;n de aportes al S.S.O.</td>
         
          <td class="Estilo1" align="center">Relaci&oacute;n de aportes al F.E.J.P.</td>
        </tr>

<tr >
        <td colspan="5"><br /><br /></td></tr>
        <tr>
          <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina_ire2.php?opcion=patronalQ"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          
         <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina_ire.php?opcion=calcantig"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina_ire.php?opcion=calcagui"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina_ire.php?opcion=calcbv"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
          <td class="Estilo1"><div align="center"><a href="config_rpt_nomina_ire.php?opcion=aportempobr"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 <td class="Estilo1">&nbsp;</td>
        </tr>
        
        <tr>
        <td class="Estilo1" align="center">Aportes patronales por empleados y obreros (quincenal)</td>
        <td class="Estilo1" align="center">Relación del calculo de antiguedad</td>
       	<td class="Estilo1" align="center">Relación del calculo de aguinaldos</td>
 		<td class="Estilo1" align="center">Relación del calculo de bono vacacional</td>
         
          <td class="Estilo1" align="center">Aportes patronales empleados y obreros</td>
        </tr>-->


	<tr>
        <td colspan="5"><br /><br /></td></tr>
        <tr>
          <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=general_csb"><img src="img_sis/icons/3.png" title="Reporte de <? echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=recibos_csb"><img src="img_sis/icons/3.png" title="Recibos por lote " width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td width="130" align="center" valign="middle" ><div align="center"><a href="config_rpt_nomina.php?opcion=relacion_deposito_obr_csb"><img src="img_sis/icons/3.png" title="Reporte de <?// echo $termino?>" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td width="130" align="center" valign="middle" ><div align="center"><a href="filtro_nomina.php?opcion=1"><img src="img_sis/icons/3.png" title="Reporte de bancario LPH" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=2"><img src="img_sis/icons/3.png" title="Reporte de bancario APP" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 	<td class="Estilo1">&nbsp;</td>
        </tr>
        
        <tr>
        <td class="Estilo1" align="center">Reporte de <?echo $termino?> PDF</td>
        <td class="Estilo1" align="center">Recibos de pago PDF</td>
       	<td class="Estilo1" align="center">Relación para deposito PDF</td>
 	<td class="Estilo1" align="center">Relación para deposito LPH PDF</td>
        <td class="Estilo1" align="center">Relación para deposito A.P.P. PDF</td>
        </tr>
	
	 <tr>
          <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=3"><img src="img_sis/icons/3.png" title="Reporte de H.C.M." width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=4"><img src="img_sis/icons/3.png" title="Reporte de S.P.F." width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=5"><img src="img_sis/icons/3.png" title="Reporte de F.P.J." width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=6"><img src="img_sis/icons/3.png" title="Reporte de D.S." width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=7"><img src="img_sis/icons/3.png" title="Reporte de D.v." width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 	<!--<td class="Estilo1">&nbsp;</td>-->
        </tr>

        <tr>
        <td class="Estilo1" align="center">Reporte de H.C.M.</td>
        <td class="Estilo1" align="center">Reporte de S.P.F.</td>
       	<td class="Estilo1" align="center">Reporte de F.P.J.</td>
 	<td class="Estilo1" align="center">Reporte de descuento sindical</td>
        <td class="Estilo1" align="center">Reporte de descuento de vivienda</td>
        </tr>

	 <tr>
          <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=8"><img src="img_sis/icons/3.png" title="Reporte de pension alimentaria" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=relacion_conformidad_csb"><img src="img_sis/icons/3.png" title="Relacion de conformidad" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=9"><img src="img_sis/icons/3.png" title="Reporte de deducciones con patronales" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
        <td class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=general_conceptos"><img src="img_sis/icons/3.png" title="Reporte de D.S. CSB" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=10"><img src="img_sis/icons/3.png" title="Reporte de deducciones con patronales" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 	<td class="Estilo1">&nbsp;</td>
        </tr>

        <tr>
        <td class="Estilo1" align="center">Reporte de pension alimentaria</td>
        <td class="Estilo1" align="center">Relacion de conformidad</td>
      	<td class="Estilo1" align="center">Reporte de deducciones con patronales</td>
 	<td class="Estilo1" align="center">Reporte de nomina totalizado por conceptos</td>
        <td class="Estilo1" align="center">Reporte de deducciones con patronales (por gerencias)</td>
        </tr>

	<tr>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=11"><img src="img_sis/icons/3.png" title="Reporte prestaciones por gerencia" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=reporte_utilidades"><img src="img_sis/icons/3.png" title="Relacion de conformidad" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
		 <td class="Estilo1"><div align="center"><a href="filtro_nomina2.php?opcion=10"><img src="img_sis/icons/3.png" title="Reporte de deducciones con patronales" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
	<td width="130" align="center" valign="middle" class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=cheque"><img src="../img_sis/icons/3.png"  width="32" title="Imprimir Listado pago Cheque" height="32" border="0" align="absmiddle" class="icon" /></a></div></td>


       <!-- <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=9"><img src="img_sis/icons/3.png" title="Reporte de deducciones con patronales" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
        <td class="Estilo1"><div align="center"><a href="config_rpt_nomina.php?opcion=general_conceptos"><img src="img_sis/icons/3.png" title="Reporte de D.S. CSB" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
         <td class="Estilo1"><div align="center"><a href="filtro_nomina.php?opcion=10"><img src="img_sis/icons/3.png" title="Reporte de deducciones con patronales" width="32" height="32" border="0" align="absmiddle" /></a></div></td>
 	<td class="Estilo1">&nbsp;</td>-->
        </tr>

        <tr>
        <td class="Estilo1" align="center">Reporte prestaciones por gerencia</td>
        <td class="Estilo1" align="center">Reporte de nomina de utilidades</td>
	<td class="Estilo1" align="center">Reporte consolidado de nominas</td>
	<td class="Estilo1" align="center">Reporte Nomina Cheque</td>

      	<!--<td class="Estilo1" align="center">Reporte de deducciones con patronales</td>
 	<td class="Estilo1" align="center">Reporte de nomina totalizado por conceptos</td>
        <td class="Estilo1" align="center">Reporte de deducciones con patronales (por gerencias)</td>-->
        </tr>

      </table>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>
