<?php

require_once 'lib/common.php';
include ("header.php");
$conexion=conexion();
//echo $conexion;

$url="tipo_activo";
$modulo="Tipos de Activos";
$tabla="activosfijos_tipos";
$titulos=array("C&oacute;digo","Descripci&oacute;n","Cuenta Real","Depreciable","Cuenta de Gasto o Depreciaci&oacute;n","Cuenta de Depreciaci&oacute;n Acumulada");
$indices=array("0","1","2","3","4","5");

if(isset($_POST['aceptar'])) 
{
	$consulta="select * from ".$tabla;
	$resultado=mysql_query($consulta);
	//if((!$_POST['nombre_banco'])||(!$_POST['numero_cuenta'])||(!$_POST['firstinput'])){
	//	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	//	alert(\"Datos imcompletos, no se puede realizar la operacion\")";
	//	echo "<//SCRIPT>";
	//	
	//}
	/*
	$consulta_rep="select * from ".$tabla." where Programa='".$_POST['Programa']."' and RecNoSec=99";
	$resultado_rep=query($consulta_rep,$conexion);
	if(mysql_num_rows($resultado_rep)>0)
	{
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Ese Proyecto Existe\")
	parent.cont.location.href=\"proyectos_add.php\"
	</SCRIPT>";
	}else
	{
	*/
	//exit(0);
	
	//$indices=array("2","3","4");
	$consulta="select max(CODIGOTA) as valor from activosfijos_tipos";
	$resultado_progra=query($consulta,$conexion);

	$fila_progra=fetch_array($resultado_progra);
	$max_progra=$fila_progra['valor'];
	$valor=$max_progra+1;
	$_POST['CODIGOTA'] = $valor; 
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
	//$cadena_campos=$cadena_campos.",RecNoSec";
	//$cadena_valores=$cadena_valores.",'99'";
	//echo $cadena_campos." ";
	//echo $cadena_valores;exit(0);


	$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.")";
	$resultado=query($consulta,$conexion);
	//echo $consulta;
	//exit(0);
	//cerrar_conexion($conexion);
	$val=$_POST['codigo'];
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	location.href=\"".$url.".php?pagina=1\"
	</SCRIPT>";
	
}else{
	$consulta="select * from ".$tabla;
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
	location.href="tipo_activo.php?pagina=1"
}
</SCRIPT>
</head>
<body>
<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">



<TABLE  width="100%" height="100">
<TBODY>

<tr>
      <td colspan="2" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <?echo $modulo?></strong></td>
    </tr>
<?


	$consulta33="select max(CODIGOTA) as valor from activosfijos_tipos";
	$resultado_progra33=query($consulta33,$conexion);
//echo $consulta;
	$fila_progra=fetch_array($resultado_progra33);
	$max_progra=$fila_progra['valor'];
	$valor=$max_progra+1;
	
	$consulta="select * from ".$tabla;
	$resultado=query($consulta,$conexion);

	$consulta="select Cuenta, Descrip from cwconcue where Tipo='P'";
	$resultado_cuenta=query($consulta,$conexion);
	$resultado_cuenta1=query($consulta,$conexion);
	$resultado_cuenta2=query($consulta,$conexion);

?>



	<?
	$i=0;
	$cont=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
		
		if($i == 0)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" disabled=\"true\" name=\"$campo\" value=\"$valor\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
			
		
		}
		elseif($i==3)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
            echo "<option value=SI>Depreciable</option>";
			echo "<option value=NO>No Depreciable</option>";
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==2)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"0\">Seleccione una Cuenta</option>";
            while($fetch33 = fetch_array($resultado_cuenta))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==4)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"0\">Seleccione una Cuenta</option>";
            while($fetch33 = fetch_array($resultado_cuenta1))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==5)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"0\">Seleccione una Cuenta</option>";
            while($fetch33 = fetch_array($resultado_cuenta2))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		else
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
		}
		
		
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