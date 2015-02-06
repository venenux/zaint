<?php 
session_start();
ob_start();
?>
<?php
require_once '../lib/common.php';
include ("../header.php");
$conexion=conexion();
//echo $conexion;
$pagina = @$_GET['pagina'];
$url="baremos";
$modulo="Baremos";
$tabla="nombaremos";
$titulos=array("Descripción","Tipo de Dato a Evaluar");
$indices=array("1","2");

if(isset($_POST['aceptar'])){
	
	$consulta="select * from ".$tabla;
	$resultado= query($consulta,$conexion);

	
	$cadena="";
	foreach($indices as $valor){
		$campo=mysql_field_name($resultado,$valor);
		if($cadena==""){
			
			$cadena=$cadena.$campo."='".$_POST[$campo]."'";
		}
		else{
			$cadena=$cadena.",".$campo."='".$_POST[$campo]."'";
		}
	}
	
	$consulta="update ".$tabla." set ".$cadena." where codigo=".$_POST["codigo"];
	//echo $consulta;
//exit(0);
	$resultado=query($consulta,$conexion) or die("no se actualizo el movimiento");
	$pagina=@$_POST['pagina'];
	cerrar_conexion($conexion);
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	parent.cont.location.href=\"".$url.".php?pagina=".$pagina."\"
	</SCRIPT>";
	

}
	$codigo = @$_GET['codigo'];
	//$descripcion= @$_GET['descripcion'];
	$consulta="select * from ".$tabla." where codigo=".$codigo;
	//echo $consulta;
	$resultado=query($consulta, $conexion);
	//echo $resultado;
	$fila=fetch_array($resultado);
	//echo $fila;
?>

<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	parent.cont.location.href=retorno+".php?pagina=<?=$pagina?>"
}

</SCRIPT>



<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<TABLE  width="100%" height="100">
<TBODY>

<tr>
      <td colspan="2" height="30" class="tb-tit"><strong>Editar Registro de <?echo $modulo?></strong></td>

    </tr>
<TR><td class=tb-head >Codigo</td><td><INPUT type="text" name="codigo" size="100" readonly="true" value="<?echo $codigo?>"></td> </tr>
<INPUT type="hidden" name="pagina" value="<?echo "$pagina";?>"></td>

	<?
	$i=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
	//echo $campo;
		echo "<TR>";?><td class=tb-head ><?echo "$nombre"?></td>
		<td>
		<?if($campo=="tipodato"){?>
			<INPUT  type="radio" name="<?echo $campo?>" value="Dias" <?if($fila[$campo]=="Dias"){?> checked="true" <?}?>>D&iacute;as&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Meses" <?if($fila[$campo]=="Meses"){?> checked="true" <?}?>>Meses&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Anios" <?if($fila[$campo]=="Anios"){?> checked="true" <?}?>>A&#241;os&nbsp;&nbsp;<INPUT type="radio" name="<?echo $campo?>" value="Otros" <?if($fila[$campo]=="Otros"){?> checked="true" <?}?>>Otros

		<?}else{?>
			<INPUT type="text" name="<?echo $campo?>" size="100" value='<?echo "$fila[$campo]";?>'>
		<?}?>
		</td> 
		</tr><?
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