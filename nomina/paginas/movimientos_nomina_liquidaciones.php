<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>

<?
include("../header.php");
include("../lib/common.php");
include("func_bd.php");


//javascript adicionales
?>
<script type="text/javascript" src="tabber.js"></script>
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<script language="JavaScript" type="text/javascript">

function VerRecibo()
{
	
AbrirVentana('../fpdf/rpt_recibo_pago_pdf.php?registro_id='+document.frmPrincipal.textfield.value+'&codt='+document.frmPrincipal.codt.value+'&codigo_nomina='+document.frmPrincipal.codigo_nomina.value,660,800,0);

}

function VerFoto()
{
AbrirVentana('mostrar_foto_empleado.php',360,390,0);
}

function BuscarPersonal(numpag)
{
AbrirVentana('buscar_empleado.php?codigo_nomina='+document.frmPrincipal.txtnomina.value+'&numpag='+numpag,550,650,0);
}

function BuscarNomina()
{
AbrirVentana('buscar_nomina_pago.php',660,700,0);
}

function Buscar(codnom,ficha,tipnom)
{
	document.frmPrincipal.action='movimientos_nomina_pago.php?codigo_nomina='+codnom+'&codt='+tipnom+'&ficha='+ficha;
	//document.frmPrincipal.opt.value=op;
	document.frmPrincipal.submit();		
}

function enviar(op,id,ficha){
	
	if (op==1){		// Opcion de Agregar
		//document.frmAgregar.registro_id.value=id;
		//document.frmPrincipal.op.value=op;
		AbrirVentana('movimientos_nomina_liquidacion_agregar.php?ficha='+document.frmPrincipal.textfield.value+'&nomina='+document.frmPrincipal.txtnomina.value,660,700,0);
	}
	if (op==6){		// Opcion de Generar
		if(confirm("Seguro desea generar nuevamente los conceptos para esta ficha?"))
		{
			AbrirVentana('movimientos_nomina_pago_agregar.php?todo=1&ficha='+document.frmPrincipal.textfield.value+'&nomina='+document.frmPrincipal.txtnomina.value+"&pagina="+document.frmPrincipal.pagina.value,660,700,0);
		}
	}
	if (op==2){	 	// Opcion de Modificar
		//alert($op);		
		document.frmPrincipal.registro_id.value=id;		
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.action="<?php echo $documento_edit; ?>";
		document.frmPrincipal.submit();		
	}
	
	if (op==3){		// Opcion de Eliminar
		if (confirm("Esta seguro que desea eliminar este concepto?"))
		{					
			document.frmPrincipal.registro_id.value=id;
			document.frmPrincipal.op.value=op;
			parent.cont.location.href="movimientos_nomina_liquidaciones_eliminar.php?nomina="+document.frmPrincipal.txtnomina.value+"&concepto="+id+"&ficha="+document.frmPrincipal.textfield.value+"&pagina="+document.frmPrincipal.pagina.value
		}		
	}
	
	if (op==4){		// Opcion de copiar
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.op.value=op;
		document.frmPrincipal.submit();
	}	
	if (op==5){		// Opcion de Eliminar
		if (confirm("Seguro desea eliminar los conceptos para esta ficha?"))
		{					
			document.frmPrincipal.registro_id.value=id;
			document.frmPrincipal.op.value=op;
			parent.cont.location.href="movimientos_nomina_pago_eliminar.php?todo=1&nomina="+document.frmPrincipal.txtnomina.value+"&concepto="+id+"&ficha="+document.frmPrincipal.textfield.value+"&pagina="+document.frmPrincipal.pagina.value
		}		
	}
	if (op==6){		// Generar Nómina
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.codigo_nomina.value=nomina;
		AbrirVentana('barraprogreso_1.php?registro_id='+id+'&codigo_nomina='+nomina,180,480,0);
	}	
	}

	function enviar2(id,nomina,ficha,pag)
	{	
		// Generar Nómina
		document.frmPrincipal.registro_id.value=id;
		document.frmPrincipal.codigo_nomina.value=nomina;
		AbrirVentana('barraprogreso_liq_vac.php?registro_id='+id+'&codigo_nomina='+nomina+'&ficha='+ficha+'&pag='+pag,180,480,0);
	}
	function liquidacion(tiponom,ficha)
	{
		AbrirVentana('liquidacion.php?tipo_nomina='+tiponom+'&ficha='+ficha,200,400,0);
	}
</script>

<?
//$prestaciones = $_GET['prestaciones'];

$dir = "nomina_de_liquidaciones.php";
/*
if($prestaciones == 1)
{
	$dir = "nomina_de_prestaciones.php";
}
//abrimos la conexion

*/
$conexion=conexion();

