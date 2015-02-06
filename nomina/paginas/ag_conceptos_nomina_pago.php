<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<script language="JavaScript"  type="text/javascript">

function actualizar_registro(valor){

document.getElementById('registro_id').value=document.getElementById(valor).value

}
function LimiarFormula()
{	
	if (confirm("Esta seguro que limpiar el campo de fórmula ?"))
	{
		document.frmPrincipal.txtformula.value='';
	}
}
function AgregarVariablesPersonal()
{
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('campos_personal.php',660,700,0);
	}else{
		alert("Debe introducir un Codigo de Concepto Valido")
	}
}
function AgregarFunciones()
{
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('funciones_aplicacion.php',660,700,0);
	}else{
		alert("Debe introducir un Codigo de Concepto Valido")
	}
}
function AgregarConstantesPersonal()
{
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('agregar_constantes_personal.php',660,700,0);
	}else{
		alert("Debe introducir un Codigo de Concepto Valido")
	}
}

function SumarCampoFormula()
{

	insertAtCursor(document.frmPrincipal.txtformula,document.frmPrincipal.txtformula_aux.value);
}

function insertAtCursor(myField, myValue) {

	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = myValue;
	}
	
	else if (myField.selectionStart || myField.selectionStart == '0') {
	
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
	
		myField.value = myField.value.substring(0, startPos)+ myValue + myField.value.substring(endPos, myField.value.length);
	
	} else {
	
		myField.value += myValue;
	
	}

}



function AgregarTipoNomina(){
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('buscar_tipos_nominas.php?txtcodigo='+document.frmPrincipal.txtcodigo.value,660,700,0);
	}else{
		alert("Debe introducir un Codigo de Concepto Valido")
	}
}
function AgregarTipoFrecuencia(){
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('buscar_tipos_frecuencias.php?txtcodigo='+document.frmPrincipal.txtcodigo.value,660,700,0);
	}else{
			alert("Debe introducir un Codigo de Concepto Valido")
		}
	}
function AgregarTipoSituaciones(){
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('buscar_tipos_situaciones.php?txtcodigo='+document.frmPrincipal.txtcodigo.value,660,700,0);
	}else{
			alert("Debe introducir un Codigo de Concepto Valido")
		}
	}
function AgregarTipoAcumulados(){
	if(document.frmPrincipal.txtcodigo.value!=""){
		AbrirVentana('buscar_tipos_acumulados.php?txtcodigo='+document.frmPrincipal.txtcodigo.value,660,700,0);
	}else{
			alert("Debe introducir un Codigo de Concepto Valido")
		}
	}

function Borrar(id,op)
{
if (confirm("Esta seguro que desea eliminar el registro ?"))
		{					
			document.frmPrincipal.relacion_id.value=id;
			document.frmPrincipal.op_tp.value=op;
			document.frmPrincipal.submit();
		}	
}

function BorrarTodo(id,op)
{

	if (confirm("Esta seguro que desea eliminar todas esta relaciones para este concepto"))
		{					
			document.frmPrincipal.relacion_id.value=0;
			document.frmPrincipal.op_tp.value=op;
			document.frmPrincipal.submit();
		}	
}

function Enviar(){					
		
	if (document.frmPrincipal.registro_id.value==0){ 
		
		document.frmPrincipal.op_tp.value=1}
	else{ 	
		document.frmPrincipal.op_tp.value=2}		
	
	if (document.frmPrincipal.txtdescripcion.value==0){
		document.frmPrincipal.op_tp.value=-1
		alert("Debe ingresar una descripción valida. Verifique...");
	}				
}

</script>
<?php
// Usuarios de una version anterior a 4.3.0 de PHP, pueden hacer esto:
function unhtmlentities($cadena)
{
    // reemplazar entidades numericas
    $cadena = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $cadena);
    $cadena = preg_replace('~&#([0-9]+);~e', 'chr(\\1)', $cadena);
    // reemplazar entidades literales
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($cadena, $trans_tbl);
}

$campo_clave='codcon';
$documento_list='conceptos_nomina_pago.php';
$documento_edit='ag_conceptos_nomina_pago.php';
$nombre_modulo='Concepto Nómina de Pago';
?>


<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<script type="text/javascript" src="tabber.js"></script>
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="example-print.css" TYPE="text/css" MEDIA="print">




<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
</head>

