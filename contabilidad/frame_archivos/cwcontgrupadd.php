<?php
$url="cwcontgruplist";
$modulo="Tipos de Grupos";
$tabla="cwcongrup";
$titulos=array("Descripción");
$indices=array("1");

//DECLARACION DE LIBRERIAS
require_once 'lib/common.php';
include ("header.php");

$pagina = @$_GET['pagina'];

$conexion=conexion();

if(isset($_POST['aceptar'])){
	
	$consulta="select * from ".$tabla;
	$resultado=mysql_query($consulta);
	//if((!$_POST['nombre_banco'])||(!$_POST['numero_cuenta'])||(!$_POST['firstinput'])){
	//	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	//	alert(\"Datos imcompletos, no se puede realizar la operacion\")";
	//	echo "</SCRIPT>";
	//	
	//}
$indices=array("0","1");
	foreach($indices as $valor){
		$campo=mysql_field_name($resultado,$valor);
		if($cadena_campos=="" && $cadena_valores==""){
		
			$cadena_campos=$cadena_campos.$campo;
			$cadena_valores=$cadena_valores."'".$_POST[$campo]."'";
		}
		else{
			$cadena_campos=$cadena_campos.",".$campo;
			$cadena_valores=$cadena_valores.",'".$_POST[$campo]."'";
		}
	}
	//echo $cadena_campos." ";
	//echo $cadena_valores;
	
	$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.")";
	$resultado=query($consulta,$conexion);
	//echo $consulta;
	//exit(0);
	cerrar_conexion($conexion);
	$val=$_POST['cod_tipo'];
	$pagina=@$_POST['pagina'];
	//echo $pagina; exit(0);
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	parent.home.location.href=\"".$url.".php?pagina=".$pagina."\"
	</SCRIPT>";
	

}else{

	$consulta="select * from ".$tabla;
	//echo $consulta;
	$resultado=query($consulta,$conexion);
}
?>



<html class="fondo">

<head>
  <title></title>
  <link href="../estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	parent.home.location.href=retorno+".php?pagina=<?=$pagina?>"
}

</SCRIPT>

</head>
<body>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<TABLE  width="100%" height="100">
<TBODY>
<?$consulta="select max(codgrup) as valor from cwcongrup";
$resultado_multiple=query($consulta,$conexion);
//echo $consulta;
$fila_multiple=fetch_array($resultado_multiple);
$max_multiple=$fila_multiple['valor'];
$valor=$max_multiple+1;
?>

<tr>
      <td colspan="2" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <?echo $modulo?></strong></td>
    </tr>

	<td class="tb-head">Codigo Tipo de Grupo</td>
      	<td colspan="6"><?echo $valor;?> <INPUT type="hidden" name="cod_tipo" value="<?=$valor?>"></td>
		<td><INPUT type="hidden" name="pagina" value="<?echo "$pagina";?>"></td>

	<?
	$i=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
		echo "<TR>";?><td class=tb-head ><?echo "$nombre</td>";
		echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" size=\"100\"></td> </tr>";
		$i++;
		
	}
?>
    <tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" name="aceptar" value="Aceptar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<?echo $url?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>