$pag = $_GET['pag'];
if(!$pag)
	$pag=0;

$cod_nomina=$_GET['codigo_nomina'];
$codt=$_GET['codt'];

if(isset($_GET['ficha']))
	$fichas = $_GET['ficha'];
elseif(isset($_POST['ficha']))
	$fichas = $_POST['ficha'];

$bandera = $_GET['bandera'];
//constantes
$url="movimientos_nomina_liquidaciones";
if($bandera==1)
{
	$consulta= "select pe.foto as foto, pe.ficha as ficha, pe.apenom as apenom, pe.cedula as cedula, pe.suesal as suesal, pe.codnivel1 as codnivel1, pe.codnivel2 as codnivel2, pe.estado as estado, pe.codnivel3 as codnivel3, pe.fecing as fecing, ca.des_car as cargo from nompersonal as pe join nomcargos as ca on(pe.codcargo=ca.cod_car) where pe.tipnom='".$_SESSION['codigo_nomina']."' and pe.ficha in (select ficha from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom='".$cod_nomina."') ";
}
else
{
	//obtenemos el personal de ese tipo de nomina
	$consulta= "select pe.foto as foto, pe.ficha as ficha, pe.apenom as apenom, pe.cedula as cedula, pe.suesal as suesal, pe.codnivel1 as codnivel1, pe.codnivel2 as codnivel2, pe.estado as estado, pe.codnivel3 as codnivel3, pe.fecing as fecing, ca.des_car as cargo from nompersonal as pe join nomcargos as ca on(pe.codcargo=ca.cod_car) where pe.tipnom='".$_SESSION['codigo_nomina']."' and pe.ficha='".$fichas."' ";
}

$consulta=$consulta." order by ficha";
$pagina=@$_GET['pagina'];

$num_paginas=obtener_num_paginas($consulta,1);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado_personal=query($consulta." limit ".($pagina-1).", ".$pagina."",$conexion);

//array de la ficha
$fila_personal=fetch_array($resultado_personal);

//variables


$ficha=$fila_personal['ficha'];

$selectra= new bd($_SESSION['bd']);
$resultado=$selectra->query("select * from nom_nominas_pago where codnom='".$cod_nomina."' and tipnom='".$_SESSION['codigo_nomina']."'");
$fila_nomina=$resultado->fetch_assoc();

//mostramos el titulo
if($fila_nomina['status']=="A")
{
	titulo_mejorada("Movimientos de $termino Nº: ".$cod_nomina.", Fecha de Inicio: ".fecha($fila_nomina[periodo_ini]).", Fecha Fin: ".fecha($fila_nomina[periodo_fin]),"","btn('print','VerRecibo();',2,'Imprimir Recibo');|btn('add','enviar(1,0)',2);|btn_mejorada('Borrar','enviar(5)','delete.gif');","$dir");
}
else
{
	titulo_mejorada("Movimientos de $termino Nº: ".$cod_nomina.", Fecha de Inicio: ".fecha($fila_nomina[periodo_ini]).", Fecha Fin: ".fecha($fila_nomina[periodo_fin]),"","btn('print','VerRecibo();',2,'Imprimir Recibo');","$dir");
}
//mostramos los detalles para la ficha actual
?>

<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<input type="hidden" name="registro_id" value="">
<input type="hidden" name="ficha" id="ficha" value="<? echo $fichas;?>">
<input type="hidden" name="opt"  value="">
<input type="hidden" name="codigo_nomina" id="codigo_nomina" value=" <?echo $cod_nomina;?> ">
<input type="hidden" name="pagina" value="<?echo $pagina;?>">
<input type="hidden" name="codt" id="codt" value="<?echo $codt;?>">

