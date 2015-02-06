<?php
session_start();
ob_start();
?>
<?php 
$url="expediente_agregar";
$modulo="Agregar registro de expediente";
	
//DECLARACION DE LIBRERIAS
require_once '../lib/common.php';
require_once '../paginas/func_bd.php';
include ("../paginas/funciones_nomina.php");
include ("../header.php");
$conexion=conexion();
$cedula=$_GET['cedula'];
if(isset($_POST['cedula']))
	$cedula=$_POST['cedula'];
$codigo=$_GET['codigo'];
?>

<script type="text/javascript">

function confirmar2(msg)
{
	if (confirm(msg) == true) 
	{
		document.formulario1.opcion.value=1
		document.formulario1.submit()
	}
}

</script>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?

if($_POST['opcion']==1)
{
	if($_POST['editar']!=1)
	{
		if($_POST['fecha_reintegro']=='')
			$fecha_reintegro='';	
		else
			$fecha_reintegro=fecha_sql($_POST['fecha_reintegro']);
		
		if($_POST['fecha_salida']=='')
			$fecha_salida='';
		else
			$fecha_salida=fecha_sql($_POST['fecha_salida']);
	
		$consulta="INSERT INTO nomexpediente VALUES ('','$cedula','$_POST[tipo_registro]','$_POST[tipo_tiporegistro]','$_POST[descripcion]','$_POST[monto]','$_POST[monto_nuevo]','$_POST[dias]','".$fecha_reintegro."','".$fecha_salida."','$_POST[cod_cargo]','$_POST[cod_cargo_nuevo]','".date("Y-m-d")."','$_SESSION[nombre]','$_POST[pagado_por_emp]', '$_POST[institucion]', '$_POST[tipo_estudio]', '$_POST[nivel_actual]', '$_POST[costo_persona]', '$_POST[num_participantes]', '$_POST[nombre_especialista]', '$_POST[gerencia_anterior]', '$_POST[gerencia_nueva]', '$_POST[nomina_anterior]', '$_POST[nomina_nueva]', '$_POST[puntaje]', '$_POST[calificacion]', '$_POST[labor]', '$_POST[institucion_publica]','$_POST[tcamisa]', '$_POST[tchaqueta]','$_POST[tbata]','$_POST[tpantalon]','$_POST[tmono]','$_POST[tzapato]')";
		$resultado=query($consulta,$conexion);
		
		if($_POST['tipo_registro']=="Movimiento de Personal")
		{
			if($_POST['cod_cargo_nuevo']!='')
			{
				$consulta="UPDATE nompersonal set codcargo='$_POST[cod_cargo_nuevo]' WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
				$resultado2=query($consulta,$conexion);
			}
			if($_POST['gerencia_nueva']!='')
			{
				$consulta="UPDATE nompersonal set codnivel4='$_POST[gerencia_nueva]' WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
				$resultado3=query($consulta,$conexion);
			}
			if($_POST['nomina_nueva']!='')
			{
				$consulta="UPDATE nompersonal set tipnom='$_POST[nomina_nueva]' WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
				$resultado4=query($consulta,$conexion);
			}
		}
		if($_POST['tipo_tiporegistro']=="4")
		{
			$consulta="UPDATE nompersonal set codcargo='$_POST[cod_cargo_nuevo]', suesal='$_POST[monto_nuevo]' WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
			$resultado5=query($consulta,$conexion);
		}
		if($_POST['tipo_tiporegistro']=="1")
		{
			$consulta="UPDATE nompersonal set suesal='$_POST[monto_nuevo]' WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
			$resultado5=query($consulta,$conexion);
		}
		if(($_POST['tipo_registro']=="Experiencia")&&($_POST['tipo_tiporegistro']=="Trabajo realizado")&&($_POST['institucion_publica']==1))
		{
			$fecha1=fecha_sql($_POST['fecha_salida']);
			$fecha2=fecha_sql($_POST['fecha_reintegro']);
			$antiguedad=antiguedad($fecha1,$fecha2,"A");
			$consulta="UPDATE nompersonal set antiguedadap=antiguedadap+$antiguedad WHERE cedula='$cedula' AND tipnom='$_SESSION[codigo_nomina]'";
			$resultado5=query($consulta,$conexion);
		}
		
	}
	else
	{
		if($_POST['fecha_reintegro']=='')
			$fecha_reintegro='';	
		else
			$fecha_reintegro=fecha_sql($_POST['fecha_reintegro']);
		
		if($_POST['fecha_salida']=='')
			$fecha_salida='';
		else
			$fecha_salida=fecha_sql($_POST['fecha_salida']);
		
		$consulta="UPDATE nomexpediente SET tipo_registro='$_POST[tipo_registro]', tipo_tiporegistro='$_POST[tipo_tiporegistro]',monto='$_POST[monto]', monto_nuevo='$_POST[monto_nuevo]', dias='$_POST[dias]', fecha='".date("Y-m-d")."', fecha_salida='$fecha_salida', fecha_retorno='$fecha_reintegro', cod_cargo='$_POST[cod_cargo]', cod_cargo_nuevo='$_POST[cod_cargo_nuevo]', usuario='$_SESSION[nombre]', descripcion='$_POST[descripcion]', pagado_por_emp='$_POST[pagado_por_emp]', institucion='$_POST[institucion]', tipo_estudio='$_POST[tipo_estudio]', nivel_actual='$_POST[nivel_actual]', costo_persona='$_POST[costo_persona]', num_participantes='$_POST[num_participantes]', nombre_especialista='$_POST[nombre_especialista]', gerencia_anterior='$_POST[gerencia_anterior]', gerencia_nueva='$_POST[gerencia_nueva]', nomina_anterior='$_POST[nomina_anterior]', nomina_nueva='$_POST[nomina_nueva]', puntaje='$_POST[puntaje]', calificacion='$_POST[calificacion]', labor='$_POST[labor]', institucion_publica='$_POST[institucion_publica]', tcamisa='$_POST[tcamisa]', tchaqueta='$_POST[tchaqueta]', tbata='$_POST[tbata]',tpantalon='$_POST[tpantalon]', tmono='$_POST[tmono]', tzapato='$_POST[tzapato]' WHERE cod_expediente_det=$_POST[codigo]";
		$resultado=query($consulta,$conexion);
	}
	activar_pagina("expediente_list.php?cedula=$cedula");
}


	

