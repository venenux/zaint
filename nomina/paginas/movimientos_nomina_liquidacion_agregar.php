<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';
include ("../header.php");
include ("funciones_nomina.php");
$url="movimientos_nomina_liquidacion_agregar";
$modulo="Agregar Conceptos a la liquidacion";
$tabla="nomconceptos";
$titulos=array("Tipo de Concepto","Codigo de Concepto","Descripción","Referencia");
$indices=array("2","0","1");

$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$ficha=$_GET['ficha'];
$pagina=$_GET['pagina'];
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

$conexion=conexion();
$consulta="select * from nom_nominas_pago where codnom='".$nombre_nomina."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado_nom=query($consulta,$conexion);
$fila_nom=fetch_array($resultado_nom);
$CODNOM=$nombre_nomina;
$FECHANOMINA=$fila_nom['periodo_ini'];
$FECHAFINNOM=$fila_nom['periodo_fin'];
$LUNES=lunes($FECHANOMINA);	
$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
$consulta="select * from nompersonal where ficha='".$ficha."' and tipnom='".$_SESSION['codigo_nomina']."'";
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
$REF=0;

if(isset($_POST['opcion']) and $_POST['opcion']=="guardar")
{
	$temp_des=$_POST['descripcion'];
	$i=0;
	foreach($temp_des as $des)
	{
		$descripcion[$i]=$des;
		$i++;
	}
	
	$temp_concepto=$_POST['codcon'];
	$i=0;
	foreach($temp_concepto as $des)
	{
		$concepto[$i]=$des;
		$i++;
	}
	$tipo=$_POST['tipcon'];
	$i=0;
	foreach($tipo as $des)
	{
		$tipoconcepto[$i]=$des;
		$i++;
	}
	$temp_unidad=$_POST['unidad'];
	$i=0;
	foreach($temp_unidad as $des)
	{
		$unidad[$i]=$des;
		$i++;
	}

	$temp_ref=$_POST['referencia'];
	$i=0;
	foreach($temp_ref as $des)
	{
		$ref[$i]=$des;
		$i++;
	}
	if($SITUACION!="Inactivo")
	{
		foreach($_POST['seleccion'] as $valor)
		{
			$consulta_mov="select * from nom_movimientos_nomina where codcon='".$concepto[$valor]."' and codnom='".$_POST['nomina']."' and ficha ='".$_POST['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."'";
			$resultado_mov=query($consulta_mov,$conexion);		
			if(num_rows($resultado_mov)==0)
			{
				$consulta="select * from nomconceptos where codcon='".$concepto[$valor]."'";
				$resultado_con=query($consulta,$conexion);
				$fila=fetch_array($resultado_con);
				$REF=$ref[$valor];

				eval($fila['formula']);

				if($MONTO<=0 && $fila['montocero']==1)
				{
					$entrar=0;
				}
				else
				{
					$entrar=1;
				}
				if ($entrar==1)
				{
					$consulta="insert into nom_movimientos_nomina (codnom, codcon,ficha,tipcon,valor,monto,unidad,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,cedula,impdet) values ('".$_POST['nomina']."', '".$concepto[$valor]."','".$_POST['ficha']."','".$tipoconcepto[$valor]."','".$REF."','".$MONTO."','".$unidad[$valor]."','".$descripcion[$valor]."','$fila[codnivel1]','$fila[codnivel2]','$fila[codnivel3]','$fila[codnivel4]','$fila[codnivel5]','$fila[codnivel6]','$fila[codnivel7]','".$_SESSION['codigo_nomina']."','$fila[cedula]','$fila[impdet]')";
					$resultado=query($consulta,$conexion);
				}
			}
		}
	}
	else
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert('No se puede calcular conceptos a esta persona')
		</SCRIPT>";
	}
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	window.opener.document.forms[0].ficha.value=$_POST[ficha]
	window.opener.document.forms[0].submit()
	window.close()
	</SCRIPT>";
}
//DECLARACION DE LIBRERIAS


