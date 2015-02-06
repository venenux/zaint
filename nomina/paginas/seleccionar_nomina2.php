<?php 
session_start();
ob_start();
include("../header.php") ;
?>


<script>
function VerificarSeleccion()
{
	seleccion=0
	for(i=0; ele=document.frmseleccionar.elements[i]; i++){  		
		if (ele.name=='opt[]'){			
			if (ele.checked == true){
			seleccion=1}		
		}			
	}	
	
	if (seleccion==0){
	alert("Debe seleccionar un tipo de nomina. Verifique...")}
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
include("../lib/common.php") ;
include("func_bd.php") ;


$seleccion=$_POST[seleccion_nomina];

if ($seleccion==1){
	foreach($_POST['opt'] as $key => $value){
			$valuetxt=$value;			
	}
	$strsql= "select codtip from nomtipos_nomina where descrip = '$valuetxt'";
	$result =sql_ejecutar($strsql);			
  	$fila = mysql_fetch_array($result);
	
	$select=sql_ejecutar("select * from nomusuario_nomina where id_nomina=".$fila['codtip']." and id_usuario=".$_SESSION['coduser']);
	if(num_rows($select)!=0){
		
		

		$_SESSION['codigo_nomina'] = $fila['codtip'];
		$_SESSION['nomina'] = $valuetxt;
	}else{
		echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert(\"NO ESTA AUTORIZADO PARA ACCEDER CON ESTE TIPO DE NOMINA\")
		location.href='home.php'
		</SCRIPT>";
	}
?>
<script>
top.frames["sup"].location.reload();
</script>
<?php
activar_pagina("home.php");		
}
?>
</font>
<form action="" method="post" name="frmseleccionar" id="frmseleccionar">
<input name="seleccion_nomina" type="hidden" value="0">
  <label></label>
  <div align="center">
    <table width="100%" height="5" class="tb-tit" bgcolor="#FFE4AF">
      <tr class="" align="left">
      <td height="31"><font color="#000066"><strong>&nbsp;Seleccionar Tipo de N&#243;mina</strong></font></td>
    </tr>
    <tr>
    </table>
    <br>
    <table width="500"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="500" height="49" colspan="2"><table width="500" border="0" id="lst" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%" height="21" class="tb-head"><div align="center"><STRONG>Nombre de N&oacute;mina</STRONG></font></div></td>
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
            <td height="27" class=""><div align="left"><span>
                <input name="opt[]" type="radio" class="icon" id="<?php echo $fila[codtip]; ?>" value="<?php echo $fila[descrip]; ?>" />
                <?php
	  echo $fila[descrip];
	  ?>
            </span></div></td>
          </tr>
          <?php   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
        </table></td>
      </tr>

      <?php
	
	if (@$_SESSION[ewSessionMessage] <> "") 	
	{	
	
	?>

      <?php 
	$_SESSION[ewSessionMessage] = ""; 
	} 
	?>
    </table>
    <table width="500" border="0" class="tb-head">
      <tr>
        <td width="283"><div align="center"><?php 
			btn('ok','VerificarSeleccion();',2) ?>
        </div></td>
        <td width="295"><div align="center">
          <?php 
			btn('cancel','home.php') ?>
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