<table width="100%" border="0" >
<tr >
<td width="10%"><font size="2" face="Arial, Helvetica, sans-serif" >
<?echo $termino?>:
</font></td>
<td width="102"><font size="2" face="Arial, Helvetica, sans-serif" >
<input name="txtnomina" type="text" id="txtnomina" style="width:100px" value="<? echo $cod_nomina;?>" size="20">
</font></td>
<td width="20"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
<?php// btn('search',"Buscar(document.frmPrincipal.txtnomina.value,document.frmPrincipal.textfield.value,".$_SESSION['codigo_nomina'].");",2,'Mostrar') ?>
</font></td>
<td width="17"><!--<font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BuscarNomina();"><img src="../imagenes/list.gif" alt="Listar <?//echo $termino?>s Disponibles" width="16" height="16" border="0" align="absmiddle" ><label></label></a></font>--></td>
<td width="200"><!--<font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BuscarNomina();">
<label id=nomina><?//php echo $row[nombre_nomina]; ?></label></a></font>--></td>
<td width="71" rowspan="8" align="center"><img border="1" src="<?if($fila_personal['foto']==""){?>fotos/silueta.gif<?}else{echo $fila_personal['foto'];}?>" id="imgFoto" name="imgFoto" width="141" height="124" align="middle" class="ewTableAltRow" style="top:0px"></td>
<td width="8">&nbsp;</td>
<td width="145" colspan="2" rowspan="7" valign="middle" align="right" >
<table align="right" >
<tr>
<td><div align="right">Asignaciones:</div></td>
<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
<input  name="txtasignaciones" size="10" type="text" id="txtasignaciones" style="color : #000099; font-size : 14pt; text-align : right;" value="" readonly="true">
</font></div></td>
</tr>
<tr><TD colspan="2">
<br>
</TD>
</tr>
<tr>

      <td><div align="right">Deducciones:</div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="txtdeducciones" type="text" size="10" id="txtdeducciones" style="color : #FF0000; font-size : 14pt; text-align : right;" 
		value="" readonly="true">
      </font></div></td>
    </tr>
<tr><TD colspan="2"><br></TD></tr>
    <tr>
      
      <td><div align="right">Neto:</div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="txtneto" type="text" size="10" id="txtneto" style="color : #000099; font-size : 14pt; text-align : right;"   value="" readonly="true">
      </font></div></td>
    </tr>
</table></td>
      
    </tr>
    <tr class="">
      <td>Ficha:</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <input name="textfield" type="text" class="boton-text" id="textfield" style="width:100px"
		value="<?php echo $fila_personal['ficha']?>" size="20"></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php if($fila_nomina['status']=="A"){?><a href="javascript:BuscarPersonal(<?php echo $num_paginas;?>);"><img src="../imagenes/list.gif" alt="Listar personal segun <?echo $termino?>" width="16" height="16" border="0" align="left" ></a><?php } ?></font><!--<font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <?//php btn('search',"Buscar(document.frmPrincipal.txtnomina.value,$cod_nomina,7);",2,'Mostrar') ?>
      </font>--></td>
      <td colspan="2"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <label></label>
        <a href="javascript:enviar(<?php echo(5); ?>,<?php echo($fila[$campo_1]); ?>);"></a></font></td>
    </tr>
    <tr class="">
      <td>Nombre:</td>
      <td colspan="4"><label>
        <input name="txtnombre" type="text" value="<?echo "$fila_personal[apenom]";?>" id="txtnombre" readonly="true" style="width:250px">
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr class="">
      <td>C&eacute;dula:</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input name="txtcedula" value="<?echo "$fila_personal[cedula]";?>" type="text" readonly="true" id="txtcedula">
        </label>
      </font></td>
      <td>&nbsp;</td>
    </tr>
    <tr class="">
      <td>Sueldo</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input name="sueldo" type="text" readonly="true" value="<?echo $fila_personal[suesal];?>" id="sueldo" >
        </label>
      </font></td>
      <td><label></label></td>
    </tr>
<tr class="">
      <td>Nivel Funcional</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input name="niv_funcional" type="text" readonly="true" id="niv_funcional" value="<? echo $fila_personal['codnivel1'].".".$fila_personal['codnivel2'].".".$fila_personal['codnivel3']; ?>">
        </label>
      </font></td>
      <td><label></label></td>
    </tr>
<tr class="">
      <td>Fecha de Ingreso</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input value="<?echo fecha($fila_personal[fecing]);?>" name="fec_ing" type="text" value="" readonly="true" id="fec_ing" >
        </label>
      </font></td>
      <td id="antiguedad"></td>

    </tr>
<tr class="">
      <td>Cargo</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input value="<?echo "$fila_personal[cargo]";?>" name="fec_ing" type="text" value="" readonly="true" id="fec_ing" size="35" >
        </label>
      </font></td>
      <td id="antiguedad"></td>

    </tr>
<tr class="">
      <td>Situaci&oacute;n</td>
      <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif" class="ewTableHeader">
        <label>
        <input value="<?echo "$fila_personal[estado]";?>" name="cargo" type="text" readonly="true" size="20" id="cargo" >
        </label>
      </font></td>
      <td >&nbsp;</td>
<td align="right">

