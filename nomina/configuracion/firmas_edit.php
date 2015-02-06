<?php
require_once '../lib/common.php';
include ("../header.php");
$conexion=conexion_conf();

$url="firmas_list";
$modulo="Firmas Reportes";
$tabla="firmas";
$titulos=array("Descripción:","Cargo del Firmante:","Nombre del Firmante:","Orden del Firmante:");
$indices=array("1","2","3","4");
$codigo=$_GET['codigo'];
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
		$descrip=$_POST['descripcion'];
		$cargo=$_POST['cargo_persona'];
		$nombre=$_POST['nombre_persona'];
		$orden=$_POST['orden_reporte'];
		
		$true=false;
		
		if($_POST['PERSONAL']==true){ 
			$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='PERSONAL' where cod_firmas=$codigo";
			$resultado=query($consulta,$conexion);
			$true=true;
		}else{
			if($_POST['PRESTAMOS']==true){
				$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='PRESTAMOS' where cod_firmas=$codigo";
				$resultado=query($consulta,$conexion);
				$true=true;
			}else{
				if($_POST['CONSULTAS']==true){
					$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='CONSULTAS' where cod_firmas=$codigo";
					$resultado=query($consulta,$conexion);
					$true=true;
				}else{
			
					if($_POST['TRANSACCIONES']==true){
						$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='TRANSACCIONES' where cod_firmas=$codigo";
						$resultado=query($consulta,$conexion);
						$true=true;
					}else{
					
						if($_POST['PROCESOS']==true){
							$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='PROCESOS' where cod_firmas=$codigo";
							$resultado=query($consulta,$conexion);
							$true=true;
						}else{
							if($_POST['REPORTES']==true){
								$consulta="update ".$tabla." set descripcion='$descrip',cargo_persona='$cargo',nombre_persona='$nombre',orden_reporte=$orden, cod_reporte='REPORTES' where cod_firmas=$codigo";
								$resultado=query($consulta,$conexion);
								$true=true;
							}
						}
					}
				}
			}
		}
		
		

		cerrar_conexion($conexion);
		//header
		echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert('Se Modifico correctamente la firma !!! ')
		parent.cont.location.href=\"".$url.".php?pagina=$pagina\"
		</SCRIPT>";
	}	
}
else
{

	$consulta="select * from ".$tabla." where cod_firmas=".$codigo." and modulo ='Recursos Humanos'";
	$resultado=query($consulta,$conexion);
	$firma=fetch_array($resultado);
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

function seleccion(valor){
	
	if(valor=='PERSONAL'){
		document.sampleform.PERSONAL.checked=true
		document.sampleform.PRESTAMOS.checked=false
		document.sampleform.CONSULTAS.checked=false
		document.sampleform.TRANSACCIONES.checked=false
		document.sampleform.PROCESOS.checked=false
		document.sampleform.REPORTES.checked=false
		
	}else if(valor=='PRESTAMOS'){
		document.sampleform.PERSONAL.checked=false
		document.sampleform.PRESTAMOS.checked=true
		document.sampleform.CONSULTAS.checked=false
		document.sampleform.TRANSACCIONES.checked=false
		document.sampleform.PROCESOS.checked=false
		document.sampleform.REPORTES.checked=false
	}else if(valor=='CONSULTAS'){
		document.sampleform.PERSONAL.checked=false
		document.sampleform.PRESTAMOS.checked=false
		document.sampleform.CONSULTAS.checked=true
		document.sampleform.TRANSACCIONES.checked=false
		document.sampleform.PROCESOS.checked=false
		document.sampleform.REPORTES.checked=false
	}else if(valor=='TRANSACCIONES'){
		document.sampleform.PERSONAL.checked=false
		document.sampleform.PRESTAMOS.checked=false
		document.sampleform.CONSULTAS.checked=false
		document.sampleform.TRANSACCIONES.checked=true
		document.sampleform.PROCESOS.checked=false
		document.sampleform.REPORTES.checked=false
	}else if(valor=='PROCESOS'){
		document.sampleform.PERSONAL.checked=false
		document.sampleform.PRESTAMOS.checked=false
		document.sampleform.CONSULTAS.checked=false
		document.sampleform.TRANSACCIONES.checked=false
		document.sampleform.PROCESOS.checked=true
		document.sampleform.REPORTES.checked=false
	}else if(valor=='REPORTES'){
		document.sampleform.PERSONAL.checked=false
		document.sampleform.PRESTAMOS.checked=false
		document.sampleform.CONSULTAS.checked=false
		document.sampleform.TRANSACCIONES.checked=false
		document.sampleform.PROCESOS.checked=false
		document.sampleform.REPORTES.checked=true
	}
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

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>?codigo=<?php echo $codigo."&pagina=".$pagina?>">

<?php $conexion=conexion();?>
<TABLE  width="100%" height="100">
<TBODY>

<tr>
	  <td colspan="2" height="30" class="tb-tit"><? titulo("Agregar nuevo registro de ".$modulo,"","firmas_list.php","37"); ?></td>
    </tr>


			
			<TR><td class=tb-head >Descripción:</td>
			<td><INPUT type="text" name="descripcion" size="50" maxlength="14" value="<?php echo $firma['descripcion']; ?>" ></td> </tr>
      			<TR><td class=tb-head >Cargo del Firmante:</td>
			<td><INPUT type="text" name="cargo_persona"  maxlength="19" size="50" value="<?php echo $firma['cargo_persona']; ?>"></td> </tr>
			<TR><td class=tb-head >Nombre del Firmante:</td>
			<td><INPUT type="text" name="nombre_persona" size="50"  maxlength="18" value="<?php echo $firma['nombre_persona']; ?>"></td> </tr>
			<TR><td class=tb-head >Orden del Firmante:</td>
			<td><INPUT type="text" name="orden_reporte" size="50" value="<?php echo $firma['orden_reporte']; ?>"></td> </tr>
			
</tbody>
</table>
<table  width="100%" >
	    <tr><td colspan="7" height="30" class="tb-tit"><strong>Reportes: </strong></td></tr>
			
	    
</table>
<?php $cod_reporte=$firma['cod_reporte'];?>
<table   width="350"      >

		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Elegibles</td>
			<td colspan="1" class=tb-head></td>
			
		</tr>
		
			
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Personal</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"   onclick="javascript:seleccion('PERSONAL')" name="PERSONAL" id="PERSONAL" value="1" size="100" 
			<?php if ($cod_reporte=='PERSONAL'){echo 'checked=true';}?> ></td>
			
		</tr>
		
		<tr>
			<td class=tb-head   >&#8226; M&oacute;dulo de Prestamos</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox" onclick="javascript:seleccion('PRESTAMOS')" name="PRETAMOS" id="PRESTAMOS" value="1" size="100" 
			<?php if ($cod_reporte=='PRETAMOS'){echo 'checked=true';}?> ></td>
			
		</tr>
		
		<tr>
			<td class=tb-head  >&#8226; M&oacute;dulo Consultas</td>
			<td colspan="1" class=tb-head ><INPUT type="checkbox" onclick="javascript:seleccion('CONSULTAS')" name="CONSULTAS" id="CONSULTAS" value="1" size="100" <?php if ($cod_reporte=='CONSULTAS'){echo 'checked=true';}?>></td>
		</tr>
		
		<tr>
			<td class=tb-head  >&#8226; M&oacute;dulo de Transacciones</td>
			<td colspan="1" class=tb-head ><INPUT type="checkbox" onclick="javascript:seleccion('TRANSACCIONES')" name="TRANSACCIONES" id="TRANSACCIONES" value="1" size="100" <?php if ($cod_reporte=='TRANSACCIONES'){echo 'checked=true';}?>></td>
		</tr>
		<tr>
			<td class=tb-head  > &#8226; M&oacute;dulo de Procesos </td>
			<td colspan="1" class=tb-head><INPUT type="checkbox" onclick="javascript:seleccion('PROCESOS')" name="PROCESOS" value="1" id="PROCESOS" size="100" <?php if ($cod_reporte=='PROCESOS'){echo 'checked=true';}?>></td>
			
		</tr>
		<tr>
			<td class=tb-head  > &#8226; M&oacute;dulo de Reportes </td>
			<td colspan="1" class=tb-head><INPUT type="checkbox"  onclick="javascript:seleccion('REPORTES')" name="REPORTES"  id="REPORTES" value="1" size="100" <?php if ($cod_reporte=='REPORTES'){echo 'checked=true';}?>></td>
			
		</tr>
		
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