$editar="";
if(isset($_GET['codigo']))
{
	$modulo="Editar registro de expediente";
	$consulta="SELECT * FROM nomexpediente WHERE cedula=$_GET[cedula] AND cod_expediente_det=$_GET[codigo]";
	$resultado=query($consulta,$conexion);
	$fetch33=fetch_array($resultado);
	$editar=1;
}
//<?php echo $_SERVER['PHP_SELF']; 
?>


<FORM name="formulario1" id="formulario1" action="" method="POST">
<?
titulo_mejorada($modulo,"","","");
?>

<table width="100%" border="0">
<BR>
<tr>
<td>
<!--<TD height="25" class="tb-head" align="left"><strong> TIPO DE REGISTRO </strong>-->
<input type="hidden" name="editar" id="editar" value="<? echo $editar;?>">
<input type="hidden" name="cedula" id="cedula" value="<? echo $cedula;?>">
<input type="hidden" name="codigo" id="codigo" value="<? echo $_GET['codigo'];?>">
</TD>
</tr>

<TR>
<TD height="50">Tipo:
<select onchange="javascript:cargar_tipo();" name="tipo_registro" id="tipo_registro">
<option value="">Seleccione</option>

<?
if($_SESSION['acce_estuaca']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Estudios Academicos")echo "selected='true'"?> value="Estudios Academicos">Estudios Academicos</option>
<?}
if($_SESSION['acce_xestuaca']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Estudios Extra Academicos")echo "selected='true'"?> value="Estudios Extra Academicos">Estudios Extra Academicos</option>
<?}
if($_SESSION['acce_permisos']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Permisos o Ausencias")echo "selected='true'"?> value="Permisos o Ausencias">Permisos o Ausencias</option>
<?}
if($_SESSION['acce_logros']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Logros")echo "selected='true'"?> value="Logros">Logros</option>
<?}
if($_SESSION['acce_penalizacion']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Penalizaciones")echo "selected='true'"?> value="Penalizaciones">Penalizaciones</option>
<?}
if($_SESSION['acce_movpe']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Movimiento de Personal")echo "selected='true'"?> value="Movimiento de Personal">Movimiento de Personal</option>
<?}
if($_SESSION['acce_evalde']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Evaluacion de desempeño")echo "selected='true'"?> value="Evaluacion de desempeño">Evaluacion de desempeño</option>
<?}
if($_SESSION['acce_experiencia']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Experiencia")echo "selected='true'"?> value="Experiencia">Experiencia</option>
<?}
if($_SESSION['acce_antic']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Antic. prestaciones")echo "selected='true'"?> value="Antic. prestaciones">Antic. prestaciones</option>
<?}
if($_SESSION['acce_uniforme']==1)
{?>
<option <?if($fetch33['tipo_registro']=="Entrega de Uniformes")echo "selected='true'"?> value="Entrega de Uniformes">Entrega de Uniformes</option>
<?}?>
</select>
</td>
</tr>
</table>
<table align="center" width="100%" border="0">
<TR><TD>
<div id="registro">
</div>
</TD></TR>
</table>
<table width="60%" cellspacing="0" border="0" cellpadding="1" align="center">
<tr align="right">
<td align="right">
<?btn('cancel',"expediente_list.php?cedula=$cedula",0); ?>
</td>
<td align="left">
<?btn('ok',"confirmar2('Seguro desea registrar estos datos?');",2); ?>
<input type="hidden" name="opcion" id="opcion"/>
</td>
</tr>
</table>


<?
cerrar_conexion($conexion);
?>


</FORM>
</BODY>
</html>
<?
if($editar==1)
{
	?>
	<script type="text/javascript">
	cargar_tipo()
	</script>
	<?
}
?>
