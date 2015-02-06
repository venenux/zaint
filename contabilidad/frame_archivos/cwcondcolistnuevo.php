<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
$conexion=conexion();
//echo $conexion;
$url="cwcondcolist";
$Numcom  = $_GET['Numcom'];
$modulo="Asientos";
$tabla="cwcondco";
$titulos=array("Cuenta","Referencia","Tipo","Descripcion de Asientos","Debito","Credito");
$indices=array("3","4","5","6","7","8");

$conexion=conexion();
//$cod_unidad=@$_GET['codigo'];
//$cod_centro=@$_GET['cod_centro'];
//$id=@$_GET['id'];
$rsac=@$_GET['rsac'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
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
		$consulta="select * from ".$tabla." WHERE Numcom='$Numcom' ORDER BY Numlim ASC";
		//$resultado=query($consulta,$conexion);
		//echo $consulta;
}
//echo $consulta." este es el valor que muestra ";
//$num_paginas=obtener_num_paginas($consulta);
//$pagina=obtener_pagina_actual($pagina, $num_paginas);
//$resultado=paginacion($pagina, $consulta);
$resultado=query($consulta,$conexion);
//include ("../header.php");
?>
<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
	titulo($modulo,"cwcondcoedit.php?Numcom=".$Numcom."&accion=agregar","cwconhcolist.php","46");
?>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td>
		<select name="busqueda" id="busqueda">
		<option value="Cuenta">Cuenta</option>
		<option value="Referencia">Referencia</option>
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
<table width="100%" cellspacing="0" border="1" cellpadding="1" align="center">
  <tbody>
    <tr class="tb-head" >
<?
foreach($titulos as $nombre){
	echo "<td><STRONG>$nombre</STRONG></td>";
}
?>
      <td></td><td></td><td></td>


    </tr>
<? 
	//if($num_paginas!=0){
	$i=0; 
	while($fila=mysql_fetch_array($resultado)){
   	$i++;
	//if($i%2==0){
?>
    		<!--<tr class="tb-fila">-->
<?
	//}else{
		//echo"<tr>";
	//}
	foreach($indices as $campo){
		$nom_tabla=mysql_field_name($resultado,$campo);
		if($nom_tabla=="Cuenta")
		{
			$cuenta=$fila[$nom_tabla];
			$result_cuenta=query("SELECT * FROM cwconcue WHERE Cuenta='$cuenta'",$conexion);
			$row_cuenta    = fetch_array($result_cuenta);
			$Descripcion  = $row_cuenta['Descrip'];
			echo "<td width=\"150\" title=\"$Descripcion\">$cuenta</td>";
		}else if($nom_tabla=="Descrip")
		{	
			$var=$fila[$nom_tabla];
			echo "<td width=\"500\">$var</td>";
			
		}
		else if($nom_tabla=="Debito")
		{	
			$debitos=$fila[$nom_tabla];
			echo "<td width=\"100\" align=\"right\">$debitos</td>";
			
		}
		else if($nom_tabla=="Credito")
		{	
			$creditos=$fila[$nom_tabla];
			echo "<td width=\"100\" align=\"right\">$creditos</td>";
			
		}else
		{	
			$var=$fila[$nom_tabla];
			echo "<td>$var</td>";
		}
		
	}
	$Numcom=$fila["Numcom"];
	$RecNo=$fila["RecNo"];
	$Numlim=$fila["Numlim"];
	//icono("contab_trans.php?Numcom=".$Numcom."&Estado=".$Estado."&Accion=Contabilizar", "Contabilizar","Contabilizar.gif");
	//icono("contab_trans.php?Numcom=".$Numcom."&Estado=".$Estado."&Accion=Transito", "Transito","Transito.gif");
	//icono("cwcondcolist.php?Numcom=".$Numcom, "Asientos","asientogif.gif");
	icono("cwcondcoedit.php?Numlim=".$Numlim."&Numcom=".$Numcom."&Asiento=".$RecNo."&accion=agregar_sub", "Agregar hijo","ico_add.gif");
	icono("cwconhcoedit.php?Numcom=".$Numcom."&accion=modificar", "Editar","ico_edit.gif");
	icono("cwcondcoedit_sql.php?Numcom=".$Numcom."&Asiento=".$RecNo."&Accion=Borrar","Borrar Cuentas","ico_basket.gif");
	//icono("centros_delete.php?codigo=".$codigo."&cod_centro=".$cod_centro, "Eliminar", "delete.gif");
	//icono("municipios_list.php?codigo=".$codigo, "Municipios", "view.gif");

    echo"</tr>";
	
	}
//}else{
	//echo"<tr><td>No existen registro con la busqueda especificada</td></tr>";
//}

  $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom'", $conexion); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Debito_total_array  = mysql_fetch_array($result_sum);

  $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom'", $conexion); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Credito_total_array = mysql_fetch_array($result_sum);

  $Debito_total  = $Debito_total_array["suma_Debito"];
  $Credito_total = $Credito_total_array["suma_Credito"]; 

  $Total = $Debito_total - $Credito_total;
  
  $result_lineas = mysql_query("SELECT COUNT(*) FROM cwcondco WHERE Numcom='$Numcom'", $conexion); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Total_lineas_row = mysql_fetch_row($result_lineas);
    
  $Total_lineas = $Total_lineas_row[0];

  $result_estado_contabilizado = mysql_query("SELECT * FROM cwconhco WHERE Numcom='$Numcom'", $conexion); //VALIDA SI ESTA CONTABILIZADO
  $Total_estado_contabilizado = mysql_fetch_array($result_estado_contabilizado);
  $Estado_array_valida = $Total_estado_contabilizado["Estado"];
  if (($Estado_array_valida==1) || ($Estado_array_valida==3))
  {
    if ($Total<>0)
    {
      $descuadrado = mysql_query("UPDATE cwconhco SET Estado='3' WHERE Numcom='$Numcom'", $conexion);	 //DESCUADRADO	 
    } else if ($Total==0)
    {
      $descuadrado = mysql_query("UPDATE cwconhco SET Estado='1' WHERE Numcom='$Numcom'", $conexion);	 //EN TRANSITO	 
    }
  }

cerrar_conexion($conexion);
?>
  </tbody>
</table>

<form name="form1" method="post" action="">
  <pre style="color : #000000; font-size : 14px;">                                        <span>Total D&eacute;bito: <?php echo number_format($Debito_total, 2, ',', '.')?>   Total Cr&eacute;dito: <?php echo number_format($Credito_total, 2, ',', '.')?>
<?if($Total!=0){?>
	<p align="center" style="color : #d30004; font-size : 14px;">Diferencia: <?php if ($Total<0){ echo number_format(($Total * -1), 2, ',', '.');}else{echo number_format($Total, 2, ',', '.');} ?></p>       </span><span>   
<?}?>
							Nro. L&iacute;neas: <?php echo "$Total_lineas"?></span></pre>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?
//pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>