<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';
include ("../header.php");
include ("funciones_nomina.php");
include ("func_bd.php") ;
$url="movimientos_agregar_masivo";
$modulo="Agregar Movimientos a la Nomina";
$tabla="nomconceptos";

$titulos=array("Ficha","Cedula","Nombre","Agregar?");
$indices=array("ficha","cedula","apenom");

$ficha=$_GET['ficha'];
$todo=$_GET['todo'];

if(!isset($_POST['nomina']))
{
	$nombre_nomina=$_GET['nomina'];
}
else
{
	$nombre_nomina=$_POST['nomina'];
}
if(!isset($_POST['ficha']))
{
	$ficha=$_GET['ficha'];
}
else
{
	$ficha=$_POST['ficha'];
}

$referencia=$_POST['referencia'];
$concepto=$_POST['codcon'];

$conexion=conexion();

if(isset($_POST['opcion']) and $_POST['opcion']=="Eliminar")
{
	$temp_des=$_POST['ficha'];
	$i=0;
	foreach($temp_des as $des)
	{
		$ficha[$i]=$des;
		$i++;
	}
	foreach($_POST['seleccion'] as $valor)
	{
		$consulta="DELETE FROM nom_movimientos_nomina WHERE ficha='".$ficha[$valor]."' AND codnom='".$nombre_nomina."' AND tipnom='".$_SESSION['codigo_nomina']."' AND codcon=$concepto";
		$resultado_nom=query($consulta,$conexion);
	}
}

$consulta="select * from nom_nominas_pago where codnom='".$nombre_nomina."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado_nom=query($consulta,$conexion);
$fila_nom=fetch_array($resultado_nom);
$CODNOM=$nombre_nomina;
$FECHANOMINA=$fila_nom['periodo_ini'];
$FECHAFINNOM=$fila_nom['periodo_fin'];
$LUNES=lunes($FECHANOMINA);	
$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
$consulta="select monsalmin from nomempresa";
$resultado_salmin=query($consulta,$conexion);
$fila_salmin=fetch_array($resultado_salmin);

if(isset($_POST['opcion']) and $_POST['opcion']=="Guardar")
{
	
	
	$temp_des=$_POST['ficha'];
	$i=0;
	foreach($temp_des as $des)
	{
		$ficha[$i]=$des;
		$i++;
	}
	foreach($_POST['seleccion'] as $valor)
	{
	$consulta="select * from nompersonal where ficha='".$ficha[$valor]."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	$CEDULA = $fila[cedula];
	$FICHA = $fila[ficha];
	$SUELDO=$fila[suesal];//LISTO
	$SEXO=".".$fila[sexo]."'";
	$FECHANACIMIENTO=date("d/m/Y",strtotime($fila[$fecnac]));
	$EDAD=date("Y")-date("Y",$fila[$fecnac]);
	$TIPONOMINA=$fila[tipnom];//LISTO
	$FECHAINGRESO=$fila[fecing];//LISTO
	$CODPROFESION=$fila[codpro];
	$CODCATEGORIA=$fila[codcat];
	$CODCARGO=$fila[codcargo];
	$SITUACION=$fila[estado];
	$SUELDOPROPUESTO=$fila[sueldopro];
	$TIPOCONTRATO=$fila[contrato];
	$FORMACOBRO=$fila[forcob];
	$NIVEL1=$fila[codnivel1];
	$NIVEL2=$fila[codnivel2];
	$NIVEL3=$fila[codnivel3];
	$NIVEL4=$fila[codnivel4];
	$NIVEL5=$fila[codnivel5];
	$NIVEL6=$fila[codnivel6];
	$NIVEL7=$fila[codnivel7];
	$FECHAAPLICACION=$fila[fechaplica];
	$TIPOPRESENTACION=$fila[tipopres];
	$FECHAFINSUS=$fila[fechasus];
	$FECHAINISUS=$fila[fechareisus];
	$FECHAFINCONTRATO=$fila[fecharetiro];
	$FECHAVAC=$fila[fechavac];
	$FECHAREIVAC=$fila[fechareivac];
	$CONTRACTUAL=$fila[contractual];
	$PRT=$fila[proratea];
	$REF=0;
	$SALARIOMIN=$fila_salmin['monsalmin'];
	if($SITUACION!="Inactivo")
	{
		
		
		$consulta_mov="select * from nom_movimientos_nomina where codcon='".$concepto."' and codnom='".$nombre_nomina."' and ficha ='".$ficha[$valor]."' and tipnom='".$_SESSION['codigo_nomina']."'";
		$resultado_mov=mysql_query($consulta_mov);
		
		if(num_rows($resultado_mov)==0)
		{
			$consulta="select * from nomconceptos where codcon='".$concepto."'";
			$resultado_con=mysql_query($consulta);
			$fila=fetch_array($resultado_con);
			$REF=$referencia;
			//echo $formula[$valor];
			eval($fila['formula']);
			
			if($MONTO<=0 && $fila['montocero']==1)
			{
				echo $entrar=0;
			}
			else
			{
				$entrar=1;
			}
			if($entrar==1)
			{
				$consulta="insert into nom_movimientos_nomina (codnom, codcon,ficha,mes,anio,tipcon,valor,monto,cedula,unidad,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,contractual) values ('".$_POST['nomina']."', '".$concepto."','".$ficha[$valor]."','".$fila_nom['mes']."','".$fila_nom['anio']."','".$fila['tipcon']."','".$REF."','".$MONTO."','$CEDULA','".$fila['unidad']."','".$fila['descrip']."','$NIVEL1','$NIVEL2','$NIVEL3','$NIVEL4','$NIVEL5','$NIVEL6','$NIVEL7','".$_SESSION['codigo_nomina']."','$fila[contractual]')";
				if(!$resultado=mysql_query($consulta))
				{
					echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
					alert('No se puede calcular conceptos a esta persona')
					</SCRIPT>";
				}
			}
		}	
	}	
	}

}
/*
else
{
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert('No se puede calcular')
	</SCRIPT>";
}
*/
$consulta="SELECT ficha, cedula, apenom FROM nompersonal WHERE tipnom='$_SESSION[codigo_nomina]'";
$result=query($consulta,$conexion);
?>
<script language="JavaScript" type="text/javascript">

