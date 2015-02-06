<?

if (!isset($_SESSION)) {
  session_start();
}

?>
<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';

include ("header.php");
$conexion=conexion();
//echo $conexion;
$url="cwconhcolist";
$modulo="Asientos";
$tabla="cwconhco";
$titulos=array("Numero","Fecha","Grupo","Descripcion","Estado");
$indices=array("0","2","1","3","4");

$conexion=conexion();
//$cod_unidad=@$_GET['codigo'];
//$cod_centro=@$_GET['cod_centro'];
//$id=@$_GET['id'];
$rsac=@$_GET['rsac'];
$tipob=@$_GET['tipo'];
$des=@$_GET['des'];
$pagina=@$_GET['pagina'];
$log_usr=$_SESSION['codigo'];
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
		$consulta.=" ORDER BY year(Fecha) DESC,month(Fecha) DESC, Numcom DESC";
}
//echo $consulta." este es el valor que muestra ";
$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

//include ("../header.php");
?>

<script>
function contabilizar(numcom,estado,pagina,fecha){
	if (confirm("Esta seguro que desea contabilizar este comprobante?"))
	{
		var cerrar_nomina=abrirAjax()
		var ediv=document.getElementById("loading");
		cerrar_nomina.open("GET", "contab_trans.php?Numcom="+numcom+"&Estado="+estado+"&pagina="+pagina+"&Accion=Contabilizar&feccom="+fecha, true)
		cerrar_nomina.onreadystatechange=function() 
		{
			if (cerrar_nomina.readyState==4)
			{
				document.getElementById("loading").style.visibility = 'hidden';
	
				alert("COMPROBANTE CONTABILIZADO CON EXITO!!!")

				location.href="cwconhcolist.php?pagina="+pagina;

			}
			if (cerrar_nomina.readyState==1)
			{
				document.getElementById("loading").style.visibility = 'visible';
			}
		}
		cerrar_nomina.send(null);
	}
}
</script>

<SCRIPT  language="JavaScript" type="text/javascript" src="lib/common.js"></SCRIPT>
<FORM name="<?php echo $url?>" action="contab_trans.php" method="POST" target="_self">
<?
	$consulta_usu="select * from cwconusu where Codusu='".$log_usr."'";
	$resultado_usu=query($consulta_usu,$conexion);
	$fila_usu=fetch_array($resultado_usu);
	titulo($modulo,"cwconhcoedit.php?usuario=".$log_usr."&accion=agregar","","46");
