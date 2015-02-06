<?php
session_start();
ob_start();
$termino= $_SESSION['termino'];
include("../header.php") ;
include("../lib/common.php") ;
include("func_bd.php") ;
?>
<script type="text/javascript">
function VerificarSeleccion(){
	seleccion=0
	for(i=0; ele=document.frmseleccionar.elements[i]; i++){
		if (ele.name=='opt[]'){
			if (ele.checked == true){
			seleccion=1
			}
		}
	}
	if (seleccion==0){
	alert("Debe seleccionar un tipo de <?echo $termino?>. Verifique...")
	}
	else{
	//document.frmseleccionar.action="frame.php";
	//document.frmseleccionar.submit();
	//alert("SS");
	document.frmseleccionar.seleccion_nomina.value=1;
	document.frmseleccionar.submit();
	}
}
</script>
<font size="3" face="Arial, Helvetica, sans-serif">
<?php
$seleccion=$_POST['seleccion_nomina'];

if ($seleccion==1){
	foreach($_POST['opt'] as $key => $value){
		$valuetxt=$value;
	}
	$strsql= "select codtip from nomtipos_nomina where descrip = '$valuetxt'";
	$result =sql_ejecutar($strsql);
	$fila = mysql_fetch_array($result);
	$_SESSION['codigo_nomina'] = $fila[0];
	$_SESSION['nomina'] = $valuetxt;
	activar_pagina("frame.php");
}
?> </font>
<form action="" method="post" name="frmseleccionar" id="frmseleccionar">
	<input name="seleccion_nomina" type="hidden" value="0">
	<div align="center">
		<p>&nbsp;</p>
		<table border="0" align="center" cellpadding="0" cellspacing="3">
			<!--   <tr class="row-br">
        <td background="img_sis/bg_logo.png"><div align="center"><img src="img_sis/logo_login.png" width="207" height="130" /></div></td>
      </tr> -->
			<tr class="row-br">
				<td height="22" bgcolor="#A3CCE2"><div align="center">
						<strong>Seleccione un Tipo de <?echo $termino?> </font> </strong>
					</div>
				</td>
			</tr>
			<tr class="row-br">
				<td height="50"><table width="400" border="0" id="lst"
						cellspacing="0" cellpadding="0">
						<tr class="tb-head2">
							<td width="86%" height="21" class="tb-fila"><div align="left">
									<STRONG>&nbsp;Nombre de <?echo $termino?> </STRONG></font>
								</div></td>
						</tr>
						<?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>
            <tr>
              <?php
  	//operaciones para paginaciones
	$strsql= "select * from nomtipos_nomina";
	$result =sql_ejecutar($strsql);

  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);

  	//ciclo para mostrar los datos
  	while ($fila = mysql_fetch_array($result))
  	{
  	?>
              <td height="27"><div align="left"><span>
                <input name="opt[]" type="radio" class="icon" id="<?php echo $fila['codtip']; ?>" value="<?php echo $fila['descrip']; ?>" />
      <?php
	  echo $fila['descrip'];
	  ?>
              </span></div></td>
            </tr>
            <?php
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;
  	?>
          </table>
					<div align="center" class="tb-fila">
					<?php
					btn('ok','VerificarSeleccion();',2) ?>
					</div>
					<div align="center"></div>
					<div align="center"></div></td>
			</tr>
















      <?php

	if (@$_SESSION[ewSessionMessage] <> "")
	{

	?>

      <?php
	$_SESSION[ewSessionMessage] = "";
	}
	?>
      <tr class="row-br" background="img_sis/sup_bg.png">
        <td bgcolor="#A3CCE2"><div align="center" class="Estilo5"><img src="../img_sis/selectra.png" width="126" height="46" /></div></td>
      </tr>
    </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
</form>
</body>
</html>