if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob)
	{
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob)
	{
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"descrip");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"descrip");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"descrip");
			break;
	}
}
else
{
	$consulta="select nomconceptos.codcon as codcon,nomconceptos.descrip as descrip,nomconceptos.tipcon as tipcon,nomconceptos.unidad as unidad,nomconceptos.formula as formula, nomconceptos.modifdef as modifdef from nomconceptos join nomconceptos_frecuencias on(nomconceptos_frecuencias.codcon=nomconceptos.codcon) join nomconceptos_tiponomina on(nomconceptos_tiponomina.codcon=nomconceptos.codcon) join nom_nominas_pago on(nomconceptos_tiponomina.codtip=nom_nominas_pago.codtip) where 
	nomconceptos_tiponomina.codtip='".$_SESSION['codigo_nomina']."' and nomconceptos_frecuencias.codfre='".$fila_nom['frecuencia']."' and contractual<>1 group by nomconceptos.tipcon, nomconceptos.codcon, nomconceptos.descrip order by nomconceptos.tipcon,nomconceptos.codcon,nomconceptos.descrip";
}

//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);


?>
<script language="JavaScript" type="text/javascript">
function enviar(op){
	
	document.frmPrincipal.opcion.value=op;
	document.frmPrincipal.submit();
}
</script>
<FORM name="frmPrincipal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">

<?
titulo_mejorada($modulo,"21.png","btn('ok',\"MarcarTodos('seleccion[]');\",2,'Marcar o Desmarcar Todos');|btn('back',\"enviar('guardar')\",2,'Aceptar');|btn('cancel','window.close()',2);","");
	
?>
<input name="opcion" id="opcion" type="hidden" value="">
<input name="marcar_todos" type="hidden" value="1">	
<input name="ficha" type="hidden" value="<?echo $ficha?>">	
<input name="nomina" type="hidden" value="<?echo $nombre_nomina?>">
<!--<input name="retorno" type="hidden" value="<?echo $retorno?>">		-->
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td><? btn('search','frmPrincipal',1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina."&ficha=".$ficha."&nomina=".$nombre_nomina); ?></td>
	<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
	<td width="140"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
	<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
	<td colspan="3" width="386"></td>
  </tr>
</table>
<BR>

<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
  <tbody>
    <tr class="tb-head" >
<td></td>
<?
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>


    </tr>
<? 
	if($num_paginas!=0){
	$i=0; 
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila">
<?
	}else{
		echo "<tr>";
	}
?>
			<td><INPUT type="checkbox" name="seleccion[]" value="<?echo ($i-1)?>"></td>
			<?
	foreach($indices as $campo){
		$nom_tabla=mysql_field_name($resultado,$campo);
	
		$var=$fila[$nom_tabla];
		if($nom_tabla=="tipcon"){
		echo "<td><input name=\"unidad[]\" type=\"hidden\" value=\"".$fila['unidad']."\"><input name=\"tipcon[]\" type=\"hidden\" value=\"$var\">$var</td>";		

		}elseif($nom_tabla=="descrip"){
				if($fila['modifdef']==1){

					echo "<td><INPUT size=\"50\" type=\"text\" name=\"descripcion[]\" value=\"$var\"></td>";
				}else{
					echo "<td><INPUT size=\"50\" type=\"hidden\" name=\"descripcion[]\" value=\"$var\">$var</td>";
				}
			
		}elseif($nom_tabla=="codcon"){
			echo "<td><input name=\"codcon[]\" type=\"hidden\" value=\"$var\">$var</td>";	
		}else{
			echo "<td>$var</td>";
			
		}
		
	}
	echo "<td align=\"right\"><INPUT type=\"text\" name=\"referencia[]\" value=\"0\" size=\"15\"></td>";
	echo "</tr>";
}
}else{
	echo "<tr colspan=\"5\"><td>No existen registro con la busqueda especificada</td></tr>";
}

?>
  </tbody>
</table>
<?
//<input name=\"formula[]\" type=\"hidden\" value='".$fila['formula']."'>
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&ficha=".$ficha."&nomina=".$nombre_nomina,$num_paginas);
?>
</FORM>
</BODY>
</html>
<?cerrar_conexion($conexion);?>