<?php 
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");	
	
	include ("interpretar_campos.php");
	
	if (isset($HTTP_GET_VARS[nombre_tabla]))
	{$nombre_tabla=$HTTP_GET_VARS[nombre_tabla];}
	else{$nombre_tabla=$_POST[nombre_tabla];}
	
	$registro_id=$_POST[registro_id];
	if($_POST['txtcodigo']!=""){
		$registro_id2=$_POST['txtcodigo'];
	}else{
		$registro_id2=$_POST[registro_id];
	}
	$op_tp=$_POST[op_tp];
	
	if ($op_tp>3) // borrar relaciones tipo
	{
		$relacion_id=$_POST[relacion_id];	
		
		if ($op_tp==4) // bora la relacion con tipo del nomina
		{$tabla_relacion="nomconceptos_tiponomina";
		$campo_relacion="codtip";}
		else if ($op_tp==5) // bora la relacion con tipo de frecuencias
		{$tabla_relacion='nomconceptos_frecuencias';
		$campo_relacion='codfre';}
		else if ($op_tp==6) // bora la relacion con situaciones
		{$tabla_relacion='nomconceptos_situaciones';
		$campo_relacion='estado';}
		else if ($op_tp==7) // bora la relacion con tipo de acumulados
		{$tabla_relacion='nomconceptos_acumulados';
		$campo_relacion='cod_tac';}
		
		if ($relacion_id=='0'){
			$query="delete from $tabla_relacion where codcon='".$registro_id2."'";				
			
			$result=sql_ejecutar($query);	
		}
		else{
			$query="delete from $tabla_relacion where codcon='".$registro_id2."' and $campo_relacion='".$relacion_id."'";				
			
			$result=sql_ejecutar($query);	
		}
	}
	
	if ($registro_id==0){ // Si el registro_id es 0 se va a agregar un registro nuevo
				
		if ($op_tp==1){
			$codigo_nuevo=AgregarCodigo("$nombre_tabla","$campo_clave");
		
			if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
			if (isset($_POST[chkImprimeDetalles])){$imprimedetalles='S';}else{$imprimedetalles='N';}
			if (isset($_POST[chkSeProrratea])){$prorratea=1;}else{$prorratea=0;}
			if (isset($_POST[chkUsaDescripcionAlternativa])){$descripcionalternativa='S';}else{$descripcionalternativa='N';}
			if (isset($_POST[chkBonificable])){$bonificable=1;}else{$bonificable=0;}
			if (isset($_POST[chkHojaTiempo])){$hojatiempo=1;}else{$hojatiempo=0;}
			if (isset($_POST[chkMuestraValorReferencia])){$valorreferencia=1;}else{$valorreferencia=0;}
			if (isset($_POST[chkMuestraMontoCalculo])){$muestramontocalculo=1;}else{$muestramontocalculo=0;}
			if (isset($_POST[chkNoAgregarMontoCero])){$agregarmontocero=1;}else{$agregarmontocero=0;}
			if (isset($_POST[chkModificaDescripcion])){$modificadescripcion=1;}else{$modificadescripcion=0;}
			if (isset($_POST[chkModificaDescripcion])){$modificadescripcion=1;}else{$modificadescripcion=0;}
			if (isset($_POST[chkNoPermiteModificarValor])){$permitemodificarvalor=1;}else{$permitemodificarvalor=0;}
			$query="select * from $nombre_tabla where codcon='$_POST[txtcodigo]'";
			$result=sql_ejecutar($query);	
			if(mysql_num_rows($result)==0){	
				$query="insert into $nombre_tabla values(
				'$_POST[txtcodigo]',
				'$_POST[txtdescripcion]',
				'$_POST[optConcepto]',
				'$_POST[optUnidad]',
				'$_POST[txtcuenta1]',
				'$_POST[contractual]',
				'$_POST[chkImprimeDetalles]',
				'$_POST[chkSeProrratea]',
				'$_POST[chkUsaDescripcionAlternativa]',
				'',
				'$_POST[txtformula]',
				'$_POST[chkModificaDescripcion]',
				'0',
				'$_POST[cboTercero]',
				'$_POST[txtcentrocosto]',
				'0',
				'',
				'$_POST[chkBonificable]',
				'$_POST[chkHojaTiempo]',
				'$_POST[txtvalordefecto]',
				'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
				'0',
				'$_POST[chkMuestraValorReferencia]',
				'$_POST[chkMuestraMontoCalculo]',
				'0',
				'$_POST[chkNoAgregarMontoCero]',
				'0',
				'0',
				'0',
				'',
				'$_POST[txtcuenta2]')";
			$result=sql_ejecutar($query);			
			activar_pagina($documento_list."?pagina=".$_POST['retorno']);				
		}else{
			mensaje("El codigo de concepto introducido ya esta siendo usado");
		}
		}
	}
	else {// Si el registro_id es mayor a 0 se va a editar el registro actual
		
		$query="select * from $nombre_tabla where $campo_clave=$registro_id";
		$result=sql_ejecutar($query);	
		$row = mysql_fetch_array ($result);	
		
		$codigo=$row[$campo_clave];		
		$nombre=$row[descrip];
		$tipo_concepto=$row[tipcon];
		$prorratea=$row[proratea];
		$unidad=$row[unidad];		
		$agregar_monto_cero=$row[montocero];
		$cuenta_cont1=$row[ctacon];
		$cuenta_cont2=$row[ctacon1];
		$muestra_monto_calculo=$row[vermonto];
		$modifica_descripcion=$row[modifdef];
		$imprime_detalle=$row[impdet];
		$muestra_referencia=$row[verref];		
		$descripcion_alternativa=$row[usaalter];
		$tercero=$row[tercero];
		$centro_costo=$row[ccosto];
		$bonificable=$row[bonificable];
		$hoja_tiempo=$row[htiempo];
		$contractual=$row[contractual];
		$valor_defecto=$row[valdefecto];
		$permite_modificar_valor=$row[semodifica];
		$formula=$row[formula];
						
	}	
		
	if ($op_tp==2){					
			
			if (isset($_POST[chkUsarTablas])){$usartablas=1;}else{$usartablas=0;}
			if (isset($_POST[chkImprimeDetalles])){$imprimedetalles='S';}else{$imprimedetalles='N';}
			if (isset($_POST[chkSeProrratea])){$prorratea=1;}else{$prorratea=0;}
			if (isset($_POST[chkUsaDescripcionAlternativa])){$descripcionalternativa=1;}else{$descripcionalternativa=0;}
			if (isset($_POST[chkBonificable])){$bonificable=1;}else{$bonificable=0;}
			if (isset($_POST[chkHojaTiempo])){$hojatiempo=1;}else{$hojatiempo=0;}
			if (isset($_POST[chkMuestraValorReferencia])){$valorreferencia=1;}else{$valorreferencia=0;}
			if (isset($_POST[chkMuestraMontoCalculo])){$muestramontocalculo=1;}else{$muestramontocalculo=0;}
			if (isset($_POST[chkNoAgregarMontoCero])){$agregarmontocero=1;}else{$agregarmontocero=0;}
			if (isset($_POST[chkModificaDescripcion])){$modificadescripcion=1;}else{$modificadescripcion=0;}
			if (isset($_POST[chkModificaDescripcion])){$modificadescripcion=1;}else{$modificadescripcion=0;}
			if (isset($_POST[chkNoPermiteModificarValor])){$permitemodificarvalor=1;}else{$permitemodificarvalor=0;}
			
			$query="UPDATE $nombre_tabla set $campo_clave=$registro_id,
			descrip='$_POST[txtdescripcion]',
			tipcon='$_POST[optConcepto]',
			unidad='$_POST[optUnidad]',
			ctacon='$_POST[txtcuenta1]',
			ctacon1='$_POST[txtcuenta2]',
			contractual='$_POST[contractual]',
			impdet='$imprimedetalles',
			proratea='$prorratea',
			usaalter='$descripcionalternativa',
			descalter='',
			formula='$_POST[txtformula]',
			modifdef='$modificadescripcion',
			markar=0,
			tercero='$_POST[cboTercero]',
			ccosto='$_POST[txtcentrocosto]',
			codccosto=0,
			debcre='',
			bonificable='$bonificable',
			htiempo='$hojatiempo',
			valdefecto='$_POST[txtvalordefecto]',
			con_cu_cc=0,
			con_mcun_cc=0,
			con_mcuc_cc=0,
			con_cu_mccn=0,
			con_cu_mccc=0,
			con_mcun_mccn=0,
			con_mcuc_mccc=0,
			con_mcun_mccc=0,
			con_mcuc_mccn=0,
			nivelescuenta=0,
			nivelesccosto=0,
			semodifica='$permitemodificarvalor',
			verref='$valorreferencia',
			vermonto='$muestramontocalculo',
			particular='0',
			montocero='$agregarmontocero',
			ee='0',
			fmodif='0',
			aplicaexcel='0',
			descripexcel=''
			where $campo_clave=$registro_id";	
					
			$result=sql_ejecutar($query);				
			activar_pagina($documento_list."?pagina=".$_POST['retorno']);										
		{			
	}
}	


