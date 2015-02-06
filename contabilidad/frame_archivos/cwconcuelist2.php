<?php include ("header.php");
require_once('../../generalp.config.inc.php');
require_once 'lib/config.php';
require_once 'lib/common.php';

$conexion=conexion();
//echo $conexion;
$url="cwconcuelist2";
$modulo="Cuentas";
$tabla="cwconcue";
$titulos=array("Nivel","Cuenta","CC","T","Tipo","Descripcion");
$indices=array("1","0","15","16","2","3");

$conexion=conexion();
//$cod_unidad=@$_GET['codigo'];
//$cod_centro=@$_GET['cod_centro'];
//$id=@$_GET['id'];
$rsac=@$_GET['rsac'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
$busqueda=$_GET['busqueda'];
if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
		$busqueda=$_POST['busqueda'];
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
		$consulta="select * from ".$tabla;
		//echo $consulta;
}
//echo $consulta." este es el valor que muestra <br>";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

//include ("../header.php");
?>
<FORM name="<? echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,"","menu_his.php","12");
?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td>
		<select name="busqueda" id="busqueda">
		<option value="Nivel">Nivel</option>
		<option value="Cuenta">Cuenta</option>
		<option value="Descrip">Descripcion</option>
		</select>
	</td>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina); ?></td>
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
		$nom_tabla=mysql_field_name($resultado,$campo);
		if($nom_tabla=="Nivel")
		{
			$var=$fila[$nom_tabla];
			$cosul="select Nomniv1, Nomniv2, Nomniv3, Nomniv4, Nomniv5, Nomniv6, Nomniv7, Nomniv8, Nomniv9 FROM cwconfig";
			$resul=query($cosul,$conexion);
			$row_bucle=mysql_fetch_row($resul);
			switch($var)
			{
				case 1:
					$Var_Niv = "$row_bucle[0]";
				break;
				case 2:
					$Var_Niv = "$row_bucle[1]";
				break;
				case 3:
					$Var_Niv = "$row_bucle[2]";		  
				break;
				case 4:
					$Var_Niv = "$row_bucle[3]";		  
				break;
				case 5:
					$Var_Niv = "$row_bucle[4]";		  
				break;
				case 6:
					$Var_Niv = "$row_bucle[5]";		  
				break;
				case 7:
					$Var_Niv = "$row_bucle[6]";		  
				break;	
				case 8:
					$Var_Niv = "$row_bucle[7]";		  
				break;
				case 9:
					$Var_Niv = "$row_bucle[8]";		  
				break;		  		  		
			}
			echo"<td width=\"120\">$Var_Niv</td>";
		}
		else if($nom_tabla=="Cuenta")
		{	
			$var=$fila[$nom_tabla];
			echo "<td width=\"120\">$var</td>";
			
		}
		else if($nom_tabla=="Ccostos")
		{	
			$var=$fila[$nom_tabla];
			if($var==1)
			{
				echo "<td width=\"40\">Si</td>";
			}else
			{
				echo "<td width=\"40\">No</td>";
			}
		}else if($nom_tabla=="Terceros")
		{	
			$var=$fila[$nom_tabla];
			if($var==1)
			{
				echo "<td width=\"40\">Si</td>";
			}else
			{
				echo "<td width=\"40\">No</td>";
			}
		}else if($nom_tabla=="Tipo")
		{	
			$var=$fila[$nom_tabla];
			if($var=='T')
			{
				echo "<td width=\"60\">Titulo</td>";
			}else
			{
				echo "<td width=\"60\">Posteo</td>";
			}
		}
		else
		{	
			$var=$fila[$nom_tabla];
			echo "<td width=\"600\">$var</td>";
		}
		
	}
	$cuenta=$fila["Cuenta"];
	//$cod_centro=$fila["cod_centro"];
	//$id=$fila["cod_requisicion"];
	//$situacion=$fila["situacion"];
	
	icono("cwconhislist2.php?Cuenta=".$cuenta."&pagina=".$pagina, "Historico de Cuentas","70.png");
	//icono("cwconcueedit_sec.php?Nivel_Cuenta=".$nivel_cuenta."&Cuenta=".$cuenta."&pagina=".$pagina, "Agregar Niveles Inferiores","ico_add.gif");
	//icono("cwconcueedit.php?Cuenta=".$cuenta."&accion=modificar&pagina=".$pagina, "Editar Cuentas","ico_edit.gif");
	//icono("cwconcueedit_sql.php?Cuenta=".$cuenta."&Accion=Borrar&pagina=".$pagina, "Borrar Cuentas","ico_basket.gif");

	//icono("centros_delete.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Eliminar", "delete.gif");
	//icono("municipios_list.php?codigo=".$codigo, "Municipios", "view.gif");

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
</BODY>
</html>