?>
<div id="loading" style="position:absolute; width:80%; text-align:center; top:180px; visibility:hidden;">
<img src="loading.gif" border=0></div>
<table class="tb-head" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<td>
		<select name="busqueda" id="busqueda">
		<option value="Numcom">Comprobante</option>
		<option value="Fecha">Fecha</option>
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
      <td></td><td></td><td></td><td></td><td></td><td></td>


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
	foreach($indices as $campo)
	{
		$nom_tabla=mysql_field_name($resultado,$campo);
		if($nom_tabla=="Fecha")
		{
			$fech=$fila[$nom_tabla];
			$fecha=fecha($fech);
			echo"<td width=\"150\">$fecha</td>";
		}else if($nom_tabla=="Codtipo")
		{
			$var=$fila[$nom_tabla];
			$cosul="select * FROM cwcontco where Codtipo=".$var;
			$resul=query($cosul,$conexion);
			$fila_des=fetch_array($resul);
			$Descripcion=$fila_des['Descrip'];
			echo"<td width=\"150\">$Descripcion</td>";
		}
		else if($nom_tabla=="Descrip")
		{	
			$var=$fila[$nom_tabla];
			echo "<td width=\"600\">$var</td>";
			
		}
		else if($nom_tabla=="Estado")
		{	
			$var=$fila[$nom_tabla];
			switch($var)
			{
				case 1:
					$Var_Tipoestado = "EN TRANSITO";
				break;
				case 2:
					$Var_Tipoestado = "EN CONTABILIDAD";
				break;
				case 3:
					$Var_Tipoestado = "DESCUADRADOS";
				break;
				case 4:
					$Var_Tipoestado = "ANULADOS";
				break;
			}
        	echo "<td width=\"150\">$Var_Tipoestado</td>";
		}else
		{	
			$var=$fila[$nom_tabla];
			echo "<td>$var</td>";
		}		
	}
	$mes1=explode("-",$fila['Fecha']);
	$mes=(real)$mes1[1];
	$ano=$mes1[0];
	
	$consultaMes="SELECT Estcie".$mes." from cwconemp WHERE year(Mescie".$mes.")=$ano";
	$resultMes=query($consultaMes,$conexion);
	$filaMes=fetch_array($resultMes);

	$Numcom=$fila["Numcom"];
	$Estado=$fila["Estado"];
	$fecha=$fila["Fecha"];
	
	$campo="Estcie".$mes;
	
	
	switch($Estado)	
	{
		case 1:
			if($fila_usu['Contabiliza']==1)
			{
				//echo "<td></td>";
				if($filaMes[$campo]=='CERRADO')
					echo "<td></td>";
				else
					iconoNuevo2("javascript:contabilizar('$Numcom','$Estado','$pagina','$fecha')", "Contabilizar", "Contabilizar.png");
			}
			
			icono("cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$fecha."&usuario=".$log_usr, "Asientos","asientogif.png");
			if($fila_usu['Repcomp']==1)
			{
			iconoNuevo("reporte_cwdcolist.php?Numcom=".$Numcom."&feccom=".$fecha, "Reporte de Comprobante","70.png");
			//iconoNuevopdf("reporte_comprobantespdf.php?Numcom=$Numcom", "Imprimir Reporte de Comprobante","ico_print.gif");
			//iconoNuevopdf("reporte_comprobantes_anchopdf.php?Numcom=$Numcom", "Reporte de Comprobante Ancho","70.png");
			}
			if($filaMes[$campo]=='CERRADO')
				echo "<td></td>";
			else
				icono("cwconhcoedit.php?Numcom=".$Numcom."&pagina=".$pagina."&accion=modificar&feccom=".$fecha, "Editar","ico_edit.gif");
			
			//icono("javascript:confirmar('Desea Borrar Todos los Asientos del Comprobante?','cwconhcoedit_sql.php?Numcom=".$Numcom."&pagina=".$pagina."&Accion=Vaciar')", "Vaciar comprobante","ico_basket.gif");
			if($fila_usu['Anula']==1)
			{
			if($filaMes[$campo]=='CERRADO')
				echo "<td></td>";
			else
				icono("javascript:confirmar('Desea Anular El Comprobante y Borrar Todos sus Asientos?','cwconhcoedit_sql.php?Numcom=".$Numcom."&pagina=".$pagina."&Accion=Borrar&feccom=".$fecha."')", "Anular comprobante","ico_basket.gif");
			}
			
			
		break;
		
		case 2:
			if($fila_usu['Contabiliza']==1)
			{
				if($filaMes[$campo]=='CERRADO')
					echo "<td></td>";
				else
					icono("javascript:confirmar('Desea Regresar a Transito El Comprobante ?','contab_trans.php?Numcom=".$Numcom."&Estado=".$Estado."&pagina=".$pagina."&Accion=Transito&feccom=".$fecha."')", "Regresar a Transito","Transito.png");

			
			}
			icono("cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$fecha."&usuario=".$log_usr, "Asientos","asientogif.png");
			icono("cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$fecha."&usuario=".$log_usr, "Asientos","asientogif.png");
			if($fila_usu['Repcomp']==1)
			{
			iconoNuevo("reporte_cwdcolist.php?Numcom=".$Numcom."&feccom=".$fecha, "Reporte de Comprobante","70.png");
			//iconoNuevopdf("reporte_comprobantespdf.php?Numcom=$Numcom", "Imprimir Reporte de Comprobante","ico_print.gif");
			//iconoNuevopdf("reporte_comprobantes_anchopdf.php?Numcom=$Numcom", "Reporte de Comprobante Ancho","70.png");
			}
		break;

		case 3:
			icono("cwcondcolist.php?Numcom=".$Numcom."&pagina=".$pagina."&feccom=".$fecha."&usuario=".$log_usr, "Asientos","asientogif.png");
			if($fila_usu['Repcomp']==1)
			{
			iconoNuevo("reporte_cwdcolist.php?Numcom=".$Numcom."&feccom=".$fecha, "Reporte de Comprobante","70.png");
			//iconoNuevopdf("reporte_comprobantespdf.php?Numcom=$Numcom", "Imprimir Reporte de Comprobante","ico_print.gif");
			//iconoNuevopdf("reporte_comprobantes_anchopdf.php?Numcom=$Numcom", "Reporte de Comprobante Ancho","70.png");
			}
			icono("cwconhcoedit.php?Numcom=".$Numcom."&pagina=".$pagina."&accion=modificar&feccom=".$fecha, "Editar","ico_edit.gif");
			//icono("javascript:confirmar('Desea Borrar Todos los Asientos del Comprobante?','cwconhcoedit_sql.php?Numcom=".$Numcom."&pagina=".$pagina."&Accion=Vaciar&feccom=".$fecha."')", "Vaciar comprobante","ico_basket.gif");
			if($fila_usu['Anula']==1)
			{
			if($filaMes[$campo]=='CERRADO')
				echo "<td></td>";
			else
				icono("javascript:confirmar('Desea Anular El Comprobante y Borrar Todos sus Asientos?','cwconhcoedit_sql.php?Numcom=".$Numcom."&pagina=".$pagina."&Accion=Borrar&feccom=".$fecha."')", "Anular comprobante","ico_basket.gif");
			}
		break;

		case 4:
			?>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<td><img width="16" height="16" align="left" border="0" title="Comprobante Anulado" src="../imagenes/ico_est6.gif"/></td>
		<?
		break;
		
	}
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
pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des,$num_paginas);
?>
</FORM>
</BODY>
</html>