?>
<body>
<form action="" method="post" name="frmPrincipal" id="frmPrincipal">
<input type="hidden" name="retorno" value="<?if(isset($_POST['retorno'])){echo $_POST['retorno'];}else{echo $_POST['pagina'];}?>">
<div class="tabber">
<div class="tabbertab">
  <h2>
  Datos Generales
  </h2>
	  
  <input name="op_tp" type="Hidden" id="op_tp" value="-1">
  <input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $registro_id; ?>">
  <input name="nombre_tabla" type="hidden" value="<?php echo $nombre_tabla; ?>">
  <input name="relacion_id" type="Hidden" id="relacion_id" value="-1" >
  
  <table width="789" height="343" border="0" class="row-br">
    
    <tr>
      <td width="781" height="337" class="ewTableAltRow"><table width="781" border="0" bordercolor="#0066FF">
        
        <tr bgcolor="#FFFFFF">
          <td width="205" height="23" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">Concepto:</font></td>
          <td width="291" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcodigo" type="text" id="txtcodigo" style="width:100px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?if($codigo!=""){echo $codigo;?>" readonly="true" <?}else{echo $_POST['txtcodigo'];?>"<?}?> maxlength="10" >
          </font></td>
          <td width="126" bgcolor="#FFFFFF" class="ewTableAltRow" >Codigo Material: </td>
          <td width="141" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcentrocosto" type="text" id="txtcentrocosto" style="width:130px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php
			if (isset($_POST[txtcentrocosto]))
			{echo $_POST[txtcentrocosto];}
			else
			{echo $centro_costo;}			
			?>" maxlength="10">
          </font></td>
        </tr>
        
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="24" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">Descripci&oacute;n:</font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtdescripcion" type="text" id="txtdescripcion" style="width:240px" value="<?php
			if (isset($_POST[txtdescripcion]))
			{echo $_POST[txtdescripcion];}
			else
			{echo $nombre;}
			?>
			" maxlength="60">
          </font></td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" >Cuenta contabilidad: </td>
          <td valign="middle" bgcolor="#FFFFFF" class="ewTableAltRow" ><font size="2" face="Arial, Helvetica, sans-serif">