<table><TR><TD></TD>
<TD></TD></TR></table>
</td>
    </tr>
    <tr class="">
      <td>&nbsp;</td>
      <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><?php if($fila_nomina['status']=="A"){?><a href="javascript:enviar2(<?php echo($cod_nomina); ?>,<?php echo $_SESSION['codigo_nomina']?>,<?php echo($fila_personal['ficha']); ?>,<?php echo($pag); ?>);"><img src="img_sis/ico_propiedades.gif" title="Generar <?echo $termino?>" width="15" height="15" border="0" align="absmiddle" > &nbsp;&nbsp;Generar Liquidaci&oacute;n</a><?php } ?></font></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><?php if($fila_nomina['status']=="A"){?><a href="javascript:liquidacion(<?php echo $_SESSION['codigo_nomina']?>,<?php echo($fila_personal['ficha']); ?>);"><img src="images/save.gif" title="Datos de liquidaci&oacute;n" width="15" height="15" border="0" align="absmiddle" > &nbsp;&nbsp;Datos de liquidaci&oacute;n</a><?php } ?></font></td>
      <td><div align="center">
        <input type="button" value="Ampliar Foto" onClick="VerFoto();">
      </div></td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
</table>


<?
$consulta="select * from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom='".$cod_nomina."' and ficha='".$ficha."'";
// echo $_SESSION['codigo_nomina'];
$resultado_movimientos=query($consulta,$conexion);

?>


<div class="tabber">
<div class="tabbertab">
  <h2>Conceptos Imprimibles</h2>
<table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    <tr class="tb-head"> 
    	<td width="5%" height="21" align="right" > 
			<div align="left" class="tb-head"><font size="2" face="Arial, Helvetica, sans-serif">Concepto</font></div>	  </td>
		
        <td width="43%" ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n</font></div></td>
        <td width="10%" ><div align="left">Referencia</div></td>
        <td width="6%" ><div align="left">Unidad</div></td>
        <td width="13%" ><div align="left">Asignaciones</div></td>
        <td width="13%" ><div align="left">Deducciones</div></td>
			<td width="13%" ><div align="left">Patronales</div></td>
      <td width="2%" >&nbsp;</td>
    </tr>
    <tr> 	
      <?php 
	if (num_rows($resultado_movimientos)>0)
	{
	
	?>
	
	<?php	
	
  	while ($fila = fetch_array($resultado_movimientos))
  	{ 
	$consulta="select * from nomconceptos where codcon='".$fila['codcon']."'";
	$res=query($consulta,$conexion);
	$fila_con=fetch_array($res);
			
	if ($fila_con[impdet]=='S'){
	if ($fila[tipcon]=='D')
		{$monto_ded=$monto_ded+$fila[monto];}
	else if ($fila[tipcon]=='A')
		{$monto_asig=$monto_asig+$fila[monto];}
	
  	?>
      <td height="20"   class="ewTableRow"> <div align="left" class="row-even"><font size="2" face="Arial, Helvetica, sans-serif">	
          <?php 
		  echo $fila[codcon]; 	// codigo 
		  ?>
      </font></div></td>
      <td   class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  	echo $fila[descrip];  	// descripcion
	  	?>
      </font></div></td>
      <td   class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
			
			if($fila[valor]!=0 and $fila_con['verref']==1){
				echo $fila[valor]; 
			} 	
	  	?>
      </font></div></td>
      <td   class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		echo $fila[unidad];
	  	?>
      </font></td>
      <td   align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php
		if ($fila[tipcon]=='A')
		{
		echo number_format($fila['monto'],2,',','.');
		}
	  	?>
      </font></td>
      <td    align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		if ($fila[tipcon]=='D')
		{
		echo number_format($fila[monto],2,',','.');
		}
	  	?>
      </font></td>
		<td    align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		if ($fila[tipcon]=='P')
		{
		echo number_format($fila[monto],2,',','.');
		}
	  	?>
      </font></td>
      <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?if($fila_nomina['status']=="A"){?> <a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila['codcon']); ?>);"><img src="../imagenes/delete.gif" alt="Elimina el Registro Actual" width="16" height="16" border="0" align="absmiddle" ></a><?}?></font></div></td>
    </tr>
    <?php   
  	}
}
	$monto_neto=$monto_asig-$monto_ded;
	$num_fila++;
  	$in++;  
	}else{?><td   colspan="8" >No existen Conceptos Imprimibles para esta ficha</td><?}
  	?>
    <input name="registro_id" type="hidden" value="">
	<input name="nombre_tabla" type="hidden" value="<?php echo $nombre_tabla; ?>">
    <input name="op" type="hidden" value="">	
