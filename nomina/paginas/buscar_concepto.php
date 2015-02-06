<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';
include ("../header.php");
include ("funciones_nomina.php");
$url="buscar_concepto_acumulados";
$modulo="Agregar Conceptos a la Nomina";
$tabla="nomconceptos";
$titulos=array("Tipo de Concepto","Codigo de Concepto","Descripción");
$indices=array("2","0","1");


$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$ficha=$_GET['ficha'];
$pagina=$_GET['pagina'];
$todo=$_GET['todo'];


$conexion=conexion();
$consulta="SELECT tipo_ingreso FROM nomtipos_nomina WHERE codtip=$_SESSION[codigo_nomina]";
$resultado_tiping=query($consulta,$conexion);
$fetch=fetch_array($resultado_tiping);
if($fetch['tipo_ingreso']=='S')
	$fetch['tipo_ingreso']=1;

if(isset($_POST['buscar']) || $tipob!=NULL)
{
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	switch($tipob){
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
nomconceptos_tiponomina.codtip='".$_SESSION['codigo_nomina']."' group by nomconceptos.tipcon, nomconceptos.codcon, nomconceptos.descrip order by nomconceptos.tipcon,nomconceptos.codcon";
}

//echo $consulta." este es el valor quemuestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);


?>
<script language="JavaScript" type="text/javascript">
function Aceptar(variable)
{
	//opener.document.forms[0].textfield.value=variable;
	//window.opener.SumarCampoFormula();
	window.opener.document.forms[0].codcon.value=variable;
	CerrarVentana();
}
function enviar(op){
	
	document.frmPrincipal.opcion.value=op;
	document.frmPrincipal.submit();
}
function CerrarVentana(){
	javascript:window.close();
}
</script>
<FORM name="frmPrincipal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">

<?
titulo_mejorada($modulo,"21.png","btn('cancel','window.close()',2);","");
	
?>
<input name="opcion" id="opcion" type="hidden" value="">
<input name="marcar_todos" type="hidden" value="1">	
<input name="ficha" type="hidden" value="<?echo $ficha?>">	
<input name="nomina" type="hidden" value="<?echo $nomina?>">
<!--<input name="retorno" type="hidden" value="<?echo $retorno?>">		-->
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td><? btn('search','frmPrincipal',1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina."&ficha=".$ficha."&nomina=".$nomina); ?></td>
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
	while($fila=fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila" style="cursor:pointer" onClick="Aceptar('<?php echo $fila[codcon]; ?>')">
<?
	}else{
		?>
		<tr style="cursor:pointer" onClick="Aceptar('<?php echo $fila[codcon]; ?>')">
		<?
	}
?>
			<td></td>
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
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>
<?cerrar_conexion($conexion);?>