<?$consulta="select * from cwconcue";
$resultado_cuenta=sql_ejecutar($consulta,$conexion);?>
<SELECT name="txtcuenta1" id="txtcuenta1">
<?
while($fila_con=mysql_fetch_array($resultado_cuenta)){
?>
<option   <? if($_POST['txtcuenta1']==$fila_con['Cuenta']){?> selected="true" <?}elseif($cuenta_cont1==$fila_con['Cuenta']){?> selected="true" <?}?> value="<?echo $fila_con['Cuenta']?>" title="<?echo $fila_con['Descrip']?>"> <?echo $fila_con['Cuenta']?></option>
<?
}

?> 
</SELECT>

          </font></td>
        </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="26" bgcolor="#FFFFFF" class="ewTableAltRow">Tipo de Concepto: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow">
		  <?php
			if (isset($_POST[optConcepto]))
				{$tipo_concepto=$_POST[optConcepto];}
		  ?>
            <input name="optConcepto" type="radio" value="A"
			<?php
			if ($tipo_concepto=='A')
				{?> checked="true"<?php }?>>
          Asignaci&oacute;n 
          <input name="optConcepto" type="radio" value="D"
		  <?php if ($tipo_concepto=='D'){?> checked="true"	<?php }?>>
          Deducci&oacute;n 
          <input name="optConcepto" type="radio" value="P"
		  <?php if ($tipo_concepto=='P'){?> checked="true"	<?php }?>>
          Patronal
         </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow">Cuenta presupuestaria: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
<?$consulta="select * from cwprecue where CHARACTER_LENGTH(CodCue) = 13 AND (LEFT(CodCue,5)='4.01.' OR LEFT(CodCue,5)='4.07.')";
$resultado_cuenta=sql_ejecutar($consulta,$conexion);?>
<SELECT name="txtcuenta2" id="txtcuenta2">
<?
while($fila_con=fetch_array($resultado_cuenta)){
?>
<option   <? if($_POST['txtcuenta2']==$fila_con['CodCue']){?> selected="true" <?}elseif($cuenta_cont2==$fila_con['CodCue']){?> selected="true" <?}?> value="<?echo $fila_con['CodCue']?>" title="<?echo $fila_con['Denominacion']?>"> <?echo $fila_con['CodCue']?></option>
<?
}

?> 
</SELECT>
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="25" bgcolor="#FFFFFF" class="ewTableAltRow"> </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            
            </select>
          </font></td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow">Valor Por Defecto: </td>
          <td bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtvalordefecto" type="text" id="txtvalordefecto"  style="width:130px" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php
			if (isset($_POST[txtvalordefecto]))
			{echo $_POST[txtvalordefecto];}
			else
			{echo $valor_defecto;}
			?>" maxlength="10">
          </font></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="23" bgcolor="#FFFFFF" class="ewTableAltRow">Unidad:</td>
          <td colspan="3" bgcolor="#FFFFFF" class="ewTableAltRow">
		  <?php
			if (isset($_POST[optUnidad]))
				{$unidad=$_POST[optUnidad];}
		  ?>
		  <input name="optUnidad" type="radio" value="M"
		  <?php if ($unidad=='M'){?> checked="true"	<?php }?>>
Monto
  <input name="optUnidad" type="radio" value="H"
  <?php if ($unidad=='H'){?> checked="true"	<?php }?>>
Horas
<input name="optUnidad" type="radio" value="P"
<?php if ($unidad=='P'){?> checked="true"	<?php }?>>
Porcentaje 
<input name="optUnidad" type="radio" value="D"
<?php if ($unidad=='D'){?> checked="true"	<?php }?>>
D&iacute;as 
<input name="optUnidad" type="radio" value="S"
<?php if ($unidad=='S'){?> checked="true"	<?php }?>>
Semanas </td>
        </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="26" colspan="4" bgcolor="#FFFFFF" class="ewTableAltRow"><fieldset>
            <legend>Opciones</legend>
            <table width="685" border="0">
              <tr>
                <td width="225"><label>
                  <input name="chkImprimeDetalles" value="S" type="checkbox" id="chkImprimeDetalles"
				  <?php  if ($imprime_detalle=='S') { ?> checked="checked" <?php }?>
				  >
                &iquest; Se imprime en detalles? </label></td>
                <td width="222"><label><input name="chkSeProrratea" type="checkbox" id="chkSeProrratea" value="1"
				<?php if ($prorratea==1){?> 	 checked="checked"<?php }?>>
&iquest; Se prorratea? </label></td>
                <td><label><input name="contractual" type="checkbox" id="contractual" value="1"
				<?php if ($contractual==1){?>	 checked="checked"<?php }?>>
&iquest;Es contractual?</label> </td>
                </tr>
              <tr>
                <td><label><input name="chkUsaDescripcionAlternativa" type="checkbox" id="chkUsaDescripcionAlternativa" value="1"
				<?php if ($descripcion_alternativa==1){?>	 checked="checked"<?php }?>>
&iquest; Usa descripci&oacute;n alternativa?</label> </td>
                <td><label><input name="chkModificaDescripcion" type="checkbox" id="chkModificaDescripcion" value="1"
				<?php if ($modifica_descripcion=="1"){?>	 checked="checked"<?php }?>>
&iquest; Se modifica la descripci&oacute;n? </label></td>
                <td><label><input name="chkBonificable" type="checkbox" id="chkBonificable" value="1"
				<?php if ($bonificable==1){?>	 checked="checked"<?php }?>>
