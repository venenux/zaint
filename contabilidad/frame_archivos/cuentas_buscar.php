<?php
$url="cuentas_buscar";
$modulo="cuentas";
$tabla="cwconcue";

require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");


$conexion=conexion();

$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];

if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
	}
	
	switch($tipob){
		case "exacta": 
			$consulta=buscar_exacta($tabla,$des,"Descrip");
			break;
		case "todas":
			$consulta=buscar_todas($tabla,$des,"Descrip");
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($tabla,$des,"Descrip");
			break;
	}

}else{

$consulta="SELECT * FROM ".$tabla." WHERE Tipo='P' AND Nivel > 1";

}
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

?>

<html class="fondo">
<HEAD>

<link href="../login_php_archivos/estilos.css" rel="stylesheet" type="text/css">
<TITLE>Cuentas Contables</TITLE>
<SCRIPT language="JavaScript" type="text/javascript" src="transaccion.js">
	
</SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js">
</SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript">

	function agregar_cuenta(valor,descrip){
		opener.document.getElementById('Cuenta').value=valor
		opener.document.getElementById('nombrec').value=descrip
		this.close()
	}
function cerrar(){
		
		this.close()
	}
</SCRIPT>
</HEAD>

<BODY>

<FORM name="<?echo $url;?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">

<table class="tb-tit" width="100%">
  <tbody>
    <tr>
      <td align="left" width="90%">Cuentas Contables</td>
	<td align="right" width="10%"><INPUT type="button" name="cerrar_boton" value="Cerrar" onclick="javascript:cerrar()"></td>
    </tr>
  </tbody>
</table>

<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20" value="<?{echo $_POST['buscar'];}?>"></td>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url); ?></td>
	<td width="120"><input onClick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
	<td width="140"><input onClick="javascript:actualizar(this);" type="radio" name="palabra" value="todas">Todas las palabras</td>
	<td width="150"><input onClick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
	<td colspan="3" width="386"><INPUT type="hidden" name="pag" value="<?$pagina?>"></td>
  </tr>
</table>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
  <tbody>
  	<br>
    <tr class="tb-head">
      <td width="150"><strong>C&oacute;digo</strong></td>
      <td width="500"><strong>Descripci&oacute;n</strong></td>
      <td width="20"></td>
     
     
    </tr>

<? 
	
	if($num_paginas>0){
	$i=0; 
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	if($i%2==0){
?>
    		<tr class="tb-fila" >
<?	}else{
		echo "<tr>";
	}
	$codigo=$fila["Cuenta"];
	$descripcion=$fila["Descrip"];
	
      echo "<td>$codigo</td>";

      echo "<td>$descripcion</td>";

      echo "<td width=\"20\" style=\"cursor : pointer;\" onclick=\"javascript:agregar_cuenta('$codigo','$descripcion');\"><IMG src=\"../imagenes/ico_add.gif\" title=\"Subgrupos\" width=\"16\" height=\"16\" align=\"left\" border=\"0\"></td>";
    echo"</tr>";
	}
}else{
	echo"<tr><td colspan='5'>No existen registro con la busqueda especificada</td></tr>";
}
cerrar_conexion($conexion);
?>

  </tbody>
</table>
<?pie_pagina($url,$pagina,"tipo=".$tipob."&des=".$des."&busqueda=".$busqueda,$num_paginas)?>


</FORM>
</BODY>
</html>