</table>
	<script>
	document.frmPrincipal.txtasignaciones.value='<?php echo number_format($monto_asig,2,',','.'); ?>';
	document.frmPrincipal.txtdeducciones.value='<?php echo number_format($monto_ded,2,',','.'); ?>';
	document.frmPrincipal.txtneto.value='<?php echo number_format($monto_neto,2,',','.'); ?>';
	</script>
  
 



<?
//paginacion
pie_pagina($url,$pagina,"codigo_nomina=".$cod_nomina."&codt=".$codt."&bandera=".$bandera,$num_paginas);


?>
</div>

<div class="tabbertab">
  <h2>Conceptos no Imprimibles</h2>
<table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    <tr class="tb-head"> 
    	<td width="5%" height="21" align="right" > 
			<div align="left" class="tb-head"><font size="2" face="Arial, Helvetica, sans-serif">Concepto</font></div>	  </td>
		
        <td width="43%" ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n</font></div></td>
        <td width="10%" ><div align="left">Referencia</div></td>
        <td width="6%" ><div align="left">Unidad</div></td>
        <td width="13%" ><div align="left">Asignaciones</div></td>
        <td width="13%" ><div align="left">Deducciones</div></td>
			<td width="13%" ><div align="left">Patronales</div></td>
      <td width="2%" >&nbsp;</td>
    </tr>
    <tr> 	
      <?php 
$consulta="select * from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom='".$cod_nomina."' and ficha='".$ficha."'";

$resultado_movimientos=query($consulta,$conexion);

	if (num_rows($resultado_movimientos)>0)
	{
	
	?>
	
	<?php	
	
  	while ($fila = mysql_fetch_array($resultado_movimientos))
  	{ 
	$consulta="select * from nomconceptos where codcon='".$fila['codcon']."'";
	$res=query($consulta,$conexion);
	$fila_con=fetch_array($res);
			
	if ($fila_con[impdet]=='N'){
	/*if ($fila[tipcon]=='D')
		{$monto_ded=$monto_ded+$fila[monto];}
	else if ($fila[tipcon]=='A')
		{$monto_asig=$monto_asig+$fila[monto];}
	*/
  	?>
      <td height="20"   class="ewTableRow"> <div align="left" class="row-even"><font size="2" face="Arial, Helvetica, sans-serif">	
          <?php 
		  echo $fila[codcon]; 	// codigo 
		  ?>
      </font></div></td>
      <td   class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
	  	echo $fila[descrip];  	// descripcion
	  	?>
      </font></div></td>
      <td   class="ewTableRow"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
			
			if($fila[valor]!=0 and $fila_con['verref']==1){
				echo $fila[valor]; 
			} 	
	  	?>
      </font></div></td>
      <td   class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		echo $fila[unidad];
	  	?>
      </font></td>
      <td   align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php
		if ($fila[tipcon]=='A')
		{
		echo number_format($fila['monto'],2,',','.');
		}
	  	?>
      </font></td>
      <td    align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		if ($fila[tipcon]=='D')
		{
		echo number_format($fila[monto],2,',','.');
		}
	  	?>
      </font></td>
		<td    align="right" class="ewTableRow"><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
		if ($fila[tipcon]=='P')
		{
		echo number_format($fila[monto],2,',','.');
		}
	  	?>
      </font></td>
      <td   ><div align="center"><? if($fila_nomina['status']=="A"){?><font size="2" face="Arial, Helvetica, sans-serif"> <a href="javascript:enviar(<?php echo(3); ?>,<?php echo($fila['codcon']); ?>);"><img src="../imagenes/delete.gif" title="Elimina el Registro Actual" alt="Elimina el Registro Actual" width="16" height="16" border="0" align="absmiddle" ></a></font><?}?></div></td>
    </tr>
    <?php   
  	}
}
	$monto_neto=$monto_asig-$monto_ded;
	$num_fila++;
  	$in++;  
	}else{?><td   colspan="8" >No existen Conceptos No Imprimibles para esta ficha</td><?}
?>
<input name="registro_id" type="hidden" value="">
<input name="nombre_tabla" type="hidden" value="<?php echo $nombre_tabla; ?>">
<input name="op" type="hidden" value="">	
</table>
<script>
document.frmPrincipal.txtasignaciones.value='<?php echo number_format($monto_asig,2,',','.'); ?>';
document.frmPrincipal.txtdeducciones.value='<?php echo number_format($monto_ded,2,',','.'); ?>';
document.frmPrincipal.txtneto.value='<?php echo number_format($monto_neto,2,',','.'); ?>';
</script>

<?
//paginacion
pie_pagina($url,$pagina,"&codigo_nomina=".$cod_nomina."&codt=".$codt."&bandera=".$bandera,$num_paginas);
?>
</div>
</div>
</form>
</body>
</html>