&iquest; Bonificable ? </label></td>
                </tr>
              <tr>
                <td><label><input name="chkMuestraValorReferencia" type="checkbox" id="chkMuestraValorReferencia" value="1"
				<?php 
				
				if ($muestra_referencia==1){?>	 checked="checked"<?php }?>>
                  &iquest; Muestra valor de referencia? </label></td>
                <td><label><input name="chkMuestraMontoCalculo" type="checkbox" id="chkMuestraMontoCalculo" value="1"
				<?php if ($muestra_monto_calculo==1){?>	 checked="checked"<?php }?>>
                  &iquest; Muestra el monto del calculo? </label></td>
                <td><label><input name="chkNoAgregarMontoCero" type="checkbox" id="chkNoAgregarMontoCero" value="1"
				<?php if ($agregar_monto_cero==1){?>	 checked="checked"<?php }?>>
                  &iquest; No agregar si el monto es (0)? </label></td>
              </tr>
              <tr>
                <td><label><input name="chkHojaTiempo" type="checkbox" id="chkHojaTiempo" value="1"
				<?php if ($hoja_tiempo==1){?>	 checked="checked"<?php }?>>
&iquest;Hoja de tiempo?</label> </td>
                <td></td>
                <td>&nbsp;</td>
                </tr>
            </table>
            </fieldset>            
       	</td>
          </tr>
        <tr bgcolor="#FFFFFF">
          <td height="72" colspan="4" bgcolor="#FFFFFF" class="ewTableAltRow"><table width="100%" border="1" cellpadding="0"  cellspacing="0" bordercolor="#A7BBCF" bgcolor="#FFFFFF" class="row-br" id="lst">
            <tr bgcolor="#CCCCCC" class="ewTableHeader">
              <td width="25%" height="21" colspan="2" align="right" class="row-br"><div align="left" class="Estilo2"><span class="">Aplica a los Tipos de <?echo $termino?></span></div></td>
              <td width="25%" class="row-br"><span class="Estilo1"></span>
                <div align="left">Aplica a las Frecuencias: </div></td>
              <td width="26%" class="row-br"><div align="left">Aplica a las Situaciones: </div></td>
              <td width="24%" class="row-br"><div align="left">Acumula a:</div></td>
            </tr>
            <tr bgcolor="#CCCCCC" class="ewTableHeader">
              <td height="26" colspan="2" align="right" class="ewTableRow"><table width="188" border="0" class="ewTableRow">
                <?php
				 if ($registro_id2>0)
				 {
				 	
					$query="select * from nomvis_conceptos_tiposnomina where codcon=$registro_id2";					
					$result=sql_ejecutar($query);
					

	 	  			//ciclo para mostrar los datos
  					while ($row = mysql_fetch_array($result))
  					{ 
					?>
                <tr>
                  <td width="17"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:Borrar(<?php echo $row[codtip]; ?>,4);"><img src="images/b_drop.png" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ></a></font></div></td>
                  <td width="161"><font size="2" face="Arial, Helvetica, sans-serif" class="phpmakerlist">
                    <?php
					
					echo $row[descrip];
				}
				?>
                  </a></font></td>
                </tr>
                <?php
					}//fin del ciclo while
					?>
              </table></td>
              <td class="ewTableRow"><table width="188" border="0">
                <?php
				if ($registro_id2>0)
				{
					$query="select * from nomvis_conceptos_frecuencia where codcon=$registro_id2";					
					$result=sql_ejecutar($query);
		
	 	  			//ciclo para mostrar los datos
  					while ($row = mysql_fetch_array($result))
  					{ 
					?>
                <tr>
                  <td width="17" height="20"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:Borrar(<?php echo $row[codfre]; ?>,5);"><img src="images/b_drop.png" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ></a></font></td>
                  <td width="160"><font size="2" face="Arial, Helvetica, sans-serif">
                    <?php
					echo $row[descrip];
				}
				?>
                  </a></font></td>
                </tr>
                <?php
					}//fin del ciclo while
					?>
              </table></td>
              <td class="ewTableRow"><table width="196" border="0">
                <?php
				if ($registro_id2>0)
				{
					$query="select * from nomvis_conceptos_situacion where codcon=$registro_id2";					
					$result=sql_ejecutar($query);
		
	 	  			//ciclo para mostrar los datos
  					while ($row = mysql_fetch_array($result))
  					{ 
					?>
                <tr>
                  <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:Borrar('<?php echo $row[situacion]; ?>',6);"><img src="images/b_drop.png" title="Elimina Tipo de N&oacute;mina"  width="16" height="16" border="0" align="absmiddle" ></a></font></td>
                  <td width="169"><font size="2" face="Arial, Helvetica, sans-serif">
                    <?php
					echo $row[descrip];
				}
				?>
                  </a></font></td>
                </tr>
                <?php
					}//fin del ciclo while
					?>
              </table></td>
              <td class="ewTableRow"><table width="188" border="0">
                <?php
				if ($registro_id2>0)
				{
					$query="select * from nomvis_conceptos_acumulado where codcon=$registro_id2";					
					$result=sql_ejecutar($query);
		
	 	  			//ciclo para mostrar los datos
  					while ($row = mysql_fetch_array($result))
  					{ 
					?>
                <tr>
                  <td width="17"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:Borrar('<?php echo $row[cod_tac]; ?>',7);"><img src="images/b_drop.png" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ></a></font></td>
                  <td width="160"><font size="2" face="Arial, Helvetica, sans-serif">
                    <?php
					echo $row[descrip];
				}
				?>
                  </a></font></td>
                </tr>
                <?php
					}//fin del ciclo while
					?>
              </table></td>
            </tr>
            
            <tr bgcolor="#CCCCCC" class="ewTableHeader">
              <td height="16" align="right" class="row-br"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:AgregarTipoNomina();"><img src="../imagenes/ok.gif" title="Agrega Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" >Selecci&oacute;n</a></font> <font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BorrarTodo(0,4);"><img src="../imagenes/delete.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" >Borrar Todo </a></font></div></td>
              <td align="right" class="row-br">&nbsp;</td>
              <td class="row-br"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:AgregarTipoFrecuencia();"><img src="../imagenes/ok.gif" title="Agregar tipos de Frecuencias" width="16" height="16" border="0" align="absmiddle" ></a><a href="javascript:AgregarTipoFrecuencia();">Selecci&oacute;n</a></font> <font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BorrarTodo(0,5);"><img src="../imagenes/delete.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" >Borrar Todo </a></font></div></td>
              <td class="row-br"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:AgregarTipoSituaciones();"><img src="../imagenes/ok.gif" title="Agregar tipos de Situaciones" width="16" height="16" border="0" align="absmiddle" ></a><a href="javascript:AgregarTipoSituaciones();">Selecci&oacute;n</a></font> <font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BorrarTodo(0,6);"><img src="../imagenes/delete.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" >Borrar Todo </a></font></div></td>
              <td class="row-br"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:AgregarTipoAcumulados();"><img src="../imagenes/ok.gif" title="Agregar tipos de Acumulados" width="16" height="16" border="0" align="absmiddle" ></a><a href="javascript:AgregarTipoAcumulados();">Selecci&oacute;n</a></font> <font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:BorrarTodo(0,7);"><img src="../imagenes/delete.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" >Borrar Todo </a></font></div></td>
            </tr>
      
            <input name="registro_id2" type="hidden" value="">
            <input name="nombre_tabla2" type="hidden" value="<?php echo $nombre_tabla; ?>">
            <input name="op" type="hidden" value="">
          </table>            </td>
          </tr>
        
      </table>      </td>
    </tr>
  </table>
  </div>

    <div class="tabbertab">
	 
	  <h2>F&oacute;rmula</h2>
	  <table width="780" height="396" border="0" class="row-br">
        <tr>
          <td width="781" height="86" class="ewTableAltRow"><table width="761" border="0" bordercolor="#0066FF">
              
              <tr bgcolor="#FFFFFF">
                <td height="72" colspan="2" bgcolor="#FFFFFF" class="ewTableAltRow"><p><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="txtformula_aux" type="hidden" id="txtformula_aux" style="width:240px" value="">
                </font >
                    <textarea cols="90"  rows="20"  name="txtformula" id="txtformula"><?if($formula!=""){echo $formula;}?></textarea>
                  </p>				</td>
                <td height="78" bgcolor="#FFFFFF" class="ewTableAltRow"><div align="center">
                  <table width="162" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" summary="t">
                    <tr>
                      <th width="31"><input name="b72"  type="button" style="width:25px" class="btn_bg" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" value="7" size="4" /></th>
                      <th width="31"><input name="b82" type="button" style="width:25px" class="btn_bg" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" value="8" size="4" /></th>
                      <th width="31"><input name="b92" type="button" style="width:25px" class="btn_bg" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" value="9" size="4" /></th>
                      <th width="32"><input name="Muda_Sinal2" style="width:25px" class="btn_bg" size="4" type="button" value="+" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th width="32"><input name="Muda_Sinal22" size="4" style="width:25px" class="btn_bg" type="button" value="-" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th width="34"><input name="Subtrair2" size="4" style="width:25px" class="btn_bg" type="button" value="*" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                    </tr>
                    <tr>
                      <th  width="31"><input name="b42" style="width:25px" class="btn_bg" size="4" type="button" value="4" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="31"><input name="b52" size="4" style="width:25px" class="btn_bg" type="button" value="5" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="31"><input name="b62" size="4" type="button" style="width:25px" class="btn_bg" value="6" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="32"><input name="Adicionar2" size="4" type="button" style="width:25px" class="btn_bg"  value="=" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="32"><input name="Muda_Sinal23" size="4" style="width:25px" class="btn_bg" type="button" value="&lt;&gt;" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="34"><input name="Dividir2" size="4" type="button" style="width:25px" class="btn_bg" value="/" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                    </tr>
                    <tr>
                      <th  width="31"><input name="b12" size="4" style="width:25px" class="btn_bg" type="button" value="1" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="31"><input name="b22" size="4" style="width:25px" class="btn_bg" type="button" value="2" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="31"><input name="b32" size="4" style="width:25px" class="btn_bg" type="button" value="3" onClick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="32"><input name="Multiplicar2" size="4" style="width:25px" class="btn_bg" type="button" value="&gt;" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="32"><input name="Muda_Sinal24" size="4" style="width:25px" class="btn_bg" type="button" value="&lt;" onClick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="34"><input name="Igualdade2" type="button" style="width:25px" class="btn_bg" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" value="&amp;" size="4" /></th>
                    </tr>
                    <tr>
                      <th  width="31"><input name="b02" size="4" style="width:25px" class="btn_bg" type="button" value=" 0 " onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th colspan="2"><input name="LimparUltimaEntrada2" style="width:50px" class="btn_bg" type="button" value="Limpiar" onClick="LimiarFormula();" /></th>
                      <th  width="32"><input name="Multiplicar22" size="4" style="width:25px" class="btn_bg" type="button" value="&gt;=" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th  width="32"><input name="Muda_Sinal25" size="4" style="width:25px" class="btn_bg" type="button" value="&lt;=" onclick="insertAtCursor(document.frmPrincipal.txtformula,this.value);" /></th>
                      <th class="box">&nbsp;</th>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <table width="135" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" summary="t">
                    <tr>
                      <th colspan="3"><input name="Visor" type="text" size="12" value="0" /></th>
                      <th colspan="2"><input name="LimparUltimaEntrada3" style="width:50px" class="btn_bg" type="button" value="Copiar" onClick="insertAtCursor(document.frmPrincipal.txtformula,document.frmPrincipal.Visor.value);" /></th>
                    </tr>
                    <tr>
                      <th  width="27"><input name="b7" size="4" type="button" style="width:25px" class="btn_bg" value=" 7 " onClick="SelecionaN(7)" /></th>
                      <th  width="27"><input name="b8" size="4" type="button" style="width:25px" class="btn_bg" value=" 8 " onClick="SelecionaN(8)" /></th>
                      <th  width="27"><input name="b9" size="4" type="button" style="width:25px" class="btn_bg" value=" 9 " onClick="SelecionaN(9)" /></th>
                      <th  width="27"><input name="Muda_Sinal" size="4" type="button" style="width:25px" class="btn_bg" value=" &plusmn; " onClick="MudaSinal()" /></th>
                      <th  width="27"><input name="Subtrair" size="4" type="button" style="width:25px" class="btn_bg" value=" - " onClick="Calcular('-')" /></th>
                    </tr>
                    <tr>
                      <th  width="27"><input name="b4" size="4" type="button" style="width:25px" class="btn_bg" value=" 4 " onClick="SelecionaN(4)" /></th>
                      <th  width="27"><input name="b5" size="4" type="button" value=" 5 " style="width:25px" class="btn_bg" onClick="SelecionaN(5)" /></th>
                      <th  width="27"><input name="b6" size="4" type="button" value=" 6 " style="width:25px" class="btn_bg" onClick="SelecionaN(6)" /></th>
                      <th  width="27"><input name="Adicionar" size="4" type="button" style="width:25px" class="btn_bg" value=" + " onClick="Calcular('+')" /></th>
                      <th  width="27"><input name="Dividir" size="4" type="button" style="width:25px" class="btn_bg" value=" &divide; " onClick="Calcular('/')" /></th>
                    </tr>
                    <tr>
                      <th  width="27"><input name="b1" size="4" type="button" style="width:25px" class="btn_bg" value=" 1 " onClick="SelecionaN(1)" /></th>
                      <th  width="27"><input name="b2" size="4" type="button" style="width:25px" class="btn_bg" value=" 2 " onClick="SelecionaN(2)" /></th>
                      <th  width="27"><input name="b3" size="4" type="button" style="width:25px" class="btn_bg" value=" 3 " onClick="SelecionaN(3)" /></th>
                      <th  width="27"><input name="Multiplicar" size="4" style="width:25px" class="btn_bg" type="button" value=" &times; " onClick="Calcular('*')" /></th>
                      <th  width="27"><input name="Igualdade" size="4" style="width:25px" class="btn_bg" type="button" value=" = " onClick="Calcular('=')" /></th>
                    </tr>
                    <tr>
                      <th  width="27" height="25"><input name="b0" size="4" style="width:25px" class="btn_bg" type="button" value=" 0 " onClick="SelecionaN(0)" /></th>
                      <th  width="27"><input name="LimparTubo" style="width:25px" class="btn_bg" type="button" value="CE" onClick="LimparUltimo()" /></th>
                      <th colspan="2"><input name="LimparUltimaEntrada" style="width:25px" class="btn_bg" type="button" value="C" onClick="Limpar()" /></th>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                </div>                </td>
              </tr>
              
              <tr bgcolor="#FFFFFF">
                <td width="345" height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><p><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:AgregarVariablesPersonal();"> Campos del Personal y <?echo $termino?> </a></font></p>                </td>
                <!--<td width="208" height="-1" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')"> Constantes de los Conceptos </a></font></td>
                <td width="194" height="72" rowspan="6" bgcolor="#FFFFFF" class="ewTableAltRow"><label>
                  <fieldset><legend>Resultados del Test</legend>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                </fieldset></label></td>
              </tr>-->
              <tr bgcolor="#FFFFFF">
                <td height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:AgregarFunciones();"> Funciones</a></font></td>
                <!--<td width="208" height="0" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')"> Constantes de los Contratos </a></font></td>
              </tr>
             <!-- <tr bgcolor="#FFFFFF">
              <td height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')"> Constantes de Formula </a></font></td>
                <td width="208" height="2" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" > <a href="javascript:alert('No esta Implementado')">Expandir F&oacute;rmula </a></font></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')"> Conceptos</a></font></td>
                <td width="208" height="6" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')">&nbsp;Test de F&oacute;rmula </a></font></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:AgregarConstantesPersonal();">&nbsp;Constantes del Personal (Campos Adicionales)</a></font></td>
                <td width="208" height="20" bgcolor="#FFFFFF" class="ewTableAltRow"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../imagenes/search.gif" title="Elimina Tipo de N&oacute;mina" width="16" height="16" border="0" align="absmiddle" ><a href="javascript:alert('No esta Implementado')">&nbsp;Tipos de Prestamos </a></font></td>
              </tr>-->
              <tr bgcolor="#FFFFFF">
                <td height="35" bgcolor="#FFFFFF" class="ewTableAltRow">&nbsp;</td>
                <td width="208" height="35" bgcolor="#FFFFFF" class="ewTableAltRow"><label>

                </label></td>
              </tr>

          </table></td>
        </tr>
      </table>
    </div>

