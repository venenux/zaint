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
AbrirVentana('barraprogreso_vacaciones.php',150,500,0);
}
</script>

<?php

//codigo para pagina;
$url="nomina_de_pago";
$TAMANO_PAGINA = 15;
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
$documento_list='nomina_de_vacaciones.php';
$documento_edit='ag_nomina_vacaciones.php';
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
		AbrirVentana('barraprogreso_vacaciones.php?registro_id='+id+'&codigo_nomina='+nomina,180,480,0);
	}
	
	if (op==5){	// Movimiento de Nómina
		parent.cont.location.href="movimientos_nomina_pago.php?codigo_nomina="+id+"&codt="+codtip+"&vac="+1
		
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
					parent.cont.location.href="nomina_de_vacaciones.php"
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
				parent.cont.location.href="nomina_de_vacaciones.php"
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
$pagina=@$_GET['pagina'];
$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];
$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];

if ($op==3) //Se presiono el boton de eliminar
{
	$query="delete from $nombre_tabla where $campo_1='".$registro_id."' and tipnom='".$_SESSION['codigo_nomina']."' and codtip = '".$_SESSION['codigo_nomina']."'";	
		
	$result=sql_ejecutar($query);
	$consulta="delete from nom_movimientos_nomina where codnom='".$registro_id."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$result=sql_ejecutar($consulta);
	activar_pagina($documento_list);		 
}     
if ($cadena != "") 		// Condicion para filtrado
{
		// para obtener la cantidad de registros
		$strsql="select COUNT(*) from $nombre_tabla";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_1,$campo_2,$campo_3,
		$campo_4,$campo_5,$campo_6,$campo_7,$campo_8,$campo_9,$campo_10);		
		$result =sql_ejecutar($strsql);			
		$fila = fetch_array($result);	
		$num_total_registros = $fila[0];	
	
		$strsql="select * from $nombre_tabla";
		$strsql=filtrado($criterio,$cadena,$strsql,$campo_1,$campo_2,$campo_3,
		$campo_4,$campo_5,$campo_6,$campo_7,$campo_8,$campo_9,$campo_10);		
		
		$strsql= "$strsql LIMIT $TAMANO_PAGINA OFFSET $limit";
		$result =sql_ejecutar($strsql);			
		 // para paginacion
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
else					// No se filtra y se muestran todos los datos
{	
	
	$strsql= "select COUNT(*) from $nombre_tabla where tipnom = ".$_SESSION['codigo_nomina']." and codtip = '".$_SESSION['codigo_nomina']."' and frecuencia='8'";
	$result =sql_ejecutar($strsql);	
	$fila = fetch_array($result);
	
	$num_total_registros = $fila[0];
	
	$strsql= "select * from $nombre_tabla where tipnom = ".$_SESSION['codigo_nomina']." and codtip = '".$_SESSION['codigo_nomina']."' and frecuencia='8' order by $campo_1,$campo_2 ";
	$result =sql_ejecutar($strsql);		
	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
}
$conexion=conexion();
$num_paginas=obtener_num_paginas($strsql);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $strsql);


//buscamos el valor maximo de la nomina

$consulta_max="select max(codnom) as maximo from nom_nominas_pago where tipnom='".$_SESSION['codigo_nomina']."' and frecuencia=8";
$resultado_max=query($consulta_max,$conexion);
$fila_max=fetch_array($resultado_max);

?>
</font></p>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<table width="100%" class="tb-tit">
<tr>
<td class="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="100%"><strong> <font color="#000066"><a href="nomina_de_pago.php"><img src="images/Clipboard.png" width="23" height="21" border="0" align="absmiddle" /></a> Lista de <?echo $termino?>s de Pago.- <?echo $termino?>: <?php echo ($_SESSION[nomina]) ?> </font></strong></td>
<td width="2%" align="right">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><div align="right"><?php btn('add','ag_nomina_vacaciones.php') ?></div></td>
<td><div align="right"> 
<?php btn('back','submenu_vacaciones.php') ?>
</div></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
<br>

<table width="100%" border="0"  id="lst"  cellspacing="0" cellpadding="0">
<tr class="tb-head"  style="font-weight : bold;">
<td height="29" width="6%"  ><?echo $termino?></td>
<td width="3%" >Tipo <?echo $termino?></td>
<td width="48%" >Descripci&oacute;n</td>
<td width="6%" >Estado</td>
<td width="9%" >Inicio</td>
<td width="9%" >Final</td>
<td width="9%" >Pago</td>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td>
</tr>
<?php 
//operaciones para paginaciones
$num_fila = 0;
$in=1+(($pagina-1)*5);
	
//ciclo para mostrar los datos 
while ($fila = fetch_array($resultado))
{ 
?>
<tr>
<td><?php echo $fila[$campo_1]; ?></td>
<td><?php echo $fila['tipnom']; ?></td>
<td><?php echo $fila[$campo_2]; ?></td>
<td><?php echo $fila[$campo_3]; ?></td> 
<td><?php echo date("d/m/Y",strtotime($fila[$campo_4]));?></td>
<td><?php echo date("d/m/Y",strtotime($fila[$campo_5]));?></td>
<td><?php echo date("d/m/Y",strtotime($fila[$campo_6]));?></td>

<td><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(5); ?>,<?php echo($fila[$campo_1]); ?>,<?php echo $_SESSION['codigo_nomina']?>,<? echo $fila['codtip']; ?>);"><img src="images/view.gif" title="Movimientos" width="16" height="16" border="0" align="absmiddle" ></a></font></td>
<?if($fila["status"]=="A"){?>
<td><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(4); ?>,<?php echo($fila[$campo_1]); ?>,<?php echo $_SESSION['codigo_nomina']?>,0);"><img src="img_sis/ico_propiedades.gif" title="Generar <?echo $termino?>" width="15" height="15" border="0" align="absmiddle" ></a></font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(2); ?>,<?php echo($fila[$campo_1]); ?>,0,0);"><img src="img_sis/ico_list.gif" title="Consutar <?echo $termino?>" width="15" height="15" border="0" align="absmiddle" ></a></font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila[$campo_1]); ?>,0,0);"><img src="../imagenes/delete.gif" title="Eliminar <?echo $termino?>" width="16" height="16" border="0" align="absmiddle" ></a></font></td>
<?icono("javascript:enviar(6,$fila[$campo_1],0,0)","Cerrar $termino","cancel.gif")?>
<?
}
else
{
?>
<?if($fila_max['maximo']==$fila['codnom']){
icono("javascript:enviar(7,$fila[$campo_1],0,0)","Abrir $termino","ok.gif");
}

?>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td>
<td width="3%" >&nbsp;</td><?
}?>
</tr>
<?php   
}//fin del ciclo while
//operaciones de paginacion
$num_fila++;
$in++;  
?>
<input name="codigo_nomina" type="hidden" value="">
<input name="registro_id" type="hidden" value="">
<input name="op" type="hidden" value="">
<input name="marcar_todos" type="hidden" value="1">
</table>

<? pie_pagina($url,$pagina,'',$num_paginas);?>
<p>&nbsp;</p>
<p>
</p>
<p>&nbsp; </p>
</form>
</body>
</html>
