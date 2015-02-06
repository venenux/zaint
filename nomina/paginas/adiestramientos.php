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

include ("func_bd.php") ;
?>
<script>
function GenerarNomina()
{
AbrirVentana('barraprogreso_1.php',150,500,0);
}
</script>

<?php

//codigo para pagina;
$TAMANO_PAGINA = 10;
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 1;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA+1;
} 
$limit=$inicio-1;

/////////////////////////////
$nombre_modulo=$termino.' de Pago';
$nombre_tabla='nom_nominas_pago';
//campos en orden segun listado
$campo_1='codnom';
$campo_2='descrip';
$campo_3='status';
$campo_4='periodo_ini';
$campo_5='periodo_fin';
$campo_6='fechapago';
$campo_7='';
$campo_8='';
$campo_9='';
$campo_10='';
$documento_list='nomina_de_pago.php';
$documento_edit='ag_nomina_pago.php';
//$documento_atras='submenu_tipos.php';
///////////////////////////////

?>


<script type="text/javascript">
var rows = document.getElementsByTagName('tr');
for (var i = 0; i < rows.length; i++) {
rows[i].onmouseover = function() {
this.className += ' hilite';
}
rows[i].onmouseout = function() {
this.className = this.className.replace('hilite', '');
}
}
</script>
<script type="text/javascript" src="tabber.js"></script>
<script type="text/javascript">

<!--
var firstrowoffset = 1; // first data row start at
var tablename = 'ewlistmain'; // table name
var lastrowoffset = 0; // footer row
var usecss = true; // use css
var rowclass = 'ewTableRow'; // row class
var rowaltclass = 'ewTableAltRow'; // row alternate class
var rowmoverclass = 'ewTableHighlightRow'; // row mouse over class
var rowselectedclass = 'ewTableSelectRow'; // row selected class
var roweditclass = 'ewTableEditRow'; // row edit class
var rowcolor = '#FFFFFF'; // row color
var rowaltcolor = '#EEF2F5'; // row alternate color
var rowmovercolor = '#DDEEFF'; // row mouse over color
var rowselectedcolor = '#DDEEFF'; // row selected color
var roweditcolor = '#DDEEFF'; // row edit color

//-->
</script>

<script>
function CerrarVentana(){
	javascript:window.close();
}

/*function enviar(op){
	
	document.frmPrincipal.op.value=op;
	document.frmPrincipal.submit();
}
*/

function enviar(op,id,nomina,codtip){
		
	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="<?php echo $documento_edit; ?>";
		document.frmPrincipal.submit();	
	}
	if (op==2){	 	// Opcion de Modificar
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="<?php echo $documento_edit; ?>";
		document.frmPrincipal.submit();		
	}
	if (op==3){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea eliminar el registro ?"))
		{					
			document.frmPrincipal.registro_id.value=id;
			document.frmPrincipal.op.value=op;
  			document.frmPrincipal.submit();
		}		
	}
	
	if (op==4){		// Generar Nómina
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.codigo_nomina.value=nomina;
		AbrirVentana('barraprogreso_1.php?registro_id='+id+'&codigo_nomina='+nomina,180,480,0);
	}
	
	if (op==5){	// Movimiento de Nómina
		parent.cont.location.href="movimientos_nomina_pago.php?codigo_nomina="+id+"&codt="+codtip
		
	}
	if (op==6){	//CERRAR NÓMINA
		if (confirm("Esta seguro que desea cerrar esta <?echo $termino?> ?"))
		{

			var cerrar_nomina=abrirAjax()
			cerrar_nomina.open("GET", "cerrar_nomina.php?codigo_nomina="+id, true)
			cerrar_nomina.onreadystatechange=function() 
			{
				if (cerrar_nomina.readyState==4)
				{
					//municipio.parentNode.innerHTML = 
					//alert(cerrar_nomina.responseText)
					parent.cont.location.href="nomina_de_pago.php"
				}
			}
			cerrar_nomina.send(null);
		}
		
	}
	if (op==7){	//CERRAR NÓMINA
		var nomina=abrirAjax()
		nomina.open("GET", "abrir_nomina.php?codigo_nomina="+id, true)
		nomina.onreadystatechange=function() 
		{
			if (nomina.readyState==4)
			{
					//municipio.parentNode.innerHTML = 
						//alert(cerrar_nomina.responseText)
				parent.cont.location.href="nomina_de_pago.php"
			}
		}
		nomina.send(null);
		
	}
}
</script>

<script type="text/javascript" src="tabber.js"></script>
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="example-print.css" TYPE="text/css" MEDIA="print">



<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>


<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?php 


$ficha = $_GET['ficha'];

$conexion=conexion();
//buscamos el valor maximo de la nomina

$consulta = "SELECT * FROM nom_adiestramiento_personal WHERE ficha = '".$ficha."' ";
$resultado=query($consulta,$conexion);
$fetch=fetch_array($resultado);






?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<table width="95%" class="tb-tit">
  <tr>
    <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97%"><strong> <font color="#000066">&nbsp;Adiestramientos </font></strong></td>
        <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="right">
              <?php btn('back','maestro_personal.php') ?>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>

<table width="95%" border="0"  id="lst"  cellspacing="0" cellpadding="0">
  <tr class="tb-head"  style="font-weight : bold;">
    <td height="26" width="7%"  >Tipo de desarrollo</td>
    <td width="3%" >Codigo</td>
    <td width="4%" >Descripcion</td>
    <td width="7%" >Institucion</td>
    <td width="9%" >Fecha</td>
    <td width="9%" >Detalle</td>
    <td width="9%" ></td>
    <td width="3%" >&nbsp;</td>
    <td width="3%" >&nbsp;</td>
    <td width="3%" >&nbsp;</td>
    <td width="3%" >&nbsp;</td>
	<td width="3%" >&nbsp;</td>
  </tr>


<?

	while($fetch=fetch_array($resultado))
	{
		$consulta2 = " SELECT descripcion FROM nomadiestramiento where codigo = '".$fetch['codigo_ad']."' ";
		$resultado2 = query($consulta2,$conexion);
		$fetch2 = fetch_array($resultado2);
		
		$consulta3 = " SELECT descripcion FROM nominstituto where codigo = '".$fetch['codigo_inst']."' ";
		$resultado3 = query($consulta3,$conexion);
		$fetch3 = fetch_array($resultado3);

		?>
		<tr style="font-weight : bold;">
    		<td><? echo $fetch['tipo']; ?></td>
			<td><? echo $fetch['codigo']; ?></td>
    		<td><? echo $fetch2['descripcion']; ?></td>
    		<td><? echo $fetch3['descripcion']; ?></td>
		   <td><? echo $fetch['fecha']; ?></td>
    		<td><? echo $fetch['detalle']; ?></td>
    		<td></td>
    		<td></td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</tdwidth="3%">
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
			<td>&nbsp;</td>
  		</tr>


		<?
	}



?>



<table width="95%"  class="tb-head">
  <tr>
    <td width="7%"><label></label></td>
    <td width="10%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="2%"></td>
    <td width="2%"></td>
    <td width="2%"><?php btn('add','ag_adiestramiento.php') ?></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>
</p>
<p>&nbsp; </p>
</form>
</body>
</html>