</div>
</form>
<table width="784" border="0">
  <tr>
    <td width="735"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">
      <?php btn('back','conceptos_nomina_pago.php') ?>
    </font></div></td>
    <td width="17"><font size="2" face="Arial, Helvetica, sans-serif">
      <?php btn('cancel','history.back();',2) ?>
    </font></td>
    <td width="18"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
      <?php btn('ok','Enviar(); document.frmPrincipal.submit();',2) ?>
    </font></div></td>
  </tr>
</table>
&nbsp;
<p>
  <script type="text/javascript" language="JavaScript">
var DocCalc = document.frmPrincipal;
var Num=0; 
var Num1=0; 
var Num2=0; 
var Num3=0; 
var TermN1="false"; 
var InicN2="false"; 
var PontoDec="false";
var Op=''; 
var FazOper=''; 

function SelecionaN(Num)
{
	if (TermN1 == "false")
	{
	if ((parseFloat(DocCalc.Visor.value) == 0) && (PontoDec == "false"))
	{ DocCalc.Visor.value = Num; }
	else
	{ DocCalc.Visor.value += Num;}
	Num1 = DocCalc.Visor.value;
	}
	else
	{
	if (InicN2 == "false")
	{
	if (FazOper != '')
	{ DocCalc.Visor.value = Num; InicN2 = "true"; }
	else
	{ Limpar();SelecionaN(Num); }
	}
	else
	{ DocCalc.Visor.value += Num; }
	Num2 = DocCalc.Visor.value;
	}
}