function buscar_empleado()
{
	AbrirVentana('buscar_empleado_acumulados.php',660,700,0);
}

function buscar_concepto()
{
	AbrirVentana('buscar_concepto.php',660,700,0);
}

function enviar(op)
{
	document.frmPrincipal.opcion.value=op;
	var val1=document.getElementById('codcon')
	var val3=document.getElementById('referencia')
	
	if((val1.value==0)||(val1.value=='')||(val3.value==0)||(val3.value==''))
	{
		alert("DEBE INTRODUCIR DATOS VALIDOS... VERIFIQUE");
		return
	}
	document.frmPrincipal.submit();
}


</script>
<FORM name="frmPrincipal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo_mejorada($modulo,"21.png","btn('ok',\"MarcarTodos('seleccion[]');\",2,'Marcar o Desmarcar Todos');|btn('cancel','window.close()',2);","");
?>
<input name="marcar_todos" type="hidden" value="1">
<input name="opcion" id="opcion" type="hidden" value="">
<input name="nomina" id="nomina" type="hidden" value="<?echo $nombre_nomina?>">
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr>
<td width="20%" height="25"><strong><font color='#000066'>CONCEPTO:</font></strong></td>
<td>
<input type="text" name="codcon" id="codcon" maxlength="5" size="16" onblur="javascript:cargar_concepto();">
<a href="javascript:buscar_concepto();"> <img src="images/search.gif" name="buscar" id="buscar" border="0" /></a>
</td>
<td><div id="concepto"></div></td>
</tr>
<tr class='tb-fila' >
<td width="20%" height="25"><strong><font color='#000066'>VALOR:</font></strong></td>
<td><input type="text" name="referencia" id="referencia" maxlength="5" size="16"></td>
<td></td>
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class="tb-head" >

<?
foreach($titulos as $nombre)
{
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
</tr>
<?
$i=0; 
while($fila=fetch_array($result))
{
  	$i++;
	if($i%2==0)
	{
	?>
    	<tr class="tb-fila">
	<?
	}
	else
	{
		echo "<tr>";
	}
	foreach($indices as $campo)
	{
		//$nom_tabla=field_name($result,$campo);
		$var=$fila[$campo];
		if($campo=='ficha')
			echo "<td><INPUT size=\"50\" type=\"hidden\" name=\"ficha[]\" value=\"$var\">$var</td>";
		if($campo=='cedula')
			echo "<td><INPUT size=\"50\" type=\"hidden\" name=\"cedula[]\" value=\"$var\">$var</td>";
		if($campo=='apenom')
			echo "<td><INPUT size=\"50\" type=\"hidden\" name=\"apenom[]\" value=\"$var\">$var</td>";		
	}
	?>
	<td><INPUT type="checkbox" name="seleccion[]" value="<?echo ($i-1)?>"></td>
	<?	
	echo "</tr>";
}

?>

<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr><td colspan="2" height="50" align="center" class="tb-tit"><INPUT type="button" name="guardar" value="Guardar" onclick="javascript:enviar('Guardar');"><INPUT type="submit" name="eliminar" value="Eliminar" onclick="javascript:enviar('Eliminar');">
</td></tr>
</tr>
</tbody>
</table>
</FORM>
</BODY>
</html>
<?cerrar_conexion($conexion);?>
