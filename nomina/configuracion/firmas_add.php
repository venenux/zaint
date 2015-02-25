
<?php
require_once '../lib/common.php';
include ("../header.php");
$conexion=conexion_conf();

$url="firmas_list";
$modulo="Firmas Reportes";
$tabla="firmas";
$titulos=array("Descripción:","Cargo del Firmante:","Nombre del Firmante:","Orden del Firmante:");
$indices=array("1","2","3","4");
$pagina=@$_GET['pagina'];

if(isset($_POST['aceptar']))
{
	
	if ((($_POST['descripcion'] == '') && ($_POST['cargo_persona'] == '') && ($_POST['nombre_persona'] == '')  )|| ($_POST['orden_reporte'] == ''))
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert(\"Datos imcompletos, no se puede realizar la operacion\")";
		echo "</SCRIPT>";
	}
	else
	{	
		$guardar=false;
		$consulta="select * from ".$tabla."";
		$resultado=query($consulta,$conexion);
		foreach($indices as $valor)
		{
			$campo=mysql_field_name($resultado,$valor);
			if($cadena_campos=="" && $cadena_valores=="")
			{
				$cadena_campos=$cadena_campos.$campo;
				$cadena_valores=$cadena_valores."'".$_POST[$campo]."'";
			}
			else
			{
				$cadena_campos=$cadena_campos.",".$campo;
				$cadena_valores=$cadena_valores.",'".$_POST[$campo]."'";
			}
		}
		
		$cadena_campos=$cadena_campos.", cod_reporte, modulo";
		$cadena_valores;
		if($_POST['PERSONAL']==true){ 
			$consulta="select * from ".$tabla." where cod_reporte='PERSONAL' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para PERSONAL!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'PERSONAL','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		if($_POST['PRESTAMOS']==true){
			$consulta="select * from ".$tabla." where cod_reporte='PRESTAMOS' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para PRESTAMOS!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'PRESTAMOS','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		if($_POST['CONSULTAS']==true){
			$consulta="select * from ".$tabla." where cod_reporte='CONSULTAS' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para CONSULTAS!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'CONSULTAS','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		if($_POST['TRANSACCIONES']==true){
			$consulta="select * from ".$tabla." where cod_reporte='TRANSACCIONES' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para TRANSACCIONES!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'TRANSACCIONES','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		if($_POST['PROCESOS']==true){
			$consulta="select * from ".$tabla." where cod_reporte='PROCESOS' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para PROCESOS!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'PROCESOS','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		if($_POST['REPORTES']==true){
			$consulta="select * from ".$tabla." where cod_reporte='REPORTES' and modulo='Recursos Humanos'";
			$resultado=query($consulta,$conexion);
			$can=num_rows($resultado);
			if($can==6){
				echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert('No se puede guardar mas firmas para REPORTES!!!')
				</SCRIPT>";
			}else{
				$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.",'REPORTES','Recursos Humanos')";
				$resultado=query($consulta,$conexion);
				$guardar=true;
			}
		}
		
		cerrar_conexion($conexion);
		//header
		if ($guardar==true){
			echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			alert('Se guardo correctamente la firma !!!')
			parent.cont.location.href=\"".$url.".php?pagina=$pagina\"
			</SCRIPT>";
		}else{
			echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
			parent.cont.location.href=\"".$url.".php?pagina=$pagina\"
			</SCRIPT>";
		}
	}	
}
else
{

	$consulta="select * from ".$tabla ." WHERE modulo='Recursos Humanos'";
	$resultado=query($consulta,$conexion);
}
?>



<html class="fondo">

<head>
  <title></title>
  <link href="estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	parent.cont.location.href=retorno+".php?pagina=1"
}

</SCRIPT>

</head>
<body>
<head>
<script language="JavaScript" type="text/JavaScript">


</script>
</head>
<body>
</body>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>?pagina=<?php $pagina;?>">

<?php $conexion=conexion();?>
<TABLE  width="100%" height="100">
<TBODY>

<tr>
	  <td colspan="2" height="30" class="tb-tit"><? titulo("Agregar nuevo registro de ".$modulo,"","firmas_list.php","37"); ?></td>
    </tr>


			
			<TR><td class=tb-head >Descripción:</td>
			<td><INPUT type="text" name="descripcion"  maxlength="14" size="50" ></td> </tr>
      		<TR><td class=tb-head >Cargo del Firmante:</td>
			<td><INPUT type="text" name="cargo_persona" maxlength="19" size="50"></td> </tr>
			<TR><td class=tb-head >Nombre del Firmante:</td>
			<td><INPUT type="text" name="nombre_persona"  maxlength="18" size="50"></td> </tr>
			<TR><td class=tb-head >Orden del Firmante:</td>
			<td><INPUT type="text" name="orden_reporte" size="50"></td> </tr>
			
</tbody>
</table>
<table  width="100%" >
	    <tr><td colspan="7" height="30" class="tb-tit"><strong>Reportes: </strong></td></tr>
			
	    
</table>
<table   width="350"      >

		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Elegibles</td>
			<td colspan="1" class=tb-head></td>
			
		</tr>
		
			
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Personal</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="PERSONAL" value="1" size="100"></td>
			
		</tr>
		
		<tr>
			
			<td class=tb-head  > &#8226; M&oacute;dulo de Prestamos</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="PRESTAMOS" value="1" size="100"></td>
		</tr>
		
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Consultas</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="CONSULTAS" value="1" size="100"></td>
			
		</tr>

		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Transacciones</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="TRANSACCIONES" value="1" size="100"></td>
			
		</tr>
		
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Procesos</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="PROCESOS" value="1" size="100"></td>
			
		</tr>
	
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Reportes</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  name="REPORTES" value="1" size="100"></td>
			
		</tr>
		<!--
		<tr>
			<td class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Notas de Entrega</td>
			<td colspan="1" ><INPUT type="checkbox"  name="ENTREGA" value="1" size="100"></td>
		</tr>
			-->
		
		
</table	>


<TABLE width="100%">
<TBODY>
    <tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" name="aceptar" value="Aceptar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onClick="javascript:cerrar('<? echo $url?>');"></td>
    </tr>
  </tbody>
</TABLE>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>