function Calcular(Op)
{
	if (TermN1 == "false")
	{
	if (Op != '=')
	{
	TermN1 = "true";
	FazOper = Op;
	PontoDec = "false";
	}
	}
	else
	{
	if (InicN2 == "true")
	{
	Num1 = parseFloat(Num1);
	Num2 = parseFloat(Num2);
	if (FazOper == '') { FazOper = Op; }
	if (FazOper == '+') { Num3 = Num1+Num2; }
	if (FazOper == '-') { Num3 = Num1-Num2; }
	if (FazOper == '*') { Num3 = Num1*Num2; }
	if (FazOper == '/') { Num3 = Num1/Num2; }
	DocCalc.Visor.value = Num3;
	Num1 = Num3;
	Num2 = 0;
	InicN2 = "false";
	PontoDec = "false";
	FazOper = '';
	if (Op != '=') { FazOper = Op; }
	}
	else
	{
	FazOper = Op;
	InicN2 = "true";
	DocCalc.Visor.value = "";
	}
	}
}

function Decimal()
{
	if (PontoDec == "false")
	{
	if (TermN1 == "false")
	{
	DocCalc.Visor.value += ".";
	PontoDec = "true";
	Num1 = DocCalc.Visor.value;
	}
	else
	{
	if (InicN2 == "false")
	{
	DocCalc.Visor.value = ".";
	Num2 = DocCalc.Visor.value;
	PontoDec = "true";
	InicN2 = "true";
	}
	else
	{
	DocCalc.Visor.value += ".";
	Num2 = DocCalc.Visor.value;
	PontoDec = "true";
	}
	}
	}
}

function Limpar()
{
	Num1 = 0;
	Num2 = 0;
	Num3 = 0;
	TermN1 = "false";
	InicN2 = "false";
	PontoDec = "false";
	FazOper = '';
	DocCalc.Visor.value = 0;
}

function LimparUltimo()
{
	if (TermN1 == "false")
	{Limpar();}
	else
	{
	Num2 = 0;
	InicN2 = "false";
	PontoDec = "false";
	DocCalc.Visor.value = 0;
	}
}

function MudaSinal()
{
	if (TermN1 == "false")
	{
	DocCalc.Visor.value = parseFloat(DocCalc.Visor.value)*-1;
	Num1 = DocCalc.Visor.value;
	}
	else
	{
	if (InicN2 == "true")
	{
	DocCalc.Visor.value = parseFloat(DocCalc.Visor.value)*-1;
	Num2 = DocCalc.Visor.value;
	}
	}
}

</script>
</p>
<p>&nbsp;</p>
</body>
</html>
