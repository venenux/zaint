<?php 
session_start();
ob_start();
?>
<?php
require_once '../lib/common.php';
include ("../header.php");
$conexion=conexion();
//echo $conexion;

$url="baremos";
$modulo="Baremos";
$tabla="nombaremos";
$titulos=array("Descripción","Tipo de Dato a Evaluar");
$indices=array("1","2");

if(isset($_POST['aceptar'])){
	
	$consulta="select * from ".$tabla;
	$resultado=mysql_query($consulta);
	//if((!$_POST['nombre_banco'])||(!$_POST['numero_cuenta'])||(!$_POST['firstinput'])){
	//	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	//	alert(\"Datos imcompletos, no se puede realizar la operacion\")";
	//	echo "</SCRIPT>";
	//	
	//}
$indices=array("1","2");
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
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	parent.cont.location.href=\"".$url.".php?pagina=1\"
	</SCRIPT>";
	

}else{

	$consulta="select * from ".$tabla;
	//echo $consulta;
	$resultado=query($consulta,$conexion);
}
?>


<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	parent.cont.location.href=retorno+".php?pagina=1"
}

</SCRIPT>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<TABLE  width="100%" height="100">
<TBODY>
<?$consulta="select max(codigo) as valor from nombaremos";
$resultado_estado=query($consulta,$conexion);
//echo $consulta;
$fila_estado=fetch_array($resultado_estado);
$valor=$fila_estado['valor']+1;


?>
<tr>
      <td colspan="2" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <?echo $modulo?></strong></td>
    </tr>
	<tr><TD class="tb-head" >C&oacute;digo</TD><TD ><INPUT size="6" type="text" readonly="true" name="codigo" value="<?echo $valor?>"></TD></tr>
	<?
	$i=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
		echo "<TR>";?><td class=tb-head ><?echo "$nombre</td>";
		echo "<td colspan=\"3\">";
		if($campo=="tipodato"){?>
		<INPUT type="radio" name="<?echo $campo?>" value="Dias">D&iacute;as&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Meses">Meses&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Anios">A&#241;os&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Otros">Otros
		<?}else{

		echo "<INPUT type=\"text\" name=\"$campo\" size=\"100\">";
		}
		echo "</td> </tr>";
		$i++;
		
	}
?>
    <tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" name="aceptar" value="Aceptar"><INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<?echo $url?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>