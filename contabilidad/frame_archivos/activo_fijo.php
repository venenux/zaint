<?php 
session_start();
ob_start();
?>


<script language="javascript">

function movimientos(valor){
	var cont=document.getElementById('AFmovimientos')
	var contenido=abrirAjax()
	contenido.open("POST", "movimientos.php?"+valor, true)
   contenido.onreadystatechange=function() {
		if (contenido.readyState==1) {
			cont.innerHTML="Cargando..."
		}
		if (contenido.readyState==4) {
			cont.innerHTML=contenido.responseText
		}
	}
	contenido.send(null);
}

</script>

<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
//include ("func_bd.php");
$conexion=conexion();

//echo $conexion;
$url="activo_fijo";
$modulo="Activos Fijos";
$tabla="activosfijos";
$titulos=array("C&oacute;digo","Tipo","Fec. Compra","Descripci&oacute;n","Ubicaci&oacute;n","Costo","Dpr. Mensual");
$indices=array("CODACT","TIPO","FECCOMPRA","DECRIPAF","CODCCOS","COSTOCOMPRA","DPRMENSUAL");

$conexion=conexion();
$codigo  = @$_GET['codigo'];
$eliminar=@$_GET['eliminar'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
$busqueda = @$_GET['busqueda'];
if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
		$busqueda = $_POST['busqueda'];
	}
	switch($tipob){
		case "exacta":
			$consulta=buscar_exacta($tabla,$des,$busqueda);
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,$busqueda);
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,$busqueda);
			break;
	}
}else{
	//echo "cod: ".$id;
	if ($eliminar == '1') 
	{
		$var_sql="delete from ".$tabla." WHERE CODACT ='".$codigo."'";
		$rs = query($var_sql,$conexion);
	}
	$consulta="select * from ".$tabla;
		//echo $consulta;
}
//echo $consulta." este es el valor que muestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

?>


<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,"activo_fijo_add.php","menu_activos.php","46");
?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<TD><SELECT name="busqueda">
       	<option value="DECRIPAF">Descripcion</option>
	<option value="CODACT">C&oacute;digo</option>
	<option value="TIPO">C&oacute;digo tipo</option>
     	</SELECT></TD>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina);?></td>
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
<?
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
      <td></td><td></td><td></td><td></td>
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
		echo"<tr>";
	}
	foreach($indices as $campo){
		//$nom_tabla=mysql_field_name($resultado,$campo);
		switch($campo){
		case 'FECCOMPRA':
			$fecha=$fila[$campo];
			?>
			<td><?echo fecha($fecha);?></td>
			<?
		break;
		
		case 'COSTOCOMPRA':
			
			?>
			<td><? echo number_format($fila[$campo],2,',','.');?></td>
			<?
		break;
		
		case 'DPRMENSUAL':
			
			?>
			<td><? echo number_format($fila[$campo],2,',','.');?></td>
			<?
		break;
		
		case 'CODCCOS':
			$consulta333 = "SELECT Descrip FROM cwconcco WHERE Codccos = '".$fila[$campo]."'";
			$resultado333 = query($consulta333,$conexion);
			$fetch333 = fetch_array($resultado333);
			?>
			<td><? echo $fetch333['Descrip'];?></td>
			<?
		break;
		
		case 'TIPO':
			$consulta444 = "SELECT DESCRIP FROM activosfijos_tipos WHERE CODIGOTA = '".$fila[$campo]."'";
			$resultado444 = query($consulta444,$conexion);
			$fetch444 = fetch_array($resultado444);
			?>
			<td><? echo $fila[$campo]." ".$fetch444['DESCRIP'];?></td>
			<?
		break;
		
		default:
			$var=$fila[$campo];
			?>
			<td><?echo $var?></td>
			<?
		break;	
		}
	}
	$id=$fila["CODACT"];
	
	//iconoNuevo("elegibles_print.php?id=".$id."&cod_centro=".$cod_centro, "Imprimir Orden","ico_print.gif");
	icono("javascript:movimientos('codigo=".$id."')", "Mostrar Movimientos", "view.gif");
	icono("activo_fijo_edit.php?id=".$id."&pagina=".$pagina, "Editar Tipo de Activo", "edit.gif");
	icono("javascript:confirmar('Desea Eliminar el Registro?','".$url.".php?codigo=".$id."&pagina=".$pagina."&eliminar=1')", "Borrar Tipo de Activo", "delete.gif");
	
    echo"</tr>";
	}
}else{
	echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>
  </tbody>
</table>
<?
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&busqueda=".$busqueda,$num_paginas);
?>
</FORM>

<TABLE width="100%">
	<TR>
		<TD id="AFmovimientos"></TD>
	</TR>
</TABLE>
</BODY>
</html>