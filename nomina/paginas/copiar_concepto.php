<?php 
session_start();
ob_start();
?>

<?php
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php");
include ("funciones_nomina.php");


$registro_id=$_GET['registro_id'];		
$op=$_POST['op'];

?>
<script type="text/javascript">
function CerrarVentana(){
	javascript:window.close();
}


function Enviar(){
	document.frmPrincipal.op.value=1;
	document.frmPrincipal.submit();
}

</script>
</head>
<body>


<?php 

	$codcon=$_GET['codcon'];		
	$op=$_POST['op'];
	
?>
<form id="frmPrincipal" name="frmPrincipal" method="post" action="">
<input type="hidden" name="op" id="op" value="0">
<input type="hidden" name="codcon" id="codcon" value="<?echo $codcon;?>">	

<?php

if ($op==1)
{
	$query="SELECT * FROM nomconceptos WHERE codcon=$_POST[codcon]";
	$result=sql_ejecutar($query);
	$fila=fetch_array($result);	
	
	$formula=str_replace("'",'',$fila['formula']);	

	$query="INSERT INTO nomconceptos (codcon, descrip, tipcon, unidad, ctacon, contractual, impdet, proratea, usaalter, descalter, formula, modifdef, markar, tercero, ccosto, codccosto, debcre, bonificable, htiempo, valdefecto, con_cu_cc, con_mcun_cc, con_mcuc_cc, con_cu_mccn, con_cu_mccc, con_mcun_mccn, con_mcuc_mccc, con_mcun_mccc, con_mcuc_mccn, nivelescuenta, nivelesccosto, semodifica, verref, vermonto, particular, montocero, ee, fmodif, aplicaexcel, descripexcel, ctacon1)  values ('$_POST[codcon2]', '".$fila['descrip']."', '".$fila['tipcon']."', '".$fila['unidad']."', '".$fila['ctacon']."', '".$fila['contractual']."', '".$fila['impdet']."', '".$fila['proratea']."', '".$fila['usaalter']."', '".$fila['descalter']."', '".$formula."', '".$fila['modifdef']."', '".$fila['markar']."', '".$fila['tercero']."','".$fila['ccosto']."','".$fila['codccosto']."','".$fila['debcre']."', '".$fila['bonificable']."', '".$fila['htiempo']."', '".$fila['valdefecto']."', '".$fila['con_cu_cc']."', '".$fila['con_mcun_cc']."', '".$fila['con_mcuc_cc']."', '".$fila['con_cu_mccn']."', '".$fila['con_cu_mccc']."', '".$fila['con_mcun_mccn']."', '".$fila['con_mcuc_mccc']."', '".$fila['con_mcun_mccc']."',  '".$fila['con_mcuc_mccn']."', '".$fila['nivelescuenta']."', '".$fila['nivelesccosto']."', '".$fila['semodifica']."', '".$fila['verref']."', '".$fila['vermonto']."', '".$fila['particular']."', '".$fila['montocero']."', '".$fila['ee']."', '".$fila['fmodif']."', '".$fila['aplicaexcel']."', '".$fila['descripexcel']."', '".$fila['ctacon1']."')";
	$resultado2=sql_ejecutar($query);
	if($resultado2)
	{
		?>
		<script type="text/javascript">
		alert("Concepto copiado con exito")
		CerrarVentana();
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("ERROR AL COPIAR CONCEPTO, VERIFIQUE EL CODIGO NUEVO!!")
		
		</script>
		<?	
	}
	
}
?>

<table width="100%" align="center" border="0">
<tr><TD height="20"></TD></tr>
<tr class="tb-head"  style="font-weight : bold;">
<TD>C&#243;digo del nuevo concepto: <input type="text" name="codcon2" id="codcon2" size="6" maxlength="6" /></TD>
</tr>
<tr><TD height="20"></TD></tr>
</table>

<table width="50%" align="center" border="0">
<tr>
<td width="160"><div align="center">
<?php btn('ok','Enviar();',2) ?>
</div></td>
<td width="118"><div align="center">
<?php btn('cerrar','CerrarVentana();',2) ?>
</div></td>
</tr>
</table>
</form>
</body>
</html>
